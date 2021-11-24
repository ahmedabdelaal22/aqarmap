<!--=================================
footer-->
<footer class="footer bg-dark space-pt">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="footer-contact-info">
          <h5 class="text-primary mb-4"><?php echo $this->lang->line('about_us') ?></h5>
          <p class="text-white mb-4"><?php echo $this->lang->line('footer_about') ?></p>
          <ul class="list-unstyled mb-0">
            <li> <b> <i class="fas fa-map-marker-alt"></i></b><span>
            <?php if($this->session->userdata('site_lang') == 'english'){?>
              <?=appSettings('address_en')?>

<?php }else{?>
  <?=appSettings('address_ar')?>

<?php }?>
            
            </span> </li>
            <li> <b><i class="fas fa-microphone-alt"></i></b><span><?=appSettings('phones')?></span> </li>
            <li> <b><i class="fas fa-headset"></i></b><span><?=appSettings('email')?></span> </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
        <div class="footer-link">
          <h5 class="text-primary mb-4"><?php echo $this->lang->line('useful_links') ?></h5>
          <ul class="list-unstyled mb-0">

          <?php foreach (payment_method() as $key => $value) : ?>
            <li> <a href="<?php echo base_url('search?payment_method=').$key?>"><?php echo $value ?> </a> </li>
					<?php endforeach; ?>
      
          </ul>
          <ul class="list-unstyled mb-0">
              <?php foreach (get_vendore_type() as $key => $value) : ?>
              <li> <a href="<?php echo base_url('agents?type=').$key?>"><?php echo $value ?> </a> </li>
			    		<?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
        <div class="footer-recent-List">
          <h5 class="text-primary mb-4"><?php echo $this->lang->line('recently_listed_properties') ?></h5>
          <ul class="list-unstyled mb-0">

          <?php      $fotter_restaurants = $this->db->query("SELECT * FROM restaurants WHERE approved = '1'   ORDER BY res_id DESC LIMIT 0, 2")->result_array();?>
          <?php if (isset($fotter_restaurants)) {
                  $cnt = 1; ?>
                  <?php foreach ($fotter_restaurants as $listing) {
      

                      ?>

<?php $image = explode('::::', $listing['res_image'])[0]; ?>
            <li>
              <div class="footer-recent-list-item">
                <img class="img-fluid" src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" alt="">
                <div class="footer-recent-list-item-info">
                  <h6 class="text-white"><a class="category font-md mb-2" href="<?php echo base_url('store/' . $listing['res_id']); ?>">
                  <?php if($this->session->userdata('site_lang') == 'english'){?>

<?=$listing['res_name']?>
<?php }else{?>
  <?=$listing['res_name_a']?>
<?php }?>
                
                
                </a></h6>
                  <a class="address mb-2 font-sm" href="<?php echo base_url('store/' . $listing['res_id']); ?>">
                  
                  <?php if($this->session->userdata('site_lang') == 'english'){?>
                            <?=$listing['res_address']?> 
              <?php }else{?>
                <?=$listing['res_address']?> 
            <?php }?>
                
                
                </a>
                  <span class="price text-white">$3,456,235 </span>
                </div>
              </div>
            </li>
            <?php }} ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
        <h5 class="text-primary mb-4"><?php echo $this->lang->line('subscribe_with_us') ?></h5>
        <div class="footer-subscribe">
          <p class="text-white"><?php echo $this->lang->line('newsletter_text') ?></p>
          <form>
            <div class="mb-3">
              <input type="email"  name="mail" id="contact_mail" class="form-control" placeholder="<?php echo $this->lang->line('email') ?>">
            </div>
            <button type="submit" onclick="subscriebe_mail()" class="btn btn-primary btn-sm"><?php echo $this->lang->line('newsletter_button') ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4 text-center text-md-start">
          <a href="index.html"><img class="img-fluid footer-logo" src="<?=base_url('website')?>/images/logo/logo_v.png" alt=""> </a>
        </div>
        <div class="col-md-4 text-center my-3 mt-md-0 mb-md-0">
          <a id="back-to-top" class="back-to-top" href="#"><i class="fas fa-angle-double-up"></i> </a>
        </div>
        <div class="col-md-4 text-center text-md-end">
          <p class="mb-0 text-white"> &copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="https://www.queentechsolutions.net/"> Queen Tech Solutions </a> All Rights Reserved </p>
        </div>
      </div>
    </div>
  </div>
</footer>
<input type="hidden" id="userlogin" value="<?=$this->session->userdata('UserId')?>">


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

  <!-- JS Global Compulsory (Do not remove)-->
  <script src="<?=base_url('website')?>/js/jquery-3.6.0.min.js"></script>
  <script src="<?=base_url('website')?>/js/popper/popper.min.js"></script>
  <script src="<?=base_url('website')?>/js/bootstrap/bootstrap.min.js"></script>

  <script src="<?=base_url('website')?>/js/datetimepicker/moment.min.js"></script>
  <script src="<?=base_url('website')?>/js/datetimepicker/datetimepicker.min.js"></script>

  <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
  <script src="<?=base_url('website')?>/js/jquery.appear.js"></script>
  <script src="<?=base_url('website')?>/js/counter/jquery.countTo.js"></script>
  <script src="<?=base_url('website')?>/js/select2/select2.full.js"></script>
  <script src="<?=base_url('website')?>/js/range-slider/ion.rangeSlider.min.js"></script>
  <script src="<?=base_url('website')?>/js/owl-carousel/owl.carousel.min.js"></script>
  <script src="<?=base_url('website')?>/js/jarallax/jarallax.min.js"></script>
  <script src="<?=base_url('website')?>/js/jarallax/jarallax-video.min.js"></script>
  <script src="<?=base_url('website')?>/js/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Template Scripts (Do not remove)-->
  <script src="<?=base_url('website')?>/js/custom.js"></script>
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
  var user_id = $("#userlogin").val();

if(user_id){



var like = $("#test"+res_id+"like").val();
	if(like==1){
     var url="<?=base_url('unlikeRes')?>";
         
		  $("#test"+res_id+"like").val("0");
		  
		  $( "#test"+res_id+"").removeClass( "text-danger" );
		
   
        }else{
        
          var url="<?=base_url('likeRes')?>";
		      $( "#test"+res_id+"").addClass( "text-danger" );
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
      }else{
        alert("please login");
      }
}
function sendRes(res_id){
  var user_id = $("#userlogin").val();
if(user_id){


var like = $("#"+res_id+"like").val();
	if(like==1){
          var url="<?=base_url('unlikeRes')?>";
         
		  $("#"+res_id+"like").val("0");
		  
		  $( "#"+res_id+"").removeClass( "text-danger" );
		
   
        }else{
        
          var url="<?=base_url('likeRes')?>";
		  $( "#"+res_id+"").addClass( "text-danger" );
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

      }else{
        alert("please login");
      }
     }

     $("#addreview").click(function (e) {
   e.preventDefault();

        alert("please login");
      
});
</script>

</body>

</html>