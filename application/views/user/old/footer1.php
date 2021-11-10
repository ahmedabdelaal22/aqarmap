<section class="newsletter">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-12 newsletter_pre"><p>اكتشف كل العروض عل موقعك الالكتروني اول باول</p></div>
			<div class="col-lg-6 col-md-12">
				<form class="newsletter_form">
					<input type="email" name="mail" placeholder="john@daleel.com" class="newsinput">
				<input class="btn btn-dark" type="submit" name="submit" value="<?php echo $this->lang->line('subscribe_now') ?>">						
				</form>
			</div>
		</div>
	</div>
</section>

<footer class="page_footer corner-footer ds s-pt-30 s-pb-0 s-pb-lg-10 s-pb-xl-50 c-gutter-60 s-parallax">
				<div class="divider-20 d-none d-xl-block"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-6 col-xs-6">
				<img class="footer_logo" src="<?=base_url('website')?>/images/logo/logo_v.png" alt="">
				<!--<p>	<?=appSettings('address_ar')?></p>
				<p><?=appSettings('phones')?></p>-->
				<!--<div class="widget widget_social_buttons">
				<a href="<?=appSettings('facebook')?>" class="fa fa-facebook color-icon" title="facebook" target="_blank"></a>
					<a href="<?=appSettings('twitter')?>" class="fa fa-twitter color-icon" title="twitter" target="_blank"></a>
					<a href="<?=appSettings('google')?>" class="fa fa-google color-icon" title="google" target="_blank"></a>
					<a href="<?=appSettings('pinterest')?>" class="fa fa-pinterest color-icon" title="pinterest" target="_blank"></a>
					
				</div>-->
				<!--<div class="widget widget_social_buttons">
			    	<a href="<?=base_url('terms')?>" class="fa fa-info  color-icon" title="terms" target="_blank"></a>
					<a href="<?=base_url('prives')?>" class="fa fa-info color-icon" title="prives" target="_blank"></a>
				</div>-->
			</div>
			<div class="col-md-2 col-sm-6 col-xs-6">
				<label>الاقسام الاكثر زيارة</label>
				<?php

$best_cat = $this->admin_model->get_best_categories();
?>
				<ul>
				<?php if(isset($best_cat)){ $cnt=1; ?>  
                    <?php foreach($best_cat as $row) { ?>
					<li><a href="<?=base_url('categories/').$row->id?>"><?=$row->c_name_a?></a></li>
					<?php }}?>
					<!-- <li><a href="#">المستشفيات</a></li>
					<li><a href="#">التعليم والمدارس</a></li>
					<li><a href="#">المعامل</a></li> -->
				</ul>
			</div>
			<div class="col-md-2 col-sm-6 col-xs-6">
				<label>معلومات</label>
				<ul>
					<?php
			$numbers	=explode(',',appSettings('emergency_numbers'));
	//		die($appSettings('emergency_numbers'));
			for($i=0;$i<count($numbers);$i++){
					?>
					<li><a href="tel:<?=$numbers[$i]?>"><?=$numbers[$i]?></a></li>
					<?php }?>
					<!-- <li><a href="#">654968</a></li>
					<li><a href="#">489749</a></li>
					<li><a href="#">0136546</a></li> -->
				</ul>
			</div>
			<div class="col-md-2 col-sm-6 col-xs-6">
				<label>معلومات</label>
				<?php

$keywords = $this->admin_model->get_best_keywords();
?>
				<ul class="tags">
				<?php if(isset($keywords)){ $cnt=1; ?>  
                    <?php foreach($keywords as $row) { ?>
					<li><a href="<?=base_url($row->link)?>"><?=$row->name?></a></li>
					<?php }}?>
					<!-- <li><a href="#">مطعم ابن حميدو</a></li>
					<li><a href="#">الحي العاشر</a></li>
					<li><a href="#">معرض الليثي</a></li> -->
				</ul>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-6">
				<label>حمل التطبيق الان</label>
				<div class="app_Real Estates_icons">
					<a href="#"><img class="img-responsive" src="<?=base_url('website')?>/images/appReal Estates.png"></a>
					<a href="#"><img class="img-responsive" src="<?=base_url('website')?>/images/googleplay.png"></a>
				</div>
			</div>
		</div>
	</div>
</footer>


<section class="page_copyright light-copy cs s-py-20 s-py-lg-5 s-parallax copyright">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 text-right">
				<p>All Rights Reserved</p>
			</div>
			<div class="col-md-6 text-left">
				<a href="https://queentechsolutions.net">Powered by Queentechsolutions.net</a>
			</div>
		</div>
	</div>
</section>


	<script src="<?=base_url('website')?>/js/compressed.js"></script>

	<script src="<?=base_url('website')?>/js/owl.carousel.min.js"></script>

	<script src="<?=base_url('website')?>/js/main.js"></script>
  </div>
		<!-- eof #box_wrapper -->
	</div>
</body>

</html>