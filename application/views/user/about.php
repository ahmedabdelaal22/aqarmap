<!--=================================
about -->
<div class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="<?=base_url('/')?>"> <i class="fas fa-home"></i> </a></li>
          <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="<?=base_url('/')?>"><?php echo $this->lang->line('home') ?></a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> <?php echo $this->lang->line('about_us') ?></span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<section class="space-ptb bg-holder">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-9">
        <div class="text-center">
          <h1 class="text-primary mb-4"><?php echo $this->lang->line('about_page_title') ?></h1>
          <p class="px-sm-5 mb-4 lead fw-normal"><?php echo $this->lang->line('about_page_subtitle') ?> </p>
          <div class="popup-video">
            <a class="popup-icon popup-youtube" href="https://www.youtube.com/watch?v=LgvseYYhqU0"> <i class="flaticon-play-button"></i> </a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="section-title text-center">
          <h2><?php echo $this->lang->line('about_module_head') ?></h2>
          <p><?php echo $this->lang->line('about_module_subhead') ?></p>
        </div>
      </div>
    </div>
    <div class="row g-0 mt-4">
      <div class="col-lg-3 col-sm-6">
        <div class="feature-info h-100">
          <div class="feature-info-icon">
            <i class="flaticon-like"></i>
          </div>
          <div class="feature-info-content">
            <h6 class="mb-3 feature-info-title"><?php echo $this->lang->line('about1_head') ?></h6>
            <p class="mb-0"><?php echo $this->lang->line('about1_subhead') ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="feature-info h-100">
          <div class="feature-info-icon">
            <i class="flaticon-agent"></i>
          </div>
          <div class="feature-info-content">
            <h6 class="mb-3 feature-info-title"><?php echo $this->lang->line('about2_head') ?></h6>
            <p class="mb-0"><?php echo $this->lang->line('about2_subhead') ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="feature-info h-100">
          <div class="feature-info-icon">
            <i class="flaticon-like-1"></i>
          </div>
          <div class="feature-info-content">
            <h6 class="mb-3 feature-info-title"><?php echo $this->lang->line('about3_head') ?></h6>
            <p class="mb-0"><?php echo $this->lang->line('about3_subhead') ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="feature-info h-100">
          <div class="feature-info-icon">
            <i class="flaticon-house-1"></i>
          </div>
          <div class="feature-info-content">
            <h6 class="mb-3 feature-info-title"><?php echo $this->lang->line('about4_head') ?></h6>
            <p class="mb-0"><?php echo $this->lang->line('about4_subhead') ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
about -->

<!--=================================
testimonial -->
<section class="testimonial-main bg-holder" style="background-image: url(<?=base_url('website')?>/images/bg/02.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="owl-carousel owl-dots-bottom-left" data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
          <div class="item">
            <div class="testimonial">
              <div class="testimonial-content">
                <p><i class="quotes">"</i>Thank you Martin for selling our apartment. We are delighted with the result. I can highly recommend Martin to anyone seeking a truly professional Realtor.</p>
              </div>
              <div class="testimonial-name">
                <h6 class="text-primary mb-1">Lisa & Graeme</h6>
                <span>Hamilton Rd. Willoughby</span>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial">
              <div class="testimonial-content">
                <p><i class="quotes">"</i>Oliver always had a smile and was so quick to answer and get the job done.  I'll definitely suggest you to anyone we know who is selling or wanting to purchase a home. He is the best!</p>
              </div>
              <div class="testimonial-name">
                <h6 class="text-primary mb-1">Jessica Alex</h6>
                <span>West Division Street</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
testimonial -->

<!--=================================
counter -->
<section class="space-pt">
  <div class="container">
    <div class="border p-4">
      <div class="row">
        <div class="col-sm-3">
          <div class="counter counter-02 mb-4 mb-sm-0">
            <div class="counter-icon">
              <span class="pt-1 icon fab flaticon-placeholder"></span>
            </div>
            <div class="counter-content">
              <?php 
        $count_location=      $this->db->get('locations')->num_rows();
              ?>
              <span class="timer mb-1" data-to="<?=$count_location?>" data-speed="10000"><?=$count_location?></span>
              <label class="mb-0"><?php echo $this->lang->line('locations') ?></label>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="counter counter-02 mb-4 mb-sm-0">
            <div class="counter-icon">
              <span class="pt-1 icon fab flaticon-for-rent-1"></span>
            </div>
            <div class="counter-content">
<?php 
  $this->db->where('type','2');
   $count_rent=$this->db->get('restaurants')->num_rows();

?>

              <span class="timer mb-1" data-to="<?=$count_rent?>" data-speed="10000"><?=$count_rent?></span>
              <label class="mb-0"><?php echo $this->lang->line('rentals') ?> </label>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="counter counter-02 mb-4 mb-sm-0">
            <div class="counter-icon">
              <span class="pt-1 icon fab flaticon-house-5"></span>
            </div>
            <?php 
  $this->db->where('type','1');
   $count_sell=$this->db->get('restaurants')->num_rows();

?>
            <div class="counter-content">
              <span class="timer mb-1" data-to="<?=$count_sell?>" data-speed="10000"><?=$count_sell?></span>
              <label class="mb-0"><?php echo $this->lang->line('sales') ?> </label>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="counter counter-02 mb-4 mb-sm-0">
            <div class="counter-icon">
              <span class="pt-1 icon fab flaticon-agent"></span>
            </div>
            <div class="counter-content">
            <?php     $count_vendore=$this->db->get('vendor')->num_rows();?>
              <span class="timer mb-1" data-to="<?=$count_vendore?>" data-speed="10000"><?=$count_vendore?></span>
              <label class="mb-0"><?php echo $this->lang->line('agents') ?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="space-pt"></section>
<!--=================================
counter -->

<!--<section class="page_title ls s-py-50 corner-title ls invise overflow-visible">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1>
				
              <?php echo $this->lang->line('about') ?>
							</h1>
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="<?=base_url('/')?>">
              
                  <?php echo $this->lang->line('home') ?>
                
                </a>
								</li>
								<li class="breadcrumb-item active">
							
                <?php echo $this->lang->line('about') ?>
								</li>
							</ol>
							<div class="divider-15 d-none d-xl-block"></div>
						</div>
					</div>
				</div>
</section>-->
<!--<section class="about_us">
	<div class="divider divider-60"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="main-content">
					<h2 class="page_title">عن موقعنا</h2>
					<div class="page_content">
					<?=appSettings('about_ar')?>

					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="main-content">
					<div class="about_image">
						<img class="img-responsive" src="<?=base_url('website')?>/images/about.png">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="divider divider-60"></div>
</section>-->