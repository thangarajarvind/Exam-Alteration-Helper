<?php
session_start();
$code = $_SESSION['code'];
$ucode = $_POST['code'];

if($code == $ucode){
    header('Location: reset.html');
}
else{
    echo 'Invalid Code';
}
?>