<?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");?>
<?php require_once("Includes/Sessions.php");?>
<?php Confirm_Login();?>

<?php
$SearchQueryParameter = $_GET['id'];
if (isset($_POST["Submit"])){
$PostTitle = $_POST["PostTitle"];
$Category = $_POST["Category"];
$Image = $_FILES["Image"]["name"];
$Target = "uploads/".basename($_FILES["Image"]["name"]);
$PostText = $_POST["PostDescription"];
$Admin = "Sam";
$CurrentTime=time();
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

if (empty($PostTitle)) {
  $_SESSION["ErrorMessage"] = "Title Cant be empty ";
  Redirect_to("Posts.php");
}elseif (strlen($PostTitle)<5) {
  $_SESSION["ErrorMessage"] = "Post title should be greater than 5 characters";
  Redirect_to("Posts.php");
}elseif (strlen($PostText)>9999) {
  $_SESSION["ErrorMessage"] = "Post Description should be less than 1000 characters";
  Redirect_to("Posts.php");
}else {
  //Query to update Post in Db when everything is fine
  global $ConnectingDB;
  if (!empty($_FILES["Image"]["name"])) {
    $sql = "UPDATE posts
            SET title='$PostTitle', category='$Category', image='$Image', post='$PostText'
            WHERE id='$SearchQueryParameter'";
  }else {
    $sql = "UPDATE posts
            SET title='$PostTitle', category='$Category',  post='$PostText'
            WHERE id='$SearchQueryParameter'";
  }

      $Execute=$ConnectingDB->query($sql);
  move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
//var_dump($Execute);
  if($Execute){
    $_SESSION["SuccessMessage"]="Post Updated Successfully";
    Redirect_to("Posts.php");
  }else {
    $_SESSION["ErrorMessage"]="Something went wrong.Try Again";
    Redirect_to("Posts.php");
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

    <title>EditPost</title>
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
          <a href="MyPofile.php" class="nav-link"><i class="fa fa-user text-success"></i> My Pofile</a>
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
        <h1><i class="fa fa-edit" style="color:#27aae1"></i>Edit Post</h1>
      </div>
    </div>
  </div>
</header>
<!--Heading ENDS-->

<!--Main BEGINS-->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
      <?php
      echo ErrorMessage();
      echo SuccessMessage();
      //fetching Existing Content according to our
      global $ConnectingDB;

      $sql = "SELECT*FROM posts WHERE id='$SearchQueryParameter'";
      $stmt = $ConnectingDB->query($sql);
      while ($DateRows = $stmt->fetch()) {
        $TitleToBeUpdated = $DateRows['title'];
        $CategoryToBeUpdated = $DateRows['category'];
        $ImageToBeUpdated = $DateRows['image'];
        $PostToBeUpdated = $DateRows['post'];
      }
      ?>
      <form class="" action="EditPost.php?id=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-body bg-dark">
            <div class="form-group">
              <label for="title"> <span class="FieldInfo"> Post Title: </span></label>
              <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Type title here" value="<?php echo $TitleToBeUpdated; ?>">
            </div>
            <div class="form-group">
              <span class="FieldInfo">Existing Category: </span>
              <?php echo $CategoryToBeUpdated;?>
              <br>
              <label for="CategoryTitle"> <span class="FieldInfo"> Choose Category </span></label>
            <select class="form-control" id="CategoryTitle" name="Category">
              <?php
              //Fetching all the categories from category table
              global $ConnectingDB;
              $sql = "SELECT id,title FROM category";
              $stmt = $ConnectingDB->query($sql);
              while ($DateRows = $stmt->fetch()) {
                $Id = $DateRows["id"];
                $CategoryName = $DateRows["title"];
                // code...
              ?>
              <option><?php echo $CategoryName; ?></option>
            <?php  } ?>
            </select>
            </div>
            <div class="form-group">
              <span class="FieldInfo">Existing Image: </span>
            <img class="mb-1" src="uploads/<?php echo $ImageToBeUpdated;?>" width="170px"; height="70px";>
              <br>
            <div class="custom-file">
              <input clas s="custom-file-input" type="File" name="Image" id="imageSelect" value="">
              <label for="imageSelect" class="custom-file-label">Select image</label>
            </div>
            </div>
            <div class="form-group">
              <label for="Post"> <span class="FieldInfo"> Post: </span></label>
              <textarea class="form-control" id="Post" name="PostDescription" rows="8" cols="80">
                <?php echo $PostToBeUpdated;?>
              </textarea>
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
