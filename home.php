<!DOCTYPE HTML>
<html>



<head>
	<title>Home | Blind Communication</title>
	<link rel="shortcut icon" type="image/png" href="images/log.png"> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!--styles -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/jquery.owl.carousel.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="Subscribe/style.css">
	
	<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />


<style>

h2,
.Error {
    color: #ffffff;
    font-family: Bitter, Georgia, "Times New Roman", Times, serif;
    font-size: 1.4em;
    font-weight: bold;
}

</style>
	<!--styles -->
</head>
<body class="main-page pc">
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
	<div class="tp-banner-container">
		<div class="tp-banner">
			<ul>
				<li>
					<img src="images/slider/first-slide.gif" alt>
					<div class="tp-caption  sft sl-title" data-x="center" data-y="center" data-voffset="-90" data-speed="700" data-start="1700" data-easing="easeOutBack"></div>
					<p class="tp-caption sfb" data-x="center" data-y="center" data-voffset="40" data-speed="500" data-start="1900" data-easing="easeOutBack"></p>
   				</li>
   				<li>
		<div class="tp-caption sft customout tp-videolayer fullscreenvideo"
						data-x="center" data-hoffset="134"
						data-y="center" data-voffset="-6"
						data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="600"
						data-start="1000"
						data-easing="Power4.easeOut"
						data-endspeed="500"
						data-endeasing="Power4.easeOut"
						data-videoposter="images/slider/second-slide.jpg"
						data-autoplay="false"
						data-autoplayonlyfirsttime="false"
						data-nextslideatend="false"
						data-ytid="Q-WuUHNIz8"
						data-videoattributes="enablejsapi=1&html5=1&hd=1&wmode=opaque&showinfo=0&rel=0&controls=0&disablekb=1&start=1380"
						data-videocontrols="false"
						style="z-index: 1">
					</div>
					
   				</li>
   				<li>
					<img src="images/slider/third-slide.gif" alt>
					
   				</li>
			</ul>
			<div class="scroll-down-button">
				<img src="images/down-button.png" class="down-button" alt>
				<i class="fa fa-angle-down"></i>
			</div>
		</div>
	</div>
	<!-- page header -->
	<header id="home">
		<!-- sticky menu -->
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
							<li><a href="home.php" class="active-link">Home</a></li>
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
		<!--/ sticky menu -->
	</header>

	<!--/ pade header -->
	<!-- page content -->
	<section id="about" class="about-us padding-section">
		<div class="grid-row">
			<div class="grid-col-row clear">
				<div class="grid-col grid-col-6 col-sd-12">
					<!-- section title -->
					<div class="title">
						<span class="main-title">AGENCY</span>
						<span class="slash-icon">/<!-- <i class="fa fa-angle-double-right"></i> --></span><br/>
						WE LOVE TALKING <br/>ABOUT BRANDS.
					</div>
					<!-- section title -->
					<dl>
						
							<dd>We believe that truly impactful brands inspire their audiences into action, to dream, to change. They leave an impression on their audiences and wield genuine influence. Creating work like this is the manifestation of what we believe and the core of our organization. It is what brought us together to partner with our clients to create impactful work that not only represents their business, but also connects them with people emotionally. Through strategy, design, content, video, and technology, we at blind commun. agency we create brands that go beyond the business. </dd>
						
							<dd> </dd>
						
					</dl>
					
				</div>
				<div class="grid-col grid-col-6 content-img col-sd-12">
					<img class="ipad" src="images/ipad.png" alt>
					<img id="splash-1" src="img/splash-1.png" alt>
					<img id="splash-2" src="img/splash-2.png" alt>
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
					</div>
					<div class="item-example grid-col grid-col-3">
						<div class="rectangle"><i class="fa fa-rocket"></i></div>
						<h3>BRANDING & MARKETING</h3>
						<div class="line"></div>
						<p>Business Strategy & Consulting, Brand Strategy & Workshops, Market Research / Market Strategy, Brand Development (DNA), Product Launch Strategy, Content Creation, Community Management.</p>
					</div>
					<div class="item-example grid-col grid-col-3">
						<div class="rectangle"><i class="fa fa-image"></i></div>
						<h3>PRODUCT & GRAPHIC DESIGN</h3>
						<div class="line"></div>
						<p>Logo Development, Brand Identity Systems, Brochures / Sales Tools, Packaging / Out-of-Box Experience, Product Activation Campaigns, Creative Brand Campaigns, Copywriting.</p>
					</div>
					<div class="item-example grid-col grid-col-3">
						<div class="rectangle"><i class="fa fa-gamepad"></i></div>
						<h3>WEB DESIGN & DEVELOPMENT</h3>
						<div class="line"></div>
						<p>Websites, Customer Experience and UI/UX, Responsive Design / Development, Mobile / Apps / E-commerce, Blog Development, Game.</p>
					</div>
			</div>
		</div>
	</section>

	<section class="text-section parallaxed">
		<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
			<img src="images/parallax-2.jpg" alt="">
		</div>
		<div class="grid-row">
			<div class="parallax-content-second">
				<div class="grid-col-row clear">
					<div class="grid-col grid-col-3">
						<div class="counter-block">
							<i class="fa fa-puzzle-piece"></i>
							<div class="counter" data-count="575"></div>
							<div class="counter-name">Creative Work</div>
						</div>
					</div>
					<div class="grid-col grid-col-3">
						<div class="counter-block">
							<i class="fa fa-group"></i>
							<div class="counter" data-count="635"></div>
							<div class="counter-name">Satisfied Clients</div>
						</div>							
					</div>
					<div class="grid-col grid-col-3">
						<div class="counter-block">
							<i class="fa fa-calendar"></i>
							<div class="counter" data-count="750"></div>
							<div class="counter-name">Working Days</div>
						</div>
					</div>
					<div class="grid-col grid-col-3">
						<div class="counter-block last">
							<i class="fa fa-coffee"></i>
							<div class="counter" data-count="430"></div>
							<div class="counter-name">Cups Of Coffe</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="team" class="our-team padding-section">
		<div class="grid-row">
			<div class="grid-col-row clear">
				<div class="grid-col grid-col-6 col-sd-12">
					<div class="title">
						<span class="main-title">OUR TEAM</span>
						<span class="slash-icon">/</span><br/>WE THINK. WE FEEL. WE DO.
					</div>
					<dl>
						
							<dd>Our team is a perfect blend of strategic thinkers, passionate creatives, and technology wizards. There's nothing we love more than taking your language (your idea, story, new venture) and turning it into something real and communicable. Founded in 2019, Blind Communication was created with the belief to create and give the rightful position to Namibian brands. Since then we've worked hard toward this vision in this changed economy. </dd>
					</dl>
					<br />
					<div class="carousel-nav">
						<div class="carousel-button">
							<div class="prev"><i class="fa fa-chevron-left"></i></div>
							<div class="next"><i class="fa fa-chevron-right"></i></div>
						</div>
						<div class="carousel-line"></div>
					</div>
						<div id="tabs-carousel" class="owl-carousel choose-team">
							<div class="team-item">
								<div class="border-img">
									<a id="tab1" class="active">
										<div class="window-tabs"><div class="overflow-block"></div><img src="images/us/img2.jpg" alt></div>
									</a>
								</div>
								<h2>Pedro Mateus</h2>
								<p>Creative Director</p>
							</div>
