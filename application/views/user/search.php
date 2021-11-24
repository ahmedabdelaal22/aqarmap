<!--=================================
Listing – grid view -->

<div class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="<?=base_url('/')?>"> <i class="fas fa-home"></i> </a></li>
          <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="<?=base_url('/')?>">Home</a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Search</span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="section-title mb-3 mb-lg-4">
          <h2><span class="text-primary"><?=$total_rows?></span> <?php echo $this->lang->line('results') ?></h2>
        </div>
      </div>
      <div class="col-md-6">
        <!-- <div class="property-filter-tag">
          <ul class="list-unstyled">
            <li><a href="#">Apartment <i class="fas fa-times-circle"></i> </a></li>
            <li><a class="filter-clear" href="#">Reset Search <i class="fas fa-redo-alt"></i> </a></li>
          </ul>
        </div> -->
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 mb-5 mb-lg-0">
        <div class="sidebar">
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6><?php echo $this->lang->line('advanced_filter') ?></h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#filter-property" role="button" aria-expanded="false" aria-controls="filter-property"> <i class="fas fa-chevron-down"></i> </a>
            </div>

            <div class="collapse show" id="filter-property">
              <form class="mt-3">
                <div class="mb-2 select-border">
                  <select class="form-control basic-select" name="cat_id">
                    <option value=""><?php echo $this->lang->line('all_types') ?></option>
                    <?php $category = $this->admin_model->get_category();
                   $category_id=$this->input->get('cat_id');
                   $type=$this->input->get('type');
                   $region_id=$this->input->get('region_id');
                   $rooms=$this->input->get('rooms');
                   $floor=$this->input->get('floor');

                   $from_price=$this->input->get('from_price');
                   $to_price  =$this->input->get('to_price');
                   
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
                <div class="mb-2 select-border">
                  <select class="form-control basic-select"name="type" >
                  <option value=""><?php echo $this->lang->line('all') ?></option>
                  <?php foreach (types() as $key => $value) : ?>
                  <option value="<?php echo $key; ?>"   <?php if ($key == $type) echo "selected='selected'"; ?> ><?php echo $value ?></option>
											<?php endforeach; ?>
                  </select>
                </div>
                <div class="mb-2 select-border">
                  <select class="form-control basic-select"name="region_id" >
                    <option value=""><?php echo $this->lang->line('location') ?></option>
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
                <div class="mb-2 select-border">
                  <select class="form-control basic-select"name="rooms">
                    <option value=""><?php echo $this->lang->line('bedrooms') ?></option>
                    <?php foreach (rooms() as $key => $value) : ?>
                  <option value="<?php echo $key; ?>"   <?php if ($key == $rooms) echo "selected='selected'"; ?> ><?php echo $value ?></option>
											<?php endforeach; ?>
                  </select>
                </div>
           
                <input type="hidden" id="from_price" name="from" value="<?php echo ($from_price)?$from_price:min_price()?>"/>
                <input type="hidden"  id="to_price" name="to" value="<?php echo ($to_price)?$to_price:max_price()?>"/>

                <div class="mb-2 select-border">
                  <select class="form-control basic-select" name="floor">
                    <option value=""><?php echo $this->lang->line('select_floor') ?></option>
                    <?php foreach (rooms() as $key => $value) : ?>
                  <option value="<?php echo $key; ?>"   <?php if ($key == $floor) echo "selected='selected'"; ?> ><?php echo $value ?></option>
											<?php endforeach; ?>
                  </select>
                </div>
                <div class="mb-2">
                  <input class="form-control" name="min_space" value="<?=$this->input->get('min_space')?>" placeholder="<?php echo $this->lang->line('min_area') ?>">
                </div>
                <div class="mb-2">
                  <input class="form-control"name="max_space" value="<?=$this->input->get('max_space')?>" placeholder="<?php echo $this->lang->line('max_area') ?>">
                </div>
                 <div class="mb-3 property-price-slider mt-3">
                  <label class="form-label"><?php echo $this->lang->line('select_price_range') ?></label>
                  <input type="text" id="property-price-slider" name="price_range" value="" />
                </div>
                <div class="d-grid mb-2">
                  <input class="btn btn-primary align-items-center"  name='submit' value='<?php echo $this->lang->line('filter') ?>' type="submit">
                </div>
              </form>
            </div>
          </div>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6><?php echo $this->lang->line('property_status') ?> </h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#status-property" role="button" aria-expanded="false" aria-controls="status-property"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="status-property">
              <ul class="list-unstyled mb-0 pt-3">
              <?php foreach (types() as $key => $value) : ?>
                <li><a href="<?php echo $key; ?>"><?php echo $value ?><span class="ms-auto">(<?=count_types($key)?>)</span></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
    

          <div class="widget">
            <div class="widget-title">
              <h6><?php echo $this->lang->line('recently_listed_properties') ?></h6>
            </div>

            <?php      $left_restaurants = $this->db->query("SELECT * FROM restaurants WHERE approved = '1'   ORDER BY res_ratings DESC LIMIT 0, 5")->result_array();?>

            <?php if (isset($left_restaurants)) {
                  $cnt = 1; ?>
                  <?php foreach ($left_restaurants as $listing) {
      

?>
 <?php $image = explode('::::', $listing['res_image'])[0]; ?>
            <div class="recent-list-item">
              <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" alt="">
              <div class="recent-list-item-info">
                <a class="address mb-2" href="<?php echo base_url('store/' . $listing['res_id']); ?>">
                <?php if($this->session->userdata('site_lang') == 'english'){?>

<?=$listing['res_name']?>
<?php }else{?>
  <?=$listing['res_name_a']?>
<?php }?>
              
              </a>
                <span class="text-primary"><?=$listing['discount']?> </span>
              </div>
            </div>
            <?php }} ?>

          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="property-filter d-sm-flex">

        </div>
        <div class="row mt-4">

