<?php
	$images = explode('::::', $res->res_image);
?>
<section class="page_slider main_slider Real Estates_top">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-12">
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
      </div>
    </div>
  </div>

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
        عن العقاره
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
            <p class="Real Estates_desc"><?=$res->res_desc?></p>
          </div>
        </div>
        <div class="table-container">
          <table class="listing-info table-info">
            <tbody>
              <tr>
                <td>الغرف</td>
                <td><?=$res->rooms?></td>
              </tr>
              <tr>
                <td>الحمامات</td>
                <td><?=$res->baths?></td>
              </tr>
              <tr>
                <td>الأدوار</td>
                <td><?=$res->floor?></td>
              </tr>
              <tr>
                <td>المساحات</td>
                <td><?=$res->space?> متر²</td>
              </tr>
              <tr>
                <td>سنة البناء / سنة التسليم</td>
                <td><?=$res->year_of_construction?></td>
              </tr>
              <tr>
                <td>نوع التشطيب</td>
                <td><?=$res->finishing_type?></td>
              </tr>
              <tr>
                <td>تطل على</td>
                <td><?=$res->overlooking?></td>
              </tr>
            </tbody>
          </table>
          <table id="demo" class="listing-info collapse listingMoreInfo">
            <tbody>
              <tr>
                <td>رقم الإعلان</td>
                <td>EG-<?=$res->res_id?></td>
              </tr>
              <tr>
                <td>تاريخ النشر</td>
                <td><?php 
                echo date('m/d/Y H:i:s', $res->res_create_date);
                ?></td>
              </tr>
              <tr>
                <td>السعر</td>
                <td><span class="integer"><?=$res->discount	?></span> جنيه
                </td>
              </tr>
         
              <tr>
                <td>نوع المعلن</td>
                <td><?=advertiser_type_value($res->advertiser_type)?></td>
              </tr>
              <tr>
                <td>طريقة الدفع</td>
                <td><?=payment_method_value($res->payment_method)?></td>
              </tr>
            </tbody>
          </table> <a id="showMore" type="button" data-toggle="collapse" data-target="#demo" data-seemore="اظهر المزيد"
            data-seeless="اخفى" class=" collapsed">اظهر المزيد</a>
        </div>
      </div>

      <div class="col-md-3">
        <div class="social_info">
          <h6 class="Real Estates_title">تواصل معنا</h6>
          <div class="social_icons">

            <a class="share" href="#" data-toggle="modal" data-target="#exampleModalShare"><span
                class="fa fa-share-alt"></span></a>
          </div>
        </div>




      </div>
    </div>
    <div class="divider my-60"></div>
    <div class="row">
      <div class="col-md-9">
        <div class="Real Estates_reviews">
          <h6 class="Real Estates_title">التقييمات
            <span class="rating">
              <!-- <i class="far fa-star-o"></i> -->#
              <span class="rating_valu">
                <?php
  
  $revies=  $this->front_model->get_rev_by_id_res_count($res->res_id);
  echo $revies;

?>
              </span>
            </span>
          </h6>

          <?php 
	 		$query = $this->db->query("SELECT A.* FROM reviews A WHERE A.rev_res = '$res->res_id' ORDER BY A.rev_id DESC");
			 $reviews = $query->result(); 
	 if(!empty($reviews)){
	 ?>
          <div class="reviews_carousel owl-carousel">
            <?php foreach($reviews as $row){ ?>
            <div class="review_item">
              <h6 class="Real Estates_title review_item_title"><?=$row->name?>
                <span class="rating">
                  <i class="far fa-star-o"></i>
                  <span class="rating_valu"><?=$row->rev_stars?></span>
                </span>
              </h6>
              <p class="review_item_desc">
                <input type="hidden" id="revie<?=$row->rev_id?>" value="<?=trim($row->rev_text)?>">

                <?php if(strlen($row->rev_text ) > 15){?>

                <?php
                  //  			$str = explode("\n", wordwrap($row->rev_text , 15));
                  $this->load->helper('text');
                       echo character_limiter($row->rev_text ,20);
                    ?>
                <button onclick="myshowmodel(<?=$row->rev_id?>,'<?=$row->name?>');" id='myBtn'>المزيد </button>

                <?php }else{?>
                <?=$row->rev_text?>
                <?php }?>

              </p>
            </div>
            <?php }?>

          </div>
          <?php } ?>
          <h6 class="Real Estates_title review_item_title">
            <a href="#" data-toggle="modal" data-target="#exampleModal2">اكتب تعليقا</a>
          </h6>

        </div>
      </div>
      <div class="col-md-3">
        <div class="address">
          <h6 class="Real Estates_title">العنوان</h6>
          <p class="address_text"><span class="fa fa-map-marker"></span> <?=$res->res_address?></p>
          <a class="btn btn-primary btn-block" target="_blank"
            href="https://www.google.com/maps/?q=<?=$res->lat?>,<?=$res->lon?>">الاتجاهات</a>
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
</section>

