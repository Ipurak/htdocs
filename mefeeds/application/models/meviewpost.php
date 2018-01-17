<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class meviewpost extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_by_idpost( $id ){

      $this->db->select( 'post.title, post.desc, post.status, post.dateauto, user.company' );
      $this->db->select( 'post.image, post.title, post.desc, post.status, post.dateauto, user.company' );
      $this->db->from( 'post' );
      $this->db->join('user', 'user.iduser = post.user_iduser');
      $this->db->where( 'idpost',$id );
      $query = $this->db->get();
      return $query->result();

    }

}
