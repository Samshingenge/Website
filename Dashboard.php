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

    <title>Dashboard</title>
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
        <h1><i class="fa fa-cog" style="color:#27aae1"></i>Dashboard</h1>
      </div>
      <div class="col-lg-3 mb-2">
        <a href="AddNewPost.php" class="btn btn-primary btn-block">
          <i class="fa fa-edit"></i> Add New Post
        </a>
      </div>
      <div class="col-lg-3 mb-2">
        <a href="Categories.php" class="btn btn-info btn-block">
          <i class="fa fa-folder"></i> Add New Category
        </a>
      </div>
      <div class="col-lg-3 mb-2">
        <a href="Admins.php" class="btn btn-warning btn-block">
          <i class="fa fa-user-plus"></i> Add New Admin
        </a>
      </div>
      <div class="col-lg-3 mb-2">
        <a href="Comments.php" class="btn btn-success btn-block">
          <i class="fa fa-check "></i> Approve Comments
        </a>
      </div>

    </div>
  </div>
</header>
<!--Heading ENDS-->

<!--Main area -->
<section class="container py-2 mb-4">
  <div class="row">
    <?php
    echo ErrorMessage();
    echo SuccessMessage();
    ?>
  <!--left side area BEGINS-->
  <div class="col-lg-2 d-none d-md-block">
  <div class="card text-center bg-dark text-white mb-3">
    <div class="card-body">
      <h1 class="lead">Posts</h1>
      <h4 class="display-5"></h4>
      <i class="fa fa-book"></i>
      <?php
      TotalPosts();
      ?>
    </div>
  </div>

  <div class="card text-center bg-dark text-white mb-3">
    <div class="card-body">
      <h1 class="lead">Categories</h1>
      <h4 class="display-5"></h4>
      <i class="fa fa-folder"></i>
      <?php
     TotalCategories();
      ?>
    </div>
  </div>

  <div class="card text-center bg-dark text-white mb-3">
    <div class="card-body">
      <h1 class="lead">Admins</h1>
      <h4 class="display-5"></h4>
      <i class="fa fa-users"></i>
      <?php
    TotalAdmins();
      ?>
    </div>
  </div>

  <div class="card text-center bg-dark text-white mb-3">
    <div class="card-body">
      <h1 class="lead">Comments</h1>
      <h4 class="display-5"></h4>
      <i class="fa fa-comments"></i>
      <?php
    TotalComments();
      ?>
    </div>
  </div>

  </div>
  <!--left side area ENDS-->
    <!--right side area BEGINS-->
  <div class="col-lg-10">
    <div class="">
      <h1>Top Posts</h1>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th>NO.</th>
            <th>Title</th>
            <th>Date&Time</th>
            <th>Author</th>
            <th>Comments</th>
            <th>Details</th>
          </tr>
        </thead>
        <?php
        $SrNo =0;
        global $ConnectingDB;
        $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,5";
        $stmt=$ConnectingDB->query($sql);
        while ($DataRows = $stmt->fetch()) {
          $PostId = $DataRows["id"];
          $DateTime =$DataRows["datetime"];
          $Author = $DataRows["author"];
          $Title = $DataRows["title"];
          $SrNo++;
         ?>
         <tbody>
           <tr>
             <td><?php echo $SrNo;?></td>
             <td><?php echo $Title;?></td>
             <td><?php echo $DateTime;?></td>
             <td><?php echo $Author;?></td>
             <td>
                 <?php
                  $Total=ApproveCommentsAccordingtoPost($PostId);
                  if ($Total>0) {
                    ?>
                    <span class="badge badge-success">
                    <?php
                    echo $Total;?>
                    </span>
                <?php  } ?>
              </span>
              <?php
               $Total=DisApproveCommentsAccordingtoPost($PostId);
               if ($Total>0) {
                 ?>
                 <span class="badge badge-danger">
                 <?php
                 echo $Total;?>
                 </span>
              <?php  } ?>
              </span>
             </td>
             <td><a target="_blank" href="FullPost.php?id=<?php echo $PostId; ?>"><span class="btn btn-info">Preview </span></a></td>
           </tr>
         </tbody>
         <?php } ?>
      </table>
    </div>
  </div>
  <!--right side area ENDS-->
  </div>
</section>




<!--Main end -->

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
