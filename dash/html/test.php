<?php
    $flag = 0;
    $conn = mysqli_connect("localhost", "root", "", "timetable");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO test4 (day, p1, p2, p3, p4, p5, p6) VALUES ('Monday', 'nan', 'nan', 'nan', 'nan', 'nan', 'nan')";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO test4 (day, p1, p2, p3, p4, p5, p6) VALUES ('Tuesday', 'nan', 'nan', 'nan', 'nan', 'nan', 'nan')";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO test4 (day, p1, p2, p3, p4, p5, p6) VALUES ('Wednesday', 'nan', 'nan', 'nan', 'nan', 'nan', 'nan')";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO test4 (day, p1, p2, p3, p4, p5, p6) VALUES ('Thursday', 'nan', 'nan', 'nan', 'nan', 'nan', 'nan')";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO test4 (day, p1, p2, p3, p4, p5, p6) VALUES ('Friday', 'nan', 'nan', 'nan', 'nan', 'nan', 'nan')";
    mysqli_query($conn, $sql);

?>