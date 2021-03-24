<?php
session_start();
$name = $_POST['name'];
$email  = $_POST['email'];
$mno = $_POST['mno'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$dep = $_POST['dep'];

$len = strlen($mno);
$plen = strlen($pass1);

$code= rand(10000,99999);
$id="";
$id_num = (string)random_int ( 100 , 999 );
$id = $dep.$id_num;

if (!empty($name) || !empty($email) || !empty($mno) || !empty($pass1) || !empty($pass2) || !empty($dep) )
{

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
  $SELECTM = "SELECT mno From register Where mno = ? Limit 1";
  $INSERT = "INSERT Into register (name , email ,mno, pass1, pass2, dep, id, code )values(?,?,?,?,?,?,?,?)";
//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     $stmt->close();

     $stmt = $conn->prepare($SELECTM);
     $stmt->bind_param("s", $mno);
     $stmt->execute();
     $stmt->bind_result($mno);
     $stmt->store_result();
     $rnumm = $stmt->num_rows;

     //checking username
      if ($rnum==0 && $rnumm==0) {
        if ($pass1==$pass2) {
          if($len == 10){
            if($plen > 7){
              $pass1=$pass2=md5($pass1);
              $stmt->close();
              $stmt = $conn->prepare($INSERT);
              $stmt->bind_param("ssssssss", $name , $email ,$mno, $pass1, $pass2, $dep, $id, $code);
              $stmt->execute();
              echo '<script language="javascript">';
              echo 'alert("Account created");';
              echo 'window.location.href = "../html/index.html";';
              echo 'window.close();';
              echo '</script>';
            }
          }
        }
        else {
          echo '<script language="javascript">';
          echo 'alert("Password Mismatch");';
          echo 'window.location.href = "../html/index.html";';
          echo 'window.close();';
          echo '</script>';
        }
      }
      if ($rnum!=0) {
        echo '<script language="javascript">';
        echo 'alert("Email exists already");';
        echo 'window.location.href = "../html/index.html";';
        echo 'window.close();';
        echo '</script>';
    }
    if ($rnumm!=0) {
      echo '<script language="javascript">';
      echo 'alert("Mobile number exists already");';
      echo 'window.location.href = "../html/index.html";';
      echo 'window.close();';
      echo '</script>';
    }
    if($len!=10){
      echo '<script language="javascript">';
      echo 'alert("Invalid Mobile number");';
      echo 'window.location.href = "../html/index.html";';
      echo 'window.close();';
      echo '</script>';
    }
    if($plen<8){
      echo '<script language="javascript">';
      echo 'alert("Password should be over 8 characters");';
      echo 'window.location.href = "../html/index.html";';
      echo 'window.close();';
      echo '</script>';
    }
  }
}

?>