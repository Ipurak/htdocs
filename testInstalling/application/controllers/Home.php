<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{	
		$this->load->library( 'session' );
		// echo "This is Home Controller";
		$this->load->view('home');
	}
}