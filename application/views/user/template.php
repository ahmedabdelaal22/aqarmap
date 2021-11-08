<!-- not direct access -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!-- load header -->
<?php $this->load->view('user/header');?>

<?php 
if (empty($this->uri->segment(1))) {
	$this->load->view('user/nav');
}else{
	$this->load->view('user/nav');	
} ?>

<!-- load content -->
<?php $this->load->view('user/'.$page); ?>

<!-- load footer -->



<?php $this->load->view('user/footer');?>
