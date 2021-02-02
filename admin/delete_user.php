<?php
include("../include/session_check.php");
include_once("../connectDB.php");
    $id_to_del = mysqli_real_escape_string($conn,$_GET['userid']);
    $sql1= "DELETE from user where user_id ='$id_to_del' ";

    if(mysqli_query($conn,$sql1)){
        // success
        header('Location:user.php');
    }else{
        // error
        echo "Query error:". mysqli_error($conn);
    }
mysqli_close($conn);
?>