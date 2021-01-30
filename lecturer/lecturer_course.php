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
    <title>Course Content</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../lecturer/lecturer_navbar.php";?>
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
                    <th>EDIT</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_array($result)) :?>
                    <tr>
                        <td><?php echo $row['course_id'];?></td>
                        <td><?php echo $row['course_name'];?></td>
                        <td><a href="add_course_content.php?courseid=<?php echo $row['course_id'] ?>"><i class="fas fa-edit"></i></a>
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