<?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");?>
<?php require_once("Includes/Sessions.php");?>
<?php
if (isset($_SESSION["UserId"])) {
  Redirect_to("Dashboard.php");
}
if(isset($_POST["Submit"])){
  $Username = $_POST["Username"];
  $Password = $_POST["Password"];
  if(empty($Username)||empty($Password)){
    $_SESSION["ErrorMessage"] = "All fields must be filled out";
    Redirect_to("Login.php");
  }else {
    // code...for checking username and password from database
    $Found_Account= Login_Attempt($Username,$Password);
    if($Found_Account){
      $_SESSION["UserId"]=$Found_Account["id"];
      $_SESSION["UserName"]=$Found_Account["username"];
      $_SESSION["AdminName"]=$Found_Account["aname"];
      $_SESSION["SuccessMessage"] = "Welcome Admin ".$_SESSION["AdminName"];
      if (isset($_SESSION["TrackingURL"])) {
         Redirect_to($_SESSION["TrackingURL"]);
        // code...
      }else {
      Redirect_to("Dashboard.php");
    }
      }else {
      $_SESSION["ErrorMessage"]="Incorrect Username/Password";
      Redirect_to("Login.php");
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <meta http-equiv="X_UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Css/bootstrap.css">
    <link rel="stylesheet" href="Css/fonts.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="Css/style.css">
    <script src="js/bootstrapjquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/proper.js"></script>
    <script src="js/tooltip.js"></script>

    <title>Login</title>
  </head>
  <body>
    <!--NAVBAR Start-->
    <div style="height:10px; background:grey"></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <img src="images/logo-white.png"  alt="">
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon">

        </span>
    </button>
      <div class="collapse navbar-collapse ml-auto" id="navbarcollapseCMS">
      <ul class="navbar-nav ml-auto" >
<li class="nav-item">
          <button class="btn btn-success"><a href="Home.php" class="nav-link text-white">Back Home</a></button>
      </li>
</ul>
    </div>
  </div>
</nav class="navbar navbar-expand-lg navbar-dark bg-dark">


<div style="height:10px; background:grey"></div>
<!--Navbar END-->

<!--Heading BEGINS-->
<header class="bg-dark text-white py-3"><!--padding (py-3 both side)t-top,b-bottom,r-right,l-left-->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      </div>
    </div>
  </div>
</header>
<!--Heading ENDS-->
<section class="container py-2 mb-4"  style="min-height:470px;">
<div class="row">
   <div class="offset-sm-3 col-sm-6" style="min-height:453px;">
     <br><br><br>
     <?php
        echo ErrorMessage();
        echo SuccessMessage();
      ?>
<div class="card bg-secondary text-light">
<div class="card-header">
  <h4>Welcome Back !</h4>
  </div>
<div class="card-body bg-dark">

<form class="" action="Login.php" method="post">
  <div class="form-group">
    <label for="username"><span class="FieldInfo">Username: </span></label>
      <div class="input-group mb-3">
       <div class="input-group-prepend">
        <span class="input-group-text text-white bg-info"> <i class="fa fa-user"></i></span>
     </div>
  <input type="text" class="form-control" name="Username" id="username" value="">
</div>
</div>
<div class="form-group">
  <label for="password"><span class="FieldInfo">Password: </span></label>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text text-white bg-info"> <i class="fa fa-lock"></i></span>
      </div>
    <input type="password" class="form-control" name="Password" id="password" value="">
   </div>
</div>
<input type="submit" name="Submit" class="btn btn-info btn-block" value="Login">
</form>
</div>
</div>
   </div>
</div>
</section>
<!--FOOTER BEGINS-->
<footer class="bg-dark text-white">
<div class="container">
  <div class="row">
    <div class="col">
      <p class="lead text-center">Theme By | Sam | <span id="year"></span>&copy; --All right Reserved</p>
    </div>
  </div>
</div>
</footer>
<div style="height:10px; background:grey"></div>
<!--FOOTER ENDS-->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script>
  $('#year').text(new Date().getFullYear());
</script>
</body >
</html>
