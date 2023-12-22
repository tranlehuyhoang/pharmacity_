<?php
    $servername = "localhost";
    $username = "";
    $password = "";
    $database = "qlbh";

    // Create connection 
    $conn = @mysqli_connect($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
     }
       echo "Connected successfully";
?>