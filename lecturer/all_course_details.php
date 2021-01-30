<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");


//Get records from course_content table
    $sql="SELECT c.course_id,c.course_name,c.course_start_time,c.course_finish_time, cc.course_content_id, cc.course_content FROM course_content as cc 
        inner join course as c on cc.course_id = c.course_id";
    $result=mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course Content</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../lecturer/lecturer_navbar.php";?>
<div class="container">
    <form action="" method="POST">
        <!--Bootstrap Table-->
        <div class="d-flex table-data">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Course Start Time</th>
                    <th>Course Finish Time</th>
                    <th>Course Content</th>
                    <th>EDIT</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_array($result)) :?>

                    <tr>
                        <td><?php echo $row['course_id'];?></td>
                        <td><?php echo $row['course_name'];?></td>
                        <td><?php echo $row['course_start_time'];?></td>
                        <td><?php echo $row['course_finish_time'];?></td>
                        <td><?php echo $row['course_content'];?></td>
                        <td><a href="edit_course_content.php?course_content_id=<?php echo $row['course_content_id'] ?>"><i class="fas fa-edit"></i></a>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </form>
</div>
<?php include "../js/js.php";?>
</body>
</html>