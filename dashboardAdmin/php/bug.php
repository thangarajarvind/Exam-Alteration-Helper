<?php

if(isset($_POST['bid'])){
    $bid = $_POST['bid'];

    $conn = mysqli_connect("localhost", "root", "", "se");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $status = 1;

    $sql = "UPDATE bug SET status='$status' where bid='$bid'";
    if ($conn->query($sql) === TRUE) {
        $m = "Done";
        $l = "../html/dashboard.php";
        $t = "success";
        pop($l,$m,$t);
    }

}
else{
    $m = "Select a bug report";
    $l = "../html/dashboard.php";
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