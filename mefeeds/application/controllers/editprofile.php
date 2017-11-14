<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class editprofile extends CI_Controller {

	function __construct() {
    	parent::__construct();
		$this->load->library( 'session' );//Session
		$this->load->model( 'meuser' );//Call meuser model

	}

	public function index(){
		
		$sess = $this->session->all_userdata( 'logged_in' );//Session
		$data = $this->meuser->getAll( $sess["logged_in"]["id_user"] );
		$data = array('data' => $data[0]);
		$this->load->view('editprofile',$data);

	}

	public function update(){
		
		$data = $this->meuser->update();
		redirect('../editprofile');
		
	}

	public function reset(){


	}

	public function get(){


	}


}
