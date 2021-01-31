<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");

$courseRetrieved = $_GET["courseid"];
$sql = "SELECT c.course_id,c.course_name,c.course_start_time,c.course_finish_time, cc.course_content_id, cc.course_content 
        FROM course_content as cc 
        inner join course as c on cc.course_id = c.course_id where cc.course_id='$courseRetrieved'";
$result = mysqli_query($conn,$sql);
$courses = mysqli_fetch_all($result,MYSQLI_ASSOC);
print_r($courses);
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
    <div class="title" style="text-align: center;">
        <h2><strong><?php echo htmlspecialchars($courseRetrieved);?> <?php echo $courses[1]['course_name'];?></strong></h2>
    </div>
    <ul style="list-style: none;">
        <?php foreach($courses as $course){?>
            <li><a href="../uploads/<?php echo $course['course_content'];?>"><?php echo $course['course_content'];?></a></li>
        <?php }?>
    </ul>

</div>

    <?php include "../js/js.php";?>
</body>
</html>
