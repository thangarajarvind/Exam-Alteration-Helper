<?php
$date = '2021-05-11';
$test = date('l', strtotime($date));
echo $test;
echo date("Y-m-d");

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
        $sql1 = "SELECT * FROM roomstat where room='$rno' and date='$date' and hour='p2'";
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
                echo $id;
            }
        }
    }
}

$id = 'na562';
$sql = "UPDATE work SET room='$rno' where id='$id'";
$ctn->query($sql);
?>