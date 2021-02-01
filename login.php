<?php
session_start();
include("connectDB.php");
// Initializing the variables
$user_id=$password='';
$errors = array('user_id'=>'', 'password'=>'');
if(isset($_POST['submit'])) {
    //    check user_id
    if (empty($_POST['user_id'])) {
        $errors['user_id'] = 'UserID is required <br/>';
    } else {
        $user_id = $_POST['user_id'];
        if (!preg_match("/^[0-9]{4,8}+$/", $user_id)) {
            $errors['user_id'] = "UserID must be numbers only with min length of 4 and max length of 8";
        }
    }

    //    check password
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required <br/>';
    } else {
        $password = $_POST['password'];
        //md5($_POST['password']);
    }
//    check login_log
    $time = time()-30;
    $ip_address = getIpAddr();
    $check_login= mysqli_fetch_assoc(mysqli_query($conn,"Select count(*) as total_count from login_log 
    where try_time>'$time' and ip_address = '$ip_address'"));
    $total_count = $check_login['total_count'];
    if($total_count==3){
        $_SESSION['errorMessage'] ="Too many failed login attempts. <br> Please login after 30 secs.";
    }
    else{
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        //Get user details based on user input
        $sqlQuery = "SELECT * FROM USER WHERE USER_ID='$user_id' AND PASSWORD='$password'";
        $result = mysqli_query($conn, $sqlQuery);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            while ($row = mysqli_fetch_array($result)) {
                $_SESSION['user_id'] = $row['user_id'];
                if ($row['status'] == 'passive') {
                    $_SESSION['errorMessage'] = "Your account has been locked. <br> Please contact admin";
                    header("location:login.php");
                    exit();
                }
                switch ($row['role']) {
                    case 'admin':
                        header("location:admin/admin_dashboard.php");
                        exit();
                    case 'lecturer':
                        header("location:lecturer/lecturer_dashboard.php");
                        exit();
                    case 'student':
                        header("location:student/student_dashboard.php");
                        exit();
                }
            }
        }
        else {
            $total_count++;
            $rem_attempt=3-$total_count;
            if($rem_attempt==0){
                $_SESSION['errorMessage'] ="Too many failed login attempts. <br> Please login after 30 secs.";
            }else{
                $_SESSION['errorMessage'] = "Invalid Credentials. Try Again! </br> Remaining Attempt: $rem_attempt ";
            }
            $try_time= time();
            $sql="insert into login_log(ip_address,try_time) values('$ip_address','$try_time')";
            mysqli_query($conn,$sql);
        }
    }
}

function getIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ipAddr = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ipAddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ipAddr = $_SERVER['REMOTE_ADDR'];
    }
    return $ipAddr;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/style1.css">
    <?php include "css/css.php";?>
</head>
<body>
<div class="content-container">
    <img class="rounded site-logo-form d-block" alt="KOI Logo" src="resources/site-logo.png">
    <form action="" class="login-form mx-auto" method="post">
            <legend style="text-align: center"><i class="fas fa-school">  KOI SIGN IN</i></legend>

            <?php if(isset($_SESSION["errorMessage"])) {?>
            <span class="error"> <?php echo $_SESSION['errorMessage'];?> </span>
            <?php unset($_SESSION["errorMessage"]);} ?>

            <br>
            <label for="user_id" class="form-label"><b>UserID</b></label>
            <input type="text" class="form-control" placeholder="Enter UserID" value="<?php echo $user_id?>" name="user_id">
            <span class="error"> <?php echo $errors['user_id'];?> </span>
            <br>
            <label for="password" class="form-label"><b>Password</b></label>
            <input type="password" class="form-control" placeholder="Enter Password" name="password">
            <span class="error"> <?php echo $errors['password'];?></span>
            <br>
            <button type="submit" class="form-control btn btn-success" name="submit">Login</button>
            <br>
            <span class="password">Forgot <a href="#">password?</a></span>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>