<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class metag extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->library( 'session' );
    }

    public function get_by_keyword( $tag ) {

      $this->db->select('idtag, name, status');
      $this->db->from('tag');
      $this->db->like('name', $tag);
      $query = $this->db->get();
      return $query->result();

    }

}
?>
