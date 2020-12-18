 <?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");?>
<?php require_once("Includes/Sessions.php");?>
<?php $SearchQueryParameter = $_GET["id"];?>
<?php if (isset($_POST["Submit"])){
$Name = $_POST["CommenterName"];
$Email= $_POST["CommenterEmail"];
$Comment = $_POST["CommenterThoughts"];
$CurrentTime=time();
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

if (empty($Name)||empty($Email)||empty($Comment)) {
  $_SESSION["ErrorMessage"] = "All fields must be filled out ";
  Redirect_to("FullPost.php?id={$SearchQueryParameter}");
}elseif (strlen($Comment)>500) {
  $_SESSION["ErrorMessage"] = "Comment length should be less than 500 characters";
    Redirect_to("FullPost.php?id={$SearchQueryParameter}");
}else {
  $sql = "INSERT INTO comments(datetime,name,email,comment,approvedby,status,post_id)";//no chance for SQL Injection
  $sql.= "VALUES(:dateTime,:name,:email,:comment,'pending','OFF',:postIdFromURL)";//$PostIdFromURL
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':dateTime',$DateTime);
  $stmt->bindValue(':name',$Name);
  $stmt->bindValue(':email',$Email);
  $stmt->bindValue(':comment',$Comment);
  $stmt->bindValue(':postIdFromURL',$SearchQueryParameter);
  $Execute=$stmt->execute();

  if($Execute){
    $_SESSION["SuccessMessage"]="Comment Submitted  Successfully";
    Redirect_to("FullPost.php?id={$SearchQueryParameter}");
  }else {
    $_SESSION["ErrorMessage"]="Something went wrong.Try Again";
    Redirect_to("FullPost.php?id={$SearchQueryParameter}");
  }
 }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <title>News | Blind Communication</title>
	<link rel="shortcut icon" type="image/png" href="images/log.png"> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- from the blog  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    
	<!--styles -->
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/jquery.owl.carousel.css">
	<link rel="stylesheet" href="Comment/main.css">
	<link rel="stylesheet" href="css/animate.css">

    <style media="screen">
    .heading{
      font-family: Bitter,Georgia,"Times New Roman",Times,serif;
      font-weight: bold;
      color: #005E90;
    }
    .heading:hover{
      color: #0090DB;
    }

    .FieldInfo{
  color: rgb(215,174,44);
  font-family: Bitter,Georgia,"Times New Roman",Times,serif;
  font-size: 1.2em;
}
.CommentBlock{
  background-color:red;/*#F6F7F9;*/
}

*, *:before, *:after {
-moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
}

body {
 overflow: hidden;
 font-family: 'HelveticaNeue-UltraLight', 'Helvetica Neue UltraLight', 'Helvetica Neue', Arial, Helvetica, sans-serif;
 font-weight: 100;
 color: rgba(255, 255, 255, 1);
 margin: 0;
 padding: 0;
 
 -webkit-touch-callout: none;
 -webkit-user-select: none;
 -khtml-user-select: none;
 -moz-user-select: none;
 -ms-user-select: none;
 user-select: none;
}

#calendar {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
  width: 310px;
  margin: 0 auto;
  height: 570px;
  overflow: hidden;
}

.header {
  height: 50px;
  width: 309px;
  
  text-align: center;
  position:relative;
  z-index: 100;
}

.header h1 {
  margin: 0;
  padding: 0;
  font-size: 20px;
  line-height: 50px;
  font-weight: 100;
  letter-spacing: 1px;
}

.left, .right {
  position: absolute;
  width: 0px;
  height: 0px;
  border-style: solid;
  top: 50%;
  margin-top: -7.5px;
  cursor: pointer;
}

.left {
  border-width: 7.5px 10px 7.5px 0;
  border-color: transparent rgba(160, 159, 160, 1) transparent transparent;
  left: 20px;
}

.right {
  border-width: 7.5px 0 7.5px 10px;
  border-color: transparent transparent transparent rgba(160, 159, 160, 1);
  right: 20px;
}

.month {
 /* overflow: hidden;*/
  opacity: 0;
}

.month.new {
  -webkit-animation: fadeIn 1s ease-out;
  opacity: 1;
}

.month.in.next {
  -webkit-animation: moveFromTopFadeMonth .4s ease-out;
  -moz-animation: moveFromTopFadeMonth .4s ease-out;
  animation: moveFromTopFadeMonth .4s ease-out;
  opacity: 1;
}

.month.out.next {
  -webkit-animation: moveToTopFadeMonth .4s ease-in;
  -moz-animation: moveToTopFadeMonth .4s ease-in;
  animation: moveToTopFadeMonth .4s ease-in;
  opacity: 1;
}

