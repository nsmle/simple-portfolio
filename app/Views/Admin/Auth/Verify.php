<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-6 text-center mb-5">
      </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-11 col-md-10 py-3 justify-content-center text-center rounded login bg-blue">
      <img src="<?= BASEURL ?>/assets/img/fikipratama.jpg" alt="Fiki Pratama" width="150" class="rounded-circle mt-2 mb-3 my-md-4"/>
      <p style="color:#eee;">Please enter your verification code sent to <?= $data['email'] ?>.</p>
      <div class="mx-2 mx-md-5 py-2">
        <form action="<?= BASEURL; ?>/admin/auth/verifycode" method="post">
          <div class="mb-3 mb-md-4">
            <input type="text" class="form-control" id="verifycode" placeholder="Your verification code" name="verifycode" required autocomplete="off">
          </div>
          <button type="submit" class="btn btn-contact mt-2" style="width:100%;">Verify</button>
        </form>
        <div class="text-center ">
          <p class="mb-0">Back to login page?</p>
          <a href="<?= BASEURL ?>/admin/auth/signin">Sign In</a>
        </div>
      </div>
    </div>
  </div>
</div>