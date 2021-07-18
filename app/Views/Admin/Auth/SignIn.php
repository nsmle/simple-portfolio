    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-11 col-md-10 py-3 justify-content-center text-center rounded login bg-blue">
          <img src="<?= BASEURL ?>/assets/img/fikipratama.jpg" alt="Fiki Pratama" width="150" class="rounded-circle mt-2 mb-3 my-md-4"/>
          <h3 style="color:#eee;">WELCOME</h3>
          <p style="color:#eee;">Sign in by entering the information below</p>
          <div class="mx-2 mx-md-5 py-2">
              <?= Flasher::flash() ?>
            <form action="<?= BASEURL; ?>/admin/auth/signinVerify" method="post">
              <div class="mb-3 mb-md-4">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
              </div>
              <div class="mb-3 mb-md-4">
                <input type="password" class="form-control" id="password"  placeholder="Password" name="password" required>
              </div>
              <div class="mb-3 mb-md-4 form-check">
                <input type="checkbox" value="yes" name="remember" class="form-check-input" id="rememberme">
                <label class="form-check-label float-start" for="rememberme" style="color:#eee;">Remember me</label>
                <a class="float-end" href="<?= BASEURL ?>/admin/auth/forgotpassword">Forgot password</a>
              </div>
              <button type="submit" class="btn btn-contact mt-2" style="width:100%;">login</button>
            </form>
            <div class="text-center ">
              <p class="mb-0">Don't have an account?</p>
              <?php if ( REGISTRATION_FEATURE == true ) { ?>
              <a href="<?= BASEURL ?>/admin/auth/signup">Sign Up</a>
              <?php } else { ?>
              <a href="mailto:<?= MAIL_USERNAME ?>">Contact Admin</a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>