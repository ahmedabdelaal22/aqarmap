<div class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="<?=base_url('/')?>"> <i class="fas fa-home"></i> </a></li>
          <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="<?php echo base_url('search?cat_id=').$cat->id?>">
          <?php if($this->session->userdata('site_lang') == 'english'){?>
            <?=$cat->c_name?>
            <?php }else{?>
            <?=$cat->c_name_a?>
             <?php }?>
             </a>
           </li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span>
             <?php if($this->session->userdata('site_lang') == 'english'){?>
              <?=$res->res_name?>
            <?php }else{?>
              <?=$res->res_name_a?>
             <?php }?>
            </span></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="wrapper">
  <!--=================================
  Property details -->
  <section class="space-pt">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-5 mb-lg-0 order-lg-2">
          <div class="sticky-top">
            <div class="mb-4">
              <h3>
               
            <?php if($this->session->userdata('site_lang') == 'english'){?>
              <?=$res->res_name?>
            <?php }else{?>
              <?=$res->res_name_a?>
             <?php }?>
              </h3>
              <span class="d-block mb-3"><i class="fas fa-map-marker-alt fa-xs pe-2"></i>
              
              <?php if($this->session->userdata('site_lang') == 'english'){?>
              <?=$res->res_address?>
            <?php }else{?>
              <?=$res->res_address_a?>
             <?php }?>
            </span>
              <span class="price font-xll text-primary d-block"><?=$res->discount?></span>
              <span class="sub-price font-lg text-dark d-block"><b><?=$res->space?>/Sqft </b> </span>
              <ul class="property-detail-meta list-unstyled ">
                <li><a href="#"> <i class="fas fa-star text-warning pe-2"></i><?=$res->res_ratings?>/5 </a></li>
                <li class="share-box">
                  <a href="#"> <i class="fas fa-share-alt"></i> </a>
                  <ul class="list-unstyled share-box-social a2a_kit a2a_kit_size_32 a2a_default_style">
                    <li> <a class="a2a_button_facebook" ><i class="fab fa-facebook-f"></i></a> </li>
                    <li> <a class="a2a_button_twitter"><i class="fab fa-twitter"></i></a> </li>
                    <li> <a class="a2a_button_linkedin"><i class="fab fa-linkedin"></i></a> </li>
                    <li> <a class="a2a_button_whatsapp"><i class="fab fa-whatsapp"></i></a> </li>
                    <li> <a class="a2a_button_pinterest"><i class="fab fa-pinterest"></i></a> </li>
                  </ul>
                </li>
                <li class="property-favourites">
                            <?php  
       $like=0;
       if(!empty($this->session->userdata('UserId'))){
        $like=  $this->front_model->likeCheckfront($this->session->userdata('UserId'), $res->res_id);

       }     
       
       
       ?>

                <!-- class="fas fa-heart " -->
                  <a data-bs-toggle="tooltip"  data-bs-placement="top" title="Favourite"href="javascript:sendRes(<?=$res->res_id?>);">
                    <i  id="<?=$res->res_id?>" class="far fa-heart  <?php if($like==1){echo 'text-danger';}?>"></i>
                  </a>
                  <input type="hidden" id="<?=$res->res_id?>like" value="<?=$like?>">
              </li>   
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
                <a href="<?php echo base_url('agent/' .@$vendor->id); ?>" class="btn btn-dark col b-radius-none"><?php echo $this->lang->line('view_listings') ?></a>
                <a data-bs-toggle="modal" data-bs-target="#requestInfoModal" href="#" class="btn btn-primary col ms-0 b-radius-none"><?php echo $this->lang->line('request_info') ?></a>
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
                <h5><?php echo $this->lang->line('property_details') ?></h5>
              </div>
              <div class="col-sm-9">
                <div class="row mb-3">
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled">
                      <li><b><?php echo $this->lang->line('property_id') ?>:</b> <?=$res->res_id?></li>
                      <li><b><?php echo $this->lang->line('price') ?>:</b> <?=$res->discount?></li>
                      <li><b><?php echo $this->lang->line('property_size') ?>:</b> <?=$res->space?> Sq Ft</li>
                      <li><b><?php echo $this->lang->line('rooms') ?>:</b> <?=$res->rooms?></li>
                      <li><b><?php echo $this->lang->line('bathrooms') ?>:</b> <?=$res->baths?></li>
                    </ul>
                  </div>
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled">
                      <li><b><?php echo $this->lang->line('garage') ?>:</b> <?=$res->garage?></li>
                      <li><b><?php echo $this->lang->line('garage_size') ?>:</b> <?=$res->garage_size?> SqFt</li>
                      <li><b><?php echo $this->lang->line('year_built') ?>:</b>  <?=$res->year_of_construction?></li>
                     
                      <li><b><?php echo $this->lang->line('property_status') ?>:</b><?=key_type($res->type)?></li>
                    </ul>
                  </div>
                </div>
                <h6 class="text-primary mb-3 mb-sm-0"><?php echo $this->lang->line('additional_details') ?></h6>
                <div class="row">
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled mb-0">
                      <li><b><?php echo $this->lang->line('overlooking') ?>:</b>
                      <?php if($this->session->userdata('site_lang') == 'english'){?>
                        <?=$res->overlooking?> 
              <?php }else{?>
                <?=$res->overlooking_a?> 
            <?php }?>
                     
                    
                    </li>
                      <?php if(!empty($res->pool)){?>
                      <li><b><?php echo $this->lang->line('pool_size') ?>:</b> <?=$res->pool?> Sqft</li>
                      <?php }?>
              
                    </ul>
                  </div>      
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled mb-0">
                      <?php if($res->real_compound ==1 ){?>
                      <li><b><?php echo $this->lang->line('real_compound') ?></b></li>
                      <?php } ?>
                      <?php if($res->real_owner ==1 ){?>
                      <li><b><?php echo $this->lang->line('real_estate_directly') ?></b></li>
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
                <h5><?php echo $this->lang->line('description') ?></h5>
              </div>
              <div class="col-sm-9">
                <p>
                <?php if($this->session->userdata('site_lang') == 'english'){?>
                        <?=$res->res_desc?> 
              <?php }else{?>
                <?=$res->res_desc_a?> 
            <?php }?>
               
              </div>
            </div>
          </div>
          <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
   
          <div class="property-address">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5><?php echo $this->lang->line('address') ?></h5>
              </div>
              <div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled mb-0">
                      <li><b>
                     
                        <?php if($this->session->userdata('site_lang') == 'english'){?>
                        <?=$res->res_address?> 
                        <?php }else{?>
                        <?=$res->res_address_a?> 
                        <?php }?>
                      
                      </b></li>
                
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
                <h5><?php echo $this->lang->line('map') ?></h5>
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
                <h5><?php echo $this->lang->line('property_video') ?></h5>
              </div>
              <div class="col-sm-9">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe width="546" height="315" src="https://www.youtube.com/embed/<?=$res->video?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
          <?php if(!empty($res->education)||!empty($res->transportation)||!empty($res->education)){?>
          <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
          <div class="property-nearby">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5><?php echo $this->lang->line('Whats_nearby') ?></h5>
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
                        <span class="me-1"><b>
                          
                          <?php if($this->session->userdata('site_lang') == 'english'){?>
                            <?=$res->education?>
                        <?php }else{?>
                          <?=$res->education_a?>
                        <?php }?>
                        </b> </span>
                
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
                        <span class="me-1"><b>
                          
                              
                          <?php if($this->session->userdata('site_lang') == 'english'){?>
                            <?=$res->health_medical?>
                        <?php }else{?>
                          <?=$res->health_medical_a?>
                        <?php }?>
                        </b> </span>
                   
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
                        <span class="me-1"><b>
                    
                          <?php if($this->session->userdata('site_lang') == 'english'){?>
                            <?=$res->transportation?>
                        <?php }else{?>
                          <?=$res->transportation_a?>
                        <?php }?>
                        </b></span>
     
                      </li>
          
                    </ul>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
      <?php }?>
  
        </div>
      </div>
    </div>
  </section>
  <input type="hidden" id="userlogin" value="<?=$this->session->userdata('UserId')?>">

  <section class="space-pt">
  <div class="container">
    <hr class="mb-5 mt-0">
    <h5 class="mb-4"><?php echo $this->lang->line('similar_properties') ?></h5>
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
   <span class="badge badge-md bg-primary"><?=key_type($listing['type'])?> </span>
              <span class="badge badge-md bg-info"><?=payment_method_value($listing['payment_method'])?> </span>
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
     <h5 class="property-title"><a href="<?php echo base_url('store/' . $listing['res_id']); ?>">
     
     
                  <?php if($this->session->userdata('site_lang') == 'english'){?>
                      <?=$listing['res_name']?>
                        <?php }else{?>
                          <?=$listing['res_name_a']?>
                        <?php }?>
    </a></h5>
     <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>
    
    
     <?php if($this->session->userdata('site_lang') == 'english'){?>
                     <?= word_limiter($listing['res_desc'],4);?>
                        <?php }else{?>
                          <?=$listing['res_desc_a']?>
                        <?php }?>
    </span>
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
          <h4><?php echo $this->lang->line('leave_review') ?></h4>
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
            <span class="mb-2 d-block"><?php echo $this->lang->line('rating') ?>:</span>
            <div class="rate d-block">
              <input type="radio" id="star5" name="rate" value="5" />
              <label class="fas fa-star" for="star5" title="text"></label>
              <input type="radio" id="star4" name="rate" value="4" />
              <label class="fas fa-star" for="star4" title="text"></label>
              <input type="radio" id="star3" name="rate" value="3" />
              <label class="fas fa-star" for="star3" title="text"></label>
              <input type="radio" id="star2" name="rate" value="2" />
              <label class="fas fa-star" for="star2" title="text"></label>
              <input type="radio" id="star1" name="rate" value="1" />
              <label class="fas fa-star" for="star1" title="text"></label>
            </div>
            <div class="mb-3 clearfix">
              <span class="mb-2 d-block"><?php echo $this->lang->line('rating_comment') ?>:</span>
              <div class="mb-3">
                <textarea class="form-control" rows="3"></textarea>
              </div>
            </div>
            <button type="button"id="addreview" class="btn btn-primary"><?php echo $this->lang->line('add_review') ?></button>

            <?php if(empty($this->session->userdata('UserId'))){?>
            <span> <a href="<?php echo base_url('login'); ?>"> <b><?php echo $this->lang->line('login') ?></b>  </a> <?php echo $this->lang->line('login_to_leave_review') ?></span>
            <?php }?>
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
                    <form class="row mt-4 align-items-center" id="cform">
                      <input type="hidden" name="store_id" id="store_id" value="<?=$listing['res_id']?>"/>
              <div class="mb-3 col-sm-12">
                <label class="form-label"><?php echo $this->lang->line('full_name') ?>:</label>
                <input type="text" class="form-control"  name="name" id="name" placeholder="">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label"><?php echo $this->lang->line('email') ?>:</label>
                <input type="email" class="form-control" placeholder=""name="email" id="email">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label"><?php echo $this->lang->line('phone') ?>:</label>
                <input type="text" class="form-control" placeholder=""name="phone" id="phone">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label"><?php echo $this->lang->line('description') ?>:</label>
                <textarea class="form-control" placeholder="" name="description" id="description"></textarea>
              </div>
              <div class="mb-3 col-sm-12 d-grid">
                <button type="submit" id="contact_form_submit"  class="btn btn-primary">Request Info</button>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>

<script async src="https://static.addtoany.com/menu/page.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		$("#contact_form_submit").click(function (e) {

			e.preventDefault();



			var name = $("input[name='name']").val();
      var store_id = $("#store_id").val();
			var description = $("textarea[name='description']").val();
	
			var phone = $("input[name='phone']").val();
			var email = $("input[name='email']").val();


			$.ajax({
				url: "<?=base_url('subscribe_submit')?>",
				type: 'POST',
				data: {
          store_id: store_id,
					name: name,
					description: description,
					email: email,
					phone: phone
				},
				success: function (data) {
					console.log(data);


					// console.log(data.status);
					if (data.status == true) {
						$('#requestInfoModal').modal('toggle');
						alert(data.message);
						$("#cform")[0].reset();
						$("span").remove(".invalid");
						$('input[name=name]').removeClass('invalid');
						$('input[name=phone]').removeClass('invalid');
						$('input[name=description]').removeClass('invalid');
						$('input[name=email]').removeClass('invalid');
				

					} else {
						// $("#allererror").show();
						//	$("#errorspan").html(data.message);
						printErrorMsg(data.message);
					}
				}
			});


		});


		function printErrorMsg(msg) {
			$("span").remove(".invalid");
			$('input[name=name]').removeClass('invalid');
			$('input[name=phone]').removeClass('invalid');
			$('input[name=description]').removeClass('invalid');
			$('input[name=email]').removeClass('invalid');
			$.each(msg, function (key, value) {
				$(document).find('[name=' + key + ']').after('<span class="text-strong invalid">' + value +
					'</span>')

			});
		}
	});
