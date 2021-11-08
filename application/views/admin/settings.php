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
            <h1>Edit Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Edit Settings</li>
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
                <h3 class="card-title">Edit Settings</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('admin/update-settings'); ?>">
            <div class="col-md-12">
              <div class="box-body">
                
           
              <?php foreach($settings as $resource){ ?>
                <div class="form-group m-form__group col-lg-6">
                    <?php if($resource->option_type == 'textarea') {?>
                        <label for="code">
                        <?php echo $this->lang->line($resource->name) ?>

                        </label>
                        <textarea  name="<?=$resource->name.'['.$resource->id.']'?>" class=" form-control <?=$resource->option?>"><?=$resource->value?></textarea>
                    <?php }elseif($resource->option_type == 'checkbox' || $resource->option_type == 'radio'){?>
                        <div class="checkbox primary">
                            <input type="<?=$resource->option_type?>" name="<?=$resource->name.'['.$resource->id.']'?>" <?=($resource->value) ? 'checked' : ''?> class="form-control <?$resource->option?>" value="<?=$resource->value?>" id="<?=$resource->name.$resource->id?>">
                            <label for="<?=$resource->name.$resource->id?>"> <?php echo $this->lang->line($resource->name) ?></label>
                        </div>
                    <?php } elseif($resource->option_type == 'select'){?>
                        <div class="checkbox primary">
             
                            <label for="<?=$resource->name.$resource->id?>"> <?php echo $this->lang->line($resource->name) ?></label>
                        </div>
                   <?php }else{?>
                  
                        <label for="code"> <?php echo $this->lang->line($resource->name) ?></label>
                        <input type="<?=$resource->option_type?>" name="<?=$resource->name.'['.$resource->id.']'?>" class="form-control <?=$resource->option?>" value="<?=$resource->value?>">
                   <?php } ?>
                    
                </div>
                  <?php  } ?>
     

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