<?php

// create database conn
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "quizProject";


$mycategory = $_REQUEST["c"];


// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else{

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id FROM `questions` WHERE category='$mycategory'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){

        $codes = array();

        while($row = $result->fetch_assoc()) {
            array_push($codes, $row["id"]);
        }

        echo json_encode($codes);
    }
    else{
        echo "No questions were found! <br>";
    }
}
$conn->close();
  
?>