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
  $ID_CHECK = "SELECT id From register Where id = ?";
  $INSERT = "INSERT Into register (name , email ,mno, pass1, pass2, dep, id, code )values(?,?,?,?,?,?,?,?)";
//Prepare statement
    $stmt = $conn->prepare($ID_CHECK);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt->store_result();
    $idrow = $stmt->num_rows;
    $stmt->close();
    
    while($idrow>1){
        $id_num = (string)random_int ( 100 , 999 );
        $id = $dep.$id_num;
        $stmt = $conn->prepare($ID_CHECK);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $idrow = $stmt->num_rows;
        $stmt->close();
      }

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
              $stmt->close();
              $DETAILS = "INSERT Into details (id) values(?)";
              $stmt = $conn->prepare($DETAILS);
              $stmt->bind_param("s", $id);
              $stmt->execute();
              $stmt->close();
              $sql = "CREATE TABLE $name(
                day VARCHAR(50) PRIMARY KEY,
                p1 VARCHAR(30),
                p2 VARCHAR(30),
                p3 VARCHAR(30),
                p4 VARCHAR(30),
                p5 VARCHAR(30),
                p6 VARCHAR(30)
                )";
              $dbname = "timetable";
              $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $conn = mysqli_connect("localhost", "root", "", "timetable");
              // Check connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }
              $sql = "INSERT INTO $name (day, p1, p2, p3, p4, p5, p6) VALUES ('Monday', 'nan', 'nan', 'nan', 'nan', 'nan', 'nan')";
              mysqli_query($conn, $sql);
              $sql = "INSERT INTO $name (day, p1, p2, p3, p4, p5, p6) VALUES ('Tuesday', 'nan', 'nan', 'nan', 'nan', 'nan', 'nan')";
              mysqli_query($conn, $sql);
              $sql = "INSERT INTO $name (day, p1, p2, p3, p4, p5, p6) VALUES ('Wednesday', 'nan', 'nan', 'nan', 'nan', 'nan', 'nan')";
              mysqli_query($conn, $sql);
              $sql = "INSERT INTO $name (day, p1, p2, p3, p4, p5, p6) VALUES ('Thursday', 'nan', 'nan', 'nan', 'nan', 'nan', 'nan')";
              mysqli_query($conn, $sql);
              $sql = "INSERT INTO $name (day, p1, p2, p3, p4, p5, p6) VALUES ('Friday', 'nan', 'nan', 'nan', 'nan', 'nan', 'nan')";
              mysqli_query($conn, $sql);
              $m = "Account created";
              $l = "../html/index.html";
              $t = "success";
              pop($l,$m,$t);
              
            }
          }
        }
        else {
          $m = "Password Mismatch";
          $l = "../html/index.html";
          $t = "error";
          pop($l,$m,$t);
        }
      }
      if ($rnum!=0) {
        $m = "Email exists already";
        $l = "../html/index.html";
        $t = "error";
        pop($l,$m,$t);
    }
    if ($rnumm!=0) {
      $m = "Mobile number exists already";
      $l = "../html/index.html";
      $t = "error";
      pop($l,$m,$t);
    }
    if($len!=10){
      $m = "Invalid Mobile number";
      $l = "../html/index.html";
      $t = "error";
      pop($l,$m,$t);
    }
    if($plen<8){
      $m = "Password should be over 8 characters";
      $l = "../html/index.html";
      $t = "error";
      pop($l,$m,$t);
    }
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