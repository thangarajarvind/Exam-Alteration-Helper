<?php
    session_start();
    $id = $_SESSION['id'];
    $conn = new mysqli ("localhost", "root", "", "se");
    $result = mysqli_query($conn,"SELECT * FROM register where id='$id'");
    $row = mysqli_fetch_assoc($result);

    $dsgn = "";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mno = $_POST['mno'];
    $des = $_POST['des'];
    $addr = $_POST['addr'];
    $pin = $_POST['pin'];
    
    $flag = 0;

    if($name == NULL && $email == NULL && $mno == NULL && $des == 'Select'  && $addr == NULL && $pin == NULL){
        echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
        echo '<script src="../../js/sweetalert2.all.min.js"></script>';
        echo '<script type="text/javascript">';
        echo "setTimeout(function () { Swal.fire('','No changes done','error').then(function (result) {if (result.value) {window.location = '../html/profile.php';}})";
        echo '},100);</script>';
    }
    if($name!=NULL){
        $flag = $flag+1;
        $sql = "UPDATE register SET name='$name' where id='$id'";
        $conn->query($sql);
    }
    if($email!=NULL){
        $flag = $flag+1;
        $sql = "UPDATE register SET email='$email' where id='$id'";
        $conn->query($sql);
    }
    if($mno!=NULL){
        $flag = $flag+1;
        $sql = "UPDATE register SET mno='$mno' where id='$id'";
        $conn->query($sql);
    }
    if($des!='Select'){
        $flag = $flag+1;
        $sql = "UPDATE details SET dsgn='$des' where id='$id'";
        $conn->query($sql);
    }
    if($addr!=NULL){
        $flag = $flag+1;
        $sql = "UPDATE details SET adr='$addr' where id='$id'";
        $conn->query($sql);
    }
    if($pin!=NULL){
        $flag = $flag+1;
        $sql = "UPDATE details SET pin='$pin' where id='$id'";
        $conn->query($sql);
    }
    if($flag!=0){
        echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
        echo '<script src="../../js/sweetalert2.all.min.js"></script>';
        echo '<script type="text/javascript">';
        echo "setTimeout(function () { Swal.fire('','Update successful','success').then(function (result) {if (result.value) {window.location = '../html/profile.php';}})";
        echo '},100);</script>';
    }