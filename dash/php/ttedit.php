<?php

    session_start();
    $id = $_SESSION['id'];
    $conn = new mysqli ("localhost", "root", "", "se");
    $result = mysqli_query($conn,"SELECT * FROM register where id='$id'");
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $flag = 0;

    if(isset($_POST["day"])){
        $day = $_POST["day"];
        $flag = $flag+1;
    }
    else{
        $m = "Select a day";
        $l = "../html/timetableedit.php";
        $t = 'error';
        popup ($l,$m,$t);
    }
    if(isset($_POST["p"])){
        $p = $_POST["p"];
        $flag = $flag+1;
    }
    else{
        $m = "Select a period";
        $l = "../html/timetableedit.php";
        $t = 'error';
        popup ($l,$m,$t);
    }
    if(isset($_POST["status"])){
        $status = $_POST["status"];
        $flag = $flag+1;
    }
    else{
        $m = "Select a status";
        $l = "../html/timetableedit.php";
        $t = 'error';
        popup ($l,$m,$t);
    }

    if($flag == 3){
        $conn = mysqli_connect("localhost", "root", "", "timetable");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * from $name WHERE day='$day'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $ds = $row["$p"];
        
        if($ds == 'On-Duty'){
            $m = "No change";
            $l = "../html/timetableedit.php";
            $t = 'error';
            popup ($l,$m,$t);
        }
        elseif($ds == $status){
            $m = "No change";
            $l = "../html/timetableedit.php";
            $t = 'error';
            popup ($l,$m,$t);
        }
        else{
            $sql = "UPDATE $name SET $p='$status' WHERE day='$day'";
            if(mysqli_query($conn, $sql)){
                $m = "Update Success";
                $l = "../html/timetableedit.php";
                $t = 'success';
                popup ($l,$m,$t);
            }
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