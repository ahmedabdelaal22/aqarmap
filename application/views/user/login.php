<!--=================================
Login -->
<section class="space-ptb login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-sm-10">
        <div class="section-title">
          <h2 class="text-center">Login</h2>
        </div>
            <form class="row mt-4 align-items-center">
              <div class="mb-3 col-sm-12">
                <label class="form-label">Email Address:</label>
                <input type="email" class="form-control" placeholder="">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label">Password:</label>
                <input type="Password" class="form-control" placeholder="">
              </div>
              <div class="col-sm-6 d-grid">
                <button type="submit" class="btn btn-primary">Sign In</button>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                  <li class="me-1"><a href="<?=base_url('/register')?>">Don't have an account yet? Register Now</a></li>
                </ul>
              </div>
            </form>
          </div>
    </div>
  </div>
</section>
<!--=================================
Login -->