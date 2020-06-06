<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_parent
 *
 * @author omar
 */
include_once 'User_type.php';
include_once '../Database/User_Queries.php';
class User_parent {
    private $name;
    private $lname;
    private $username;
    private $pass;
    private $email;
    private $id;
    private  $User_Queries;
    private $user_type;
    public  function __construct($id="") {
        $this->User_Queries=new User_Queries();
        if($id !=""){
            $user_data=$this->User_Queries->get_users_by_id($id);
            $this->fname=$user_data["name"];
            $this->lname=$user_data["lname"];
            $this->email=$user_data["email"];
            $this->password=$user_data["password"];
            $this->username=$user_data["username"];
            $this->user_type=new User_type($user_data["user_type_id"]);
            $this->id=$user_data["id"];        
            
        }
    }

    public function set_fname($fname){
         $this->name=$fname;
    }
    public function set_lname($lname){
        $this->lname=$lname;
    }
    public function set_username($username){
        $this->username=$username;
    }
    public function set_password($password){
         $this->pass=$password;
    }
    public function set_email($email){
        $this->email=$email;
    }
    public function set_user_type($user_type_id){
       $this->user_type=new User_type($user_type_id);
    }
    public function get_name(){
        return $this->name;
    }
    public function get_lname(){
        return $this->lname;
    }
    
    public function  get_username(){
        return $this->username;
    }
    public  function get_pass(){
        return $this->pass;
    }
    public function  get_email(){
        return $this->email;
    }
    public function set_id($id){
        return $this->id=id;
    }

    public function get_id(){
        return $this->id;
    }
    public function get_user_type(){
        return $this->user_type;
    }
            
    public function get_role($id) {

        $data= $this->User_Queries->role_by_name($id);
        return $data;

        }
        
        public function getFname($id){
    $data= $this->User_Queries->fname_by_name($id);
        return $data;
    }
 public function getLname($id){
    $data= $this->User_Queries->lname_by_name($id);
        return $data;
    }
  
    public function  getUsername($id){
    $data= $this->User_Queries->username_by_name($id);
        return $data;
    }
    public  function getPass($id){
        $data= $this->User_Queries->pass_by_name($id);
        return $data;
    }
    public function  getEmail($id){
        $data= $this->User_Queries->email_by_name($id);
        return $data;
    }
   
      
    public function getRole($id) {

        $data= $this->User_Queries->role_by_name($id);
        return $data;

        }

    public function login(){
        $user_data=$this->User_Queries->get_users_by_username_password($this->username,$this->pass);
        if($user_data){
            $this->id=$user_data['id'];
            $this->fname=$user_data['fname'];
            $this->lname=$user_data['lname'];
            $this->email=$user_data['email'];
            $this->password=$user_data['password'];
            $this->username=$user_data['username'];
            $this->user_type=new User_type($user_data['user_type_id']);
         //   session_start();
            $_SESSION['id']=$user_data['id'];
            $_SESSION['fname']=$user_data['fname'];;
            $_SESSION['user_type_id']=$user_data['user_type_id'];
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
        public function logout(){
            if(isset($_SESSION['id'])){
                unset($_SESSION['fname']);
                unset( $_SESSION['user_type_id']);
                header("location: ../../view/Login.php.php");
            }
        }
    
    
}
