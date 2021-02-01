<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");

$courseRetrieved = $_GET["courseid"];
$_SESSION['course_id'] = $courseRetrieved;
$sql="SELECT * FROM quiz as q inner join course as c on q.course_id = c.course_id";
$result = mysqli_query($conn,$sql);
$quizes = mysqli_fetch_all($result,MYSQLI_ASSOC);
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
        <?php foreach($quizes as $quiz){?>
            <div class="col-sm d-flex">
                <div class="card flex-fill" >
                    <div class="card-header"> <?php echo htmlspecialchars($quiz['course_id']);?> </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Quiz: <strong><?php echo htmlspecialchars($quiz['quiz_title']);?></strong></a></li>
                            <li class="list-group-item">Total Question: <strong><?php echo htmlspecialchars($quiz['total_question']);?></strong></a></li>
                            <li class="list-group-item">Time Limit: <strong><?php echo htmlspecialchars($quiz['time_limit']);?> min</strong></a></li>
                            <li class="list-group-item">Mark per question <strong><?php echo htmlspecialchars($quiz['mark_per_que']);?> point</strong></a></li>
                            <li class="list-group-item"><a href="edit_quiz.php?quizid=<?php echo $quiz['quiz_id'] ?>"><i class="fas fa-edit"> Quiz </i></a>
                                &nbsp; &nbsp;<a href="add_quiz_question.php?quizid=<?php echo $quiz['quiz_id'] ?>"><i class="fas fa-plus"> Quiz Question </i></a>
                                &nbsp; &nbsp;<a href="quiz_question.php?quizid=<?php echo $quiz['quiz_id']?>"><i class="fas fa-eye"> Quiz Question </i></a>
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