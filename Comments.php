<?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");?>
<?php require_once("Includes/Sessions.php");?>
<?php
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
// echo $_SESSION["TrackingURL"];
Confirm_Login();?>
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

    <title>Comments</title>
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
        <h1><i class="fa fa-comments" style="color:#27aae1"></i>Manage Comments</h1>
      </div>
    </div>
  </div>
</header>
<!--Heading ENDS-->
<!--Main BEGINS-->

<section class="container py-2 mb-4">
  <div class="row" style="min-height:30px">
  <div class="col-lg-12" style="min-height:400px">
    <?php
    echo ErrorMessage();
    echo SuccessMessage();
    ?>
    <h2>Un-Approved Comments</h2>
    <table class="table table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th>No.</th>
          <th>Date&Time</th>
          <th>Name</th>
          <th>Comment</th>
          <th>Approve</th>
          <th>Action</th>
          <th>Details</th>
        </tr>
      </thead>
    <?php
      global $ConnectingDB;
      $sql = "SELECT * FROM comments WHERE status='OFF' ORDER BY id desc";
      $Execute =$ConnectingDB->query($sql);
      $SrNo = 0;
      while ($DataRows=$Execute->fetch()) {
        $CommentId = $DataRows["id"];
        $DateTimeOfComment = $DataRows["datetime"];
        $CommenterName = $DataRows["name"];
        $CommentContent = $DataRows["comment"];
        $CommentPostId = $DataRows["post_id"];
        $SrNo++;
     ?>
     <tbody>
       <tr>
         <td><?php echo htmlentities($SrNo); ?></td>
         <td><?php echo htmlentities($DateTimeOfComment); ?></td>
         <td><?php echo htmlentities($CommenterName); ?></td>
         <td><?php echo htmlentities($CommentContent);?></td>
         <td> <a href="ApproveComments.php?id=<?php echo $CommentId; ?>" class="btn btn-success">Approve</a></td>
         <td> <a href="DeleteComments.php?id=<?php echo $CommentId; ?>" class="btn btn-danger">Delete</a></td>
         <td style="min-width:140px;"><a class="btn btn-primary" href="FullPost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a></td>
       </tr>
     </tbody>
   <?php  } ?>
     </table>
     <h2>Approved Comments</h2>
     <table class="table table-striped table-hover">
       <thead class="thead-dark">
         <tr>
           <th>No.</th>
           <th>Date&Time</th>
           <th>Name</th>
           <th>Comment</th>
           <th>Revert</th>
           <th>Action</th>
           <th>Details</th>
         </tr>
       </thead>
     <?php
       global $ConnectingDB;
       $sql = "SELECT * FROM comments WHERE status='ON' ORDER BY id desc";
       $Execute =$ConnectingDB->query($sql);
       $SrNo = 0;
       while ($DataRows=$Execute->fetch()) {
         $CommentId = $DataRows["id"];
         $DateTimeOfComment = $DataRows["datetime"];
         $CommenterName = $DataRows["name"];
         $CommentContent = $DataRows["comment"];
         $CommentPostId = $DataRows["post_id"];
         $SrNo++;
      ?>
      <tbody>
        <tr>
          <td><?php echo htmlentities($SrNo); ?></td>
          <td><?php echo htmlentities($DateTimeOfComment); ?></td>
          <td><?php echo htmlentities($CommenterName); ?></td>
          <td><?php echo htmlentities($CommentContent);?></td>
          <td style="min-width:140px;"> <a href="DisApproveComments.php?id=<?php echo $CommentId; ?>" class="btn btn-warning">Dis-Approve</a></td>
          <td> <a href="DeleteComments.php?id=<?php echo $CommentId; ?>" class="btn btn-danger">Delete</a></td>
          <td style="min-width:140px;"><a class="btn btn-primary" href="FullPost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a></td>
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
