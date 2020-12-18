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

    <title>Posts</title>
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
        <h1><i class="fa fa-rss" style="color:#27aae1"></i>News Posts</h1>
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
  <div class="col-lg-12">
    <?php
    echo ErrorMessage();
    echo SuccessMessage();
    ?>
    <table class="table table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Category</th>
          <th>Date&Time</th>
          <th>Author</th>
          <th>Banner</th>
          <th>Comments</th>
          <th>Action</th>
          <th>Live priview</th>
        </tr>
      </thead>
      <?php
      global $ConnectingDB;
      $sql = "SELECT * FROM posts";
      $stmt = $ConnectingDB->query($sql);
      $Sr = 0;
      while ($DataRows = $stmt->fetch()) {
        $Id           = $DataRows["id"];
        $DateTime     = $DataRows["datetime"];
        $PostTitle    = $DataRows["title"];
        $Category      = $DataRows["category"];
        $Admin        = $DataRows["author"];
        $Image        = $DataRows["image"];
        $PostText     = $DataRows["post"];
        $Sr++;
      ?>
      <tbody>
        <tr>
           <td>
             <?php echo $Sr;?>
          </td>
          <td class="table-primary">
             <?php
                if (strlen($PostTitle)>20) {
                   $PostTitle= substr($PostTitle,0,18).'..';}
               echo $PostTitle;
             ?>
          </td>
          <td class="table-danger">
            <?php
            if (strlen($Category)>8) {
             $Category= substr($Category,0,8).'..';}
            echo $Category;
            ?>
          </td>
          <td class="table-info">
            <?php
            if (strlen($DateTime)>11) {
             $DateTime= substr($DateTime,0,11).'..';}
             echo $DateTime;
             ?>
           </td>
          <td class="table-warning">
            <?php
            if (strlen($Admin)>6) {
             $Admin= substr($Admin,0,6).'..';}
             echo $Admin;
            ?>
          </td>
          <td><img src="uploads/<?php echo $Image; ?>" width="170px"height="80px";</td>
          <td>
              <?php
               $Total=ApproveCommentsAccordingtoPost($Id);
               if ($Total>0) {
                 ?>
                 <span class="badge badge-success">
                 <?php
                 echo $Total;?>
                 </span>
             <?php  } ?>
           </span>
           <?php
            $Total=DisApproveCommentsAccordingtoPost($Id);
            if ($Total>0) {
              ?>
              <span class="badge badge-danger">
              <?php
              echo $Total;?>
              </span>
           <?php  } ?>
           </span>
          </td>
          <td>
            <a  href="EditPost.php?id=<?php echo $Id; ?>"><span class="btn btn-warning mb-1" style="min-width:140px;">Edit</span></a>
            <a href="DeletePost.php?id=<?php echo $Id; ?>"><span class="btn btn-danger mb-1" style="min-width:140px;">Delete</span></a>
          </td>
          <td><a href="FullPost.php?id=<?php echo $Id; ?>" target="_blank"><span class="btn btn-primary" style="min-width:140px;">Live Preview</span></a></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
  </div>
  </div>
</section>


<!--Main area -->

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
<div style="height:10px; background:#27aae1;"></div>
<!--FOOTER ENDS-->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script>
  $('#year').text(new Date().getFullYear());
</script>
</body >
</html>
