<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");

$courseRetrieved = $_GET["courseid"];
$_SESSION['course_id']= $courseRetrieved;
$sql="SELECT * FROM assignment as a inner join course as c on a.course_id = c.course_id where a.course_id = '$courseRetrieved'";
$result = mysqli_query($conn,$sql);
$assignment = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../student/student_navbar.php"?>
<div class="container-fluid pt-2">
    <div class="row">
            <?php foreach($assignment as $assign){?>
                <div class="col-sm d-flex">
                    <div class="card flex-fill" >
                        <div class="card-header"> <?php echo htmlspecialchars($assign['course_id']);?> </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Assignment Name: <strong><?php echo htmlspecialchars($assign['assignment_name']);?></strong></a></li>
                                <li class="list-group-item"><a href="../uploads/<?php echo $assign['assignment_url'];?>"><?php echo htmlspecialchars($assign['assignment_url']);?></a></li>
                                <li class="list-group-item"><a href="student_submit_assignment.php?assignmentid=<?php echo $assign['assignment_id'] ?>"><i class="fas fa-edit"> Submit Assignment </i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php }?>
    </div>
</div>



<?php include "../js/js.php";?>
</body>
</html>