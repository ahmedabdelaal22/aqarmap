<?php
// $id = $this->uri->segment(3);
$id = $this->session->userdata('aid');
// $profile = $this->admin_model->get_admin($id);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Edit Real Estates</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
						<li class="breadcrumb-item active">Edit Real Estates</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- <?php if (!empty($this->session->flashdata('success'))) : ?>
          <div class="alert alert-success">
            <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span> <?php echo $this->session->flashdata('success'); ?> </span>
          </div>
        <?php endif ?>
        <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger">
            <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span><?php echo $this->session->flashdata('error') ?></span>
          </div>
        <?php endif ?> -->
	<!-- Main content -->



	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-lg-12">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Edit Real Estates</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('admin/update-restaurants'); ?>">
							<div class="col-md-12">
								<div class="box-body">
									<input type="hidden" name="id" value="<?php echo $restaurant->res_id; ?>">

									<div class="form-group">
										<label for="exampleInputEmail1">Real Estates Name (en)</label>
										<input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo $restaurant->res_name; ?>" required>
									</div>

									<div class="form-group">
										<label for="exampleInputEmail1">Real Estates Name (ar)</label>
										<input type="text" name="res_name_a" class="form-control" id="exampleInputEmail1" value="<?php echo $restaurant->res_name_a; ?>" required>
									</div>
									<div class="form-group">
										<label>Vendor</label>
										<select class="form-control" name="vid" required>
											<?php $vendoer = $this->admin_model->get_vendor(); ?>
											<option value="">Select Vendor</option>
											<?php foreach ($vendoer as $listing) : ?>
												<option value="<?php echo $listing->id; ?>"<?php if ($listing->id == $restaurant->vid) echo "selected='selected'"; ?>><?php echo $listing->uname; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
										<label>
									        	القسم
                                         </label>
										<select class="form-control" name="type" required>
											<option value="">القسم</option>
										
											<?php foreach (types() as $key => $value) : ?>
												<option value="<?php echo $key; ?>"   <?php if ($key == $restaurant->type) echo "selected='selected'"; ?> ><?php echo $value ?></option>
											<?php endforeach; ?>
										</select>
									</div>

									<div class="form-group">
										<label>النوع</label>
										<select class="form-control" name="cat_id" required>
											<option value="">النوع</option>
											<?php $category = $this->admin_model->get_category(); ?>
											<?php foreach ($category as $listing) : ?>
												<option value="<?php echo $listing['id']; ?>" <?php if ($listing['id'] == $restaurant->cat_id) echo "selected='selected'"; ?>><?php echo $listing['c_name']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
										<label>Regions</label>
										<select class="form-control" name="region_id" id="region_id" required>
											<option value="">Select Region</option>
											<?php $regions = $this->admin_model->get_regions(); ?>
											<?php foreach ($regions as $listing) : ?>
												<option value="<?php echo $listing['id']; ?>" <?php if ($listing['id'] == $restaurant->region_id) echo "selected='selected'"; ?>><?php echo $listing['name_ar']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<!-- <div class="form-group">
										<label>locations</label>
										<select class="form-control" name="location_id" id="location_id" required>
											<option value="">Select locations</option>
											<?php $locations = $this->admin_model->get_location_by_region($restaurant->region_id); ?>
											<?php foreach ($locations as $listing) : ?>
												<option value="<?php echo $listing['id']; ?>" <?php if ($listing['id'] == $restaurant->location_id) echo "selected='selected'"; ?>><?php echo $listing['name_ar']; ?></option>
											<?php endforeach; ?>
										</select>
										<?php echo form_error('location_id'); ?><br>
									</div> -->
									<div class="form-group">
										<?php
										$chk = explode(",", $restaurant->status);
										?>
										<label for="exampleInputfnm">Status</label>
										
										<div class="radio">
											<label>
												<input type="checkbox" id="optionsRadios2" name="status" value="2" <?php if (in_array("2", $chk)) echo "checked='checked'"; ?>>
											</label>
											Featured Category Real Estates
										</div>
										<?php
										$chk2 = explode(",", $restaurant->display_ads);
										?>
										<div class="radio">
											<label>
												<input type="checkbox" id="optionsRadios2" name="display_ads" value="1" <?php if (in_array("1", $chk2)) echo "checked='checked'"; ?>>
											</label>
											الإعلانات المصورة 

										</div>
										<?php
										$chk3 = explode(",", $restaurant->real_compound);
										?>
										<div class="radio">
											<label>
												<input type="checkbox" id="optionreal" name="real_compound" value="1" <?php if (in_array("1", $chk3)) echo "checked='checked'"; ?>>
											</label>
											عقارات داخل كمبوند 
										</div>
										<?php
										$chk4 = explode(",", $restaurant->real_owner);
										?>
										<div class="radio">
											<label>
												<input type="checkbox" id="optionreal" name="real_owner" value="1" <?php if (in_array("1", $chk4)) echo "checked='checked'"; ?>>
											</label>
											عقارات من المالك مباشرة
										</div>
									</div>
							

									<div class="form-group">
										<label>Description (en)</label>
										<textarea class="form-control" name="description" rows="3" required><?php echo $restaurant->res_desc; ?></textarea>
									</div>


									
									<div class="form-group">
										<label>Description (ar)</label>
										<textarea class="form-control" name="res_desc_a" rows="3" required><?php echo $restaurant->res_desc_a; ?></textarea>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label for="exampleInputfnm">Phone Number</label>
											<div class="input-group">
												<input type="text" class="form-control" id="exampleInputfnm" placeholder="Enter Phone Number" value="<?php echo $restaurant->res_phone; ?>" name="phone">
												<div class="input-group-append">
													<div class="input-group-text">
														<span class="fa fa-mobile"></span>
													</div>
												</div>
											</div>
											<?php echo form_error('number'); ?><br>
										</div>
							
									</div>
					
									<div class="form-group">
										<label>Real Estates Address</label>
										<input type="text" id="address" name="address" class="form-control" id="exampleInputEmail1" value="<?php echo $restaurant->res_address; ?>" required>
									</div>
									<div class="form-group">
										<label>Price</label>
										<input type="text" id="discount" name="discount" class="form-control" id="exampleInputdiscount" value="<?php echo $restaurant->discount; ?>" required>
									</div>
									<div class="form-group">
										<label>Space</label>
										<input type="text" id="space" name="space" class="form-control" id="exampleInputspace" value="<?php echo $restaurant->space; ?>" required>
									</div>
									<div class="form-group">
										<label>floor</label>
										<input type="text" id="floor" name="floor" class="form-control"  placeholder="Enter Floor" value="<?php echo $restaurant->floor; ?>" required>
									</div>
									<div class="form-group">
										<label>rooms</label>
										<input type="text" name="rooms" class="form-control" id="rooms" placeholder="Enter Rooms" value="<?php echo $restaurant->rooms; ?>" required>
									</div>
									<div class="form-group">
										<label>baths</label>
										<input type="text" id="baths" name="baths" class="form-control" placeholder="Enter Baths" value="<?php echo $restaurant->baths; ?>" required>
									</div>
									<div class="form-group">
										<label>Year of construction</label>
										<input type="text" id="year_of_construction" name="year_of_construction" class="form-control" value="<?php echo $restaurant->year_of_construction; ?>" placeholder="Enter Year Of Construction" required>
									</div>
									<div class="form-group">
										<label>Overlooking (en) </label>
										<input type="text" id="overlooking" name="overlooking" class="form-control" placeholder="Enter Overlooking (en)" value="<?php echo $restaurant->overlooking; ?>" required>
									</div>
									<div class="form-group">
										<label>Overlooking (ar)</label>
										<input type="text" id="overlooking_a" name="overlooking_a" class="form-control" placeholder="Enter Overlooking (ar)" value="<?php echo $restaurant->overlooking_a; ?>" required>
									</div>
									<div class="form-group">
										<label>
										نوع المعلن
                                         </label>
										<select class="form-control" name="advertiser_type" required>
											<option value="">نوع المعلن</option>
										
											<?php foreach (advertiser_type() as $key => $value) : ?>
												<option value="<?php echo $key; ?>"  <?php if ($key == $restaurant->advertiser_type) echo "selected='selected'"; ?>><?php echo $value ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group">
										<label>
										طريقة الدفع
                                         </label>
										<select class="form-control" name="payment_method" required>
											<option value="">طريقة الدفع</option>
										
											<?php foreach (payment_method() as $key => $value) : ?>
												<option value="<?php echo $key; ?>"  <?php if ($key == $restaurant->payment_method) echo "selected='selected'"; ?> ><?php echo $value ?></option>
											<?php endforeach; ?>
										</select>
									</div>
						

									<div class="form-group">
										<label>Education (en)</label>
										<textarea class="form-control" name="education" rows="3" required><?php echo $restaurant->education; ?></textarea>
									</div>
									<div class="form-group">
										<label>Education (ar)</label>
										<textarea class="form-control" name="education_a" rows="3" required><?php echo $restaurant->education_a; ?></textarea>
									</div>
									<div class="form-group">
										<label>Health Medical (En)</label>
										<textarea class="form-control" name="health_medical" rows="3" required><?php echo $restaurant->health_medical; ?></textarea>
									</div>
									<div class="form-group">
										<label>Health Medical (ar)</label>
										<textarea class="form-control" name="health_medical_a" rows="3" required><?php echo $restaurant->health_medical_a; ?></textarea>
									</div>
									<div class="form-group">
										<label>Transportation (en)</label>
										<textarea class="form-control" name="transportation" rows="3" required><?php echo $restaurant->transportation; ?></textarea>
									</div>
									<div class="form-group">
										<label>Transportation (ar)</label>
										<textarea class="form-control" name="transportation_a" rows="3" required><?php echo $restaurant->transportation_a; ?></textarea>
									</div>
									<div class="form-group">
										<label for="exampleInputFile">Real Estates Logo</label>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" name="logo" class="custom-file-input" id="exampleInputFile">
												<label class="custom-file-label" for="exampleInputFile">Choose file</label>
											</div>
										</div>
										<p class="help-block">Your Real Estates Video.</p>
										<?php if ($restaurant->logo) { ?>
											<img src="<?php echo base_url('uploads/') . $restaurant->logo; ?>" class="res_image" height="70" width="70">
										<?php } ?>
									</div>

									<div class="form-group">
										<label for="exampleInputFile">Real Estates Images</label>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" name="res_image[]" class="custom-file-input" id="exampleInputFile" multiple>
												<label class="custom-file-label" for="exampleInputFile">Choose file</label>
											</div>
										</div>
										<p class="help-block">Your Real Estates Image.</p>
										<?php $images = explode("::::", $restaurant->res_image); ?>
										<?php foreach ($images as $key => $image) { ?>
											<img src="<?php echo base_url('uploads/') . $image ?>" class="res_image" height="70" width="70">
										<?php } ?>
									</div>

							

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Real Estates Google Address latitude (Show Real Estates on Map)</label>
												<input class="form-control" type="text" name="lat" placeholder="Enter latitude ..." value="<?php echo $restaurant->lat; ?>" />
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Real Estates Google Address Longitude</label>
												<input class="form-control" type="text" name="lon" placeholder="Enter longitude ..." value="<?php echo $restaurant->lon; ?>" />
											</div>
										</div>
									</div>

								</div>
								<div class="card-footer">
									<button type="submit" name="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
