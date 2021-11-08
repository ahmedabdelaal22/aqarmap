<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<?php $locale=$this->session->userdata('locale') ?>
<html dir="rtl" class="">
<!--<![endif]-->
<head>
	<?php //$locale=$this->session->userdata('locale');?>
<!-- <base href="/"> -->
	<title><?=appSettings('meta_title_'.$locale)?> </title>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="<?=appSettings('meta_description_'.$locale)?> ">
	<meta name="author" content="Queen Tech Solutions.">
	<meta name="keywords" content="<?=appSettings('meta_keywords_'.$locale)?> ">
	<?php if($locale == 'en'){?>
	<meta name="language" content="english" />  
        <?php }else{?>
	<meta name="language" content="arabic" />  
   <?php }?>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url('website')?>/images/logo/favicon.png" />
	<link rel="stylesheet" href="<?=base_url('website')?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url('website')?>/css/bootstrap.rtl.min.css">
	<link rel="stylesheet" href="<?=base_url('website')?>/css/animations.css">
	<link rel="stylesheet" href="<?=base_url('website')?>/css/font-awesome.css">

	<link rel="stylesheet" href="<?=base_url('website')?>/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?=base_url('website')?>/css/owl.theme.default.min.css">

	<link rel="stylesheet" type="text/css" href="<?=base_url('website')?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('website')?>/css/vip.css">
	<?php if($locale == 'ar'){?>
	<!--<link rel="stylesheet" type="text/css" href="<?=base_url('website')?>/css/main_ar.css">-->
	<!--<link rel="stylesheet" type="text/css" href="<?=base_url('website')?>/css/vip_ar.css">-->
	<?php } ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	
	<!-- <script src="js/vendor/modernizr-2.6.2.min.js"></script> -->

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<![endif]-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154640627-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-154640627-1');
  $(document).ready(function(){

	var user_id=getCookie('user_id_cookie');
if(user_id==''){

let generate=	 Math.floor(Math.random() * 26) + Date.now();
	setCookie('user_id_cookie',generate);
	user_id=getCookie('user_id_cookie');

}
  });
</script>

</head>