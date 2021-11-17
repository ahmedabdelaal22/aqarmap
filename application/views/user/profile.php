<!--=================================
My profile -->

<?php 	$userid=	$this->session->userdata('UserId');
    $vendor= $this->db->query("SELECT * FROM vendor WHERE id = $userid ")->row();
?>
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-5">
        <div class="profile-sidebar bg-holder bg-overlay-black-70" style="background-image: url(<?=base_url('website')?>/images/banner-01.jpg);">
          <div class="d-sm-flex align-items-center position-relative">
            <div class="profile-avatar">
            <?php
              if(!empty($vendor->profile_image)){
                $profile_image = explode('::::',$vendor->profile_image)[0];
              ?>
              <img class="img-fluid  rounded-circle" src="<?php echo base_url(); ?>uploads/<?php echo $profile_image; ?>" alt="">
              <?php } ?>
            </div>
            <div class="ms-sm-4">
              <h4 class="text-white"><?=@$vendor->uname?></h4>
              <b class="text-white"><?=@$vendor->email?></b>
            </div>
            <div class="ms-auto my-4 mt-sm-0">
              <a class="btn btn-white btn-md" href="submit-property.html"> <i class="fa fa-plus-circle"></i>Add listing </a>
            </div>
          </div>
          <div class="profile-nav">
            <ul class="nav" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="edit-profile-tab" data-bs-toggle="pill" href="#edit-profile" role="tab" aria-controls="listing" aria-selected="false"><i class="far fa-user"></i> Edit Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="my-properties-tab" data-bs-toggle="pill" href="#my-properties" role="tab" aria-controls="agents" aria-selected="false"><i class="far fa-bell"></i>My properties</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="saved-homes-tab" data-bs-toggle="pill" href="#saved-homes" role="tab" aria-controls="agents" aria-selected="false"><i class="fas fa-home"></i> Saved Homes</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="tab-content" id="pills-tabContent">

          <div class="tab-pane fade show active " id="edit-profile" role="tabpanel" aria-labelledby="overview-tab">
            <div class="row">

              <div class="col-12">
                <div class="section-title d-flex align-items-center">
                  <h2>Edit profile </h2>
                  <span class="ms-auto">Joined Mar 18, 2019</span>
                </div>
                <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('user/update-vendor'); ?>">
                  <div class="row">
                  <input type="hidden" name="id" value="<?php echo $vendor->id; ?>">
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">User name</label>
                      <input type="text" class="form-control" name="uname" value="<?php echo $vendor->uname; ?>">

                      <?php echo form_error('uname'); ?>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">Email address</label>
                      <input type="text" class="form-control" name="email" value="<?php echo $vendor->email; ?>">

                      <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">Phone number</label>
                      <input type="text" class="form-control"name="phone" value="<?php echo $vendor->phone; ?>">
                      <?php echo form_error('phone'); ?>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">whatsapp</label>
                      <input type="text" class="form-control"name="whatsapp" value="<?php echo $vendor->whatsapp; ?>">
                      <?php echo form_error('whatsapp'); ?>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">Office Phone</label>
                      <input type="text" class="form-control"name="office_phone" value="<?php echo $vendor->office_phone; ?>">
                      <?php echo form_error('office_phone'); ?>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">fax</label>
                      <input type="text" class="form-control"name="fax" value="<?php echo $vendor->fax; ?>">
                      <?php echo form_error('fax'); ?>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">facebook</label>
                      <input type="text" class="form-control"name="facebook" value="<?php echo $vendor->facebook; ?>">
                      <?php echo form_error('facebook'); ?>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">linkedin</label>
                      <input type="text" class="form-control" name="linkedin" value="<?php echo $vendor->linkedin; ?>">
                      <?php echo form_error('linkedin'); ?>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">twitter</label>
                      <input type="text" class="form-control" name="twitter" value="<?php echo $vendor->twitter; ?>">
                      <?php echo form_error('twitter'); ?>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">website</label>
                      <input type="text" class="form-control" name="website" value="<?php echo $vendor->website; ?>">
                      <?php echo form_error('website'); ?>
                    </div>
             
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">lat</label>
                      <input type="text" class="form-control" name="lat" value="<?php echo $vendor->lat; ?>">
                      <?php echo form_error('lat'); ?>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">lon</label>
                      <input type="text" class="form-control" name="lon" value="<?php echo $vendor->lon; ?>">
                      <?php echo form_error('lon'); ?>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">company</label>
                      <input type="text" class="form-control" name="company" value="<?php echo $vendor->company; ?>">
                      <?php echo form_error('company'); ?>
                    </div>
                    <div class="form-group col-md-6 mb-3 select-border">
                      <label class="mb-2">User type</label>
                      <select class="form-control basic-select">
                      <?php foreach (get_vendore_type() as $key => $value) : ?>
												<option value="<?php echo $key; ?>"  <?php if ($key == $vendor->type) echo "selected='selected'"; ?>><?php echo $value ?></option>
											<?php endforeach; ?>
                      </select>
                    </div>
                    <hr class="my-5" />
                <div class="mb-5">
                  <h6>Upload your ID</h6>
                  <p>To ensure the safety of agents, we need you to provide your identity before we can take you on a home tour.</p>
                  <div class="input-group file-upload">
                    <input type="file" class="form-control"name="profile_image" id="customFile">
                    <label class="input-group-text" for="customFile">Choose file</label>
                  </div>
                </div>
                   
                    <div class="form-group col-md-12 mb-3">
                      <label class="mb-2">About Me</label>
                      <textarea class="form-control" name="desc" rows="4" >
                      <?php echo $vendor->desc; ?>
                      </textarea>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                      <div class="d-flex align-items-center">
                        <label class="mb-2">Password</label>
                    
                      </div>
                      <input type="password" name="password" class="form-control" placeholder="Enter Password" autocomplete="off"><?php echo form_error('password'); ?>

                    </div>
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                  </div>
                </form>
         
          </div>              

            </div>
          </div>

          <div class="tab-pane fade " id="my-properties" role="tabpanel" aria-labelledby="overview-tab">
