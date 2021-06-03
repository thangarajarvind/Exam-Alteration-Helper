<?php

session_start();
$dno = $_SESSION['dno'];
$rname = $_SESSION['rname'];
$cid = $_SESSION['cid'];
$day = $_SESSION['day'];
$hour = $_SESSION['hour'];

$id = '';
if(isset($_POST['id'])){
    $id = $_POST['id'];
}
else{
    $m = "Select a staff";
    $l = "../html/req1.php";
    $t = "error";
    pop($l,$m,$t);
}

$conn = mysqli_connect("localhost", "root", "", "se");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE roomstat SET id='$id' where dno='$dno'";
$conn->query($sql);

$sql = "SELECT * FROM register where id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name = $row['name'];
    }
}

$ctn = mysqli_connect("localhost", "root", "", "timetable");

$sql = "UPDATE $name SET $hour='On-Duty' where day='$day'";
$ctn->query($sql);

$sql = "UPDATE $rname SET $hour='Available' where day='$day'";
$ctn->query($sql);

$conn = mysqli_connect("localhost", "root", "", "se");

$sql = "UPDATE request SET status=1 where cid='$cid'";
$conn->query($sql);

$m = "Duty request approved";
$l = "../html/req.php";
$t = "success";
pop($l,$m,$t);

function pop ($l,$m,$t){
    echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../../js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
    echo '},100);</script>';
}

?>