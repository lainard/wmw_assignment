<?php $this->load->view('header');?>
<?php if (!empty($main_content)) {
	$this->load->view($main_content);
}?>
<?php $this->load->view('footer');?>