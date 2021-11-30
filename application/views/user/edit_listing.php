<!--=================================
Submit Property -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title d-flex align-items-center">
          <h2><?php echo $this->lang->line('edit_listing') ?></h2>
        </div>
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('user/update-realestates'); ?>">

        <div class="row">
          <div class="col-12">
            <ul class="nav nav-tabs nav-tabs-03 nav-fill" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="tab-01-tab" data-bs-toggle="tab" href="#tab-01" role="tab" aria-controls="tab-01" aria-selected="true">
                  <span>01</span>
                  <?php echo $this->lang->line('basic_information') ?>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab-02-tab" data-bs-toggle="tab" href="#tab-02" role="tab" aria-controls="tab-02" aria-selected="false">
                  <span>02</span>
                <?php echo $this->lang->line('gallery') ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab-03-tab" data-bs-toggle="tab" href="#tab-03" role="tab" aria-controls="tab-03" aria-selected="false"
                  ><span>03</span>
                <?php echo $this->lang->line('location') ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab-04-tab" data-bs-toggle="tab" href="#tab-04" role="tab" aria-controls="tab-04" aria-selected="false">
                  <span>04</span>
                <?php echo $this->lang->line('detailed_information') ?></a>
              </li>
            </ul>
            <div class="tab-content mt-4" id="myTabContent">
              <div class="tab-pane fade show active" id="tab-01" role="tabpanel" aria-labelledby="tab-01-tab">
               
                  <div class="row">
                  <input type="hidden" name="id" value="<?php echo $restaurant->res_id; ?>">

                    <input type="hidden" value="<?=$this->session->userdata('UserId')?>" name="vid"/>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('property_name_en') ?> </label>
                      <input type="text"  name="name"  value="<?php echo $restaurant->res_name; ?>" class="form-control" placeholder="<?php echo $this->lang->line('property_name_en') ?>">
                      <?php echo form_error('name'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('property_name_ar') ?> </label>
                      <input type="text"  name="res_name_a"   value="<?php echo $restaurant->res_name_a; ?>" class="form-control" placeholder="<?php echo $this->lang->line('property_name_ar') ?>">
                      <?php echo form_error('res_name_a'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('description_en') ?></label>
                      <textarea class="form-control" name="res_desc" rows="4" >
                      <?php echo $restaurant->res_desc; ?>
                      </textarea>
                      <?php echo form_error('res_desc'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('description_ar') ?></label>
                      <textarea class="form-control" name="res_desc_a" rows="4" >
                      <?php echo $restaurant->res_desc_a; ?>
                      </textarea>
                      <?php echo form_error('res_desc_a'); ?>
                    </div>

                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('description_en') ?> </label>
                      <input type="text"  name="res_address" value="<?php echo $restaurant->res_address; ?>"  class="form-control" placeholder="<?php echo $this->lang->line('description_en') ?>">
                      <?php echo form_error('res_address'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('description_ar') ?> </label>
                      <input type="text"  name="res_address_a" value="<?php echo $restaurant->res_address_a; ?>"  class="form-control" placeholder="<?php echo $this->lang->line('description_ar') ?>">
                      <?php echo form_error('res_address_a'); ?>
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label"><?php echo $this->lang->line('categories') ?></label>
                      <select class="form-control basic-select" name="cat_id" >
                      <?php $category = $this->admin_model->get_category();?>
                      <?php foreach ($category as $listing) : ?>
                        <option value="<?php echo $listing['id']; ?>"  <?php if ($listing['id'] == $restaurant->cat_id) echo "selected='selected'"; ?>  >
                   
                   <?php if($this->session->userdata('site_lang') == 'english'){?>
                     <?php echo $listing['c_name']; ?>       
                 <?php }else{?>
                   <?php echo $listing['c_name_a']; ?>      
                 <?php }?>
                 </option>
											<?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label"><?php echo $this->lang->line('regions') ?></label>
                      <select class="form-control basic-select" name="region_id"  >
                      <?php $regions = $this->admin_model->get_regions(); ?>
											<?php foreach ($regions as $listing) : ?>
												<option value="<?php echo $listing['id']; ?>" <?php if ($listing['id'] == $restaurant->region_id) echo "selected='selected'"; ?>  >
                        <?php if($this->session->userdata('site_lang') == 'english'){?>
                        <?php echo $listing['name_en']; ?>
                        <?php }else{?>
                          <?php echo $listing['name_ar']; ?>
                          <?php }?>
                      
                      </option>
											<?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('overlooking_en') ?> </label>
                      <input type="text"  name="overlooking"  value="<?php echo $restaurant->overlooking; ?>"  class="form-control" placeholder="<?php echo $this->lang->line('overlooking_en') ?>">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('overlooking_ar') ?> </label>
                      <input type="text"  name="overlooking_a" value="<?php echo $restaurant->overlooking_a; ?>"  class="form-control" placeholder="<?php echo $this->lang->line('overlooking_ar') ?>">
                    </div>

                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('phone') ?> </label>
                      <input type="text"  name="res_phone"  value="<?php echo $restaurant->res_phone; ?>"  class="form-control" placeholder="<?php echo $this->lang->line('phone') ?>">
                      <?php echo form_error('res_phone'); ?>
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label"><?php echo $this->lang->line('status') ?></label>
                      <select class="form-control basic-select" name="type"  >
                      <?php foreach (types() as $key => $value) : ?>
												<option value="<?php echo $key; ?>" <?php if ($key == $restaurant->type) echo "selected='selected'"; ?>><?php echo $value ?></option>
											<?php endforeach; ?>
                      </select>
                    </div>

                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('price') ?> </label>
                      <input type="text"  name="discount" value="<?php echo $restaurant->discount; ?>"   class="form-control" placeholder="<?php echo $this->lang->line('price') ?>">
                      <?php echo form_error('discount'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('property_size') ?> </label>
                      <input type="text"  name="space"  value="<?php echo $restaurant->space; ?>" class="form-control" placeholder="<?php echo $this->lang->line('property_size') ?>">
                      <?php echo form_error('space'); ?>
                    </div>

                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('floor') ?> </label>
                      <input type="text" name="floor" value="<?php echo $restaurant->floor; ?>"  class="form-control" placeholder="<?php echo $this->lang->line('floor') ?>">
                      <?php echo form_error('floor'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('rooms') ?> </label>
                      <input type="text"  name="rooms"   value="<?php echo $restaurant->rooms; ?>" class="form-control" placeholder="<?php echo $this->lang->line('rooms') ?>">
                      <?php echo form_error('rooms'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('bathrooms') ?> </label>
                      <input type="text" name="baths"  value="<?php echo $restaurant->baths; ?>" class="form-control" placeholder="<?php echo $this->lang->line('bathrooms') ?>">
                      <?php echo form_error('baths'); ?>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('year_built') ?> </label>
                      <input type="text"  name="year_of_construction" value="<?php echo $restaurant->year_of_construction; ?>"   class="form-control" placeholder="<?php echo $this->lang->line('year_built') ?>">
                      <?php echo form_error('year_of_construction'); ?>
                    </div>
                    <div class="mb-3 col-md-6 select-border">
                      <label class="form-label"><?php echo $this->lang->line('payment_method') ?></label>
                      <select class="form-control basic-select" name="payment_method"  >
                      <?php foreach (payment_method() as $key => $value) : ?>
												<option value="<?php echo $key; ?>" <?php if ($key == $restaurant->payment_method) echo "selected='selected'"; ?>><?php echo $value ?></option>
										<?php endforeach; ?>
                      </select>
                    </div>
                    <div class="radio mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('properties_within_compound') ?> </label>
											<div>
                      <?php
										$chk3 = explode(",", $restaurant->real_compound);
										?>
												<input type="checkbox" id="optionsrealcom" name="real_compound" <?php if (in_array("1", $chk3)) echo "checked='checked'"; ?> value="1">
                        <?php echo $this->lang->line('properties_within_compound') ?>
											</div>
										</div>
                  </div>

                  <a class="btn btn-primary btnNext" ><?php echo $this->lang->line('next') ?></a>
           
              </div>
              <div class="tab-pane fade" id="tab-02" role="tabpanel" aria-labelledby="tab-02-tab">
              <div class="mb-3 col-md-12">
                      <label class="form-label"><?php echo $this->lang->line('embed_video') ?> </label>
                      <input type="text"  name="video" value="<?php echo $restaurant->video; ?>"  focusable="false"  class="form-control" placeholder="<?php echo $this->lang->line('embed_video_link') ?>">
                      <br>
                      <div class="embed-responsive embed-responsive-16by9" style="width: 250px;">
                    <iframe src="https://www.youtube.com/embed/<?=$restaurant->video?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                    
                </div>

                      <?php echo form_error('video'); ?>
                    </div>
              <div class="mb-3 col-md-12">
                <div class="input-group file-upload">
                  <input type="file" name="logo" class="form-control" id="customFile">
                  <label class="input-group-text" for="customFile"><?php echo $this->lang->line('property_logo') ?></label>
                  <?php echo form_error('logo'); ?>
                  <br>
                </div>
                  <?php if ($restaurant->logo) { ?>
                      <img src="<?php echo base_url('uploads/') . $restaurant->logo; ?>" class="res_image" height="70" width="70">
                    <?php } ?>                
              </div>
              <div class="mb-3 col-md-12">
                <div class="input-group file-upload">
                  <input type="file"  name="res_image[]" focusable="false" class="form-control"  multiple>
                  <label class="input-group-text" for="customFile"><?php echo $this->lang->line('property_images') ?></label>
                  <?php echo form_error('res_image'); ?>

                </div>
                  <?php $images = explode("::::", $restaurant->res_image); ?>
                    <?php foreach ($images as $key => $image) { ?>
                      <img src="<?php echo base_url('uploads/') . $image ?>" class="res_image" height="70" width="70">
                    <?php } ?>                
              </div>
              <a class="btn btn-primary btnPrevious" ><?php echo $this->lang->line('prev') ?></a>
             <a class="btn btn-primary btnNext" ><?php echo $this->lang->line('next') ?></a>
        
              </div>
              <div class="tab-pane fade" id="tab-03" role="tabpanel" aria-labelledby="tab-03-tab">
                  <div class="row mt-4">
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('latitude') ?> </label>
                      <input type="text" class="form-control" value="<?php echo $restaurant->lat; ?>"  name="lat" placeholder="<?php echo $this->lang->line('latitude') ?> ...">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('longitude') ?></label>
                      <input type="text" class="form-control"value="<?php echo $restaurant->lon; ?>" name="lon" placeholder="<?php echo $this->lang->line('longitude') ?> ...">
                    </div>
             
                  </div>
                  <a class="btn btn-primary btnPrevious" ><?php echo $this->lang->line('prev') ?></a>
            <a class="btn btn-primary btnNext" ><?php echo $this->lang->line('next') ?></a>
        
              </div>
              <div class="tab-pane fade" id="tab-04" role="tabpanel" aria-labelledby="tab-04-tab">
       
                  <div class="row mt-4">
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('education_en') ?></label>
                      <textarea class="form-control" name="education" rows="4" >
                      <?php echo $restaurant->education; ?>
                      </textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('education_ar') ?></label>
                      <textarea class="form-control" name="education_a" rows="4" >
                      <?php echo $restaurant->education_a; ?>
                      </textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('health_care_en') ?></label>
                      <textarea class="form-control" name="health_medical" rows="4" >
                      <?php echo $restaurant->health_medical; ?>
                      </textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('health_care_ar') ?></label>
                      <textarea class="form-control" name="health_medical_a" rows="4" >
                      <?php echo $restaurant->health_medical_a; ?>
                    </textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('transportation_en') ?></label>
                      <textarea class="form-control" name="transportation" rows="4" >
                      <?php echo $restaurant->transportation; ?>
                      </textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label"><?php echo $this->lang->line('transportation_ar') ?></label>
                      <textarea class="form-control" name="transportation_a" rows="4" >
                      <?php echo $restaurant->transportation_a; ?>
                      </textarea>
                    </div>
                            
 
                  </div>
                  <a class="btn btn-primary btnPrevious" ><?php echo $this->lang->line('next') ?></a>
              <button class="btn btn-primary" type="submit"><?php echo $this->lang->line('save') ?></button>
              
              </div>
            </div>
     
            
          </div>

        </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!--=================================
Submit Property -->

<script type="text/javascript">
  $('.btnNext').on('click', function(event) {
    $current_tab = $('.nav-tabs  .active');
    $next_tab = $('.nav-tabs  .active').parent().next('li').find('a');
    $current_tab.removeClass('active');
    $next_tab.addClass('active');
    $(this).parent().removeClass('show active').next('.tab-pane').addClass('show active');
  });

  $('.btnPrevious').on('click', function(event) {
    $current_tab = $('.nav-tabs  .active');
    $next_tab = $('.nav-tabs  .active').parent().prev('li').find('a');
    $current_tab.removeClass('active');
    $next_tab.addClass('active');
    $(this).parent().removeClass('show active').prev('.tab-pane').addClass('show active');
  });
</script>