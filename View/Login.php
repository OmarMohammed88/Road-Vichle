<?php

include_once "../Classes/User_parent.php";

session_start();
if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])){
           $username=$_COOKIE['username'];
           $password=$_COOKIE['password'];
       }
if(isset($_POST['submit'])){
   $username=$_POST['username'];
   $password=$_POST['password'];
   if(is_numeric($username)){
       $errormessage="<font color='red'>Only Characters are allowed</font>";
   }
   else{
       if(isset($_POST['remember'])){
           setcookie("username", $username, time()+(60*60));
           setcookie("password", $password, time()+(60*60));
       }
$logged_user=new User_parent();
$logged_user->set_username($username);
$logged_user->set_password($password);
$login_return=$logged_user->login();
if($login_return){
		$user_id=$logged_user->get_id();
		$role = $logged_user->getRole($user_id);
		$fname= $logged_user->getFname($user_id);
		$username=$logged_user->getUsername($user_id);
		$password=$logged_user->getPass($user_id);
		$lname=$logged_user->getLname($user_id);
		$email=$logged_user->getEmail($user_id);
}
if($login_return){
     $logged_user=new User_parent($user_id);
    $_SESSION['id']=$user_id;
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $_SESSION['fname']=$fname;
    $_SESSION['lname']=$lname;
    $_SESSION['email']=$email;
    $_SESSION['role']=$role;
    if($_SESSION['role']==1){
    header("Location: adminhome.php");}
    if($_SESSION['role']==2){
      $sql="SELECT state FROM `mechanic_state` WHERE username = ''$username'";
      $r=mysqli_query($sql);
      //var_dump($r);
      if($r==1){
    header("Location: mechanichome.php");
  }
    else if($r==0){
      header("location:mechanichome.php");
    }}
    if($_SESSION['role']==3){
    header("Location:userhome.php");}
}
   }
        }

?>



<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="Login_v4/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v4/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v4/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v4/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v4/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v4/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v4/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v4/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v4/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v4/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v4/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<form action="Login.php" method ="post" name="login">
	<div class="limiter">
		<div class="container-login100" style="background-image: url('Login_v4/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="submit" value="Login">
								Login
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Or Sign Up Using
						</span>

						<a href="#" class="txt2">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="Login_v4/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v4/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v4/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v4/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v4/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v4/vendor/daterangepicker/moment.min.js"></script>
	<script src="Login_v4/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Login_v4/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Login_v4/js/main.js"></script>

</body>
</html>