<!-- Modal -->



<div class="modal hide fade add_project_modal" id="ratingModal" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row">
          <div class="col-sm-12">
            <h5 class="modal-title" id="namerate"></h5>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <span class="sub-title" id="ratetext"></span>

      </div>
    </div>
  </div>
</div>
<div class="modal hide fade add_project_modal" id="exampleModal2" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row">
          <div class="col-sm-12">
            <h5 class="modal-title" id="exampleModalLabel">قم بتقييم العقاره</h5>
            <span class="sub-title">تقييمك للعقار ه سيساعدنا في تحسين اداء الخدمات المقدمه لك</span>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <form class="contact-form c-mb-20 text-center" id="rateform">
          <div class="row">
            <div class="col-sm-12">
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text"></label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text"></label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text"></label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text"></label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text"></label>
              </div>
            </div>
          </div>
          <div class="row mb-10">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="name">
                  <?php echo $this->lang->line('full_name_label') ?>
                  <span class="required">*</span>
                </label>
                <input type="text" aria-required="true" size="30" value="" name="name" id="namerate"
                  class="form-control" placeholder="<?php echo $this->lang->line('full_name') ?>">
              </div>
            </div>
          </div>
          <div class="row mb-10">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="brand"><?php echo $this->lang->line('review_label') ?>
                  <span class="required">*</span>
                </label>
                <textarea type="text" aria-required="true" size="30" value="" name="text" id="text" class="form-control"
                  placeholder="<?php echo $this->lang->line('review') ?>"></textarea>
              </div>
            </div>
          </div>
          <div class="row mt-30">
            <div class="col-sm-12">
              <div class="form-group text-center contact-form1">
                <button type="button" id="addreview" name="addreview" class="btn btn-primary btn-maincolor">
                  <?php echo $this->lang->line('submit') ?>
                </button>
                <button type="button" class="btn btn-secondary"
                  data-dismiss="modal"><?php echo $this->lang->line('cancel') ?></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="resturant" value="<?=$res->res_id?>">
<script type="text/javascript">
  $(document).ready(function () {
    $("#addreview").click(function (e) {
      e.preventDefault();
      var ratings = $('input[name=rate]:checked', '#rateform').val();
      var user_id = getCookie('user_id_cookie');
      if (user_id == '') {

        let generate = Math.floor(Math.random() * 26) + Date.now();
        setCookie('user_id_cookie', generate);
        user_id = getCookie('user_id_cookie');

      }

      var res_id = $("#resturant").val();
      var text = $("#text").val();
      var name = $("#namerate").val();

      if (user_id) {
        $.ajax({
          url: "<?=base_url('give_review')?>",
          type: 'POST',
          data: {
            user_id: user_id,
            res_id: res_id,
            ratings: ratings,
            name: name,
            text: text
          },
          success: function (data) {
            console.log(data);
            // console.log(data.status);
            if (data.status == true) {


              alert(data.message);
              location.reload();


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


<!-- Modal -->
<div class="modal hide fade social_share" id="exampleModalShare" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row">
          <div class="col-sm-12">
            <h5 class="modal-title" id="exampleModalLabel">مشاركة المتجر</h5>
            <span class="sub-title">يمكنك الان مشاركة المتجر علي السوشيال ميديا</span>
          </div>
        </div>
      </div>
      <div class="modal-body">
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
      </div>
    </div>
  </div>
</div>

<script async src="https://static.addtoany.com/menu/page.js"></script>