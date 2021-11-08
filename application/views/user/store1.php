<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="<?=base_url('assets/rate')?>/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets/rate')?>/themes/krajee-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?=base_url('assets/rate')?>/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <!--suppress JSUnresolvedLibraryURL -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="<?=base_url('assets/rate')?>/js/star-rating.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/rate')?>/themes/krajee-fas/theme.js" type="text/javascript"></script>
<?php
	$images = explode('::::', $res->res_image);
?>
<section class="page_slider main_slider Real Estates_top">
  <div class="flexslider" data-nav="true" data-dots="false">
    <ul class="slides">
      <?php if(isset($images )){
			$cnt=0;
			?>
      <?php foreach($images as $key => $image) { ?>
      <li class="ds text-center slide<?=$cnt?>">
        <img src="<?php echo base_url('uploads/').$image?>" alt="">
        <div class="container">
          <div class="row">
            <div class="col-12 itro_slider">
              <div class="intro_layers_wrapper">
                <div class="intro_layers">
                  \
                </div>
                <!-- eof .intro_layers -->
              </div>
              <!-- eof .intro_layers_wrapper -->
            </div>
            <!-- eof .col-* -->
          </div>
          <!-- eof .row -->
        </div>
        <!-- eof .container -->
      </li>
      <?php $cnt++; }}?>

    </ul>
  </div>
  <!-- eof flexslider -->
  <!--<div class="flexslider-bottom d-none d-xl-block">
    <a href="#" class="mouse-button animated floating"></a>
  </div>-->
</section>
<!--Section: Block Content-->
<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="divider my-40"></div>
        <h6 class="section_title">
          عن المتجر
        </h6>
        <div class="divider my-40"></div>
    </div>
  <div class="row">
    <div class="col-md-9">
      <div class="Real Estates_main_info">
        <div class="Real Estates_icon">
          <img class="img-responsive" src="<?php echo base_url('uploads/')?><?=$res->logo?>"> 
        </div>
        <div class="Real Estates_main_info_content">
          <h6 class="Real Estates_title"><?=$res->res_name?></h6>
          <p class="Real Estates_desc" ><?=$res->res_desc?></p>      
        </div>
      </div>
      <!--<div class="table-responsive">
        <table class="table table-sm table-borderless mb-0">
          <tbody>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Address</strong></th>
              <td><?=$res->res_address?></td>
            </tr>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>phone</strong></th>
              <td><?=$res->res_phone?></td>
            </tr>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Website</strong></th>
              <td><?=$res->res_website?></td>
            </tr>
          </tbody>
        </table>
      </div>-->
    </div>

    <div class="col-md-3">
      <div class="social_info">
        <h6 class="Real Estates_title">تواصل معنا</h6>
        <div class="social_icons">
          <a class="whatsapp" href="#"><span class="fa fa-whatsapp"></span></a>
          <a class="instagram" href="#"><span class="fa fa-instagram"></span></a>
          <a class="facebook" href="#"><span class="fa fa-facebook"></span></a>
        </div>
      </div>

      <!--<div id="googleMap" style="width:100%;height:400px;"></div>-->

      <!--<script>
        function myMap() {
          const myLatLng = { lat: <?=$res->lat?>, lng: <?=$res->lon?>};
          const map = new google.maps.Map(document.getElementById("googleMap"), {
            zoom: 4,
            center: myLatLng,
          });

          new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello World!",
          });
        }
      </script>-->

      <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnr98Qv1lOJJ2n3hvqxuoc55HN7VM5aH8&callback=myMap">
      </script>-->


    </div>
  </div>

</section>
<!--Section: Block Content-->

