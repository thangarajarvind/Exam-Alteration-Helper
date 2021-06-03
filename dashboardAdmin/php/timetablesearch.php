<?php
session_start();
$id = $_POST['id'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "timetable";
echo $id;
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}

else{
        $conn = new mysqli ("localhost", "root", "", "se");
        $result = mysqli_query($conn,"SELECT name FROM register where id='$id'");
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $_SESSION['name'] = $name;
        header('Location: ../html/timetable.php');
}

function pop ($l,$m,$t){
    echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../../js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
    echo '},100);</script>';
}