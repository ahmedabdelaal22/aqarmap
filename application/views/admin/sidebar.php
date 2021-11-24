<?php
  $id = $this->session->userdata('aid');
  $profile = $this->admin_model->get_admin($id);

  $uri=$this->uri->segment(2);
?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admin/dashboard'); ?>" class="brand-link">
      <img src="<?php echo base_url();?>uploads/nylitical_white_logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Nylitical</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        
          <img src="<?php echo base_url();  ?>uploads/profile_pics/<?php echo $profile['img'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url('admin/profile'); ?>" class="d-block"><?php echo $profile['name'] ?></a>
        </div>
        <div class="pull-right">
            <a href="<?php echo base_url('admin/logout'); ?>"><i class="nav-icon fa fa-sign-out pull-right" style="margin-left: 90px;margin-top: 11px;" data-toggle="tooltip" data-placement="top" title="Sign-out"></i></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
              </p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
            </ul>
          </li> -->

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/user-list'); ?>">
              <i class="nav-icon fa fa-user-o"></i>
              <p>
                User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Vendor
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/create-vendor'); ?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Vendor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/vendor-list'); ?>" class="nav-link">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>Vendor List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-scribd"></i>
              <p>
                Real Estates
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/create-restaurants'); ?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Real Estates</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/restaurants-list'); ?>" class="nav-link">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>Real Estates List</p>
                </a>
              </li>
            </ul>
          </li>


          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/settings'); ?>">
              <i class="nav-icon fa fa-heart"></i>
              <p>
              Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/neweslater'); ?>">
              <i class="nav-icon fa fa-heart"></i>
              <p>
              Newes Later
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/contacts'); ?>">
              <i class="nav-icon fa fa-heart"></i>
              <p>
              Contacts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/request_store'); ?>">
              <i class="nav-icon fa fa-heart"></i>
              <p>
              Request Real Estates
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/likes-list'); ?>">
              <i class="nav-icon fa fa-heart"></i>
              <p>
                List Of Real Estates Likes
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/reviews-list'); ?>">
              <i class="nav-icon fa fa-star"></i>
              <p>
                List Of Real Estates Reviews
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-laptop"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/create-category'); ?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/category-list'); ?>" class="nav-link">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>Category List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-laptop"></i>
              <p>
                Regions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/create-regions'); ?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Region</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/regions-list'); ?>" class="nav-link">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>Regions List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-laptop"></i>
              <p>
              Locations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('admin/create-locations'); ?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add locations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('admin/locations-list'); ?>" class="nav-link">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>locations List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-btc"></i>
            <p>
              Banners
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/create-banners'); ?>" class="nav-link">
                <i class="fa fa-plus nav-icon"></i>
                <p>Add Banners</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/banners-list'); ?>" class="nav-link">
                <i class="fa fa-list-ul nav-icon"></i>
                <p>Banners List</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-btc"></i>
            <p>
              Offers
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('admin/create-offers'); ?>" class="nav-link">
                <i class="fa fa-plus nav-icon"></i>
                <p>Add Offer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/offers-list'); ?>" class="nav-link">
                <i class="fa fa-list-ul nav-icon"></i>
                <p>Offers List</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
			<a href="#" class="nav-link">
				<i class="nav-icon fa fa-bell"></i>
				<p>
					Notifications
					<i class="fas fa-angle-left right"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
         <li class="nav-item">
					<a href="<?php echo base_url('admin/notifications'); ?>" class="nav-link">
						<i class="fa fa-angle-double-right nav-icon"></i>
						<p>User Notifications</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('admin/user-notifications'); ?>" class="nav-link">
						<i class="fa fa-angle-double-right nav-icon"></i>
						<p>Send Notifications</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?php echo base_url('admin/vendor-notifications'); ?>" class="nav-link">
						<i class="fa fa-angle-double-right nav-icon"></i>
						<p>Vendor Notifications</p>
					</a>
				</li>
			</ul>
		</li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>