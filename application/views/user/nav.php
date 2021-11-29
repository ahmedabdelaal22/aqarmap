	<?php 
				$regions = $this->admin_model->get_all_regions();
			 ?>
<!--=================================
header -->
<header class="header">
  <div class="topbar">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="d-block d-md-flex align-items-center text-center">
            <div class="me-3 d-inline-block">
              <a href="tel:<?=appSettings('Whatsapp')?>"><i class="fa fa-phone me-2 fa fa-flip-horizontal"></i><?=appSettings('Whatsapp')?> </a>
            </div>
            <div class="me-auto d-inline-block">
              <span class="me-2 text-white"><?php echo $this->lang->line('get_app') ?></span>
              <a class="pe-1" href="<?=appSettings('googleplay')?>"><i class="fab fa-android"></i></a>
              <a href="<?=appSettings('appstore')?>"><i class="fab fa-apple"></i></a>
            </div>
            <div class="dropdown d-inline-block ps-2 ps-md-0">
              <a class="dropdown-toggle" href="#" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $this->lang->line('choose_location') ?><i class="fas fa-chevron-down ps-2"></i>
              </a>
              <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
	    	    <?php  foreach ($regions as $row) {?>

					<?php if($this->session->userdata('site_lang') == 'english'){?>
	                    
						  <a class="dropdown-item" href="<?php echo base_url('search?region_id=').$row->id?>"><?php echo $row->name_en; ?></a>

					<?php }else{?>
						<a class="dropdown-item" href="<?php echo base_url('search?region_id=').$row->id?>"><?php echo $row->name_ar; ?></a>

					<?php }?>
                 <?php } ?>
              </div>
            </div>

            <div class="social d-inline-block">
              <ul class="list-unstyled">
                <li><a href="<?=appSettings('facebook')?>"> <i class="fab fa-facebook-f"></i> </a></li>
                <li><a href="<?=appSettings('twitter')?>"> <i class="fab fa-twitter"></i> </a></li>
                <li><a href="<?=appSettings('linkedin')?>"> <i class="fab fa-linkedin"></i> </a></li>
                <li><a href="<?=appSettings('pinterest')?>"> <i class="fab fa-pinterest"></i> </a></li>
                <li><a href="<?=appSettings('instagram')?>"> <i class="fab fa-instagram"></i> </a></li>
              </ul>
            </div>
            <div class="login d-inline-block">
			<?php 
		$userid=	$this->session->userdata('UserId');
		         if(!empty($userid)){
			?>
			<!-- data-bs-toggle="modal" data-bs-target="#loginModal" -->
              <a  href="<?=base_url('/profile')?>"><?=$this->session->userdata('user_name')?><i class="fa fa-user ps-2"></i></a>
			  <a href="<?=base_url('logout')?>"><?php echo $this->lang->line('logout') ?></a>
			  <?php } else{?>
				<a  href="<?=base_url('/login')?>"><?php echo $this->lang->line('hello_sign') ?> <i class="fa fa-user ps-2"></i></a>

				<?php } ?>
            </div>

<!-- Language Select -->
            <div class="dropdown d-inline-block ps-2 ps-md-0 language_select">
              <a class="dropdown-toggle" href="#" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <?php if($this->session->userdata('site_lang') == 'english' || $this->session->userdata('site_lang') == ''){?>
                <img src="<?=base_url('website')?>/images/flags/en.png"> ENG <i class="fas fa-chevron-down ps-2"></i>
				<?php }else{?>
					<img src="<?=base_url('website')?>/images/flags/ar.png"> AR <i class="fas fa-chevron-down ps-2"></i>

					<?php }?>
              </a>
              <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">

                <a class="dropdown-item" href="<?=base_url('lang/en')?>"><img src=""><img src="<?=base_url('website')?>/images/flags/en.png"> ENG</a>
                <a class="dropdown-item" href="<?=base_url('lang/ar')?>"><img src=""><img src="<?=base_url('website')?>/images/flags/ar.png"> AR</a>

              </div>
            </div>
