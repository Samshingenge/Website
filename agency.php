<!DOCTYPE HTML>
<html>

<head>
	<title>Agency | Blind Communication</title>
	<link rel="shortcut icon" type="image/png" href="images/log.png"> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!--styles -->
	<link rel="stylesheet" href="Subscribe/style.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/animate.css">

	<!--styles -->
</head>
<body class="page-about pc">
	<!-- page header -->
	<header id="home">
		<!-- sticky menu -->
		<div class="stick-wrapper">
			<div class="sticky clear">
			<div class="grid-row">
				<img class="splash" src="img/splash.png" alt="">
				<div class="logo">
					<a href="home.php"><img src="images/logo.png" alt=""></a>
				</div>
				<!-- Navbar Begins -->
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
				<!-- Navbar Ends -->
			</div>
			</div>
		</div>
		<!--/ sticky menu -->
	</header>
	<!--/ page header  -->
	<div class="top-bg">
		
  
	</div>
	<!-- page content -->
	<section id="about" class="about-us">
		<div class="grid-row">
			<div class="grid-col-row clear">
				<div class="grid-col grid-col-6 col-sd-12">
					<div class="title">
						<span class="main-title">WHO WE ARE</span>
						<span class="slash-icon">/<i class="fa fa-angle-double-right"></i></span><br/>
						WE ARE BLIND COMMUNICATION
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
						<dl>
							
								<dd>Blind Communication Agency was founded on the notion of creating a brand that goes beyond the business. Living through the Fourth Industrial Revolution, Namibia has seen a surge of new industries that still need to be explored and expanded upon. Our aim is to ensure that we do everything in our power to make your business become a legacy that can be carried on for generations to come. With our team of strategic thinkers, passionate creatives and technology wizards, we aim to support brands with a series of high quality yet affordable branding through strategy, design, content and video technology. Fulfilling your journey is our mission. </dd>
								<dd> </dd>
						</dl>
				</div>
				<div class="grid-col grid-col-6 col-sd-12 fullwidth-img">
					<img src="images/about/ipad3.png" alt>
				</div>
			</div>
		</div>
		<hr/>
		<div class="grid-row clear">
			<div class="grid-col-row">
					<div class="item-example grid-col grid-col-3">
						<div class="rectangle"><i class="fa fa-video-camera"></i></div>
						<h3>VIDEO & ADVERTISING</h3>
						<div class="line"></div>
						<p>Video Production / Motion Graphics, Broadcast, Commercial TV & Radio, Content Creation / Branded Content, Digital Advertising, Influencer Marketing, Social Media.</p>
						<a class="button" href="#bottom">MORE</a>
					</div>
					<div class="item-example grid-col grid-col-3">
						<div class="rectangle"><i class="fa fa-rocket"></i></div>
						<h3>BRANDING & MARKETING</h3>
						<div class="line"></div>
						<p>Business Strategy & Consulting, Brand Strategy & Workshops, Market Research / Market Strategy, Brand Development (DNA), Product Launch Strategy, Content Creation, Community Management.</p>
						<a class="button" href="#bottom">MORE</a>
					</div>
					<div class="item-example grid-col grid-col-3">
						<div class="rectangle"><i class="fa fa-image"></i></div>
						<h3>PRODUCT & GRAPHIC DESIGN</h3>
						<div class="line"></div>
						<p>Logo Development, Brand Identity Systems, Brochures / Sales Tools, Packaging / Out-of-Box Experience, Product Activation Campaigns, Creative Brand Campaigns, Copywriting.</p>
						<a class="button" href="#bottom">MORE</a>
					</div>
					<div class="item-example grid-col grid-col-3">
						<div class="rectangle"><i class="fa fa-gamepad"></i></div>
						<h3>WEB DESIGN & DEVELOPMENT</h3>
						<div class="line"></div>
						<p>Websites, Customer Experience and UI/UX, Responsive Design / Development, Mobile / Apps / E-commerce, Blog Development, Game.</p>
						<a class="button" href="#bottom">MORE</a>
					</div>
			</div>
		</div>
	</section>
	<section class="innovation parallaxed">
		<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
			<img src="images/about/parallax-about-2.jpg" alt="">
		</div>
		<div class="grid-row">
			<div class="parallax-content-third">
				<div class="clear table">
					<div class="grid-col-4 title-innovation">
						<div class="innovation-header">our client & testimonial
						<div class="slash-line"></div></div>
					</div>
					<div class="grid-col grid-col-8">
						<div id="client-carousel" class="owl-carousel">
							<div>
								<div class="client-item clear">
									<div class="client-icon">
										<div class="border-img">
											<a href="leaders"><div class="window-tabs">
												<div class="overflow-block"></div><img src="images/team/founder.jpg" alt></div>
											</a>
										</div>
									</div>
									<h3>Pedro Mateus Co<span> - Founder</span></h3>
									<p>Helping Brands to go beyond the business is what we do as the manifestation of what we believe, more than just make a logo or a video advert we help you find the why of your business, cause we living in a changed world were most of clients are only  buying form brands who has a heart.</p>
								</div>
								<div class="client-item clear">
									<div class="client-icon">
										<div class="border-img">
											<a href="leaders"><div class="window-tabs">
												<div class="overflow-block"></div><img src="images/team/aloys.jpg" alt></div>
											</a>
										</div>
									</div>
									<h3>Aloys<span> - AJ Gurus</span></h3>
									<p>Blind Communication Agency was exactly the piece we were looking for to fit into our production process. They understood the creative treatment and interpreted design needs without any hand-holding. We weren't just looking for someone to do what we said because we weren't looking for a paintbrush. </p>
								</div>
								<div class="client-item clear">
									<div class="client-icon">
										<div class="border-img">
											<a href="leaders"><div class="window-tabs">
												<div class="overflow-block"></div><img src="images/team/diamonds.jpg" alt></div>
											</a>
										</div>
									</div>
									<h3>Mr Diamond<span> - Big Papy Beard Oil</span></h3>
									<p>Always a pleasure to work with Blind Communication. Such professional and happy people and you know you’ll receive a quick, innovative and no fuss service.</p>
								</div>
							</div>
							<div>
								<div class="client-item clear">
									<div class="client-icon">
										<div class="border-img">
											<a href="leaders"><div class="window-tabs">
												<div class="overflow-block"></div><img src="images/team/luis.jpg" alt></div>
											</a>
										</div>
									</div>
									<h3>Luis Munana<span> - Waka Waka Moo</span></h3>
									<p>The professionalism and personalized service that we got from Success Agency is unlike any other company we worked with and they made us feel so comfortable. Incredibly trustworthy and high value!!! Thank you!</p>
								</div>
								<div class="client-item clear">
									<div class="client-icon">
										<div class="border-img">
											<a href="leaders"><div class="window-tabs">
												<div class="overflow-block"></div><img src="images/team/tondo.jpg" alt></div>
											</a>
										</div>
									</div>
									<h3>Tondo Manuel<span> - TMM Fundation</span></h3>
									<p>Because of Blind Communication. I am going to do Design course just to produce something similar to what you guys are doing... You Guys are amazing.</p>
								</div>
								<div class="client-item clear">
									<div class="client-icon">
										<div class="border-img">
											<a href="leaders"><div class="window-tabs">
												<div class="overflow-block"></div><img src="images/team/helena.jpg" alt></div>
											</a>
										</div>
									</div>
									<h3>Ndapewoshali Shapwanale<span> - Simpy You Magazine </span></h3>
									<p>Blind Communication Agencyprovided effective and impactful creative to support a community outreach campaign.</p>
								</div>
							</div>
							<div>
								<div class="client-item clear">
									<div class="client-icon">
										<div class="border-img">
											<a href="leaders"><div class="window-tabs">
												<div class="overflow-block"></div><img src="images/team/kali.jpg" alt></div>
											</a>
										</div>
									</div>
									<h3>Alvaro Lito<span> - Alvaro Media</span></h3>
									<p>We love to work with Blind Communication Agency because they make their decisions with just a cause in mind rather than gain the client or close the cells and they lead with heart.</p>
								</div>
								<div class="client-item clear">
									<div class="client-icon">
										<div class="border-img">
											<a href="leaders"><div class="window-tabs">
												<div class="overflow-block"></div><img src="images/team/bia.jpg" alt></div>
											</a>
										</div>
									</div>
									<h3>Bia<span> - Bia Travel Agency</span></h3>
									<p>I am very happy with the level of service that I have come to expect from the Blind Commun team. They have helped my company grow by guiding me with the allocation of my ad budget. I have seen my business thrive through the advertising efforts.</p>
								</div>
								<div class="client-item clear">
									<div class="client-icon">
										<div class="border-img">
											<a href="leaders"><div class="window-tabs">
												<div class="overflow-block"></div><img src="images/team/carlos.jpg" alt></div>
											</a>
										</div>
									</div>
									<h3>Carlos De Oliveira<span> - CEO And OWner</span></h3>
									<p>The creative work I get from Blind Commun is pretty amazing. If I want good, strategic thinking, I approach Blind Commun before using even my own resources.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="them-mask"></div>
		<div class="background-color style-2"></div>
	</section>
	<section class="padding-section">
		<div class="grid-row clear">
			<div class="grid-col-row clear why-choose">
				<div class="grid-col grid-col-6">
					<div class="title">
						<span class="main-title">WHY CHOOSE US?</span>
						<span class="slash-icon">/<i class="fa fa-angle-double-right"></i></span>Inside/Out
					</div>
					<dl>
					
							<dd>We believe that companies and organizations are one of the greatest forms to make the world a better place. We exist to create a brand that goes beyond the business, by providing them the right visual language to develop a meaningful and sentimental relationship (consistent and efficient) with their audience, so together by step by step we can create a country filled with the wonder of creativity and infinite possibility.   </dd>
					</dl>
					<a class="rectangle-button medium green margin-top" href="contact.php">Reach Out Now</a>
				</div>
				<div class="grid-col grid-col-6">
					<ul class="skill-bar">
						<!-- skill bar item -->
						<li>
							<div class="name">making Kappuccino<span class="skill-bar-perc"></span></div>
							<div class="bar ">
								<span class="skill-bar-progress" data-value="50" ></span>
							</div>
						</li>
						<!--/skill bar item -->
						<!-- skill bar item -->
						<li>
							<div class="name">Video Production<span class="skill-bar-perc"></span></div>
							<div class="bar ">
								<span class="skill-bar-progress" data-value="75" ></span>
							</div>
						</li>
						<!--/skill bar item -->
						<!-- skill bar item -->
						<li>
							<div class="name">Branding & Design<span class="skill-bar-perc"></span></div>
							<div class="bar ">
								<span class="skill-bar-progress" data-value="90" ></span>
							</div>
						</li>
						<!--/skill bar item -->
						<!-- skill bar item -->
						<li>
							<div class="name">Marketing & Advertising<span class="skill-bar-perc"></span></div>
							<div class="bar ">
								<span class="skill-bar-progress" data-value="85"></span>
							</div>
						</li>
						<!--/skill bar item -->
						<!-- skill bar item -->
						<li>
							<div class="name">Web Development<span class="skill-bar-perc"></span></div>
							<div class="bar ">
								<span class="skill-bar-progress" data-value="60"></span>
							</div>
						</li>
						<!--/skill bar item -->
						<!-- skill bar item -->
						<li>
							<div class="name">Social Media<span class="skill-bar-perc"></span></div>
							<div class="bar ">
								<span class="skill-bar-progress" data-value="70"></span>
							</div>
						</li>
						<!--/skill bar item -->
					</ul>
					<!--/skill bar -->
				</div>
			</div>
		</div>
		<div class="grid-row">
			<div class="grid-col-row clear">
				<div class="grid-col grid-col-3">
					<div class="little-about">
						<div class="picture">
							<video width="300" height="180" controls>
								<source src="images/Works/Videos/1.Video.mp4" type="video/mp4">
								
							  Your browser does not support the video tag.
							  </video>
						</div>
						<h3 id="bottom">VIDEO EXPLAINER</h3>
					</div>
				</div>
				<div class="grid-col grid-col-3">
					<div class="little-about">
						<div class="picture">
							<video width="300" height="180" controls>
								<source src="images/Works/Videos/2.Marketing.mp4" type="video/mp4">
								
							  Your browser does not support the video tag.
							  </video>
						</div>
						<h3>MARKETING EXPLAINER</h3>
					</div>
				</div>
				<div class="grid-col grid-col-3">
					<div class="little-about">
						<div class="picture">
							<video width="300" height="180" controls>
								<source src="images/Works/Videos/3.Design.mp4" type="video/mp4">
								
							  Your browser does not support the video tag.
							  </video>
						</div>
						<h3>DESIGN EXPLAINER</h3>
						
					</div>
				</div>
				<div class="grid-col grid-col-3">
					<div class="little-about">
						<div class="picture">
						
							<video width="300" height="180" controls>

								<source src="images/Works/Videos/4.Web.mp4" type="video/mp4">
								
							  Your browser does not support the video tag.
							  </video>
						</div>
						<h3>WEBSITE EXPLAINER</h3>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ page content  -->
	<!-- subscribe -->
	<div class="subscribe">
		<div class="grid-row clear">
			<div class="them-mask"></div>
			<div class="subscribe-header">subscribe</div>
			<form action="agency.php" class="clear" method="post">
				<input type="email" name="BEmail" placeholder="Your Email Address">
				<button type="submit" name="Submit" class="button-send">Send</button>
			</form>
		</div>
	</div>
	<!--/ subscribe  -->
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

	<!--/ page footer  -->
	<a href="#" id="scroll-top" class="scroll-top"><i class="fa fa-angle-up"></i></a>
	<!-- scripts -->
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/retina.min.js"></script>
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
		
	<!--/ scripts  -->
</body>
</html>