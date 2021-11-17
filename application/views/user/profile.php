<!--=================================
My profile -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-5">
        <div class="profile-sidebar bg-holder bg-overlay-black-70" style="background-image: url(<?=base_url('website')?>/images/banner-01.jpg);">
          <div class="d-sm-flex align-items-center position-relative">
            <div class="profile-avatar">
              <img class="img-fluid  rounded-circle" src="<?=base_url('website')?>/images/agent/02.jpg" alt="">
            </div>
            <div class="ms-sm-4">
              <h4 class="text-white">Alice Williams</h4>
              <b class="text-white">alicewilliams@gmail.com</b>
            </div>
            <div class="ms-auto my-4 mt-sm-0">
              <a class="btn btn-white btn-md" href="submit-property.html"> <i class="fa fa-plus-circle"></i>Add listing </a>
            </div>
          </div>
          <div class="profile-nav">
            <ul class="nav" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="edit-profile-tab" data-bs-toggle="pill" href="#edit-profile" role="tab" aria-controls="listing" aria-selected="false"><i class="far fa-user"></i> Edit Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="my-properties-tab" data-bs-toggle="pill" href="#my-properties" role="tab" aria-controls="agents" aria-selected="false"><i class="far fa-bell"></i>My properties</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="saved-homes-tab" data-bs-toggle="pill" href="#saved-homes" role="tab" aria-controls="agents" aria-selected="false"><i class="fas fa-home"></i> Saved Homes</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="tab-content" id="pills-tabContent">

          <div class="tab-pane fade show active " id="edit-profile" role="tabpanel" aria-labelledby="overview-tab">
            <div class="row">

              <div class="col-12">
                <div class="section-title d-flex align-items-center">
                  <h2>Edit profile </h2>
                  <span class="ms-auto">Joined Mar 18, 2019</span>
                </div>
                <form>
                  <div class="row">
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">User name</label>
                      <input type="text" class="form-control" value="Alice Williams">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">Email address</label>
                      <input type="text" class="form-control" value="support@realvilla.demo">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">Phone number</label>
                      <input type="text" class="form-control" value="(123) 345-6789">
                    </div>
                    <div class="form-group col-md-6 mb-3 select-border">
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
                    <div class="form-group col-md-6 mb-3">
                      <label class="mb-2">Location</label>
                      <input type="text" class="form-control" value="New York, NY">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                      <div class="d-flex align-items-center">
                        <label class="mb-2">Password</label>
                        <a class="ms-auto mb-2" href="#">Edit</a>
                      </div>
                      <input type="password" class="form-control" value="1234567892">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                      <label class="mb-2">About Me</label>
                      <textarea class="form-control" rows="4" value="About me"></textarea>
                    </div>
                    <div class="col-md-12">
                      <a class="btn btn-primary" href="#">Save Changes</a>
                    </div>
                  </div>
                </form>
                <hr class="my-5" />
                <div class="mb-5">
                  <h6>Upload your ID</h6>
                  <p>To ensure the safety of agents, we need you to provide your identity before we can take you on a home tour.</p>
                  <div class="input-group file-upload">
                    <input type="file" class="form-control" id="customFile">
                    <label class="input-group-text" for="customFile">Choose file</label>
                  </div>
                </div>
                <div class="mb-2">
                  <h6>Delete Account?</h6>
                  <p>This will remove your login information from our system, and you will not be able to login again. It cannot be undone.</p>
                  <a class="btn btn-danger" href="#">Yes Delete My Account</a>
                </div>
          </div>              

            </div>
          </div>

          <div class="tab-pane fade " id="my-properties" role="tabpanel" aria-labelledby="overview-tab">
