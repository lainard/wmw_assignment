<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public $data;
	public $url = "https://reqres.in/api/";
	public function __construct() {
		parent::__construct();
		$this->load->library('api', ['url' => $this->url]);
		$this->data['title'] = "Dashboard";

		if (empty($this->session->id)) {
			redirect('login');
		}

	}
	public function index() {

		$this->data['main_content'] = 'dashboard';
		$this->load->view('content', $this->data);

	}

	public function setting() {
		$this->data['title'] = "my Account";
		$this->data['main_content'] = 'setting';
		$this->load->view('content', $this->data);
	}
	public function employee() {
		$this->data['title'] = "Emloyee list";
		$this->data['main_content'] = 'employee';
		$this->load->view('content', $this->data);
	}
	public function add_employee() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			$result = $this->api->register($_POST);

			if (isset($result->id)) {
				$this->session->set_flashdata('success', 'Employee id ' . $result->id . ' has been created');
				redirect('dashboard/employee');

			} else {
				$this->session->set_flashdata('error', $result->error);
			}

		}
		$this->data['title'] = "Add New Employee";
		$this->data['main_content'] = 'add_employee';
		$this->load->view('content', $this->data);

	}

	public function update() {

		$res = $this->api->update($_POST);
		if($res->updatedAt){
			$this->session->set_flashdata('success', 'Employee has been updated');
		}else{
			$this->session->set_flashdata('error', 'error while updating');
		}
		redirect('dashboard/employee');

	}
	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}

}