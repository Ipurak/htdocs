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

			$offset = $data["data"]["offset"];

			$this->load->model('mepost');
			$result = $this->mepost->get_all( $offset );
			$result = $this->initialResults( $result );

			$data = array('feeds'=>$result);
			echo json_encode( $data );

		}elseif( $type === "hashtag" ){

			$this->load->model('mepost');
			$result = $this->mepost->get_by_hashtag( $hashtag );
			$data   = array('feeds'=>$result);
			echo json_encode( $data );

		}elseif( $type === "search" ){

			$this->load->model('mepost');
			$result = $this->mepost->get_by_autoSearch( $hashtag );
			$data   = array('tags'=>$result);
			echo json_encode( $data );

		}

		
	}

	public function initialResults( $result )
	{	$dateNow = date('Y-m-d H:i:s');
		foreach ($result as $value) {
			// echo print_r($value);
			if( $value->image != "" ){
				$value->image = $value->image.".png";
			}			
			$diff_days    = $this->diff_days( $dateNow, $value->datecreated );
			$isNew        = ( $diff_days <= 7) ? 1 : 0;
			$value->isNew = $isNew;
		}

		return $result;
	}

	public function diff_days( $d1, $d2 )
	{	
		//data format need Y-m-d H:i:s
		$ts1 = strtotime( $d1 );
		$ts2 = strtotime( $d2 );
		$seconds_diff = $ts1 - $ts2;
		// echo "[".$d1.",".$d2."]";
		return intval(intval($seconds_diff) / (3600*24));//Convert sec to days
	}
	
	{

	}

	
}
