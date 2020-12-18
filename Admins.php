<?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");?>
<?php require_once("Includes/Sessions.php");?>
<?php
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
Confirm_Login();?>

<?php if (isset($_POST["Submit"])){
$Username = $_POST["Username"];
$Name     = $_POST["Name"];
$Password = $_POST["Password"];
$ConfirmPassword = $_POST["ConfirmPassword"];
$Admin = $Admin = $_SESSION["UserName"];
$CurrentTime=time();
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

if (empty($Username)|| empty($Password)||empty($ConfirmPassword)) {
  $_SESSION["ErrorMessage"] = "All fields must be filled out ";
  Redirect_to("Admins.php");
}elseif (strlen($Password)<4) {
  $_SESSION["ErrorMessage"] = "Password should be greater than 3 characters";
  Redirect_to("Admins.php");
}elseif ($Password !== $ConfirmPassword){
  $_SESSION["ErrorMessage"] = "Password and Confirm Password should match";
  Redirect_to("Admins.php");
}elseif (CheckUserNameExistsOrNot($Username)){
  $_SESSION["ErrorMessage"] = "Username Exists. Try Another one ";
  Redirect_to("Admins.php");
}else {
  //Query to insert new admin in DB when everything is fine
  $sql = "INSERT INTO admins(datetime,username,password,aname,addedby)";
  $sql.= "VALUES(:dateTime,:userName,:password,:aName,:addminName)";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':dateTime',$DateTime);
  $stmt->bindValue(':userName',$Username);
  $stmt->bindValue(':password',$Password);
  $stmt->bindValue(':aName',$Name);
  $stmt->bindValue(':addminName',$Admin);
  $Execute=$stmt->execute();

  if($Execute){
    $_SESSION["SuccessMessage"]="New Admin with name of ".$Name." Added Successfully";
    Redirect_to("Admins.php");
  }else {
    $_SESSION["ErrorMessage"]="Something went wrong.Try Again";
    Redirect_to("Admins.php");
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

    <title>Admins Page</title>
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
        <h1><i class="fa fa-user" style="color:#27aae1"></i>Manage Admin </h1>
      </div>
    </div>
  </div>
</header>
<!--Heading ENDS-->

<!--Main BEGINS-->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:37 0px;">
      <?php
      echo ErrorMessage();
      echo SuccessMessage();
      ?>
      <form class="" action="Admins.php" method="post">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-header">
             <h1>Add New Admin</h1>
          </div>
          <div class="card-body bg-dark">
            <div class="form-group">
              <label for="username"> <span class="FieldInfo"> Username: </span></label>
              <input class="form-control" type="text" name="Username" id="username" value="">
            </div>
            <div class="form-group">
              <label for="Name"> <span class="FieldInfo"> Name : </span></label>
              <input class="form-control" type="name" name="Name" id="Name" value="">
              <small class="text-muted">Optional</small>
            </div>
            <div class="form-group">
              <label for="Password"> <span class="FieldInfo"> Password: </span></label>
              <input class="form-control" type="password" name="Password" id="Password" value="">
            </div>
            <div class="form-group">
              <label for="ConfirmPassword"> <span class="FieldInfo"> Confirm Password: </span></label>
              <input class="form-control" type="password" name="ConfirmPassword" id="ConfirmPassword" value="">
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
      <h2>Existing Admins</h2>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th>No.</th>
            <th>Date&Time</th>
            <th>Username</th>
            <th>Admin Name</th>
            <th>Added by</th>
            <th>Action</th>
          </tr>
        </thead>
      <?php
        global $ConnectingDB;
        $sql = "SELECT * FROM admins ORDER BY id desc";
        $Execute =$ConnectingDB->query($sql);
        $SrNo = 0;
        while ($DataRows=$Execute->fetch()) {
          $AdminId = $DataRows["id"];
          $DateTime = $DataRows["datetime"];
          $AdminUsername = $DataRows["username"];
          $AdminName = $DataRows["aname"];
          $AddedBy = $DataRows["addedby"];
          $SrNo++;
       ?>
       <tbody>
         <tr>
           <td><?php echo htmlentities($SrNo); ?></td>
           <td><?php echo htmlentities($DateTime); ?></td>
           <td><?php echo htmlentities($AdminUsername); ?></td>
           <td><?php echo htmlentities($AdminName);?></td>
            <td><?php echo htmlentities($AddedBy);?></td>
           <td> <a href="DeleteAdmin.php?id=<?php echo $AdminId; ?>" class="btn btn-danger">Delete</a></td>

         </tr>
       </tbody>
     <?php  } ?>
       </table>
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
