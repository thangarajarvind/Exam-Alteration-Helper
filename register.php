<?php

$name = $_POST['name'];
$email  = $_POST['email'];
$mno = $_POST['mno'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$dep = $_POST['dep'];

if (!empty($name) || !empty($email) || !empty($mno) || !empty($pass1) || !empty($pass2) || !empty($dep) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "se";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From register Where email = ? Limit 1";
  $INSERT = "INSERT Into register (name , email ,mno, pass1, pass2, dep )values(?,?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssss", $name , $email ,$mno, $pass1, $pass2, $dep);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>