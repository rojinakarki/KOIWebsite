<?php
//require_once ("connectDB.php");
//
//// Connection variable set
//$conn = CreateConn();
//// Initializing the variables
//$first_name = $last_name = $address = $email_address = $phone_number = $dob = $role = $status ='';
//$errors = array('first_name'=>'',
//                'last_name'=>'',
//                'address'=>'',
//                'email_address'=>'',
//                'phone_number'=>'',
//                'dob'=>'',
//                'role'=>'Choose...',
//                'status'=>'Choose...');
//
//if(isset($_POST['create'])){
//    if(empty($_POST['first_name'])){
//        $errors['first_name'] = 'First Name is required <br/>';
//
//    }
//    if(empty($_POST['last_name'])){
//        $errors['last_name'] = 'First Name is required <br/>';
//    }
//    if(empty($_POST['address'])){
//        $errors['address'] = 'Address is required <br/>';
//    }
//    if(empty($_POST['email_address'])){
//        $errors['email_address'] = 'Email address is required <br/>';
//    }
//    if(empty($_POST['phone_number'])){
//        $errors['phone_number'] = 'Phone Number is required <br/>';
//    }
//    if(empty($_POST['dob'])){
//        $errors['dob'] = 'Date of birth is required <br/>';
//    }
//
//    insertUser();
//}
//
//
//
//function insertUser()
//{
////    $first_name = ("first_name");
////    $last_name = textboxValue("last_name");
////    $email_address = textboxValue("email_address");
////    $phone_number = textboxValue("phone_number");
////    $dob = textboxValue("dob");
////    if($first_name && $last_name && $email_address && $phone_number && $dob) {
////    $sqlInsert = "INSERT INTO  (firstname, lastname, email) VALUES ('Rojina','Karki', 'rojinaakarkii@gmail.com')";
////    if(mysqli_query($conn, $sqlInsert)){
////        echo "Values inserted successfully. <br>";
////    } else{
////        echo "ERROR: Could not able to execute $sqlInsert. " . mysqli_error($conn);}
////    }
////}
//
////function textboxValue($value){
////    $textbox = mysqli_real_escape_string($GLOBALS['$conn'],trim($_POST[$value]));
////    if(empty($textbox)){
////        return false;
////    }else{
////        return $textbox;
////    }
//}