.month.in.prev {
  -webkit-animation: moveFromBottomFadeMonth .4s ease-out;
  -moz-animation: moveFromBottomFadeMonth .4s ease-out;
  animation: moveFromBottomFadeMonth .4s ease-out;
  opacity: 1;
}

.month.out.prev {
  -webkit-animation: moveToBottomFadeMonth .4s ease-in;
  -moz-animation: moveToBottomFadeMonth .4s ease-in;
  animation: moveToBottomFadeMonth .4s ease-in;
  opacity: 1;
}

.week {
 
}

.day {
  display: inline-block;
  width: 40px;
  padding: 10px;
  text-align: center;
  vertical-align: top;
  cursor: pointer;
  
  position: relative;
  z-index: 100;
}

.day.other {
 color: rgba(255, 255, 255, .3);
}

.day.today {
  color: rgba(156, 202, 235, 1);
}

.day-name {
  font-size: 8px;
  text-transform: uppercase;
  margin-bottom: 5px;
  color: rgba(255, 255, 255, .5);
  letter-spacing: .3px;
}

.day-number {
  font-size: 24px;
  letter-spacing: 1.5px;
}


.day .day-events {
  list-style: none;
  margin-top: 3px;
  text-align: center;
  height: 12px;
  line-height: 6px;
  overflow: hidden;
}

.day .day-events span {
  vertical-align: top;
  display: inline-block;
  padding: 0;
  margin: 0;
  width: 5px;
  height: 5px;
  line-height: 5px;
  margin: 0 1px;
}

.blue { background: rgba(156, 202, 235, 1); }
.orange { background: rgba(247, 167, 0, 1); }
.green { background: rgba(153, 198, 109, 1); }
.yellow { background: rgba(249, 233, 0, 1); }

.details {
  position: relative;
  width: 420px;
  height: 75px;
  background: rgba(164, 164, 164, 1);
  margin-top: 5px;
  border-radius: 4px;
}

.details.in {
  -webkit-animation: moveFromTopFade .5s ease both;
  -moz-animation: moveFromTopFade .5s ease both;
  animation: moveFromTopFade .5s ease both;
}

.details.out {
  -webkit-animation: moveToTopFade .5s ease both;
  -moz-animation: moveToTopFade .5s ease both;
  animation: moveToTopFade .5s ease both;
}

.arrow {
  position: absolute;
  top: -5px;
  left: 50%;
  margin-left: -2px;
  width: 0px;
  height: 0px;
  border-style: solid;
  border-width: 0 5px 5px 5px;
  border-color: transparent transparent rgba(164, 164, 164, 1) transparent;
  transition: all 0.7s ease;
}

.events {
  height: 75px;
  padding: 7px 0;
  overflow-y: auto;
  overflow-x: hidden;
}

.events.in {
  -webkit-animation: fadeIn .3s ease both;
  -moz-animation: fadeIn .3s ease both;
  animation: fadeIn .3s ease both;
}

.events.in {
  -webkit-animation-delay: .3s;
  -moz-animation-delay: .3s;
  animation-delay: .3s;
}

.details.out .events {
  -webkit-animation: fadeOutShrink .4s ease both;
  -moz-animation: fadeOutShink .4s ease both;
  animation: fadeOutShink .4s ease both;
}

.events.out {
  -webkit-animation: fadeOut .3s ease both;
  -moz-animation: fadeOut .3s ease both;
  animation: fadeOut .3s ease both;
}

.event {
  font-size: 16px;
  line-height: 22px;
  letter-spacing: .5px;
  padding: 2px 16px;
  vertical-align: top;
}

.event.empty {
  color: #eee;
}

.event-category {
  height: 10px;
  width: 10px;
  display: inline-block;
  margin: 6px 0 0;
  vertical-align: top;
}

.event span {
  display: inline-block;
  padding: 0 0 0 7px;
}

.legend {
  position: absolute;
  bottom: 0;
  width: 260px;
  height: 30px;
  background: rgba(60, 60, 60, 1);
  line-height: 30px;

}

.entry {
  position: relative;
  padding: 0 0 0 25px;
  font-size: 13px;
  display: inline-block;
  line-height: 30px;
  background: transparent;
}

.entry:after {
  position: absolute;
  content: '';
  height: 5px;
  width: 5px;
  top: 12px;
  left: 14px;
}

.entry.blue:after { background: rgba(156, 202, 235, 1); }
.entry.orange:after { background: rgba(247, 167, 0, 1); }
.entry.green:after { background: rgba(153, 198, 109, 1); }
.entry.yellow:after { background: rgba(249, 233, 0, 1); }

