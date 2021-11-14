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
	              <a href="<?php echo base_url('categories/').$row->id?>">
	                <div class="category-icon">
	                  <i class="flaticon-building-2"></i>
	                </div>
	                <h6 class="mb-0"><?=$row->c_name?></h6>
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
<!--=================================
 Browse properties Categories -->

<!--<section class="">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto text-center mb-5">
				<h2 style="color:red">Elements &amp; Categories</h2>
			</div>
		</div>

<div class="row justify-content-center ">
	<div class="col-12">
		<div class="top_slider_holder">
			
				<h6 class="title_head small">
		المجموعات التصنيفية
	</h6>
		<div class=" category_slider_top main owl-carousel">
    <?php if(isset($category)){ $cnt=1; ?>  
         <?php foreach($category as $row) { ?>
			<div class="category_item">
				<a class="bg-gradient shadow-hover line-draw-animation w-100 h-100 text-light d-inline-block text-primary-hover" href="<?php echo base_url('categories/').$row->id?>">
					<div class="line-draw-inner">
					<span><?php echo $row->c_name; ?></span>
          <img src="<?php echo base_url('uploads/').$row->icon?>" class="image" height="40" width="40">         
        </div>
				</a>
        </div> 
        <?php } ?>    
        <?php } ?>
		</div> 

		</div>
	</div>


	</div>

	</div>
</section>-->