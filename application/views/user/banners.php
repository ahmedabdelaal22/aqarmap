
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
        <h1 class="text-white text-center mb-2"><?php echo $this->lang->line('banners_head') ?></h1>
        <p class="lead text-center text-white mb-4 fw-normal"><?php echo $this->lang->line('banners_subhead') ?></p>
        <div class="property-search-field bg-white">
          <div class="property-search-item">
            <form class="row basic-select-wrapper" method="GET" name="searchaction" action="<?=base_url('/search')?>">
              <div class="form-group col-lg-3 col-md-6" >
                <label class="form-label"><?php echo $this->lang->line('property_type') ?></label>
                <select class="form-control basic-select"  name="cat_id">
                  <option value=""><?php echo $this->lang->line('all_types') ?></option>
                  <?php $category = $this->admin_model->get_category();
                   $category_id=$this->input->get('cat_id');
                   $type=$this->input->get('type');
                   $region_id=$this->input->get('region_id');
                   $rooms=$this->input->get('rooms');
                   $floor=$this->input->get('floor');
                   $from_price=$this->input->get('from_price');
                   $to_price=$this->input->get('to_price');
                   
                  ?>
                  <?php foreach ($category as $listing) : ?>
                    <option value="<?php echo $listing['id']; ?>" <?php if ($listing['id'] == $category_id) echo "selected='selected'"; ?>>
                   
                    <?php if($this->session->userdata('site_lang') == 'english'){?>
                      <?php echo $listing['c_name']; ?>       
                  <?php }else{?>
                    <?php echo $listing['c_name_a']; ?>      
                  <?php }?>
                  </option>
                    <?php endforeach; ?>
  
                </select>
              </div>
              <div class="form-group col-lg-3 col-md-6">
                <label class="form-label"><?php echo $this->lang->line('status') ?></label>
                <select class="form-control basic-select"  name="type" >

                <?php foreach (types() as $key => $value) : ?>
                  <option value="<?php echo $key; ?>"   <?php if ($key == $type) echo "selected='selected'"; ?> ><?php echo $value ?></option>
											<?php endforeach; ?>
            
                </select>
              </div>
              <div class="form-group d-flex col-lg-4">
                <div class="form-group-search">
                  <label class="form-label"><?php echo $this->lang->line('location') ?></label>
                  <select class="form-control basic-select"  name="region_id" >
                  <option value=""><?php echo $this->lang->line('all_locations') ?></option>
                  <?php 
				$regions = $this->admin_model->get_all_regions();
              foreach ($regions as $row) : ?> 
          <option value="<?php echo $row->id; ?>" <?php if ($row->id == $region_id) echo "selected='selected'"; ?>>
          
                  <?php if($this->session->userdata('site_lang') == 'english'){?>
                   <?php echo $row->name_en; ?>        
                  <?php }else{?>
                    <?php echo $row->name_ar; ?>        
                  <?php }?>
        
        </option>
        <?php endforeach; ?>

                 </select>
                </div>
                <span class="align-items-center ms-3 d-none d-lg-block"><button class="btn btn-primary d-flex align-items-center" type="submit"><i class="fas fa-search me-1"></i><span><?php echo $this->lang->line('search') ?></span></button></span>
              </div>
              <div class="form-group text-center col-lg-2">
                <div class="d-flex justify-content-center d-md-inline-block">
                  <a class="more-search p-0" data-bs-toggle="collapse" href="#advanced-search" role="button" aria-expanded="false" aria-controls="advanced-search"> <span class="d-block pe-2 mb-1"><?php echo $this->lang->line('advanced_search') ?></span>
                  <i class="fas fa-angle-double-down"></i></a>
                </div>
              </div>
              <div class="collapse advanced-search p-0" id="advanced-search">
                <div class="card card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label class="form-label"><?php echo $this->lang->line('bedrooms') ?></label>
                      <select class="form-control basic-select" name="rooms">
                   
                <?php foreach (rooms() as $key => $value) : ?>
                  <option value="<?php echo $key; ?>"   <?php if ($key == $rooms) echo "selected='selected'"; ?> ><?php echo $value ?></option>
											<?php endforeach; ?>
                      </select>
                    </div>
               
                    <div class="form-group col-md-3">
                      <label class="form-label"><?php echo $this->lang->line('floor') ?></label>
                      <select class="form-control basic-select" name="floor">
                        <option value=""><?php echo $this->lang->line('select_floor') ?></option>
                        <?php foreach (rooms() as $key => $value) : ?>
                  <option value="<?php echo $key; ?>"   <?php if ($key == $floor) echo "selected='selected'"; ?> ><?php echo $value ?></option>
											<?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label class="form-label"><?php echo $this->lang->line('min_area') ?></label>
                      <input class="form-control" name="min_space" value="<?=$this->input->get('min_space')?>" placeholder="<?=$this->input->get('min_space')?>">
                    </div>
                    <div class="form-group col-md-3">
                      <label class="form-label"><?php echo $this->lang->line('max_area') ?></label>
                      <input class="form-control"name="max_space" value="<?=$this->input->get('max_space')?>" placeholder="<?=$this->input->get('max_space')?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 property-price-slider ">
               <input type="hidden" id="from_price" name="from" value="<?php echo ($from_price)?$from_price:min_price()?>"/>
              <input type="hidden"  id="to_price" name="to" value="<?php echo ($to_price)?$to_price:max_price()?>"/>
                      <label class="form-label"><?php echo $this->lang->line('select_price_range') ?></label>
                      <input type="text" id="property-price-slider" name="price_range" value="" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-lg-none btn-mobile p-3 d-grid">
                <button class="btn btn-primary align-items-center"  name='submit' value='Submit'type="submit"><i class="fas fa-search me-1"></i><span><?php echo $this->lang->line('search') ?></span></button>
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
                                <span class="predisc wc">??????</span>
                                <span class="disc bc"><?=$row->dicount?></span>
                                <span class="percentage wc">%</span>
                            </div>
                            <div class="discount_category"></div>
                            
                        </div>
                        <div class="slide_button">

                            <a class="btn btn-light" href="<?php echo base_url('Real Estates/').$row->restaurant_id?>">????????????</a>

                           
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