/* Animations are cool!  */
@-webkit-keyframes moveFromTopFade {
  from { opacity: .3; height:0px; margin-top:0px; -webkit-transform: translateY(-100%); }
}
@-moz-keyframes moveFromTopFade {
  from { height:0px; margin-top:0px; -moz-transform: translateY(-100%); }
}
@keyframes moveFromTopFade {
  from { height:0px; margin-top:0px; transform: translateY(-100%); }
}

@-webkit-keyframes moveToTopFade {
  to { opacity: .3; height:0px; margin-top:0px; opacity: 0.3; -webkit-transform: translateY(-100%); }
}
@-moz-keyframes moveToTopFade {
  to { height:0px; -moz-transform: translateY(-100%); }
}
@keyframes moveToTopFade {
  to { height:0px; transform: translateY(-100%); }
}

@-webkit-keyframes moveToTopFadeMonth {
  to { opacity: 0; -webkit-transform: translateY(-30%) scale(.95); }
}
@-moz-keyframes moveToTopFadeMonth {
  to { opacity: 0; -moz-transform: translateY(-30%); }
}
@keyframes moveToTopFadeMonth {
  to { opacity: 0; -moz-transform: translateY(-30%); }
}

@-webkit-keyframes moveFromTopFadeMonth {
  from { opacity: 0; -webkit-transform: translateY(30%) scale(.95); }
}
@-moz-keyframes moveFromTopFadeMonth {
  from { opacity: 0; -moz-transform: translateY(30%); }
}
@keyframes moveFromTopFadeMonth {
  from { opacity: 0; -moz-transform: translateY(30%); }
}

@-webkit-keyframes moveToBottomFadeMonth {
  to { opacity: 0; -webkit-transform: translateY(30%) scale(.95); }
}
@-moz-keyframes moveToBottomFadeMonth {
  to { opacity: 0; -webkit-transform: translateY(30%); }
}
@keyframes moveToBottomFadeMonth {
  to { opacity: 0; -webkit-transform: translateY(30%); }
}

@-webkit-keyframes moveFromBottomFadeMonth {
  from { opacity: 0; -webkit-transform: translateY(-30%) scale(.95); }
}
@-moz-keyframes moveFromBottomFadeMonth {
  from { opacity: 0; -webkit-transform: translateY(-30%); }
}
@keyframes moveFromBottomFadeMonth {
  from { opacity: 0; -webkit-transform: translateY(-30%); }
}

@-webkit-keyframes fadeIn  {
  from { opacity: 0; }
}
@-moz-keyframes fadeIn  {
  from { opacity: 0; }
}
@keyframes fadeIn  {
  from { opacity: 0; }
}

@-webkit-keyframes fadeOut  {
  to { opacity: 0; }
}
@-moz-keyframes fadeOut  {
  to { opacity: 0; }
}
@keyframes fadeOut  {
  to { opacity: 0; }
}

@-webkit-keyframes fadeOutShink  {
  to { opacity: 0; padding: 0px; height: 0px; }
}
@-moz-keyframes fadeOutShink  {
  to { opacity: 0; padding: 0px; height: 0px; }
}
@keyframes fadeOutShink  {
  to { opacity: 0; padding: 0px; height: 0px; }
}

    </style>

</head>
<body class="blog with-sidebar pc">
	<!-- page header -->
	<header id="home">
		<div class="stick-wrapper">
			<div class="sticky clear">
				<div class="grid-row">
					<img class="splash" src="img/splash.png" alt="">
					<div class="logo">
						<a href="home.php"><img src="images/logo.png" alt=""></a>
					</div>
					<nav class="nav">
						<a href="home.php" class="switcher">
							<i class="fa fa-bars"></i>
						</a>
						<ul class="clear">
						<li><a href="home.php">Home</a></li>
							<li><a href="agency.php">Agency</a></li>
							<li><a href="leaders.php">Leaders</a></li>
							<li><a href="work.php">Work</a></li>
							<li><a href="news.php?page=1">News</a></li>
							<li class="last"><a href="contact.php">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!--/ page header  -->
	<div class="top-bg">

