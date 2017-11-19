<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class melibs {

	public function MeData()
	{
		$str_JSON = file_get_contents( 'php://input' );
		$arr      = json_decode( $str_JSON, true );
		return $arr;
	}

	public function MeSucc200( $desc )
	{	
		// 		The request has succeeded. The information returned with the response is dependent on the method used in the request, for example:

		// GET an entity corresponding to the requested resource is sent in the response;
		// HEAD the entity-header fields corresponding to the requested resource are sent in the response without any message-body;
		// POST an entity describing or containing the result of the action;
		// TRACE an entity containing the request message as received by the end server.
		header('Content-Type: application/json');
		http_response_code(200);
		return array('status'=>'success','code'=>200,'desc'=>$desc);
	}

	public function MeErr400( $desc )
	{	//*** Bad Request ***
		// The request could not be understood by the server due to malformed syntax. The client SHOULD NOT repeat the request without modifications.
        header('Content-Type: application/json');
        http_response_code(400);
        return array('status'=>'error','code'=>400,'desc'=>$desc);
    }

	

}