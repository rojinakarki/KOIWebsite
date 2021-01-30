<?php
require_once("../include/component.php");
include("../connectDB.php");

if(isset($_POST['search'])){
    $valueToSearch = $_POST['valueToSearch'];
//  Get records based on name, role and email from user
    $sql = "SELECT * FROM `user` WHERE CONCAT(`first_name`, `last_name`, `email_address`) LIKE '%".$valueToSearch."%'";
    $result=mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
}
// Get all records from user
else{
    $sql="SELECT * FROM user";
    $result=mysqli_query($conn, $sql);
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <?php include "../css/css.php";?>

</head>
<body>
<?php include "../admin/admin_navbar.php";?>
<div class="container" >
    <form action="" method="POST">
        <br>
        <input type="text" name="valueToSearch" placeholder="Search User" >
        <input type="submit" name="search" value="Filter"><br><br>
        <!--Bootstrap Table-->
        <div class="d-flex table-data">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>KOI ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Email Address</th>
                        <th>Mobile Number</th>
                        <th>DOB</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>EDIT</th>
                        <th>ASSIGN</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_array($result)) :?>
                    <tr>
                        <td><?php echo $row['user_id'];?></td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['email_address'];?></td>
                        <td><?php echo $row['mobile_number'];?></td>
                        <td><?php echo $row['dob'];?></td>
                        <td><?php echo $row['role'];?></td>
                        <td><?php echo $row['status'];?></td>
                        <td><a href="edit_user.php?userid=<?php echo $row['user_id'] ?>"><i class="fas fa-edit"></i></a>
                        <?php  if($row['role'] =='lecturer'or $row['role'] =='student'){
                            echo "<td><a href=\"assign_course.php?userid=<?php echo $row['user_id'] ?>\"> <i class=\"fas fa-tasks\"></i></a>";
                        }?>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </form>
</div>

<?php include "../js/js.php";?>
</body>
</html>