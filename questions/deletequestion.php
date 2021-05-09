<?php

$myenunt = $_REQUEST["q"];

// create database conn
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "quizProject";

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else{
    $sql = "DELETE FROM `questions` WHERE enunt='$myenunt'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Question deleted!";
    } else {
        $mesaj = "Cannot delete question! <br>" . "Error: " . $sql . "<br>" . $conn->error ;
    }
}
$conn->close();

?>