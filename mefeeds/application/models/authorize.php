<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class authorize extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function check( $data ){

      $email = base64_decode( $data['email'] );
      $pass  = base64_decode( $data['pass'] );
      $condition = " email = '".$email."' AND pass = '".$pass."' ";
      $this->db->select( 'iduser, email, pass' );
      $this->db->from( 'user' );
      $this->db->where( $condition );
      $this->db->limit( 1 );
      return $this->db->get();

    }
}