<!--Navbar END-->
<!--Heading BEGINS-->
<div class="container-fluid py-3" style="background-color: black;">
  <div class="row"  style="background-color: black;">

  <div class="col-sm-8">
  <div class="title" >
		<span class="main-title">ADD</span>
		<span class="slash-icon">/<i class="fa fa-angle-double-right"></i></span><h5>COMMENTS</h5>
	</div>
	<hr style="border:1px solid grey;">
	<!--//////////////////////////////////////////////// SubscribtionsPop///////////////////////// -->
	<?php

	require_once("Subscribe/DB.php");
	if(isset($_POST["Submit"])){
	if (!empty($_POST["BEmail"])) {

		$BEmail = $_POST["BEmail"];
		
		global $ConnectingDBv;
		$sql1 = "INSERT INTO subscribe(email)
		VALUES(:emaiL)";
		$stmt1=$ConnectingDBv->prepare($sql1);
		
		$stmt1->bindValue('emaiL',$BEmail);
		
		$Execute = $stmt1->execute();
		if ($Execute) {
		echo '<span class="alert alert-success">  Successfully added to our news letters</span>';
		}
	}else {
		echo '<span class="alert alert-danger">Please add your email</span>';
	}
}

?>
<!--//////////////////////////////////////////////// SubscribtionsPop///////////////////////// -->
    <?php
    echo ErrorMessage();
    echo SuccessMessage();
    ?>
    <?php
    global $ConnectingDB;
     if (isset($_GET["SearchButton"])) {
      $Search=$_GET["Search"];
      $sql = "SELECT * FROM posts
      WHERE datetime LIKE :search OR title LIKE :search OR category
      LIKE :search OR post LIKE :search";
      $stmt = $ConnectingDB->prepare($sql);
      $stmt->bindValue(':search','%'.$Search.'%');
      $stmt->execute();
    }

    else {
      $PostIdFromURL = $_GET["id"];
      if (!isset($PostIdFromURL)) {
        $_SESSION["ErrorMessage"]="Bad Request!";
        Redirect_to("news.php");
      }
      $sql = "SELECT * FROM posts WHERE id='$PostIdFromURL'";
      $stmt = $ConnectingDB->query($sql);
      $Result=$stmt->rowcount();
      if ($Result!=1) {
        $_SESSION["ErrorMessage"]="Bad Request !";
        Redirect_to("news.php?page=1");
      }
    }

     while ($DataRows=$stmt->fetch()) {
       $PostId            =$DataRows["id"];
       $DateTime          =$DataRows["datetime"];
       $PostTitle         =$DataRows["title"];
       $Category          =$DataRows["category"];
       $Admin             =$DataRows["author"];
       $Image             =$DataRows["image"];
       $PostDescription   =$DataRows["post"];


     ?>
      <div class="card" style="border: none;">
        <img src="uploads/<?php echo htmlentities($Image);?>" style="max-height:450px;" class="img-fluid card-img-top"/>
        <div class="card-body" style="background-color: black;">
          <h3 class="card-title"><?php echo  htmlentities($PostTitle); ?></h3>
          <small class="text-muted">Category: <span class="text-dark">  <?php echo htmlentities($Category); ?> </span> Written by <span class="text-dark"><a href="Profile.php?username=<?php echo htmlentities($Admin); ?>">
            <?php echo htmlentities($Admin);?></a>
          </span> On
            <span class="text-dark"><?php echo htmlentities($DateTime);?> </span></small>


          <hr>
          <p class="card-text">
            <?php echo nl2br($PostDescription);?></p>
        </div>
      </div>
    <?php  } ?>
    <hr>
    <hr>
<!--Comment Port Start-->

<!--Fetching existing comment Start-->
<div >
<span class="FieldInfo">Comments</span>
<br><br>
<?php
global $ConnectingDB;
$sql = "SELECT * FROM comments WHERE post_id='$SearchQueryParameter'
AND status='ON'";
$stmt = $ConnectingDB->query($sql);
while ($DataRows = $stmt->fetch()) {
  $CommentDate = $DataRows['datetime'];
  $CommenterName = $DataRows['name'];
  $CommentContent= $DataRows['comment'];

?>
<div>

  <div class="media CommentBlock" style="background-color:black;">
    <img class="d-block img-fluid align-self-start" src="Images/comment.png" alt="">
    <div class="media-body ml-2">
    <h6 class="lead"><?php echo $CommenterName; ?></h6>
    <p class="small"><?php echo $CommentDate; ?></p>
    <p><?php echo $CommentContent; ?></p>
    </div>
  </div>
</div>
<hr>
<?php } ?>
</div>
<!--Fetching existing comment End-->
    <div class="" >
<form class="" action="FullPost.php?id=<?php echo $SearchQueryParameter ?>" method="post">
  <div class="card mb-3" style="background-color:black;">
    <div class="card-header">
      <h5 class="FieldInfo">Share your thoughts about this post</h5>
    </div>
    <div class="card-body">
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-user"></i></span>
          </div>
          <input class="form-control" type="text" name="CommenterName" placeholder="Name" value="">
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
          </div>
          <input class="form-control" type="email" name="CommenterEmail" placeholder="Email" value="">
        </div>
      </div>
      <div class="form-group">
        <textarea name="CommenterThoughts" class="form-control" rows="6" cols="80"></textarea>
      </div>
      <div class="">
          <button type="submit" name="Submit" class="btn btn-secondary">Submit</button>
      </div>
    </div>
  </div>
