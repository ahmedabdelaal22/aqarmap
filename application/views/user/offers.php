<section class="offers">
	<div class="container">
		<div class="row justify-content-center ">
            <h6 class="section_title">
                العروض
            </h6>
		</div>

    <?php
	 $offers = $this->db->query("SELECT * FROM restaurants WHERE approved = '1' AND discount > 0   ORDER BY res_ratings DESC LIMIT 0, 15")->result_array();

//   $offers = $this->admin_model->get_all_offers();
  
?>
		<div class="justify-content-center listing_grid row">
    <?php if(isset($offers)){ $cnt=1; ?>  
         <?php foreach($offers as $listing) {
             
             $like=  $this->front_model->likeCheckfront(@$_COOKIE['user_id_cookie'], $listing['res_id']);

             ?>
			<div class="listing_item col-lg-4 col-md-6 col-sm-6">
            <a href="javascript:sendRes(<?=$listing['res_id']?>);" class="add_to_fav  <?php if($like==1){echo 'added';}?>" id="<?=$listing['res_id']?>"><i class="fa fa-heart-o" ></i></a>
                        <a href="<?php echo base_url('Real Estates/').$listing['res_id']?>" class="bg-gradient shadow-hover line-draw-animation w-100 h-100 text-light d-inline-block text-primary-hover">
                                        <div class="img_holder">
                                        <?php if($listing['discount'] >0 ){?>
                                            <div class="disq_box">
                                                <span class="disq"><?=$listing['discount']?>%</span>
                                                <span class="symbol">OFF</span>
                                            </div>
                                            <?php } ?>
                                            <?php if ($listing['res_image'] != " ") { ?>
                                            <?php $image = explode('::::', $listing['res_image'])[0]; ?>
											<img src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" >
                                            <?php } ?>                                                              
                            </div>
                            <div class="item-content">
                                <div class="content_holder">
                                    <span class="colores_imagered">
                                       <?php echo $listing['res_name']; ?>
                                    </span>
                                    <input type="hidden" id="<?=$listing['res_id']?>like" value="<?=$like?>">

                                    <?php
                                    /*$str = $row['res_desc'];
                                    if (strlen($row['res_desc']) > 15) {
                                        $str = explode("\n", wordwrap($row['res_desc'], 15));
                                        $str = $str[0] . '...';
                                    }*/
                                    ?>
                                    <!--<span class="desc"><?php echo $str; ?></span>-->
                                    <span class="rating">
                                        <i class="far fa-star-o"></i>
                                        <span class="rating_valu"><?=$listing['res_ratings']?></span>
                                    </span>
                                </div>
                            </div>
                        </a>


                    <!--<div class="ribbon ribbon-top-right"><span><?=$row->dicount?>% OFF</span></div>-->
                    <!--<div class="bbb_deals_title">Today's Best Offer</div>-->
                    <!--<div class="bbb_deals_slider_container">
                        bbb_deals Item 
						<a  
				href="<?php echo base_url('Real Estates/').$row->restaurant_id?>">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image"><img src="<?php echo base_url('uploads/').$row->image?>" alt=""></div>
                            <div class="bbb_deals_content">
                           
                                <div class="available">
                                    <div class="available_line d-flex flex-row justify-content-start">
                                     
                                        <div class="sold_title ml-auto"><?php echo $row->res_name; ?> </div>
                                    </div>
                                    <div class="available_bar"><span style="width:17%"></span></div>
                                </div>
                            </div>
                        </div>
						</a>
                    </div>-->
         </div> 
        <?php } ?> 
		

        <?php } ?>
		</div> <!-- Row End -->

	</div>
</section>