<!-- /////////////////////////////////////////////////PHOTO SECTIONS///////////////////////////////////// -->
							<div class="team-item">
								<div class="border-img">
									<a id="tab2"><div class="window-tabs">
										<div class="overflow-block"></div><img src="images/us/img1.jpg" alt></div>
									</a>
								</div>
								<h2>Yarubbi Lushetile</h2>
								<p>Advertisting Strategist</p>
							</div>

							<div class="team-item">
								<div class="border-img">
									<a id="tab3">
										<div class="window-tabs"><div class="overflow-block"></div><img src="images/us/img3.jpg" alt></div>
									</a>
								</div>
								<h2>Osvaldo Matateu</h2>
								<p>Account Manager</p>
							</div>

							<div class="team-item">
								<div class="border-img">
									<a id="tab4">
										<div class="window-tabs"><div class="overflow-block"></div><img src="images/us/img4.jpg" alt></div>
									</a>
								</div>
								<h2>Victoria Gure</h2>
								<p>Copywriter</p>
							</div>
							<div class="team-item">
								<div class="border-img">
									<a id="tab5">
										<div class="window-tabs"><div class="overflow-block"></div><img src="images/us/img5.jpg" alt></div>
									</a>
								</div>
								<h2>Assad Claudio</h2>
								<p>Art Director</p>
							</div>
							<div class="team-item">
								<div class="border-img">
									<a id="tab6">
										<div class="window-tabs"><div class="overflow-block"></div><img src="images/us/img6.jpg" alt></div>
									</a>
								</div>
								<h2>Claudio Garcia</h2>
								<p>Web Developer</p>
							</div>
							<div class="team-item">
								<div class="border-img">
									<a id="tab7">
										<div class="window-tabs"><div class="overflow-block"></div><img src="images/us/img7.jpg" alt></div>
									</a>
								</div>
								<h2>ESTHER EINO</h2>
								<p>Media Manager</p>
							</div>
							<div class="team-item">
								<div class="border-img">
									<a id="tab8">
										<div class="window-tabs"><div class="overflow-block"></div><img src="images/us/img8.jpg" alt></div>
									</a>
								</div>
								<h2>ANANIAS Iipinge</h2>
								<p>Graphic Designer</p>
							</div>
							
							<div class="team-item">
								<div class="border-img">
									<a id="tab11">
										<div class="window-tabs"><div class="overflow-block"></div><img src="images/us/img11.jpg" alt></div>
									</a>
								</div>
								<h2>George Twiindileni</h2>
								<p>Production Manager</p>
							</div>
							
						</div>
						<!-- /////////////////////////////////////////////////PHOTO SECTIONS///////////////////////////////////// -->
					
				</div>
				<div class="grid-col grid-col-6 col-sd-12">
					<div class="border-img">
						<div class="window-tabs big-window-tab">
							<div class="choose-team">
								<div id="con_tab1" class="active">
									<div class="overflow-block">
										<div class="inform-item">
											<div class="item-name">Pedro Mateus<br/><p>Founder & Creative Director</p></div><p>I am an idealist, and I believe that future can be bright if we allow it to be. With that knowledge, I am designing systems that help us achieve that world. </p>
												<div class="social-person clear">
													<div class="circle"><a href="https://twitter.com/MateusPedrr"><i class="fa fa-twitter"></i></a></div>
													<div class="circle"><a href="https://www.facebook.com/profile.php?id=100031283796399"><i class="fa fa-facebook"></i></a></div>
													<div class="circle"><a href="https://www.instagram.com/pedrr_mateus/"><i class="fa fa-instagram"></i></a></div>
												</div>
											</div>
										</div>
										<img src="images/us/img2big.jpg" alt>
									</div>
								<div id="con_tab2">
									<div class="overflow-block">
										<div class="inform-item">
											<div class="item-name">Yarubbi Lushetile<br/><p>Brand & Advertisting Strategist</p></div><p>Life does not have to be as complicated as we sometimes make it. Granted, it comes with its ups and downs but the lesson and purpose comes with figuring it all out as you go along.</p>
											<div class="social-person clear">
												<div class="circle"><a href="#"><i class="fa fa-twitter"></i></a></div>
												<div class="circle"><a href="#"><i class="fa fa-facebook"></i></a></div>
												<div class="circle"><a href="#"><i class="fa fa-instagram"></i></a></div>
											</div>
										
										</div>
									</div>
									<img src="images/us/img1big.jpg" alt>
								</div>
								<div id="con_tab3">
									<div class="overflow-block">
										<div class="inform-item">
											<div class="item-name">Osvaldo Matateu<br/><p>Account Manager</p></div><p>For me, nothing is more important than inspiring people to be the best version of themselves; therefore, for this to happen, we must start with ourselves.</p>
											<div class="social-person clear">
												<div class="circle"><a href="#"><i class="fa fa-twitter"></i></a></div>
												<div class="circle"><a href="https://www.facebook.com/osvaldodasilvamatateu.rvn"><i class="fa fa-facebook"></i></a></div>
												<div class="circle"><a href="https://www.instagram.com/iamo.s.m/"><i class="fa fa-instagram"></i></a></div>
											</div>
										</div>
									</div>
									<img src="images/us/img3big.jpg" alt>
								</div>
								<div id="con_tab4">
									<div class="overflow-block">
										<div class="inform-item">
											<div class="item-name">Victoria Gure<br/><p>Copywriter</p></div><p>Many times we underestimate just how far we can go forgetting we are powerful beyond measure, life has taught me perseverance and patience. The universe will give you what’s yours. ITS COMING .</p>
											<div class="social-person clear">
												<div class="circle"><a href="#"><i class="fa fa-twitter"></i></a></div>
												<div class="circle"><a href="https://www.facebook.com/victoria.gure"><i class="fa fa-facebook"></i></a></div>
												<div class="circle"><a href="https://www.instagram.com/_minwanta_/"><i class="fa fa-instagram"></i></a></div>
											</div>
										</div>
									</div>
									<img src="images/us/img4big.jpg" alt>
								</div>
								<div id="con_tab5">
									<div class="overflow-block">
										<div class="inform-item">
											<div class="item-name">Assad Domingos<br/><p>Art Director</p></div><p> As a photographer,I get to see the world through different lenses. It’s what I use to express what I think and to communicate with the rest of the world. It makes me see and understand people in ways that allow me to appreciate life and all it comes with. It allows me to see the beauty of life in all forms.</p>
											<div class="social-person clear">
												<div class="circle"><a href="https://twitter.com/ClaudioTexeira"><i class="fa fa-twitter"></i></a></div>
												<div class="circle"><a href="https://www.facebook.com/Claudiotexeiira"><i class="fa fa-facebook"></i></a></div>
												<div class="circle"><a href="https://www.instagram.com/_claudiophotographer/"><i class="fa fa-instagram"></i></a></div>
											</div>
										</div>
									</div>
									<img src="images/us/img5big.jpg" alt>
								</div>
								<div id="con_tab6">
									<div class="overflow-block">
										<div class="inform-item">
											<div class="item-name">Claudio Garcia<br/><p>Web Developer</p></div><p>I strongly believe that we were born to be free and to seek knowledge. If you seeks for more knowledge then you can empower others to gain or learn something from what you know as well as learn from what they know. I believe life is generally an exchange of learning something in order to teach.</p>
											<div class="social-person clear">
												<div class="circle"><a href="#"><i class="fa fa-twitter"></i></a></div>
												<div class="circle"><a href="https://www.facebook.com/ClaudioTheOne"><i class="fa fa-facebook"></i></a></div>
												<div class="circle"><a href="https://www.instagram.com/claudioparadoxo/"><i class="fa fa-instagram"></i></a></div>
											</div>
										</div>
									</div>
									<img src="images/us/img6big.jpg" alt>
								</div>
								<div id="con_tab7">
									<div class="overflow-block">
										<div class="inform-item">
											<div class="item-name">Esther Eino<br/><p>Media Manager</p></div><p>I’m a very firm believer in the phrase “life is what you make of it” because at the end of the day we are only as good as we kame ourselves. Life is about following your passion and making sure that all your dreams are executed and lived throughout. Life is about being selfless, helping other, being kind, taking care of planet earth, taking care of yourself and your loved ones and of course looking good while doing it.</p>
											<div class="social-person clear">
												<div class="circle"><a href="https://twitter.com/esther_eino?s=08"><i class="fa fa-twitter"></i></a></div>
												<div class="circle"><a href="#"><i class="fa fa-facebook"></i></a></div>
												<div class="circle"><a href="https://www.instagram.com/self.ff/?igshid=1a2pm5pdq334e"><i class="fa fa-instagram"></i></a></div>
											</div>
										</div>
									</div>
									<img src="images/us/img7big.jpg" alt>
								</div>
								<div id="con_tab8">
									<div class="overflow-block">
										<div class="inform-item">
											<div class="item-name">Ananias Iipinge<br/><p>Graphic Designer</p></div><p>Life to me is like a web and in this web every single living thing is connected. Every plant, every animal, every insect, every human are connected and everything we do affects everything in this web. And everything has a purpose in this life, everyone was put here on earth to do something. And our purpose lies in the things we love. So I'm just trying to do the things I love so one day I'll be able to find my purpose.</p>
											<div class="social-person clear">
												<div class="circle"><a href="https://twitter.com/kaydashz"><i class="fa fa-twitter"></i></a></div>
												<div class="circle"><a href="https://www.facebook.com/ananias.k.iipinge"><i class="fa fa-facebook"></i></a></div>
												<div class="circle"><a href="https://www.instagram.com/skxnnynxgga6ix/"><i class="fa fa-instagram"></i></a></div>
											</div>
										</div>
									</div>
									<img src="images/us/img8big.jpg" alt>
								</div>
								<div id="con_tab11">
									<div class="overflow-block">
										<div class="inform-item">
											<div class="item-name">George Twiindileni<br/><p>Production Manager</p></div><p>Life is meaningful if there are people that you can trust and count’s  on whenever you need them, which are my family members, friends and any body’s that have the same interest in life like mine to make, the world a better place for everyone.</p>
											<div class="social-person clear">
												<div class="circle"><a href="#"><i class="fa fa-twitter"></i></a></div>
												<div class="circle"><a href="https://www.facebook.com/georgettembisa.twiindileni"><i class="fa fa-facebook"></i></a></div>
												<div class="circle"><a href="https://www.instagram.com/georgettembisat/"><i class="fa fa-instagram"></i></a></div>
											</div>
										</div>
									</div>
									<img src="images/us/img11big.jpg" alt>
								</div>
							</div>
						</div>
						<img id="splash-3" src="img/splash-3.png" alt>
					</div>
				</div>
			</div>
		</div>
	</section>

	<hr>

	<section id="portfolio" class="portfolio padding-section">
		<div class="grid-row">
			<div class="portfolio-filter clear">
				<div class="title">
					<a href="#" class="all-iso-item active" data-filter=".item">ALL</a>
					<span class="main-title">WORK</span>
					<span class="slash-icon">/</span>
					<a href="#" data-filter=".photo">BRANDING</a>
					<a href="#" data-filter=".design">MARKETING</a>
					<a href="#" data-filter=".video">ADVERTISING</a>
					<a href="#" data-filter=".web">DESIGN</a>
					<a href="#" data-filter=".music"></a>
					
				</div>
				
			</div>
		</div>
		<div class="isotope">
			<div class="item design photo video web">
				<img src="images/isotop/iiso1.jpg" alt>
			</div>
			<div class="item illust video">
				<img src="images/isotop/iso3.jpg" alt>
			</div>
			<div class="item design illust photo web">
				<img src="images/isotop/iso5.jpg" alt>
			</div>
			<div class="item illust photo">
				<img src="images/isotop/iso8.jpg" alt>
			</div>
			<div class="item design video web">
				<img src="images/isotop/iso10.jpg" alt>
			</div>
			<div class="item illust photo video">
				<img src="images/isotop/iiso2.jpg" alt>
			</div>
			<div class="item illust video web music">
				<img src="images/isotop/iiso6.jpg" alt>
			</div>
			<div class="item design photo music">
				<img src="images/isotop/iso9.jpg" alt>
			</div>
			<div class="item photo web music">
				<img src="images/isotop/iiso4.jpg" alt>
			</div>
			<div class="item photo video web music">
				<img src="images/isotop/iiso7.jpg" alt>
			</div>
			<div class="item design video music">
				<img src="images/isotop/iiso11.jpg" alt>
			</div>
		</div>
	</section>
		<section id="innovation" class="innovation parallaxed">
		<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
			<img src="images/parallax-3.jpg" alt="">
		</div>
		<div class="grid-row">
			<div class="parallax-content-third">
				<div id="client-carousel" class="owl-carousel">
					<div>
						<p class="testimonial-title">TESTIMONIALS</p>
						<div class="testimonial-separator"></div>
						<p class="testimonial-text">“ Creativity is the last human resource.”</p>
						<p class="testimonial-author">- PEDRO MATEUS</p>
					</div>
					<div>
						<p class="testimonial-title">TESTIMONIALS</p>
						<div class="testimonial-separator"></div>
						<p class="testimonial-text">“We love to work with Blind Communication Agency because they make their decisions with just a cause in mind rather than gain the client or close the cells and they lead with heart.”</p>
						<p class="testimonial-author">- OUR TEAM, AUTHOR</p>
					</div>
					<div>
						<p class="testimonial-title">TESTIMONIALS</p>
						<div class="testimonial-separator"></div>
						<p class="testimonial-text">“Great to deal with. Worked with our current systems to get our website up and running. Very flexible with our programming needs.”</p>
						<p class="testimonial-author">- SMALL JOHN</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="contact" class="contact padding-section">
		<div class="contact-head">
			<div class="grid-row">
				<div class="title">
					<span class="main-title">CONTACT</span> <span class="slash-icon">/<!-- <i class="fa fa-angle-double-right"></i> --></span> <h5>PARTNER WITH US</h5>
				</div>
			</div>
		</div>	
			<div class="grid-row clear">
				<div class="grid-contact">
					<i class="fa  fa-globe"></i>
					<div class="contact-content">
						<div class="kind-contact">Where we are:</div>
						<p>12 - Simpson St.<br/>Windhoek West</p>
					</div>
				</div>
				<div class="grid-contact">
					<i class="fa fa-phone"></i>
					<div class="contact-content">
						<div class="kind-contact">Customer Care:</div>
						<p><a href="tel:+264815562426">+264 81 556 2426</a></p>
					</div>
				</div>
				<div class="grid-contact">
					<i class="fa fa-envelope-o"></i>
					<div class="contact-content">
						<div class="kind-contact">General Email:</div>
						<p><a href="mailto:hello@blindcommunication.com">hello@blindcommunication.com</a></p>
					</div>
				</div>
				<div class="grid-contact">
					<i class="fa  fa-power-off"></i>
					<div class="contact-content">
						<div class="kind-contact">Work Time:</div>
						<p>Mon. - Fri. 09:00 - 17:00</p>
					</div>
				</div>
			</div>
			<div class="map">
				
				<div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.4514433280665!2d17.06915331559221!3d-22.562212831339963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1c0b1b68d28eea87%3A0xcbd5801a71c09bc4!2sSimpson%20Street%2C%20Windhoek!5e0!3m2!1spt-PT!2sna!4v1593602737991!5m2!1spt-PT!2sna" width="100%" height="800px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>

			</div>
			<div class="subscribe">
				<div class="grid-row clear">
					<div class="them-mask"></div>
					<div class="col-md-4">
					
					<div class="subscribe-header">subscribe</div>
					</div>
				
					<!-- //Subscribe sector -->
					<form action="home.php" class="clear col" method="post">
				
						<input type="email" name="BEmail" placeholder="Your Email Address" class="">
						<button type="submit" name="Submit" class="button-send">Send</button>
							<!--//////////////////////////////////////////////// SubscribtionsPop///////////////////////// -->

<!--//////////////////////////////////////////////// SubscribtionsPop///////////////////////// -->
					</form>
					<!-- //Subscribe ends -->
				</div>
			</div>
		</section>
		<!--/ page content -->
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
		</footer>
		<!--/ page footer -->
		<a href="#" id="scroll-top" class="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- scripts -->
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>	
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.js"></script>
		<script src="js/main.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/wow.min.js"></script>
		<script src="js/jquery.isotope.min.js"></script>
		<script src="js/jquery.owl.carousel.js"></script>
		<script src="js/jquery.fancybox.pack.js"></script>
		<script src="js/jquery.fancybox-media.js"></script>
		<script src="js/retina.min.js"></script>
		<!--/ scripts -->
	</body>
</html>