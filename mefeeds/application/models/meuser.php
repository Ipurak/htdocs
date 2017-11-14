<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class meuser extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->library( 'session' );
    }

    public function getAll( $id ){

      $this->db->select( '*' );
      $this->db->from( 'user' );
      $this->db->where( 'iduser',$id );
      $query = $this->db->get();
      return $query->result();

    }

    public function update(  ){
      
      $data = array(
        'company' => $this->input->post('company'),
        'name'    => $this->input->post('name'),
        'email'   => $this->input->post('email')
      );

      $sess = $this->session->all_userdata( 'logged_in' );//Session
      $this->db->where('iduser', $sess["logged_in"]["id_user"] );
      $this->db->update('user', $data);

    }

}
