<?php
   include('config.php');
   session_start();
   
   $username = $_SESSION['username'];
   
   $ses_sql = mysqli_query($con,"select username from members where username = '".$username."' ");
   
   $row = mysqli_fetch_array($ses_sql);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['username'])){
      header("location:login.php");
   }
?>