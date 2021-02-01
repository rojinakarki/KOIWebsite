<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");

$user_id = $_SESSION['user_id'];
$sql = "Select c.course_id,c.course_name,c.course_start_time,c.course_finish_time,u.user_id from course as c
        inner join enrollment as e on e.course_id = c.course_id
        inner join user as u on e.user_id = u.user_id where e.user_id = '$user_id' ";
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
<?php include "../student/student_navbar.php";?>
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
                            <li class="list-group-item"><a href="student_course_content.php?courseid=<?php echo $enroll['course_id'];?>"> Course Content</a></li>
                            <li class="list-group-item"><a href="student_view_assignment.php?courseid=<?php echo $enroll['course_id'];?>">View Assignment</a></li>
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
