<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");
$userRetrieved =  $_SESSION['user_id']; 
$courseRetrieved = $_GET["courseid"];
$sql = "SELECT * FROM course WHERE course_id = '$courseRetrieved'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if(isset($_POST['upload-course-content'])) {

    $assignment_name= $_POST['assignment_name'];
//  check course content
    $submission_file = $_FILES['submission_file'];
    $file_name = $_FILES['submission_file']['name'];
    $file_type = $_FILES['submission_file']['type'];
    $file_size = $_FILES['submission_file']['size'];
    $file_tem_loc = $_FILES['submission_file']['tmp_name'];
    $file_store = "../uploads/".$file_name;

    //  Move file from temp to file storage
    move_uploaded_file($file_tem_loc,$file_store);

    $course_id  = mysqli_real_escape_string($conn,$courseRetrieved);
    $assignment_file = mysqli_real_escape_string($conn,$file_name);

//  Insert course content into DB Table course_content
    $sql = "INSERT INTO submission(assignment_name, submission_file,course_id,user_id)
                 VALUES ('$assignment_name', '$submission_file','$courseRetrieved', $userRetrieved)";

//  Save to db and check
    if(mysqli_query($conn,$sql)){
        // success
        header('Location:student_dashboard.php');
    }else{
        // error
        echo "Query error:". mysqli_error($conn);
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
    <title>Course Content</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../student/student_navbar.php";?>
    <div class="title">
        <h2><strong>Submit Assignment</strong></h2>
        <h3>Submit Assignment Here</h3>
    </div>
    <div class="d-flex justify-content-center" >
        <form action="" method="POST" class="w-50" enctype="multipart/form-data">
            <?php while($row = mysqli_fetch_array($result)) :
            $courseName= $row['course_name']; ?>
            <!--Course ID-->
            <div class="col">
                <div class="pt-2">
                    <label for="courseId"><strong>Course ID</strong></label>
                    <div class="input-group my-auto">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-id-badge"></i></div>
                        </div>
                        <input type="text" name="course_id"  value="<?php echo $courseRetrieved;?>" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <!--Course Name-->
            <div class="col">
                <div class="pt-2">
                    <label for="courseName"><strong>Course Name</strong></label>
                    <div class="input-group my-auto">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-id-badge"></i></div>
                        </div>
                        <input type="text" name="course_name"  value="<?php echo $courseName;?>" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <!-- Assignment Name -->            
            
           <div class="col">
                <div class="pt-2">
                    <label for="courseContent"><strong>Assignment Name</strong></label><br>
                    <select class="form-select" id="assignment_name" name="assignment_name">
                    <?php 
                    $sql3= "SELECT * FROM assignment WHERE course_id = '$courseRetrieved'";
                    $result3=mysqli_query($conn, $sql3); ?>
                    <?php while($row3 = mysqli_fetch_array($result3)) :?>                        
                        <option value="<?php  echo $row3['assignment_name'];?>"><?php echo $row3['assignment_name'];?></option>
                    <?php endwhile; ?>                        
                    </select>
                </div>
            </div>
            <!--Course Content-->
            <div class="col">
                <div class="pt-2">
                    <label for="courseContent"><strong>Upload Assignment</strong></label>
                    <div class="input-group my-auto">
                        <input type="file" name="submission_file" value="" class="form-control">
                    </div>
                </div>
            </div>

            <br>
            <?php endwhile; ?>
            <div class="col">
                    <?php buttonElement("btn-create","btn btn-success btn-block", "Upload","upload-course-content","data-toggle='tooltip' data-placement='bottom' title='Upload' ");?>
            </div>
        </form>
    </div>

<?php include "../js/js.php";?>
</body>
</html>