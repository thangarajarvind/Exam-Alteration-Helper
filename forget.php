<?php
$email = $_POST['email'];
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
    $SELECT = "SELECT email From register Where email = ?"
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($user);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    $stmt->close();

    if ($rnum==1) {
        $stmt = $conn->prepare($PASSWORD);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $CODE = "SELECT code From register Where email = ?"
        $stmt = $conn->prepare($CODE);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $cnum = $stmt->num_rows;
        $stmt->close();
        $stmt = $conn->prepare($CODE);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($code);
        $stmt->store_result();
        $stmt->close();
        echo $code;
    }




	echo $sql;
	}