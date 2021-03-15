<?php
session_start();
$email = $_POST['email'];
$_SESSION['email'] = $email;
$code="";
if (empty($email))
{
    die('Email is missing');
}

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "se";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
    $SELECT = "SELECT email From register Where email = ?";
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    
    if ($rnum==1) {
        $stmt->close();
        $result = mysqli_query($conn,"SELECT * FROM register where email='" . $_POST['email'] . "'");
        $row = mysqli_fetch_assoc($result);
        $code = $row['code'];
        $_SESSION['code'] = $code;
        header('Location: entercode.html');
    }
    else{
        echo 'Email ID does not exist';
    }
}
?>