<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");

$quiz_title = $total_question = $time_limit= $mark_per_que ='';
$errors = array('quiz_title'=>'',
    'total_question'=>'',
    'time_limit'=>'',
    'mark_per_que'=>'');
if(isset($_POST['create-quiz'])) {
    //    check Quiz title
    if (empty($_POST['quiz_title'])) {
        $errors['quiz_title'] = 'Quiz Title is required <br/>';
    } else {
        $quiz_title = $_POST['quiz_title'];
        if (!preg_match("/^[a-zA-Z\s]+$/", $quiz_title)) {
            $errors['quiz_title'] = "Quiz Title must be letters and spaces only";
        }
    }
    //    check total question
    if (empty($_POST['total_question'])) {
        $errors['total_question'] = 'Total Question is required <br/>';
    } else {
        $total_question = $_POST['total_question'];
        if (!preg_match("/^[0-9]{1,2}+$/", $total_question)) {
            $errors['total_question'] = "Total question must be numbers only.";
        }
    }
    //    check time limit
    if (empty($_POST['time_limit'])) {
        $errors['time_limit'] = 'Time Limit is required <br/>';
    } else {
        $time_limit = $_POST['time_limit'];
        if (!preg_match("/^[0-9]{1,2}+$/", $time_limit)) {
            $errors['time_limit'] = "Time Limit must be numbers only.";
        }
    }
    //    check mark per question
    if (empty($_POST['mark_per_que'])) {
        $errors['mark_per_que'] = 'Mark Per Question is required <br/>';
    } else {
        $mark_per_que = $_POST['mark_per_que'];
        if (!preg_match("/^[0-9]{1,2}+$/", $mark_per_que)) {
            $errors['mark_per_que'] = "Mark Per Question must be numbers only.";
        }
    }
    if(array_filter($errors)){}
    else{
        $quiz_title  = mysqli_real_escape_string($conn,$_POST['quiz_title']);
        $total_question = mysqli_real_escape_string($conn,$_POST['total_question']);
        $time_limit= mysqli_real_escape_string($conn,$_POST['time_limit']);
        $mark_per_que= mysqli_real_escape_string($conn,$_POST['mark_per_que']);

//      Insert course details into DB Table Course
        $sql = "INSERT INTO quiz(quiz_title,total_question,time_limit,mark_per_que,)
                 VALUES ('$quiz_title','$total_question','$time_limit', '$mark_per_que')";

//      Save to db and check
        if(mysqli_query($conn,$sql)){
            // success
            header('Location:course.php');
        }else{
            // error
            echo "Query error:". mysqli_error($conn);
        }
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Quiz</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../lecturer/lecturer_navbar.php";?>
    <div class="title">
        <h2><strong>Add Quiz</strong></h2>
        <h3>Add Quiz Question</h3>
    </div>
    <div class="d-flex justify-content-center" >
     <form action="" method="POST" class="w-50">
            <!--Quiz Title-->
            <div class="col">
                <?php inputElement("","text", "quiz_title","Quiz Title","$quiz_title","");?>
                <span class="error"><?php echo $errors['quiz_title'];?></span>
            </div>
            <!--Total Question -->
            <div class="col">
                <?php inputElement("","text", "total_question","Total Question","$total_question","");?>
                <span class="error"> <?php echo $errors['total_question'];?></span>
            </div>
            <!--Time Limit-->
            <div class="col">
                <?php inputElement("","text", "time_limit","Time limit","$time_limit","");?>
                <span class="error"><?php echo $errors['time_limit'];?></span>
            </div>
            <!--Mark Per Question-->
            <div class="col">
                <?php inputElement("","text", "mark_per_que","Mark Per Question","$mark_per_que","");?>
                <span class="error"><?php echo $errors['mark_per_que'];?></span>
            </div>
            <br>
            <div class="col">
                <?php buttonElement("btn-create","btn btn-success btn-block", "Submit and Add Quiz Question","create-quiz","data-toggle='tooltip' data-placement='bottom' title='Create' ");?>
            </div>
        </form>
    </div>




<?php include "../js/js.php";?>
</body>
</html>