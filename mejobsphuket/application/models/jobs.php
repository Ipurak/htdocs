<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jobs extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
// START general function
    public function get_signinInfo($email,$pass){
        $this->db->select('job_id, title, description, dateauto, email, name, status, company');
        return $this->db->get_where('jobs', array('email' => $email,'password' => $pass))->row();
    }

    public function get_all() {
        $query = $this->db->get('jobs');
        return $query->result();
    }

    public function insert($data) {
        $this->db->insert('jobs', $data);
        // $this->title = 'CodeIgniter 101';
        // $this->content = '<p>Say what you want about CI, it still rocks</p>';
        // $this->date = time();
        //
        // $this->db->insert('posts', $this);
    }

    public function update($id) {
        // $this->title = 'CodeIgniter 101';
        // $this->content = '<p>Say what you want about CI, it still rocks</p>';
        // $this->date = time();
        //
        // $this->db->update('posts', $this, array('id' => $id));
    }

    public function delete($id){
        // $this->db->delete('posts', array('id' => $id));
    }

    public function updateinfo(){
      $data = array(
               'title' => $this->input->post('title'),
               'company' => $this->input->post('company'),
               'name' => $this->input->post('name'),
               'email' => $this->input->post('email')
            );
      $this->db->where('job_id', $this->input->post('id'));
      $this->db->update('jobs', $data);
      return $this->db->affected_rows();
    }

    public function updateview(){
      $data = array( 'status' => $this->input->post('status') );
      $this->db->where( 'job_id', $this->input->post('id') );
      $this->db->update( 'jobs', $data );
      return $this->db->affected_rows();
    }

    public function updatedesc(){
      $data = array( 'description' => $this->input->post('desc') );
      $this->db->where( 'job_id', $this->input->post('id') );
      $this->db->update( 'jobs', $data );
      return $this->db->affected_rows();
    }

// END general function

// START extra function
    public function email_exist($email){
        $this->db->where('email',$email);
        $query = $this->db->get('jobs');
        if ($query->num_rows() > 0){
          return true;
        }else{
          return false;
        }
    }

    public function pumppost($id){
      $this->db->select('job_id, dateauto');
      $row = $this->db->get_where('jobs', array('job_id' => $id))->row();

      if ( isset($row) )
      {
        $dateauto = $row->dateauto;
        $date1 = new DateTime( $dateauto );

        $NOW = date('Y-m-d H:i:s');
        $date2 = new DateTime( $NOW );
        $diff = $date2->diff( $date1 );
        $Hours = $diff->h;
        $Hours = $Hours + ($diff->days*24);
        /*### INFO ###
          $date1 = Dateauto
          $date2 = Now
        ### INFO ###*/
        if(0){
          echo "### strat info ###"."<br />";
          echo "Amount: ".$Hours."<br />";
          echo "dateAuto: ".$dateauto."<br />";
          echo "Now: ".$NOW."<br />";
          echo "### end info ###"."<br />";
        }
        if( $Hours >= 3 && $date2 > $date1 ){//Can pump post
          $this->db->query("UPDATE `jobs` SET dateauto = now() WHERE job_id = $id;");
          $num_updated  = $this->db->affected_rows();
          if( $num_updated == 1 ){
            //echo "Success, Can pump post!!!";
            $this->db->select( 'dateauto' );
            $row = $this->db->get_where('jobs', array( 'job_id' => $id ))->row();

            $obj = array( "status" => 1, "dateauto" => $row->dateauto, "nexttime" => date('Y-m-d H:i:s', strtotime('+3 hour',strtotime($row->dateauto) )) );
            echo json_encode( $obj );
          }else{
            $obj = array( "status" => 0, "message" => "Error, maybe more than 1 rows are updated or Maybe id not good." );
            echo json_encode( $obj );
          }

        }else{//Can not pump post may 1. Amount of hour 2. dateauto more than server time
          $obj = array( "status" => 0, "message" => "Error, Not time to pump the post or DateAuto is more then Server time." );
          echo json_encode( $obj );
        }
      }else{//not found in datebase
        $obj = array( "status" => 0, "message" => "Error, Post Not Found." );
        echo json_encode( $obj );
      }
    }
// END extra function
}
