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
        header('Location: '. BASEURL . '/admin' );
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
    
    
}