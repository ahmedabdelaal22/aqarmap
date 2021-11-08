
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
						
									<section class="page_slider main_slider">
				<div class="flexslider" data-nav="true" data-dots="false">
					<ul class="slides">
						<li class="ds text-center slide1">
							<img src="images/coding.jpg" alt="">
							<!-- <span class="flexslider-overlay"></span>
							<span class="embed-responsive embed-responsive-16by9">
							   	<iframe src="https://www.youtube.com/embed/BsafeSHN_II?feature=oembed&amp;;showinfo=0&amp;;autoplay=1&amp;;controls=0&amp;;mute=1&amp;;loop=1;;playlist=BsafeSHN_II" allowfullscreen=""></iframe>
							</span> -->

							<div class="container">
								<div class="row">
									<div class="col-12 itro_slider">
										<div class="intro_layers_wrapper">
											<div class="intro_layers">
												<div class="intro_layer" data-animation="fadeIn">
													<p class="text-uppercase intro_after_featured_word">welcome to</p>
												</div>

												<div class="intro_layer" data-animation="slideRight">
													<h2 class="text-uppercase intro_featured_word">
														Queen Tech Solutions 
													</h2>
												</div>
												<div class="intro_layer" data-animation="fadeIn">
													<h3 class="intro_before_featured_word">
														<span class="color-main2">Development</span> &
														<span class="color-main3">Branding</span> &
														<span class="color-main4">Marketing</span>
													</h3>
												</div>
												<div class="intro_layer page-bottom" data-animation="expandUp">
													<a class="btn btn-maincolor" href="#">Get Started</a>
												</div>
											</div>
											<!-- eof .intro_layers -->
										</div>
										<!-- eof .intro_layers_wrapper -->
									</div>
									<!-- eof .col-* -->
								</div>
								<!-- eof .row -->
							</div>
							<!-- eof .container -->
						</li>
						<li class="ds text-center slide2">
							<span class="flexslider-overlay"></span>
							<img src="images/slide3.jpg" alt="">
							<div class="container">
								<div class="row">
									<div class="col-12 itro_slider">
										<div class="intro_layers_wrapper">
											<div class="intro_layers">
												<div class="intro_layer" data-animation="fadeIn">
													<h3 class="text-lowercase intro_before_featured_word">
														App
													</h3>
												</div>
												<div class="intro_layer" data-animation="fadeIn">
													<h2 class="text-uppercase intro_featured_word">
														Development
													</h2>
												</div>
												<div class="intro_layer" data-animation="pullDown">
													<p class="text-uppercase intro_after_featured_word">Solutions</p>
												</div>
												<div class="intro_layer page-bottom" data-animation="expandUp">
													<a class="btn btn-maincolor" href="#">Get Started</a>
												</div>
											</div>
											<!-- eof .intro_layers -->
										</div>
										<!-- eof .intro_layers_wrapper -->
									</div>
									<!-- eof .col-* -->
								</div>
								<!-- eof .row -->
							</div>
							<!-- eof .container -->
						</li>
						<li class="ds text-center slide3">
							<img src="images/apps.jpg" alt="">
							<div class="container">
								<div class="row">
									<div class="col-12 itro_slider">
										<div class="intro_layers_wrapper">
											<div class="intro_layers">
												<div class="intro_layer" data-animation="fadeInRight">
													<h2 class="text-uppercase intro_featured_word light">
														Modern
													</h2>
												</div>
												<div class="intro_layer" data-animation="fadeIn">
													<h2 class="text-uppercase intro_featured_word bold">
														SEO & Marketing
													</h2>
												</div>
												<div class="intro_layer" data-animation="fadeIn">
													<h2 class="text-uppercase intro_featured_word">
														That works
													</h2>
												</div>

												<div class="intro_layer page-bottom" data-animation="expandUp">
													<a class="btn btn-maincolor" href="#">Get Started</a>
													<a class="btn btn-outline-maincolor" href="portfolio/">our folio</a>
												</div>
											</div>
											<!-- eof .intro_layers -->
										</div>
										<!-- eof .intro_layers_wrapper -->
									</div>
									<!-- eof .col-* -->
								</div>
								<!-- eof .row -->
							</div>
							<!-- eof .container -->
						</li>

					</ul>
				</div>
				<!-- eof flexslider -->
				<div class="flexslider-bottom d-none d-xl-block">
					<a href="#" class="mouse-button animated floating"></a>
				</div>
			</section>
			<div class="divider-10 d-block d-sm-none"></div>
			<section class="s-pt-30 s-pt-lg-50 s-pt-xl-25 ls about-home" id="about">
				<div class="divider-5 d-none d-xl-block"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
							<div class="main-content text-center">
								<div class="img-wrap text-center">
									<img src="images/vertical_line.png" alt="">
									<div class="divider-35"></div>
								</div>
								<h5>
									We are the one of the most effective Technology Companies
								</h5>
								<p>
									Getting online is easy. Succeeding online is a different story. You’ll need more than just a beautiful website to stand out these days.
									<strong>Online marketing solutions.</strong> Conversion-based web design coupled with a lead generating marketing plan, your online success is inevitable.
								</p>
								<div class="divider-30"></div>
								<div class="img-wrap text-center">
									<img src="images/vertical_line.png" alt="">
								</div>
								<div>
									<div class="divider-40"></div>
									<a class="btn btn-outline-maincolor"  href="#">Get Started</a>
									<div class="divider-40"></div>
								</div>
								<div class="img-wrap text-center">
									<img src="images/vertical_line.png" alt="">
								</div>
								<div class="divider-10 d-none d-xl-block"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="divider-10 d-block d-sm-none"></div>
			</section>

			<section class="s-pt-30 s-pb-3 service-item2 ls animate" id="services" data-animation="fadeInUp">
				<div class="container">
					<div class="row c-mb-50 c-mb-md-60">
						<div class="d-none d-lg-block divider-20"></div>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="images/service/mobile_apps_icon.png" alt="Mobile Apps">
								</div>
								<div class="item-content">
									<h6>
										<a href="service/mobile-development">Mobile Apps</a>
									</h6>

									<p>
										We cover the entire mobile app development cycle, no matter how diverse or complex your needs are.									</p>

								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="images/service/ui_ux_design_icon.png" alt="UI/UX Design">
								</div>
								<div class="item-content">
									<h6>
										<a href="service/ui-ux-design">UI/UX Design</a>
									</h6>

									<p>
										We work closely  marketers, and product teams to understand their users through research and development.									</p>

								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="images/service/blockchain_icon.png" alt="Blockchain">
								</div>
								<div class="item-content">
									<h6>
										<a href="service/blockchain">Blockchain</a>
									</h6>

									<p>
										We have a team of expert developers who all have tremendous knowledge of Blockchain technology.									</p>

								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="images/service/remote_hire_icon.png" alt="Remote Hire">
								</div>
								<div class="item-content">
									<h6>
										<a href="service/remote-hire">Remote Hire</a>
									</h6>

									<p>
										We connects companies in every size with professionals who work remotely from around the world.									</p>

								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="images/service/seo_icon.png" alt="SEO">
								</div>
								<div class="item-content">
									<h6>
										<a href="service/seo">SEO</a>
									</h6>

									<p>
										We use strategic marketing tactics that have been proven to help online businesses like yours grow.									</p>

								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="images/service/ecommerce_icon.png" alt="Ecommerce">
								</div>
								<div class="item-content">
									<h6>
										<a href="service/ecommerce">Ecommerce</a>
									</h6>

									<p>
										We offer customized eCommerce website and mobile app development services for your online store. 									</p>

								</div>
							</div>
						</div>

					</div>
					<div class="pink-line text-center">
						<img src="images/vertical_line.png" alt="">
					</div>
				</div>
			</section>


			<section class="s-pt-100 s-pt-lg-130 ds process-part skew_right s-parallax top_white_line_big overflow-visible" id="steps">
				<div class="container">
					<div class="divider-65"></div>
					<div class="row align-items-center c-mb-20 c-mb-lg-60">
						<div class="col-12 col-lg-4">
							<div class="step-left-part text-right">
								<h2 class="step-title">
									<span class="color-main">01</span>Strategy</h2>
							</div>
						</div>
						<div class="col-12 col-lg-4">
							<div class="step-center-part text-center">
								<img src="images/step_img_1.jpg" alt="">
							</div>
						</div>
						<div class="col-12 col-lg-4">
							<div class="step-right-part">
								<p class="step-text">We define your competition and target audience. Discover what is working in your online industry, then design your website accordingly.</p>
							</div>
						</div>
					</div>

					<div class="row align-items-center right c-mb-20 c-mb-lg-60">
						<div class="col-12 col-lg-4  order-lg-3">
							<div class="step-left-part">
								<h2 class="step-title color1">
									<span class="color-main2">02</span>Design</h2>
							</div>
						</div>
						<div class="col-12 col-lg-4 order-lg-2">
							<div class="step-center-part text-center">
								<img src="images/step_img_2.jpg" alt="">
							</div>
						</div>
						<div class="col-12 col-lg-4 order-lg-1 text-right">
							<div class="step-right-part ">
								<p class="step-text">Color scheme, layout, sitemap, and style. We will bring your brand to life with a one of a kind masterpiece, built just for you.</p>
							</div>
						</div>
					</div>

					<div class="row align-items-center c-mb-20 c-mb-lg-60">
						<div class="col-12 col-lg-4">
							<div class="step-left-part text-right part3">
								<h2 class="step-title">
									<span class="color-main3">03</span>Develop</h2>
							</div>
						</div>
						<div class="col-12 col-lg-4">
							<div class="step-center-part text-center">
								<img src="images/step_img_3.jpg" alt="">
							</div>
						</div>
						<div class="col-12 col-lg-4">
							<div class="step-right-part">
								<p class="step-text">We turn your ideas into a reality. Your website will be placed on a "development server" where you get to watch the whole process, live.</p>
							</div>
						</div>
					</div>

					<div class="row align-items-center right c-mb-20 c-mb-lg-60">
						<div class="col-12 col-lg-4  order-lg-3">
							<div class="step-left-part part4">
								<h2 class="step-title color1">
									<span class="color-main4">04</span>Support</h2>
							</div>
						</div>
						<div class="col-12 col-lg-4 order-lg-2">
							<div class="step-center-part text-center last">
								<img src="images/step_img_2.jpg" alt="">
							</div>
						</div>
						<div class="col-12 col-lg-4 order-lg-1 text-right">
							<div class="step-right-part ">
								<p class="step-text">This is where you go live, to the world. Design, marketing, and maintenance; we'll be at your side for the life of your site.</p>
							</div>
						</div>
					</div>
					<div class="divider-10 d-block d-sm-none"></div>
					<div class="img-wrap text-center">
						<img src="images/vertical_line2.png" alt="">
					</div>
					<div class=" white-button text-center">
						<a class="btn white-btn" href="#">Get Started</a>
					</div>
					<div class="divider-30 d-none d-xl-block"></div>
				</div>
			</section>
