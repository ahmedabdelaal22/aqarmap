<!--=================================
Listing – grid view -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="section-title mb-3 mb-lg-4">
          <h2><span class="text-primary">156</span> Results</h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="property-filter-tag">
          <ul class="list-unstyled">
            <li><a href="#">Apartment <i class="fas fa-times-circle"></i> </a></li>
            <li><a class="filter-clear" href="#">Reset Search <i class="fas fa-redo-alt"></i> </a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 mb-5 mb-lg-0">
        <div class="sidebar">
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Advanced filter</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#filter-property" role="button" aria-expanded="false" aria-controls="filter-property"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="filter-property">
              <form class="mt-3">
                <div class="mb-2 select-border">
                  <select class="form-control basic-select">
                    <option>All Type</option>
                    <option>Villa</option>
                    <option>Apartment Building</option>
                    <option>Commercial</option>
                    <option>Office</option>
                    <option>Residential</option>
                    <option>Shop</option>
                    <option>Apartment</option>
                  </select>
                </div>
                <div class="mb-2 select-border">
                  <select class="form-control basic-select">
                    <option>For Rent</option>
                    <option>For Sale</option>
                  </select>
                </div>
                <div class="mb-2 select-border">
                  <select class="form-control basic-select">
                    <option>Distance from location</option>
                    <option>Within 1 mile</option>
                    <option>Within 3 miles</option>
                    <option>Within 5 miles</option>
                    <option>Within 10 miles</option>
                    <option>Within 15 miles</option>
                    <option>Within 30 miles</option>
                  </select>
                </div>
                <div class="mb-2 select-border">
                  <select class="form-control basic-select">
                    <option>Bedrooms</option>
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                  </select>
                </div>
                <div class="mb-2 select-border">
                  <select class="form-control basic-select">
                    <option>Sort by</option>
                    <option>Most popular</option>
                    <option>Highest price</option>
                    <option>Lowest price</option>
                    <option>Most reduced</option>
                  </select>
                </div>
                <div class="mb-2 select-border">
                  <select class="form-control basic-select">
                    <option>Select Floor</option>
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                  </select>
                </div>
                <div class="mb-2">
                  <input class="form-control" placeholder="Type (sq ft)">
                </div>
                <div class="mb-2">
                  <input class="form-control" placeholder="Type (sq ft)">
                </div>
                 <div class="mb-3 property-price-slider mt-3">
                  <label class="form-label">Select Price Range</label>
                  <input type="text" id="property-price-slider" name="example_name" value="" />
                </div>
                <div class="d-grid mb-2">
                  <button class="btn btn-primary align-items-center" type="submit"><i class="fas fa-filter me-1"></i><span>Filter</span></button>
                </div>
              </form>
            </div>
          </div>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Status of property</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#status-property" role="button" aria-expanded="false" aria-controls="status-property"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="status-property">
              <ul class="list-unstyled mb-0 pt-3">
                <li><a href="#">For rent<span class="ms-auto">(500)</span></a></li>
                <li><a href="#">For Sale<span class="ms-auto">(1200)</span></a></li>
              </ul>
            </div>
          </div>
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Type of property</h6>
              <a class="ms-auto" data-bs-toggle="collapse" href="#type-property" role="button" aria-expanded="false" aria-controls="type-property"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="type-property">
              <ul class="list-unstyled mb-0 pt-3">
                <li><a href="#">Residential<span class="ms-auto">(12)</span></a></li>
                <li><a href="#">Commercial<span class="ms-auto">(45)</span></a></li>
                <li><a href="#">Industrial<span class="ms-auto">(23)</span></a></li>
                <li><a href="#">Apartment<span class="ms-auto">(05)</span></a></li>
                <li><a href="#">Building code<span class="ms-auto">(10)</span></a></li>
                <li><a href="#">Communal land<span class="ms-auto">(47)</span></a></li>
                <li><a href="#">Insurability<span class="ms-auto">(32)</span></a></li>
              </ul>
            </div>
          </div>
          <div class="widget">
            <div class="widget-title">
              <h6>Mortgage calculator</h6>
            </div>
            <form>
              <div class="mb-2">
                <div class="input-group input-group-box">
                  <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                  <input type="text" class="form-control" placeholder="Total Amount">
                 </div>
              </div>
              <div class="mb-2">
                <div class="input-group input-group-box">
                  <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                  <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Down Payment">
                </div>
              </div>
              <div class="mb-2">
                <div class="input-group input-group-box">
                  <span class="input-group-text"><i class="fas fa-percent"></i></span>
                  <input type="text" class="form-control" placeholder="Interest Rate">
                 </div>
              </div>
              <div class="mb-2">
                <div class="input-group input-group-box">
                  <span class="input-group-text"><i class="far fa-clock"></i></span>
                  <input type="text" class="form-control" placeholder="Loan Term (Years)">
                </div>
              </div>
              <div class="mb-3 select-border">
                <select class="form-control basic-select">
                  <option>Monthly</option>
                  <option>Weekly</option>
                  <option>Yearly</option>
                </select>
              </div>
              <a class="btn btn-primary d-grid" href="#">Calculate</a>
            </form>
          </div>
          <div class="widget">
            <div class="widget-title">
              <h6>Recently listed properties</h6>
            </div>
            <div class="recent-list-item">
              <img class="img-fluid" src="<?=base_url('website')?>/images/property/list/01.jpg" alt="">
              <div class="recent-list-item-info">
                <a class="address mb-2" href="property-detail-style-01.html">Awesome family home</a>
                <span class="text-primary">$1,456,233 </span>
              </div>
            </div>
            <div class="recent-list-item">
              <img class="img-fluid" src="<?=base_url('website')?>/images/property/list/02.jpg" alt="">
              <div class="recent-list-item-info">
                <a class="address mb-2" href="property-detail-style-01.html">Contemporary apartment</a>
                <span class="text-primary">$2,496,454 </span>
              </div>
            </div>
            <div class="recent-list-item">
              <img class="img-fluid" src="<?=base_url('website')?>/images/property/list/03.jpg" alt="">
              <div class="recent-list-item-info">
                <a class="address mb-2" href="property-detail-style-01.html">Family home for sale</a>
                <span class="text-primary">$4,662,457 </span>
              </div>
            </div>
            <div class="recent-list-item">
              <img class="img-fluid" src="<?=base_url('website')?>/images/property/list/04.jpg" alt="">
              <div class="recent-list-item-info">
                <a class="address mb-2" href="property-detail-style-01.html">184 lexington avenue</a>
                <span class="text-primary">$2,456,452 </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="property-filter d-sm-flex">
          <ul class="property-short list-unstyled d-sm-flex mb-0">
            <li>
              <form class="form-inline">
                <div class="d-lg-flex d-block mb-sm-0 mb-3">
                  <label class="justify-content-start mb-2 mb-sm-0">Short by:</label>
                  <div class="short-by">
                    <select class="form-control basic-select">
                      <option>Date new to old</option>
                      <option>Price Low to High</option>
                      <option>Price High to Low</option>
                      <option>Date Old to New</option>
                      <option>Date New to Old</option>
                    </select>
                  </div>
                </div>
              </form>
            </li>
          </ul>
          <ul class="property-view-list list-unstyled d-flex mb-0">
            <li>
              <form class="form-inline">
                <div class="d-lg-flex d-block mb-3 mb-sm-0">

                </div>
              </form>
            </li>
          </ul>
        </div>
        <div class="row mt-4">
          <div class="col-sm-6">
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
                  <div class="property-price">$150.00<span> EGP</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>1</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>2</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>145m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-favourites"><a data-bs-toggle="tooltip" data-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
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
                  <div class="property-price">$326.00<span> EGP</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>2</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>3</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>215m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-favourites"><a data-bs-toggle="tooltip" data-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
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
                  <div class="property-price">$658.00<span> EGP</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>3</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>4</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>3,189m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-favourites"><a data-bs-toggle="tooltip" data-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="property-item">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="<?=base_url('website')?>/images/property/grid/04.jpg" alt="">
                <div class="property-lable">
                  <span class="badge badge-md bg-primary">Duplex</span>
                  <span class="badge badge-md bg-info">Hot </span>
                </div>
                <div class="property-agent">
                  <div class="property-agent-image">
                    <img class="img-fluid" src="<?=base_url('website')?>/images/avatar/04.jpg" alt="">
                  </div>
                  <div class="property-agent-info">
                    <a class="property-agent-name" href="#">Sara lisbon</a>
                    <span class="d-block">Construction</span>
                    <ul class="property-agent-contact list-unstyled">
                      <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                      <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                    </ul>
                  </div>
                </div>
                <div class="property-agent-popup">
                  <a href="#"><i class="fas fa-camera"></i> 04</a>
                </div>
              </div>
              <div class="property-details">
                <div class="property-details-inner">
                  <h5 class="property-title"><a href="property-detail-style-01.html">Family home for sale</a></h5>
                  <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Border st. nicholasville, ky</span>
                  <span class="property-agent-date"><i class="far fa-clock fa-md"></i>12 months ago</span>
                  <div class="property-price">$485.00<span> EGP</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>2</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>1</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>2,356m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-favourites"><a data-bs-toggle="tooltip" data-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="property-item">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="<?=base_url('website')?>/images/property/grid/05.jpg" alt="">
                <div class="property-lable">
                  <span class="badge badge-md bg-primary">Penthouses</span>
                  <span class="badge badge-md bg-info">Rent </span>
                </div>
                <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
                <div class="property-agent">
                  <div class="property-agent-image">
                    <img class="img-fluid" src="<?=base_url('website')?>/images/avatar/05.jpg" alt="">
                  </div>
                  <div class="property-agent-info">
                    <a class="property-agent-name" href="#">Mellissa Doe</a>
                    <span class="d-block">Founder & CEO</span>
                    <ul class="property-agent-contact list-unstyled">
                      <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                      <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                    </ul>
                  </div>
                </div>
                <div class="property-agent-popup">
                  <a href="#"><i class="fas fa-camera"></i> 10</a>
                </div>
              </div>
              <div class="property-details">
                <div class="property-details-inner">
                  <h5 class="property-title"><a href="property-detail-style-01.html">Luxury villa with pool</a></h5>
                  <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>West Indian St. Missoula</span>
                  <span class="property-agent-date"><i class="far fa-clock fa-md"></i>2 years ago</span>
                  <div class="property-price">$698.00<span> EGP</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>5</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>4</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>1,658m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-favourites"><a data-bs-toggle="tooltip" data-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="property-item">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="<?=base_url('website')?>/images/property/grid/06.jpg" alt="">
                <div class="property-lable">
                  <span class="badge badge-md bg-primary">Studio</span>
                  <span class="badge badge-md bg-info">New </span>
                </div>
                <div class="property-agent">
                  <div class="property-agent-image">
                    <img class="img-fluid" src="<?=base_url('website')?>/images/avatar/06.jpg" alt="">
                  </div>
                  <div class="property-agent-info">
                    <a class="property-agent-name" href="#">Michael Bean</a>
                    <span class="d-block">Research</span>
                    <ul class="property-agent-contact list-unstyled">
                      <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                      <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                    </ul>
                  </div>
                </div>
                <div class="property-agent-popup">
                  <a href="#"><i class="fas fa-camera"></i> 02</a>
                </div>
              </div>
              <div class="property-details">
                <div class="property-details-inner">
                  <h5 class="property-title"><a href="property-detail-style-01.html">184 lexington avenue</a></h5>
                  <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Hamilton rd. willoughby, oh</span>
                  <span class="property-agent-date"><i class="far fa-clock fa-md"></i>3 years ago</span>
                  <div class="property-price">$236.00<span> EGP</span> </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>2</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>2</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>3,657m</span></li>
                  </ul>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-favourites"><a data-bs-toggle="tooltip" data-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <ul class="pagination mt-3">
              <li class="page-item disabled me-auto">
                <span class="page-link b-radius-none">Prev</span>
              </li>
              <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item ms-auto">
                <a class="page-link b-radius-none" href="#">Next</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Listing – grid view -->