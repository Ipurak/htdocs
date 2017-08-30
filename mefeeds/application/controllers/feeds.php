<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class feeds extends CI_Controller {
	public function index()
	{
		// $this->load->model('jobs');
		// $result = $this->jobs->get_all();
		// $data = array("feeds"=>$result);
    $data = array();
		$this->load->view('feeds',$data);
	}
	public function get()
	{
		$this->load->model('post');
		$result = $this->post->get_all();
		$data   = array('feeds'=>$result);
		echo json_encode( $data );
	}
}
