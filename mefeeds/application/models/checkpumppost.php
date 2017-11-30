<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class checkpumppost extends CI_Model {

    public function __construct()
    {
      parent::__construct();

    }

    public function check( $datepush )
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
?>
