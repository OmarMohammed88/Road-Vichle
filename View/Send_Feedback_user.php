<?php
//require_once ( __DIR__.'C:\xampp\htdocs\Road Vichle\Classes\Mechanics.php');
include_once ('../Classes/User_Actor.php');
session_start();
$id=$_SESSION["id"];
if(!isset($_SESSION['username']))
{ header ("location:Login.php");

}



$user=new User_Actor();

if (!empty($_POST["name"])){
    $feedback = $_POST["name"];
}
if(isset($_POST['submit'])){

$user->Send_feedback($id,$feedback);
header("location:userhome.php");
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>User</title>

		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- Bootstrap CSS -->
                <link href="mechanichome/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

		<!-- Font Awesome CSS -->
                <link href="mechanichome/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

		<!-- Custom CSS -->
                <link href="mechanichome/assets/css/style.css" rel="stylesheet" type="text/css" />

		<!-- BEGIN CSS for this page -->

		<!-- END CSS for this page -->

</head>

<body class="adminbody">



<div id="main">

	<!-- top bar navigation -->
	<div class="headerbar">

		<!-- LOGO -->
        <div class="headerbar-left">
            <a href="userhome.php" class="logo"><img alt="Logo" src="mechanichome/assets/images/logo.png" /> <span>User</span></a>
        </div>

        <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">




                        <li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="mechanichome/assets/images/avatars/admin.png" alt="Profile image" class="avatar-rounded">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Hello, User</small> </h5>
                                </div>


                                <!-- item-->
                                <a href="logout.php" class="dropdown-item notify-item">
                                    <i class="fa fa-power-off"></i> <span>Logout</span>
                                </a>

								<!-- item-->

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left">
								<i class="fa fa-fw fa-bars"></i>
                            </button>
                        </li>
                    </ul>

        </nav>

	</div>
	<!-- End Navigation -->


	<!-- Left Sidebar -->
	<div class="left main-sidebar">

		<div class="sidebar-inner leftscroll">

			<div id="sidebar-menu">

			<ul>

					<li class="submenu">
                                            <a href="userhome.php"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                    </li>



					<li class="submenu">
                        <a href="#" class="active"><i class="fa fa-fw fa-table"></i> <span> User Permission </span> <span class="menu-arrow"></span></a>
							<ul class="list-unstyled">
                                                            <li class="active"><a href="#">Send Feedback</a></li>
                                                            <li><a href="send_request.php">Send Request</a></li>
							</ul>
                    </li>










            </ul>

            <div class="clearfix"></div>

			</div>

			<div class="clearfix"></div>

		</div>

	</div>
	<!-- End Sidebar -->


    <div class="content-page">

		<!-- Start content -->
        <div class="content">

			<div class="container-fluid">



						<div class="row">
								<div class="col-xl-12">
										<div class="breadcrumb-holder">
												<h1 class="main-title float-left">Tables</h1>
												<ol class="breadcrumb float-right">
													<li class="breadcrumb-item">Home</li>
													<li class="breadcrumb-item active">Tables</li>
												</ol>
												<div class="clearfix"></div>
										</div>
								</div>
						</div>
						<!-- end row -->



						<div class="row" >

								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="card mb-3">


										<div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-file-o"></i> Send Feedback</h3>
								Try to make your Feedback Positive
							</div>

							<div class="card-body">
                                                            <form method="POST" >
                                                    <label class="label--desc"> </label>
                                                    <textarea rows="3" class="form-control editor"  type="text" name="name" id="name" ></textarea> <br>
                                                    <button type="submit"  class="btn btn-outline-success" value="submit" name="submit" >Send </button>
                                                    </form>

                                                </div><!-- end card-->
                    </div>

			</div>
									</div><!-- end card-->
								</div>






            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->

	<footer class="footer">
		<span class="text-right">
		Copyright <a target="_blank" href="#">Your Website</a>
		</span>
		<span class="float-right">
		Powered by <a target="_blank" href="https://www.pikeadmin.com"><b>Pike Admin</b></a>
		</span>
	</footer>

</div>
<!-- END main -->

<script src="mechanichome/assets/js/modernizr.min.js"></script>
<script src="mechanichome/assets/js/jquery.min.js"></script>
<script src="mechanichome/assets/js/moment.min.js"></script>

<script src="mechanichome/assets/js/popper.min.js"></script>
<script src="mechanichome/assets/js/bootstrap.min.js"></script>

<script src="mechanichome/assets/js/detect.js"></script>
<script src="mechanichome/assets/js/fastclick.js"></script>
<script src="mechanichome/assets/js/jquery.blockUI.js"></script>
<script src="mechanichome/assets/js/jquery.nicescroll.js"></script>

<!-- App js -->
<script src="mechanichome/assets/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->

<!-- END Java Script for this page -->

</body>
</html>
