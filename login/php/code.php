<?php
session_start();

$code = $_SESSION['code'];
$ucode = $_POST['code'];

if($code == $ucode){
    header('Location: ../html/reset.html');
}
else{
    echo '<script language="javascript">';
    echo 'alert("Invalid Code");';
    echo 'window.location.href = "../html/entercode.html";';
    echo 'window.close();';
    echo '</script>';
}
?>