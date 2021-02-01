<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");
// Initializing the variables
$first_name = $last_name=$password= $address = $email_address = $mobile_number = $dob = $role = $status ='';
$errors = array('first_name'=>'',
                'last_name'=>'',
                'address'=>'',
                'email_address'=>'',
                'mobile_number'=>'',
                'dob'=>'',
                'role'=>'',
                'status'=>'');
if(isset($_POST['create-user'])) {
//    check First Name
    if (empty($_POST['first_name'])) {
        $errors['first_name'] = 'First Name is required <br/>';
    }
    else{
        $first_name=$_POST['first_name'];
        if(!preg_match("/^[a-zA-Z\s]+$/",$first_name)){
            $errors['first_name']= "First name must be letters and spaces only";
        }
    }

//    check Last Name
    if (empty($_POST['last_name'])) {
        $errors['last_name'] = 'Last Name is required <br/>';
    }
    else{
        $last_name=$_POST['last_name'];
        if(!preg_match("/^[a-zA-Z\s]+$/",$last_name)){
            $errors['last_name']= "Last name must be letters and spaces only";
        }
    }

//  calculates the MD5 hash of a generated password
    $tempPass = rand_string(8);
    echo $tempPass;
    $password = md5($tempPass);

//    check Address
    if (empty($_POST['address'])) {
        $errors['address'] = 'Address is required <br/>';
    }
    else{
        $address=$_POST['address'];
    }

//    check Email Address
    if (empty($_POST['email_address'])) {
        $errors['email_address'] = 'Email address is required <br/>';
    }
    else{
        $email_address =$_POST['email_address'];
        if(!filter_var($email_address,FILTER_VALIDATE_EMAIL))
        {
            $errors['email_address']= 'Email Address must be valid.';
        }
    }

//    check Mobile Number
    if (empty($_POST['mobile_number'])) {
        $errors['mobile_number'] = 'Mobile Number is required <br/>';
    }
    else{
        $mobile_number = $_POST['mobile_number'];
        if(!preg_match("/^04(\s?[0-9]{2}\s?)([0-9]{3}\s?[0-9]{3}|[0-9]{2}\s?[0-9]{2}\s?[0-9]{2})$/",$mobile_number)){
            $errors['mobile_number']= "Mobile number must be numbers only and should start with 04";
        }
    }

//    check DOB
    if (empty($_POST['dob'])) {
        $errors['dob'] = 'Date of birth is required <br/>';
    }
    else{
        $dob= $_POST['dob'];
        if(!preg_match("/^([12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01]))$/",$dob)){
            $errors['dob']= "Invalid date format";
        }
    }
    if(array_filter($errors)){

    }else{
        $first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
        $address= mysqli_real_escape_string($conn,$_POST['address']);
        $email_address= mysqli_real_escape_string($conn,$_POST['email_address']);
        $mobile_number= mysqli_real_escape_string($conn,$_POST['mobile_number']);
        $dob=mysqli_real_escape_string($conn,$_POST['dob']);
        $role = mysqli_real_escape_string($conn,$_POST['role']);
        $status = mysqli_real_escape_string($conn,$_POST['status']);

//      Insert user details into DB Table User
        $sqlQuery = "INSERT INTO user(password,first_name,last_name,address,email_address,
                mobile_number,dob,role,status) VALUES ('$password','$first_name','$last_name',
                '$address','$email_address','$mobile_number','$dob','$role','$status')";

//      Save to DB and check
        if(mysqli_query($conn,$sqlQuery)){
            // success
            header('Location:user.php');
        }else{
            // error
            echo "Query error:". mysqli_error($conn);
        }
    }
}
// end of POST check
// function to generate random password
function rand_string( $length ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Page</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../admin/admin_navbar.php";?>
<div class="title">
    <h2><strong>Add User</strong></h2>
    <h3>Add New User into the System</h3>
</div>
<div class="d-flex justify-content-center" >
    <form action="add_user.php" method="post" class="w-50">
        <div class ="row pt-2">
            <div class="col">
            <!--First Name-->
                <?php inputElement("fas fa-id-card-alt","text", "first_name","First Name","$first_name","");?>
                <span class="error"><?php echo $errors['first_name'];?></span>
            </div>
            <div class="col">
            <!--Last Name-->
            <?php inputElement("fas fa-id-card-alt","text", "last_name","Last Name","$last_name","");?>
                <span class="error"><?php echo $errors['last_name'];?></span>
            </div>
        </div>

            <!--Address-->
            <?php inputElement("fas fa-map-marker-alt","text","address","Address","$address","");?>
            <span class="error"><?php echo $errors['address'];?></span>

            <!--Email Address-->
            <?php inputElement("fas fa-envelope-square","text","email_address","Email Address","$email_address","");?>
            <span class="error"> <?php echo $errors['email_address'];?></span>

            <!--Mobile Number-->
            <?php inputElement("fas fa-phone-square-alt","text","mobile_number","Mobile Number","$mobile_number","");?>
            <span class="error"><?php echo $errors['mobile_number'];?></span>

            <!--Date of Birth-->
            <?php inputElement("fas fa-birthday-cake","text", "dob","Date Of Birth:YY/MM/DD","$dob", "");?>
            <span class="error"><?php echo $errors['dob'];?></span>

        <div class ="row pt-2">
            <div class="col">
                <div class="input-group mb-3">
                    <label class="input-group-text bg-info" for="role">Role</label>
                    <select class="form-select" id="role" name="role">
                        <option value="admin">Admin</option>
                        <option value="lecturer">Lecturer</option>
                        <option value="student">Student</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <label class="input-group-text bg-info " for="status">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="active">Active</option>
                        <option value="passive">Passive</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col">
            <?php buttonElement("btn-create","btn btn-success btn-block", "Create","create-user","data-toggle='tooltip' data-placement='bottom' title='Create' ");?>
        </div>
    </form>
</div>
<?php include "../js/js.php";?>
</body>
</html>
