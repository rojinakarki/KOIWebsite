<?php
session_start();
  if(isset($_SESSION['user_id'])){
  }
  else{
      echo ('<meta http-equiv="refresh" content="0">');
      header("location:../login.php");
  }
?>