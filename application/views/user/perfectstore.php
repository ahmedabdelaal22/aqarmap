<section class="sblack s-pt-50 s-pb-50 container-px-0 gallery-fullwidth listings_section">
				<!--<div class="d-none d-lg-block divider-20"></div>-->
				<div class="container">

							<div class="row listings_head">
								<div class="col-md-11 col-xl-12">
									<div class="text-lg-center">
                                    	<h6 class="title_head big">
										العقارات الاعلي تقييما
										</h6>
									</div>
								</div>
							</div>

                            <?php
	 $restaurants = $this->db->query("SELECT * FROM restaurants WHERE approved = '1'   ORDER BY res_ratings DESC LIMIT 0, 15")->result_array();

  //  $restaurants = $this->admin_model->get_restaurants();
?>
							<div class="row listings ">
								<div class="col-12">
									<div class="listings_slider owl-carousel">
							<?php if (isset($restaurants)) {
										$cnt = 1; ?>
										<?php foreach ($restaurants as $listing) {

                  $countreview = $this->admin_model->get_count_review($listing['res_id']);
				  $like=  $this->front_model->likeCheckfront(@$_COOKIE['user_id_cookie'], $listing['res_id']);

                                             ?>
								<div class="listing_item">
									<div class="vertical-item gallery">
										<div class="item-media">
										<?php if($listing['discount'] >0 ){?>
											<div class="disq_box">
												<span class="disq"><?=$listing['discount']?>%</span>
												<span class="symbol">OFF</span>
											</div>
											<?php } ?>

											<a href="javascript:sendRestest(<?=$listing['res_id']?>);" class="add_to_fav  <?php if($like==1){echo 'added';}?>" id="test<?=$listing['res_id']?>"><i class="fa fa-heart-o" ></i></a>
                                        <?php if ($listing['res_image'] != " ") { ?>
                                            <?php $image = explode('::::', $listing['res_image'])[0]; ?>
											<img src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" >
                                            <?php }?>
											<!--<div class="media-links">
											</div>-->
											<input type="hidden" id="test<?=$listing['res_id']?>like" value="<?=$like?>">

										</div>
										<div class="item-content">
											<!--<a class="tags small-text" href="<?php echo base_url('Real Estates/' . $listing['res_id']); ?>">-->
											<h6>
												<?php echo substr($listing['res_name'],0,25).'...';
												?>
											</h6>
											<p>
                                                <?php
												$str = $listing['res_desc'];

												if (strlen($listing['res_desc']) > 15) {
													$str = explode("\n", wordwrap($listing['res_desc'], 15));
													$str = $str[0] . '...';
												}
												?>
												<?php echo $str; ?>
											</p>
											<div class="rating_offers">
												<div class="offers_text">
													<span class="text"> تم تقييمه من<?=$countreview?> عميل</span>
												<div class="rating_stars">
													<?php for($i=0; $i < $listing['res_ratings']; $i++){?>
														<span class="star"><!--<img src="<?=base_url('website')?>/images/star.png">--><i class="fa fa-star"></i></span>

														<?php }?>
													
													<!-- <span class="star"><img src="<?=base_url('website')?>/images/star.png"></span> -->

												</div>
												</div>
												<div class="more">
													<a href="<?php echo base_url('Real Estates/' . $listing['res_id']); ?>" class="btn btn-light">
														<?php echo $this->lang->line('know_more') ?>
													</a>
												</div>
											</div>
											<!--</a>-->
										</div>
									</div>

								</div>
							
								
							<?php }
                            }
                            ?>
	</div></div>
							</div>

							

				</div>
				<!--<div class="d-none d-lg-block divider-105"></div>-->
			</section>
			<div class="divider my-40"></div>