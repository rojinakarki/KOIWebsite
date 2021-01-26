<?php
session_start();
include("connectDB.php");
if(isset($_POST['submit'])){
    $username = $_POST['username'];
//        addslashes($_POST['username']);
    $password = $_POST['password'];
//        md5(addslashes($_POST['password']));
    $query = "select * from user where username='$username' AND password='$password'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);

    if($count == 1)
    {
        while ($row = mysqli_fetch_array($result)){
        if ($row['role'] == "admin"){
            $_SESSION['role'] = $row['role'];
            $_SESSION['user'] = $username;
            echo "<script>alert('You have logged in successfully!!');</script>";
            echo "<script>window.location='admin_dashboard.include';</script>";

        }

        elseif ($row['role'] == "lecturer"){
            $_SESSION['role'] = $row['role'];
            $_SESSION['user'] = $username;
            echo "<script>window.location='lecturer_dashboard.include';</script>";

        }
        else{
            $_SESSION['user'] =$username;
            $_SESSION['role'] =$row['role'];
            echo "<script>window.location='student_dashboard.include';</script>";
        }
    }
    } else
    {
        echo "<script>alert('Cannot Login !!');</script>";
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
    <title>Login</title>
    <link rel="stylesheet" href="css/style1.css">
    <?php include "css/css.php";?>
</head>
<body>
<div class="content-container">
    <img class="rounded site-logo-form d-block" alt="KOI Logo" src="resources/site-logo.png">
    <form action="" class="login-form mx-auto" method="post">
            <legend style="text-align: center"><i class="fas fa-school">  KOI SIGN IN</i></legend>
            <label for="user_id" class="form-label"><b>UserID</b></label>
            <input type="text" class="form-control" placeholder="Enter UserID" name="user_id">
            <br>
            <label for="password" class="form-label"><b>Password</b></label>
            <input type="password" class="form-control" placeholder="Enter Password" name="password">
            <br>
            <button type="submit" class="form-control btn btn-success" name="submit">Login</button>
            <label><input type="checkbox"  checked="checked" name="remember"> Remember me</label>
            <br>
            <span class="password">Forgot <a href="#">password?</a></span>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>