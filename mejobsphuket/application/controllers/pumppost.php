<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Pump Post API
class pumppost extends CI_Controller {

	function __construct() {
    parent::__construct();

	}

	public function index()
	{
    //Check if already pump post
    $this->load->model('jobs');
    $result = $this->jobs->pumppost($this->input->post('id'));
    //echo json_encode($query);
	}

  public function pumppost()
  {

  }

}
