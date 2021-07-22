<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-6 text-center mb-5">
      </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-11 col-md-10 py-3 justify-content-center text-center rounded login bg-blue">
      <img src="<?= BASEURL ?>/assets/img/fikipratama.jpg" alt="Fiki Pratama" width="150" class="rounded-circle mt-2 mb-3 my-md-4"/>
      <h3 style="color:#eee;">HELLO</h3>
      <p style="color:#eee;">Please register by filling in some information below!</p>
      <?= Flasher::flash() ?>
      <div class="mx-2 mx-md-5 py-2">
        <form action="<?= BASEURL; ?>/admin/auth/signupverify" method="post">
          <div class="mb-3 mb-md-4">
            <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" required>
          </div>
          <div class="mb-3 mb-md-4">
            <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
          </div>
          <div class="mb-3 mb-md-4">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
          </div>
          <div class="mb-3 mb-md-4">
            <input type="number" class="form-control" id="phone" placeholder="Mobile No" name="phone" required>
          </div>
          <div class="mb-3 mb-md-4">
            <input type="password" class="form-control" id="password"  placeholder="Password" name="password" required>
            <div class="invalid-feedback" id="invalid-feedback">
              Password is too short!
            </div>
          </div>
          <div class="mb-3 mb-md-4">
            <input type="password" class="form-control" id="re-password"  placeholder="Re-Password" name="re-password" required>
            <div class="invalid-feedback">
              Re-Password is not the same Password!
            </div>
          </div>
          <button type="submit" id="btn-submit" class="btn btn-contact mt-2" style="width:100%;">Sign Up</button>
        </form>
        <div class="text-center ">
          <p class="mb-0">Already have an account?</p>
          <a href="<?= BASEURL ?>/admin/auth/signin">Sign In</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
let password = document.getElementById('password');
let rePassword = document.getElementById('re-password');
let passVal = document.getElementById('password').value;
let rePassVal = document.getElementById('re-password').value;
//let invalid = document.getElementById('invalid-feedback');
  

document.getElementById('password').addEventListener('keyup', function() {
  if ( document.getElementById('password').value.length < 8 ) {
    document.getElementById('password').classList.add('is-invalid');
    document.getElementById('btn-submit').type = 'button';
  } else {
    document.getElementById('password').classList.remove('is-invalid');
    document.getElementById('btn-submit').type = 'submit';
  }
  
});

document.getElementById('re-password').addEventListener('keyup', function() {
  if ( document.getElementById('re-password').value != document.getElementById('password').value ) {
    document.getElementById('re-password').classList.add('is-invalid');
    document.getElementById('btn-submit').type = 'button';
  } else {
    document.getElementById('re-password').classList.remove('is-invalid');
    document.getElementById('btn-submit').type = 'submit';
    
  }
});
</script>