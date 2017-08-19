<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jobsfeed extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

	public function index()
	{
		$this->load->model('getjobsfeed');
		$Obj = $this->getjobsfeed->get_all();
    echo json_encode($Obj);
	}

}
