    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-11 col-md-10 py-3 justify-content-center text-center rounded login bg-blue">
          <img src="<?= BASEURL ?>/assets/img/fikipratama.jpg" alt="Fiki Pratama" width="150" class="rounded-circle mt-2 mb-3 my-md-4"/>
          <p style="color:#eee;">Please enter your new password.</p>
          <div class="mx-2 mx-md-5 py-2">
              <?= Flasher::flash() ?>
            <form action="" method="post" id="reset-password">
              <div class="mb-3 mb-md-4">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
              </div>
              <div class="mb-3 mb-md-4">
                <input type="password" class="form-control" id="re-Password"  placeholder="Rewrite Password" name="re-Password" required>
                <div class="invalid-feedback">
                  Password is not the same.
                </div>
              </div>
              <button type="submit" class="btn btn-contact mt-2" style="width:100%;">Reset Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
<script>
let password = document.getElementById('password');
let rePassword = document.getElementById('re-Password');
rePassword.addEventListener('keyup', function() {
    if ( password.value !== rePassword.value ) {
        password.classList.add('is-invalid');
        rePassword.classList.add('is-invalid');
        document.getElementById("reset-password").action = "";
    } else if ( password.value == rePassword.value ) {
        password.classList.remove('is-invalid');
        rePassword.classList.remove('is-invalid');
        document.getElementById("reset-password").action = "<?= BASEURL; ?>/admin/auth/resetPwd";
    }
})
</script>