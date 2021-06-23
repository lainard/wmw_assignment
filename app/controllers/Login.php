<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public $data;
	public $client;
	public function __construct() {
		parent::__construct();
		$this->config->load('google');
		$this->client = new Google_Client();
		$this->client->setClientId($this->config->item('clientID'));
		$this->client->setClientSecret($this->config->item('clientSecret'));
		$this->client->setRedirectUri(base_url() . 'login/google');
		$this->client->addScope("email");
		$this->client->addScope("profile");
		$this->data['title'] = "Authentication";
		if (!empty($this->session->id)) {
			redirect('dashboard');
		}

	}
	public function index() {

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (strtolower($_POST['username']) == "demo@demo.com" && $_POST['password'] == "demo1234") {
				$this->session->set_userdata(['id' => md5("demo@demo.com"), 'name' => 'Demo', 'email' => "demo@demo.com"]);
				redirect('dashboard');

			} else {
				$this->session->set_flashdata('error', 'Username and Password not accepted');
			}
		} else {
			if (isset($_GET['google'])) {
				redirect($this->client->createAuthUrl());
			}
		}
		$this->data['main_content'] = 'login';
		$this->load->view('content', $this->data);

	}

	public function reset() {

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (strtolower($_POST['username']) == "demo@demo.com") {
				$this->session->set_flashdata('error', 'Your password has been sent');
				redirect('login');

			} else {
				$this->session->set_flashdata('error', 'Please enter username');
			}
		}
		$this->data['main_content'] = 'reset';
		$this->load->view('content', $this->data);

	}

	public function google() {
		// create Client Request to access Google API

		// authenticate code from Google OAuth Flow
		if (isset($_GET['code'])) {
			$token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
			$this->client->setAccessToken($token['access_token']);
			// get profile info
			$google_oauth = new Google_Service_Oauth2($this->client);
			$google_account_info = $google_oauth->userinfo->get();
			$session_id = md5($google_account_info->email);
			$this->session->set_userdata(['id' => $session_id, 'name' => $google_account_info->name, 'email' => $google_account_info->email]);

			redirect('dashboard');
			// now you can use this profile info to create account in your website and make user logged in.
		} else {
			redirect('login');
		}
	}
}
