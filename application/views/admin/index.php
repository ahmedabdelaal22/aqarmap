<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
         <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
               <div class="info-box">
                 <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>

                     <div class="info-box-content">
                        <span class="info-box-text">Total User</span>
                        <span class="info-box-number">
                        <?php echo $this->admin_model->get_total_users(); ?>
                        </span>
                     </div>
                 <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
            </div>
             <!-- /.col -->
             <div class="col-12 col-sm-6 col-md-3">
               <div class="info-box mb-3">
                 <span class="info-box-icon bg-success elevation-1"><i class="ion ion-bag"></i></span>

                 <div class="info-box-content">
                   <span class="info-box-text">Total Real Estates</span>
                   <span class="info-box-number"><?php echo $this->admin_model->get_total_restaurants(); ?></span>
                 </div>
                 <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
             </div>
             <!-- /.col -->

             <!-- fix for small devices only -->
             <div class="clearfix hidden-md-up"></div>

             <div class="col-12 col-sm-6 col-md-3">
               <div class="info-box mb-3">
                 <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-laptop"></i></span>

                 <div class="info-box-content">
                   <span class="info-box-text">Total Categories</span>
                   <span class="info-box-number"><?php echo $this->admin_model->get_total_category(); ?></span>
                 </div>
                 <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
             </div>
             <!-- /.col -->
             <div class="col-12 col-sm-6 col-md-3">
               <div class="info-box mb-3">
                 <span class="info-box-icon bg-blue elevation-1"><i class="fa fa-star-o"></i></span>

                 <div class="info-box-content">
                   <span class="info-box-text">Total Reviews</span>
                   <span class="info-box-number"><?php echo $this->admin_model->get_total_reviews(); ?></span>
                 </div>
                 <!-- /.info-box-content -->
               </div>
               <!-- /.info-box -->
             </div>
             <!-- /.col -->
         </div>
         <!-- /.row -->

      </div><!--/. container-fluid -->
   </section>
    <!-- /.content -->
<?php 
   $reviews = $this->admin_model->get_allreview(); 
   $users = $this->admin_model->get_new_users(); 
?>
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-6">
               <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Last 10 Reviews</h3>
                     </div>
                    <!-- /.card-header -->
                     <div class="card-body">
                        <table id="reviews_table" class="table table-bordered table-striped">
                           <thead>
                           <tr>
                              <th>Sr no</th>
                              <th>User Name</th>
                              <th>Real Estates Name</th>
                              <!-- <th>Star</th> -->
                              <th>Text</th>
                              <th>Date</th>
                              <!-- <th>Action</th> -->
                           </tr>
                           </thead>
                           
                           <tbody>
                         
                           <?php if(isset($reviews)){ $cnt=1; ?>  
                           <?php foreach($reviews as $listing) { ?>
                           <tr>
                              <td><?php echo $cnt++; ?></td>
                              <td><?php 
                              $lid=$listing->rev_user;
                              
                              $query = $this->db->select('*')
                                        ->from('user')
                                        ->where('id',$lid)
                                        ->get();
                            $fetch=$query->row();
                              
                                 if(!empty($fetch->username))
                                {
                                    echo $fetch->username;
                                }
                                else
                                {
                                   echo "";
                                }
                                
                                    ?></td>
                                <td><?php 
                                    $lida=$listing->rev_res;
                                    
                                    $querya = $this->db->select('*')
                                              ->from('restaurants')
                                              ->where('res_id',$lida)
                                              ->get();
                                  $fetcha=$querya->row();
                                    
                                if(!empty($fetcha->res_name))
                                {
                                    echo $fetcha->res_name;
                                }
                                else
                                {
                                   echo "";
                                }
                              ?></td>
                              <!-- <td><?php echo $listing->rev_stars; ?></td> -->
                              <td><?php echo $listing->rev_text; ?></td>
                              <td><?php echo gmdate('d M Y', $listing->rev_date); ?></td>
                           <!-- <td><a href="<?php echo base_url('admin/delete_review/'.$listing->rev_id); ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td> -->
                            </tr>          
                           <?php } ?>    
                           <?php } ?>
                           </tbody>
                        </table>
                     </div>
                    <!-- /.card-body -->
               </div>
            </div>

            <div class="col-6">
               <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Last 10 New User</h3>
                     </div>
                    <!-- /.card-header -->
                     <div class="card-body">
                        <table id="user_table" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                       <th>Sr no</th>
                       <th>User Name</th>
                       <th>Email</th>
                       <th>Image</th>
                       <!-- <th>Actions</th> -->
                     </tr>
                     </thead>
                     
                     <tbody>
                   
                     <?php if(isset($users)){ $cnt=1; ?>  
                     <?php foreach($users as $row) { ?>
                     <tr>
                       <td><?php echo $cnt++; ?></td>
                       <td><?php echo $row->username; ?></td>
                       <td><?php echo $row->email; ?></td>
                       
                       <td>
                          <?php
                          $profile = explode(":", $row->profile_pic);
                          if ($profile[0] == "https" || $profile[0] == "http") { ?>
                            <img src="<?php echo $row->profile_pic ?>" class="image brand-image img-circle elevation-3" height="40" width="40">
                          <?php } else { ?>
                            <?php if (empty($row->profile_pic)) { ?>
                              <img src="<?php echo base_url('uploads/profile_pics/user.png') ?>" class="image brand-image img-circle elevation-3" height="40" width="40">
                            <?php } else { ?>
                              <img src="<?php echo base_url('uploads/profile_pics/') . $row->profile_pic ?>" class="image brand-image img-circle elevation-3" height="40" width="40"> <?php } ?>
                          <?php } ?>
                        </td>

                       <!-- <td style="display: inline-flex;">
                         <a class="btn btn-sm btn-info" href="<?php echo base_url('admin/edit-user/'.$row->id); ?>"><i class="fa fa-edit"></i></a>
                         <button data-i="<?php echo $row->id; ?>" class="btn btn-sm btn-danger delete">
                           <i class="fa fa-trash"></i></button>
                       </td> -->
                     </tr>                  
                     <?php } ?>    
                     <?php } ?>
                     </tbody>
                  </table>
                     </div>
                    <!-- /.card-body -->
               </div>
            </div>

         </div>

      </div>
   </section>

  </div>
  <!-- /.content-wrapper