<?php
include_once("../connectDB.php");
$id_to_del = mysqli_real_escape_string($conn,$_GET['courseid']);
$sql1= "DELETE from course where course_id ='$id_to_del' ";

if(mysqli_query($conn,$sql1)){
    // success
    header('Location:course.php');
}else{
    // error
    echo "Query error:". mysqli_error($conn);
}
mysqli_close($conn);
?>