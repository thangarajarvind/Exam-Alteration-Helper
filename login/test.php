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
$hour = '';

#Change this to manual access time and day
#$time = 9;
#$day = 'Monday';

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
        
        if($c != 'On-Duty'){
            $sql = "UPDATE work SET room='-' where name='$tname'";
            $ctn->query($sql);
        }
    }
}
else{
    if($hour == 'lunch'){
        $ctn = mysqli_connect("localhost", "root", "", "se");
        $sql = "UPDATE work SET status=9";
        $ctn->query($sql);
        $sql = "UPDATE work SET room='-'";
        $ctn->query($sql);
    }
    else{
        $ctn = mysqli_connect("localhost", "root", "", "se");
        $sql = "UPDATE work SET status=99";
        $ctn->query($sql);
        $sql = "UPDATE work SET room='-'";
        $ctn->query($sql);
    }
}

$ctn = mysqli_connect("localhost", "root", "", "se");
$sql = "UPDATE room SET status=0";
$ctn->query($sql);
$sql = "UPDATE room SET id='-'";
$ctn->query($sql);

$date = date("Y-m-d");
$conn = mysqli_connect("localhost", "root", "", "se");
$sql = "SELECT * FROM room";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        $rno = $row["roomno"];
        $sql1 = "SELECT * FROM roomstat where room='$rno' and date='$date' and hour='$hour'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
        // output data of each row
            while($row1 = $result1->fetch_assoc()) {
                $id = $row1["id"];
                $ctn = mysqli_connect("localhost", "root", "", "se");
                $sql = "UPDATE room SET status=1 where roomno='$rno'";
                $ctn->query($sql);
                $sql = "UPDATE room SET id='$id' where roomno='$rno'";
                $ctn->query($sql);
                $sql = "UPDATE work SET room='$rno' where id='$id'";
                $ctn->query($sql);
            }
        }
    }
}



?>