
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

			<!-- template sections -->
<?php include('nav.php');?>
						<section class="page_title ls s-py-50 corner-title ls invise overflow-visible">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1>Portfolio</h1>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index/">Home</a>
								</li>
								<li class="breadcrumb-item active">
									Portfolio
								</li>
							</ol>
							<div class="divider-15 d-none d-xl-block"></div>
						</div>
					</div>
				</div>
			</section>


			<section class="ls s-pt-50 s-pb-100 container-px-0 gallery-fullwidth">
				<div class="d-none d-lg-block divider-20"></div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="row ">
								<div class="col-md-11 col-xl-12">
									<div class="filters gallery-filters small-text text-lg-center">
										<a href="#" data-filter="*" class="active selected">All</a>
										<!-- <a href="#" data-filter=".port-18">newspaper</a> -->
										<a href="#" data-filter=".port-38">eCommerce</a>
										<a href="#" data-filter=".port-53">Photography</a>
										<a href="#" data-filter=".port-55">Business</a>
										<!-- <a href="#" data-filter=".port-49">magazine</a> -->
										<a href="#" data-filter=".port-54">Fashion</a>
									</div>
								</div>
							</div>


							<div class="row isotope-wrapper masonry-layout c-gutter-5 c-mb-5" data-filters=".gallery-filters">
								
								
								<div class="col-xl-3 col-sm-6 port-38">

									<div class="vertical-item item-gallery content-absolute gallery text-center ls">
										<div class="item-media">
											<img src="images/portfolio/aazeen.jpg" alt="">
											<div class="media-links">
											</div>
										</div>
										<div class="item-content">
											<h6>
												<a class="tags small-text" href="portfolio/">Fashion</a>
												<br>
												<a href="portfolio/">Cenote</a>
											</h6>
										</div>
									</div>

								</div>
								<div class="col-xl-3 col-sm-6 port-55">

									<div class="vertical-item item-gallery content-absolute gallery text-center ls">
										<div class="item-media">
											<img src="images/portfolio/aazeen.jpg" alt="">
											<div class="media-links">
											</div>
										</div>
										<div class="item-content">
											<h6>
												<a class="tags small-text" href="portfolio/">Fashion</a>
												<br>
												<a href="portfolio/">Anariel</a>
											</h6>
										</div>
									</div>

								</div>
								
								
								
								<div class="col-xl-3 col-sm-6 port-54">

									<div class="vertical-item item-gallery content-absolute gallery text-center ls">
										<div class="item-media">
											<img src="images/portfolio/aazeen.jpg" alt="">
											<div class="media-links">
											</div>
										</div>
										<div class="item-content">
											<h6>
												<a class="tags small-text" href="portfolio/">Fashion</a>
												<br>
												<a href="portfolio/">Design Lab</a>
											</h6>
										</div>
									</div>

								</div>
								<div class="col-xl-3 col-sm-6 port-53">

									<div class="vertical-item item-gallery content-absolute gallery text-center ls">
										<div class="item-media">
											<img src="images/portfolio/aazeen.jpg" alt="">
											<div class="media-links">
											</div>
										</div>
										<div class="item-content">
											<h6>
												<a class="tags small-text" href="portfolio/">Photography</a>
												<br>
												<a href="portfolio/">Draft Portfolio</a>
											</h6>
										</div>
									</div>

								</div>
								
								<div class="col-xl-3 col-sm-6 port-54">

									<div class="vertical-item item-gallery content-absolute gallery text-center ls">
										<div class="item-media">
											<img src="images/portfolio/aazeen.jpg" alt="">
											<div class="media-links">
											</div>
										</div>
										<div class="item-content">
											<h6>
												<a class="tags small-text" href="portfolio/">Fashion</a>
												<br>
												<a href="portfolio/">Aquarella Lite</a>
											</h6>
										</div>
									</div>

								</div>
								
								
								<div class="col-xl-3 col-sm-6 port-55">
									<div class="vertical-item item-gallery content-absolute gallery text-center ls">
										<div class="item-media">
											<img src="images/portfolio/envo-magazine.png" alt="">
											<div class="media-links">
											</div>
										</div>
										<div class="item-content">
											<h6>
												<a class="tags small-text" href="portfolio/">newspaper</a>
												<br>
												<a href="portfolio/">Envo Magazine</a>
											</h6>
										</div>
									</div>
								</div>

								<div class="col-xl-3 col-sm-6 port-38">
									<div class="vertical-item item-gallery content-absolute gallery text-center ls">
										<div class="item-media">
											<img src="images/portfolio/envo-magazine.png" alt="">
											<div class="media-links">
											</div>
										</div>
										<div class="item-content">
											<h6>
												<a class="tags small-text" href="portfolio/">newspaper</a>
												<br>
												<a href="portfolio/">Envo Magazine</a>
											</h6>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-sm-6 port-38">
									<div class="vertical-item item-gallery content-absolute gallery text-center ls">
										<div class="item-media">
											<img src="images/portfolio/envo-magazine.png" alt="">
											<div class="media-links">
											</div>
										</div>
										<div class="item-content">
											<h6>
												<a class="tags small-text" href="portfolio/">newspaper</a>
												<br>
												<a href="portfolio/">Envo Magazine</a>
											</h6>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-sm-6 port-55">
									<div class="vertical-item item-gallery content-absolute gallery text-center ls">
										<div class="item-media">
											<img src="images/portfolio/envo-magazine.png" alt="">
											<div class="media-links">
											</div>
										</div>
										<div class="item-content">
											<h6>
												<a class="tags small-text" href="portfolio/">newspaper</a>
												<br>
												<a href="portfolio/">Envo Magazine</a>
											</h6>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-sm-6 port-55">
									<div class="vertical-item item-gallery content-absolute gallery text-center ls">
										<div class="item-media">
											<img src="images/portfolio/envo-magazine.png" alt="">
											<div class="media-links">
											</div>
										</div>
										<div class="item-content">
											<h6>
												<a class="tags small-text" href="portfolio/">newspaper</a>
												<br>
												<a href="portfolio/">Envo Magazine</a>
											</h6>
										</div>
									</div>
								</div>
							</div>
							<!-- .isotope-wrapper-->

							
						</div>
					</div>
				</div>
				<div class="d-none d-lg-block divider-105"></div>
			</section>



	<?php include('footer.php');?>

			
	</div>

</body>
</html>