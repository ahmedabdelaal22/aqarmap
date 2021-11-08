<!--<section class="page_title ls s-py-50 corner-title ls invise overflow-visible">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1>
				
              <?php echo $this->lang->line('contacts') ?>
							</h1>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="<?=base_url('/')?>">
              
                  <?php echo $this->lang->line('home') ?>
                
                </a>
								</li>
								<li class="breadcrumb-item active">
							
                <?php echo $this->lang->line('contact_us') ?>
								</li>
							</ol>
							<div class="divider-15 d-none d-xl-block"></div>
						</div>
					</div>
				</div>
</section>-->
			<section class="contact_background" style="background: url(<?=base_url('website')?>/images/contact-min.jpg);">
				<div class="container">
					<div class="row " >

						<div class="divider-80"></div>

						<div class="col-md-5 contact_form" >

							<div class="alert alert-danger" id="allererror" style="display:none">
					<a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<span id="errorspan2"></span>
				</div>
							<form class="contact-form c-mb-20 text-center" id="cform1">
								<div class="row form-header">
								<div class="col-sm-12">
					  	        	<h5 class="modal-title" id="exampleModalLabel">أضف مشروعك</h5>
					        		<span class="sub-title">يمكنك الان مشاركه مشروعك معنا</span>	
        						</div>
        						</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for="name">
											<?php echo $this->lang->line('full_name_label') ?>	
												<span class="required">*</span>
											</label>
											<input type="text" aria-required="true" size="30" value="" name="name" id="nameid" class="form-control" placeholder="<?php echo $this->lang->line('full_name') ?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label for="email">
											<?php echo $this->lang->line('email_address_label') ?>
												<span class="required">*</span>
											</label>
											<input type="text" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="<?php echo $this->lang->line('email_address') ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group ">
											<label for="message">
											<?php echo $this->lang->line('message_label') ?>
											</label>
											<textarea aria-required="true" rows="6" cols="45" name="message" id="message" class="form-control" placeholder="<?php echo $this->lang->line('message') ?>"></textarea>
										</div>
									</div>

								</div>
								<div class="row c-mt-md-15 c-md-0">
									<div class="col-sm-12">
										<div class="form-group text-center contact-form1">
											<button type="button" id="contact_form" name="contact_submit" class="btn btn-maincolor">
										
											<?php echo $this->lang->line('submit') ?>
									</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-6 contact_content" >
							<div class="contact_content">
								<div class="contact_icon">
									<img class="img-responsive" src="<?=base_url('website')?>/images/logo/logo_v.png">
								</div>
								<div class="contact_content_text">
									<div class="content">
									<?=appSettings('contact')?>
									</div>
									<div class="divider-40"></div>
									<div class="social_info">
        <h6 class="Real Estates_title">او تواصل عن طريق</h6>
        <div class="social_icons">
          <a class="whatsapp" target="_blank" href="tel:<?=appSettings('whatsapp')?>"><span class="fa fa-whatsapp"></span></a>
          <a class="instagram" target="_blank" href="<?=appSettings('instegram')?>"><span class="fa fa-instagram"></span></a>
          <a class="facebook" target="_blank" href="<?=appSettings('facebook')?>"><span class="fa fa-facebook"></span></a>
        </div>
									</div>
								</div>
							</div>
							<div class="contact_map">
							<?=appSettings('map')?>
						</div>
						</div>
						<!--.col-* -->

						<div class="divider-120"></div>

					</div>
				</div>
			</section>

		
			<script type="text/javascript">


$(document).ready(function() {
	$("#contact_form").click(function(e){

		e.preventDefault();
	  

	
		var name = $("#nameid").val();
	
		var message = $("textarea[name='message']").val();
		var email = $("input[name='email']").val();
		var title = $("input[name='title']").val();
		var phone = $("input[name='phone']").val();


		$.ajax({
			url: "<?=base_url('contact_submit')?>",
			type:'POST',
			data: { name:name, message:message, email:email, title:title
				, phone:phone
			},
			success: function(data) {
				// console.log(data);
				// console.log(data.status);
				if(data.status == true){
					alert(data.message);
					$("#cform1")[0].reset();
					$("span").remove(".invalid");
					$('input[name=name]').removeClass('invalid');
					$('input[name=phone]').removeClass('invalid');
					$('input[name=title]').removeClass('invalid');
					$('input[name=email]').removeClass('invalid');
					$('textarea[name=message]').removeClass('invalid');

				}else{
					console.log(data.message[0]);
				//	$("#allererror").show();
					//	$("#errorspan2").html(data.message);
					printErrorMsg(data.message);
				}
			}
		});


	}); 


	function printErrorMsg (msg) {
	               	$("span").remove(".invalid");
					$('input[name=name]').removeClass('invalid');
					$('input[name=phone]').removeClass('invalid');
					$('input[name=title]').removeClass('invalid');
					$('input[name=email]').removeClass('invalid');
					$('input[name=message]').removeClass('invalid');
		$.each(msg,function( key, value ) {
			if(key == 'message'){
				$('textarea[name='+key+']').addClass('invalid');
			}else{
				$('input[name='+key+']').addClass('invalid');

			}
			$(document).find('[name='+key+']').after('<span class="text-strong invalid">' +value+ '</span>')

		});
	}
   });


</script>