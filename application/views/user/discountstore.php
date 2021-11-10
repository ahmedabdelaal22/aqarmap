<!--=================================
 offering the Best Real Estate-->
<section class="clearfix">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <h2>Discover our best deals</h2>
          <p>Check the listings of the best dealer on Real Villa and contact the agency or its agent by phone or contact form.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="owl-carousel owl-nav-top-right" data-animateOut="fadeOut" data-nav-arrow="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
          <div class="item">
            <div class="property-offer">
              <div class="property-offer-item">
                <div class="property-offer-image bg-holder" style="background: url('<?=base_url('website')?>/images/property/big-img-01.jpg');">
                  <div class="row">
                    <div class="col-lg-6 col-md-10 col-sm-12">
                      <div class="property-details">
                        <div class="property-details-inner">
                          <h5 class="property-title"><a href="property-detail-style-01.html">Ample apartment at last floor </a></h5>
                          <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Virginia drive temple hills</span>
                          <span class="property-agent-date"><i class="far fa-clock fa-md"></i>10 days ago</span>
                          <p class="mb-0 d-block mt-3">Use a past defeat as a motivator. Remind yourself you have nowhere to go except up as you.</p>
                          <div class="property-price">$150.00<span> / month</span> </div>
                          <ul class="property-info list-unstyled d-flex">
                            <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>1</span></li>
                            <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>2</span></li>
                            <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>145m</span></li>
                          </ul>
                        </div>
                        <div class="property-btn">
                          <a class="property-link" href="property-detail-style-01.html">See Details</a>
                          <ul class="property-listing-actions list-unstyled mb-0">
                            <li class="property-compare"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a></li>
                            <li class="property-favourites"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="property-offer">
              <div class="property-offer-item">
                <div class="property-offer-image bg-holder" style="background: url('<?=base_url('website')?>/images/property/big-img-02.jpg');">
                  <div class="row">
                    <div class="col-lg-6 col-md-10 col-sm-12">
                      <div class="property-details">
                        <div class="property-details-inner">
                          <h5 class="property-title"><a href="property-detail-style-01.html">Luxury villa with pool</a></h5>
                          <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>West Indian St. Missoula</span>
                          <span class="property-agent-date"><i class="far fa-clock fa-md"></i>2 years ago</span>
                          <p class="mb-0 d-block mt-3">For those of you who are serious about having more, doing more, giving more and being more.</p>
                          <div class="property-price">$698.00<span> / month</span> </div>
                          <ul class="property-info list-unstyled d-flex">
                            <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>5</span></li>
                            <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>4</span></li>
                            <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>1,658m</span></li>
                          </ul>
                        </div>
                        <div class="property-btn">
                          <a class="property-link" href="property-detail-style-01.html">See Details</a>
                          <ul class="property-listing-actions list-unstyled mb-0">
                            <li class="property-compare"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a></li>
                            <li class="property-favourites"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
   <!--=================================
  offering the Best Real Estate-->

<!--<section class="sblack s-pt-50 s-pb-50 container-px-0 gallery-fullwidth listings_section discount_Real Estates">-->
				<!--<div class="d-none d-lg-block divider-20"></div>-->
				<!--<div class="container">

							<div class="row listings_head">
								<div class="col-md-11 col-xl-12">
									<div class="text-lg-center">
                                    	<h6 class="title_head big">العقارات الأكثر تميزاً</h6>
									</div>
								</div>
							</div>

                            <?php
      $this->db->select('restaurants.*');
	  $this->db->from('restaurants');
	  $this->db->where('find_in_set(2, status) <> 0');
	  $this->db->limit(15); 
	$query = $this->db->get();
	$restaurants=$query->result_array();
    //$restaurants = $this->admin_model->get_discount_res();
?>
							<div class="row listings ">
								<div class="col-12">
								<div class="listings_slider owl-carousel">
							<?php if (isset($restaurants)) {
										$cnt = 1; ?>
										<?php foreach ($restaurants as $listing) {
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
											<a href="javascript:sendRes(<?=$listing['res_id']?>);" class="add_to_fav  <?php if($like==1){echo 'added';}?>" id="<?=$listing['res_id']?>"><i class="fa fa-heart-o" ></i></a>
                                        <?php if ($listing['res_image'] != " ") { ?>
                                            <?php $image = explode('::::', $listing['res_image'])[0]; ?>
											<img src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" >
                                            <?php }?>
											--><!--<div class="media-links">
											</div>--><!--
											<input type="hidden" id="<?=$listing['res_id']?>like" value="<?=$like?>">

										</div>
										<div class="item-content">-->
											<!--<a class="tags small-text" href="<?php echo base_url('Real Estates/' . $listing['res_id']); ?>">--><!--
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
													متاح اكثر من عرض
												</div>
												<div class="rating_stars">
												<?php for($i=0; $i < $listing['res_ratings']; $i++){?>
														<span class="star">--><!--<img src="<?=base_url('website')?>/images/star.png">--><!--<i class="fa fa-star"></i></span>

														<?php }?>
												</div>
											</div>
											<div class="more">
												<a href="<?php echo base_url('Real Estates/' . $listing['res_id']); ?>" class="btn btn-light">
													<?php echo $this->lang->line('know_more') ?>
												</a>
											</div>-->
											<!--</a>--><!--
										</div>
									</div>

								</div>
							
								
							<?php }
                            }
                            ?>
                        </div>
	</div>
							</div>

							

				</div>
				--><!--<div class="d-none d-lg-block divider-105"></div>-->
			<!--</section>
			<div class="divider my-40"></div>-->