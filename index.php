<?php
require_once 'core/init.php';

// User instance
$user = new User();

// if User is already logged in 
if ($user->isLoggedIn()) {
  Redirect::to('landingpage.php');
}

// Checks input and redirects to landing page if valid credentials
if (Input::exists()) {
  if (Token::check(Input::get('token'))) {
    $user = new User();

    if ($user->isLoggedIn()) {
      Redirect::to('landingpage.php');
    } else {

      // implementation of login check in User.php


      $login = $user->login(Input::get('mail'), Input::get('pass'));

      if ($login) {
        Redirect::to('landingpage.php');
      } else {

        echo "<script type=\"text/javascript\">alert(\"Wrong Credentials - Login Failed\");</script>";
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Faculty Profile</title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- HEADER -->
  <header id="main-header" class="py-5 bg-info text-white">
    <div class="container">
      <div class="text-center">
        <h1>Faculty Profile</h1>
      </div>
    </div>
  </header>

  <!-- Sign up -->
  <!-- 
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row justify-content-end">
        <a href="signup.php" class="col-2 btn btn-outline-dark btn-block align-self-end justify-content-end mx-3">Sign up</a>
      </div>
    </div>
  </section> 
-->

  <!-- LOGIN FORM-->
  <section id="login" style="min-height:382px">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4><i class="fa fa-user text-center mx-auto"></i> Login</h4>
            </div>
            <div class="card-body">
              <form action="index.php" method="post">
                <div class="form-group">
                  <label>Email<span class="m-1 text-primary">*</span></label>
                  <input type="text" class="form-control" required name="mail">
                </div>
                <div class="form-group">
                  <label>Password<span class="m-1 text-primary">*</span></label>
                  <input type="password" class="form-control" required name="pass">
                </div>
                <input type="submit" class="btn btn-info btn-block" value="Login">
                <br>
                <!-- <p class="text-dark text-muted">Not registered? <a href="signup.php">Create an account</a></p> -->
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br><br><br>
  <br><br><br>
  <br><br><br>
  <br><br><br>
  <footer id="main-footer" class="bg-dark text-white mt-5 p-3">
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="text-muted text-center">Faculty Profile Login</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor1');
  </script>
</body>

</html>