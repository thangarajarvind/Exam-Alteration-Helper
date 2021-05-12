<?php

session_start();

$date = $_POST['date'];
$hour = $_POST['hour'];

$d = substr($date,3,2);
$m = substr($date,0,2);
$y = substr($date,6,4);
$h = '-';

$date = $y.$h.$m.$h.$d;

$rooms = [];
$booked = [];
$free = [];
$i = 0;

$conn = mysqli_connect("localhost", "root", "", "se");

$sql = "SELECT * FROM room";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        $rooms[] = $row["roomno"];
    }
}

$i = 0;
$sql = "SELECT * FROM roomstat where date='$date' and hour='$hour'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        $booked[] = $row["room"];
    }
    $free = array_diff($rooms, $booked);
    $_SESSION['free'] = $free;
    $_SESSION['date'] = $date;
    $_SESSION['hour'] = $hour;
    header("Location: ../html/nduty1.php");
}
else{
    $_SESSION['free'] = $rooms;
    $_SESSION['date'] = $date;
    $_SESSION['hour'] = $hour;
    header("Location: ../html/nduty1.php");
}

?>