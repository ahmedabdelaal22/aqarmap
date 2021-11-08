<section class="">
	<div class="container">
		<!--<div class="row">
			<div class="col-lg-8 mx-auto text-center mb-5">
				<h2 style="color:red">Elements &amp; Categories</h2>
			</div>
		</div>-->
    <?php

  $subcategory = $this->admin_model->get_sub_category($category->id);

?>
<div class="row justify-content-center ">
	<div class="col-12">
		<div class="top_slider_holder">
			
				<h6 class="title_head small">
		<?=$category->c_name?>
	</h6>
		<div class=" category_slider_top sub owl-carousel">
						<div class="category_item <?php if($this->input->get('filter_sub')=='all'){echo "active";}?>  <?php if($this->input->get('filter_sub')==''){echo "active";}?>" >
				<a class="bg-gradient shadow-hover line-draw-animation w-100 h-100 text-light d-inline-block text-primary-hover" 
				href="javascript:search_sub('all');"
				>
					<div class="line-draw-inner">
					<span>الكل </span>
          <img src="<?=base_url('website')?>/images/all.png" class="image" height="40" width="40">         
        </div>
				</a>
        </div> 
 						<div class="category_item <?php if($this->input->get('filter_sub')=='offers'){echo "active";}?>">
				<a class="bg-gradient shadow-hover line-draw-animation w-100 h-100 text-light d-inline-block text-primary-hover" 
				href="javascript:search_sub('offers');"
				>
					<div class="line-draw-inner">
					<span>العروض </span>
          <img src="<?=base_url('website')?>/images/offers.png"class="image" height="40" width="40">         
        </div>
				</a>
        </div> 
    <?php if(isset($subcategory)){ $cnt=1; ?>  
         <?php foreach($subcategory as $row) { ?>
			<div class="category_item  <?php if($this->input->get('filter_sub')==$row->id){echo "active";}?>">
				<a class="bg-gradient shadow-hover line-draw-animation w-100 h-100 text-light d-inline-block text-primary-hover" 
				href="javascript:search_sub(<?=$row->id?>);"
				>
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