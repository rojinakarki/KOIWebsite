<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");

$userRetrieved =  $_SESSION['user_id']; 
$courseRetrieved = $_GET['courseid'];
//Select c.course_id,c.course_name,c.course_start_time,c.course_finish_time,u.user_id from course as c
//        inner join enrollment as e on e.course_id = c.course_id
//        inner join user as u on e.user_id = u.user_id where e.user_id = '$user_id' ";
$sql= "SELECT * from course as c inner join enrollment as e on e.course_id = c.course_id inner join user as u on e.user_id = u.user_id 
        where u.role = 'student' AND e.course_id = '$courseRetrieved'";
$result=mysqli_query($conn, $sql);

if(isset($_POST['submit_grade'])){
     while($row = mysqli_fetch_array($result2)) :
        $tempuser = $row['user_id'];
        $tempassignment = $_POST['assignment_name'];
        $gradeEntered= $_POST['grade'];

        $sql3 = "INSERT INTO submission(grade_for_submission)
        VALUES ('$gradeEntered') WHERE user_id = $tempuser AND course_id = '$courseRetrieved' AND assignment_name='$tempassignment'";
        $result3=mysqli_query($conn, $sql3);
 endwhile;   
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../lecturer/lecturer_navbar.php";?>
<div class="container">
<div class=title>        
        <h3>Provide grade for course <strong><?php echo $courseRetrieved ?></strong></h3>
    </div>

<form action=""  method="POST">

<!--Bootstrap Table-->
<div class="d-flex table-data">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>KOI ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Assignment </th>
                <th>Grade</th>
            </tr>
         </thead>
        <tbody>
       
        <?php while($row = mysqli_fetch_array($result1)) :?>
        
            <tr>
                <td><?php echo $row['user_id'];?></td>
                <td><?php echo $row['first_name'];?></td>
                <td><?php echo $row['last_name'];?></td>
                                
                <td>
                <select class="form-select" id="assignment_name" name="assignment_name">
                <?php 
                $sql3= "SELECT * FROM assignment WHERE course_id = '$courseRetrieved'";
                $result3=mysqli_query($conn, $sql3); ?>
                <?php while($row3 = mysqli_fetch_array($result3)) :?>                        
                <option value="<?php  echo $row3['assignment_name'];?>"><?php echo $row3['assignment_name'];?></option>
                <?php endwhile; ?>                        
                </select>
                </td>    
                <td><input type="number" id ="grade" name="grade"></td>     
                <td><input type = "submit" name="submit_grade" id="submit_grade" value="Grade"></td>
                <?php endwhile;  ?> 
            </tr>             
        </tbody>
    </table>    
</div>
</form>
</div>

<?php include "../js/js.php";?>
</body>
</html>