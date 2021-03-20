<?php
session_start();
$code = $_SESSION['code'];
$ucode = $_POST['code'];

if($code == $ucode){
    header('Location: ../html/reset.html');
}
else{
    echo 'Invalid Code';
}
?>