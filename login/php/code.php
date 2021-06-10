<?php
session_start();

$code = $_SESSION['code'];
$ucode = $_POST['code'];

if($code == $ucode){
    header('Location: ../html/reset.html');
}
else{
    echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../../js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','Invalid Code','error').then(function (result) {if (result.value) {window.location = '../html/forgetpassword.html';}})";
    echo '},100);</script>';
}
?>