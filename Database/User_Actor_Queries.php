<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Actor_Queries
 *
 * @author omar
 */
include_once 'Database.php';
class User_Actor_Queries {
    private $Db;
    public function __construct() {
        $this->Db= Database::getInstance();
    }
    
     public function  addUser($user){
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
    $result=$this->Db->database_query($query);
     if($result){
         return TRUE;}
     else
         {
         return FALSE;
     }     
    }
 
    public function Send_Request($id,$username){
       $q="SELECT id FROM `users` where username='$username'";
       $R= $this->Db->get_row($q);
       $id_user=$R['id'];
       $query="INSERT INTO `staff`(`id-user`, `id-mechanic`, `state`) VALUES ($id,$id_user,1)";
       $re= $this->Db->database_query($query);
       if($re){
           return TRUE;
       } else {
           return FALSE;    
       }
    }
    
    public function search_mechanics($location){
       
       $query="SELECT users.username, users.email FROM users INNER JOIN mec_location ON users.id = mec_location.id_mec limit 1";
       $result= $this->Db->database_query($query);
       $q= $this->Db->database_all_assoc($result);
        if (false === $q) {
          echo mysqli_error();
        }  
        
        return $q;
       
      
        
    }
    
    
    
}
