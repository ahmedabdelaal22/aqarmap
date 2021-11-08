<section class="">
	<div class="container">
		<!--<div class="row">
			<div class="col-lg-8 mx-auto text-center mb-5">
				<h2 style="color:red">Elements &amp; Categories</h2>
			</div>
		</div>-->
    <?php

  $category = $this->admin_model->get_all_category();

?>
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
					<span><?php echo $row->c_name; ?> </span>
          <img src="<?php echo base_url('uploads/').$row->icon?>" class="image" height="40" width="40">         
        </div>
				</a>
        </div> 
        <?php } ?>    
        <?php } ?>
		</div> <!-- Row End -->

		</div>
	</div>


	</div>

	</div>
</section>