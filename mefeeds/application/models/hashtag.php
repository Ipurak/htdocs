<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hashtag extends CI_Model {

    public function __construct()
    {
      parent::__construct();
      $this->load->library( 'mepost' );
      $this->load->library( 'session' );
    }

    public function insertForPost( $params, $idpost ) {
      
      $tempArr  = array();
      foreach ( $params as $hashtag ) {

        $tagName =   strtolower(
            preg_replace( 
              '/\s+/',
              '',
              str_replace( "#","",$hashtag ) 
            )//Replace # by empty
          );//Convert to lowercase

        if( !in_array ( $tagName, $tempArr ) ) {//if does'not exist
          array_push( $tempArr, $tagName );//add put in tempArr
        }

      }

      $idtags = $this->insertTags_getIdInserted( $tempArr );//insert new tags and get id tags
      $data   = $this->getArray_insertPosttag( $idtags, $idpost );//set array for insert tags post
      $this->db->insert_batch( 'post_has_tag', $data );//insert tag for post
      return ($this->db->affected_rows() > 0) ? true : false;
      
    }

    public function getArray_insertPosttag ( $idtags, $idpost )
    {

      $mainArr = array();
      foreach ( $idtags as $id ) {
        
        array_push( $mainArr, array( 'tag_idtag' => $id, 'post_idpost' => $idpost ) );

      }

      return $mainArr;

    }

    public function insertTags_getIdInserted ( $arr )
    {

      $valueArr = array();
      foreach ( $arr as  $tagName ) {
        
        $this->db->select( 'idtag' );
        $this->db->where( 'name', $tagName );
        $query = $this->db->get( "tag" );
        $tag = $query->row();
        if ( $query->num_rows() < 1 ) {//not exist
          $data = array(
           'name'   => $tagName ,
           'status' => 0
          );
          $this->db->insert('tag', $data);
          array_push( $valueArr, $this->db->insert_id() );

        }else if( $query->num_rows() > 0 ){//exist
          array_push( $valueArr, $tag->idtag );
        }

      }

      return $valueArr;

    }

}
?>
