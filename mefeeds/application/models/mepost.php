<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mepost extends CI_Model {

    public function __construct()
    {
      parent::__construct();
      $this->load->library( 'mepost' );
      $this->load->library( 'session' );
    }

    public function insert( $params ) {

      $sess = $this->session->all_userdata( 'logged_in' );
      $data = array(
        'title'       => $params["title"] ,
        'desc'        => $params["desc"] ,
        'user_iduser' => $sess["logged_in"]["id_user"],
        'status'      => 0
      );
      $this->db->set( 'datecreated', 'NOW()', FALSE );
      $this->db->set( 'datepush', 'NOW()', FALSE );
      $this->db->insert( 'post', $data );
      return array(
        'status' => ( $this->db->affected_rows() != 1 ) ? false : true,
        'insertedid' => $this->db->insert_id()
      );

    }

    public function update() {

      $data = $this->melibs->MeData();
      $value = $data['data'];
      $data  = array(
        'title'  => $value['title'],
        'desc'   => $value['desc'],
        'status' => $value['status']
      );

      $this->db->where('idpost', $value['idpost']);
      $this->db->update('post', $data);
      if($this->db->affected_rows() > 0) {
        return $this->melibs->MeSucc200( "updated" );
      }else{ 
        return $this->melibs->MeErr400( "update failed" );
      }

    }

    public function status() {

      $data   = $this->melibs->MeData();
      $value  = $data["data"];
      $data   = array(
        'status' => $value["value"]
      );

      $this->db->where('idpost', $value['idpost']);
      $this->db->update('post', $data);
      if($this->db->affected_rows() > 0) {
        return $this->melibs->MeSucc200( "updated" );
      }else{ 
        return $this->melibs->MeErr400( "update failed" );
      }

    }

    public function get_dateauto(  ){

      $data = $this->melibs->MeData();
      
      if( $data["data"]["typ"] === "pump" ){
        $idpost = $data["data"]["idpost"];
        $this->db->select( 'datepush' );
        $this->db->from( 'post' );
        $this->db->where( 'idpost', $idpost );
        $query = $this->db->get();
        return $query->result();
      }else{
        return 0;
      }
      
    }

    public function update_dateauto( $arr ){

      $NOW = date('Y-m-d H:i:s');
      $data   = $this->melibs->MeData();
      $value  = $data["data"];
      $data   = array(
        'datepush' => $arr["datepush"]
      );

      $this->db->where('idpost', $value['idpost']);
      $this->db->update('post', $data);
      if($this->db->affected_rows() > 0) {

        return $this->melibs->MeSucc200( "update success" );

      }else{ 
        return $this->melibs->MeErr400( "update failed" );
      }

    }

    public function get_by_idpost( $id ) {

      $this->db->select( '*' );
      $this->db->from( 'post' );
      $this->db->where( 'idpost', $id );
      $query = $this->db->get();
      return $query->result();

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
      $this->db->select('*, CAST(1 AS BINARY) AS opened, CAST(1 AS BINARY) AS closed, CAST(1 AS BINARY) AS readmore ');
      $this->db->from('post');
      $this->db->where('user_iduser', $sess["logged_in"]["id_user"]);
      $query = $this->db->get();
      return $query->result();
    }

}
?>
