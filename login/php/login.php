<?php

$user = $_POST['user'];
$pass  = $_POST['pass'];

$admine = "admin@se";
$adminm = "0258";

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
                header('Location: ../../dashboardAdmin/html/dashboard.html');
            }
            else{
                $m = "Incorrect Password";
                $l = "../html/index.html";
                popup ($m,$l);
            }
        }
        else{
            $result = mysqli_query($conn,"SELECT * FROM register where email='" . $_POST['user'] . "'");
            $row = mysqli_fetch_assoc($result);
            $dbpass = $row['pass1'];
            $pass = md5($pass);
            if($pass == $dbpass){
                header('Location: ../../dashboard/html/dashboard.html');
            }
            else{
                $m = "Incorrect Password";
                $l = "../html/index.html";
                popup ($m,$l);
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
                    header('Location: ../../dashboardAdmin/html/dashboard.html');
                }
                else{
                    $m = "Incorrect Password";
                    $l = "../html/index.html";
                    popup ($m,$l);
                }
            }
            else{
                $result = mysqli_query($conn,"SELECT * FROM register where mno='" . $_POST['user'] . "'");
                $row = mysqli_fetch_assoc($result);
                $dbpass = $row['pass1'];
                $pass = md5($pass);
                if($pass == $dbpass){
                    header('Location: ../../dashboard/html/dashboard.html');
                }
                else{
                    $m = "Incorrect Password";
                    $l = "../html/index.html";
                    popup ($m,$l);
                }
            }
        }
	}
    if($rnumm!=1 && $rnum!=1){
        $m = "User does not exist";
        $l = "../html/index.html";
        popup ($m,$l);
    }
}

function popup ($m,$l){
    echo "<script type='text/javascript'>alert('$m');window.location.href = '$l';window.close();</script>";
}

?>