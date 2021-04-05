<?php
session_start();
$id = $_POST['id'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "timetable";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}

else{
    $SELECT = "SELECT id From search Where id = ?";
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if($rnum == 1){
        $conn = new mysqli ("localhost", "root", "", "se");
        $result = mysqli_query($conn,"SELECT name FROM register where id='$id'");
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $_SESSION['name'] = $name;
        header('Location: ../html/timetable.php');
    }
    else{
        $l = "../html/searchtimetable.html";
        $m = "Timetable does not exist";
        $t = "error";
        pop($l,$m,$t);
    }
}

function pop ($l,$m,$t){
    echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../../js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
    echo '},100);</script>';
}