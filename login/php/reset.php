<?php
session_start();
$user = $_SESSION['user'];

$p1 = $_POST['p1'];
$p2 = $_POST['p2'];

if($p1 == $p2){
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
        $p1=$p2=md5($p1);
        $SELECT = "SELECT email From register Where email = ?";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $stmt->bind_result($user);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        
        if ($rnum==1) {
            $stmt->close();
            $sql = "UPDATE register SET pass1='$p1',pass2='$p1' where email='" . $_SESSION['user'] . "'"; 
            if ($conn->query($sql) === TRUE) {
                $m = "Record updated successfully";
                $l = "../html/index.php";
                $t = "error";
                pop($l,$m,$t);
            } else {
                echo "Error updating record: " . $conn->error;
          }
        }
        else{
            $SELECT = "SELECT mno From register Where mno = ?";
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $stmt->bind_result($user);
            $stmt->store_result();
            $rnumm = $stmt->num_rows;

            if ($rnumm==1) {
                $stmt->close();
                $sql = "UPDATE register SET pass1='$p1',pass2='$p1' where mno='" . $_SESSION['user'] . "'"; 
                if ($conn->query($sql) === TRUE) {
                    $m = "Record updated successfully";
                    $l = "../html/index.php";
                    $t = "error";
                    pop($l,$m,$t);
                } else {
                    echo "Error updating record: " . $conn->error;
              }
            }
        }
    }   
    if($rnumm!=1 && $rnum!=1){
        $m = "User does not exist";
        $l = "../html/index.php";
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

?>