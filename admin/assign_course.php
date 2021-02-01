<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");
$userRetrieved = $_GET["userid"];

$errors = array('errorMessage'=>'');

$sql1 ="SELECT * FROM course";
$result1 = mysqli_query($conn, $sql1);

$sql2 ="SELECT * FROM user where user_id = '$userRetrieved'";
$result2 = mysqli_query($conn, $sql2);

if(isset($_POST['update'])) {
    
    $assign_course_course_id=$_POST['assign_course'];
    $sql4="SELECT * from enrollment WHERE user_id =$userRetrieved AND course_id = '$assign_course_courseid'";
    $result4=mysqli_query($conn, $sql4);
    $count = mysqli_num_rows($result4);
    if($count > 0) {

        $errors['errorMessage']="This user is already enrolled in this course";

    }
    else {
        $assign_course_course_id = $_POST['assign_course'];
        $sql3 = "INSERT INTO enrollment (user_id, course_id)
        VALUES ('$userRetrieved', '$assign_course_course_id')";

        $sql3 = "INSERT INTO enrollment (user_id, course_id)
        VALUES ('$userRetrieved', '$assign_course_course_id');";

        if (mysqli_query($conn, $sql3)) {
            // success
            header('Location:user.php');
        } else {
            // error
            echo "Query error:" . mysqli_error($conn);
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
    <title>Assign course</title>
    
    <?php include "../css/css.php";?>
</head>
<body>
   <?php include "../admin/admin_navbar.php";?>
    <div class=title>
        <h2><strong>Assign Course</strong></h2>
        <h3>Assign course to users</h3>
    </div>
    <div class="d-flex justify-content-center" >
        <form action="" method="post" class="w-50">
        <?php while($row2 = mysqli_fetch_array($result2)) :?>
            <!--User Id-->
            <div class="col">
                <label for="userid"><strong>KOI ID</strong></label>
                <div class="pt-2">
                    <div class="input-group my-auto">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-id-badge"></i></div>
                        </div>
                        <input type="text" name="user_id"  value="<?php echo $userRetrieved;?>" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <!--User Name-->
            <div class="col">
                <label for="username"><strong>User Name</strong></label>
                <div class="pt-2">
                    <div class="input-group my-auto">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-id-card-alt"></i></div>
                        </div>
                        <input type="text" name="user_name"  value="<?php echo $row2['first_name']; ?> <?php echo $row2['last_name'];?>"
                               class="form-control" disabled>
                    </div>
                </div>
            </div>
            <!--User Role-->
            <div class="col">
                <label for="userrole"><strong>User Role</strong></label>
                <div class="pt-2">
                    <div class="input-group my-auto">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-info"><i class="fas fa-id-card-alt"></i></div>
                        </div>
                        <input type="text" name="role"  value="<?php echo $row2['role']; ?>"  class="form-control" disabled>
                    </div>
                </div>
            </div>
        <br>
        <?php endwhile; ?>
            <div class="col">
                <div class="input-group mb-3">
                    <label class="input-group-text bg-info" for="assign_course">Select Course</label>
                    <select class="form-select" id="assign_course" name="assign_course">
                        <?php while($row1= mysqli_fetch_array($result1)) :?>
                            <option value="<?php  echo $row1['course_id'];?>"><?php echo $row1['course_id'];?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <?php buttonElement("btn-create","btn btn-success btn-block", "Update","update","data-toggle='tooltip' data-placement='bottom' title='Create' ");?>
            </div>
            <div class="col">
                <span class="error"><label for ="errormessage"><?php echo $errors['errorMessage']; ?></label></span>
            </div>
        </form>
    </div>
</body>
</html>