<!--=================================
My Properties -->

    <div class="row">

      <div class="col-12">
        <div class="section-title d-flex align-items-center">
          <h2>My Properties</h2>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="property-item">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="<?=base_url('website')?>/images/property/grid/01.jpg" alt="">
                <div class="property-lable">
                  <span class="badge badge-md bg-primary">Bungalow</span>
                  <span class="badge badge-md bg-info">Sale </span>
                </div>
                <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
                <div class="property-agent">
                  <div class="property-agent-image">
                    <img class="img-fluid" src="<?=base_url('website')?>/images/avatar/01.jpg" alt="">
                  </div>
                  <div class="property-agent-info">
                    <a class="property-agent-name" href="#">Alice Williams</a>
                    <span class="d-block">Company Agent</span>
                    <ul class="property-agent-contact list-unstyled">
                      <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                      <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                    </ul>
                  </div>
                </div>
                <div class="property-agent-popup">
                  <a href="#"><i class="fas fa-camera"></i> 06</a>
                </div>
              </div>
              <div class="property-details">
                <div class="property-details-inner">
                  <h5 class="property-title"><a href="property-detail-style-01.html">Ample apartment at last floor </a></h5>
                  <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Virginia drive temple hills</span>
                  <span class="property-agent-date"><i class="far fa-clock fa-md"></i>10 days ago</span>
                  <div class="property-price">$150.00<span> / month</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>1</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>2</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>145m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-favourites"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite" href="#"><i class="fas fa-heart "></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="property-item">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="<?=base_url('website')?>/images/property/grid/02.jpg" alt="">
                <div class="property-lable">
                  <span class="badge badge-md bg-primary">Apartment</span>
                  <span class="badge badge-md bg-info">New </span>
                </div>
                <div class="property-agent">
                  <div class="property-agent-image">
                    <img class="img-fluid" src="<?=base_url('website')?>/images/avatar/02.jpg" alt="">
                  </div>
                  <div class="property-agent-info">
                    <a class="property-agent-name" href="#">John doe</a>
                    <span class="d-block">Company Agent</span>
                    <ul class="property-agent-contact list-unstyled">
                      <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                      <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                    </ul>
                  </div>
                </div>
                <div class="property-agent-popup">
                  <a href="#"><i class="fas fa-camera"></i> 12</a>
                </div>
              </div>
              <div class="property-details">
                <div class="property-details-inner">
                  <h5 class="property-title"><a href="property-detail-style-01.html">Awesome family home</a></h5>
                  <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Vermont dr. hephzibah</span>
                  <span class="property-agent-date"><i class="far fa-clock fa-md"></i>2 months ago</span>
                  <div class="property-price">$326.00<span> / month</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>2</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>3</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>215m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-favourites"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite" href="#"><i class="fas fa-heart "></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="property-item">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="<?=base_url('website')?>/images/property/grid/03.jpg" alt="">
                <div class="property-lable">
                  <span class="badge badge-md bg-primary">Summer House</span>
                  <span class="badge badge-md bg-info">Hot </span>
                </div>
                <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
                <div class="property-agent">
                  <div class="property-agent-image">
                    <img class="img-fluid" src="<?=base_url('website')?>/images/avatar/03.jpg" alt="">
                  </div>
                  <div class="property-agent-info">
                    <a class="property-agent-name" href="#">Felica queen</a>
                    <span class="d-block">Investment</span>
                    <ul class="property-agent-contact list-unstyled">
                      <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                      <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                    </ul>
                  </div>
                </div>
                <div class="property-agent-popup">
                  <a href="#"><i class="fas fa-camera"></i> 03</a>
                </div>
              </div>
              <div class="property-details">
                <div class="property-details-inner">
                  <h5 class="property-title"><a href="property-detail-style-01.html">Contemporary apartment</a></h5>
                  <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Newport st. mebane, nc</span>
                  <span class="property-agent-date"><i class="far fa-clock fa-md"></i>6 months ago</span>
                  <div class="property-price">$658.00<span> / month</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>3</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>4</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>3,189m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-favourites"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite" href="#"><i class="fas fa-heart "></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!--=================================
My Properties -->
          </div>

          <div class="tab-pane fade " id="saved-homes" role="tabpanel" aria-labelledby="overview-tab">
