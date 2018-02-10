<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hashtag extends CI_Model {

    public function __construct()
    {
      parent::__construct();
      $this->load->library( 'mepost' );
      $this->load->library( 'session' );
    }
    /*############################*/
    /*##########[INSERT]##########*/
    /*############################*/
    public function insertForPost( $params, $idpost ) {
      

      
      $hashtags = $this->kickSameHashTagsOut( $params );
      $idtags = $this->insertTags_getIdInserted( $hashtags );//insert new tags and get id tags
      $data   = $this->getArray_insertPosttag( $idtags, $idpost );//set array for insert tags post
      $this->db->insert_batch( 'post_has_tag', $data );//insert tag for post
      return ($this->db->affected_rows() > 0) ? true : false;
      
    }

    public function kickSameHashTagsOut ( $hashtags )
    {

      $tempArr  = array();
      foreach ( $hashtags as $hashtag ) {

        $tagName =   strtolower(
            preg_replace( 
              '/\s+/',
              '',
              str_replace( "#","",$hashtag ) 
            )//Replace # by empty
          );//Convert to lowercase

        if( !in_array ( $tagName, $tempArr ) ) {//if does'not exist in the same post
          array_push( $tempArr, $tagName );//add put in tempArr
        }

      }
      return $tempArr;

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

  /*############################*/
  /*##########[UPDATE]##########*/
  /*############################*/

  public function updateForPost ( $hashtags, $idpost ) 
  {

    //get all hashtags of this post
    $this->db->select( 'name' );
    $this->db->join('tag', 'tag.idtag = post_has_tag.tag_idtag');
    $this->db->where( 'post_idpost', $idpost );
    $query = $this->db->get( 'post_has_tag' );
    $tags = $query->result_array();//tags from database

    $tags = $this->query_result_to_array_1D($tags, "name");

    print_r( $tags );

    $hashtags = $this->kickSameHashTagsOut( $hashtags );//tags from textarea
    print_r($hashtags);

    $hashtagsToInsert = array_diff_assoc($hashtags, $tags);//hashtag have to insert
    $hashtagsToDelete = array_intersect_assoc($hashtags, $tags);//hashtag have to delete
    
    if( !empty($hashtagsToInsert) ){

      echo "There are hashtags to insert.";
      print_r($hashtagsToInsert);
      
      $idtags = $this->insertTags_getIdInserted( $hashtagsToInsert );//insert new tags and get id tags
      $data   = $this->getArray_insertPosttag( $idtags, $idpost );//set array for insert tags post
      $this->db->insert_batch( 'post_has_tag', $data );//insert tag for post

      echo "affected: ".$this->db->affected_rows();
      // return ($this->db->affected_rows() > 0) ? true : false;

    }

    if( !empty($hashtagsToDelete) ){

      echo "To delete";
      print_r($hashtagsToDelete);

    }
    //kick tag not change out

    //compare to delete
      //get number tags are same in this post

  }

  public function query_result_to_array_1D( $queryResult, $key )
  {
    $temp_box = array();

    foreach( $queryResult as $array )
    {       
      array_push($temp_box, $array[$key] );
    }

    return $temp_box;

  }


}
?>
