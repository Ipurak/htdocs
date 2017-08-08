<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jobinfo extends CI_Controller {

	function __construct() {
    parent::__construct();

	}

	public function index()
	{
		// $this->load->model('jobs');
    // $query = $this->jobs->get_signinInfo($this->input->post('email'),$this->input->post('pass'));
		// //echo $query->dateauto;
		// $ObjPump = $this->pumppost($query->dateauto);
    // echo json_encode( array_merge( (array) $query, (array) $ObjPump ) );
	}

	public function updateinfo(){
			$this->load->model('jobs');
      $query = $this->jobs->updateinfo();
      echo json_encode( array("status" => $query ) );
	}

  public function updateview(){
			$this->load->model('jobs');
      $query = $this->jobs->updateview();
      echo json_encode( array("status" => $query ) );
	}

  public function updatedesc(){
			$this->load->model('jobs');
      $query = $this->jobs->updatedesc();
      echo json_encode( array("status" => $query ) );
	}

}
