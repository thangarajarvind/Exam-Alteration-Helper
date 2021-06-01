<?php

    $sname = $_POST['sname'];
    echo $sname;
    $flag = 0;
    $conn = mysqli_connect("localhost", "root", "", "se");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM register WHERE name=$sname";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $flag = $flag+1;
    }
    echo $flag;
    
?>