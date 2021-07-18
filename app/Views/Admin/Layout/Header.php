<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="robots" content="max-image-preview:standard">
    <meta name="keywords" content="Full Stack Web Develpper, HTML, CSS, JavaScript, Codeigniter, Bootstrap ">
    <meta name="description" content="I'm a full stack web developer from South Sumatra, Indonesia, building with Codeigniter 4, Bootstrap 5, and vanilla.js currently. Into projectss, games and building useful products. Collaborate with multiple people and teams or work alone on a projects, Please contact me for more information.">
    <meta name="author" content="Fiki Pratama">
    <!-- Google Verification -->
    <meta name="google-site-verification" content="zlh_UoJTEgz0lut1DdfjcfRAWB7fTiFR2wYeJcBeipA" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/main.css">
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
    
    
    <title><?= $data['title'] ?></title>
  </head>
  <body>
    
  <!-- Start Header Desktop -->
  <div class="fixed-top d-none d-md-block">
    <nav class="navbar navbar-expand bg-bluelight">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASEURL ?>/admin">Nsmle</a>
        <div class="collapse navbar-collapse justify-content-end" id="nav-menu">
          <ul class="navbar-nav jusify-content-center">
            <li class="nav-item nav-item-desktop">
              <a class="nav-link <?php if (empty(uriSegment(1)) || uriSegment(1) == 'home' ) echo "active" ?>"  href="<?= BASEURL ?>/admin/home"><i class="bi bi-house me-2"></i>Home</a>
            </li>
            <li class="nav-item nav-item-desktop">
              <a class="nav-link <?php if (uriSegment(1) == 'contact') echo "active" ?>" href="<?= BASEURL ?>/admin/contact"><i class="bi bi-person-lines-fill me-2"></i>Contact</a>
            </li>
            <li class="nav-item nav-item-desktop">
              <a class="nav-link <?php if (uriSegment(1) == 'projects') echo "active" ?>" href="<?= BASEURL ?>/admin/projects"><i class="bi bi-terminal me-2"></i>projects</a>
            </li>
            <li class="nav-item nav-item-desktop">
              <a data-bs-toggle="modal" data-bs-target="#modalAccount" class="nav-link <?php if (uriSegment(1) == 'profile') echo "active" ?>"><i class="bi bi-person-circle me-2"></i>Profile</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!-- End Header Desktop -->
  
  
  <!-- Start Header Top Mobile -->
  <div class="fixed-top d-md-none" id="navbar">
    <nav class="navbar stinky-top navbar-expand bg-bluelight">
      <div class="container-fluid justify-content-center">
        <a class="navbar-brand" href="<?= BASEURL ?>/admin">
          <img src="<?= BASEURL ?>/assets/img/fikipratama.jpg" class="rounded-circle" alt="fp-logo" width="30" height="30">
          nsmle
        </a>
      </div>
    </nav>
  </div>
  <!-- End Header Top Mobile -->
  
  <!-- Start Header Bottom Mobile -->
  <div class="fixed-bottom" id="navbar-bottom">
    <nav class="navbar navbar-dark bg-bluelight navbar-expand d-sm-none d-md-none d-lg-none d-xl-none" oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;' ondragstart='return false' onselectstart='return false' style='-moz-user-select: none; cursor: default;'>
      <ul class="navbar-nav nav-bottom nav-justified w-100">
        <li class="nav-item nav-item-mobile">
          <a href="<?= BASEURL; ?>/admin" class="nav-link nav-link-icons <?php if (empty(uriSegment(1)) || uriSegment(1) == 'home' ) echo "active" ?>">
            <i class="bi bi-house icons"></i>
          </a>
        </li>
        <li class="nav-item nav-item-mobile">
          <a href="<?= BASEURL; ?>/admin/contact" class="nav-link nav-link-icons <?php if (uriSegment(1) == 'contact') echo "active" ?>">
            <i class="bi bi-person-lines-fill icons"></i>
          </a>
        </li>
        <li class="nav-item nav-item-mobile">
          <a href="<?= BASEURL; ?>/admin/projects" class="nav-link nav-link-icons <?php if (uriSegment(1) == 'projects') echo "active" ?>">
            <i class="bi bi-terminal icons"></i>
          </a>
        </li>
        <li class="nav-item nav-item-mobile">
          <a data-bs-toggle="modal" data-bs-target="#modalAccount" class="nav-link nav-link-icons <?php if (uriSegment(1) == 'profile') echo "active" ?>">
            <i class="bi bi-person-circle icons"></i>
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <!-- End Header Bottom Mobile -->
  
  <!-- Modal Account -->
  <div class="modal fade" id="modalAccount" tabindex="-1" aria-labelledby="bodyModalAccount" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-modals">
      <div class="modal-header">
        <h5 class="modal-title" id="bodyModalAccount">Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-danger">
        This feature is not yet perfected
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="<?= BASEURL ?>/admin/auth/logout" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
      </div>
    </div>
  </div>
</div>
  <!-- End Modal Account -->
  
    <div id="wrap">