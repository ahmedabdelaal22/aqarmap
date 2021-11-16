<div class="wrapper">
  <!--=================================
  Property details -->
  <section class="space-pt">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-5 mb-lg-0 order-lg-2">
          <div class="sticky-top">
            <div class="mb-4">
              <h3><?=$res->res_name?></h3>
              <span class="d-block mb-3"><i class="fas fa-map-marker-alt fa-xs pe-2"></i><?=$res->res_address?></span>
              <span class="price font-xll text-primary d-block"><?=$res->discount?></span>
              <span class="sub-price font-lg text-dark d-block"><b><?=$res->space?>/Sqft </b> </span>
              <ul class="property-detail-meta list-unstyled ">
                <li><a href="#"> <i class="fas fa-star text-warning pe-2"></i><?=$res->res_ratings?>/5 </a></li>
                <li class="share-box">
                  <a href="#"> <i class="fas fa-share-alt"></i> </a>
                  <ul class="list-unstyled share-box-social">
                    <li> <a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-twitter"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-linkedin"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-instagram"></i></a> </li>
                    <li> <a href="#"><i class="fab fa-pinterest"></i></a> </li>
                  </ul>
                </li>
                <li><a href="#"> <i class="fas fa-heart"></i> </a></li>

              </ul>
            </div>
            <?php
                    $user_id=  $res->vid;
                    $vendor= $this->db->query("SELECT * FROM vendor WHERE id = $user_id ")->row()
            ?>
            <div class="agent-contact">
              <div class="d-flex align-items-center p-4 border border-bottom-0">
                <div class="agent-contact-avatar me-3">
              <?php  if(!empty($vendor->profile_image)){
                $profile_image = explode('::::',$vendor->profile_image)[0];
              ?>
                  <img class="img-fluid rounded-circle avatar avatar-xl" src="<?php echo base_url(); ?>uploads/<?php echo $profile_image; ?>" alt="">
                  <?php } ?>
                </div>
                <div class="agent-contact-name">
                  <h6><?=@$vendor->uname?></h6>
                  <a href="#"><?=@$vendor->email?></a>
                  <span class="d-block"><i class="fas fa-phone-volume pe-2 mt-2"></i><?=@$vendor->phone?></span>
                </div>
              </div>
              <div class="d-flex">
                <a href="#" class="btn btn-dark col b-radius-none">View listings</a>
                <a data-bs-toggle="modal" data-bs-target="#requestInfoModal" href="#" class="btn btn-primary col ms-0 b-radius-none">Request info</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 order-lg-1">
          <div class="property-detail-img popup-gallery">
            <div class="owl-carousel" data-animateOut="fadeOut" data-nav-arrow="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0" data-loop="true">
            <?php
	$images = explode('::::', $res->res_image);
