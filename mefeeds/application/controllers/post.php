<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class post extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model( "mepost" );
    $this->load->model( "hashtag" );
    define("CLOSE", "close");
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
    $data = $this->melibs->MeData();
    $post = $this->mepost->update();

    $statusInserted = $this->hashtag->updateForPost( $data["hashtag"], $post["updatedid"] );

    if ( $post["status"] ) {//Insert hashtag
      $this->melibs->MeSucc200( "update success" );
    }else{
      $this->melibs->MeErr400( "update failed" );
    }
    
  }

  public function close()
  {
    $json = $this->melibs->MeData();
    // print_r($json);
    if( $json["type"] === CLOSE ){
      $data = $this->mepost->closePost();
      echo json_encode( $data );
    }
  }

  public function status()
  { 
    $data = $this->mepost->status();
    echo json_encode( $data );
  }

}
