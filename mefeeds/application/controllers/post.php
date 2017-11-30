<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class post extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model( "mepost" );
	}

	public function index()
	{
		$str_JSON = file_get_contents( 'php://input' );
		$data = json_decode( $str_JSON, true );
		$this->load->model( 'mepost' );
    $insert_status = $this->mepost->insert( $data );
		echo json_encode( array( "status"=>$insert_status ) );
	}

  public function update()
  { 
    $data = $this->mepost->update();
    echo json_encode( $data );
  }

  public function status()
  { 
    $data = $this->mepost->status();
    echo json_encode( $data );
  }

}
