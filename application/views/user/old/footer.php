<section class="newsletter">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-12 newsletter_pre"><p>اكتشف كل العروض عل موقعك الالكتروني اول باول</p></div>
			<div class="col-lg-6 col-md-12">
				<form class="newsletter_form">
					<input type="email" name="mail" id="contact_mail"
					placeholder="john@daleel.com" class="newsinput">
				<input class="btn btn-dark" type="submit" name="submit" value="اشترك الان" onclick="subscriebe_mail()">						
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
				<label>دليل العاشر</label>
				<ul>
					<li><a href="<?=base_url('/about')?>">دليل العاشر من رمضان</a></li>
					<li><a href="<?=base_url('/about')?>">عن العاشر من رمضان</a></li>
					<li><a href="#" data-toggle="modal" data-target="#regionModal">أحياء العاشر من رمضان</a></li>
					<li><a href="#" data-toggle="modal" data-target="#emergencyModal">أرقام الطوارئ</a></li>
	
				
				</ul>
			</div>
			<div class="col-md-2 col-sm-6 col-xs-6">
				<label>معلومات</label>
				<ul>
					<li><a href="#" data-toggle="modal" data-target="#exampleModal">اضف مشروعك</a></li>
					<li><a href="<?=base_url('/about')?>"><?php echo $this->lang->line('about_us') ?></a></li>
					<li><a href="<?=base_url('/contact')?>"><?php echo $this->lang->line('contact_us') ?></a></li>
				</ul>
				<?php

$keywords = $this->admin_model->get_best_keywords();
?>
				<!--<ul class="tags">
				<?php if(isset($keywords)){ $cnt=1; ?>  
                    <?php foreach($keywords as $row) { ?>
					<li><a href="<?=base_url($row->link)?>"><?=$row->name?></a></li>
					<?php }}?>-->
					<!-- <li><a href="#">مطعم ابن حميدو</a></li>
					<li><a href="#">الحي العاشر</a></li>
					<li><a href="#">معرض الليثي</a></li> 
				</ul>-->
			</div>
			<div class="col-md-4 col-sm-6 col-xs-6">
				<label>حمل التطبيق الان</label>
				<div class="app_Real Estates_icons">
					<a target="_blank" href="<?=appSettings('appReal Estates')?>"><img class="img-responsive" src="<?=base_url('website')?>/images/appReal Estates.png"></a>
					<a target="_blank" href="<?=appSettings('googleplay')?>"><img class="img-responsive" src="<?=base_url('website')?>/images/googleplay.png"></a>
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


<!-- Modal -->
	<?php 
				$regions = $this->admin_model->get_all_regions();
			 ?>
<div class="modal hide fade add_project_modal" id="regionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row">
        	<div class="col-sm-12">
  	        	<h5 class="modal-title" id="exampleModalLabel">أحياء العاشر من رمضان</h5>
        		<!--<span class="sub-title">يمكنك الان مشاركه مشروعك معنا</span>-->	
        	</div>
        </div>
      </div>
      <div class="divider-10"></div>
      <div class="modal-body">
      	<ul>
      <?php	foreach ($regions as $row) {?>
  <li value="<?php echo $row->id; ?>"><a href="<?=base_url('/search?region_id=region,').$row->id?>"><?php echo $row->name_ar; ?></a></li>
   	<?php } ?>
      	</ul>
      </div>
    </div>
  </div>
</div>

<div class="modal hide fade add_project_modal" id="emergencyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row">
        	<div class="col-sm-12">
  	        	<h5 class="modal-title" id="exampleModalLabel">أرقام الطوارئ</h5>
        		<!--<span class="sub-title">يمكنك الان مشاركه مشروعك معنا</span>-->	
        	</div>
        </div>
      </div>
      <div class="divider-10"></div>
      <div class="modal-body">
      	<ul>

             <?php	
	             	$numbers	=explode(',',appSettings('emergency_numbers'));
		        for($i=0;$i<count($numbers);$i++){ ?>
                  <li ><a href="tel:<?=$numbers[$i]?>"><?=$numbers[$i]?></a></li>
   	        <?php } ?>
      	</ul>
      </div>
    </div>
  </div>
