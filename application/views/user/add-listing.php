<!--=================================
Submit Property -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title d-flex align-items-center">
          <h2>Submit Property</h2>
        </div>
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('user/add-realestates'); ?>">

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
               
                  <div class="row">
                    <input type="hidden" value="<?=$this->session->userdata('UserId')?>" name="vid"/>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Real Estates Name (en) </label>
                      <input type="text"  name="name"  value="<?=  set_value('name')?>" class="form-control" placeholder="Enter Real Estates Name (en)">
                      <?php echo form_error('name'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Real Estates Name (ar) </label>
                      <input type="text"  name="res_name_a"   value="<?=  set_value('res_name_a')?>" class="form-control" placeholder="Enter Real Estates Name (ar)">
                      <?php echo form_error('res_name_a'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Description (en)</label>
                      <textarea class="form-control" name="res_desc" rows="4" >
                      <?=  set_value('res_desc')?>
                      </textarea>
                      <?php echo form_error('res_desc'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Description (ar)</label>
                      <textarea class="form-control" name="res_desc_a" rows="4" >
                      <?=  set_value('res_desc_a')?>
                      </textarea>
                      <?php echo form_error('res_desc_a'); ?>
                    </div>

                    <div class="mb-3 col-md-6">
                      <label class="form-label">Address (en) </label>
                      <input type="text"  name="res_address" value="<?=  set_value('res_address')?>"  class="form-control" placeholder="Enter Address (en)">
                      <?php echo form_error('res_address'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Address (ar) </label>
                      <input type="text"  name="res_address_a" value="<?=  set_value('res_address_a')?>"  class="form-control" placeholder="Enter Address (ar)">
                      <?php echo form_error('res_address_a'); ?>
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label">Categories</label>
                      <select class="form-control basic-select" name="cat_id" >
                      <?php $category = $this->admin_model->get_all_cat_with_child(); ?>
                      <?php foreach ($category as $listing) : ?>
												<?php getallsub($listing) ?>
											<?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label">Regions</label>
                      <select class="form-control basic-select" name="region_id"  >
                      <?php $regions = $this->admin_model->get_regions(); ?>
											<?php foreach ($regions as $listing) : ?>
												<option value="<?php echo $listing['id']; ?>" ><?php echo $listing['name_ar']; ?></option>
											<?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Overlooking (en) </label>
                      <input type="text"  name="overlooking"  value="<?=  set_value('overlooking')?>"  class="form-control" placeholder="Enter Overlooking (en)">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Overlooking (ar) </label>
                      <input type="text"  name="overlooking_a" value="<?=  set_value('overlooking_a')?>"  class="form-control" placeholder="Enter Overlooking (ar)">
                    </div>

                    <div class="mb-3 col-md-6">
                      <label class="form-label">phone </label>
                      <input type="text"  name="res_phone"  value="<?=  set_value('res_phone')?>"  class="form-control" placeholder="Enter phone">
                      <?php echo form_error('res_phone'); ?>
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label">Type</label>
                      <select class="form-control basic-select" name="type"  >
                      <?php foreach (types() as $key => $value) : ?>
												<option value="<?php echo $key; ?>" ><?php echo $value ?></option>
											<?php endforeach; ?>
                      </select>
                    </div>

                    <div class="mb-3 col-md-6">
                      <label class="form-label">Price </label>
                      <input type="text"  name="discount" value="<?=  set_value('discount')?>"   class="form-control" placeholder="Enter Price">
                      <?php echo form_error('discount'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Space </label>
                      <input type="text"  name="space"  value="<?=  set_value('space')?>" class="form-control" placeholder="Enter Space">
                      <?php echo form_error('space'); ?>
                    </div>

                    <div class="mb-3 col-md-6">
                      <label class="form-label">floor </label>
                      <input type="text" name="floor" value="<?=  set_value('res_name_a')?>"  class="form-control" placeholder="Enter floor">
                      <?php echo form_error('floor'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Rooms </label>
                      <input type="text"  name="rooms"   value="<?=  set_value('rooms')?>" class="form-control" placeholder="Enter rooms">
                      <?php echo form_error('rooms'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">baths </label>
                      <input type="text" name="baths"  value="<?=  set_value('baths')?>" class="form-control" placeholder="Enter baths">
                      <?php echo form_error('baths'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Year Of Construction </label>
                      <input type="text"  name="year_of_construction" value="<?=  set_value('year_of_construction')?>"   class="form-control" placeholder="Year Of Construction">
                      <?php echo form_error('year_of_construction'); ?>
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label">Payment Method</label>
                      <select class="form-control basic-select" name="payment_method"  >
                      <?php foreach (payment_method() as $key => $value) : ?>
												<option value="<?php echo $key; ?>" ><?php echo $value ?></option>
											<?php endforeach; ?>
                      </select>
                    </div>
                    <div class="radio mb-3 col-md-6">
											<label>
												<input type="checkbox" id="optionsrealcom" name="real_compound" value="1">
											</label>
											عقارات داخل كمبوند 
										</div>
                  </div>

                  
           
              </div>
              <div class="tab-pane fade" id="tab-02" role="tabpanel" aria-labelledby="tab-02-tab">
                     <div class="mb-3 col-md-12">
                      <label class="form-label">Embed Video on Yotube </label>
                      <input type="text"  name="video" value="<?=  set_value('video')?>"  focusable="false"  class="form-control" placeholder="Enter Video">
                      <?php echo form_error('video'); ?>
                    </div>
              
                <div class="input-group file-upload">
                  <input type="file" name="logo" class="form-control" id="customFile">
                  <label class="input-group-text" for="customFile">Real Estates Logo</label>
                  <?php echo form_error('logo'); ?>
                  <br>
                </div>
                <div class="input-group file-upload">
                  <input type="file"  name="res_image[]" focusable="false" class="form-control"  multiple>
                  <label class="input-group-text" for="customFile">Real Estates Images</label>
                  <?php echo form_error('res_image'); ?>
                </div>
              </div>
              <div class="tab-pane fade" id="tab-03" role="tabpanel" aria-labelledby="tab-03-tab">
                  <div class="row mt-4">
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Latitude </label>
                      <input type="text" class="form-control" value="<?=  set_value('lat')?>"  name="lat" placeholder="Enter latitude ...">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Longitude</label>
                      <input type="text" class="form-control"value="<?=  set_value('lon')?>" name="lon" placeholder="Enter longitude ...">
                    </div>
             
                  </div>
            
              </div>
              <div class="tab-pane fade" id="tab-04" role="tabpanel" aria-labelledby="tab-04-tab">
       
                  <div class="row mt-4">
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Education (en)</label>
                      <textarea class="form-control" name="education" rows="4" >
                      <?=  set_value('education')?>
                      </textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Education (ar)</label>
                      <textarea class="form-control" name="education_a" rows="4" >
                      <?=  set_value('education_a')?>
                      </textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Health Medical (en)</label>
                      <textarea class="form-control" name="health_medical" rows="4" >
                      <?=  set_value('health_medical')?>
                      </textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Health Medical (ar)</label>
                      <textarea class="form-control" name="health_medical_a" rows="4" >
                      <?=  set_value('health_medical_a')?>
                    </textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Transportation (en)</label>
                      <textarea class="form-control" name="transportation" rows="4" >
                      <?=  set_value('transportation')?>
                      </textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label">Transportation (ar)</label>
                      <textarea class="form-control" name="transportation_a" rows="4" >
                      <?=  set_value('transportation_a')?>
                      </textarea>
                    </div>
                   
                  </div>
              
              </div>
            </div>
     
            
          </div>
          <div class="col-md-12">
                      <button class="btn btn-primary" type="submit">Save</button>
                    </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!--=================================
Submit Property -->