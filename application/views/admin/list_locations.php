<?php
// $id = $this->uri->segment(3);
// $id = $this->session->userdata('aid');
  $regions = $this->admin_model->get_all_location();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Locations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Locations</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
           <!--  <?php if(!empty($this->session->flashdata('success'))): ?>
              <div class="alert alert-success">
                <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span> <?php echo $this->session->flashdata('success'); ?> </span>
              </div>
            <?php endif ?>
            <?php if($this->session->flashdata('error')): ?>
              <div class="alert alert-danger">
                <a href="javascript:void()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span><?php echo $this->session->flashdata('error') ?></span>
              </div>
            <?php endif ?> -->
           
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Locations List</h3>
               </div>
              <!-- /.card-header -->
               <div class="card-body">
                  <table id="category_table" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                       <th>Id</th>
                       <th> Name (ar)</th>
                       <th>Name (en)</th>
                       <th>Region Name</th>
                       <th>Actions</th>
                     </tr>
                     </thead>
                     
                     <tbody>
                   
                     <?php if(isset($regions)){ $cnt=1; ?>  
                     <?php foreach($regions as $row) { ?>
                     <tr>
                       <td><?php echo $cnt++; ?></td>

                       <td><?php echo $row->name_ar; ?></td>
                       <td><?php echo $row->name_en; ?></td>
                       <td><?php echo $row->region_name; ?></td>

                       <td style="display: inline-flex;">
                         <a class="btn btn-sm btn-info margin-5" href="<?php echo base_url('admin/edit-locations/'.$row->id); ?>"><i class="fa fa-edit"></i></a>
                         <button data-i="<?php echo $row->id; ?>" class="btn btn-sm btn-danger delete margin-5">
                           <i class="fa fa-trash"></i></button>
                       </td>
                     </tr>                  
                     <?php
                  
                    } ?>    
                     <?php } ?>
                     </tbody>
                  </table>
               </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

</div>
<div class="modal fade in" id="modalDel">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">??</span></button>
      </div>
      <form method="post" action="<?php echo base_url('admin/trash-locations'); ?>" id="frmDel">
        <div class="modal-body">
          <p>Are you sure you want to delete?</p>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" value="">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <input type="submit" class="btn btn-primary btnclass" value="Yes Delete!">
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script type="text/javascript" src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function(){
    $(document).on('click', '.delete', function(){
            var i = $(this).data('i');
            $("#frmDel input[name='id']").val(i);
            $("#modalDel").modal('show');
        });
    });
</script>