<?php if (isset($restaurants)) {
                  $cnt = 1; ?>
                  <?php foreach ($restaurants as $listing) {
            $user_id=     $listing['vid'];
       $vendor= $this->db->query("SELECT * FROM vendor WHERE id = $user_id ")->row()

?>
         <?php $image = explode('::::', $listing['res_image'])[0]; ?>
          <div class="col-sm-6">
            <div class="property-item">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" alt="">
                <div class="property-lable">
                <span class="badge badge-md bg-primary"><?=key_type($listing['type'])?> </span>
              <span class="badge badge-md bg-info"><?=payment_method_value($listing['payment_method'])?> </span>
                </div>
                <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
                <div class="property-agent">
                  <div class="property-agent-image">
                  <?php   if(!empty($vendor->profile_image)){
                    $profile_image = explode('::::',$vendor->profile_image)[0];
                      ?>
                <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $profile_image; ?>" alt="" onerror="this.onerror=null;this.src='<?=base_url('website')?>/images/default-avatar.jpg'">
                <?php }else{
                    ?>
                 <img class="img-fluid" src="<?=base_url('website')?>/images/default-avatar.jpg" alt="" >
                  <?php } ?>
                  </div>
                  <div class="property-agent-info">
                    <a class="property-agent-name" href="<?php echo base_url('agent/' .@$vendor->id); ?>"><?=@$vendor->uname?></a>
                    <span class="d-block"><?=@$vendor->email?></span>
                    <ul class="property-agent-contact list-unstyled">
                      <li><a href="tel:<?=@$vendor->phone?>"><i class="fas fa-mobile-alt"></i> </a></li>
                    </ul>
                  </div>
                </div>
                <?php $this->load->helper('text');?>
              </div>
              <div class="property-details">
                <div class="property-details-inner">
                  <h5 class="property-title"><a href="<?php echo base_url('store/' . $listing['res_id']); ?>">
                  
                  <?php if($this->session->userdata('site_lang') == 'english'){?>

                          <?=$listing['res_name']?>
                          <?php }else{?>
                          <?=$listing['res_name_a']?>
                            <?php }?>
              
                
                
                </a></h5>
                  <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>
                  <?php if($this->session->userdata('site_lang') == 'english'){?>
                            <?=$listing['res_address']?> 
                            <?php }else{?>
                            <?=$listing['res_address_a']?> 
                             <?php }?>
                
                
                </span>
                  <span class="property-agent-date"><i class="far fa-clock fa-md"></i><?php
                   echo date('d/M/Y', $listing['res_create_date']);
                        ?>
              </span>
                  <div class="property-price"><?=$listing['discount']?><span> </span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i><?php echo $this->lang->line('rooms_label') ?><span><?=$listing['rooms']?></span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i><?php echo $this->lang->line('bath_label') ?><span><?=$listing['baths']?></span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i><?php echo $this->lang->line('sqft_label') ?><span><?=$listing['space']?>m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="<?php echo base_url('store/' . $listing['res_id']); ?>"><?php echo $this->lang->line('see_details') ?></a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                  <li class="property-favourites">
                            <?php  
       $like=0;
       if(!empty($this->session->userdata('UserId'))){
        $like=  $this->front_model->likeCheckfront($this->session->userdata('UserId'), $listing['res_id']);

       }     
       
       
       ?>

                <!-- class="fas fa-heart " -->
                  <a data-bs-toggle="tooltip"  data-bs-placement="top" title="Favourite"href="javascript:sendRes(<?=$listing['res_id']?>);">
                    <i  id="<?=$listing['res_id']?>" class="far fa-heart  <?php if($like==1){echo 'text-danger';}?>"></i>
                  </a>
                  <input type="hidden" id="<?=$listing['res_id']?>like" value="<?=$like?>">
                          </li>                
                       </ul>
                </div>
              </div>
            </div>
          </div>
          <?php }} ?>
        </div>
        <div class="row">
          <div class="col-12">
            <!-- <ul class="pagination mt-3">
              <li class="page-item disabled me-auto">
                <span class="page-link b-radius-none">Prev</span>
              </li>
              <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item ms-auto">
                <a class="page-link b-radius-none" href="#">Next</a>
              </li>
            </ul> -->

            <?php echo $links; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Listing – grid view -->