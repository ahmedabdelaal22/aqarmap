<div class=" ">
<?php 
				$regions = $this->admin_model->get_all_regions();
			 ?>
	<header class="page_header ds">
		<div class="container">
			<div class="row align-items-center tophead">
				<div class="logo_con full_logo col-md-2">
					<a href="index.html" class="logo text-center">
						<img src="<?=base_url('website')?>/images/logo/logofinal.png" alt="">
					</a>
				</div>
				<?php $locale=$this->session->userdata('locale');?>
				<div class="logo_con logo_respo col-md-2">
					<a href="<?=base_url('/')?>" class="logo text-center">
						<img src="<?=base_url('website')?>/images/logo/logo_v.png" alt="">
					</a>
				</div>
				<div class="col-md-4 main_menu">

						<nav class="top-nav">
						<ul class="nav sf-menu">
							<li class=<?php if($this->uri->segment(1)==""){echo "active";}?>>
								<a href="<?=base_url('/')?>"><?php echo $this->lang->line('home') ?></a>
							</li>
							<li class=<?php if($this->uri->segment(1)=="categories-all"){echo "active";}?>>
								<a href="<?=base_url('/categories-all')?>"><?php echo $this->lang->line('categories') ?></a>
							</li>
							<li class=<?php if($this->uri->segment(1)=="offers"){echo "active";}?>>
								<a href="<?=base_url('/offers')?>"><?php echo $this->lang->line('offers') ?></a>
							</li>
							<li class=<?php if($this->uri->segment(1)=="about"){echo "active";}?>>
								<a href="<?=base_url('/about')?>"><?php echo $this->lang->line('about_us') ?></a>
							</li>
							<li class=<?php if($this->uri->segment(1)=="contact"){echo "active";}?>>
								<a href="<?=base_url('/contact')?>"><?php echo $this->lang->line('contact_us') ?></a>
							</li>						
							<!--<li>
								<a href="<?=base_url('categories-all')?>">categories</a>
								<ul>
									<?php

                                    $category = $this->admin_model->get_all_category();
                                          ?>
									<?php if(isset($category)){ $cnt=1; ?>
									<?php foreach($category as $row) { ?>
									<li>
										<a href="<?php echo base_url('categories/').$row->id?>">
											<?php echo $row->c_name; ?> </a>
									</li>

									<?php }
                                                            }
                                                   ?>
								</ul>
							</li>-->
							<!-- blog -->

							<!-- gallery -->
							<!--<li>
								<?php 
							$userid=	$this->session->userdata('UserId');
							if(!empty($userid)){
								?>

								<a href="#"><?=$this->session->userdata('aname')?></a>
								<ul>
							        	<li>
								            <a href="<?=base_url('profile')?>">profile</a>
						             	</li>
										 <li>
								            <a href="<?=base_url('logout')?>">logout</a>
						             	</li>
								</ul>
						
								<?php } else{?>
									<a href="#">login</a>
									<ul>
							        	<li>
								            <a href="<?=base_url('login')?>">Login</a>
						             	</li>
										 <li>
								            <a href="<?=base_url('register')?>">Register</a>
						             	</li>
								</ul>

									<?php }?>
							</li>-->

							<!-- eof blog -->

						
							<!--<li>
								<a href="<?=base_url('contact')?>">Contacts</a>
								<ul>
							        	<li>
								            <a href="<?=base_url('contact')?>">Contacts</a>
						             	</li>
										 <li>
								            <a href="<?=base_url('subscribe')?>">Subscribe Resturant</a>
						             	</li>
								</ul>
							</li>
							<li>
								<a href="<?=base_url('/offers')?>">Offers</a>
							</li>-->
						</ul>
					</nav>

				</div>
<div class="tophead_search_form col-md-6">
	<div class="container">
		<div class="row">
			<div class="add_project"><a class="btn btn-primary" href="#">اضف مشروعك</a></div>
			<form method="POST" name="searchaction"action="<?=base_url('/search')?>">
			<div class=" keyword"><input type="text" name="search" placeholder="<?php echo $this->lang->line('key_search') ?>" class="search-text"><a href="#" class="icon"></a></div><div class=" location">
			<select name="region_id" id="region_id" class="search-text">
		<?php	foreach ($regions as $row) {?>
  <option value="<?php echo $row->id; ?>"><?php echo $row->name_ar; ?></option>
   <?php } ?>
      </select>
	  </form>
			<!-- <input type="text" name="search" placeholder="<?php echo $this->lang->line('location_search') ?>" class="search-text"> -->
			<a href="#" class="icon"></a></div>
			<div class="tophead_icons text-left">
	<a href="#"><img width="25" height="25" src="<?=base_url('website')?>/images/head_icon_lock.png" ></a>
	<a href="#"><img width="25" height="25" src="<?=base_url('website')?>/images/head_icon_star.png" ></a>
</div>
		</div>
</div>
</div>
<span class="toggle_menu">
			<span></span>
		</span>
</div>

		</div>
		<!-- header toggler -->

	</header>
</div>
<span class="toggle_menu_side header-slide">
	<span></span>
</span>
<script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            //your function call here
            document.searchaction.submit();
        }
    }
	$(document).ready(function() {
  $('#region_id').on('change', function() {
	document.searchaction.submit();
  });
});
 

</script>
