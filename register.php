<?php
session_start();
$name = $_POST['name'];
$email  = $_POST['email'];
$mno = $_POST['mno'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$dep = $_POST['dep'];

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
  $INSERT = "INSERT Into register (name , email ,mno, pass1, pass2, dep, id, code )values(?,?,?,?,?,?,?,?)";
//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
        if ($pass1==$pass2) {
          $pass1=$pass2=md5($pass1);
          $stmt->close();
          $stmt = $conn->prepare($INSERT);
          $stmt->bind_param("ssssssss", $name , $email ,$mno, $pass1, $pass2, $dep, $id, $code);
          $stmt->execute();
          echo '<script type="text/javascript">
            window.onload = function () { alert("Account Created"); }
            function close_window(){
              window.opener.location = 'main.php';
              window.close();
          </script>';
        }
      }
        else {
          echo "Passwords mismatch";
        }
      } 
        if ($rnum!=0) {
      echo "Someone already register using this email";
    }
  }

?>