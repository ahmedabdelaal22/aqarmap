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
            <h1>Edit Region</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Edit Region</li>
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
                <h3 class="card-title">Edit Region</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('admin/update-regions'); ?>">
            <div class="col-md-12">
              <div class="box-body">
                
              <input type="hidden" name="id" value="<?php echo $regions->id; ?>">

        

                  <div class="col-md-12">
											<label for="exampleInputfnm">Name (ar)</label>
											<div class="input-group">
												<input type="text" class="form-control" id="exampleInputfnm" placeholder="Enter Name (ar)"  value="<?php echo $regions->name_ar; ?>" name="name_ar">
												<div class="input-group-append">
													<div class="input-group-text">
														<span class="fa fa-mobile"></span>
													</div>
												</div>
											</div>
											<?php echo form_error('name_ar'); ?><br>
										</div>
                    <div class="col-md-12">
											<label for="exampleInputfnm">Name (en)</label>
											<div class="input-group">
												<input type="text" class="form-control" id="exampleInputfnm" placeholder="Enter Name (en)"  value="<?php echo $regions->name_en; ?>" name="name_en">
												<div class="input-group-append">
													<div class="input-group-text">
														<span class="fa fa-mobile"></span>
													</div>
												</div>
											</div>
											<?php echo form_error('name_en'); ?><br>
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