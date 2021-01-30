<?
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");

$user_id = $_SESSION['user_id'];
//SELECT c.course_id,c.course_name, cc.course_content FROM course_content as cc
//        inner join course as c on cc.course_id = c.course_id where cc.course_content_id =

 $sql = "Select c.course_id,c.course_name,c.course_start_time,c.course_finish_time,u.user_id from course as c 
        inner join enrollment as e on e.course_id = c.course_id 
        inner join user as u on e.user_id = u.user_id where e.user_id = '$user_id' ";
 $result = mysqli_query($conn,$sql);
 print_r($result);

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
<div class="container">
    <div class="row">
        <div class="col s6 md3">
            <div class="card z-depth-0">
                <div class="card-content center">
                    <h1> hello user</h1>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include "../js/js.php";?>
</body>
</html>
