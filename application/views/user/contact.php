<!--=================================
Contact -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h2>Contact Us</h2>
        </div>
      </div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-5">
        <div class="contact-address bg-light p-4">
          <div class="d-flex mb-3">
            <div class="contact-address-icon">
              <i class="flaticon-map text-primary font-xlll"></i>
            </div>
            <div class="ms-3">
              <h6>Address</h6>
              <p><?=appSettings('address_en')?></p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="contact-address-icon">
              <i class="flaticon-email text-primary font-xlll"></i>
            </div>
            <div class="ms-3">
              <h6>Email</h6>
              <p><?=appSettings('email')?></p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="contact-address-icon">
              <i class="flaticon-call text-primary font-xlll"></i>
            </div>
            <div class="ms-3">
              <h6>Phone Number</h6>
              <p><?=appSettings('whatsapp')?></p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="contact-address-icon">
              <i class="flaticon-fax text-primary font-xlll"></i>
            </div>
            <div class="ms-3">
              <h6>Fax</h6>
              <p><?=appSettings('fax')?></p>
            </div>
          </div>
          <div class="social-icon-02">
            <div class="d-flex align-items-center">
              <h6 class="me-3">Social:</h6>
              <ul class="list-unstyled mb-0 list-inline">
                <li><a href="<?=appSettings('facebook')?>"> <i class="fab fa-facebook-f"></i> </a></li>
                <li><a href="<?=appSettings('twitter')?>"> <i class="fab fa-twitter"></i> </a></li>
                <li><a href="<?=appSettings('linkedin')?>"> <i class="fab fa-linkedin"></i> </a></li>
                <li><a href="<?=appSettings('pinterest')?>"> <i class="fab fa-pinterest"></i> </a></li>
                <li><a href="<?=appSettings('instagram')?>"> <i class="fab fa-instagram"></i> </a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7 mt-4 mt-lg-0">
        <div class="contact-form">
          <h4 class="mb-4">Need assistance? Please complete the contact form</h4>
          <form id="cform1">
            <div class="row">
              <div class="mb-3 col-md-6">
                <input type="text" class="form-control" name="name" id="nameid" placeholder="Your name">
              </div>
              <div class="mb-3 col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your email">
              </div>
              <div class="mb-3 col-md-6">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your phone">
              </div>
              <div class="mb-3 col-md-6">
                <input type="text" class="form-control"  name="title" id="title"  placeholder="Subject">
              </div>
              <div class="mb-3 col-md-12">
                <textarea class="form-control" rows="4" name="message" id="message" placeholder="Your message"></textarea>
              </div>
              <div class="mb-3 col-md-12">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label pe-5" for="flexCheckDefault">
                 I consent to having this website store my submitted information so they can respond to my inquiry.
                </label>
              </div>
              </div>
              <div class="col-md-12">
              <button type="button" class="btn btn-primary" id="contact_form" >Send message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row mt-1 mt-md-2">
      <div class="col-12 mb-4 mt-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1026.4504386861468!2d31.32865233672747!3d30.078316917921587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e3c49236317%3A0xa12585da079dcc75!2sQueen%20Tech%20Solutions!5e0!3m2!1sar!2seg!4v1637594291927!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>

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


		
