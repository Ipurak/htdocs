<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class viewpost extends CI_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->library( 'session' );//Session
		$this->load->model( 'meuser' );//Call meuser model
    	$this->load->model( "mepost" );
	}

	public function index()
	{
		$post = $this->mepost->get_by_idpost( $this->uri->segment(3) );
		$sess = $this->session->all_userdata( 'logged_in' );//Session
		$user = $this->meuser->getAll( $sess["logged_in"]["id_user"] );
		$this->load->view( 'post', array( 'post' => $post, 'user' => $user ) );
	}

}
