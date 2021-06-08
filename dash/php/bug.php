<?php

session_start();
$id = $_SESSION['id'];

$sub = $_POST['sub'];
$des = $_POST['des'];

$conn = new mysqli ("localhost", "root", "", "se");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$nid = 0;
$sql = "SELECT * FROM bug ORDER BY bid DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {    
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $bid = $row["bid"];
    }
}
$nid = $bid+1;

$sql = "INSERT INTO bug (bid) VALUES ($nid)";
mysqli_query($conn, $sql);

$status = 0;

$sql = "UPDATE bug SET id='$id',sub='$sub',des='$des',status='$status' where bid='$nid'";
if ($conn->query($sql) === TRUE) {
    $m = "Bug report submitted";
    $l = "../html/bug.php";
    $t = "success";
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