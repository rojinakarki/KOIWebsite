<?php
require_once("../include/component.php");
include("../connectDB.php");
?>
<?php
$courseRetrieved = $_GET["courseid"];
$sql = "SELECT * FROM course WHERE course_id = '$courseRetrieved'";
$result=mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if(isset($_POST['update'])) {
    $update_course_name=$_POST['update_course_name'];
    $update_course_start=$_POST['update_courseStart'];
    $update_course_finish=$_POST['update_courseFinish'];

    $sql2 ="UPDATE course 
    SET course_name ='$update_course_name', course_start_time='$update_course_start',
    course_finish_time='$update_course_finish' WHERE course_id = '$courseRetrieved'";
    $result2=mysqli_query($conn, $sql2);

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../admin/admin_navbar.php";?>
<div class=title>
    <h2> Course Details</h2>
    <h3> Edit Detail for All Available Courses </h3>
</div>
<div class="d-flex justify-content-center" >
    <form action="" method="POST" class="w-50">
        <?php while($row = mysqli_fetch_array($result)) :
            $courseName= $row['course_name'];
            $courseStart= $row['course_start_time'];
            $courseFinish= $row['course_finish_time'];

            ?>
            <!--Course ID-->
            <div class="col">
                <label for="courseId"><strong>Course ID</strong></label>
                <div class="pt-2">
                    <div class="input-group my-auto">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-id-badge"></i></div>
                        </div>
                        <input type="text" name="course_id"  value="<?php echo $courseRetrieved;?>" class="form-control" >
                    </div>
                </div>
            </div>

            <!--Course Name-->
            <div class="col">
                <label for="courseName"><strong>Course Name</strong></label>
                <?php inputElement("fas fa-id-card-alt","text", "update_course_name","Course Name","$courseName","");?>
            </div>

            <!--Course Start Time-->
            <div class="col">
                <label for="courseStart"><strong>Course Start Time</strong></label>
                <?php inputElement("fas fa-id-card-alt","time", "update_courseStart","Course Start","$courseStart","");?>
            </div>

            <!--Course Finish Time-->
            <div class="col">
                <label for="courseFinish"><strong>Course Finish Time</strong></label>
                <?php inputElement("fas fa-map-marker-alt","time","update_courseFinish","Course Finish","$courseFinish","");?>
            </div>
        <br>
        <?php endwhile; ?>
        <div class="col">
                <?php buttonElement("btn-create","btn btn-success btn-block", "Update","update","data-toggle='tooltip' data-placement='bottom' title='Create' ");?>
        </div>
    </form>
</div>

<?php include "../js/js.php";?>
</body>
</html>


