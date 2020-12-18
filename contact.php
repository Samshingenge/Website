<!DOCTYPE HTML>
<html>

<head>
	<title>Contact | Blind Communication</title>
	<link rel="shortcut icon" type="image/png" href="images/log.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!--styles -->
	<link rel="stylesheet" href="Subscribe/style.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/jquery.owl.carousel.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/animate.css">
	<!--styles -->
</head>
<body class="contact-page pc">
	<!-- page header -->
	<header id="home">
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
	<!--/ page header  -->
	<div class="top-bg">
		
  
	</div>
	<!-- page content -->
	<div class="page-content">
		<div class="grid-row">
			<div id="content" role="main">
				<div class="title">
					<span class="main-title">CONTACT</span><span class="slash-icon">/<i class="fa fa-angle-double-right"></i></span><h5>PARTNER WITH US</h5>
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
				<p>Hi. We'd love to hear about your project, idea, or mission. We're located at 12-Simpson Street in Windhoek West, Namibia. We like meeting face-to-face, but if you're far away, phone or video conference works too. We've got clients from all over. Don't be scared, just reach out.</p>
				<div class="grid-col-row clear">
					<div class="grid-col grid-col-3 sidebar">
						<div class="contacts">
							<div class="">
								<i class="fa  fa-globe"></i>
								<div class="contact-content">
									<strong>Where we are:</strong>
									<p>12 - Simpson St.,<br/>Windhoek West</p>
								</div>
							</div>
							<div class="">
								<i class="fa fa-phone"></i>
								<div class="contact-content">
									<strong>Customer Care:</strong>
									<p>+264 81 556 2426</p>
								</div>
							</div>
							<div class="">
								<i class="fa fa-envelope-o"></i>
								<div class="contact-content">
									<strong>General Email:</strong>
									<p>hello@blindcommunication.com</p>
								</div>
							</div>
							<div class="">
								<i class="fa  fa-power-off"></i>
								<div class="contact-content">
									<strong>Work Time:</strong>
									<p>Mon. - Fri. 09:00 - 17:00</p>
								</div>
							</div>
							<div class="last">
								<i class="fa fa-share-alt"></i>
								<div class="contact-content">
									<strong>Follow us:</strong>
									<a href="https://twitter.com/BlindCommun" class="contact-round"><i class="fa fa-twitter"></i></a>
									<a href="https://www.facebook.com/Blind-Communication-112872130456626/" class="contact-round"><i class="fa fa-facebook"></i></a>
									<a href="https://www.instagram.com/blind.communication/" class="contact-round"><i class="fa fa-instagram"></i></a>
									<a href="https://www.youtube.com/channel/UCLFVC-weA6baJdkFE54b_7Q"><div class="contact-round"><i class="fa fa-youtube"></i></div></a>
								
								</div>
							</div>
						</div>	
					</div>
					<div class="grid-col grid-col-9">
						<div class="composer">
							<div class="info-boxes error-message" id="feedback-form-errors">
								<div class="info-box-icon"><i class="fa fa-times"></i></div>
								<strong>Error box</strong><br />
								<div class="message"></div>
							</div>
							<div class="info-boxes confirmation-message" id="feedback-form-success">
								<div class="info-box-icon"><i class="fa fa-check"></i></div>
								<strong>Confirmation box</strong><br /> 
								<div class="close-button"><i class="fa fa-times"></i></div>
							</div>
						</div>
						<div class="email_server_responce"></div>
						<form action="php/contacts-process.php" method="post" id="feedback-form" class="message-form clear">
							<p class="message-form-author">
								<label for="author">Your Name <span class="required">*</span></label>
								<input id="author" name="name" type="text" value="" size="30" aria-required="true">
							</p>
							<p class="message-form-email">
								<label for="email">Your E-mail <span class="required">*</span></label>
								<input id="email" name="email" type="text" value="" size="30" aria-required="true">
							</p>
							<p class="message-form-website">
								<label for="website">Your Website <span class="required">*</span></label>
								<input id="website" name="website" type="text" value="" size="30" aria-required="true">
							</p>
							<p class="message-form-message">
								<label for="message">Your Messege</label>
								<textarea id="message" name="message" cols="45" rows="10" aria-required="true"></textarea>
							</p>
							<p class="form-submit rectangle-button green medium">
								<input name="submit" type="submit" id="submit" value="Send">
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ page content -->
	<!-- map -->
	<div class="contact-map">
		<div class="map">
				
			<div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.4514433280665!2d17.06915331559221!3d-22.562212831339963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1c0b1b68d28eea87%3A0xcbd5801a71c09bc4!2sSimpson%20Street%2C%20Windhoek!5e0!3m2!1spt-PT!2sna!4v1593602737991!5m2!1spt-PT!2sna" width="100%" height="800px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>

		</div>
		<div class="subscribe">
			<div class="grid-row clear">
				<div class="them-mask"></div>
				<div class="subscribe-header">subscribe</div>
				<form action="contact.php" class="clear" method="post">
				
					<input type="email" name="BEmail" placeholder="Your Email Address">
					<button type="submit" name="Submit" class="button-send">Send</button>
				</form>
			</div>
		</div>
	</div>
	<!--/ map -->
	<!-- page footer -->
	<footer id="footer">
		<div class="grid-row clear">
			<div class="footer">
				<div id="copyright"><span>2020 BLIND COMMUNICATION.</span> All rights reserved.</div>
				<a href="home" class="footer-logo"><img src="images/logo.png" alt=""></a>

				<div class="social">
					
					<a href="https://twitter.com/BlindCommun"><div class="contact-round"><i class="fa fa-twitter"></i></div></a>
					<a href=""><div class="contact-round"><i class="fa fa-facebook"></i></div></a>
					<a href="https://www.instagram.com/blind.communication/"><div class="contact-round"><i class="fa fa-instagram"></i></div></a>
					<a href="https://www.youtube.com/channel/UCLFVC-weA6baJdkFE54b_7Q"><div class="contact-round"><i class="fa fa-youtube"></i></div></a>
                    <a href="https://www.behance.net/blindcommunication"><div class="contact-round"><i class="fa fa-behance"></i></div></a>
					
				</div>
				
			</div>
		</div>
	</footer>
	<!--/ page footer  -->
	<a href="#" id="scroll-top" class="scroll-top"><i class="fa fa-angle-up"></i></a>
	
	<!-- script -->
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.owl.carousel.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/retina.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/jquery.form.min.js"></script>
	<!--/ script -->
</body>
</html>