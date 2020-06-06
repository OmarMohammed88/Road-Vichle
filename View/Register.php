<?php

include_once "../Classes/User_Actor.php";
include_once "../Classes/Mechanics.php";
session_start();

if(isset($_POST['submit'])){
   $username=$_POST['username'];
   $password=$_POST['password'];
   $email=$_POST['email'];
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $role=$_POST['role'];
   //$location=$_POST['location'];
   if($role=="mechanic"){
      $mechanic=new Mechanics();
      $mechanic->set_username($username);
      $mechanic->set_password($password);
      $mechanic->set_email($email);
      $mechanic->set_fname($fname);
      $mechanic->set_lname($lname);
      $mechanic->set_location('Giza');
      $mechanic->set_user_type(2);
      $mechanic->AddMechanics($mechanic);
      header("location: Login.php");

    }else if($role=="Customer"){
        $user=new User_Actor();
        $user->set_username($username);
        $user->set_password($password);
        $user->set_email($email);
        $user->set_fname($fname);
        $user->set_lname($lname);
        $user->set_user_type(3);
        $user->AddUser($user);
        header("location: userhome.php");
    }




   if(is_numeric($username)){
       $errormessage="<font color='red'>Only Characters are allowed</font>";
   }
   if(is_numeric($fname)){
       $errormessage="<font color='red'>Only Characters are allowed</font>";
   }

   if(is_numeric($lname)){
       $errormessage="<font color='red'>Only Characters are allowed</font>";
   }


//$m = $logged_user->get_role($user_id);
////var_dump($logged_user->get_username);
//$user_id=$logged_user->get_id();
//if($login_return){
//    $logged_user=new User_parent($user_id);
//    $_SESSION['id']=$user_id;
//    $_SESSION['username']=$logged_user->get_username();
//    $_SESSION['password']=$logged_user->get_pass();
//    $_SESSION['fname']=$logged_user->get_name();
//    $_SESSION['lname']=$logged_user->get_lname();
//    $_SESSION['email']=$logged_user->get_email();
//    $_SESSION['role']=$m;
//    if($_SESSION['role']==1){
//    header("location: Admin.php");}
//    if($_SESSION['role']==2){
//    header("location: mechanic.php");}
//    if($_SESSION['role']==3){
//    header("location: user.php");}
//}
//}
        }

?>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title> Registeration Form </title>

    <!-- Icons font CSS-->
    <link href="Register/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="Register/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="Register/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="Register/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="Register/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title"> Registration Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="fname">
                                            <label class="label--desc">first name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="lname">
                                            <label class="label--desc">last name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">UserName</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="username">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="row row-refine">

                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="password" name="password">
                                            <label class="label--desc">Password</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Account Type</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="role">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option name="mechanic" value="mechanic">Mechanic</option>
                                            <option name="customer">Customer</option>

                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row" >

                            <input class="input--style-5" placeholder="Location" id="mec" style="display:none ; height: 50px;width: 150px;margin: auto " type="text" name="location" >
                        </div>
                        <br><br><br>
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit" value="submit" name="submit" >Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
//<script>
    //function show() {
        //var divelemnt=document.getElementById("mec")
        //if(divelemnt.style.display=='none')
        //    divelemnt.style.display='block'
      //  else
    //        divelemnt.style.display='none'
  //  };

//</script>
    <!-- Jquery JS-->
    <script src="Register/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="Register/vendor/select2/select2.min.js"></script>
    <script src="Register/vendor/datepicker/moment.min.js"></script>
    <script src="Register/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="Register/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
