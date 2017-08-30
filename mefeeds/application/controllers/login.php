<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	public function index()
	{
    $data = array();
		$this->load->view('',$data);
	}
	// public function get()
	// {
	// 	$this->load->model('post');
	// 	$result = $this->post->get_all();
	// 	$data   = array('feeds'=>$result);
	// 	echo json_encode( $data );
	// }
}
