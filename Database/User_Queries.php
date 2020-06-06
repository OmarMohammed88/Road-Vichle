<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Queries
 *
 * @author omar
 */
include_once 'DataBase.php';

class User_Queries {
    private $Db;
    public function __construct() {
        $this->Db= Database::getInstance();
    }
    
    public function get_users_by_username_password($username,$pass){
        $Query="SELECT * FROM `users` where username='$username' and password='$pass'";
        $get_data= $this->Db->get_row($Query);
        return $get_data;
    }
    public function get_users_by_id($id){
      $Query="SELECT * FROM `users` where id='$id'";
      $get_data= $this->Db->Clean($id);
      return $get_data;
    }
 
public function role_by_name($id){ 
 $query = "select user_type_id from `users` where id= '$id'";
 $res= $this->Db->get_row($query);
 $role = $res["user_type_id"];
 return $role;
}
public function fname_by_name($id){
     $query = "select fname from `users` where id= '$id'";
 $res= $this->Db->get_row($query);
 $fname = $res["fname"];
 return $fname;
}
public function lname_by_name($id){
     $query = "select lname from `users` where id= '$id'";
 $res= $this->Db->get_row($query);
 $lname = $res["lname"];
 return $lname;

}
public function username_by_name($id){
     $query = "select username from `users` where id= '$id'";
 $res= $this->Db->get_row($query);
 $username = $res["username"];
 return $username;
}
public function pass_by_name($id){
     $query = "select password from `users` where id= '$id'";
 $res= $this->Db->get_row($query);
 $pass = $res["password"];
 return $pass;
}
public function email_by_name($id){
     $query = "select email from `users` where id= '$id'";
 $res= $this->Db->get_row($query);
 $email = $res["email"];
 return $email;
}
    
}
