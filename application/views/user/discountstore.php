<!--=================================
 offering the Best Real Estate-->
<section class="clearfix best-deals">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <h2><?php echo $this->lang->line('best_deals_head') ?></h2>
          <p><?php echo $this->lang->line('best_deals_subhead') ?></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="owl-carousel owl-nav-top-right" data-animateOut="fadeOut" data-nav-arrow="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">

        <?php      $restaurants = $this->db->query("SELECT * FROM restaurants WHERE approved = '1'   ORDER BY res_ratings DESC LIMIT 0, 5")->result_array();?>

<?php if (isset($restaurants)) {
                  $cnt = 1; ?>
                  <?php foreach ($restaurants as $listing) {
            $user_id=     $listing['vid'];
       $vendor= $this->db->query("SELECT * FROM vendor WHERE id = $user_id ")->row()

?>
          <div class="item">
            <div class="property-offer">
              <div class="property-offer-item">
              <?php $image = explode('::::', $listing['res_image'])[0]; ?>
                <div class="property-offer-image bg-holder" style="background: url('<?php echo base_url(); ?>uploads/<?php echo $image; ?>');">
                  <div class="row">
                    <div class="col-lg-6 col-md-10 col-sm-12">
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
              ?></span>
                          <p class="mb-0 d-block mt-3"><?= word_limiter($listing['res_desc'],8);?></p>
                          <div class="property-price"><?=$listing['discount']?><span> EGP</span> </div>
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
                </div>
              </div>
            </div>
          </div>
          <?php }} ?>
        </div>
      </div>
    </div>
  </div>
</section>
   