</form>
    </div>
    <!--Comment Port End-->
  </div>
<!--MAIN side area END-->

<!-- the rest of the body in footer.php -->

<!--////////////////////////////////////////// This a Search bar/////////////////////////////// -->
<aside class="grid-col grid-col-3 sidebar">
				<!-- widget search -->
				<div id="search" class="widget widget_search">
				<form class="form-inline d-none d-sm-block" action="news.php">
					<div>
					<input class="form-control" type="text" name="Search" placeholder="Search here" value="">
					<button type="submit" name="SearchButton" class="btn" style="background-color: grey;background-size:auto;"><i class="fa fa-search text-light"></i></button>
					</div>
				</form>
				</div>
				<!-- widget search -->


				<!-- follow widget -->
				<div id="text-3" class="widget widget_text">
					<div class="widget-title">Follow & subscribe</div>
					<div class="textwidget">
						<div class="follow-icon">
							<a href="https://twitter.com/BlindCommun"><div class="contact-round blue-follow-icon"><i class="fa fa-twitter"></i></div></a>
							<a href="https://www.instagram.com/blind.communication/"><div class="contact-round blue-follow-icon"><i class="fa fa-instagram"></i></div></a>
							<a href="https://www.youtube.com/channel/UCLFVC-weA6baJdkFE54b_7Q"><div class="contact-round red-follow-icon"><i class="fa fa-youtube"></i></div></a>
							<a href="https://www.facebook.com/Blind-Communication-112872130456626/"><div class="contact-round blue-follow-icon"><i class="fa fa-facebook"></i></div></a>
                            <a href="https://www.behance.net/blindcommunication"><div class="contact-round blue-follow-icon"><i class="fa fa-behance"></i></div></a>
						</div>
					</div>
				</div>
				<!-- follow widget -->
			
				<!-- categories widget -->
				<hr class="divider-green">
				<!-- recent comments widget -->
				<div class="widget widget-recent-comments clear">
					<div class="widget-title">Our Comments</div>
					<div class="carousel-nav">
						
					</div>
					<div id="recent-comments" class="owl-carousel owl-widget">
							
						
					</div>
				</div>
				<!-- recent comments widget -->
				<hr class="divider-green">
				<!-- text widget -->
				<div id="text" class="widget widget_text">
					<div class="widget-title">GLOBAL CONSUMERS</div>
					<div class="textwidget">
						<p>Fifty-five percent of global online consumers across 60 countries say they are willing to pay more for products and services provided by companies that are committed to positive social and environmental impact, according to a new study by Nielsen. 

                                                  The propensity to buy socially responsible brands is strongest in Asia-Pacific (64%), Latin America (63%) and Middle East/Africa (63%). The numbers for North America and Europe are 42 and 40 percent, respectively..</p>
					</div>
				</div>
				
			
				
				<!-- archives widget -->
				<hr class="divider-green">
				<!-- widget calendar -->
				<div class="widget widget-calendar">
				<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
					<div id="calendar"></div>
				</div>
				<!--/ widget calendar -->
				<hr class="divider-green">
				<!-- meta widget -->
			
				<!-- meta widget -->
				<hr class="divider-green">
				<!-- widget twitter -->
				<div class="widget widget-twitter">
					<div class="widget-title">Latest Twitt</div>
					
					<a class="twitter-timeline" data-width="310" data-height="200" data-theme="dark" href="https://twitter.com/MateusPedrr?ref_src=twsrc%5Etfw">Tweets by MateusPedrr</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					

					
				</div>
				<hr class="divider-green">

				<!--////////////////////////// CATEGORIES -->
				<div id="tag_cloud-2" class="widget widget_tag_cloud">
					<div class="widget-title">Tags</div>
					<div class="tagcloud">
						<ul>
							
							<li>Design</li>
							<li>Advertising</li>
							<li>Branding</li>
							<li>Marketing</li>
							<li>Photography</li>
							<li>Audio Production</li>
							<li>Tv and Show</li>
							<li>Publication</li>
							<li>Video and Ads</li>
							<li>Software & Web app</li>
						</ul>
					</div>
				</div>


				<!--/ widget twitter -->
				<hr class="divider-green">
				<!-- tags widget -->
				<div id="tag_cloud-2" class="widget widget_tag_cloud">
					
					<div class="tagcloud">
						<!-- Recent Posts -->
							<div class="card">
							<div class="card-header text-white" style="background-color: grey;">
								<h2 class="lead"> Recent Posts</h2>
							</div>
							<div class="card-body"  style="background-color: black;">
								<?php
								global $ConnectingDB;
								$sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,5";
								$stmt = $ConnectingDB->query($sql);
								while ($DataRows=$stmt->fetch()) {
								$Id =$DataRows["id"];
								$Title =$DataRows["title"];
								$DateTime =$DataRows["datetime"];
								$Image =$DataRows["image"];

								?>
								<div class="media">
								<img src="uploads/<?php echo htmlentities($Image); ?>"  class="d-block img-fluid align-self-start" width="90" height="94" alt="">
								<div class="media-body ml-2">
									<a href="FullPost.php?id=<?php echo htmlentities($Id) ; ?>" target="_blank"> <h6 class="lead text-light"><?php echo htmlentities($Title); ?></h6> </a>
									<p class="small"><?php echo htmlentities($DateTime); ?></p>
								</div>
								</div>
								<hr>
								<?php  } ?>
							</div>
							</div>
					</div>
				</div>
				<!-- tags widget -->
			
			</aside>
		</div>
	</div>
	<!--/ page content -->
	<!-- subscribe -->
	<div class="subscribe">
		<div class="grid-row clear">
			<div class="them-mask"></div>
			<div class="subscribe-header">subscribe</div>
			<form action="news.php" class="clear" method="post">
				<input type="email" name="BEmail" placeholder="Your Email Address">
				<button type="submit" name="Submit" class="button-send">Send</button>
			</form>
		</div>
	</div>
	<!--/ subscribe  -->
	<!-- page footer  -->
	<footer id="footer">
		<div class="grid-row clear">
			<div class="footer footer-dark" >
				<div id="copyright"><span>2020 BLIND COMMUNICATION.</span> All rights reserved.</div>
				<a href="home" class="footer-logo"><img src="images/logo.png" alt=""></a>
				<div class="social">
					<a href="https://twitter.com/BlindCommun"><div class="contact-round"><i class="fa fa-twitter"></i></div></a>
					<a href="https://www.facebook.com/Blind-Communication-112872130456626/"><div class="contact-round"><i class="fa fa-facebook"></i></div></a>
					<a href="https://www.instagram.com/blind.communication/"><div class="contact-round"><i class="fa fa-instagram"></i></div></a>
					<a href="https://www.youtube.com/channel/UCLFVC-weA6baJdkFE54b_7Q"><div class="contact-round"><i class="fa fa-youtube"></i></div></a>
					<a href="https://www.behance.net/blindcommunication"><div class="contact-round"><i class="fa fa-behance"></i></div></a>
				</div>
			</div>
		</div>
	</footer>
	<!--/ page footer  -->
	<a href="#" id="scroll-top" class="scroll-top"><i class="fa fa-angle-up"></i></a>
	
	<!-- scripts -->
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.owl.carousel.js"></script>
	
	<script src="js/main.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/retina.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="js/jquery.tweet.js"></script>
	<script src="js/jflickrfeed.min.js"></script>
	<!--/ scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script>

