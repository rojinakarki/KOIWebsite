<?php
require_once("../include/component.php");
include("../connectDB.php");
// Initializing the variables
$course_id =$course_name=$course_start_time=$course_finish_time='';
$errors = array('course_id'=>'',
    'course_name'=>'',
    'course_start_time'=>'',
    'course_finish_time'=>'');

if(isset($_POST['create-course'])) {
//    check course ID
    if (empty($_POST['course_id'])) {
        $errors['course_id'] = 'Course ID is required <br/>';
    }
    else{
        $course_id =$_POST['course_id'];
        if(!preg_match("/^[a-zA-Z]{3}[0-9]{3}:?$/",$course_id)){
            $errors['course_id']= "Course Id must have 3 letters followed by 3 numbers.";
        }
    }

//    check course name
    if (empty($_POST['course_name'])) {
        $errors['course_name'] = 'Course Name is required <br/>';
    }
    else{
        $course_name=$_POST['course_name'];
        if(!preg_match("/^[a-zA-Z\s]+$/",$course_name)){
            $errors['course_name']= "Course Name must be letters and spaces only";
        }
    }

//    check start time
    if (empty($_POST['course_start_time'])) {
        $errors['course_start_time'] = 'Course Start time is required <br/>';
    }
    else{
        $course_start_time=$_POST['course_start_time'];
    }

//    check finish time
    if (empty($_POST['course_finish_time'])) {
        $errors['course_finish_time'] = 'Course Finish time is required <br/>';
    }
    else{
        $course_finish_time =$_POST['course_finish_time'];
    }

    if(array_filter($errors)){}
    else{
        $course_id  = mysqli_real_escape_string($conn,$_POST['course_id']);
        $course_name = mysqli_real_escape_string($conn,$_POST['course_name']);
        $course_start_time= mysqli_real_escape_string($conn,$_POST['course_start_time']);
        $course_finish_time= mysqli_real_escape_string($conn,$_POST['course_finish_time']);

//      Insert course details into DB Table Course
        $sql = "INSERT INTO course(course_id,course_name,course_start_time,course_finish_time)
                 VALUES ('$course_id','$course_name','$course_start_time', '$course_finish_time')";

//      Save to db and check
        if(mysqli_query($conn,$sql)){
            // success
            header('Location:course.php');
        }else{
            // error
            echo "Query error:". mysqli_error($conn);
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course Page</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../admin/admin_navbar.php";?>
<div class="title">
    <h2><strong>Add Course</strong></h2>
    <h3>Add a New Course into System</h3>
</div>
<div class="d-flex justify-content-center" >
    <form action="create_course.php" method="POST" class="w-50">

            <!--Course ID-->
            <?php inputElement("fas fa-id-card-alt","text", "course_id","Course ID","$course_id","");?>
            <?php echo $errors['course_id'];?>

            <!--Course Name-->
            <?php inputElement("fas fa-id-card-alt","text", "course_name","Course Name","$course_name","");?>
            <?php echo $errors['course_name'];?>

            <!--Course Start Time-->
            <?php inputElement("fas fa-alarm-clock","time","course_start_time","Course Start Time","$course_start_time","");?>
            <?php echo $errors['course_start_time'];?>

            <!--Course Finish Time-->
            <?php inputElement("fas fa-alarm-clock","time","course_finish_time","Course Finish Time","$course_finish_time","");?>
            <?php echo $errors['course_finish_time'];?>
        <br>
        <div class="col">
            <?php buttonElement("btn-create","btn btn-success btn-block", "Create","create-course","data-toggle='tooltip' data-placement='bottom' title='Create' ");?>
        </div>
    </form>
</div>

<?php include "../js/js.php";?>
</body>
</html>
