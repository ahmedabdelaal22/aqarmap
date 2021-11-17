<!--=================================
Register -->
<section class="space-ptb login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-sm-10">
        <div class="section-title">
          <h2 class="text-center">Create an Account</h2>
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

            <form class="row mt-4 align-items-center"role="form" method="post" action="<?php echo base_url('user/register-user'); ?>">
              <div class="mb-3 col-sm-12">
                <label class="form-label">Username:</label>
                <input type="text" class="form-control" placeholder="" name="username">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label">Email Address:</label>
                <input type="email" class="form-control" placeholder="" name="email">
              </div>
              <div class="mb-3 col-sm-12 select-border">
                <label class="mb-2">User type</label>
                <select class="form-control basic-select" name="type">
                <?php foreach (get_vendore_type() as $key => $value) : ?>
                  <option value="<?php echo $key; ?>"  ><?php echo $value ?></option>
											<?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label">Password:</label>
                <input type="Password" class="form-control" placeholder="" name="password">
              </div>

              <div class="col-sm-6 d-grid">
                <button type="submit" class="btn btn-primary">Sign up</button>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                  <li class="me-1"><a href="<?=base_url('/login')?>">Already Registered User? Click here to login</a></li>
                </ul>
              </div>
            </form>

      </div>
    </div>
  </div>
</section>
<!--=================================
Register -->