!function() {

var today = moment();

function Calendar(selector, events) {
  this.el = document.querySelector(selector);
  this.events = events;
  this.current = moment().date(1);
  this.draw();
  var current = document.querySelector('.today');
  if(current) {
	var self = this;
	window.setTimeout(function() {
	  self.openDay(current);
	}, 500);
  }
}

Calendar.prototype.draw = function() {
  //Create Header
  this.drawHeader();

  //Draw Month
  this.drawMonth();

  this.drawLegend();
}

Calendar.prototype.drawHeader = function() {
  var self = this;
  if(!this.header) {
	//Create the header elements
	this.header = createElement('div', 'header');
	this.header.className = 'header';

	this.title = createElement('h1');

	var right = createElement('div', 'right');
	right.addEventListener('click', function() { self.nextMonth(); });

	var left = createElement('div', 'left');
	left.addEventListener('click', function() { self.prevMonth(); });

	//Append the Elements
	this.header.appendChild(this.title); 
	this.header.appendChild(right);
	this.header.appendChild(left);
	this.el.appendChild(this.header);
  }

  this.title.innerHTML = this.current.format('MMMM YYYY');
}

Calendar.prototype.drawMonth = function() {
  var self = this;
  
  this.events.forEach(function(ev) {
   ev.date = self.current.clone().date(Math.random() * (29 - 1) + 1);
  });
  
  
  if(this.month) {
	this.oldMonth = this.month;
	this.oldMonth.className = 'month out ' + (self.next ? 'next' : 'prev');
	this.oldMonth.addEventListener('webkitAnimationEnd', function() {
	  self.oldMonth.parentNode.removeChild(self.oldMonth);
	  self.month = createElement('div', 'month');
	  self.backFill();
	  self.currentMonth();
	  self.fowardFill();
	  self.el.appendChild(self.month);
	  window.setTimeout(function() {
		self.month.className = 'month in ' + (self.next ? 'next' : 'prev');
	  }, 16);
	});
  } else {
	  this.month = createElement('div', 'month');
	  this.el.appendChild(this.month);
	  this.backFill();
	  this.currentMonth();
	  this.fowardFill();
	  this.month.className = 'month new';
  }
}

Calendar.prototype.backFill = function() {
  var clone = this.current.clone();
  var dayOfWeek = clone.day();

  if(!dayOfWeek) { return; }

  clone.subtract('days', dayOfWeek+1);

  for(var i = dayOfWeek; i > 0 ; i--) {
	this.drawDay(clone.add('days', 1));
  }
}

Calendar.prototype.fowardFill = function() {
  var clone = this.current.clone().add('months', 1).subtract('days', 1);
  var dayOfWeek = clone.day();

  if(dayOfWeek === 6) { return; }

  for(var i = dayOfWeek; i < 6 ; i++) {
	this.drawDay(clone.add('days', 1));
  }
}

Calendar.prototype.currentMonth = function() {
  var clone = this.current.clone();

  while(clone.month() === this.current.month()) {
	this.drawDay(clone);
	clone.add('days', 1);
  }
}

Calendar.prototype.getWeek = function(day) {
  if(!this.week || day.day() === 0) {
	this.week = createElement('div', 'week');
	this.month.appendChild(this.week);
  }
}

Calendar.prototype.drawDay = function(day) {
  var self = this;
  this.getWeek(day);

  //Outer Day
  var outer = createElement('div', this.getDayClass(day));
  outer.addEventListener('click', function() {
	self.openDay(this);
  });

  //Day Name
  var name = createElement('div', 'day-name', day.format('ddd'));

  //Day Number
  var number = createElement('div', 'day-number', day.format('DD'));


  //Events
  var events = createElement('div', 'day-events');
  this.drawEvents(day, events);

  outer.appendChild(name);
  outer.appendChild(number);
  outer.appendChild(events);
  this.week.appendChild(outer);
}

Calendar.prototype.drawEvents = function(day, element) {
  if(day.month() === this.current.month()) {
	var todaysEvents = this.events.reduce(function(memo, ev) {
	  if(ev.date.isSame(day, 'day')) {
		memo.push(ev);
	  }
	  return memo;
	}, []);

	todaysEvents.forEach(function(ev) {
	  var evSpan = createElement('span', ev.color);
	  element.appendChild(evSpan);
	});
  }
}

Calendar.prototype.getDayClass = function(day) {
  classes = ['day'];
  if(day.month() !== this.current.month()) {
	classes.push('other');
  } else if (today.isSame(day, 'day')) {
	classes.push('today');
  }
  return classes.join(' ');
}

Calendar.prototype.openDay = function(el) {
  var details, arrow;
  var dayNumber = +el.querySelectorAll('.day-number')[0].innerText || +el.querySelectorAll('.day-number')[0].textContent;
  var day = this.current.clone().date(dayNumber);

  var currentOpened = document.querySelector('.details');

  //Check to see if there is an open detais box on the current row
  if(currentOpened && currentOpened.parentNode === el.parentNode) {
	details = currentOpened;
	arrow = document.querySelector('.arrow');
  } else {
	//Close the open events on differnt week row
	//currentOpened && currentOpened.parentNode.removeChild(currentOpened);
	if(currentOpened) {
	  currentOpened.addEventListener('webkitAnimationEnd', function() {
		currentOpened.parentNode.removeChild(currentOpened);
	  });
	  currentOpened.addEventListener('oanimationend', function() {
		currentOpened.parentNode.removeChild(currentOpened);
	  });
	  currentOpened.addEventListener('msAnimationEnd', function() {
		currentOpened.parentNode.removeChild(currentOpened);
	  });
	  currentOpened.addEventListener('animationend', function() {
		currentOpened.parentNode.removeChild(currentOpened);
	  });
	  currentOpened.className = 'details out';
	}

	//Create the Details Container
	details = createElement('div', 'details in');

	//Create the arrow
	var arrow = createElement('div', 'arrow');

	//Create the event wrapper

	details.appendChild(arrow);
	el.parentNode.appendChild(details);
  }

  var todaysEvents = this.events.reduce(function(memo, ev) {
	if(ev.date.isSame(day, 'day')) {
	  memo.push(ev);
	}
	return memo;
  }, []);

  this.renderEvents(todaysEvents, details);

  arrow.style.left = el.offsetLeft - el.parentNode.offsetLeft + 27 + 'px';
}

Calendar.prototype.renderEvents = function(events, ele) {
  //Remove any events in the current details element
  var currentWrapper = ele.querySelector('.events');
  var wrapper = createElement('div', 'events in' + (currentWrapper ? ' new' : ''));

  events.forEach(function(ev) {
	var div = createElement('div', 'event');
	var square = createElement('div', 'event-category ' + ev.color);
	var span = createElement('span', '', ev.eventName);

	div.appendChild(square);
	div.appendChild(span);
	wrapper.appendChild(div);
  });

  if(!events.length) {
	var div = createElement('div', 'event empty');
	var span = createElement('span', '', 'No Events');

	div.appendChild(span);
	wrapper.appendChild(div);
  }

  if(currentWrapper) {
	currentWrapper.className = 'events out';
	currentWrapper.addEventListener('webkitAnimationEnd', function() {
	  currentWrapper.parentNode.removeChild(currentWrapper);
	  ele.appendChild(wrapper);
	});
	currentWrapper.addEventListener('oanimationend', function() {
	  currentWrapper.parentNode.removeChild(currentWrapper);
	  ele.appendChild(wrapper);
	});
	currentWrapper.addEventListener('msAnimationEnd', function() {
	  currentWrapper.parentNode.removeChild(currentWrapper);
	  ele.appendChild(wrapper);
	});
	currentWrapper.addEventListener('animationend', function() {
	  currentWrapper.parentNode.removeChild(currentWrapper);
	  ele.appendChild(wrapper);
	});
  } else {
	ele.appendChild(wrapper);
  }
}

Calendar.prototype.drawLegend = function() {
  var legend = createElement('div', 'legend');
  var calendars = this.events.map(function(e) {
	return e.calendar + '|' + e.color;
  }).reduce(function(memo, e) {
	if(memo.indexOf(e) === -1) {
	  memo.push(e);
	}
	return memo;
  }, []).forEach(function(e) {
	var parts = e.split('|');
	var entry = createElement('span', 'entry ' +  parts[1], parts[0]);
	legend.appendChild(entry);
  });
  this.el.appendChild(legend);
}

Calendar.prototype.nextMonth = function() {
  this.current.add('months', 1);
  this.next = true;
  this.draw();
}

Calendar.prototype.prevMonth = function() {
  this.current.subtract('months', 1);
  this.next = false;
  this.draw();
}

window.Calendar = Calendar;

function createElement(tagName, className, innerText) {
  var ele = document.createElement(tagName);
  if(className) {
	ele.className = className;
  }
  if(innerText) {
	ele.innderText = ele.textContent = innerText;
  }
  return ele;
}
}();

