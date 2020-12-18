<?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");?>
<?php require_once("Includes/Sessions.php");?>
<!-- fetching existing data -->
<?php
$SearchQueryParameter = $_GET["username"];
global $ConnectingDB;
$sql = "SELECT aname,aheadline,abio,aimage FROM admins WHERE username=:userName";
$stmt=$ConnectingDB->prepare($sql);
$stmt->bindValue('userName',$SearchQueryParameter);
$stmt->execute();
$Result = $stmt->rowcount();
if ($Result==1) {
  while ($DataRows = $stmt->fetch()) {
    $ExistingName = $DataRows["aname"];
    $ExistingBio = $DataRows["abio"];
    $ExistingImage = $DataRows["aimage"];
    $ExistingHeadline = $DataRows["aheadline"];
  }
  // code...
}else {
  $_SESSION["ErrorMessage"]="Bad Request !!";
  Redirect_to("Blog.php?page=1"); 
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

    <title>Profile</title>
  </head>
  <body>
    <!--NAVBAR Start-->
<div style="height:10px; background:grey"></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <img src="images/white-logo.png" class="mr-5" alt="">
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon">

        </span>
    </button>
      <div class="collapse navbar-collapse" id="navbarcollapseCMS">
    <ul class="navbar-nav mr-auto"  >

      
      <li class="nav-item">
          <a href="news.php?page=1" class="nav-link"> Back to News</a>
      </li>
     
    </ul>
    <ul class="navbar-nav ml-auto">
      <form class="form-inline d-none d-sm-block" action="Blog.php">
        <div class="form-group">
          <input class="form-control mr-2" type="text" name="Search" placeholder="Search here" value="">
          <button class="btn btn-primary" name="SearchButton">Go</button>
        </div>
      </form>
    </ul>
    </div>
  </div>
</nav>
<div style="height:10px; background:grey"></div>
<!--Navbar END-->
<!--Heading BEGINS-->
<header class="bg-dark text-white py-3"><!--padding (py-3 both side)t-top,b-bottom,r-right,l-left-->
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1><i class="fa fa-user text-success mr-2"  style="color:#27aae1"></i><?php echo $ExistingName;  ?></h1>
        <h3><?php echo $ExistingHeadline; ?></h3>
      </div>
    </div>
  </div>
</header>
<!--Heading ENDS-->
<section class="container py-2 mb-4">
  <div class="row">
   <div class="col-md-3">
     <img src="Images/<?php echo $ExistingImage; ?>" class="d-block img-fluid mb-3 rounded-circle" alt="">
   </div>
   <!-- Footer adjesment -->
   <div class="col-md-9" style="min-height:575px;">
     <div class="card">
       <div class="card-body">
         <p class="lead"><?php echo $ExistingBio; ?></p>
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
