<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tags extends CI_Controller {

	function __construct() {
    parent::__consstruct();

	}

	public function index(){
		$str_JSON = file_get_contents( 'php://input' );
		$data = json_decode( $str_JSON, true );
		$typ = $data["typ"];
        $tag = $data["tag"];

        switch ($typ) {
        case "get":
        $this->get( $tag );
        break;
        case "add":
         echo "Your favorite color is blue!";
        break;
        default:
            echo "wrong format";
        }

	}

    public function get( $tag ){

        $this->load->model('metag');
        $result = $this->metag->get_by_keyword( $tag );
        $data   = array('tags'=>$result);
        echo json_encode( $data );

        array('name'=>'aa')

        $data['name']

    }

    public function logtag(){

        $status = FALSE;
        $type   = $this->uri->segment(3);
        echo( $type );
        // if( $type === "clicked" ){
        //     $status = $this->hashtag_clicked();
        // }
        
        // if( $status ){
        //     $this->melibs->MeSucc200( "cliked" );
        // }else{
        //     $this->melibs->MeSucc200( "cliked fail" );
        // }

    }

    public function hashtag_clicked( $id )
    {   
        $this->load->model('metag');
        return $this->metag->hashtag_clicked( $id );
        
    }


}
