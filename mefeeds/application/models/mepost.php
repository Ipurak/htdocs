<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mepost extends CI_Model {

    public function __construct()
    {
      parent::__construct();
      $this->load->library( 'mepost' );
      $this->load->library( 'session' );
    }

    public function insert( $params,$imageName ) {

      $sess = $this->session->all_userdata( 'logged_in' );
      $data = array(
        'title'       => $params["title"] ,
        'desc'        => $params["desc"] ,
        'user_iduser' => $sess["logged_in"]["id_user"],
        'status'      => 0,
        'image'       => $imageName
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
      // print_r($data);
      $value = $data['data'];
      $data  = array(
        'title'  => $value['title'],
        'desc'   => $value['desc'],
        'status' => $value['status']
      );

      $this->db->where('idpost', $value['idpost']);
      $this->db->update('post', $data);
      return array(
        'status' => ( $this->db->affected_rows() > 0 ) ? true : false,
        'updatedid' => $value['idpost']
      );

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

    public function get_all( $offset ) {
      // $query = $this->db->get('post');
      $columns = ' user.company, post.dateauto, post.datecreated, post.datepush, post.desc, post.idpost, post.image, post.status, post.title ';
      $this->db->select($columns.', post.dateauto as postdateauto ');
      $this->db->from('post');
      $this->db->join('user', 'post.user_iduser = user.iduser');
      $this->db->order_by("post.datepush", "DESC");
      $this->db->limit(5,$offset);
      $query = $this->db->get();
      return $query->result();
    }

    public function get_by_hashtag( $hashtag ){

      $this->db->select('*,post.dateauto as postdateauto');
      $this->db->from('post');
      $this->db->join('user', 'post.user_iduser = user.iduser');
      $this->db->where("post.idpost in (select post_idpost from post_has_tag where tag_idtag = (select idtag from tag where name = '".$hashtag."'))");
      $query = $this->db->get();
      return $query->result();

    }

    public function get_by_session(){
      $sess = $this->session->all_userdata('logged_in');
      $this->db->select('*, CAST(1 AS BINARY) AS opened, CAST(1 AS BINARY) AS closed, CAST(1 AS BINARY) AS readmore ');
      $this->db->from('post');
      // $this->db->join('post_has_tag', 'post.idpost = post_has_tag.post_idpost');
      $this->db->where('user_iduser = '.$sess["logged_in"]["id_user"]);
      $this->db->where('status <> -1');
      $this->db->order_by("post.datecreated", "desc");
      $query = $this->db->get();
      return $query->result();
    }

    public function get_by_autoSearch( $hashtag ){
      $this->db->select('name');
      $this->db->from('tag');
      $this->db->like('name', $hashtag, 'both');
      $query = $this->db->get();
      return $query->result();
    }

    public function closePost(){

      $req = $this->melibs->MeData();
      $params = array("status" => -1);
      $this->db->where('idpost',$req['id']);
      $this->db->update('post',$params);
      if( $this->db->affected_rows() > 0 ){
        return $this->melibs->MeSucc200("success");
      }else{
        return $this->melibs->MeErr400("failed");
      }
    }

}
?>
