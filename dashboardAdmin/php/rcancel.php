<?php

$cid = $_POST['cid'];

$conn = new mysqli ("localhost", "root", "", "se");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "UPDATE request SET status=2 WHERE cid='$cid'";
if ($conn->query($sql) === TRUE) {
    $m = "Request rejected";
    $l = "../html/req.php";
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