<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class feeds extends CI_Controller {

	function __construct() {
    parent::__construct();
		$this->load->library( 'session' );
	}

	public function index()
	{
		// $this->load->model('jobs');
		// $result = $this->jobs->get_all();
		// $data = array("feeds"=>$result);
		$this->load->view('feeds');
	}

	public function get()
	{
		$this->load->model('mepost');
		$result = $this->mepost->get_all();
		$data   = array('feeds'=>$result);
		echo json_encode( $data );
	}
}
