<?php

session_start();
$name = $_SESSION['name'];
$id = $_SESSION['id'];

$alt = '';
if(isset($_POST['alternate'])){
    $alt = $_POST['alternate'];
}
if(isset($_POST['day'])){
    $day = $_POST['day'];
}
else{
    $m = "Select a day";
    $l = "../html/TT_change_req.html";
    $t = "error";
    pop($l,$m,$t);
}
if(isset($_POST['p'])){
    $p = $_POST['p'];
}
else{
    $m = "Select a period";
    $l = "../html/TT_change_req.html";
    $t = "error";
    pop($l,$m,$t);
}
if(isset($_POST['reason'])){
    $reason = $_POST['reason'];
}

$conn = new mysqli ("localhost", "root", "", "timetable");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM $name WHERE day='$day'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$s = $row[$p];

if($s == 'On-Duty'){
    $conn = new mysqli ("localhost", "root", "", "se");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM roomstat WHERE id='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $date = $row['date'];
            $hour = $row['hour'];
            $dno = $row['dno'];
            $timestamp = strtotime($date);
            $dbday = date('l', $timestamp);
            if($p == $hour && $dbday == $day){
                $duty = $dno;
            }
        }
    }

    $nid = 0;
    $sql = "SELECT * FROM request ORDER BY cid DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $cid = $row["cid"];
        }
    }
    $nid = $cid+1;

    $sql = "INSERT INTO request (cid) VALUES ($nid)";
    mysqli_query($conn, $sql);

    $status = 0;

    $sql = "UPDATE request SET name='$name',day='$day',period='$p',reason='$reason',alternate='$alt',status='$status',dno='$dno' where cid='$nid'";
    if ($conn->query($sql) === TRUE) {
        $m = "Request success";
        $l = "../html/TT_change_req.html";
        $t = "success";
        pop($l,$m,$t);
    }
}
else{
    $m = "No duty allocated";
    $l = "../html/TT_change_req.html";
    $t = "error";
    pop($l,$m,$t);
}

function pop ($l,$m,$t){
    echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../../js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
    echo '},100);</script>';
}

?>