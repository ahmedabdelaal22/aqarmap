<!--=================================
Submit Property -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title d-flex align-items-center">
          <h2>Submit Property</h2>
        </div>
        <div class="row">
          <div class="col-12">
            <ul class="nav nav-tabs nav-tabs-03 nav-fill" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="tab-01-tab" data-bs-toggle="tab" href="#tab-01" role="tab" aria-controls="tab-01" aria-selected="true">
                  <span>01</span>
                  Basic Information
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab-02-tab" data-bs-toggle="tab" href="#tab-02" role="tab" aria-controls="tab-02" aria-selected="false">
                  <span>02</span>
                Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab-03-tab" data-bs-toggle="tab" href="#tab-03" role="tab" aria-controls="tab-03" aria-selected="false"
                  ><span>03</span>
                Location</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab-04-tab" data-bs-toggle="tab" href="#tab-04" role="tab" aria-controls="tab-04" aria-selected="false">
                  <span>04</span>
                Detailed Information</a>
              </li>
            </ul>
            <div class="tab-content mt-4" id="myTabContent">
              <div class="tab-pane fade show active" id="tab-01" role="tabpanel" aria-labelledby="tab-01-tab">
                <form>
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Property Title </label>
                      <input type="text" class="form-control" placeholder="Awesome family home">
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label">Offer</label>
                      <select class="form-control basic-select">
                        <option value="value 01" selected="selected">For sale</option>
                        <option value="value 02">For rent</option>
                      </select>
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label">Rental Period</label>
                      <select class="form-control basic-select">
                        <option value="value 01" selected="selected">Monthly</option>
                        <option value="value 02">yearly</option>
                      </select>
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label">Property Type</label>
                      <select class="form-control basic-select">
                        <option value="value 01" selected="selected">Apartment</option>
                        <option value="value 02">Park</option>
                      </select>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="d-block form-label">Property price </label>
                      <div class="input-group input-group-box">
                        <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                        <input type="text" class="form-control" placeholder="Total Amount">
                      </div>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Area</label>
                      <input class="form-control" placeholder="Type (sq ft)">
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label">Rooms</label>
                      <select class="form-control basic-select">
                        <option value="value 01" selected="selected">01</option>
                        <option value="value 02">02</option>
                      </select>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Video</label>
                      <input class="form-control" placeholder="URL to oEmbed supported service">
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="tab-02" role="tabpanel" aria-labelledby="tab-02-tab">
                <div class="input-group file-upload">
                  <input type="file" class="form-control" id="customFile">
                  <label class="input-group-text" for="customFile">Choose file</label>
                </div>
              </div>
              <div class="tab-pane fade" id="tab-03" role="tabpanel" aria-labelledby="tab-03-tab">
                  <div class="row mt-4">
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Google Maps Address </label>
                      <input type="text" class="form-control" placeholder="Envato">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Friendly Address </label>
                      <input type="text" class="form-control" placeholder="Envato market">
                    </div>
                    <div class="mb-3 col-md-12 select-border">
                      <label class="form-label">Regions</label>
                      <select class="form-control basic-select">
                        <option value="value 01" selected="selected">Los angeles</option>
                        <option value="value 02">Miami</option>
                      </select>
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade" id="tab-04" role="tabpanel" aria-labelledby="tab-04-tab">
                <form>
                  <div class="row mt-4">
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label">Building age</label>
                      <select class="form-control basic-select">
                        <option value="value 01" selected="selected">10 to 18 years</option>
                        <option value="value 02">10 to 18 years</option>
                      </select>
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label">Bedrooms</label>
                      <select class="form-control basic-select">
                        <option value="value 01" selected="selected">1</option>
                        <option value="value 02">2</option>
                      </select>
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label">Bathrooms</label>
                      <select class="form-control basic-select">
                        <option value="value 01" selected="selected">1</option>
                        <option value="value 02">2</option>
                      </select>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Parking </label>
                      <input type="text" class="form-control" placeholder="Parking">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Cooling </label>
                      <input type="text" class="form-control" placeholder="Cooling">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Heating </label>
                      <input type="text" class="form-control" placeholder="Heating">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Sewer </label>
                      <input type="text" class="form-control" placeholder="Sewer">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Water </label>
                      <input type="text" class="form-control" placeholder="Water">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Exercise Room </label>
                      <input type="text" class="form-control" placeholder="Exercise Room">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Storage Room </label>
                      <input type="text" class="form-control" placeholder="Storage Room">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Submit Property -->