</script>


<script type="text/javascript">
  $(document).ready(function () {
    $("#addreview").click(function (e) {
   e.preventDefault();
   

   var ratings = $("input[name='rate']").val();
    
      var user_id = $("#userlogin").val();
      var res_id = $("#store_id").val();
      var text = $("#form76").val();

      if (user_id) {
        $.ajax({
          url: "<?=base_url('give_review')?>",
          type: 'POST',
          data: {
            user_id: user_id,
            res_id: res_id,
            ratings: ratings,
            text: text
          },
          success: function (data) {
            console.log(data);
            // console.log(data.status);
            if (data.status == true) {
              var now = new Date(Date.now());
var formatted = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
            //   $( "#allreviews" ).append('<hr><div class="media mt-3 mb-4">'
            // +'<img class="d-flex mr-3 z-depth-1" src="<?php echo base_url('uploads/').$this->session->userdata('aimg')?>" width="62" alt="Generic placeholder image">'
            // +'<input id="input-21b1" value="'+ratings+'" disabled type="text" class="rating" data-theme="krajee-fas" data-min=0 data-max=5 data-step=0.2 data-size="lg"required title="">'
            // +' <div class="media-body">'
            // +'     <div class="d-sm-flex justify-content-between">'
            // +'  <p class="mt-1 mb-2">'
            // +'<div class="rating-container theme-krajee-fas rating-lg rating-animate rating-disabled">'

            // +'  <strong><?=$this->session->userdata('aname')?> </strong>'
            // +' <span> – </span><span>'
            // +''+formatted+''
            // +'  </span>'
            // +' </p>'

            // +'   </div>'
            // +' <p class="mb-0">'+text+'</p>'
            // +' </div>'
            // +'  </div>  <hr>');
              alert(data.message);
              location.reload();
              // style="color:red" id="favorite"

            } else {
              alert(data.message);
              //		printErrorMsg(data.message);
            }
          }
        });
      } else {
        alert("please login");
      }


});
    $("#favorite").click(function (e) {

      e.preventDefault();

      var user_id = $("#userlogin").val();
      var res_id = $("#resturant").val();
      var like = $("#like").val();

      if (user_id) {
  
        if(like==1){
          $(this).css('color', '');
          var url="<?=base_url('unlikeRes')?>";
          $("#like").val("0");
   
        }else{
          $(this).css('color', 'red');
          var url="<?=base_url('likeRes')?>";
          $("#like").val("1");
        
        }

        $.ajax({
          url: url,
          type: 'POST',
          data: {
            user_id: user_id,
            res_id: res_id
          },
          success: function (data) {
            console.log(data);
            // console.log(data.status);
            if (data.status == true) {
              $(this).css('color', 'red');
              alert(data.message);
              // style="color:red" id="favorite"

            } else {
              alert(data.message);
              //		printErrorMsg(data.message);
            }
          }
        });
      } else {
        alert("please login");
      }


    

    });
    
  

  });
</script>
