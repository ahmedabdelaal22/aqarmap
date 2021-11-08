
<div class="login-box">

  <div class="login-logo">
    <a href="<?php echo base_url();?>user/login"><img style="height:100px;width: 100px;" src="<?php echo base_url(); ?>uploads/nlytical_n copy.jpg"></a>
  </div>

  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Nylitical</b> APP</a>
    </div>
    <div class="card-body">
      <!-- <p class="login-box-msg">Sign in to start your session</p> -->
      <?php if(!empty($this->session->flashdata('success'))): ?>
          <div class="alert alert-success alert-dismissible fade show">
          <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <span> <?php echo $this->session->flashdata('success'); ?> </span>
          </div>
      <?php endif ?>
      <?php if($this->session->flashdata('error')): ?>
          <div class="alert alert-danger alert-dismissible fade show">
         <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <span><?php echo $this->session->flashdata('error') ?></span>
          </div>
      <?php endif ?>
      <!-- <form action="#" method="post"> -->
      <form role="form" method="post" action="<?php echo base_url('user/forget-user'); ?>">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
   
        <div class="row">

          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">forget password </button>
          </div>
     
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
     <!--  <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

