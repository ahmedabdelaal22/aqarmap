<div class=" ">
	<?php 
				$regions = $this->admin_model->get_all_regions();
			 ?>
	<header class="page_header ds">
		<div class="container">
			<div class="row align-items-center tophead">
				<div class="logo_con full_logo col-md-2">
					<a href="<?=base_url('/')?>" class="logo text-center">
						<img src="<?=base_url('website')?>/images/logo/logofinal.png" alt="">
					</a>
				</div>
				<?php $locale=$this->session->userdata('locale');?>
				<div class="logo_con logo_respo col-md-2">
					<a href="index.html" class="logo text-center">
						<img src="<?=base_url('website')?>/images/logo/logo_v.png" alt="">
					</a>
				</div>
				<div class="col-md-4 main_menu">

					<nav class="top-nav">
						<ul class="nav sf-menu">
							<li class=<?php if($this->uri->segment(1)==""){echo "active";}?>>
								<a href="<?=base_url('/')?>"><?php echo $this->lang->line('home') ?></a>
							</li>
							<li class=<?php if($this->uri->segment(1)=="categories-all"){echo "active";}?>>
								<a
									href="<?=base_url('/categories-all')?>"><?php echo $this->lang->line('categories') ?></a>
							</li>
							<li class=<?php if($this->uri->segment(1)=="offers"){echo "active";}?>>
								<a href="<?=base_url('/offers')?>"><?php echo $this->lang->line('offers') ?></a>
							</li>
							<li class=<?php if($this->uri->segment(1)=="about"){echo "active";}?>>
								<a href="<?=base_url('/about')?>"><?php echo $this->lang->line('about_us') ?></a>
							</li>
							<li class=<?php if($this->uri->segment(1)=="contact"){echo "active";}?>>
								<a href="<?=base_url('/contact')?>"><?php echo $this->lang->line('contact_us') ?></a>
							</li>
							<!--<li>
								<a href="<?=base_url('categories-all')?>">categories</a>
								<ul>
									<?php

                                    $category = $this->admin_model->get_all_category();
                                          ?>
									<?php if(isset($category)){ $cnt=1; ?>
									<?php foreach($category as $row) { ?>
									<li>
										<a href="<?php echo base_url('categories/').$row->id?>">
											<?php echo $row->c_name; ?> </a>
									</li>

									<?php }
                                                            }
                                                   ?>
								</ul>
							</li>-->
							<!-- blog -->

							<!-- gallery -->
							<!--<li>
								<?php 
							$userid=	$this->session->userdata('UserId');
							if(!empty($userid)){
								?>

								<a href="#"><?=$this->session->userdata('aname')?></a>
								<ul>
							        	<li>
								            <a href="<?=base_url('profile')?>">profile</a>
						             	</li>
										 <li>
								            <a href="<?=base_url('logout')?>">logout</a>
						             	</li>
								</ul>
						
								<?php } else{?>
									<a href="#">login</a>
									<ul>
							        	<li>
								            <a href="<?=base_url('login')?>">Login</a>
						             	</li>
										 <li>
								            <a href="<?=base_url('register')?>">Register</a>
						             	</li>
								</ul>

									<?php }?>
							</li>-->

							<!-- eof blog -->


							<!--<li>
								<a href="<?=base_url('contact')?>">Contacts</a>
								<ul>
							        	<li>
								            <a href="<?=base_url('contact')?>">Contacts</a>
						             	</li>
										 <li>
								            <a href="<?=base_url('subscribe')?>">Subscribe Resturant</a>
						             	</li>
								</ul>
							</li>
							<li>
								<a href="<?=base_url('/offers')?>">Offers</a>
							</li>-->
						</ul>
					</nav>

				</div>
				<div class="tophead_search_form col-md-6">
					<div class="container">
						<div class="row">

							<div class="add_project"><a class="btn btn-primary" href="#" data-toggle="modal"
									data-target="#exampleModal">اضف مشروعك</a></div>

							<form method="GET" name="searchaction" action="<?=base_url('/search')?>">
								<div class=" keyword"><input type="text" name="search"
										value="<?=$this->input->get('search')?>"
										placeholder="<?php echo $this->lang->line('key_search') ?>"
										class="search-text"><a href="#" class="icon"></a></div>
								<div class=" location">
									<select name="region_id" id="region_id" class="search-text form-control"
										data-dropup-auto="false" data-size="5">

										<option value="">ابحث عن الموقع</option>
											<?php
			                      $region_id=($this->input->post('region_id'))?$this->input->post('region_id'):$this->input->get('region_id');

		                                 foreach ($regions as $row) {?>
										 		<optgroup label="<?php echo $row->name_ar; ?>">
												 <option <?php if ('region,'.$row->id == $region_id) echo "selected='selected'"; ?> value="region,<?=$row->id?>">الكل</option>
												 <?php $locations = $this->admin_model->get_location_by_region($row->id); ?>
												 <?php foreach ($locations as $listing) : ?>
										         	<option value="<?php echo $listing['id']; ?>"<?php if ($listing['id'] == $region_id) echo "selected='selected'"; ?>>
										              	<?php echo $listing['name_ar']; ?>
									                	</option>
														<?php endforeach; ?>
												</optgroup>
											<?php } ?>
	
									</select>
									<a href="#" class="icon"></a></div>
							</form>

							<div class="tophead_icons text-left">
								<div class="notification" href="#">
									<a class="toggle" href="#"><img width="25" height="25"
											src="<?=base_url('website')?>/images/notification.png"></a>
									<ul class="fav_items">
										<?php 
				$notfications = $this->admin_model->get_last7_notfication();
			 ?>

										<?php	foreach ($notfications as $row) {?>
										<li class="fav_item">
											<a href="#">
												<div class="img"><img width="60" height="60"
														src="<?=base_url('website')?>/images/categories/1.jpg"></div>
												<div class="content">
													<h6><?=$row->title?></h6>
													<span><?=$row->message?></span>
												</div>
											</a>
										</li>
										<?php } ?>

									</ul>
								</div>
								<a class="favourite" href="<?=base_url('/favourite')?>"><img width="25" height="25"
										src="<?=base_url('website')?>/images/heart.png"></a>
							</div>

						</div>

					</div>
				</div>
				<span class="toggle_menu">
					<span></span>
				</span>
			</div>

		</div>
		<!-- header toggler -->

	</header>