?> 
                <?php if(isset($images )){
			$cnt=0;
			?>
      <?php foreach($images as $key => $image) { ?>  
            <div class="item">
                <a class="portfolio-img" href="<?php echo base_url('uploads/').$image?>"><img class="img-fluid" src="<?php echo base_url('uploads/').$image?>" alt=""></a>
              </div>
              <?php $cnt++; }}?>
            </div>
          </div>
          <div class="property-info mt-5">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5>Property details</h5>
              </div>
              <div class="col-sm-9">
                <div class="row mb-3">
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled">
                      <li><b>Property ID:</b> <?=$res->res_id?></li>
                      <li><b>Price:</b> <?=$res->discount?></li>
                      <li><b>Property Size:</b> <?=$res->space?> Sq Ft</li>
                      <li><b>rooms:</b> <?=$res->rooms?></li>
                      <li><b>Bathrooms:</b> <?=$res->baths?></li>
                    </ul>
                  </div>
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled">
                      <li><b>Garage:</b> <?=$res->garage?></li>
                      <li><b>Garage Size:</b> <?=$res->garage_size?> SqFt</li>
                      <li><b>Year Built:</b>  <?=$res->year_of_construction?></li>
                     
                      <li><b>Property Status:</b><?=key_type($res->type)?></li>
                    </ul>
                  </div>
                </div>
                <h6 class="text-primary mb-3 mb-sm-0">Additional details</h6>
                <div class="row">
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled mb-0">
                      <li><b>overlooking:</b> <?=$res->overlooking?> </li>
                      <?php if(!empty($res->pool)){?>
                      <li><b>Pool Size:</b> <?=$res->pool?> Sqft</li>
                      <?php }?>
              
                    </ul>
                  </div>      
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled mb-0">
                      <?php if($res->real_compound ==1 ){?>
                      <li><b>Real Compound</b></li>
                      <?php } ?>
                      <?php if($res->real_owner ==1 ){?>
                      <li><b>Real Estate Directly From The Owner</b></li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
          <div class="property-description">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5>Description</h5>
              </div>
              <div class="col-sm-9">
                <p><?=$res->res_desc?></p>
              </div>
            </div>
          </div>
          <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
   
          <div class="property-address">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5>Address</h5>
              </div>
              <div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled mb-0">
                      <li><b><?=$res->res_address?> </b></li>
                
                    </ul>
                  </div>
        
                </div>
              </div>
            </div>
          </div>
          <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
          <div class="property-floor-plans">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5>Map</h5>
              </div>
              <div class="col-sm-9">
    <div id="googleMap" style="width:100%;height:400px;"></div>

     <script>
        function myMap() {
          const myLatLng = { lat: <?=$res->lat?>, lng: <?=$res->lon?>};
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
          <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
          <div class="property-video">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5>Property video</h5>
              </div>
              <div class="col-sm-9">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe width="546" height="315" src="https://www.youtube.com/embed/<?=$res->video?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
 
          <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
          <div class="property-nearby">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5>What's nearby</h5>
              </div>
             
              <div class="col-sm-9">
              <?php if(!empty($res->education)){?>
                <div class="nearby-info mb-4">
              
                  <span class="nearby-title mb-2 d-block text-info">
                    <i class="fas fa-graduation-cap me-2"></i><b>Education</b>
                  </span>
                  
                  <div class="nearby-list">
                    <ul class="property-list list-unstyled mb-0">
                      <li class="d-flex">
                        <span class="me-1"><b><?=$res->education?></b> </span>
                
                      </li>
             
                    </ul>
                  </div>
                </div>
                <?php } ?>
                <?php  if(!empty($res->health_medical)){?>
                <div class="nearby-info mb-4">
           
                  <span class="nearby-title mb-2 d-block text-success">
                    <i class="fas fa-user-md me-2"></i><b>Health & Medical</b>
                  </span>
                 
                  <div class="nearby-list">
                    <ul class="property-list list-unstyled mb-0">
                      <li class="d-flex">
                        <span class="me-1"><b><?=$res->health_medical?></b> </span>
                   
                      </li>
                  
            
                    </ul>
                  </div>
                </div>
                <?php } ?>
                <?php  if(!empty($res->transportation)){?>
                <div class="nearby-info">
                  <span class="nearby-title mb-2 d-block text-danger">
                    <i class="fas fa-bus-alt me-2"></i><b>Transportation</b>
                  </span>
                  <div class="nearby-list">
                    <ul class="property-list list-unstyled mb-0">
                      <li class="d-flex">
                        <span class="me-1"><b><?=$res->transportation?></b></span>
     
                      </li>
          
                    </ul>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
      
  
        </div>
      </div>
    </div>
  </section>
  <section class="space-pt">
  <div class="container">
    <hr class="mb-5 mt-0">
    <h5 class="mb-4">Similar properties</h5>
    <div class="row">
    <?php      $restaurants = $this->db->query("SELECT * FROM restaurants WHERE approved = '1'   ORDER BY res_ratings DESC LIMIT 0, 3")->result_array();?>

<?php if (isset($restaurants)) {
                  $cnt = 1; ?>
                  <?php foreach ($restaurants as $listing) {
            $user_id=     $listing['vid'];
       $vendor= $this->db->query("SELECT * FROM vendor WHERE id = $user_id ")->row()

?>
      <div class="col-md-4">
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
     <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i><?= word_limiter($listing['res_desc'],4);?></span>
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
      <?php }} ?>
    </div>
  </div>
</section>
  <!--=================================
  Property details -->

<!--=================================
Review -->
<section class="space-pb">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title">
          <h4>Leave a review for joana williams</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="review d-flex">
          <div class="review-avatar avatar avatar-xl me-3">
            <img class="img-fluid rounded-circle" src="<?=base_url('website')?>/images/avatar/01.jpg" alt="">
          </div>
          <div class="review-info flex-grow-1">
            <span class="mb-2 d-block">Rating:</span>
            <ul class="list-unstyled list-inline">
              <li class="list-inline-item m-0 text-warning"><i class="fas fa-star"></i></li>
              <li class="list-inline-item m-0 text-warning"><i class="fas fa-star"></i></li>
              <li class="list-inline-item m-0 text-warning"><i class="fas fa-star"></i></li>
              <li class="list-inline-item m-0 text-warning"><i class="fas fa-star-half-alt"></i></li>
              <li class="list-inline-item m-0 text-warning"><i class="far fa-star"></i></li>
            </ul>
            <div class="mb-3">
              <span class="mb-2 d-block">Rating comment:</span>
              <div class="mb-3">
                <textarea class="form-control" rows="3"></textarea>
              </div>
            </div>
            <span> <a href="login.html"> <b>Login</b>  </a> to leave a review</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Review -->
</div>


<!-- Modal -->
<div class="modal hide fade request_info_modal" id="requestInfoModal" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                    <form class="row mt-4 align-items-center">
              <div class="mb-3 col-sm-12">
                <label class="form-label">Username:</label>
                <input type="text" class="form-control" placeholder="">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label">Email Address:</label>
                <input type="email" class="form-control" placeholder="">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label">Phone Number:</label>
                <input type="text" class="form-control" placeholder="">
              </div>
              <div class="mb-3 col-sm-12 d-grid">
                <button type="submit" class="btn btn-primary">Request Info</button>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>