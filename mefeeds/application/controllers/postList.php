<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class postList extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model( 'mepost' );
    $this->load->model( 'checkpumppost' );
	}

	public function index()
	{

    	$result = $this->mepost->get_by_session();
    	
    	foreach ($result as $row)
		{
	        $row->datepush = $this->checkpumppost->check( $row->datepush );
		}

    	// echo $result[0]->idpost;
    	echo  json_encode( $result );
    	// print_r( $result );

	}

}