﻿<section class="s-pt-75 s-pt-xl-50 gallery-carousel main-gallery container-px-0" id="gallery">
				<div class="container-fluid">
					<div class="img-wrap text-center">
						<img src="images/vertical_line.png" alt="" class="gallery_line">
						<div class="divider-40 d-block d-sm-none"></div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="row justify-content-center">
								<div class="">
									<div class="filters gallery-filters small-text text-lg-right">
										<a href="#" data-filter="*" class="active selected">All</a>
										<!-- <a href="#" data-filter=".port-18">newspaper</a> -->
										<a href="#" data-filter=".port-38">eCommerce</a>
										<!-- <a href="#" data-filter=".port-49">magazine</a> -->
										<a href="#" data-filter=".port-53">Photography</a>
										<a href="#" data-filter=".port-55">Business</a>
										<a href="#" data-filter=".port-54">Fashion</a>
									</div>
								</div>
							</div>
							<div class="owl-carousel gallery-owl-nav" data-autoplay="false" data-responsive-lg="5" data-responsive-md="3" data-responsive-sm="3" data-responsive-xs="2" data-nav="true" data-dots="false" data-filters=".gallery-filters" data-margin="0" data-loop="true">
								<div class="vertical-item item-gallery content-absolute text-center ds port-54">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="aazeen">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="portfolio/">Fashion</a>
										</h6>
										<h6>
											<a href="portfolio/">Aazeen</a>
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
											<a class="small-text" href="portfolio/">Fashion</a>
										</h6>
										<h6>
											<a href="portfolio/">Abcnews clone</a>
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
											<a class="small-text" href="portfolio/">Fashion</a>
										</h6>
										<h6>
											<a href="portfolio/">Abito</a>
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
											<a class="small-text" href="portfolio/">Business</a>
										</h6>
										<h6>
											<a href="portfolio/">Academic</a>
										</h6>
									</div>
								</div>
								
								<div class="vertical-item item-gallery content-absolute text-center ds port-54">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="asterialite">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="portfolio/">Fashion</a>
										</h6>
										<h6>
											<a href="portfolio/">Asterialite</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-49">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="asterion">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="portfolio/">magazine</a>
										</h6>
										<h6>
											<a href="portfolio/">Asterion</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-38">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="astra">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="portfolio/">eCommerce</a>
										</h6>
										<h6>
											<a href="portfolio/">Astra</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-53">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="astrid">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="portfolio/">eCommerce</a>
										</h6>
										<h6>
											<a href="portfolio/">Astrid</a>
										</h6>
									</div>
								</div>
								<div class="vertical-item item-gallery content-absolute text-center ds port-53">
									<div class="item-media">
										<img src="images/portfolio/aazeen.jpg" alt="athena">
										<div class="media-links">

										</div>
									</div>
									<div class="item-content">
										<h6>
											<a class="small-text" href="portfolio/">eCommerce</a>
										</h6>
										<h6>
											<a href="portfolio/">Athena</a>
										</h6>
									</div>
								</div>
								
								
								
								
							</div>
							<!-- .owl-carousel-->
						</div>
					</div>
				</div>
			</section>		
			<br><br><br><br>	

			<section class="ls ms book-item s-pb-30 s-pb-lg-25">
				<div class="corner corner-light"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="text-block text-center">
								<div class="btn-book-section overflow-visible">
									<a href="#" class="btn btn-maincolor">Get Started</a>
								</div>
								<div class="img-wrap text-center">
									<img src="images/vertical_line.png" alt="">
									<div class="divider-35"></div>
								</div>
								<h5 id="b2b">
									B2B Marketing & Web Design
									<br> Resources
								</h5>
								<p>
									B2B client acquisition is not the same as B2C– a B2B website, brand messaging and content marketing play a much different role. We understand the B2B marketing and sales funnel and the tactics that generate and nurture ideal client leads.
								</p>
								<div class="divider-30"></div>
							</div>
						</div>

						<div class="text-center img-wrap col-md-12">
							<div>
								<img src="images/vertical_line.png" alt="">
							</div>
							<div class="divider-40"></div>
							<a href="#" class="btn btn-outline-maincolor">Get Started</a>
							<div class="divider-40"></div>
							<div>
								<img src="images/vertical_line.png" alt="">
							</div>
						</div>
					</div>
					<div class="divider-10"></div>
				</div>
			</section>

					
			<section class="s-pt-130 s-pb-15 s-pb-md-50 s-pt-xl-100 s-pb-lg-30 overflow-visible s-parallax testimonials-sliders main-testimonials ds" id="testimonials">
				<div class="corner ls ms"></div>
				<div class="container">
					<div class="row c-mt-30 c-mt-md-0">
						<div class="divider-20"></div>
						<div class="text-center img-wrap line col-md-12">
							<img src="images/vertical_line2.png" alt="">
						</div>
						<div class="divider-40 d-none d-md-block"></div>
						<div class="col-md-12">
							<div class="owl-carousel" data-autoplay="false" data-responsive-lg="1" data-responsive-md="1" data-responsive-sm="1" data-nav="false" data-dots="true" id="quote">
								<div class="quote-item">
									<div class="quote-image">
										<img src="images/team/testimonials_01.jpg" alt="">
									</div>
									<h5>
										Bill Gates
									</h5>
									<p>
										<em class="big">
											Your time is limited, so don't waste it living someone else's life. Don't be trapped by dogma - which is living with the results of other people's thinking. Don't let the noise of others' opinions drown out your own inner voice. And most important, have the courage to follow your heart and intuition.
										</em>
									</p>
								</div>
								<div class="quote-item">
									<div class="quote-image">
										<img src="images/team/testimonials_02.jpg" alt="">
									</div>
									<h5>
										Steve Jobs
									</h5>
									<p>
										<em class="big">
											The first rule of any technology used in a business is that automation applied to an efficient operation will magnify the efficiency. The second is that automation applied to an inefficient operation will magnify the inefficiency.
										</em>
									</p>
								</div>
                                  <div class="quote-item">
									<div class="quote-image">
										<img src="images/team/testimonials_03.jpg" alt="">
									</div>
									<h5>
										Jack Ma
									</h5>
									<p>
										<em class="big">
											If you want to win in the 21st century, you have to empower others, making sure other people are better than you are. Then you will be successful.  If you view everyone as your enemies then everyone around you will be enemies.
										</em>
									</p>
								</div>
							</div>
							<!-- .testimonials-slider -->
						</div>
						<div class="divider-55 d-none d-md-block"></div>
						<div class="text-center img-wrap col-md-12">
							<img src="images/vertical_line2.png" alt="">
						</div>
						<div class="divider-10 d-none d-md-block"></div>
					</div>
				</div>
				
				<div class="corner corner-light"></div>
			</section>


			<section class="s-pt-130 s-pt-md-50 ls text-section">
				<div class="divider-30"></div>
				<div class="container">
					<div class="row">
						<div class="text-center col-md-12 justify-content-center text-block">
							<img src="images/vertical_line.png" alt="">
							<div class="divider-35"></div>
							<div class="content">
								<h1>
									Lets Get Started
									<br> Your Project
								</h1>
								<p>
									We’ll help to achieve your goals and to grow business
								</p>
								<div class="divider-30"></div>
							</div>
							<img src="images/vertical_line.png" alt="">
							<div>
								<div class="divider-40"></div>
								<a href="#" class="btn btn-outline-maincolor">Let’s Talk!</a>
								<div class="divider-30"></div>
							</div>
							<div class="img-wrap overflow-visible">
								<img src="images/vertical_line.png" alt="">
								<div class="divider-5 d-none d-xl-block"></div>
							</div>
						</div>

					</div>
				</div>
			</section>

			<section class="s-pt-50 s-pb-100 s-pt-lg-30 s-pb-lg-75 ls ms teaser-contact-icon main-icon s-parallax" id="contact">
				<div class="corner corner-inverse"></div>
				
				<div class="container">
					<div class="divider-10 d-none d-xl-block"></div>
					<div class="row c-mb-50 c-mb-lg-0">
						<div class="col-lg-4 text-center">
							<div class="border-icon">
								<div class="teaser-icon">
									<img src="images/icon1.png" alt="">
								</div>
							</div>
							<h6>
								Call Us
							</h6>
							<p>
								<strong>Sales:</strong> +1 (408) 786-5555
								<br>
								<strong>Support:</strong> +91 862-000-5555
							</p>
						</div>
						<div class="col-lg-4 text-center">
							<div class="border-icon">
								<div class="teaser-icon">
									<img src="images/icon3.png" alt="">
								</div>
							</div>
							<h6>
								Write Us
							</h6>
							<p>
								sales@queentechsolutions.net
								<br> support@queentechsolutions.net
							</p>
						</div>
						<div class="col-lg-4 text-center">
							<div class="border-icon">
								<div class="teaser-icon">
									<img src="images/icon2.png" alt="">
								</div>
							</div>
							<h6>
								Visit Us
							</h6>
							<p>
								Bengal Eco Intelligent Park
								<br> Sector V, Saltlake, Kolkata 700091
							</p>
						</div>
					</div>
					<div class="divider-30 d-none d-lg-block"></div>
					
				</div>
				<div class="divider-10"></div>
			</section>


			<?php include('footer.php');?>


		</div>
		<!-- eof #box_wrapper -->
	</div>
</body>
</html>