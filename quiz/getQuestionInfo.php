<?php

// create database conn
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "quizProject";


$myid = $_REQUEST["qid"];


// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else{

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT enunt, raspuns1, raspuns2, raspuns3, raspuns4, raspunsCorect FROM `questions` WHERE id='$myid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){

        $myquestion = array();

        while($row = $result->fetch_assoc()){
            array_push($myquestion, $row["enunt"]);
            array_push($myquestion, $row["raspuns1"]);
            array_push($myquestion, $row["raspuns2"]);
            array_push($myquestion, $row["raspuns3"]);
            array_push($myquestion, $row["raspuns4"]);
            array_push($myquestion, $row["raspunsCorect"]);
        }
        echo json_encode($myquestion);
    }
    else{
        echo "No questions were found! <br>";
    }
}
$conn->close();
  
?>