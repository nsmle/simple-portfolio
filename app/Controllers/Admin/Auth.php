<?php

class Auth extends controller {
    
    
    public function signin()
    {
        // Check login user
        $this->authentication()->checkSigninUser();
        $data = [
            'title' => 'Nsmle - Sign In'
        ];
        echo $this->view('Admin/Auth/Layout/Header', $data);
        echo $this->view('Admin/Auth/SignIn');
        echo $this->view('Admin/Auth/Layout/Footer');
    }
    
    public function signinVerify()
    {
        // Check login user
        $this->authentication()->checkSigninUser();
        // Check user in db by username
        $user = $this->model('UsersModel')->getUserByUsername($_POST['username']);
        // Verification Signin
        $this->authentication()->signinVerification();
    }
    
    public function verification()
    {
        // Check login user
        $this->authentication()->checkSigninUser();
        
        if ( empty($_SESSION['verifycode']) ) {
            Flasher::setFlash('Unable to check your code verification!', 'danger');
            header('Location: ' . BASEURL . '/admin/auth/signin');
        }
        $user = $this->model('UsersModel')->getUserByUsername($_SESSION['username']);
        $data = [
            'title'    => 'Nsmle - Verification Code',
            'email' => $user['email']
        ];
        echo $this->view('Admin/Auth/Layout/Header', $data);
        echo $this->view('Admin/Auth/Verify', $data);
        echo $this->view('Admin/Auth/Layout/Footer');
    }
    
    public function verifycode()
    {
        // Check login user
        $this->authentication()->checkSigninUser();
        
        if ( empty($_SESSION['verifycode']) ) {
            Flasher::setFlash('Unable to check your code verification!', 'danger');
            header('Location: ' . BASEURL . '/admin/auth/signin');
        }
        
        if ( isset($_POST['verifycode']) ) {
          $verifyCode = $_POST['verifycode'];
        } else {
          $verifyCode = uriSegment(3);
        }
        
        $this->authentication()->verificationCode($verifyCode);
        
    }
    
    
    public function forgotpassword()
    {
        // Check login user
        $this->authentication()->checkSigninUser();
        
        $data = [
            'title' => 'Nsmle - Forgot Password'
        ];
        echo $this->view('Admin/Auth/Layout/Header', $data);
        echo $this->view('Admin/Auth/ForgotPassword');
        echo $this->view('Admin/Auth/Layout/Footer');
    }
    
    public function searchUserFoForgotPassword() 
    {
        // Check login user
        $this->authentication()->checkSigninUser();
        
        $user = $this->model('UsersModel')->getUserByUsername($_POST['username']);
        
        if ( empty($user) ) {
            Flasher::setFlash('Username yang anda masukan tidak cocok dengan akun manapun, Harap coba lagi!', 'danger');
            header('Location: ' . BASEURL . '/admin/auth/forgotpassword');
        // Check cookie('nsmle') if isset redirect to admin home page
        } else {
            $this->authentication()->forgotPasswordVerification();
        }
    }
    
    public function verifyForgotPassword()
    {
        // Check login user
        $this->authentication()->checkSigninUser();
        
        $data = [
            'title'    => 'Nsmle - Verification Code',
            'email' => $_SESSION['email']
        ];
        echo $this->view('Admin/Auth/Layout/Header', $data);
        echo $this->view('Admin/Auth/VerifyForgotPassword', $data);
        echo $this->view('Admin/Auth/Layout/Footer');
        
    }
    
    public function verifyCodeForgotPassword()
    {
        // Check login user
        $this->authentication()->checkSigninUser();
        
        if ( isset($_POST['verifycode']) ) {
          $verifyCode = $_POST['verifycode'];
        } else {
          $verifyCode = uriSegment(3);
        }
        
        $this->authentication()->verificationCodeForgotPassword($verifyCode);
    }
    
    public function resetpassword()
    {
        // Check login user
        $this->authentication()->checkSigninUser();
        
        $data = [
            'title' => 'Nsmle - Reset Password'
        ];
        echo $this->view('Admin/Auth/Layout/Header', $data);
        echo $this->view('Admin/Auth/ResetPassword');
        echo $this->view('Admin/Auth/Layout/Footer');
    }
    
    public function resetPwd()
    {
        // Check login user
        $this->authentication()->checkSigninUser();
        
        if ( empty($this->model('UsersModel')->updatePassword($_SESSION['username'])) ) {
            Flasher::setFlash("An error occurred, we're sorry!", 'danger');
            header('Location: ' . BASEURL . '/admin/auth/resetpassword');
        }
        
        unset($_SESSION['username']);
        unset($_SESSION['nsmle']);
        
        Flasher::setFlash('Thank you for changing your password. Please login!', 'primary');
        header('Location: ' . BASEURL . '/admin/auth/signin');
    }
    
    public function logout()
    {
      // UNSET SESSION
      session_destroy();
      // UNSET COOKIES
      if (isset($_SERVER['HTTP_COOKIE'])) {
          $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
          foreach($cookies as $cookie) {
              $parts = explode('=', $cookie);
              $name = trim($parts[0]);
              setcookie($name, '', time()-(60 * 60 * 24 * 7 ));
              setcookie($name, '', time()-(60 * 60 * 24 * 7 ), '/');
          }
      };
      // Set flash message and redirect to login page
      Flasher::setFlash('Thank you, you have left!', 'primary');
      header('Location: ' . BASEURL . '/admin/auth/signin');
    }
    
    
    // Featured Register
    
      
    
    public function signup()
    {
      //Check REGISTRATION_FEATURE
      $this->authentication()->checkRegistrationFeature();
      
      $this->view('Admin/Auth/Layout/Header');
      $this->view('Admin/Auth/SignUp');
      $this->view('Admin/Auth/Layout/Footer');
      
    }
    
    public function signupverify()
    {
      $this->authentication()->checkRegistrationFeature();
      
      $name = $_POST['name'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];
      $this->authentication()->activationRegistration($name, $username, $email, $phone, $password);
    }
    
    public function activation()
    {
      // Check Feature Signup
      $this->authentication()->checkRegistrationFeature();
      
      $this->view('Admin/Auth/Layout/Header');
      $this->view('Admin/Auth/ActivationAccount');
      $this->view('Admin/Auth/Layout/Footer');
    }
    
    public function verifycodesignup()
    {
      //Check Feature Registration
      $this->authentication()->checkRegistrationFeature();
      
      if ( isset($_POST['verifycode']) ) {
        $verifyCode = $_POST['verifycode'];
      } else {
        $verifyCode = uriSegment(3);
      }
      
      $this->authentication()->verifyCodeSignup($verifyCode);
    }
}