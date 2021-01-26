
<?php
    $servername ="localhost";
    $username ="root";
    $password ="";
    $dbname = "koiwebsite";
    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("connection failed".$conn->connect_error);
    }


//// Check user table , display all the entry from user table
//$sqlDisplay = "Select * from user";
//if($displayRes = mysqli_query($conn, $sqlDisplay)){
//    if(mysqli_num_rows($displayRes) > 0){
//        echo "<table style='border: 1px solid black'>";
//        echo "<tr>";
//        echo "<th>userid</th>";
//        echo "<th>username</th>";
//        echo "<th>email address</th>";
//        echo "</tr>";
//        while($Inrow = mysqli_fetch_array($displayRes)){
//            echo "<tr>";
//            echo "<td>" . $Inrow['user_id'] . "</td>";
//            echo "<td>" . $Inrow['username'] . "</td>";
//            echo "<td>" . $Inrow['email_address'] . "</td>";
//            echo "</tr>";
//        }
//        echo "</table>";
//        // Free result set
//        mysqli_free_result($displayRes);
//    } else{
//        echo "No records matching your query were found.";
//    }
//} else{
//    echo "ERROR: Could not able to execute $sqlDisplay. " . mysqli_error($conn);
//}
?>