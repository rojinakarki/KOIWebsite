<?php
include("../include/session_check.php");
include_once("../connectDB.php");
$id_to_del = mysqli_real_escape_string($conn,$_GET['quizquestionid']);
$sql1= "DELETE from quiz_question where quiz_question_id='$id_to_del' ";

if(mysqli_query($conn,$sql1)){
    // success
    header("Location:quiz_question.php?quizid=".$_SESSION['quiz_id']);
}else{
    // error
    echo "Query error:". mysqli_error($conn);
}
mysqli_close($conn);
?>