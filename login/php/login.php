<?php
session_start();

$user = $_POST['user'];
$pass  = $_POST['pass'];

$admine = "admin@se";
$adminm = "0258";
$rnumm = 0;

if (empty($user) || empty($pass) )
{
    die('Username or password missing');
}

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
    $SELECT = "SELECT email From register Where email = ? Limit 1";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($user);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    $stmt->close();

    if ($rnum==1) {
        if ($user == $admine || $user == $adminm){
            $result = mysqli_query($conn,"SELECT * FROM register where email='" . $_POST['user'] . "'");
            $row = mysqli_fetch_assoc($result);
            $dbpass = $row['pass1'];
            $pass = md5($pass);
            if($pass == $dbpass){
                $result = mysqli_query($conn,"SELECT id FROM register where email='$user'");
                $row = mysqli_fetch_assoc($result);
                $id = $row['id'];
                $_SESSION['id'] = $id;
                header('Location: ../../dashboardAdmin/html/dashboard.html');
            }
            else{
                $m = "Incorrect Password";
                $t = "error";
                $l = "../html/index.html";
                pop($l,$m,$t);
            }
        }
        else{
            $result = mysqli_query($conn,"SELECT * FROM register where email='" . $_POST['user'] . "'");
            $row = mysqli_fetch_assoc($result);
            $dbpass = $row['pass1'];
            $pass = md5($pass);
            if($pass == $dbpass){
                $result = mysqli_query($conn,"SELECT id FROM register where email='$user'");
                $row = mysqli_fetch_assoc($result);
                $id = $row['id'];
                $_SESSION['id'] = $id;
                header('Location: ../../dashboard/html/dashboard.html');
            }
            else{
                $m = "Incorrect Password";
                $l = "../html/index.html";
                $t = "error";
                pop($l,$m,$t);
            }
        }
    }
    else{
        $SELECT = "SELECT mno From register Where mno = ? Limit 1";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $stmt->bind_result($user);
        $stmt->store_result();
        $rnumm = $stmt->num_rows;
        $stmt->close();

        if ($rnumm==1) {
            if ($user == $admine || $user == $adminm){
                $result = mysqli_query($conn,"SELECT * FROM register where mno='" . $_POST['user'] . "'");
                $row = mysqli_fetch_assoc($result);
                $dbpass = $row['pass1'];
                $pass = md5($pass);
                if($pass == $dbpass){
                    $result = mysqli_query($conn,"SELECT id FROM register where mno='$user'");
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $_SESSION['id'] = $id;
                    header('Location: ../../dashboardAdmin/html/dashboard.html');
                }
                else{
                    $m = "Incorrect Password";
                    $l = "../html/index.html";
                    $t = "error";
                    pop($l,$m,$t);
                }
            }
            else{
                $result = mysqli_query($conn,"SELECT * FROM register where mno='" . $_POST['user'] . "'");
                $row = mysqli_fetch_assoc($result);
                $dbpass = $row['pass1'];
                $pass = md5($pass);
                if($pass == $dbpass){
                    $result = mysqli_query($conn,"SELECT id FROM register where mno='$user'");
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $_SESSION['id'] = $id;
                    header('Location: ../../dashboard/html/dashboard.html');
                }
                else{
                    $m = "Incorrect Password";
                    $l = "../html/index.html";
                    $t = "error";
                    pop($l,$m,$t);
                }
            }
        }
	}
    echo '<script>console.log("Outside")</script>';
    if($rnumm!=1 && $rnum!=1){
        echo '<script>console.log("Inside")</script>';
        $l = "../html/index.html";
        $m = "User does not exist";
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