<!--=================================
My Properties -->

    <div class="row">

      <div class="col-12">
        <div class="section-title d-flex align-items-center">
          <h2>My Properties</h2>
        </div>
        <div class="row">
        <?php      $restaurants = $this->db->query("SELECT * FROM restaurants WHERE approved = '1' and vid = $vendor->id   ORDER BY res_ratings DESC LIMIT 0, 15")->result_array();?>

<?php if (isset($restaurants)) {
                  $cnt = 1; ?>
                  <?php foreach ($restaurants as $listing) {
            $user_id=     $listing['vid'];
       $vendor= $this->db->query("SELECT * FROM vendor WHERE id = $user_id ")->row()

?>
        <div class="col-sm-6 col-md-4">
        <div class="property-item">
 
          <div class="property-image bg-overlay-gradient-04">
          <?php $image = explode('::::', $listing['res_image'])[0]; ?>
            <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" alt="">
            <div class="property-lable">
              <span class="badge badge-md bg-primary">Bungalow</span>
              <span class="badge badge-md bg-info">Sale </span>
            </div>
            <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
            <div class="property-agent">
              <div class="property-agent-image"><?php
              if(!empty($vendor->profile_image)){
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
    
          </div>
        <?php $this->load->helper('text');?>
          <div class="property-details">
            <div class="property-details-inner">
              <h5 class="property-title"><a href="<?php echo base_url('store/' . $listing['res_id']); ?>"><?=$listing['res_name']?></a></h5>
              <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i><?= word_limiter($listing['res_desc'],3);?></span>
              <span class="property-agent-date">
                <i class="far fa-clock fa-md"></i><?php
              echo date('d/M/Y', $listing['res_create_date']);
              ?></span>
              <div class="property-price"><?=$listing['discount']?><span> / month</span> </div>
              <ul class="property-info list-unstyled d-flex">
                <li class="flex-fill property-bed"><i class="fas fa-bed"></i>rooms<span><?=$listing['rooms']?></span></li>
                <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span><?=$listing['baths']?></span></li>
                <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span><?=$listing['space']?>m</span></li>
              </ul>
            </div>
            <div class="property-btn">
              <a class="property-link" href="<?php echo base_url('store/' . $listing['res_id']); ?>">See Details</a>
              <ul class="property-listing-actions list-unstyled mb-0">
                <li class="property-favourites">
                  <a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
          </div>
          <?php }}?>
   
        </div>
      </div>
    </div>

<!--=================================
My Properties -->
          </div>

          <div class="tab-pane fade " id="saved-homes" role="tabpanel" aria-labelledby="overview-tab">
<!--=================================
Saved Homes -->

    <div class="row">

      <div class="col-12">
        <div class="section-title d-flex align-items-center">
          <h2>Saved Homes</h2>
        </div>
        <div class="row">
          <?php 
          $query =$this->db->select('likes.like_id, restaurants.*')
          ->from('likes')
          // ->where('likes.user_id', $user_id)
          ->join('restaurants', 'likes.res_id = restaurants.res_id')
          ->where('restaurants.approved' , "1")
          ->where('likes.user_id', $vendor->id)
          ->get();
          
          $favorites=$query->result_array();	
          ?>
   <?php if (isset($favorites)) {
                  $cnt = 1; ?>
                  <?php foreach ($favorites as $listing) {
            $user_id=     $listing['vid'];
       $vendor= $this->db->query("SELECT * FROM vendor WHERE id = $user_id ")->row()

?>
        <div class="col-sm-6 col-md-4">
        <div class="property-item">
 
          <div class="property-image bg-overlay-gradient-04">
          <?php $image = explode('::::', $listing['res_image'])[0]; ?>
            <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" alt="">
            <div class="property-lable">
              <span class="badge badge-md bg-primary">Bungalow</span>
              <span class="badge badge-md bg-info">Sale </span>
            </div>
            <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
            <div class="property-agent">
              <div class="property-agent-image"><?php
              if(!empty($vendor->profile_image)){
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
    
          </div>
        <?php $this->load->helper('text');?>
          <div class="property-details">
            <div class="property-details-inner">
              <h5 class="property-title"><a href="<?php echo base_url('store/' . $listing['res_id']); ?>"><?=$listing['res_name']?></a></h5>
              <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i><?= word_limiter($listing['res_desc'],3);?></span>
              <span class="property-agent-date">
                <i class="far fa-clock fa-md"></i><?php
              echo date('d/M/Y', $listing['res_create_date']);
              ?></span>
              <div class="property-price"><?=$listing['discount']?><span> / month</span> </div>
              <ul class="property-info list-unstyled d-flex">
                <li class="flex-fill property-bed"><i class="fas fa-bed"></i>rooms<span><?=$listing['rooms']?></span></li>
                <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span><?=$listing['baths']?></span></li>
                <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span><?=$listing['space']?>m</span></li>
              </ul>
            </div>
            <div class="property-btn">
              <a class="property-link" href="<?php echo base_url('store/' . $listing['res_id']); ?>">See Details</a>
              <ul class="property-listing-actions list-unstyled mb-0">
       
                <li class="property-favourites"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite" href="#"><i class="fas fa-heart text-danger"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
          </div>
          <?php }}?>

        </div>
      </div>
    </div>

<!--=================================
Saved Homes -->
          </div>

      </div>

    </div>
  </div>
</section>
<!--=================================
My profile -->