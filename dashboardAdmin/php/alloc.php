<?php

session_start();

$dno = '';
if(isset($_POST['dno'])){
    $dno = $_POST['dno'];
}
else{
    $m = "Select a duty";
    $l = "../html/alloc.php";
    $t = "error";
    pop($l,$m,$t);
}

$freestaff = [];

$conn = mysqli_connect("localhost", "root", "", "se");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM roomstat where dno='$dno'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $room = $row['room'];
        $date = $row['date'];
        $hour = $row['hour'];
    }
}

$day = date('l',strtotime($date));

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
    if($c == 'Available'){
        $freestaff[] = $tname;
    }
}

$_SESSION['fstaff'] = $freestaff;
$_SESSION['dno'] = $dno;
$_SESSION['day'] = $day;
$_SESSION['hour'] = $hour;
header("Location: ../html/alloc1.php");

function pop ($l,$m,$t){
    echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../../js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
    echo '},100);</script>';
  }

?>