
<?php
    $servername ="localhost";
    $username ="root";
    $password ="";

//   Create connection
//   Using MYSQLi

//  $conn = mysqli_connect($servername,$username,$password);
//  if(!$conn){
//      die("connection failed".mysqli_connect_erno());
//  }

//    $conn = new mysqli($servername,$username,$password);
//    if($conn->connect_error){
//        die("connection failed".$conn->connect_error);
//    }
//    echo "Connected successfully";

//    Exercise 2-> Create Database
//    $sqlDB = "CREATE DATABASE myDB";
//    if(mysqli_query($conn, $sqlDB)){
//        echo "Database created successfully.";
//    } else{
//        echo "ERROR: Could not able to execute $sqlDB. " . mysqli_error($conn);
//    }
//    mysqli_close($conn);

//    Exercise 2-> Create Table

    $dbname = "myDB";
    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("connection failed".$conn->connect_error);
    }

//    $sql="CREATE TABLE MyGuests (
//        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//        firstname VARCHAR(30) NOT NULL,
//        lastname VARCHAR(30) NOT NULL,
//        email VARCHAR(50),
//        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
//
//    if(mysqli_query($conn, $sql)){
//        echo "Table created successfully.";
//    } else{
//        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//    }


//    Exercise 3 -> Insert values and display
//    $sqlInsert = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Rojina','Karki', 'rojinaakarkii@gmail.com')";
//    if(mysqli_query($conn, $sqlInsert)){
//        echo "Values inserted successfully. <br>";
//    } else{
//        echo "ERROR: Could not able to execute $sqlInsert. " . mysqli_error($conn);}

$firstname = $_POST["first"];

$lastname = $_POST["last"];
$email = $_POST["email"];

    $sqlInsert = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('$firstname','$lastname','$email')";
    
    if(mysqli_query($conn, $sqlInsert)){
        echo "Values inserted successfully. <br>";
    } else{
        echo "ERROR: Could not able to execute $sqlInsert. " . mysqli_error($conn);}


$sqlDisplay = "Select * from MyGuests";
    if($displayResult = mysqli_query($conn, $sqlDisplay)){
        if(mysqli_num_rows($displayResult) > 0){
            echo "<table style='border: 1px solid black'>";
                echo "<tr>";
                    echo "<th>id</th>";
                    echo "<th>firstname</th>";
                    echo "<th>lastname</th>";
                    echo "<th>email</th>";
                echo "</tr>";
        while($Inrow = mysqli_fetch_array($displayResult)){
            echo "<tr>";
                echo "<td>" . $Inrow['id'] . "</td>";
                echo "<td>" . $Inrow['firstname'] . "</td>";
                echo "<td>" . $Inrow['lastname'] . "</td>";
                echo "<td>" . $Inrow['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($displayResult);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sqlDisplay. " . mysqli_error($conn);
}
    mysqli_close($conn);

?>