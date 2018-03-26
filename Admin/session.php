<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
   
   date_default_timezone_set('Asia/Kolkata');
	$crdate = date("d-m-Y");
?>