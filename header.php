<?php 
 

	date_default_timezone_set("ASIA/KOLKATA");
// Check if the user is logged in, if not then redirect him to login page
include'database.php';




function my_simple_crypt( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'mwa_encyption';
    $secret_iv = '9886162566';
  
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
  
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
  
    return $output;
  }
 
?>
   <?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page

$username=$_SESSION['username'];
$sql="SELECT * from users where username ='$username'";
$ask=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($ask);
$dt=$data['user_type'];
  $_SESSION['usertype']="$dt";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: log");
    exit;
}
$theader=" SSSVN | Stark Tech Innovative Labs LLP";
$act = $_SERVER['REQUEST_URI'];
$var=explode("/",$act);
   $active=$var[2];

?>

   


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico"> 
    <link rel="manifest" href="manifest.json">
	<script src="sw.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <style>

.preloader {
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   z-index: 9999;
   align-items: center;
   justify-content: center;
   background-image: url('img/logo (2).png');
   background-repeat: no-repeat; 
   background-color: #FFF;
   background-position: center;
}
a{
	text-decoration: none;
}
.example-print {
    display: none;
}
@media print {
   .example-screen {
       display: none;
    }
    .example-print {
       display: block;
    }
}
    </style>
</head>
<!-- <script>

// var URL = window.location.pathname;
//         <?php $act="var PageName = URL.substring(URL.lastIndexOf('/') + 1);"; ?>     

            </script> -->
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index"><img src="assets/images/logo/logo.png" class="img-fluid" alt="Logo"  srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">

                <?php  if( $_SESSION['usertype']=="TEACHER" ) { ?>
                    <ul class="menu">
                       

                      
                       <?php } else{ ?>


                    <ul class="menu">
                       

                        <li class="sidebar-item active"  >
                            <a href="index" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard </span>
                            </a>
                        </li>
                        <li class="sidebar-title badge bg-info text-light">Admission's</li>
                        <li <?php   if ($active=="AddApplication" || $active=="ManageApplication") {
                           echo 'class="sidebar-item active has-sub"';
                       } else {
                           echo 'class="sidebar-item has-sub"';
                       } ?> >
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Applications</span>
                            </a>
                            <ul <?php   if ($active=="AddApplication" || $active=="ManageApplication") {
                           echo 'class="submenu active"';
                       } else {
                           echo 'class="submenu "';
                       } ?> >
                                <li class="submenu-item ">
                                    <a href="AddApplication">Add Application</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ManageApplication">Manage Application </a>
                                </li>
                               
                            </ul>
                        </li>
                        <li <?php   if ($active=="SearchEnrollment" || $active=="CheckStatus" || $active=="PrintApplication"|| $active=="EditEnrollment"|| $active=="StudentRemarks") {
                           echo 'class="sidebar-item active has-sub"';
                       } else {
                           echo 'class="sidebar-item has-sub"';
                       } ?> >
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-badge-fill"></i>
                                <span>Enrollments</span>
                            </a>
                            <ul <?php   if ($active=="SearchEnrollment"  || $active=="CheckStatus" || $active=="PrintApplication" || $active=="EditEnrollment"|| $active=="StudentRemarks") {
                           echo 'class="submenu active"';
                       } else {
                           echo 'class="submenu "';
                       } ?> >
                                <li class="submenu-item ">
                                    <a href="SearchEnrollment">New Enrollment</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="CheckStatus">Check Enrollment Status </a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="PrintApplication">Print Enrollment Application </a>
                                </li>
                                <?php	if (($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator")||($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="principal")) { ?>

                                <li class="submenu-item ">
                                    <a href="EditEnrollment"> Edit Enrollment </a>
                                </li>
                                <?php }?>
                                <?php  if ($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator") { ?>

                                <li class="submenu-item ">
                                    <a href="StudentRemarks">Remarks</a>
                                </li>
                                <?php }?>

                            </ul>
                        </li>
                        <li class="sidebar-title badge bg-success text-light">Finance</li>
                        <li <?php   if ($active=="AddTutionFee" || $active=="ModifyTutionFee") {
                           echo 'class="sidebar-item active has-sub"';
                       } else {
                           echo 'class="sidebar-item has-sub"';
                       } ?> >
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-bank"></i>
                                <span>Tuition Fee</span>
                            </a>
                            <ul <?php   if ($active=="AddTutionFee"  || $active=="ModifyTutionFee") {
                           echo 'class="submenu active"';
                       } else {
                           echo 'class="submenu "';
                       } ?> >
                                <li class="submenu-item ">
                                    <a href="AddTutionFee">Add Tuition Fee</a>
                                </li>
                                <?php  if ($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator") { ?>
                                <li class="submenu-item ">
                                    <a href="ModifyTutionFee">Modify Tuition Fee</a>
                                </li>
                                <?php }?>
                            </ul>
                        </li>
                        <li <?php   if ($active=="AddUbsFee" || $active=="ModifyUbsFee") {
                           echo 'class="sidebar-item active has-sub"';
                       } else {
                           echo 'class="sidebar-item has-sub"';
                       } ?> >
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-cash"></i>
                                <span>UBS Fee</span>
                            </a>
                            <ul <?php   if ($active=="AddUbsFee"  || $active=="ModifyUbsFee") {
                           echo 'class="submenu active"';
                       } else {
                           echo 'class="submenu "';
                       } ?> >
                                <li class="submenu-item ">
                                    <a href="AddUbsFee">Add UBS Fee</a>
                                </li>
                                <?php  if ($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator") { ?>
                                <li class="submenu-item ">
                                    <a href="ModifyUbsFee">Modify UBS Fee</a>
                                </li>
                                <?php }?>

                            </ul>
                        </li>
                        <li <?php   if ($active=="FeePayment" || $active=="GenerateTutionFeeReceipt" || $active=="DiscountApproval"|| $active=="FinancialRecord") {
                           echo 'class="sidebar-item active has-sub"';
                       } else {
                           echo 'class="sidebar-item has-sub"';
                       } ?> >
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-cash-coin"></i>
                                <span>Fee Payment</span>
                            </a>
                            <ul <?php   if ($active=="FeePayment"  || $active=="GenerateTutionFeeReceipt" || $active=="DiscountApproval"|| $active=="FinancialRecord") {
                           echo 'class="submenu active"';
                       } else {
                           echo 'class="submenu "';
                       } ?> >
                                 <li class="submenu-item ">
                                    <a href="FinancialRecord">Transaction Record </a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="FeePayment">Collect Fee</a>
                                </li>
                                <?php if ($data['user_type']=="ADMIN") { ?>
                                <li class="submenu-item ">
                                    <a href="DiscountApproval">Discount Approval</a>
                                </li>
                                <?php }?>
                                <li class="submenu-item ">
                                    <a href="GenerateTutionFeeReceipt">Print Fee Receipt </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="sidebar-title badge bg-warning text-dark">Transport</li>
                        <li <?php   if ($active=="AddBus" || $active=="AddStages"|| $active=="ModifyStages") {
                           echo 'class="sidebar-item active has-sub"';
                       } else {
                           echo 'class="sidebar-item has-sub"';
                       } ?> >
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-truck"></i>
                                <span>Bus Management</span>
                            </a>
                            <ul <?php   if ($active=="AddBus"  || $active=="AddStages"|| $active=="ModifyStages") {
                           echo 'class="submenu active"';
                       } else {
                           echo 'class="submenu "';
                       } ?> >
                                <li class="submenu-item ">
                                    <a href="AddBus">Add Bus</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="AddStages">Stages Fare <i class="bi bi-cash-coin"></i></a>
                                </li>
                                <?php  if ($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator") { ?>
                                <li class="submenu-item ">
                                    <a href="ModifyStages">Modify Stages  </i></a>
                                </li>
                                <?php }?>

                            </ul>
                        </li>
                      
                        <li <?php   if ($active=="TransportFeeBilling") {
                           echo 'class="sidebar-item active has-sub"';
                       } else {
                           echo 'class="sidebar-item has-sub"';
                       } ?> >
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-plus-fill"></i>
                                <span>Transport Enrollment</span>
                            </a>
                            <ul <?php   if ($active=="TransportFeeBilling") {
                           echo 'class="submenu active"';
                       } else {
                           echo 'class="submenu "';
                       } ?> >
                                <li class="submenu-item ">
                                    <a href="TransportFeeBilling">Enroll Student</a>
                                </li>
                                <?php  if ($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator") { ?>
                                <li class="submenu-item ">
                                    <a href="#">Modify Enrollment <i class="bi bi-slash-circle-fill"></i></a>
                                </li>
                                <?php }?>

                                
                            </ul>
                        </li>

                        <li class="sidebar-title badge bg-success text-light">Attendance</li>
                        <li <?php   if ($active=="AttendanceEntry" || $active=="ViewAttendanceReport") {
                           echo 'class="sidebar-item active has-sub"';
                       } else {
                           echo 'class="sidebar-item has-sub"';
                       } ?> >
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-fill"></i>
                                <span>Attendance Management</span>
                            </a>
                            <ul <?php   if ($active=="AttendanceEntry"  || $active=="ViewAttendanceReport") {
                           echo 'class="submenu active"';
                       } else {
                           echo 'class="submenu "';
                       } ?> >
                                <li class="submenu-item ">
                                    <a href="AttendanceEntry">Attendance Entry</a>
                                </li>
                               
                                <li class="submenu-item ">
                                    <a href="ViewAttendanceReport">View Attendance Report</a>
                                </li>
                               

                            </ul>
                        </li> 
                        <?php  if (($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator") || ($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="principal")) { ?>
                         <li class="sidebar-title badge bg-dark text-light">User's</li>
                        <li <?php   if ($active=="AddUser" || $active=="ManageUser") {
                           echo 'class="sidebar-item active has-sub"';
                       } else {
                           echo 'class="sidebar-item has-sub"';
                       } ?> >
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-fill"></i>
                                <span>User Management</span>
                            </a>
                            <ul <?php   if ($active=="AddUser"  || $active=="ManageUser") {
                           echo 'class="submenu active"';
                       } else {
                           echo 'class="submenu "';
                       } ?> >
                                <li class="submenu-item ">
                                    <a href="AddUser">Add Users</a>
                                </li>
                                <?php  if ($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator") { ?>
                                <li class="submenu-item ">
                                    <a href="ManageUser">Manage Users</a>
                                </li>
                                <?php }?>

                            </ul>
                        </li> 
                        <?php }?>
                         <li class="sidebar-title badge bg-primary text-light">Events</li>
                        <li <?php   if ($active=="AddEvents" || $active=="ManageEvents") {
                           echo 'class="sidebar-item active has-sub"';
                       } else {
                           echo 'class="sidebar-item has-sub"';
                       } ?> >
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-calendar-day-fill"></i>
                                <span>Event Management</span>
                            </a>
                            <ul <?php   if ($active=="AddEvents"  || $active=="ManageEvents") {
                           echo 'class="submenu active"';
                       } else {
                           echo 'class="submenu "';
                       } ?> >
                                <li class="submenu-item ">
                                    <a href="AddEvents">Add Event</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ManageEvents">Manage Events</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="sidebar-title badge bg-light text-dark">Reports</li>
                        <li <?php   if ($active=="FeeReportCustom" || $active=="UbsReport"|| $active=="ClassFeeReport"|| $active=="LoginFeeReport") {
                           echo 'class="sidebar-item active has-sub"';
                       } else {
                           echo 'class="sidebar-item has-sub"';
                       } ?> >
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical"></i>
                                <span>Finance</span>
                            </a>
                            <ul <?php   if ($active=="FeeReportCustom"  || $active=="UbsReport"|| $active=="ClassFeeReport"|| $active=="LoginFeeReport") {
                           echo 'class="submenu active"';
                       } else {
                           echo 'class="submenu "';
                       } ?> >
                                <li class="submenu-item ">
                                    <a href="FeeReportCustom">Fee Report(Custom)</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="UbsReport">UBS Fee Report</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="LoginFeeReport">Login Fee Report</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="ClassFeeReport">Class Fee Report</a>
                                </li>
                                
                            </ul>
                        </li>
                        <?php }?>
                        <li class="sidebar-title badge bg-danger text-light"><a>Raise Support</a></li>

                        <li class="sidebar-item  ">
                            <a href="mailto:support@starktechlabs.in?cc=anoopnarayan@starktechlabs.in,harisceo@starktechlabs.in,arvindks@starktechlabs.in&subject=Tech%20Support%20for%20SSSVN,BAGEPALLI%20Login%20Portal&body=Dear%20Sir%2FMa'am%2C%0D%0AGreetings%20To%20Stark%20Tech%20Innovative%20labs%2C%0D%0AWe%20wanted%20to%20have%20a%20Support%20for%20Portal%20with%20the%20following%20Issues%20%3A-%0D%0A%0D%0Aplease%20Specify%20it%20%0D%0A%0D%0A%0D%0AThanking%20You%2C" class='sidebar-link'>
                                <i class="bi bi-life-preserver"></i>
                                <span>Mail us</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="tel:+91-98861162566" class='sidebar-link'>
                                <i class="bi bi-telephone-fill"></i>
                                <span>Call US <br> <small>+91-9886162566</small></span>
                            </a>
                        </li>

                       

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h5><a href="index" class="text-muted">Dashboard</a> / <span id="demo"></span> / <span><a href="logout"><button class="badge bg-danger text-light">Logout</button></a></span></h5>
            </div>
            <div class="page-content">
        
            <div class="preloader"></div>
<script>  $(window).load(function() {
   $('.preloader').fadeOut('slow');

})</script>