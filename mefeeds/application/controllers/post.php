<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class post extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model( "mepost" );
    $this->load->model( "hashtag" );
	}

	public function index()
	{
		$str_JSON = file_get_contents( 'php://input' );
		$data     = json_decode( $str_JSON, true );
		$this->load->model( 'mepost' );
    $post = $this->mepost->insert( $data );

    if ( $post["status"] && $data["hashtag"] != "" ) {

      $statusInserted = $this->hashtag->insertForPost( $data["hashtag"], $post["insertedid"] );
      echo "This: ".$statusInserted;
    }
    
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
