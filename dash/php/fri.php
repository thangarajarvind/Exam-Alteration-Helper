<?php

session_start();
$name = $_SESSION['name'];
$day = 'Friday';

$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];
$p6 = $_POST['p6'];

$conn = mysqli_connect("localhost", "root", "", "timetable");
$sql = "UPDATE $name SET p1='$p1',p2='$p2',p3='$p3',p4='$p4',p5='$p5',p6='$p6' WHERE day='$day'";
mysqli_query($conn, $sql);

echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
echo '<script src="../../js/sweetalert2.all.min.js"></script>';
echo '<script type="text/javascript">';
echo "setTimeout(function () { Swal.fire('','Update successful','success').then(function (result) {if (result.value) {window.location = '../index.php';}})";
echo '},100);</script>';

?>