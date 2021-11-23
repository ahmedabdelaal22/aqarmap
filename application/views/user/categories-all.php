
   <?php

  $category = $this->admin_model->get_all_category();

?>
<!--=================================
Browse properties Categories -->
<section class="space-ptb">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <h2>Browse by category</h2>
          <p>To browse and buy in your areas of interest, look for properties by category.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="category">
          <ul class="list-unstyled mb-0">
         <?php if(isset($category)){ $cnt=1; ?>  
	         <?php foreach($category as $row) { ?>
	            <li class="category-item">
	              <a href="<?php echo base_url('search?cat_id=').$row->id?>">
	                <div class="category-icon">
	                  <i class="flaticon-building-2"></i>
	                </div>
					<?php if($this->session->userdata('site_lang') == 'english'){?>
	                      <h6 class="mb-0"><?=$row->c_name?></h6>
					<?php }else{?>
						<h6 class="mb-0"><?=$row->c_name_a?></h6>
					<?php }?>
	                <span>(<?=count_category($row->id)?>)</span>
	              </a>
	            </li>
		    <?php } ?>
         <?php } ?>
         
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
