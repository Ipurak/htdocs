<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class postList extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model( 'mepost' );
	}

	public function index()
	{

    $result = $this->mepost->get_by_session();
    echo  json_encode( $result );
    // print_r( $result );

	}

}
