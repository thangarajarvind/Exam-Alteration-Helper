<?php

session_start();
if($_POST['room'] != NULL){
    $room = $_POST['room'];
    $id = $_SESSION['available'];

    $conn = mysqli_connect("localhost", "root", "", "se");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE work SET status=1,room='$room' where id='$id'";
    if ($conn->query($sql) === TRUE) {
        $m = "Duty allocated";
        $l = "../html/allocation.php";
        $t = "success";
        popup ($l,$m,$t);
    }
}
else{
    $l = "../html/dutyalloc.html";
    $m = "Enter a valid room number";
    $t = "error";
    popup($l,$m,$t);
}

function popup ($l,$m,$t){
    echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../../js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
    echo '},100);</script>';
}

session_destroy();

?>