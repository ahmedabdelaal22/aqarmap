
<section class="page_title ls s-py-50 corner-title ls invise overflow-visible">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1>
				
              <?php echo $this->lang->line('prives') ?>
							</h1>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="<?=base_url('/')?>">
              
                  <?php echo $this->lang->line('home') ?>
                
                </a>
								</li>
								<li class="breadcrumb-item active">
							
                <?php echo $this->lang->line('prives') ?>
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
								<?php $locale=$this->session->userdata('locale');?>
								<?=appSettings('prives_'.$locale)?>
								
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
	
					</div>
				</div>
			</section>

			<section class="container mobile_apps">
				<div class="page_slider">
				<div class="shortcode-team-slider">
					<h3 class="slider-title">   <?php echo $this->lang->line('mobile_apps') ?></h3>
	
			
				</div>
				</div>
			</section>
			<section class="about-map ms page_map" data-draggable="false" data-scrollwheel="false">
	            	<?=appSettings('map')?>
			</section>