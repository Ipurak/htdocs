<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tags extends CI_Controller {

	function __construct() {
    parent::__construct();

	}

	public function index()
	{
		$str_JSON = file_get_contents( 'php://input' );
		$data = json_decode( $str_JSON, true );
		$typ = $data["typ"];
        $tag = $data["tag"];

        switch ($typ) {
            case "get":
                echo $this->get( $tag );
                break;
            case "add":
                echo "Your favorite color is blue!";
                break;
            default:
                echo "wrong format";
        }

	}

  public function get( $tag )
  {

    $this->load->model('metag');
    $result = $this->metag->get_by_keyword( $tag );
    $data   = array('feeds'=>$result);
    echo json_encode( $data );

  }


}
