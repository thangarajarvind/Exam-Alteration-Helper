<?php
    $conn = new mysqli ("localhost", "root", "", "se");

    $dsgn = "";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mno = $_POST['mno'];
    $des = $_POST['des'];
    $addr = $_POST['addr'];
    $pin = $_POST['pin'];
    
    $flag = 0;

    if($id == NULL){
        $l = "../html/user.html";
        $m = "Enter a valid ID";
        $t = "error";
        pop($l,$m,$t);
    }
    else{
        $SELECT = "SELECT id From details Where id = ?";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum == 1){
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
                $l = "../html/user.html";
                $m = "Update successful";
                $t = "success";
                pop($l,$m,$t);
            }
        }
        else{
            $l = "../html/user.html";
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