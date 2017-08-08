<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vocab extends CI_Controller {

	function __construct() {
    parent::__construct();

	}

	public function index()
	{
		$this->load->model('bookRef');
		$bookRef = $this->bookRef->get_all();

		$this->load->model('bookCategory');
		$bookCategory = $this->bookCategory->get_all();

		$data = array("bookRef"=>json_encode($bookRef),"bookCategory"=>json_encode($bookCategory));
		$this->load->view('vocab',$data);
	}

	public function test()
	{
		// $this->load->model('bookRef');
		// $data = $this->bookRef->get_all();
		// $data = array("data"=>json_encode($data));
		$this->load->view('vocab-test');
	}
}
