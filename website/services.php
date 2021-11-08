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
							<h1>Services</h1>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="/">Home</a>
								</li>
								<li class="breadcrumb-item active">
									Services
								</li>
							</ol>
							<div class="divider-15 d-none d-xl-block"></div>
						</div>
					</div>
				</div>
			</section>


			<section class="ls s-pt-30 s-pb-20 s-pb-lg-50 s-pt-lg-50 c-gutter-60 c-mb-40 c-mb-md-60 service-item2">
				<div class="d-none d-lg-block divider-65"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="images/service/mobile_apps_icon.png" alt="Mobile Apps">
								</div>
								<div class="item-content">
									<h6>
										<a href="mobile_development.php">Mobile Apps</a>
									</h6>

									<p>
										We cover the entire mobile app development cycle, no matter how diverse or complex your needs are.									</p>

								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="images/service/ui_ux_design_icon.png" alt="UI/UX Design">
								</div>
								<div class="item-content">
									<h6>
										<a href="ui_ux_design.png">UI/UX Design</a>
									</h6>

									<p>
										We work closely  marketers, and product teams to understand their users through research and development.									</p>

								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="images/service/blockchain_icon.png" alt="Blockchain">
								</div>
								<div class="item-content">
									<h6>
										<a href="#">Blockchain</a>
									</h6>

									<p>
										We have a team of expert developers who all have tremendous knowledge of Blockchain technology.									</p>

								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="images/service/remote_hire_icon.png" alt="Remote Hire">
								</div>
								<div class="item-content">
									<h6>
										<a href="#">Remote Hire</a>
									</h6>

									<p>
										We connects companies in every size with professionals who work remotely from around the world.									</p>

								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="images/service/seo_icon.png" alt="SEO">
								</div>
								<div class="item-content">
									<h6>
										<a href="seo.php">SEO</a>
									</h6>

									<p>
										We use strategic marketing tactics that have been proven to help online businesses like yours grow.									</p>

								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="vertical-item text-center">
								<div class="item-media">
									<img src="images/service/ecommerce_icon.png" alt="Ecommerce">
								</div>
								<div class="item-content">
									<h6>
										<a href="ecommerce.php">Ecommerce</a>
									</h6>

									<p>
										We offer customized eCommerce website and mobile app development services for your online store. 									</p>

								</div>
							</div>
						</div>
						<!-- .col-* -->
						
						<!-- .col-* -->
						
						<!-- .col-* -->
						
						<!-- .col-* -->
						
						<!-- .col-* -->
						
						<!-- .col-* -->
						<div class="d-none d-lg-block divider-10"></div>
					</div>
				</div>
			</section>
<section class="s-pb-130 s-pb-lg-170">


	<?php include('sub_form.php');?>


			</section>
<script>
function contact_main(){
    var valid='';
    var Name=$("input#name").val();
	if($.trim(Name)=='')
	{
	$("input#name").addClass("invalid");
	valid='no';
	return false;
	}
	var Email=$("input#email").val();
	var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    if (!reg.test(Email)){
	$("input#email").addClass("invalid");
	valid='no';
	return false;
	}
	if($.trim(Email)=='')
	{
	$("input#email").addClass("invalid");
	valid='no';
	return false;
	}
	var phone=$("input#phone").val();
	var subject=$("input#subject").val();
	if($.trim(subject)=='')
	{
    $("input#subject").addClass("invalid");
	valid='no';
	return false;
	}
	var description=$("textarea#description").val();
	if($.trim(description)=='')
	{
	$("textarea#description").addClass("invalid");
	valid='no';
	return false;
	}
	if(valid==''){
	$("#contact_form_submit").html('<img src="images/ajax.gif">');
	$.get("contact_main.html",{
	Name:Name, Email:Email, phone:phone, subject:subject,description:description},
         function(data){ 
		 var response = data.split("||");
	if($.trim(response[1])=='0'){
                $("input").val('');
                 $("textarea").val('');
        $("#contact_form_submit").html('submit');
		}
		if($.trim(response[1])!='0'){
        $("#contact_form_submit").html('submit');
		}
     });
	}
}
</script>

			




		</div>
		<!-- eof #box_wrapper -->
	</div>
	<?php include('footer.php');?>
</body>
</html>