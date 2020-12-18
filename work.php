<!DOCTYPE HTML>
<html>

<head>
  <title>Work | Blind Communication</title>
  <link rel="shortcut icon" type="image/png" href="images/log.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
  <!--styles -->
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/jquery.owl.carousel.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/jquery.fancybox.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="Subscribe/style.css">



  <!--styles -->
</head>
<body class="portfolio-columns two pc">
  <!-- page header -->
  <header>
    <div class="stick-wrapper">
      <div class="sticky clear">
        <div class="grid-row">
          <img class="splash" src="img/splash.png" alt="">
          <div class="logo">
            <a href="home"><img src="images/logo.png" alt=""></a>
          </div>
          <nav class="nav">
            <a href="#" class="switcher">
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
  <!--/ page header -->
  <div class="top-bg">
    
    
  </div>
  <!-- page content -->
  <section id="portfolio" class="portfolio">
    <div class="grid-row">
      <div class="portfolio-filter clear">
        <div class="title">
          <a href="#" class="all-iso-item active" data-filter=".item">ALL</a>
         
          <a href="#" data-filter=".video">ADVERTISING</a>
          <a href="#" data-filter=".photo">BRANDING</a>
          <a href="#" data-filter=".design">MARKETING</a>
          <a href="#" data-filter=".web">DESIGN</a>
          <a href="#" data-filter=".music">BROADCASTING</a>
        </div>
      </div>
    </div>
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
	echo '<h2 class="success"><span class="alert alert-success fa fa-check">  Successfully added to our news letters</span></2>';
	}
}else {
	echo '<h2 class="Error"><span class="alert alert-danger Error">Please add your email</span></h2>';
}
}

?>
    <div class="grid-row">
      <div class="grid-col-row">
        <div class="isotope portfolio-three-columns">
        
          <div class="item photo">
            <div class="link-cont">
              <a href="images/portfolio/burger22.png" class="fancy fa fa-search"></a>
            </div>
            <img src="images/portfolio/two-columns-411.jpg" alt>
          </div>

          <div class="item photo">
            <div class="link-cont">
              <a href="images/portfolio/burger11.png" class="fancy fa fa-search"></a>
            </div>
            <img src="images/portfolio/two-columns-422.jpg" alt>
          </div>

         

          <div class="item photo">
            <div class="link-cont">
              <a href="images/portfolio/branding11.png" class="fancy fa fa-search"></a>
            </div>
            <img src="images/portfolio/two-columns-33.jpg" alt>
          </div>

          <div class="item photo">
            <div class="link-cont">
              <a href="images/portfolio/branding22.png" class="fancy fa fa-search"></a>
            </div>
            <img src="images/portfolio/two-columns-44.jpg" alt>
          </div>

          <div class="item design">
           
            <video width="600" height="400" controls>
              <source src="images/Works/MARKETING/1/222.mp4" type="video/mp4">
              
            Your browser does not support the video tag.
            </video>
          </div>

          <div class="item design">
          
            <!-- <video width="600" height="400" controls>
              <source src="images/Works/MARKETING/1/22.mp4" type="video/mp4"> -->
              <video width="600" height="400" controls>
              <source src="images/Works/MARKETING/3/2.mp4" type="video/mp4">
             
              
            Your browser does not support the video tag.
            </video>
          </div>

         
          <!-- <div class="item design">
           
            <video width="600" height="400" controls>
              <source src="images/Works/MARKETING/3/2.mp4" type="video/mp4">
              
            Your browser does not support the video tag.
            </video>
          </div> -->


          <!-- <div class="item design">
            <div class="link-cont">
              <a href="images/portfolio/maria.png" class="fancy fa fa-search"></a>
            </div>
            <img src="images/portfolio/two-columns-8.jpg" alt>
          </div> -->

      
          <div class="item video">
            <div class="link-cont">
              <a href="images/portfolio/two-columns-9.jpg" class="fancy fa fa-search"></a>
            </div>
             <img src="images/portfolio/two-columns-9.jpg" alt> 
          </div>

          <!-- <div class="item video">
            <div class="link-cont">
              <a href="images/portfolio/two-columns-10.gif" class="fancy fa fa-search"></a>
            </div>
            <img src="images/portfolio/two-columns-10.gif" alt>
          </div> -->

          <div class="item video">
            <div class="link-cont">
              <a href="images/portfolio/two-columns-91.png" class="fancy fa fa-search"></a>
            </div>
            <img src="images/portfolio/two-columns-91.png" alt>
          </div>

          <!-- <div class="item video">
            <div class="link-cont">
              <a href="images/portfolio/two-columns-11.png" class="fancy fa fa-search"></a>
            </div>
            <img src="images/portfolio/two-columns-11.png" alt>
          </div> -->

         
<!-- Logo section -->
          <div class="item web">
            <div class="link-cont">
              <a href="images/portfolio/logofolio1.png" class="fancy fa fa-search"></a>
            </div>
            <img src="images/portfolio/two-columns-166 -.png" alt>
          </div>
          
          <div class="item web" style="margin-bottom: 116px;">
            <div class="link-cont">
              <a href="images/portfolio/logofolio1.png" class="fancy fa fa-search"></a>
            </div>
            <img src="images/portfolio/two-columns-16 -1.png" alt>
          </div>

<!-- Logo section -->

          <div class="item web">
            <div class="link-cont">
              <a href="images/portfolio/two-columns-2.png" class="fancy fa fa-search"></a>
            </div>
            <img src="images/portfolio/two-columns-2.png" alt>
          </div>

          <div class="item web">
            <div class="link-cont">
              <a href="images/portfolio/two-columns-1.png" class="fancy fa fa-search"></a>
            </div>
            <img src="images/portfolio/two-columns-1.png" alt>
          </div>

         

          <div class="item web">
            <div class="link-cont">
              <a href="images/portfolio/two-columns-16.png" class="fancy fa fa-search"></a>
            </div>
            <img src="images/portfolio/two-columns-162.png"alt>
          </div>

          <div class="item web">
            <div class="link-cont">
              <a href="images/portfolio/two-columns-21.gif" class="fancy fa fa-search" ></a>
            </div>
            <img src="images/portfolio/two-columns-21.gif" alt>
          </div>


          

         
          <div class="item music">
            <img src="" alt>
          </div>

          <div class="item music">
            <img src="" alt>
          </div>

          <div class="item music">
            <img src="" alt>
          </div>

          <div class="item music">
            <img src="" alt>
          </div>


          <div class="item music">
            <img src="" alt>
          </div>

          <div class="item music">
            <img src="" alt>
          </div>

        </div>
      </div>
    </div>

  </section>
  <!--/ page content -->
  <!-- subscribe -->
  <div class="subscribe">
    <div class="grid-row clear">
      <div class="them-mask"></div>
<div>
<div class="subscribe-header">subscribe</div>
</div>
      
      <form action="work.php" class="clear" method="post">
      
        <input type="email" name="BEmail" placeholder="Your Email Address">
        <button type="submit" name="Submit" class="button-send">Send</button>
      </form>

    </div>
  </div>
  <!--/ subscribe -->
  <!-- page footer -->
  <footer id="footer">
    <div class="grid-row clear">
      <div class="footer">
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
  <!--/ page footer -->
  <a href="#" id="scroll-top" class="scroll-top"><i class="fa fa-angle-up"></i></a>
  
  <!-- scripts -->
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.owl.carousel.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/retina.min.js"></script>
  <script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
  <!--/ scripts -->
</body>
</html>