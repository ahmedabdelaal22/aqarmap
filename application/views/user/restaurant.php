<!--=================================
Listing – grid view -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="section-title mb-3 mb-lg-4">
          <h2><span class="text-primary">156</span> Results</h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="property-filter-tag">
          <ul class="list-unstyled">
            <li><a href="#">Apartment <i class="fas fa-times-circle"></i> </a></li>
            <li><a class="filter-clear" href="#">Reset Search <i class="fas fa-redo-alt"></i> </a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 mb-5 mb-lg-0">
        <div class="sidebar">
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Advanced filter</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#filter-property" role="button" aria-expanded="false" aria-controls="filter-property"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="filter-property">
              <form class="mt-3">
                <div class="mb-2 select-border">
                  <select class="form-control basic-select" name="cat_id">
                    <option>All Type</option>
                    <?php $category = $this->admin_model->get_category();
                   $category_id=$this->input->get('cat_id');
                   $type=$this->input->get('type');
                   $region_id=$this->input->get('region_id');
                   $rooms=$this->input->get('rooms');
                   $floor=$this->input->get('floor');

                   
                  ?>
                    <?php foreach ($category as $listing) : ?>
                    <option value="<?php echo $listing['id']; ?>" <?php if ($listing['id'] == $category_id) echo "selected='selected'"; ?>><?php echo $listing['c_name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="mb-2 select-border">
                  <select class="form-control basic-select"name="type" >
                  <?php foreach (types() as $key => $value) : ?>
                  <option value="<?php echo $key; ?>"   <?php if ($key == $type) echo "selected='selected'"; ?> ><?php echo $value ?></option>
											<?php endforeach; ?>
                  </select>
                </div>
                <div class="mb-2 select-border">
                  <select class="form-control basic-select"name="region_id" >
                    <option>location</option>
                    <?php 
				$regions = $this->admin_model->get_all_regions();
              foreach ($regions as $row) : ?> 
          <option value="<?php echo $row->id; ?>" <?php if ($row->id == $region_id) echo "selected='selected'"; ?>><?php echo $row->name_en; ?></option>
        <?php endforeach; ?>
                  </select>
                </div>
                <div class="mb-2 select-border">
                  <select class="form-control basic-select"name="rooms">
                    <option>Bedrooms</option>
                    <?php foreach (rooms() as $key => $value) : ?>
                  <option value="<?php echo $key; ?>"   <?php if ($key == $rooms) echo "selected='selected'"; ?> ><?php echo $value ?></option>
											<?php endforeach; ?>
                  </select>
                </div>
           
                <div class="mb-2 select-border">
                  <select class="form-control basic-select" name="floor">
                    <option>Select Floor</option>
                    <?php foreach (rooms() as $key => $value) : ?>
                  <option value="<?php echo $key; ?>"   <?php if ($key == $floor) echo "selected='selected'"; ?> ><?php echo $value ?></option>
											<?php endforeach; ?>
                  </select>
                </div>
                <div class="mb-2">
                  <input class="form-control" name="min_space" placeholder="Type (sq ft)">
                </div>
                <div class="mb-2">
                  <input class="form-control"name="max_space" placeholder="Type (sq ft)">
                </div>
                 <div class="mb-3 property-price-slider mt-3">
                  <label class="form-label">Select Price Range</label>
                  <input type="text" id="property-price-slider" name="price_range" value="" />
                </div>
                <div class="d-grid mb-2">
                  <button class="btn btn-primary align-items-center" type="submit"><i class="fas fa-filter me-1"></i><span>Filter</span></button>
                </div>
              </form>
            </div>
          </div>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Status of property</h6>
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
              <h6>Recently listed properties</h6>
            </div>
            <?php      $restaurants = $this->db->query("SELECT * FROM restaurants WHERE approved = '1'   ORDER BY res_id DESC LIMIT 0, 15")->result_array();?>

            <?php if (isset($restaurants)) {
                  $cnt = 1; ?>
                  <?php foreach ($restaurants as $listing) {
      

?>
 <?php $image = explode('::::', $listing['res_image'])[0]; ?>
            <div class="recent-list-item">
              <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" alt="">
              <div class="recent-list-item-info">
                <a class="address mb-2" href="<?php echo base_url('store/' . $listing['res_id']); ?>"><?=$listing['res_name']?></a>
                <span class="text-primary"><?=$listing['discount']?> </span>
              </div>
            </div>
            <?php }} ?>

          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="property-filter d-sm-flex">
          <ul class="property-short list-unstyled d-sm-flex mb-0">
            <li>
              <form class="form-inline">
                <div class="d-lg-flex d-block mb-sm-0 mb-3">
                  <label class="justify-content-start mb-2 mb-sm-0">Short by:</label>
                  <div class="short-by">
                    <select class="form-control basic-select">
                      <option>Date new to old</option>
                      <option>Price Low to High</option>
                      <option>Price High to Low</option>
                      <option>Date Old to New</option>
                      <option>Date New to Old</option>
                    </select>
                  </div>
                </div>
              </form>
            </li>
          </ul>
          <ul class="property-view-list list-unstyled d-flex mb-0">
            <li>
              <form class="form-inline">
                <div class="d-lg-flex d-block mb-3 mb-sm-0">

                </div>
              </form>
            </li>
          </ul>
        </div>
        <div class="row mt-4">
        <?php      $restaurants = $this->db->query("SELECT * FROM restaurants WHERE approved = '1'   ORDER BY res_ratings DESC LIMIT 0, 15")->result_array();?>

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
                  <span class="badge badge-md bg-primary">Bungalow</span>
                  <span class="badge badge-md bg-info">Sale </span>
                </div>
                <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
                <div class="property-agent">
                  <div class="property-agent-image">
   <?php   if(!empty($vendor->profile_image)){
                $profile_image = explode('::::',$vendor->profile_image)[0];
              ?>
                <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $profile_image; ?>" alt="">
                <?php } ?>
                  </div>
                  <div class="property-agent-info">
                    <a class="property-agent-name" href="#"><?=@$vendor->uname?></a>
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
                  <h5 class="property-title"><a href="<?php echo base_url('store/' . $listing['res_id']); ?>"><?=$listing['res_name']?></a></h5>
                  <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i><?= word_limiter($listing['res_desc'],4);?></span>
                  <span class="property-agent-date"><i class="far fa-clock fa-md"></i><?php
              echo date('d/M/Y', $listing['res_create_date']);
              ?></span>
                  <div class="property-price"><?=$listing['discount']?><span> EGP</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Rooms<span><?=$listing['rooms']?></span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span><?=$listing['baths']?></span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span><?=$listing['space']?>m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="<?php echo base_url('store/' . $listing['res_id']); ?>">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-favourites"><a data-bs-toggle="tooltip" data-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <?php }} ?>
        </div>
        <div class="row">
          <div class="col-12">
            <ul class="pagination mt-3">
              <li class="page-item disabled me-auto">
                <span class="page-link b-radius-none">Prev</span>
              </li>
              <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item ms-auto">
                <a class="page-link b-radius-none" href="#">Next</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Listing – grid view -->