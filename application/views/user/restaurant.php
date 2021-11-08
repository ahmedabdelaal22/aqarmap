<form method="GET" name="searchsubcategory"action="<?=base_url('/categories')?>/<?=$category->id?>">

<?php $this->load->view('user/sub_categories');?>
	
<section class="">
	<!--<div class="d-none d-lg-block divider-20"></div>-->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			
				<input type="hidden" name="filter_sub" id="filter_sub" value="<?=$this->input->get('filter_sub')?>"/>
				<div class="row justify-content-center">
					<div class="filter_and_title">
					    <div class="filter_top">
					    	<!-- <a href="#" class="toggle_filter"><span class="fa fa-filter"></span> ترتيب</a> -->
					    
							<span class="fa fa-filter"></span><select name="sorting" id="sort" class="filter">
								<option value=""> ترتيب</option>
									<option value="res_ratings"<?php if ('res_ratings' == $this->input->get('sorting')) echo "selected='selected'"; ?>>الاعلي تقيم</option>
									<option value="discount" <?php if ('discount' == $this->input->get('sorting')) echo "selected='selected'"; ?>>افضل العروض</option>
						
								</select>
								<!-- <ul class="filter">
					    		<li><a href="#">الاعلي تقيم</a></li>
					    		<li><a href="#">افضل العروض</a></li>
					    		<li><a href="#">عرض الكل</a></li>
					    	</ul> -->
					    </div>
					    <h6 class="section_title">العقارات</h6>
					</div>
</form>
					<div class="listing_grid row">
				<?php if (!empty($restaurants)) {
							$cnt = 1; ?>
					<?php foreach ($restaurants as $listing) { 
										  $like=  $this->front_model->likeCheckfront(@$_COOKIE['user_id_cookie'], $listing['res_id']);

						?>
					<div class="listing_item col-lg-3 col-md-6 col-sm-6">

						<?php if($listing['discount'] >0 ){?>
											<div class="disq_box">
												<span class="disq"><?=$listing['discount']?>%</span>
												<span class="symbol">OFF</span>
											</div>
						<?php } ?>
						<a href="javascript:sendRes(<?=$listing['res_id']?>);" class="add_to_fav  <?php if($like==1){echo 'added';}?>" id="<?=$listing['res_id']?>"><i class="fa fa-heart-o" ></i></a>

						<a href="<?php echo base_url('store/' . $listing['res_id']); ?>" class="bg-gradient shadow-hover line-draw-animation w-100 h-100 text-light d-inline-block text-primary-hover">
							<div class="img_holder">
                            <?php if ($listing['res_image'] != " ") { ?>
                                <?php $image = explode('::::', $listing['res_image'])[0]; ?>
								<img class="img-responsive" src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" >
                                <?php }?>								
							</div>
							<div class="item-content">
								<div class="content_holder">
									<span class="colored">
										<?php echo $listing['res_name']; ?>
									</span>
									<input type="hidden" id="<?=$listing['res_id']?>like" value="<?=$like?>">
                                    <?php
									$str = $listing['res_desc'];
									if (strlen($listing['res_desc']) > 15) {
										$str = explode("\n", wordwrap($listing['res_desc'], 15));
										$str = $str[0] . '...';
									}
									?>
									<span class="desc"><?php echo $str; ?></span>
									<span class="rating">
										<i class="far fa-star-o"></i>
										<span class="rating_valu"><?=$listing['res_ratings']?></span>
									</span>
								</div>
							</div>
						</a>

					</div>
				
					
				<?php }
                
                ?>


<?php }else{
		
		?>
			<div class="faverror listing_item col-lg-6 col-md-6 col-sm-6">
		<div class="alert alert-danger" role="alert">
		لا يوجد مطاعم  في قائمة 

	  </div>
	  </div>
	<?php } ?>
<!-- <nav class="pagination-nav" aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav> -->

              </div>
					

				</div>
				<!-- .isotope-wrapper-->

				
			</div>
		</div>
	</div>
</section>
<script>

 function search_sub(category_id){
	$("#filter_sub").val(category_id);
	document.searchsubcategory.submit();
  
  }
	$(document).ready(function() {
     $('#sort').on('change', function() {
// alert($("#filter_sub").val());
       document.searchsubcategory.submit();
   });
   
});
 
</script>