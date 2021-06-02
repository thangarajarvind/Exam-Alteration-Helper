<?php

session_start();
$name = $_SESSION['name'];
$day = 'Wednesday';

$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];
$p6 = $_POST['p6'];

$conn = mysqli_connect("localhost", "root", "", "timetable");
$sql = "UPDATE $name SET p1='$p1',p2='$p2',p3='$p3',p4='$p4',p5='$p5',p6='$p6' WHERE day='$day'";
mysqli_query($conn, $sql);

header('Location: ../html/TT_thur.php');

?>