<?php

session_start();
if(isset($_POST['available'])){
    $id = $_POST['available'];
    $_SESSION['available'] = $id;
    header('Location: ../html/dutyalloc.html');
}
else{
    $l = "../html/allocation.php";
    $m = "Select a faculty";
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