<!-- Classic tabs -->
<div class="classic-tabs border rounded px-4 pt-1">

  <ul class="nav tabs-primary nav-justified" id="advancedTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active show" id="description-tab" data-toggle="tab" href="#description" role="tab"
        aria-controls="share" aria-selected="true">opening house</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info"
        aria-selected="false">Information</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
        aria-selected="false">Reviews (
          <?php
  
  $revies=  $this->front_model->get_rev_by_id_res_count($res->res_id);
  echo $revies;

?>
        )</a>
    </li>
  </ul>
  <div class="tab-content" id="advancedTabContent">
    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
      <p>
        <?php echo $res->mfo?>
      </p>

      <h5> share page</h5>
      <!-- AddToAny BEGIN -->
      <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
        <a class="a2a_button_facebook"></a>
        <a class="a2a_button_twitter"></a>
        <a class="a2a_button_email"></a>
        <a class="a2a_button_whatsapp"></a>
        <a class="a2a_button_linkedin"></a>
        <a class="a2a_button_pinterest"></a>
        <a class="a2a_button_telegram"></a>
      </div>
      <script async src="https://static.addtoany.com/menu/page.js"></script>
      <!-- AddToAny END -->

      <input type="hidden" id="userlogin" value="<?=$this->session->userdata('UserId')?>">
      <input type="hidden" id="resturant" value="<?=$res->res_id?>">
      <input type="hidden" id="like" value="<?=$like?>">

    </div>
    <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
      <h5>Additional Information</h5>
      <table class="table table-striped table-bordered mt-3">
        <thead>
          <tr>
            <th scope="row" class="w-150 dark-grey-text h6">facebook</th>
            <td><em><?=$res->facebook?></em></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" class="w-150 dark-grey-text h6">twitter</th>
            <td><em><?=$res->twitter?></em></td>
          </tr>
          <tr>
            <th scope="row" class="w-150 dark-grey-text h6">google</th>
            <td><em><?=$res->google?></em></td>
          </tr>
          <tr>
            <th scope="row" class="w-150 dark-grey-text h6">pinterest</th>
            <td><em><?=$res->pinterest?></em></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
      <h5><span><?php  echo $revies;?></span> review for <span>Fantasy T-shirt</span></h5>

      <?php 
	 		$query = $this->db->query("SELECT A.* FROM reviews A WHERE A.rev_res = '$res->res_id' ORDER BY A.rev_id DESC");
			 $reviews = $query->result(); 
	 
	 ?>
      <?php foreach($reviews as $row){ ?>
      <div class="media mt-3 mb-4" id="allreviews">
        <?php if(!empty($row->profile_pic)){?>
        <img class="d-flex mr-3 z-depth-1" src="<?php echo base_url('uploads/').$row->profile_pic?>" width="62"
          alt="Generic placeholder image">
        <?php }else{?>
        <img class="d-flex mr-3 z-depth-1" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" width="62"
          alt="Generic placeholder image">

        <?php }?>
        <div class="media-body">
          <div class="d-sm-flex justify-content-between">
            <p class="mt-1 mb-2">
            <input id="input-21b1" value="<?=$row->rev_stars?>" disabled type="text" class="rating" data-theme="krajee-fas" data-min=0 data-max=5 data-step=0.2 data-size="lg"
               required title="">

              <strong><?=$row->username?> </strong>
              <span> – </span><span>
                <?php
echo date('m/d/Y H:i:s', $row->rev_date);
?>


  <div class="divider my-60"></div>
  <div class="row">
    <div class="col-md-9">
      <div class="Real Estates_reviews">
        <h6 class="Real Estates_title">التقييمات 
          <span class="rating">
              <i class="far fa-star-o"></i>
              <span class="rating_valu">3.8</span>
            </span>
        </h6>
        <div class="reviews_carousel owl-carousel">
          <div class="review_item">
            <h6 class="Real Estates_title review_item_title">الاء محمد 
              <span class="rating">
                  <i class="far fa-star-o"></i>
                  <span class="rating_valu">4.2</span>
              </span>
            </h6>
            <p class="review_item_desc">
              لوريم ايبسوم lorem
            </p>
          </div>
          <div class="review_item">
            <h6 class="Real Estates_title review_item_title">سامي احمد 
              <span class="rating">
                  <i class="far fa-star-o"></i>
                  <span class="rating_valu">4.8</span>
              </span>
            </h6>
            <p class="review_item_desc">
              لوريم ايبسوم lorem
            </p>
          </div>
          <p class="mb-0"><?=$row->rev_text?></p>
        </div>
      </div>
      <hr>
      <?php } ?>
      <h5 class="mt-4">Add a review </h5>
     
      <div class="my-3">

      </div>
      <div>
      <input id="input-21b" value="4" type="text" class="rating" data-theme="krajee-fas" data-min=0 data-max=5 data-step=0.2 data-size="lg"
               required title="">
        <div class="clearfix"></div>
        <hr>

        <!-- Your review -->
        <div class="md-form md-outline">
          <textarea id="form76" class="md-textarea form-control pr-6" rows="4"></textarea>
          <label for="form76">Your review</label>
        </div>
        <!-- Name -->
  
        <div class="text-right pb-2">
          <button type="button"id="addreview" class="btn btn-primary">Add a review</button>

        </div>
        <h6 class="Real Estates_title review_item_title">اكتب تعليقا</h6>
      </div>      
    </div>
    <div class="col-md-3">
      <div class="address">
        <h6 class="Real Estates_title">العنوان</h6>
        <p class="address_text"><span class="fa fa-map-marker"></span> المنطقه الاولي، ٥ شارع نبيل وقاد العاشر من رمضان</p>
        <a class="btn btn-primary btn-block">الاتجاهات</a>
      </div>      
    </div>
  </div>
    <div class="row justify-content-center">
      <div class="divider my-40"></div>
        <h6 class="section_title">
          افضل العروض
        </h6>
        <div class="divider my-40"></div>
        <div class="site_offers">
          <?php $this->load->view('user/banners');?>
        </div>
    </div>
  </div>

