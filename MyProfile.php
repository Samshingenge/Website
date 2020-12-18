<?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");?>
<?php require_once("Includes/Sessions.php");?>
<?php
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
 Confirm_Login();?>
<?php
// fethching the Admin Data
$AdminId = $_SESSION["UserId"];
global $ConnectingDB;
$sql = "SELECT * FROM admins WHERE id='$AdminId'";
$stmt = $ConnectingDB->query($sql);
while ($DataRows=$stmt->fetch()) {
    $ExistingName = $DataRows["aname"];
    $ExistingUsername = $DataRows["username"];
    $ExistingHeadline = $DataRows["aheadline"];
    $ExistingBio = $DataRows["abio"];
    $ExistingImage = $DataRows["aimage"];

}
// fethching the Admin Data end
 if (isset($_POST["Submit"])){
$AName = $_POST["Name"];
$AHeadline = $_POST["Headline"];
$ABio = $_POST["Bio"];
$Image = $_FILES["Image"]["name"];
$Target = "Images/".basename($_FILES["Image"]["name"]);


 if (strlen($AHeadline )>30) {
  $_SESSION["ErrorMessage"] = "Headline should be less than 30 characters";
  Redirect_to("MyProfile.php");
}elseif (strlen($ABio)>500) {
  $_SESSION["ErrorMessage"] = "Post Description should be less than 500 characters";
  Redirect_to("MyProfile.php");
}else {
  //Query to update Adim Data in Db when everything is fine
  global $ConnectingDB;
  if (!empty($_FILES["Image"]["name"])) {
    $sql = "UPDATE admins
            SET aname='$AName', aheadline='$AHeadline', abio='$ABio', aimage='$Image'
            WHERE id='$AdminId'";
  }else {
    $sql = "UPDATE admins
            SET aname='$AName', aheadline='$AHeadline', abio='$ABio'
            WHERE id='$AdminId'";
  }
      $Execute=$ConnectingDB->query($sql);
  move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);

  if($Execute){
    $_SESSION["SuccessMessage"]="Detailss UPDATE Successfully";
    Redirect_to("MyProfile.php");
  }else {
    $_SESSION["ErrorMessage"]="Something went wrong.Try Again";
    Redirect_to("MyProfile.php");
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

    <title>My Profile</title>
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
      <div class="collapse navbar-collapse" id="navbarcollapseCMS">
    <ul class="navbar-nav mr-auto"  >
      <li class="nav-item">
          <a href="MyProfile.php" class="nav-link"><i class="fa fa-user text-success"></i> My Pofile</a>
      </li>
      <li class="nav-item">
          <a href="Dashboard.php" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item">
          <a href="Posts.php" class="nav-link">Posts</a>
      </li>
      <li class="nav-item">
          <a href="Categories.php" class="nav-link">Categories</a>
      </li>
      <li class="nav-item">
          <a href="Admins.php" class="nav-link">Manage Admins</a>
      </li>
      <li class="nav-item">
          <a href="Comments.php" class="nav-link">Comments</a>
      </li>
      <li class="nav-item">
          <a href="news.php?page=1 " class="nav-link">Live News</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="navbar-item">
        <a href="Logout.php" class="nav-link text-danger"><i class="fa fa-user-times"></i> Logout</a>
      </li>
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
      <div class="col-md-12">
        <h1><i class="fa fa-user text-success mr-2" ></i>@<?php echo htmlentities($ExistingUsername); ?></h1>
        <small><?php echo htmlentities($ExistingHeadline);  ?></small>
      </div>
    </div>
  </div>
</header>
<!--Heading ENDS-->

<!--Main BEGINS-->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="col-md-3">
<div class="card">
  <div class="card-header bg-dark text-light">
    <h3><?php echo htmlentities($ExistingName);  ?></h3>
  </div>
<div class="card-body">
  <img src="Images/<?php echo htmlentities($ExistingImage); ?>" class="block img-fluid mb-3" alt="">
  <div class="text-center text-success">
    <?php echo htmlentities($ExistingHeadline); ?>
  </div>
<div class="">
  <?php echo htmlentities($ExistingBio); ?>
</div>
</div>

</div>
    </div>

    <div class="col-md-9" style="min-height:37 0px;">
      <?php
      echo ErrorMessage();
      echo SuccessMessage();
      ?>
      <form class="" action="MyProfile.php" method="post" enctype="multipart/form-data">
        <div class="card bg-dark text-light">
          <div class="card-header bg-secondary text-light">
            <h4>Edit Profile</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <input class="form-control" type="text" name="Name" id="title" placeholder="Your Name" value="">

            </div>
            <div class="form-group">
              <input class="form-control" type="text"  id="title" placeholder="Headline" name="Headline">
              <small class="text-muted"> Add a Professional headline like,'Engineer' at XYZ or 'Architect' </small>
              <span class="text-danger">Not more than 30 characters</span>
            </div>
            <div class="form-group">

              <textarea placeholder="Bio" class="form-control" id="Post" name="Bio" rows="8" cols="80"></textarea>
            </div>
            <div class="form-group">
            <div class="custom-file">
              <input class="custom-file-input" type="File" name="Image" id="imageSelect" value="">
              <label for="imageSelect" class="custom-file-label">Select image</label>
            </div>
            </div>

            <div class="row">
              <div class="col-lg-6 mb-2">
                <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fa fa-arrow-left"></i> Back to Dashboard</a>
              </div>
              <div class="col-lg-6 mb-2">
                <button type="submit" name="Submit" class="btn btn-success btn-block">
                  <i class="fa fa-check"></i> Publish
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!--Main ENDS-->


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
