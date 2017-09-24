<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signin extends CI_Controller {

	function __construct() {
    parent::__construct();
		$this->load->library( 'session' );
	}

	public function index(){

		$str_JSON = file_get_contents( 'php://input' );
		$data = json_decode( $str_JSON, true );
		// print_r( base64_decode( $data['email'] ) );
		// print_r( base64_decode( $data['pass'] ) );

		$this->load->model( 'authorize' );

		$query = $this->authorize->check( $data );

		if( $query->num_rows() == 1 ){

			$result = $query->result_array();
			$session_data = array(
				'id_user' => $result[0]["iduser"],
				'email' => $result[0]["email"],
				'pass' => $result[0]["pass"],
			);
			$this->session->set_userdata('logged_in', $session_data);
			// print_r( "logged: ".$this->session->has_userdata('logged_in') );
			// print_r( $this->session->userdata('logged_in') );
			echo json_encode( array( "status"=>true ) );

		}else{
			echo json_encode( array( "status"=>false ) );
		}

	}

	// public function index()
	// {
	// 	$this->load->model('jobs');
  //   $query = $this->jobs->get_signinInfo($this->input->post('email'),$this->input->post('pass'));
	//
	// 	$ObjPump = $this->pumppost($query->dateauto);
  //   echo json_encode( array_merge( (array) $query, (array) $ObjPump ) );
	// }
	//
	// public function email_exist($email){
	// 		$this->db->where('email',$email);
	// 		$query = $this->db->get('jobs');
	// 		if ($query->num_rows() > 0){
	// 			return true;
	// 		}else{
	// 			return false;
	// 		}
	// }
	//
	// public function pumppost($dateauto){
	//
	// 		$date1 = new DateTime( $dateauto );
	//
	// 		$NOW = date('Y-m-d H:i:s');
	// 		$date2 = new DateTime( $NOW );
	//
	// 		$diff = $date2->diff( $date1 );
	// 		$Hours = $diff->h;
	// 		$Hours = $Hours + ($diff->days*24);
	// 		/*### INFO ### $date1 = Dateauto $date2 = Now ### INFO ###*/
	// 		if( $Hours >= 3 && $date2 > $date1 ){//Can pump post
	// 			return array( "status" => 1, "dateauto" => $dateauto, "nexttime" => date('Y-m-d H:i:s', strtotime('+3 hour',strtotime( $dateauto ) ) ) );
	// 		}else{//Can not pump post may 1. Amount of hour 2. dateauto more than server time
	// 			return array( "status" => 0, "nexttime" => date('Y-m-d H:i:s', strtotime('+3 hour',strtotime( $dateauto ) ) ) );
	// 		}
	//
	// }

}
