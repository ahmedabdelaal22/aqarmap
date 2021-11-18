<!--=================================
Listing – grid view -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="agent agent-03">
          <div class="row g-0">
            <div class="col-md-3 text-center border-end">
              <div class="d-flex flex-column h-100">
                <div class="agent-avatar p-3 my-auto">
                <?php  if(!empty($agent->profile_image)){
                $profile_image = explode('::::',$agent->profile_image)[0];
              ?>
                  <img class="img-fluid rounded-circle" src="<?php echo base_url(); ?>uploads/<?php echo $profile_image; ?>" alt="">
                  <?php } ?>
                </div>
                <div class="agent-listing text-center mt-auto">
                  <a href="#"><strong class="text-primary me-2 d-inline-block"><?=countby_agent($agent->id)?></strong>Listed Properties </a>
                </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="d-flex h-100 flex-column">
                <div class="agent-detail">
                  <div class="d-block d-sm-flex">
                    <div class="agent-name mb-3 mt-sm-0">
                      <h2> <a href="#"><?=$agent->uname?></a></h2>
                      <span><?=vendore_type($agent->type)?></span>
                    </div>
                    <div class="agent-social ms-auto">
                      <ul class="list-unstyled list-inline">
                        <li class="list-inline-item"><a href="<?=$agent->facebook?>"><i class="fab fa-facebook-f"></i> </a></li>
                        <li class="list-inline-item"><a href="<?=$agent->twitter?>"><i class="fab fa-twitter"></i> </a></li>
                        <li class="list-inline-item"><a href="<?=$agent->linkedin?>"><i class="fab fa-linkedin"></i> </a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="agent-info">
                  <?php $this->load->helper('text');?>
                    <p class="mt-3 mb-3">
                    <?= word_limiter($agent->desc,10);?>
                   </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-4 mt-sm-5">
        <div class="p-4 bg-light">
          <div class="section-title mb-4">
            <h4>Contact Detail</h4>
          </div>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><strong class="text-dark d-inline-block me-2">Email:</strong><?=$agent->email?></li>
            <?php if(!empty($agent->website)){?>
            <li class="mb-2"><strong class="text-dark d-inline-block me-2">Website:</strong><?=$agent->website?></li>
            <?php }?>
            <?php if(!empty($agent->phone)){?>
            <li class="mb-2"><strong class="text-dark d-inline-block me-2">Phone:</strong><?=$agent->phone?></li>
            <?php }?>
            <?php if(!empty($agent->company)){?>
            <li class="mb-2"><strong class="text-dark d-inline-block me-2">Company:</strong><?=$agent->company?></li>
            <?php }?>
            <?php if(!empty($agent->office_phone)){?>
            <li><strong class="text-dark d-inline-block me-2">Office Number:</strong><?=$agent->office_phone?></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="col-md-8 mt-5">
        <div class="section-title mb-4">
          <h4>Contact pomegranate real estates</h4>
        </div>
        <form>
          <div class="row">
            <div class="form-group col-md-4 mb-3">
              <input type="text" class="form-control" id="name" placeholder="Your name">
            </div>
            <div class="form-group col-md-4 mb-3">
              <input type="text" class="form-control" id="phone" placeholder="Your phone">
            </div>
            <div class="form-group col-md-4 mb-3">
              <input type="email" class="form-control" id="inputEmail4" placeholder="Your email">
            </div>
            <div class="form-group col-md-12 mb-3">
              <textarea class="form-control" rows="4" placeholder="Your message"></textarea>
            </div>
            <div class="col-md-12">
              <a class="btn btn-primary" href="#">Send message</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!--=================================
Listing – grid view -->

<!--=================================
review -->
<section class="space-pb">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ul class="nav nav-tabs mb-4" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link " id="overview-tab" data-bs-toggle="pill" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" id="listing-tab" data-bs-toggle="pill" href="#listing" role="tab" aria-controls="listing" aria-selected="false">Listing</a>
          </li>
    <?php if(!empty($agent->lat)){?>
          <li class="nav-item">
            <a class="nav-link" id="map-tab" data-bs-toggle="pill" href="#map" role="tab" aria-controls="map" aria-selected="false">Map</a>
          </li>
          <?php } ?>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade  " id="overview" role="tabpanel" aria-labelledby="overview-tab">
            <div class="row">
              <div class="col-md-12">
                <p>

                <?= $agent->desc;?>
                </p>
    
              </div>
           
            </div>
          </div>
          <div class="tab-pane fade show active" id="listing" role="tabpanel" aria-labelledby="listing-tab">
            <div class="row">

            <?php      $restaurants = $this->db->query("SELECT * FROM restaurants WHERE approved = '1' and vid = $agent->id   ORDER BY res_ratings DESC LIMIT 0, 15")->result_array();?>

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
              <div class="property-price"><?=$listing['discount']?><span> EGP</span> </div>
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
        
          <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">

          <div id="googleMap" style="width:100%;height:400px;"></div>

<script>
   function myMap() {
     const myLatLng = { lat: <?=$agent->lat?>, lng: <?=$agent->lon?>};
     const map = new google.maps.Map(document.getElementById("googleMap"), {
       zoom: 4,
       center: myLatLng,
     });

     new google.maps.Marker({
       position: myLatLng,
       map,
       title: "Hello World!",
     });
   }
 </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnr98Qv1lOJJ2n3hvqxuoc55HN7VM5aH8&callback=myMap">
 </script>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
review -->