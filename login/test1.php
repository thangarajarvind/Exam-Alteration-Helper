<?php
$dbname = 'timetable';
$conn = mysqli_connect("localhost", "root", "");
$sql = "SHOW TABLES FROM $dbname";
$result = mysqli_query($conn,$sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

while ($row = mysqli_fetch_row($result)) {
    echo $row[0];
}

#mysqli_free_result($result);
?>