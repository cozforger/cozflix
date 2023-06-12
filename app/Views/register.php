<!DOCTYPE html>
<head>
  <title>Register</title>
<link rel="stylesheet" href="/asset/css/styles.css">
<body>
    <div class="header">
    <img src="/asset/css/img/Coz.png" />
  </div>
<div class="boxr">
<span class="borderline">
          <form id="free-quote" method="POST" action="/login">
                  <h2>Register Now</h2>
              <?php $validation = session()->getFlashdata('validation') ?>
              <div class="inputBox">
              <input type="text" name="nama" required="required" value="<?= old('nama') ?>">
                  <span>Name</span>
                  <i></i>
              </div>
              <div class="inputBox">
                  <input type="text" name="username" required="required" value="<?= old('username') ?>">
                  <span>Username</span>
                  <i></i>
              </div>
              <div class="inputBox">
                  <input type="password" name="password" required="required" value="<?= old('password') ?>">
                  <span>Password</span>
                  <i></i>
              </div>
              <div class="inputBox">
                  <input type="password" name="password_confirmation" required="required">
                  <span>Retype Password</span>
                  <i></i>
              </div>
              <div class="inputBox">
                  <input type="email" name="email" required="required">
                  <span>Input your email</span>
                  <i></i>
              </div>
              <input type="submit" value="Register">
              <div class="links">
              <a href="#"></a>
                    <a href="login">Have an account?</a>
                </div>
              </form>
</div>
</body>
</head>
</html>