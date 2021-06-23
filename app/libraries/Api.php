<?php

Class Api {

	public $url;
	public $call;
	function __construct($vars) {
		$this->url = $vars['url'];

		$CI = &get_instance();
	}

	public function register($data) {
		return $this->_callAPI('register', 'POST', $data);
	}

	public function get_employee($id) {

		return $this->_callAPI('users/' . $id, 'GET');

	}

	public function list($data) {

		return $this->_callAPI('users', 'GET', $data);

	}

	public function update($data) {
		$id = $data['id'];
		unset($data['id']);
		$y['name'] = $data['first_name'] . ' ' . $data['last_name'];
		$y['job'] = 'Administrator';

		return $this->_callAPI('users/' . $id, 'PUT', $y);

	}

	public function edit() {

	}

	private function _callAPI($call, $method, $data = false) {
		$this->url = $this->url . $call;
		//echo $this->url;
		$curl = curl_init();
		switch ($method) {
		case "POST":
			curl_setopt($curl, CURLOPT_POST, 1);
			if ($data) {
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
			}

			break;
		case "PUT":
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			if ($data) {
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
			}

			break;
		default:
			if ($data) {
				$this->url = sprintf("%s?%s", $this->url, http_build_query($data));
			}

		}
		// OPTIONS:

		curl_setopt($curl, CURLOPT_URL, $this->url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'APIKEY: 111111111111111111111',
			'Content-Type: application/json',
		));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		// EXECUTE:
		$result = curl_exec($curl);
		//echo $result;
		if (!$result) {die("Connection Failure");}
		curl_close($curl);
		return json_decode($result);

	}
}