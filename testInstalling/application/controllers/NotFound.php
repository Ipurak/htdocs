<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotFound extends CI_Controller {

	public function index()
	{
		echo "We not found the page [404]";
		// $this->load->view('welcome_message');
	}
}
