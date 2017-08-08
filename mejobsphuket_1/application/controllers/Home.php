<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->model('jobs');
		$result = $this->jobs->get_all();
		$data = array("feeds"=>$result);
		$this->load->view('Home',$data);
	}
}
