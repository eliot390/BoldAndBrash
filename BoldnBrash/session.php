<?php
  include('config.php');
  session_start();

  $logged_in_user_id = $_SESSION['logged_in_user_id'];
  
  if(!isset($_SESSION['logged_in_user_id'])){
    header("location:login.php");
  }

  $sql = "SELECT * FROM certuser WHERE userID = $logged_in_user_id ";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $_SESSION['logged_in_user_id'] = $row['userID'];
?>
