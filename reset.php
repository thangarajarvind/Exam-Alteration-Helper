<?php
session_start();
$email = $_SESSION['email'];

$p1 = $_POST['p1'];
$p2 = $_POST['p2'];

if($p1 == $p2){
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
        $p1=$p2=md5($p1);
        $sql = "UPDATE register SET pass1='$p1',pass2='$p1' where email='" . $_SESSION['email'] . "'"; 
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . $conn->error;
          }
    }
}   
    else{
    echo 'Password Mismatch';
}  