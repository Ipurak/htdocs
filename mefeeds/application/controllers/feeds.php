<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class feeds extends CI_Controller {

	function __construct() {
    parent::__construct();
		$this->load->library( 'session' );
	}

	public function index()
	{	
		$this->load->view('feeds');
	}

	public function get()
	{	
		$data  	 = $this->melibs->MeData();
		$type 	 = $data["data"]["type"];
		$hashtag = $data["data"]["hashtag"];
		
		if( $type === "all" ){

			$this->load->model('mepost');
			$result = $this->mepost->get_all();

			$result = $this->initialResults( $result );

			// print_r($result);
			$data   = array('feeds'=>$result);
			echo json_encode( $data );

		}elseif( $type === "hashtag" ){

			$this->load->model('mepost');
			$result = $this->mepost->get_by_hashtag( $hashtag );
			$data   = array('feeds'=>$result);
			echo json_encode( $data );

		}

		
	}

	public function initialResults( $result )
	{
		foreach ($result as $value) {
			if( $value->image != "" ){
				$value->image = $value->image.".png";
			}
		}
		return $result;
	}
	
}
