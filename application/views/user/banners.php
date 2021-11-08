
<?php
// $id = $this->uri->segment(3);
// $id = $this->session->userdata('aid');
$offers = $this->admin_model->get_all_offers();
?>

<section class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12 itro_slider">
                    <div class="flexslider" data-nav="true" data-dots="false">
        <ul class="slides">
        <?php if(isset($offers)){ $cnt=1; ?>  
      <?php foreach($offers as $row) { 
  
        ?>
            <li class="ds text-center slide<?=$cnt?>">
                <img src="<?php echo base_url('uploads/').$row->image?>" alt="">
                    <div class="slide_content">
                        <div class="layer_name">
                            <span class="bc"><?php echo $row->res_name; ?></span>
                        </div>
                        <div class="discount">
                            <div class="discount_rate">
                                <span class="predisc wc">خصم</span>
                                <span class="disc bc"><?=$row->dicount?></span>
                                <span class="percentage wc">%</span>
                            </div>
                            <div class="discount_category"></div>
                            <!-- Static Layer --> 
                        </div>
                        <div class="slide_button">

                            <a class="btn btn-light" href="<?php echo base_url('Real Estates/').$row->restaurant_id?>">المزيد</a>

                            <!-- Static Layer button --> 
                        </div>
                    <!-- eof .intro_layers -->
                    </div>
                <!-- eof .container -->
            </li>
          <?php $cnt++; }}?>

        </ul>
    </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 banners">
            <?php
// $id = $this->uri->segment(3);
// $id = $this->session->userdata('aid');
$banners = $this->admin_model->get_all_bannerlimit();
?>
   <?php if(isset($banners)){ $cnt=1; ?>  
      <?php foreach($banners as $row) { ?>
                <div class="banner banner<?=$cnt?>">
                    <img src="<?php echo base_url('uploads/').$row->image?>">
                    <div class="slide_content">
                    <div class="layer_name">
                        <!-- <span>Tie Shop</span> -->
                    </div>
                        <div class="discount">
                            <div class="discount_rate">
                            <?php echo $row->banners_name?>
                        
                            </div>
                            <div class="discount_category"></div>
                            <!-- Static Layer --> 
                        </div>
                    <div>
                        <!-- Static Layer button --> 
                    </div>
                <!-- eof .intro_layers -->
                    </div>
                </div>
                <?php $cnt++; }}?>
       
            </div>
        </div>
    </div>
</section>

  <!--<section class="page_slider main_slider">
    <div class="flexslider-bottom d-none d-xl-block">
        <a href="#" class="mouse-button animated floating"></a>
    </div>
</section>-->

<div class="divider my-60"></div>

