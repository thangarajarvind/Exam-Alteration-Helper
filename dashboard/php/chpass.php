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
            $npass = md5($npass);
            $sql = "UPDATE register SET pass1='$npass',pass2='$npass' where id='$id'"; 
            if ($conn->query($sql) === TRUE) {
                $m = "Record updated successfully";
                $l = "../html/changepassword.html";
                popup ($m,$l);
            }
            else{
                $m = "Error in update";
                $l = "../html/changepassword.html";
                popup ($m,$l);
            }
        }
        else{
            $m = "New passwords mismatch";
            $l = "../html/changepassword.html";
            popup ($m,$l);
        }
    }
    else{
        $m = "Incorrect current password";
        $l = "../html/changepassword.html";
        popup ($m,$l);
    }
}

function popup ($m,$l){
    echo "<script type='text/javascript'>alert('$m');window.location.href = '$l';window.close();</script>";
}

?>