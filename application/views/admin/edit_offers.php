<?php
// $id = $this->uri->segment(3);
// $id = $this->session->userdata('aid');
  // $profile = $this->admin_model->get_admin($id);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit offers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Edit offers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- <?php if(!empty($this->session->flashdata('success'))): ?>
          <div class="alert alert-success">
            <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span> <?php echo $this->session->flashdata('success'); ?> </span>
          </div>
        <?php endif ?>
        <?php if($this->session->flashdata('error')): ?>
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
                <h3 class="card-title">Edit offers</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('admin/update-offers'); ?>">
            <div class="col-md-12">
              <div class="box-body">
                
              <input type="hidden" name="id" value="<?php echo $offers->id; ?>">

                <div class="form-group">
										<label>Resturant</label>
										<select class="form-control" name="restaurant_id" required>
											<option value="">Select Resturant</option>
											<?php $resturants = $this->admin_model->get_restaurants(); ?>
											<?php foreach ($resturants as $listing) : ?>
												<option value="<?php echo $listing['res_id']; ?>" <?php if ($listing['res_id'] == $offers->restaurant_id) echo "selected='selected'"; ?>><?php echo $listing['res_name']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>

                  <div class="col-md-12">
											<label for="exampleInputfnm">dicount</label>
											<div class="input-group">
												<input type="number" class="form-control" id="exampleInputfnm" placeholder="Enter dicount"  value="<?php echo $offers->dicount; ?>" name="dicount">
												<div class="input-group-append">
													<div class="input-group-text">
														<span class="fa fa-mobile"></span>
													</div>
												</div>
											</div>
											<?php echo form_error('number'); ?><br>
										</div>
                  <div class="form-group">
                   <label for="exampleInputFile">Banner</label>
                   <div class="input-group">
                      <div class="custom-file">
                         <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                         <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                   </div>
                </div>
                <img src="<?php echo base_url('uploads/').$offers->image ?>" class="image" height="100" width="100" style="border: 2px solid #000;padding: 5px;">

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