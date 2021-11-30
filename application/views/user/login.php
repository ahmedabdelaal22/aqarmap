<!--=================================
Login -->
<section class="space-ptb login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-sm-10">
        <div class="section-title">
          <h2 class="text-center"><?php echo $this->lang->line('login') ?></h2>

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
        </div>
            <form class="row mt-4 align-items-center" method="post" action="<?php echo base_url('user/login-user'); ?>">
              <div class="mb-3 col-sm-12">
                <label class="form-label"><?php echo $this->lang->line('email') ?>:</label>
                <input type="email" name="email" class="form-control" placeholder="">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label"><?php echo $this->lang->line('password') ?>:</label>
                <input type="Password" class="form-control" name="password" placeholder="">
              </div>
              <div class="col-sm-6 d-grid">
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('login') ?></button>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                  <li class="me-1"><a href="<?=base_url('/register')?>"><?php echo $this->lang->line('dont_have_account') ?></a></li>
                </ul>
              </div>
            </form>
          </div>
    </div>
  </div>
</section>
<!--=================================
Login -->