</div>



<script type="text/javascript">
  $(document).ready(function () {
    $("#addreview").click(function (e) {
   e.preventDefault();
      var ratings = $("#input-21b").val();
      var user_id = $("#userlogin").val();
      var res_id = $("#resturant").val();
      var text = $("#form76").val();

      if (user_id) {
        $.ajax({
          url: "<?=base_url('give_review')?>",
          type: 'POST',
          data: {
            user_id: user_id,
            res_id: res_id,
            ratings: ratings,
            text: text
          },
          success: function (data) {
            console.log(data);
            // console.log(data.status);
            if (data.status == true) {
              var now = new Date(Date.now());
var formatted = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
            //   $( "#allreviews" ).append('<hr><div class="media mt-3 mb-4">'
            // +'<img class="d-flex mr-3 z-depth-1" src="<?php echo base_url('uploads/').$this->session->userdata('aimg')?>" width="62" alt="Generic placeholder image">'
            // +'<input id="input-21b1" value="'+ratings+'" disabled type="text" class="rating" data-theme="krajee-fas" data-min=0 data-max=5 data-step=0.2 data-size="lg"required title="">'
            // +' <div class="media-body">'
            // +'     <div class="d-sm-flex justify-content-between">'
            // +'  <p class="mt-1 mb-2">'
            // +'<div class="rating-container theme-krajee-fas rating-lg rating-animate rating-disabled">'

            // +'  <strong><?=$this->session->userdata('aname')?> </strong>'
            // +' <span> – </span><span>'
            // +''+formatted+''
            // +'  </span>'
            // +' </p>'

            // +'   </div>'
            // +' <p class="mb-0">'+text+'</p>'
            // +' </div>'
            // +'  </div>  <hr>');
              alert(data.message);
              location.reload();
              // style="color:red" id="favorite"

            } else {
              alert(data.message);
              //		printErrorMsg(data.message);
            }
          }
        });
      } else {
        alert("please login");
      }


});
    $("#favorite").click(function (e) {

      e.preventDefault();

      var user_id = $("#userlogin").val();
      var res_id = $("#resturant").val();
      var like = $("#like").val();

      if (user_id) {
  
        if(like==1){
          $(this).css('color', '');
          var url="<?=base_url('unlikeRes')?>";
          $("#like").val("0");
   
        }else{
          $(this).css('color', 'red');
          var url="<?=base_url('likeRes')?>";
          $("#like").val("1");
        
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
              $(this).css('color', 'red');
              alert(data.message);
              // style="color:red" id="favorite"

            } else {
              alert(data.message);
              //		printErrorMsg(data.message);
            }
          }
        });
      } else {
        alert("please login");
      }


    

    });
    
  

  });
</script>

</section>
