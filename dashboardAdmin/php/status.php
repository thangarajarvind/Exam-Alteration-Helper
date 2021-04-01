<?php

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
    $i=0;
    $id = mysqli_query($conn,"SELECT id From work");
    $result = mysql_query("select count(1) FROM work");
    $row = mysql_fetch_array($result);
    $rcount = $row[0];
    while($rcount>0){
        $rcount = $rcount-1;
        $x = $id[$i];
        $i=$i+1;
        $name = mysqli_query($conn,"SELECT name From register Where id = $x");
        $work = mysqli_query($conn,"SELECT status From work Where id = $x");
        $idout = $id[$i];
    }
}
?>