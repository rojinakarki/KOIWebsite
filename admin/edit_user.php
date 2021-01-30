<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");
?>
<?php
$userRetrieved = $_GET["userid"];
$sql = "SELECT * FROM user WHERE user_id = $userRetrieved ";
$result=mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if(isset($_POST['update'])) {
    $update_first_name=$_POST['update_first_name'];
    $update_last_name=$_POST['update_last_name'];
    $update_address=$_POST['update_address'];
    $update_email_address=$_POST['update_email_address'];
    $update_dob=$_POST['update_dob'];
    $update_mobile_number=$_POST['update_mobile_number'];
    $update_role=$_POST['update_role'];
    $update_status=$_POST['update_status'];

    $sql2 ="UPDATE user 
    SET first_name ='$update_first_name', last_name='$update_last_name',
    address='$update_address',email_address='$update_email_address',
    dob='$update_dob',mobile_number='$update_mobile_number',
    role='$update_role',status='$update_status' WHERE user_id = $userRetrieved";

    if(mysqli_query($conn,$sql2)){
        // success
        header('Location:user.php');
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
    <title>Edit User</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../admin/admin_navbar.php";?>
    <div class=title>
        <h2> User Details</h2>
        <h3> Edit Detail for All Available Users </h3>
    </div>
    <div class="d-flex justify-content-center" >
        <form action="" method="POST" class="w-50">
        <?php while($row = mysqli_fetch_array($result)) :
            $fname= $row['first_name'];
            $lname= $row['last_name'];
            $address= $row['address'];
            $email_address= $row['email_address'];
            $mobile_number= $row['mobile_number'];
            $dob= $row['dob'];
            $role= $row['role'];
            $status= $row['status'];
            ?>
        <!--User ID-->
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

            <!--First Name-->
            <div class="col">
                <label for="FirstName"><strong>First Name</strong></label>
                <?php inputElement("fas fa-id-card-alt","text", "update_first_name","First Name","$fname","");?>
            </div>

            <!--Last Name-->
            <div class="col">
                <label for="lastName"><strong>Last Name</strong></label>
                <?php inputElement("fas fa-id-card-alt","text", "update_last_name","Last Name","$lname","");?>
            </div>

            <!--Address-->
            <div class="col">
                <label for="address"><strong>Address</strong></label>
                <?php inputElement("fas fa-map-marker-alt","text","update_address","Address","$address","");?>
            </div>

            <!--Email Address-->
            <div class="col">
                <label for="email"><strong>Email Address</strong></label>
                <?php inputElement("fas fa-envelope-square","text","update_email_address","Email Address","$email_address","");?>
            </div>

            <!--Mobile Number-->
            <div class="col">
                <label for="mobile"><strong>Mobile Number</strong></label>
                <?php inputElement("fas fa-phone-square-alt","text","update_mobile_number","Mobile Number","0$mobile_number","");?>
            </div>

            <!--Date of Birth-->
            <div class="col">
                <label for="dob"><strong>Date Of Birth</strong></label>
                <?php inputElement("fas fa-birthday-cake","text", "update_dob","Date Of Birth:YY/MM/DD","$dob", "");?>
            </div>
            <br>
            <div class="col">
                <div class="input-group mb-3">
                    <label class="input-group-text bg-info" for="role">Role</label>
                    <select class="form-select" id="update_role" name="update_role">
                        <option value="<?php echo $row['role'];?>"><?php echo $row['role'];?></option>
                        <option value="admin">Admin</option>
                        <option value="lecturer">Lecturer</option>
                        <option value="student">Student</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <label class="input-group-text bg-info " for="status">Status</label>
                    <select class="form-select" id="update_status" name="update_status">
                        <option value="<?php echo $row['status'];?>"><?php echo $row['status'];?></option>
                        <option value="active">Active</option>
                        <option value="passive">Passive</option>
                    </select>
                </div>
            </div>
            <?php endwhile; ?>
            <div class="col">
                <?php buttonElement("btn-create","btn btn-success btn-block", "Update","update","data-toggle='tooltip' data-placement='bottom' title='Create' ");?>
            </div>
        </form>
    </div>
<?php include "../js/js.php";?>
</body>
</html>
