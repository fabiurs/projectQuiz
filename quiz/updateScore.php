<?php

// create database conn
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "quizProject";


$score = $_REQUEST["s"];


// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else{
    
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $usrId = $_SESSION["id"];
    $sql = "SELECT score FROM `users` WHERE id='$usrId'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0){

        $myquestion = array();

        while($row = $result->fetch_assoc()){
            $lastScore = $row["score"];
        }

        $lastScore += $score;

        $sql = "UPDATE `users` SET `score` = '$lastScore' WHERE `users`.`id` = '$usrId' ";
        $conn->query($sql);
    }
}
$conn->close();
  
?>