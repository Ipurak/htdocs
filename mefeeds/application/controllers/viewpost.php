<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class viewpost extends CI_Controller {

	function __construct() {
    	parent::__construct();
		$this->load->model( 'meviewpost' );//Call viewpost model
		$this->load->model( 'metag' );//Call viewpost metag
	}

	public function post()
	{
		$post = $this->meviewpost->get_by_idpost( $this->uri->segment(3) );
		// print_r($post);
		$tags = $this->metag->getTagsByPostId( $this->uri->segment(3) );
		// print_r( $tags[0] );
		// $this->load->view( 'post', array( 'post' => $data ) );
		$this->load->view( 'post', array( 'post' => $post, 'tags' => $tags ) );
	}

}
