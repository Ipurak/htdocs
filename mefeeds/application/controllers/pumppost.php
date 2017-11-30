<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Pump Post API
class pumppost extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->model( "mepost" );
    $this->load->model( "checkpumppost" );
	}

	public function index(  )
	{

    $data = $this->mepost->get_dateauto(  );
    
    if( $data != 0 ){

      $data = $this->checkpumppost->check( $data[0]->datepush );

      if( $data["status"] === 1 ){//Pump post

        $this->update_PostDateauto( $data );
        echo json_encode( $data );

      }else{//Can not Pump post

        echo json_encode( $data );

      }

    }else{

      echo json_encode( $this->melibs->MeErr400( "Bad Request" ) );

    }
	}

  public function update_PostDateauto( $arr )
  {

   $data = $this->mepost->update_dateauto( $arr );

  }

  public function pumppostCheck( $datepush )
  {

    $NOW = date('Y-m-d H:i:s');
    $NOWDateTime = new DateTime( $NOW );
    
    $datepushDateTime = new DateTime( $datepush );
    $diff = $NOWDateTime->diff( $datepushDateTime );

    $Hours = $diff->h;
    $Hours = $Hours + ( $diff->days*24 );

    if ( $Hours >= 3 && $NOWDateTime > $datepushDateTime ){//Can pump post
      return array( "status" => 1, "datepush" => $NOW, "nexttime" => date('Y-m-d H:i:s', strtotime('+3 hour',strtotime( $NOW ) ) ) );
    }else{//Can not pump post may 1. Amount of hour 2. datepush more than server time
      return array( "status" => 0, "nexttime" => date('Y-m-d H:i:s', strtotime('+3 hour',strtotime( $datepush ) ) ) );
    }

  }

}