</div>
	<script src="<?=base_url('website')?>/js/compressed.js"></script>

	<script src="<?=base_url('website')?>/js/owl.carousel.min.js"></script>

	<script src="<?=base_url('website')?>/js/main.js"></script>
  </div>
		<!-- eof #box_wrapper -->
	</div>



<script type="text/javascript">

const setCookie = (name, value, days = 1000, path = '/') => {
  const expires = new Date(Date.now() + days * 864e5).toUTCString()
  document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=' + path
}
const getCookie = (name) => {
  return document.cookie.split('; ').reduce((r, v) => {
    const parts = v.split('=')
    return parts[0] === name ? decodeURIComponent(parts[1]) : r
  }, '')
}

function subscriebe_mail(){

	var email = $("#contact_mail").val();
 
        $.ajax({
          url: "<?=base_url('subscriebe_mail')?>",
          type: 'POST',
          data: {
            email: email
          },
          success: function (data) {
            console.log(data);
            // console.log(data.status);
            if (data.status == true) {


              alert(data.message);
             // location.reload();
            

            } else {
              alert(data.message);
           //		printErrorMsg(data.message);
            }
          }
        });
      
}
function myshowmodel(id,name){

   $("#namerate").text(name);

   let text=$("#revie"+id).val();
      $("#ratetext").text(text);
	$('#ratingModal').modal('toggle');

//	$('#ratingModal').trigger('focus');
}
function sendRestest(res_id){
	var user_id=getCookie('user_id_cookie');
if(user_id==''){

let generate=	 Math.floor(Math.random() * 26) + Date.now();
	setCookie('user_id_cookie',generate);
	user_id=getCookie('user_id_cookie');

}
var like = $("#test"+res_id+"like").val();
	if(like==1){
          var url="<?=base_url('unlikeRes')?>";
         
		  $("#test"+res_id+"like").val("0");
		  
		  $( "#test"+res_id+"").removeClass( "added" );
		
   
        }else{
        
          var url="<?=base_url('likeRes')?>";
		  $( "#test"+res_id+"").addClass( "added" );
		  $("#test"+res_id+"like").val("1");
        
        }

        $.ajax({
          url: url,
          type: 'POST',
          data: {
            user_id: user_id,
            res_id: res_id
          },
          success: function (data) {
            console.log(data);
            // console.log(data.status);
            if (data.status == true) {
     
              alert(data.message);
              // style="color:red" id="favorite"

            } else {
              alert(data.message);
              //		printErrorMsg(data.message);
            }
          }
        });
}
function sendRes(res_id){
	var user_id=getCookie('user_id_cookie');
if(user_id==''){

let generate=	 Math.floor(Math.random() * 26) + Date.now();
	setCookie('user_id_cookie',generate);
	user_id=getCookie('user_id_cookie');

}
var like = $("#"+res_id+"like").val();
	if(like==1){
          var url="<?=base_url('unlikeRes')?>";
         
		  $("#"+res_id+"like").val("0");
		  
		  $( "#"+res_id+"").removeClass( "added" );
		
   
        }else{
        
          var url="<?=base_url('likeRes')?>";
		  $( "#"+res_id+"").addClass( "added" );
		  $("#"+res_id+"like").val("1");
        
        }

        $.ajax({
          url: url,
          type: 'POST',
          data: {
            user_id: user_id,
            res_id: res_id
          },
          success: function (data) {
            console.log(data);
            // console.log(data.status);
            if (data.status == true) {
     
              alert(data.message);
              // style="color:red" id="favorite"

            } else {
              alert(data.message);
              //		printErrorMsg(data.message);
            }
          }
        });
     }

    
  

 
</script>

</body>

</html>