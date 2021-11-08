<section class="page_cover">
     <img class="img-responsive" src="<?=base_url('website')?>/images/pagecover.png">
</section>
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
	<h6 class="section_title">
		الاقسام
	</h6>
	<div class="categories_grid row">
    <?php if(isset($category)){ $cnt=1; ?>  
         <?php foreach($category as $row) { ?>
			<div class="category_item col-lg-3 col-md-6 col-sm-6">
				<a class="bg-gradient shadow-hover line-draw-animation w-100 h-100 text-light d-inline-block text-primary-hover" href="<?php echo base_url('categories/').$row->id?>">
					<div class="line-draw-inner">
					<div class="img_holder">
						
					<?php if($row->img != " ") { ?>
                          <?php $image = explode('::::', $row->img)[0]; ?>
                       
						  <img class="img-responsive" src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>"> 

                        <?php } else { ?>
                        <?php echo "None"; }?>
					</div>
					<div class="content_holder">
						<span class="colored"><?php echo $row->c_name; ?> </span>
						<span><?php echo $row->c_name; ?> </span>
					</div>        
        </div>
				</a>
        </div> 
        <?php } ?>    
        <?php } ?>
		</div> <!-- Row End --></div>

	</div>
</section>