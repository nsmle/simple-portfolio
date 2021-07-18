<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <meta name="author" content="Fiki Pratama">
    <!-- Google Verification -->
    <meta name="google-site-verification" content="zlh_UoJTEgz0lut1DdfjcfRAWB7fTiFR2wYeJcBeipA" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= BASEURL ?>/assets/img/Icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= BASEURL ?>/assets/img/Icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= BASEURL ?>/assets/img/Icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= BASEURL ?>/assets/img/Icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= BASEURL ?>/assets/img/Icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= BASEURL ?>/assets/img/Icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= BASEURL ?>/assets/img/Icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= BASEURL ?>/assets/img/Icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASEURL ?>/assets/img/Icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= BASEURL ?>/assets/img/Icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASEURL ?>/assets/img/Icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= BASEURL ?>/assets/img/Icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASEURL ?>/assets/img/Icons/favicon-16x16.png">
    
    <title>Sign Up</title>
  </head>
  <body>
    
    
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-11 col-md-10 py-3 justify-content-center text-center rounded login bg-blue">
          <img src="<?= BASEURL ?>/assets/img/fikipratama.jpg" alt="Fiki Pratama" width="150" class="rounded-circle mt-2 mb-3 my-md-4"/>
          <div class="mx-2 mx-md-5 py-2">
            <form action="<?= BASEURL; ?>/admin/auth/signupVerify" method="post">
              <div class="mb-3 mb-md-4">
                <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" required autocomplete="off">
              </div>
              <div class="mb-3 mb-md-4">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required autocomplete="off">
              </div>
              <div class="mb-3 mb-md-4">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required autocomplete="off">
              </div>
              <div class="mb-3 mb-md-4">
                <input type="number" class="form-control" id="phone" placeholder="Mobile No" name="phone" required autocomplete="off">
              </div>
              <div class="mb-3 mb-md-4">
                <input type="password" class="form-control" id="password"  placeholder="Password" name="password" required autocomplete="off">
              </div>
              <button type="submit" class="btn btn-contact mt-2" style="width:100%;">Sign Up</button>
            </form>
            <div class="text-center ">
              <p class="mb-0">Already have an account?</p>
              <a href="<?= BASEURL ?>/admin/auth/signin">Sign In</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    
    
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>