<?php
session_start();

$id = $_SESSION['id'];

$opass = $_POST['opass'];
$npass  = $_POST['npass'];
$npass1 = $_POST['npass1'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "se";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}

else{
    $opass = md5($opass);
    $result = mysqli_query($conn,"SELECT pass1 FROM register where id='$id'");
    $row = mysqli_fetch_assoc($result);
    $odbpass = $row['pass1'];
    if($opass == $odbpass){
        if($npass == $npass1){
            if(strlen($npass)>7){
                $npass = md5($npass);
                $sql = "UPDATE register SET pass1='$npass',pass2='$npass' where id='$id'"; 
                if ($conn->query($sql) === TRUE) {
                    $m = "Record updated successfully";
                    $l = "../html/chpass.php";
                    $t = 'success';
                    popup ($l,$m,$t);
                }
                else{
                    $m = "Error in update";
                    $l = "../html/chpass.php";
                    $t = 'error';
                    popup ($l,$m,$t);
                }
            }
            else{
                $m = "Password length should be atleast 8 characters";
                $l = "../html/chpass.php";
                $t = 'error';
                popup ($l,$m,$t);
            }
        }
        else{
            $m = "New passwords mismatch";
            $l = "../html/chpass.php";
            $t = 'error';
            popup ($l,$m,$t);
        }
    }
    else{
        $m = "Incorrect current password";
        $l = "../html/chpass.php";
        $t = 'error';
        popup ($l,$m,$t);
    }
}

function popup ($l,$m,$t){
    echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../../js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
    echo '},100);</script>';
}

?>