<!-- Language Select -->


          </div>
        </div>
      </div>
    </div>
  </div>
    <nav class="navbar navbar-light bg-white navbar-static-top navbar-expand-lg header-sticky">
        <div class="container-fluid">
          <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
		<a href="<?=base_url('/')?>" class="navbar-brand">
			<img class="img-fluid" src="<?=base_url('website')?>/images/logo/logofinal.png" alt="logo">
		</a>
		<?php $locale=$this->session->userdata('locale');?>
          <div class="navbar-collapse collapse justify-content-center">
	<ul class="nav navbar-nav">
		<li class="nav-item <?php if($this->uri->segment(1)==""){echo "active";} ?>" >
			<a class="nav-link" href="<?=base_url('/')?>"><?php echo $this->lang->line('home') ?></a>
		</li>


		<li class="nav-item dropdown <?php if($this->uri->segment(1)=="categories-all"){echo "active";}?>">
			<a class="nav-link dropdown-toggle"
				href="<?=base_url('categories-all')?>" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('categories') ?> <i class="fas fa-chevron-down fa-xs"></i></a>
          <ul class="dropdown-menu">
		  <?php

                   $category = $this->admin_model->get_all_category();
	  ?>
		  <?php if(isset($category)){ $cnt=1; ?>
		  <?php foreach($category as $row) { ?>
            <li><a class="dropdown-item" href="<?php echo base_url('search?cat_id=').$row->id?>">
		
			<?php if($this->session->userdata('site_lang') == 'english'){?>
	                      <h6 class="mb-0"><?=$row->c_name?></h6>
					<?php }else{?>
						<h6 class="mb-0"><?=$row->c_name_a?></h6>
					<?php }?>
		
		</a></li>
               <?php }} ?>    
      </ul>
		</li>
		<li class="nav-item <?php if($this->uri->segment(1)=="agents"){echo "active";}?>">
			<a class="nav-link" href="<?=base_url('/agents')?>"><?php echo $this->lang->line('agents') ?></a>
		</li>
		<li class="nav-item <?php if($this->uri->segment(1)=="about"){echo "active";}?>">
			<a class="nav-link" href="<?=base_url('/about')?>"><?php echo $this->lang->line('about_us') ?></a>
		</li>
		<li class="nav-item <?php if($this->uri->segment(1)=="contact"){echo "active";}?>">
			<a class="nav-link" href="<?=base_url('/contact')?>"><?php echo $this->lang->line('contact_us') ?></a>
		</li>

	</ul> 
    </div>
	<?php if($this->session->userdata('UserId')){?>
    <div class="add-listing d-none d-sm-block">
      <a class="btn btn-primary btn-md" href="<?=base_url('add-listing')?>"> <i class="fa fa-plus-circle"></i><?php echo $this->lang->line('add_listing') ?> </a>
    </div>
	<?php }else{?>
		<div class="add-listing d-none d-sm-block">
      <button class="btn btn-primary btn-md" id="addreview"> <i class="fa fa-plus-circle"></i><?php echo $this->lang->line('add_listing') ?> </button>
    </div>
		<?php }?>
    </div>
  </nav>
</header>

<?php 
// breadcrumbs
if($this->uri->segment(1)==""){ ?>

<?php }else{ ?>
<!--=================================
breadcrumb -->

<!--=================================
breadcrumb -->
<?php } ?>




<script>
	document.onkeydown = function (evt) {
		var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
		if (keyCode == 13) {
			//your function call here
			document.searchaction.submit();
		}
	}
	$(document).ready(function () {
		$('#region_id').on('change', function () {
			
			document.searchaction.submit();
		});
	});
</script>


<script type="text/javascript">
	$(document).ready(function () {
		$("#contact_form_submit").click(function (e) {

			e.preventDefault();



			var name = $("input[name='name']").val();
			var description = $("textarea[name='description']").val();
			var category_id = $("#category_id option:selected").val();
			var brand = $("input[name='brand']").val();
			var phone = $("input[name='phone']").val();


			$.ajax({
				url: "<?=base_url('subscribe_submit')?>",
				type: 'POST',
				data: {
					name: name,
					description: description,
					category_id: category_id,
					brand: brand,
					phone: phone
				},
				success: function (data) {
					console.log(data);


					// console.log(data.status);
					if (data.status == true) {
						$('#exampleModal').modal('toggle');
						alert(data.message);
						$("#cform")[0].reset();
						$("span").remove(".invalid");
						$('input[name=name]').removeClass('invalid');
						$('input[name=phone]').removeClass('invalid');
						$('input[name=description]').removeClass('invalid');
						$('input[name=address]').removeClass('invalid');
						$('#category_id').removeClass('invalid');

					} else {
						// $("#allererror").show();
						//	$("#errorspan").html(data.message);
						printErrorMsg(data.message);
					}
				}
			});


		});


		function printErrorMsg(msg) {
			$("span").remove(".invalid");
			$('input[name=name]').removeClass('invalid');
			$('input[name=phone]').removeClass('invalid');
			$('input[name=description]').removeClass('invalid');
			$('#category_id option:selected').removeClass('invalid');
			$('input[name=address]').removeClass('invalid');
			$.each(msg, function (key, value) {

				if (key == 'category_id') {
					$('#category_id').addClass('invalid');
				} else {
					$('input[name=' + key + ']').addClass('invalid');

				}
				$(document).find('[name=' + key + ']').after('<span class="text-strong invalid">' + value +
					'</span>')

			});
		}
	});
</script>

            <!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form class="row mt-4 align-items-center">
            <div class="mb-3 col-sm-12">
              <label class="form-label">Email Address:</label>
              <input type="email" class="form-control" placeholder="">
            </div>
            <div class="mb-3 col-sm-12">
              <label class="form-label">Password:</label>
              <input type="Password" class="form-control" placeholder="">
            </div>
            <div class="col-sm-6 d-grid">
              <button type="submit" class="btn btn-primary">Sign In</button>
            </div>
            <div class="col-sm-6">
              <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                <li class="me-1"><a href="<?=base_url('/register')?>">Don't have an account yet? Register Now</a></li>
              </ul>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>