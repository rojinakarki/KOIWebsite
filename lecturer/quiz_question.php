<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");

$quizRetrieved= $_GET["quizid"];
$_SESSION['quiz_id']=$quizRetrieved;
$sql="SELECT * FROM quiz_question as qq inner join quiz as q on qq.quiz_id = q.quiz_id where qq.quiz_id='$quizRetrieved'";
$result = mysqli_query($conn,$sql);
$quiz_question = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../lecturer/lecturer_navbar.php";?>
<div class="container-fluid pt-2">
    <div class="row">
        <?php foreach($quiz_question as $qq){?>
            <div class="col-sm-4 d-flex">
                <div class="card flex-fill" >
                    <div class="card-header"> <?php echo htmlspecialchars($qq['quiz_title']);?> </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Quiz Type: &nbsp; <strong><?php echo htmlspecialchars($qq['quiz_type']);?></strong></a></li>
                            <li class="list-group-item">Option 1: &nbsp; <strong><?php echo htmlspecialchars($qq['quiz_option1']);?></strong></a></li>
                            <li class="list-group-item">Option 2: &nbsp;<strong><?php echo htmlspecialchars($qq['quiz_option2']);?></strong></a></li>
                            <li class="list-group-item">Option 3: &nbsp;<strong><?php echo htmlspecialchars($qq['quiz_option3']);?></strong></a></li>
                            <li class="list-group-item">Option 4: &nbsp;<strong><?php echo htmlspecialchars($qq['quiz_option4']);?></strong></a></li>
                            <li class="list-group-item">Answer: &nbsp; <strong><?php echo htmlspecialchars($qq['quiz_answer']);?></strong></a></li>
                            <li class="list-group-item"><a href="edit_quiz_question.php?quizquestionid=<?php echo $qq['quiz_question_id'] ?>"><i class="fas fa-edit"> Quiz Question </i></a>
<!--                                &nbsp; &nbsp;<a href="add_quiz_question.php?quizid=--><?php //echo $quiz['quiz_id'] ?><!--"><i class="fas fa-plus"> Quiz Question </i></a>-->
<!--                                &nbsp; &nbsp;<a href="view_quiz_question.php?courseid=--><?php //echo $quiz['course_id'] ?><!--"><i class="fas fa-eye"> Quiz Question </i></a>-->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</div>



<?php include "../js/js.php";?>
</body>
</html>