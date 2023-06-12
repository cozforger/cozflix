<!DOCTYPE html>
<head>
  <title>Sign in</title>
<link rel="stylesheet" href="/asset/css/styles.css">
<body>
    <div class="header">
    <img src="/asset/css/img/Coz.png" />
  </div>
<div class="box">
<span class="borderline">
          <form id="free-quote" method="POST" action="/login">
                  <h2>Sign in</h2>
              <?php $validation = session()->getFlashdata('validation') ?>
              <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('error') ?></div>
              <?php endif  ?>
              <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert"><?= session()->getFlashdata('success') ?></div>
              <?php endif  ?>
              <div class="inputBox">
                  <input type="text" name="username" id="username"  required="required" value="<?= old('username') ?>">
                  <span>Username</span>
                  <i></i>
              </div>
              <div class="inputBox">
                  <input type="password" name="password" id="password"  required="required" value="<?= old('password') ?>">
                  <span>Password</span>
                  <i></i>
              </div>
              <input type="submit" value="Login">
                  <div class="links">
                    <a href="#">Forgot Password</a>
                    <a href="register">Don't have an account?</a>
                </div>
         </form>
</div>
</body>
</head>
</html>
