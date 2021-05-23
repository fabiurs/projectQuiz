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

    $sql = "SELECT username, score FROM `users` ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){

        $myquestion = array();

        while($row = $result->fetch_assoc()){

            echo ' <div class="c-user"> <div class="uname"> ' . $row["username"] . '</div> <div class="scr">' . $row["score"] . '</div> </div> ';
        }
    }
    else{
        echo "No questions were found! <br>";
    }
}
$conn->close();
  
?>