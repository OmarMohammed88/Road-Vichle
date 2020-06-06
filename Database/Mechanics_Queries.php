<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mechanics_Queries
 *
 * @author omar
 */
include_once 'Database.php';
include_once 'User_type_queries.php';
include_once '../mail/mail.php';
class Mechanics_Queries {
    private $type;
    private $Db;
    public function __construct() {
        $this->Db= Database::getInstance();
    }
   
     public function  AddMechanic($user){
     $data= array();
     $data['fname']=$user->get_name();
     $data['lname']=$user->get_lname();
     $data['email']=$user->get_email();
     $data['username']=$user->get_username();
     $data['password']=$user->get_pass();
     $data['user_type_id']=$user->get_user_type()->id;
     $result=$this->Db->insert('users', $data);
     if($result){
       return TRUE;
      }
     else{
       return False;
    }
}

    
    
    
    public function Send_feedback($id,$feedback){
     $query="INSERT INTO `feedback`(`id-actor`, `feedback`) VALUES ($id,'$feedback')";    
    //$query= $this->Db->insert('feedback', $data);
    $result=$this->Db->database_query($query);
     if($result){
         return TRUE;
     }
     else
         {
         return FALSE;
     }     
    }
    
    public function View_Request($user) {
        $username=$user->get_username();
        $query="SELECT id FROM `$queryusers` where username='$username' limit 1";
        $r= $this->Db->get_row($query);
        $id=$r['id'];
        $q="SELECT staff.`id-user`, staff.request FROM users INNER JOIN staff ON users.id = $id limit 1";
        $result= $this->Db->database_query($q);
        $query= $this->Db->database_all_assoc($result);
        return $query;
    }
    
    public function  Accept_request($id){
        $q="UPDATE staff SET state= 1 where `id-mechanic`= $id";
        $re= $this->Db->database_query($q);
        $query1="SELECT `id-user` from `staff` where `id-mechanic`=$id ";
        $r1= $this->Db->get_row($query1);
        $id_user=$r1['id-user'];
        $query2="SELECT email from `users` where id=$id_user ";
        $R= $this->Db->get_row($query2);
        Accept_email($R['email']);
        }
      
        public function Rejected_Request($id){
      
       $q="UPDATE staff SET state= 0 where `id-mechanic`= $id";
        $re= $this->Db->database_query($q);
        
        
    }
    
    public function insert_mechanic_into_mechanics_state_table($user){
        $username=$user->get_username();
        $query="SELECT id FROM `users` where username='$username' limit 1";
        $r= $this->Db->get_row($query);
        $data=array();
        $data['id_mechanic']=$r['id'];
        $data['username']=$username;
        $data['state']=1;
        $res= $this->Db->insert("mechanic_state", $data);
        $query= $this->Db->database_query($res);
        if($query){
            return true;
        } else {
            return false;    
        }
    }
    
    public function get_id_By_user_type($user){
        $user_type=$user->get_user_type();
        $username=$user->get_username();
        $query="SELECT id FROM `users` where username='$username' limit 1";
        $r= $this->Db->get_row($query);
        return $r['id'];
    }
    
    
    public function insert_into_mech_location($user){
        $username=$user->get_username();
        $query="SELECT id FROM `users` where username='$username' limit 1";
        $r= $this->Db->get_row($query);
        $data=array();
        $data['id_mec']=$r['id'];
        $data['Location']=$user->get_location();
        $res= $this->Db->insert("mec_location", $data);
        $query= $this->Db->database_query($res);
        if($query){
            return true;
        } else {
            return false;    
        }
    }
    
    
}
