
	
<section class="">
	<!--<div class="d-none d-lg-block divider-20"></div>-->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!--<div class="row ">
					<div class="col-md-11 col-xl-12">
						<div class="filters gallery-filters small-text text-lg-center">
                        <h2 style="color:red">Perfect   &amp; <?=$category->c_name?></h2>
						</div>
					</div>
				</div>-->
				<div class="row justify-content-center">
				<?php if (!empty($restaurants)) {$cnt = 1;
					

					
					?>
					<div class="listing_grid row">
			
							
					<?php foreach ($restaurants as $listing) {
		$like=  $this->front_model->likeCheckfront(@$_COOKIE['user_id_cookie'], $listing['res_id']);

						?>
					<div class="listing_item col-lg-3 col-md-6 col-sm-6">
					<a href="javascript:sendRes(<?=$listing['res_id']?>);" class="add_to_fav  <?php if($like==1){echo 'added';}?>" id="<?=$listing['res_id']?>"><i class="fa fa-heart-o" ></i></a>
						<a href="<?php echo base_url('Real Estates/' . $listing['res_id']); ?>" class="bg-gradient shadow-hover line-draw-animation w-100 h-100 text-light d-inline-block text-primary-hover">
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
				
					
				<?php }?>
				</div>
               <?php }else{
		
                ?>
					<div class="faverror listing_item col-lg-6 col-md-6 col-sm-6">
				<div class="alert alert-danger" role="alert">
				لا يوجد مطاعم  في قائمة المفضلة

              </div>
			  </div>
			<?php } ?>
			
					

				</div>
				<!-- .isotope-wrapper-->

				
			</div>
		</div>
	</div>
</section>