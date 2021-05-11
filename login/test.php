<?php

$conn = mysqli_connect("localhost", "root", "", "timetable");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
date_default_timezone_set("Asia/Calcutta");
$time = date("H:i:sa");
$day = date("l");

$time = substr($time,0,2);
$time = (int)$time;

$valid = 0;

if($time == 9){
    $hour = 'p1';
    $valid = $valid+1;
}
if($time == 10){
    $hour = 'p2';
    $valid = $valid+1;
}
if($time == 11){
    $hour = 'p3';
    $valid = $valid+1;
}
if($time == 12){
    $hour = 'p4';
    $valid = $valid+1;
}
if($time == 14){
    $hour = 'p5';
    $valid = $valid+1;
}
if($time == 15){
    $hour = 'p6';
    $valid = $valid+1;
}
if($time == 13){
    $hour = 'lunch';
}

if($valid == 1){
    $dbname = 'timetable';
    $connec = mysqli_connect("localhost", "root", "");
    $sql = "SHOW TABLES FROM $dbname";
    $result1 = mysqli_query($connec,$sql);

    if (!$result1) {
        echo "DB Error, could not list tables\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }

    while ($row1 = mysqli_fetch_row($result1)) {
        $tname = $row1[0];
        $sql = "SELECT * FROM $tname where day='$day'";
        $conn = mysqli_connect("localhost", "root", "", "timetable");
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $c = $row["$hour"];
            }
        }
        echo $c;
        if($c == 'Available'){
            $status = 0;
        }
        if($c == 'On-Duty'){
            $status = 1;
        }
        if($c == 'In-Class'){
            $status = 2;
        }
        $ctn = mysqli_connect("localhost", "root", "", "se");
        $sql = "UPDATE work SET status=$status where name='$tname'";
        $ctn->query($sql);
    }
}

?>