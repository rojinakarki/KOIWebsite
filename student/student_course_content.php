<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");

//Get records from course_content table
$courseRetrieved = $_GET['courseid'];
$sql="SELECT c.course_id,c.course_name,c.course_start_time,c.course_finish_time, cc.course_content_id, cc.course_content FROM course_content as cc 
        inner join course as c on cc.course_id = c.course_id where cc.course_id = '$courseRetrieved'";
$result=mysqli_query($conn, $sql);
$course_content = mysqli_fetch_all($result,MYSQLI_ASSOC);
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
    <title>View Course Content</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../student/student_navbar.php";?>
<div class="container-fluid pt-2">
    <div class="row">
        <?php foreach($course_content as $content){?>
            <div class="col-sm d-flex">
                <div class="card flex-fill" >
                    <div class="card-header"> <?php echo htmlspecialchars($content['course_id']);?> </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong> Course Name : <?php echo $content['course_id'];?> &nbsp; <?php echo $content['course_name'];?> </strong></li>
                            <li class="list-group-item"><strong>Start Time: <?php echo $content['course_start_time'];?></strong></li>
                            <li class="list-group-item"><strong> Finish Time: <?php echo $content['course_finish_time'];?></strong> </li>
                            <li class="list-group-item"><a href="../uploads/<?php echo $content['course_content'];?>"><?php echo $content['course_content'];?></a></li>
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