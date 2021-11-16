<!--=================================
Register -->
<section class="space-ptb login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-sm-10">
        <div class="section-title">
          <h2 class="text-center">Create an Account</h2>
        </div>

            <form class="row mt-4 align-items-center">
              <div class="mb-3 col-sm-12">
                <label class="form-label">Username:</label>
                <input type="text" class="form-control" placeholder="">
              </div>
              <div class="mb-3 col-sm-12">
                <label class="form-label">Email Address:</label>
                <input type="email" class="form-control" placeholder="">
              </div>
              <div class="mb-3 col-sm-12 select-border">
                <label class="mb-2">User type</label>
                <select class="form-control basic-select">
                  <option value="value 01" selected="selected">Home Buyer</option>
                  <option value="value 02">Home Seller</option>
                  <option value="value 03">Both Buyer and Seller</option>
                  <option value="value 04">Home Owner</option>
                  <option value="value 05">Renter</option>
                  <option value="value 06">Other/Just Looking</option>
                </select>
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
    </div>
  </div>
</section>
<!--=================================
Register -->