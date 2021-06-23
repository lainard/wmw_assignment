<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {
	public $data;
	public $url = "https://reqres.in/api/";
	public function __construct() {
		parent::__construct();
		$this->load->library('api', ['url' => $this->url]);
		if (empty($this->session->id)) {
			redirect('login');
		}

	}
	public function employee() {
		$result = $this->api->list($_POST);
		echo json_encode($result);
	}

	public function get_employee() {
		$id = $this->uri->segment(3);
		$result = $this->api->get_employee($id);

		echo json_encode($result);
	}

}