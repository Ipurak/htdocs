<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class postjob extends CI_Controller {

	function __construct() {
    parent::__construct();

	}

	public function index()
	{
		$data = array(
			'icons_icon_id' => $this->input->post('icon') ,
			'status' => 0 ,
			'title' => $this->input->post('title') ,
			'description' => $this->input->post('desc') ,
			'email' => $this->input->post('email'),
			'name' => $this->input->post('name'),
			'password' => $this->input->post('pass')
		);

		$this->load->model('jobs');
		$email = $this->input->post('email');

		$check = $this->jobs->email_exist($email);
		if($check == 0){
			$jobs = $this->jobs->insert($data);
		}else{
			echo "{email_exist:1}";
		}
	}

}
