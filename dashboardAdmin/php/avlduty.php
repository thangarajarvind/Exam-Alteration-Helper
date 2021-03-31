<?php

session_start();
$id = $_POST['available'];
$_SESSION['available'] = $id;
header('Location: ../html/dutyalloc.html');

?>