<!--=================================
Saved Homes -->

    <div class="row">

      <div class="col-12">
        <div class="section-title d-flex align-items-center">
          <h2>Saved Homes</h2>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="property-item">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="<?=base_url('website')?>/images/property/grid/01.jpg" alt="">
                <div class="property-lable">
                  <span class="badge badge-md bg-primary">Bungalow</span>
                  <span class="badge badge-md bg-info">Sale </span>
                </div>
                <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
                <div class="property-agent">
                  <div class="property-agent-image">
                    <img class="img-fluid" src="<?=base_url('website')?>/images/avatar/01.jpg" alt="">
                  </div>
                  <div class="property-agent-info">
                    <a class="property-agent-name" href="#">Alice Williams</a>
                    <span class="d-block">Company Agent</span>
                    <ul class="property-agent-contact list-unstyled">
                      <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                      <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                    </ul>
                  </div>
                </div>
                <div class="property-agent-popup">
                  <a href="#"><i class="fas fa-camera"></i> 06</a>
                </div>
              </div>
              <div class="property-details">
                <div class="property-details-inner">
                  <h5 class="property-title"><a href="property-detail-style-01.html">Ample apartment at last floor </a></h5>
                  <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Virginia drive temple hills</span>
                  <span class="property-agent-date"><i class="far fa-clock fa-md"></i>10 days ago</span>
                  <div class="property-price">$150.00<span> / month</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>1</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>2</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>145m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-favourites"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite" href="#"><i class="fas fa-heart text-danger"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="property-item">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="<?=base_url('website')?>/images/property/grid/02.jpg" alt="">
                <div class="property-lable">
                  <span class="badge badge-md bg-primary">Apartment</span>
                  <span class="badge badge-md bg-info">New </span>
                </div>
                <div class="property-agent">
                  <div class="property-agent-image">
                    <img class="img-fluid" src="<?=base_url('website')?>/images/avatar/02.jpg" alt="">
                  </div>
                  <div class="property-agent-info">
                    <a class="property-agent-name" href="#">John doe</a>
                    <span class="d-block">Company Agent</span>
                    <ul class="property-agent-contact list-unstyled">
                      <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                      <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                    </ul>
                  </div>
                </div>
                <div class="property-agent-popup">
                  <a href="#"><i class="fas fa-camera"></i> 12</a>
                </div>
              </div>
              <div class="property-details">
                <div class="property-details-inner">
                  <h5 class="property-title"><a href="property-detail-style-01.html">Awesome family home</a></h5>
                  <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Vermont dr. hephzibah</span>
                  <span class="property-agent-date"><i class="far fa-clock fa-md"></i>2 months ago</span>
                  <div class="property-price">$326.00<span> / month</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>2</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>3</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>215m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-favourites"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite" href="#"><i class="fas fa-heart text-danger"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="property-item">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="<?=base_url('website')?>/images/property/grid/03.jpg" alt="">
                <div class="property-lable">
                  <span class="badge badge-md bg-primary">Summer House</span>
                  <span class="badge badge-md bg-info">Hot </span>
                </div>
                <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
                <div class="property-agent">
                  <div class="property-agent-image">
                    <img class="img-fluid" src="<?=base_url('website')?>/images/avatar/03.jpg" alt="">
                  </div>
                  <div class="property-agent-info">
                    <a class="property-agent-name" href="#">Felica queen</a>
                    <span class="d-block">Investment</span>
                    <ul class="property-agent-contact list-unstyled">
                      <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                      <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                    </ul>
                  </div>
                </div>
                <div class="property-agent-popup">
                  <a href="#"><i class="fas fa-camera"></i> 03</a>
                </div>
              </div>
              <div class="property-details">
                <div class="property-details-inner">
                  <h5 class="property-title"><a href="property-detail-style-01.html">Contemporary apartment</a></h5>
                  <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Newport st. mebane, nc</span>
                  <span class="property-agent-date"><i class="far fa-clock fa-md"></i>6 months ago</span>
                  <div class="property-price">$658.00<span> / month</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>3</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>4</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>3,189m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-favourites"><a data-bs-toggle="tooltip" data-bs-placement="top" title="Favourite" href="#"><i class="fas fa-heart text-danger"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!--=================================
Saved Homes -->
          </div>

      </div>

    </div>
  </div>
</section>
<!--=================================
My profile -->