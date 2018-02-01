<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class post extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model( "mepost" );
    $this->load->model( "hashtag" );
	}

	public function index()
	{
		$str_JSON = file_get_contents( 'php://input' );
		$data     = json_decode( $str_JSON, true );
    
    $image = $data["image"];
    $imageName = "";
    if( $image != "" ){//save image
      $imageName = $this->saveImage( $image );
    }

		$this->load->model( 'mepost' );
    $post = $this->mepost->insert( $data,$imageName );
    if ( $post["status"] && $data["hashtag"] != "" ) {//Insert Post with hashtag
      $statusInserted = $this->hashtag->insertForPost( $data["hashtag"], $post["insertedid"] );
    }else{
      $statusInserted = true;//Insert Post Success without any hashtag
    }
		echo json_encode( array( "status"=>$statusInserted ) );
	}

  public function saveImage( $image )
  {
    $base_to_php = explode(',', $image);
    $data        = base64_decode($base_to_php[1]);
    $newfilename = md5(time().'image');
    $filepath = "./public/images/$newfilename.png";
    file_put_contents($filepath,$data,FILE_APPEND);
    return $newfilename;
  }

  public function update()
  {
    $data = $this->mepost->update();
    echo json_encode( $data );
  }

  public function status()
  { 
    $data = $this->mepost->status();
    echo json_encode( $data );
  }

}
