
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
							<h1>Contacts</h1>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index/">Home</a>
								</li>
								<li class="breadcrumb-item active">
									Contact Us
								</li>
							</ol>
							<div class="divider-15 d-none d-xl-block"></div>
						</div>
					</div>
				</div>
			</section>


			<section id="map" class="ls ms page_map contact1" data-draggable="false" data-scrollwheel="false">
<iframe src="https://www.google.com/maps/embed/v1/place?q=Bengal Eco Intelligent Park, EM Block, Sector V, Saltlake, Kolkata 700091&zoom=17&key=AIzaSyCXV9O0hBrMwfc-lcGlRyA5GQWZG7Wouig" width=100% height="500" style='border:0; margin-top:20px;'></iframe>
			</section>

			<section class="ls s-pt-30 s-pb-130 s-pt-md-75">
				<div class="container">
					<div class="row">

						<div class="divider-40 d-none d-xl-block"></div>

						<div class="col-lg-8 offset-lg-2 animate" data-animation="scaleAppear">

							<h4 class="text-center">
								Contact Form
							</h4>
							<div class="divider-40 d-none d-xl-block"></div>
							<form class="contact-form c-mb-20 text-center">

								<div class="row">
									<div class="col-sm-12">
										<div class="form-group has-placeholder">
											<label for="name">Full Name
												<span class="required">*</span>
											</label>
											<input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Full Name">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group has-placeholder">
											<label for="phone">Phone
												<span class="required">*</span>
											</label>
											<input type="text" aria-required="true" size="30" value="" name="phone" id="phone" class="form-control" placeholder="Phone Number">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-12">
										<div class="form-group has-placeholder">
											<label for="email">Email address
												<span class="required">*</span>
											</label>
											<input type="text" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="Email Address">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group has-placeholder">
											<label for="email">Subject
												<span class="required">*</span>
											</label>
											<input type="text" aria-required="true" size="30" value="" name="subject" id="subject" class="form-control" placeholder="Subject">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group has-placeholder">
											<label for="message">Message</label>
											<textarea aria-required="true" rows="6" cols="45" name="message" id="message" class="form-control" placeholder="Your Message"></textarea>
										</div>
									</div>

								</div>
								<div class="row c-mt-md-15 c-md-0">
									<div class="col-sm-12">
										<div class="form-group text-center contact-form1">
											<button type="button" onClick="contact_main()" id="contact_form_submit" name="contact_submit" class="btn btn-maincolor">submit
									</button>
										</div>
									</div>
								</div>
							</form>
						</div>
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
						<!--.col-* -->

						<div class="divider-75 d-none d-xl-block"></div>

					</div>
				</div>
			</section>

	<?php include('footer.php');?>

		</div>
		<!-- eof #box_wrapper -->
	</div>
	
</body>
</html>