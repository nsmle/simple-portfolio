<?php

// REQUIRE SEND MAIL FOR VERIFY LOGIN AND FORGOT PASSWORD
require_once('app/Mails/SendMail.php');

class Authentication {
    
    private $Mails;
    
    public function __construct()
    {
        $this->Mails = new SendMail();
    }
    
    public function model($model)
    {
        require_once('app/Models/' . $model . '.php');
        return new $model;
    }
    
    public function checkSignin()
    {
        // Check session(nsmle) if empty then check coockie(nsmle))
        if ( empty($_SESSION['nsmle']) ) {
            // If the coockie(nsmle) is empry, Then redirect to the login page 
            if ( empty($_COOKIE['nsmle']) ) {
                header('Location: ' . BASEURL . '/admin/auth/signin');
            }
        } else if ( !empty($_SESSION['nsmle']) ) {
            unset($_SESSION['verifycode']);
            unset($_SESSION['username']);
            if ( empty($_COOKIE['nsmle']) ) {
                if ( !empty($_SESSION['remember']) ) {
                    unset($_SESSION['remember']);
                    setcookie ("nsmle", $_SESSION['nsmle'], time()+ (60 * 60 * 24 * 7 ),  '/');
                }
            }
        }
    }
    
    public function checkSigninUser()
    {
      // Check cookie('nsmle') if isset redirect to admin home page
        if ( !empty($_COOKIE['nsmle']) ) {
            header('Location: ' . BASEURL . '/admin');
        // Check session('nsmle') if isset redirect to admin home page
        } else if ( !empty($_SESSION['nsmle']) ) {
            header('Location: ' . BASEURL . '/admin');
        }
    }
    
    
    // Check REGISTRATION_FEATURE
    public function checkRegistrationFeature()
    {
      if ( REGISTRATION_FEATURE == false ) {
        header('Location: '. BASEURL . '/admin/auth/signin' );
      } else {
          // Check cookie('nsmle') if isset redirect to admin home page
          if ( !empty($_COOKIE['nsmle']) ) {
              header('Location: ' . BASEURL . '/admin');
          // Check session('nsmle') if isset redirect to admin home page
          } else if ( !empty($_SESSION['nsmle']) ) {
              header('Location: ' . BASEURL . '/admin');
          }
      }
    }
    
    public function signinVerification()
    {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $user = $this->model('UsersModel')->getUserByUsername($username);
        
        if ( $username == $user['username'] && $password == password_verify($password, $user['password']) ) {
            
            // Verification via email 
            $verifycode = bin2hex( random_bytes(10) );
            $_SESSION['verifycode'] = password_hash($verifycode, PASSWORD_BCRYPT);
            $_SESSION['username'] = $user['username'];
            
            if ( isset($_POST['remember']) ) {
                $_SESSION['remember'] = $user['username'];
            }
            
            $this->Mails->verifyCode($user['email'], $user['name'], $user['phone'], $verifycode);
            
            header("Location: " . BASEURL . '/admin/auth/verification' );
        }
        
    }
    
    public function verificationCode($verifycode)
    {
        if ( password_verify( $verifycode, $_SESSION['verifycode'] ) ) {
            
            $user = $this->model('UsersModel')->getUserByUsername($_SESSION['username']);
            $_SESSION['nsmle'] = password_hash($user['username'], PASSWORD_BCRYPT);
            
            if(isset($_SESSION['remember'])) {
        	    setcookie ("nsmle", password_hash($user['username'], PASSWORD_BCRYPT), time()+ (60 * 60 * 24 * 7 ));
        	    
        	} else {
        		if(empty($_COOKIE["nsmle"])) {
        			setcookie ("nsmle", 'NOCOOKIE');
        		}
        	}
        	unset($_SESSION['verifycode']);
        	unset($_SESSION['username']);
            
        	header('Location:' . BASEURL . '/admin');
        	exit;
        } else {
            Flasher::setFlash('Your verify code is wrong, Please try again!', 'danger');
            header("Location :" . BASEURL . '/admin/auth/signin');
        }
    }
    
    
    

    // FORGOT PASSWORD
    public function forgotPasswordVerification()
    {
        $user = $user = $this->model('UsersModel')->getUserByUsername($_POST['username']);
        // Verification code via email
        $verifycode = bin2hex( random_bytes(10) );
        $_SESSION['verifycode'] = password_hash($verifycode, PASSWORD_BCRYPT);
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        
        $this->Mails->verifyCode($user['email'], $user['name'], $user['phone'], $verifycode);
        
        header("Location: " . BASEURL . '/admin/auth/verifyForgotPassword' );
        
    }
    
    public function verificationCodeForgotPassword($verifycode)
    {
         if ( password_verify( $verifycode, $_SESSION['verifycode'] ) ) {
            
        	unset($_SESSION['verifycode']); 
        	unset($_SESSION['email']);
            
        	header('Location:' . BASEURL . '/admin/auth/resetpassword');
        	
        } else {
            Flasher::setFlash('Your verify code is wrong, Please try again!', 'danger');
            header("Location :" . BASEURL . '/admin/auth/verifyForgotPassword');
        }
    }
    
    // REGISTRATION FEATURE
    
    // Activation Account
    public function activationRegistration($name, $username, $email, $phone, $password)
    {
      $user = $this->model('UsersModel')->getUserByUsername($username);
      if ( empty($user) && $user !== "" ) {
        
        $_SESSION['name'] = base64_encode($name);
        $_SESSION['username'] = base64_encode($username);
        $_SESSION['email'] = base64_encode($email);
        $_SESSION['phone'] = base64_encode($phone);
        $_SESSION['password'] = base64_encode($password);
        
        $verifycode = bin2hex( random_bytes(10) );
        $_SESSION['verifycode'] = password_hash($verifycode, PASSWORD_BCRYPT);
        
        // Send mail verify code signup
        $this->Mails->verifyCode($email, $name, $phone, $verifycode);
        
        header("Location: " . BASEURL . '/admin/auth/activation' );
      } else {
        Flasher::setFlash('The username you selected is already in use. Please choose another username!', 'danger');
        header('Location: '. BASEURL . '/admin/auth/signup');
      }
      
    }
    
    // Verification Code for signup
    public function verifyCodeSignup($verifycode)
    {
      if ( password_verify( $verifycode, $_SESSION['verifycode'] ) ) {
        
        $name = base64_decode($_SESSION['name']);
        $username = base64_decode($_SESSION['username']);
        $email = base64_decode($_SESSION['email']);
        $phone = base64_decode($_SESSION['phone']);
        $password = base64_decode($_SESSION['password']);
        
        if (!$this->model('UsersModel')->addUsers($name, $username, $email, $phone, $password) ) {
          Flasher::setFlash("Sorry, we can't add your account!", 'danger');
          header('Location: ' . BASEURL . '/admin/auth/signup');
        }
        
        // Unset All Session Signup
        unset($_SESSION['name']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['phone']);
        unset($_SESSION['password']);
        unset($_SESSION['verifycode']);
        
        Flasher::setFlash('Thank you for registering. Please login to access your account.', 'primary');
        header('Location: ' . BASEURL . '/admin/auth/signin');
        
      } else {
        Flasher::setFlash("Sorry, we can't verify your code!", 'danger');
        header('Location: ' . BASEURL . '/admin/auth/activation');
      }
    }
    
}