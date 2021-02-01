<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");

if(isset($_POST['search'])){
    $valueToSearch = $_POST['valueToSearch'];

//  Get records based on course id and name from course
    $sql = "SELECT * FROM `course` WHERE CONCAT(`course_id`, `course_name`) LIKE '%".$valueToSearch."%'";
    $result=mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
}
// Get all records from course
else{
    $sql="SELECT * FROM course";
    $result=mysqli_query($conn, $sql);
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course</title>
    <?php include "../css/css.php";?>

</head>
<body>
<?php include "../admin/admin_navbar.php";?>
<div class="container">
    <form action="" method="POST">
        <br>
        <input type="text" name="valueToSearch" placeholder="Search Course">
        <input type="submit" name="search" value="Filter"><br><br>
        <!--Bootstrap Table-->
        <div class="d-flex table-data">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Course Start Time</th>
                    <th>Course Finish Time</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_array($result)) :?>
                    <tr>
                        <td><?php echo $row['course_id'];?></td>
                        <td><?php echo $row['course_name'];?></td>
                        <td><?php echo $row['course_start_time'];?></td>
                        <td><?php echo $row['course_finish_time'];?></td>
                        <td><a href="edit_course.php?courseid=<?php echo $row['course_id'] ?>"><i class="fas fa-edit"></i></a>
                        <td><a href="delete_course.php?courseid=<?php echo $row['course_id'] ?>"><i class="fas fa-trash-alt"></i></a>
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