<?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");?>
<?php require_once("Includes/Sessions.php");?>
<?php
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
// echo $_SESSION["TrackingURL"];
 Confirm_Login();?>
<?php if (isset($_POST["Submit"])){
$Category = $_POST["CategoryTitle"];
$Admin = $_SESSION["UserName"];
$CurrentTime=time();
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

if (empty($Category)) {
  $_SESSION["ErrorMessage"] = "All fields must be filled out ";
  Redirect_to("Categories.php");
}elseif (strlen($Category)<3) {
  $_SESSION["ErrorMessage"] = "Category title should be greater than 2 characters";
  Redirect_to("Categories.php");
}elseif (strlen($Category)>49) {
  $_SESSION["ErrorMessage"] = "Category title should be less than 50 characters";
  Redirect_to("Categories.php");
}else {
  $sql = "INSERT INTO category(title,author,datetime)";
  $sql.= "VALUES(:categoryName,:adminName,:dateTime)";
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':categoryName',$Category);
  $stmt->bindValue(':adminName',$Admin);
  $stmt->bindValue(':dateTime',$DateTime);
  $Execute=$stmt->execute();

  if($Execute){
    $_SESSION["SuccessMessage"]="Category with id : ".$ConnectingDB->lastInsertId()."Added Successfully";
    Redirect_to("Categories.php");
  }else {
    $_SESSION["ErrorMessage"]="Something went wrong.Try Again";
    Redirect_to("Categories.php");
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrapjquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/proper.js"></script>
    <script src="js/tooltip.js"></script>

    <title>Categories</title>
    <style>
      section{
        width: 100vw;
        height: 100vh;
        padding: 50px;
      }
      .cl_white{
        color: white;
      }
    </style>
  </head>
  <body>
    <!--NAVBAR Start-->
    <div style="height:10px; background:grey"></div>
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <div class="container">
    <img src="images/logo-white.png" alt="">
    
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon">

        </span>
    </button>
      <div class="collapse navbar-collapse" id="navbarcollapseCMS">
    <ul class="navbar-nav ml-auto"  >
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
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="navbar-item">
        <a href="Logout.php" class="nav-link text-danger"><i class="fa fa-user-times"></i>Admin Logout</a>
      </li>
    </ul>
    </div>
  </div>
</nav>
<div style="height:10px; background:grey"></div>
<!-- header -->
<header class="bg-dark text-white py-3">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1><i class="fa fa-edit text-success"></i> Manage Categories</h1>
    </div>
  </div>
</div>
</header>

<!--Main BEGINS-->
<section class="container py-3 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:37 0px;">
      <?php
      echo ErrorMessage();
      echo SuccessMessage();
      ?>
      <form class="" action="Categories.php" method="post">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-header">
             <h1>Add New Category</h1>
          </div>
          <div class="card-body bg-dark">
            <div class="form-group">
              <label for="title"> <span class="FieldInfo"> Category Title: </span></label>
              <input class="form-control" type="text" name="CategoryTitle" id="title" placeholder="Type title here" value="">
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
      <h2>Existing Categories</h2>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th>No.</th>
            <th>Date&Time</th>
            <th>Category Name</th>
            <th>Creator Name</th>
            <th>Action</th>
          </tr>
        </thead>
      <?php
        global $ConnectingDB;
        $sql = "SELECT * FROM category ORDER BY id desc";
        $Execute =$ConnectingDB->query($sql);
        $SrNo = 0;
        while ($DataRows=$Execute->fetch()) {
          $CategoryId = $DataRows["id"];
          $CategoryDate = $DataRows["datetime"];
          $CategoryName = $DataRows["title"];
          $CreatorName = $DataRows["author"];
          $SrNo++;
       ?>
       <tbody>
         <tr>
           <td><?php echo htmlentities($SrNo); ?></td>
           <td><?php echo htmlentities($CategoryDate); ?></td>
           <td><?php echo htmlentities($CategoryName); ?></td>
           <td><?php echo htmlentities($CreatorName);?></td>
           <td> <a href="DeleteCategory.php?id=<?php echo $CategoryId; ?>" class="btn btn-danger">Delete</a></td>

         </tr>
       </tbody>
     <?php  } ?>
       </table>
    </div>
  </div>
</section>
<!--Main ENDS-->


<!--FOOTER BEGINS-->
<div style="height:10px; background:#4a5357;"></div>
<footer class="bg-dark text-white">
<div class="container">
  <div class="row">
    <div class="col">
      <p class="lead text-center">BlindCommunication.com| <span id="year"></span>&copy; --All right Reserved</p>
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
