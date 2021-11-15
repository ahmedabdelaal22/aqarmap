<!--=================================
Register -->
<section class="space-ptb login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-sm-10">
        <div class="section-title">
          <h2 class="text-center">Create an Account</h2>
        </div>
        <ul class="nav nav-tabs nav-tabs-02 justify-content-center" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="agent-tab" data-bs-toggle="tab" href="#agent" role="tab" aria-controls="agent" aria-selected="false">Agent</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="regular-user-tab" data-bs-toggle="tab" href="#regular-user" role="tab" aria-controls="regular-user" aria-selected="true">Regular User</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="agent" role="tabpanel" aria-labelledby="agent-tab">
            <form class="row mt-4 align-items-center">
              <div class="mb-3 col-sm-12">
                <label class="form-label">Username:</label>
                <input type="text" class="form-control" placeholder="">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label">Email Address:</label>
                <input type="email" class="form-control" placeholder="">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label">Password:</label>
                <input type="Password" class="form-control" placeholder="">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label">Confirm Password:</label>
                <input type="Password" class="form-control" placeholder="">
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
          <div class="tab-pane fade" id="regular-user" role="tabpanel" aria-labelledby="regular-user-tab">
            <form class="row mt-4 mb-5 align-items-center">
              <div class="mb-3 col-sm-12">
                <label class="form-label">Username:</label>
                <input type="text" class="form-control" placeholder="">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label">Email Address:</label>
                <input type="email" class="form-control" placeholder="">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label">Password:</label>
                <input type="Password" class="form-control" placeholder="">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label">Confirm Password:</label>
                <input type="Password" class="form-control" placeholder="">
              </div>
              <div class="col-sm-6 d-grid">
                <button type="submit" class="btn btn-primary">Sign up</button>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                  <li class="me-1"><a href="#">Already Registered User? Click here to login</a></li>
                </ul>
              </div>
            </form>
            <div class="login-social-media border ps-4 pe-4 pb-4 pt-0 rounded">
              <div class="mb-4 d-block text-center"><b class="bg-white ps-2 pe-2 mt-3 d-block">Login or Sign in with</b></div>
              <form class="row">
                <div class="col-sm-6">
                  <a class="btn facebook-bg social-bg-hover d-block mb-3" href="#"><span><i class="fab fa-facebook-f"></i>Login with Facebook</span></a>
                </div>
                <div class="col-sm-6">
                  <a class="btn twitter-bg social-bg-hover d-block mb-3" href="#"><span><i class="fab fa-twitter"></i>Login with Twitter</span></a>
                </div>
                <div class="col-sm-6">
                  <a class="btn google-bg social-bg-hover d-block mb-3 mb-sm-0" href="#"><span><i class="fab fa-google"></i>Login with Google</span></a>
                </div>
                <div class="col-sm-6">
                  <a class="btn linkedin-bg social-bg-hover d-block" href="#"><span><i class="fab fa-linkedin-in"></i>Login with Linkedin</span></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Register -->