<?php 
if(isset($_POST['submit'])){

    $to = "ahmedramadan.net@gmail.com"; // this is your Email address

    $from = $_POST['email']; // this is the sender's Email address

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    

    // mail($to,$subject,$message);
	if (mail($to, $subject, $message)) {
	   echo("
	      Message successfully sent!
	   ");
	} else {
	   echo("
	      Message delivery failed...
	   ");
	}

    // echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>
<section class="s-pb-130 s-pb-lg-170">
<div class="divider-70 d-none d-lg-block"></div>
				<div class="container">
					<form class="contact-form c-mb-20 c-gutter-20" action="sub_form.php">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group has-placeholder">
									<label for="name">Full Name
										<span class="required">*</span>
									</label>
									<input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Full Name">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group has-placeholder">
									<label for="email">Email address
										<span class="required">*</span>
									</label>
									<input type="email" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="Email Address">
								</div>
							</div>
						</div>
						<div class="row">

							<div class="col-sm-6">
								<div class="form-group has-placeholder">
									<label for="phone">Phone Number
										<span class="required">*</span>
									</label>
									<input type="text" aria-required="true" size="30" value="" name="phone" id="phone" class="form-control" placeholder="Phone Number">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group has-placeholder">
									<label for="subject">Your Topic
										<span class="required">*</span>
									</label>
									<input type="text" aria-required="true" size="30" value="" name="subject" id="subject" class="form-control" placeholder="Your Topic">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group has-placeholder">
									<label for="message">Your Message</label>
									<textarea aria-required="true" rows="6" cols="45" name="message" id="description" class="form-control" placeholder="Your Message"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 text-center mt-15">
								<div class="form-group">
									<button type="submit" id="contact_form_submit" name="contact_submit" class="btn btn-maincolor">submit
									</button>
								</div>
							</div>

						</div>
					</form>
				</div>
				<div class="d-none d-lg-block divider-75"></div>
			</section>
<script>
	
</script>