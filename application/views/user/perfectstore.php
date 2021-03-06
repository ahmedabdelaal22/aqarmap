<!--=================================
  Featured properties-->
<section class="space-pb">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <h2><?php echo $this->lang->line('new_listed_head') ?></h2>
          <p><?php echo $this->lang->line('new_listed_subhead') ?></p>
        </div>
      </div>
    </div>
    <div class="row">
    <?php      $restaurants = $this->db->query("SELECT * FROM restaurants WHERE approved = '1'   ORDER BY res_id DESC LIMIT 0, 6")->result_array();?>

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
              <span class="badge badge-md bg-primary"><?=key_type($listing['type'])?> </span>
              <span class="badge badge-md bg-info"><?=payment_method_value($listing['payment_method'])?> </span>
            </div>
            <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
            <div class="property-agent">
              <div class="property-agent-image">                  <?php   if(!empty($vendor->profile_image)){
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
                            <?=$listing['res_address']?> 
              <?php }else{?>
                <?=$listing['res_address_a']?> 
            <?php }?>
            </span>
              <span class="property-agent-date">
                <i class="far fa-clock fa-md"></i><?php
              echo date('d/M/Y', $listing['res_create_date']);
              ?></span>
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
                  <a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite"href="javascript:sendRestest(<?=$listing['res_id']?>);">
                    <i class="far fa-heart  <?php if($like==1){echo 'text-danger';}?>"  id="test<?=$listing['res_id']?>"></i>
                  </a>
                  <input type="hidden" id="test<?=$listing['res_id']?>like" value="<?=$like?>">
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    
      <?php }} ?>

      <div class="col-12 text-center">
        <a class="btn btn-link" href="<?php echo base_url('search'); ?>"><i class="fas fa-plus"></i><?php echo $this->lang->line('view_all_listings') ?></a>
      </div>
    </div>
  </div>
</section>