!function() {
var data = [
  { eventName: 'Lunch Meeting w/ Mark', calendar: 'Work', color: 'orange' },
  { eventName: 'Interview - Jr. Web Developer', calendar: 'Work', color: 'orange' },
  { eventName: 'Demo New App to the Board', calendar: 'Work', color: 'orange' },
  { eventName: 'Dinner w/ Marketing', calendar: 'Work', color: 'orange' },

  { eventName: 'Game vs Portalnd', calendar: 'Sports', color: 'blue' },
  { eventName: 'Game vs Houston', calendar: 'Sports', color: 'blue' },
  { eventName: 'Game vs Denver', calendar: 'Sports', color: 'blue' },
  { eventName: 'Game vs San Degio', calendar: 'Sports', color: 'blue' },

  { eventName: 'School Play', calendar: 'Kids', color: 'yellow' },
  { eventName: 'Parent/Teacher Conference', calendar: 'Kids', color: 'yellow' },
  { eventName: 'Pick up from Soccer Practice', calendar: 'Kids', color: 'yellow' },
  { eventName: 'Ice Cream Night', calendar: 'Kids', color: 'yellow' },

  { eventName: 'Free Tamale Night', calendar: 'Other', color: 'green' },
  { eventName: 'Bowling Team', calendar: 'Other', color: 'green' },
  { eventName: 'Teach Kids to Code', calendar: 'Other', color: 'green' },
  { eventName: 'Startup Weekend', calendar: 'Other', color: 'green' }
];



function addDate(ev) {
  
}

var calendar = new Calendar('#calendar', data);

}();

</script>
<script>
  $('#year').text(new Date().getFullYear());
</script>
</body>
</html>