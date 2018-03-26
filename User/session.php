<?php
   include('config.php');
   session_start();
   
   $user_checkm = $_SESSION['loginm_user'];
   
   if(!isset($_SESSION['loginm_user'])){
      header("location:login.php");
   }
?>