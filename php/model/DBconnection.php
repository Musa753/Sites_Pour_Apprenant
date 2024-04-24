<?php 
    $username="moussa";
    $password="moussa";
    $servername="localhost";
    $dbname="core";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : ".$conn->connect_error);
    }
?>