</div>
<span class="toggle_menu_side header-slide">
	<span></span>
</span>

<!-- Modal -->
<div class="modal hide fade add_project_modal" id="exampleModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="row">
					<div class="col-sm-12">
						<h5 class="modal-title" id="exampleModalLabel">أضف مشروعك</h5>
						<span class="sub-title">يمكنك الان مشاركه مشروعك معنا</span>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<span id="errorspan"></span>
				<form class="contact-form c-mb-20 text-center" id="cform">
					<div class="row mb-10">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="name">
									<?php echo $this->lang->line('full_name_label') ?>
									<span class="required">*</span>
								</label>
								<input type="text" aria-required="true" size="30" value="" name="name" id="name"
									class="form-control" placeholder="<?php echo $this->lang->line('full_name') ?>">
							</div>
						</div>
					</div>
					<div class="row mb-10">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="phone"><?php echo $this->lang->line('phone_label') ?>
									<span class="required">*</span>
								</label>
								<input type="text" aria-required="true" size="30" value="" name="phone" id="phone"
									class="form-control" placeholder="<?php echo $this->lang->line('phone') ?>">
							</div>
						</div>
					</div>
					<div class="row mb-10">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="brand"><?php echo $this->lang->line('brand_label') ?>
									<span class="required">*</span>
								</label>
								<input type="text" aria-required="true" size="30" value="" name="brand" id="brand"
									class="form-control" placeholder="<?php echo $this->lang->line('brand') ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="category_id">
									<?php echo $this->lang->line('category_label') ?>
									<span class="required">*</span>
								</label>
								<select class="form-control" name="category_id" required id="category_id">
									<?php $category = $this->admin_model->get_category(); ?>
									<option value=""> <?php echo $this->lang->line('category') ?></option>
									<?php foreach ($category as $listing) : ?>
									<option value="<?php echo $listing['id']; ?>"><?php echo $listing['c_name']; ?>
									</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row mt-30">
						<div class="col-sm-12">
							<div class="form-group text-center contact-form1">
								<button type="button" id="contact_form_submit" name="contact_submit"
									class="btn btn-primary btn-maincolor">
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

<script>
	document.onkeydown = function (evt) {
		var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
		if (keyCode == 13) {
			//your function call here
			document.searchaction.submit();
		}
	}
	$(document).ready(function () {
		$('#region_id').on('change', function () {
			
			document.searchaction.submit();
		});
	});
</script>


<script type="text/javascript">
	$(document).ready(function () {
		$("#contact_form_submit").click(function (e) {

			e.preventDefault();



			var name = $("input[name='name']").val();
			var description = $("textarea[name='description']").val();
			var category_id = $("#category_id option:selected").val();
			var brand = $("input[name='brand']").val();
			var phone = $("input[name='phone']").val();


			$.ajax({
				url: "<?=base_url('subscribe_submit')?>",
				type: 'POST',
				data: {
					name: name,
					description: description,
					category_id: category_id,
					brand: brand,
					phone: phone
				},
				success: function (data) {
					console.log(data);


					// console.log(data.status);
					if (data.status == true) {
						$('#exampleModal').modal('toggle');
						alert(data.message);
						$("#cform")[0].reset();
						$("span").remove(".invalid");
						$('input[name=name]').removeClass('invalid');
						$('input[name=phone]').removeClass('invalid');
						$('input[name=description]').removeClass('invalid');
						$('input[name=address]').removeClass('invalid');
						$('#category_id').removeClass('invalid');

					} else {
						// $("#allererror").show();
						//	$("#errorspan").html(data.message);
						printErrorMsg(data.message);
					}
				}
			});


		});


		function printErrorMsg(msg) {
			$("span").remove(".invalid");
			$('input[name=name]').removeClass('invalid');
			$('input[name=phone]').removeClass('invalid');
			$('input[name=description]').removeClass('invalid');
			$('#category_id option:selected').removeClass('invalid');
			$('input[name=address]').removeClass('invalid');
			$.each(msg, function (key, value) {

				if (key == 'category_id') {
					$('#category_id').addClass('invalid');
				} else {
					$('input[name=' + key + ']').addClass('invalid');

				}
				$(document).find('[name=' + key + ']').after('<span class="text-strong invalid">' + value +
					'</span>')

			});
		}
	});
</script>