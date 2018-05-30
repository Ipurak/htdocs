<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class metag extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->library( 'session' );
    }

    public function get_by_keyword( $tag ){

      $this->db->select('idtag, name, status');
      $this->db->from('tag');
      $this->db->like('name', $tag);
      $query = $this->db->get();
      return $query->result();

    }

    public function hashtag_clicked( $id ){

      $this->db->set('clicked','clicked', FALSE);
      $this->db->where('idtag',$id);
      $this->db->update('tag');
      if($this->db->affected_rows() > 0){
        return TRUE;
      }else{
        return FALSE;
      }

    }

    public function top10_hashtags(){

      // $this->db->select('TOP');
      // $this->db->from('tag');
      // $query = $this->db->get();
      // return $query->result();

    }

    public function getTagsByPostId( $id ){

      $this->db->select('*');
      // $this->db->select( 'post.image, post.title, post.desc, post.status, post.dateauto, user.company' );
      $this->db->from( 'post_has_tag' );
      $this->db->join('tag', 'tag.idtag = post_has_tag.tag_idtag');
      $this->db->where( 'post_idpost',$id );
      $query = $this->db->get();
      return $query->result();
      // return $query->result();
    }

}
?>
