<?php
  session_start();

  $conn = new mysqli ("localhost", "root", "", "se");

  if(isset($_POST['roomalloc'])){
    $roomalloc = $_POST['roomalloc'];
  }
  if(empty($roomalloc)) 
  {
    $m = "No rooms selected";
    $l = "../html/nduty1.php";
    $t = "error";
    pop($l,$m,$t);
  } 
  else 
  {
    $N = count($roomalloc);

    $date = $_SESSION['date'];
    $hour = $_SESSION['hour'];

    for($i=0; $i < $N; $i++)
    {
        $room = $roomalloc[$i];
        $sql = "SELECT * from roomstat ORDER BY dno DESC LIMIT 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $dno = $row["dno"];

        $nno = (int)$dno;
        $nno = $nno+1;

        $INSERT = "INSERT Into roomstat(dno)values(?)";
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("s", $nno);
        $stmt->execute();

        $sql = "UPDATE roomstat SET room='$room',date='$date',hour='$hour' where dno='$nno'";
        $conn->query($sql);

        $m = "Duty created";
        $l = "../html/nduty.html";
        $t = "success";
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