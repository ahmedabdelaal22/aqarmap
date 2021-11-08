
<?php include('header.php');?>

<body>
	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="color-main">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->
	<!-- search modal -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form" action="http://webdesign-finder.com/">
				<div class="form-group">
					<input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
				</div>
				<button type="submit" class="btn">Search</button>
			</form>
		</div>
	</div>

	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls p-normal">
			<!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
			<!--
		<ul class="list-unstyled">
			<li>Message To User</li>
		</ul>
		-->

		</div>
	</div>
	<!-- eof .modal -->

	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

			<?php include('nav.php');?>
			
						<section class="page_title ls s-py-50 corner-title ls invise overflow-visible">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1>About</h1>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index/">Home</a>
								</li>
								<li class="breadcrumb-item active">
									About
								</li>
							</ol>
							<div class="divider-15 d-none d-xl-block"></div>
						</div>
					</div>
				</div>
			</section>


			<section class="s-pt-30 s-pt-lg-50 ls about">
				<div class="divider-60 d-none d-xl-block"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="main-content text-center">
								<h5>
									"We love what we do and we love helping others succeed at what they love to do."
								</h5>
								<i class="rt-icon2-user"></i>
								<div class="divider-10 d-none d-xl-block"></div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="s-pt-0  s-pb-30 s-pt-lg-30 s-pb-lg-75 ls about-icon teaser-contact-icon">
				<div class="divider-10 d-none d-xl-block"></div>
				<div class="container">
					<div class="row c-mt-50 c-mt-lg-0">
						<div class="col-lg-4 text-center call-icon">
							<div class="border-icon">
								<div class="teaser-icon">
									<img src="images/icon1_about.png" alt="">
								</div>
							</div>
							<h6>
								Who We Are
							</h6>
							<div class="icon-content">
								<p>
									We are a team of web design and development professionals who love partnering with good people and businesses to help them achieve online success.
								</p>
							</div>
						</div>
						<div class="col-lg-4 text-center write-icon">
							<div class="divider-30 d-none d-xl-block"></div>
							<div class="border-icon">
								<div class="teaser-icon">
									<img src="images/icon2_about.png" alt="">
								</div>
							</div>
							<div class="icon-content">
								<h6>
									What We Do
								</h6>
								<p>
									We’re focused on honing our crafts and bringing everything we have to the table for our clients. We create custom, functional websites focused on converting your users into customers.
								</p>
							</div>
						</div>
						<div class="col-lg-4 text-center visit-icon">
							<div class="border-icon">
								<div class="teaser-icon">
									<img src="images/icon3_about.png" alt="">
								</div>
							</div>
							<div class="icon-content">
								<h6>
									Why We Do It
								</h6>
								<p>
									Each of us loves what we do and we feel that spirit helps translate into the quality of our work. Working with clients who love their work combines into a fun, wonderful partnership for everyone involved.
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="s-pt-20 s-pt-lg-30 gallery-carousel main-gallery container-px-0">
				<div class="container-fluid">
					<div class="divider-5 d-none d-xl-block"></div>
					<div class="row">
						<div class="col-lg-12">
							<div class="owl-carousel gallery-owl-nav" data-autoplay="false" data-responsive-lg="5" data-responsive-md="3" data-responsive-sm="3" data-responsive-xs="2" data-nav="true" data-dots="false" data-filters=".gallery-filters" data-margin="0" data-loop="true">
								<div class="vertical-item item-gallery content-absolute text-center ds port-54">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="aazeen">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">Fashion</a>
										</h6>
										<h6>
											<a href="services.php">Aazeen</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-54">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="abcnews-clone">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">Fashion</a>
										</h6>
										<h6>
											<a href="services.php">Abcnews clone</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-54">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="abito">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">Fashion</a>
										</h6>
										<h6>
											<a href="services.php">Abito</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-55">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="academic">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">Business</a>
										</h6>
										<h6>
											<a href="services.php">Academic</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-55">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="acmeblog">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">Business</a>
										</h6>
										<h6>
											<a href="services.php">Acmeblog</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-53">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="acmephoto">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">Photography</a>
										</h6>
										<h6>
											<a href="services.php">Acmephoto</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-18">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="activello">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">newspaper</a>
										</h6>
										<h6>
											<a href="services.php">Activello</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-18">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="adapt">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">newspaper</a>
										</h6>
										<h6>
											<a href="services.php">Adapt</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-54">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="adler">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">Fashion</a>
										</h6>
										<h6>
											<a href="services.php">Adler</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-53">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="agency-lite">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">Photography</a>
										</h6>
										<h6>
											<a href="services.php">Agency lite</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-55">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="albar">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">Business</a>
										</h6>
										<h6>
											<a href="services.php">Albar</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-18">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="alchem">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">newspaper</a>
										</h6>
										<h6>
											<a href="services.php">Alchem</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-55">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="alibaba-clone">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">Business</a>
										</h6>
										<h6>
											<a href="services.php">Alibaba clone</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-53">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="Alizee">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="services.php">Photography</a>
										</h6>
										<h6>
											<a href="services.php">Alizee</a>
										</h6>
									</div>
								</div>
							</div>
							<!-- .owl-carousel-->
						</div>
					</div>
				</div>
			</section>
			<section class="container mobile_apps">
				<div class="page_slider">
				<div class="shortcode-team-slider">
					<h3 class="slider-title">Mobile Apps</h3>
					<h3 class="slider-title d-none d-lg-block d-xl-none">Mobile Apps</h3>
					<div class="flexslider team-slider" data-nav="false" data-dots="true">
						<ul class="slides">
							<li class="ls">
								<img src="images/team/team_slide_01.jpg" alt="">
							</li>
							<li class="ls">
								<img src="images/team/team_slide_02.jpg" alt="">
							</li>
							<li class="ls">
								<img src="images/team/team_slide_03.jpg" alt="">
							</li>
							<li class="ls">
								<img src="images/team/team_slide_04.jpg" alt="">
							</li>
						</ul>
					</div>
					<!-- eof flexslider -->
					<div class="flexslider-controls">
						<ul class="flex-control-nav-1">
							<li class="menu_item">Mobile Wallet</li>
							<li class="menu_item">Social Network</li>
							<li class="menu_item">Food Delivery</li>
							<li class="menu_item flex-active">Travel Booking</li>
						</ul>
					</div>
				</div>
				</div>
			</section>
			<section class="about-map ms page_map" data-draggable="false" data-scrollwheel="false">
<iframe src="https://www.google.com/maps/embed/v1/place?q=Bengal Eco Intelligent Park, EM Block, Sector V, Saltlake, Kolkata 700091&zoom=17&key=AIzaSyCXV9O0hBrMwfc-lcGlRyA5GQWZG7Wouig" width=100% height="500" style='border:0; margin-top:20px;'></iframe>

			</section>



			<?php include('footer.php');?>


		</div>
		<!-- eof #box_wrapper -->
	</div>
</body>
</html>