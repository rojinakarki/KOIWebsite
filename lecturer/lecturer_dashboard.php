<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");

$userRetrieved = $_SESSION['user_id'];
$sql="SELECT * FROM enrollment, course WHERE user_id = '$userRetrieved' AND course.course_id = enrollment.course_id";
$result = mysqli_query($conn,$sql);
$enrollment = mysqli_fetch_all($result,MYSQLI_ASSOC);
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
    <title>Dashboard</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../lecturer/lecturer_navbar.php";?>
<div class="container-fluid pt-2">
    <div class="row">
        <?php foreach($enrollment as $enroll){?>
            <div class="col-sm d-flex">
                <div class="card flex-fill" >
                    <div class="card-header"> <?php echo htmlspecialchars($enroll['course_id']);?> </div>

                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong><?php echo htmlspecialchars($enroll['course_name']);?></strong></a></li>
                            <li class="list-group-item"> Start Time: <?php echo htmlspecialchars($enroll['course_start_time']);?> </li>
                            <li class="list-group-item"> Finish Time: <?php echo htmlspecialchars($enroll['course_finish_time']);?></li>
<!--                            Course Content-->
                            <li class="list-group-item"><a href="add_course_content.php?courseid=<?php echo $enroll['course_id'] ?>"><i class="fas fa-plus"> Course Content </i></a>
                                &nbsp; <a href="course_details.php?courseid=<?php echo $enroll['course_id'] ?>"><i class="fas fa-eye"> Course Content </i></a></li>
<!--                            Assignment -->
                            <li class="list-group-item"><a href="add_assignment.php?courseid=<?php echo $enroll['course_id'] ?>"><i class="fas fa-plus"> Assignment </i></a>
                                &nbsp; <a href="assignment.php?courseid=<?php echo $enroll['course_id'] ?>"><i class="fas fa-eye"> Assignment </i></a>

<!--                            Quiz-->
                            <li class="list-group-item"><a href="add_quiz.php?courseid=<?php echo $enroll['course_id'] ?>"><i class="fas fa-plus"> Quiz </i></a>
                                &nbsp; <a href="quiz.php?courseid=<?php echo $enroll['course_id'] ?>"><i class="fas fa-eye"> Quiz </i></a>

                                <!--                            Grade-->
                            <li class="list-group-item"><a href="grade_assignment.php?courseid=<?php echo $enroll['course_id'] ?>"><i class="fas fa-plus"> Grade </i></a></li>
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