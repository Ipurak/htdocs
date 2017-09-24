<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mepost extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->library( 'session' );
    }

    public function get_all() {
      // $query = $this->db->get('post');
      $this->db->select('*,post.dateauto as postdateauto');
      $this->db->from('post');
      $this->db->join('user', 'post.user_iduser = user.iduser');
      $query = $this->db->get();
      return $query->result();
    }

    public function get_by_session(){
      $sess = $this->session->all_userdata('logged_in');
      $this->db->select('*');
      $this->db->from('post');
      $this->db->where('user_iduser', $sess["logged_in"]["id_user"]);
      $query = $this->db->get();
      return $query->result();
    }

    public function insert( $params ) {

      $sess = $this->session->all_userdata('logged_in');
      $data = array(
        'title'       => $params["title"] ,
        'desc'        => $params["desc"] ,
        'user_iduser' => $sess["logged_in"]["id_user"],
        'status'      => 0
      );
      $this->db->set('datecreated', 'NOW()', FALSE);
      $this->db->insert('post', $data);
      return ($this->db->affected_rows() != 1) ? false : true;
    }

}
?>
