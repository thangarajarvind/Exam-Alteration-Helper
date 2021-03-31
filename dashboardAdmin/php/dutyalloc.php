<?php

session_start();
$room = $_POST['room'];
$id = $_SESSION['available'];

$conn = mysqli_connect("localhost", "root", "", "se");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE work SET status=1,room='$room' where id='$id'";
if ($conn->query($sql) === TRUE) {
    $m = "Duty allocated";
    $l = "../html/typography.php";
    popup ($m,$l);
}

function popup ($m,$l){
    echo "<script type='text/javascript'>alert('$m');window.location.href = '$l';window.close();</script>";
}

session_destroy();

?>