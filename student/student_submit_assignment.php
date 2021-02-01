<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");
$userRetrieved =  $_SESSION['user_id'];
$courseRetrieved =  $_SESSION['course_id'];
$assignmentRetrieved = $_GET["assignmentid"];
$submission_name=$submission_file='';
$errors = array('submission_name'=>'','submission_file'=>'');

$sql = "SELECT * FROM assignment as a inner join course as c on a.course_id = c.course_id 
        where a.course_id = '$courseRetrieved' and a.assignment_id='$assignmentRetrieved'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if(isset($_POST['upload-submission'])) {
    //    check submission name
    if (empty($_POST['submission_name'])) {
        $errors['submission_name'] = 'Submission Name is required <br/>';
    }
    else{
        $submission_name=$_POST['submission_name'];
        if(!preg_match("/^[a-zA-Z0-9_\s]+$/",$submission_name)){
            $errors['submission_name']= "First name must be letters, number, spaces and underscore only";
        }
    }

    if(array_filter($errors)){

    }else{
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
        $submission_file_file = mysqli_real_escape_string($conn,$file_name);
        $submission_name = mysqli_real_escape_string($conn,$_POST['submission_name']);

    //  Insert course content into DB Table course_content
        $sql = "INSERT INTO submission(assignment_id, submission_name, submission_file,course_id,user_id)
                     VALUES ('$assignmentRetrieved', '$submission_name','$submission_file','$courseRetrieved', $userRetrieved)";

    //  Save to db and check
        if(mysqli_query($conn,$sql)){
            // success
            header('Location:student_dashboard.php');
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
            $courseName= $row['course_name'];
            $assignment_name = $row['assignment_name'];
                ?>
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

            <!-- Assignment Name -->
            <div class="col">
                <div class="pt-2">
                    <label for="courseId"><strong>Assignment Name</strong></label>
                    <div class="input-group my-auto">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-id-badge"></i></div>
                        </div>
                        <input type="text" name="course_id"  value="<?php echo $assignment_name;?>" class="form-control" disabled>
                    </div>
                </div>
            </div>
                <!--Submission Name-->
                <div class="col">
                    <div class="pt-2">
                        <label for="submission_name"><strong>Submission Name</strong></label>
                        <div class="input-group my-auto">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-info"><i class="fas fa-id-badge"></i></div>
                            </div>
                            <input type="text" name="submission_name" value="<?php echo $submission_name;?>" class="form-control">
                        </div>
                    </div>
                    <span class="error"><?php echo $errors['submission_name'];?></span>
                </div>

            <!--Submission file-->
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
                    <?php buttonElement("btn-create","btn btn-success btn-block", "Upload","upload-submission","data-toggle='tooltip' data-placement='bottom' title='Upload' ");?>
            </div>
        </form>
    </div>

<?php include "../js/js.php";?>
</body>
</html>