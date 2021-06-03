<?php

session_start();

$cid = '';
if(isset($_POST['cid'])){
    $cid = $_POST['cid'];
}
else{
    $m = "Select a request";
    $l = "../html/req.php";
    $t = "error";
    pop($l,$m,$t);
}

$freestaff = [];

$conn = mysqli_connect("localhost", "root", "", "se");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM request where cid='$cid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $day = $row['day'];
        $hour = $row['period'];
        $dno = $row['dno'];
        $rname = $row['name'];
    }
}

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
$_SESSION['rname'] = $rname;
$_SESSION['cid'] = $cid;
$_SESSION['hour'] = $hour;
$_SESSION['day'] = $day;


header("Location: ../html/req1.php");

function pop ($l,$m,$t){
    echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../../js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
    echo '},100);</script>';
  }

?>