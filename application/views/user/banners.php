
<?php
// $id = $this->uri->segment(3);
// $id = $this->session->userdata('aid');
$offers = $this->admin_model->get_all_offers();
?>

<!--=================================
banner -->
<section class="banner bg-holder bg-overlay-black-30" style="background-image: url(<?=base_url('website')?>/images/banner-01.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-12 position-relative">
        <h1 class="text-white text-center mb-2">Create lasting wealth through Real Villa</h1>
        <p class="lead text-center text-white mb-4 fw-normal">Take a step to realizing your dream. #TimeToMove</p>
        <div class="property-search-field bg-white">
          <div class="property-search-item">
            <form class="row basic-select-wrapper">
              <div class="form-group col-lg-3 col-md-6">
                <label class="form-label">Property type</label>
                <select class="form-control basic-select">
                  <option>All Type</option>
                  <option>Villa</option>
                  <option>Apartment Building</option>
                  <option>Commercial</option>
                  <option>Office</option>
                  <option>Residential</option>
                  <option>Shop</option>
                  <option>Apartment</option>
                </select>
              </div>
              <div class="form-group col-lg-3 col-md-6">
                <label class="form-label">Status</label>
                <select class="form-control basic-select">
                  <option>For Rent</option>
                  <option>For Sale</option>
                </select>
              </div>
              <div class="form-group d-flex col-lg-4">
                <div class="form-group-search">
                  <label class="form-label">Location</label>
                  <div class="d-flex align-items-center"><i class="far fa-compass me-1"></i><input class="form-control" type="search" placeholder="Search Location"></div>
                </div>
                <span class="align-items-center ms-3 d-none d-lg-block"><button class="btn btn-primary d-flex align-items-center" type="submit"><i class="fas fa-search me-1"></i><span>Search</span></button></span>
              </div>
              <div class="form-group text-center col-lg-2">
                <div class="d-flex justify-content-center d-md-inline-block">
                  <a class="more-search p-0" data-bs-toggle="collapse" href="#advanced-search" role="button" aria-expanded="false" aria-controls="advanced-search"> <span class="d-block pe-2 mb-1">Advanced search</span>
                  <i class="fas fa-angle-double-down"></i></a>
                </div>
              </div>
              <div class="collapse advanced-search p-0" id="advanced-search">
                <div class="card card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label class="form-label">Distance from location</label>
                      <select class="form-control basic-select">
                        <option>This area only</option>
                        <option>Within 1 mile</option>
                        <option>Within 3 miles</option>
                        <option>Within 5 miles</option>
                        <option>Within 10 miles</option>
                        <option>Within 15 miles</option>
                        <option>Within 30 miles</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label class="form-label">Bedrooms</label>
                      <select class="form-control basic-select">
                        <option>No max</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label class="form-label">Sort by</label>
                      <select class="form-control basic-select">
                        <option>Most popular</option>
                        <option>Highest price</option>
                        <option>Lowest price</option>
                        <option>Most reduced</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label class="form-label">Floor</label>
                      <select class="form-control basic-select">
                        <option>Select Floor</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label class="form-label">Min Area (sq ft)</label>
                      <input class="form-control" placeholder="Type (sq ft)">
                    </div>
                    <div class="form-group col-md-3">
                      <label class="form-label">Max Area (sq ft)</label>
                      <input class="form-control" placeholder="Type (sq ft)">
                    </div>
                    <div class="form-group col-md-6 property-price-slider ">
                      <label class="form-label">Select Price Range</label>
                      <input type="text" id="property-price-slider" name="example_name" value="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-lg-none btn-mobile p-3 d-grid">
                <button class="btn btn-primary align-items-center" type="submit"><i class="fas fa-search me-1"></i><span>Search</span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
banner -->

<!--<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 itro_slider">
                    <div class="flexslider" data-nav="true" data-dots="false">
        <ul class="slides">
        <?php if(isset($offers)){ $cnt=1; ?>  
      <?php foreach($offers as $row) { 
  
        ?>
            <li class="ds text-center slide<?=$cnt?>">
                <img src="<?php echo base_url('uploads/').$row->image?>" alt="">
                    <div class="slide_content">
                        <div class="layer_name">
                            <span class="bc"><?php echo $row->res_name; ?></span>
                        </div>
                        <div class="discount">
                            <div class="discount_rate">
                                <span class="predisc wc">خصم</span>
                                <span class="disc bc"><?=$row->dicount?></span>
                                <span class="percentage wc">%</span>
                            </div>
                            <div class="discount_category"></div>
                            
                        </div>
                        <div class="slide_button">

                            <a class="btn btn-light" href="<?php echo base_url('Real Estates/').$row->restaurant_id?>">المزيد</a>

                           
                        </div>
                    
                    </div>
                
            </li>
          <?php $cnt++; }}?>

        </ul>
    </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 banners">
            <?php
// $id = $this->uri->segment(3);
// $id = $this->session->userdata('aid');
$banners = $this->admin_model->get_all_bannerlimit();
?>
   <?php if(isset($banners)){ $cnt=1; ?>  
      <?php foreach($banners as $row) { ?>
                <div class="banner banner<?=$cnt?>">
                    <img src="<?php echo base_url('uploads/').$row->image?>">
                    <div class="slide_content">
                    <div class="layer_name">
                    <span>Tie Shop</span> 
                    </div>
                        <div class="discount">
                            <div class="discount_rate">
                            <?php echo $row->banners_name?>
                        
                            </div>
                            <div class="discount_category"></div>
                            
                        </div>
                    <div>
                        
                    </div>
                
                    </div>
                </div>
                <?php $cnt++; }}?>
       
            </div>
        </div>
    </div>
</section>

  <section class="page_slider main_slider">
    <div class="flexslider-bottom d-none d-xl-block">
        <a href="#" class="mouse-button animated floating"></a>
    </div>
</section>-->

