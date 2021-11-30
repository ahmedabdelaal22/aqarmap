<!--=================================
Listing – list view -->
<div class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="<?=base_url('/')?>"> <i class="fas fa-home"></i> </a></li>
          <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="<?=base_url('/')?>"><?php echo $this->lang->line('home') ?></a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> <?php echo $this->lang->line('agents') ?></span></li>
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
          <h2><span class="text-primary">156</span> <?php echo $this->lang->line('results') ?></h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="property-filter-tag">
 
        </div>
    </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
      <?php if (isset($agents)) {
               ?>
                  <?php foreach ($agents as $row) {?>
        <div class="agent agent-03 mt-4">
          <div class="row g-0">
            <div class="col-lg-3 text-center border-end">
              <div class="d-flex flex-column h-100">
                <div class="agent-avatar p-3 my-auto">

                <?php  if(!empty($row->profile_image)){
                $profile_image = explode('::::',$row->profile_image)[0];
              ?>
                 <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $profile_image; ?>" alt="" onerror="this.onerror=null;this.src='<?=base_url('website')?>/images/default-avatar.jpg'">

                  <?php }else{
                    ?>
<img class="img-fluid" src="<?=base_url('website')?>/images/default-avatar.jpg" alt="" >
                  <?php } ?>
                </div>
                <div class="agent-listing text-center mt-auto">
                  <a href="#"><strong class="text-primary me-2 d-inline-block"><?=countby_agent($row->id)?></strong><?php echo $this->lang->line('listed_properties') ?> </a>
                </div>
              </div>
            </div>
            <div class="col-lg-9">
              <div class="d-flex h-100 flex-column">
                <div class="agent-detail">
                  <div class="d-sm-flex">
  
                    <div class="agent-social ms-auto mt-2 mt-sm-0">
                      <ul class="list-unstyled list-inline">
                        <li class="list-inline-item"><a href="<?=$row->facebook?>"><i class="fab fa-facebook-f"></i> </a></li>
                        <li class="list-inline-item"><a href="<?=$row->twitter?>"><i class="fab fa-twitter"></i> </a></li>
                        <li class="list-inline-item"><a href="<?=$row->linkedin?>"><i class="fab fa-linkedin"></i> </a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="agent-info">
                  <?php $this->load->helper('text');?>
                    <p class="mt-3 mb-3"><?= word_limiter($row->desc,10);?></p>
                    <ul class="list-unstyled mb-0">
                      <li><strong><?php echo $this->lang->line('office_phone') ?>: </strong><?=$row->office_phone?></li>
                      <li><strong><?php echo $this->lang->line('fax') ?>: </strong><?=$row->fax?></li>
                      <li><strong><?php echo $this->lang->line('email') ?>: </strong><?=$row->email?></li>
                    </ul>
                    <ul class="list-unstyled mb-0">
                      <li><strong><?php echo $this->lang->line('phone_label') ?>: </strong><?=$row->phone?></li>
                      <li><strong><?php echo $this->lang->line('whatsapp') ?>: </strong><?=$row->whatsapp?></li>
                    </ul>
                  </div>
                </div>
                <div class="agent-button">
                  <a class="btn btn-light btn-lg d-grid" href="<?php echo base_url('agent/' .$row->id); ?>"><?php echo $this->lang->line('view_profile') ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } }?>
        <div class="row">
          <div class="col-12">
            <!-- <ul class="pagination mt-5">
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
Listing – list view -->