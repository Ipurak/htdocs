<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class viewpost extends CI_Controller {

	function __construct() {
    	parent::__construct();
		$this->load->model( 'meviewpost' );//Call viewpost model
	}

	public function post()
	{
		$data = $this->meviewpost->get_by_idpost( $this->uri->segment(3) );
		$this->load->view( 'post', array( 'post' => $data ) );
	}

}
