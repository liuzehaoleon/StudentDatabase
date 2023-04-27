<?php //connect to mysql database
    // session_start();
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $userName= "root";
    $password="Current-Root-Password";
    $databaseName="assignment";
    try {
        $conn = new mysqli("localhost",$userName, $password, $databaseName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected to MySQL server \n";
        $conn->set_charset("utf8mb4");
    } catch(Exception $e) {
        error_log($e->getMessage());
        exit('Error connecting to database'); 
    }
?><br/>