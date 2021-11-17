<!--=================================
about -->
<section class="space-ptb bg-holder">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-9">
        <div class="text-center">
          <h1 class="text-primary mb-4">We are changing the Real estate industry with progression and passion.</h1>
          <p class="px-sm-5 mb-4 lead fw-normal">We attempt to be the leading self-governing estate agency in the locations we cover, offering an entirely personal and dedicated service. </p>
          <div class="popup-video">
            <a class="popup-icon popup-youtube" href="https://www.youtube.com/watch?v=LgvseYYhqU0"> <i class="flaticon-play-button"></i> </a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="section-title text-center">
          <h2>Plenty of reasons to choose us</h2>
          <p>Our agency has many specialized areas, but our CUSTOMERS are our real specialty.</p>
        </div>
      </div>
    </div>
    <div class="row g-0">
      <div class="col-lg-3 col-sm-6">
        <div class="feature-info h-100">
          <div class="feature-info-icon">
            <i class="flaticon-like"></i>
          </div>
          <div class="feature-info-content">
            <h6 class="mb-3 feature-info-title">Excellent reputation</h6>
            <p class="mb-0">Our comprehensive database of listings and market info give the most accurate view of the market and your home value.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="feature-info h-100">
          <div class="feature-info-icon">
            <i class="flaticon-agent"></i>
          </div>
          <div class="feature-info-content">
            <h6 class="mb-3 feature-info-title">Best local agents</h6>
            <p class="mb-0">You are just minutes from joining with the best agents who are fired up about helping you Buy or sell.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="feature-info h-100">
          <div class="feature-info-icon">
            <i class="flaticon-like-1"></i>
          </div>
          <div class="feature-info-content">
            <h6 class="mb-3 feature-info-title">Peace of mind</h6>
            <p class="mb-0">Rest guaranteed that your agent and their expert team are handling every detail of your transaction from start to end.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="feature-info h-100">
          <div class="feature-info-icon">
            <i class="flaticon-house-1"></i>
          </div>
          <div class="feature-info-content">
            <h6 class="mb-3 feature-info-title">Tons of options</h6>
            <p class="mb-0">Discover a place you’ll love to live in. Choose from our vast inventory and choose your desired house.</p>
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
              <label class="mb-0">Property locations</label>
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
              <label class="mb-0">Property rent </label>
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
              <label class="mb-0">Property sell </label>
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
              <label class="mb-0">Property agent</label>
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