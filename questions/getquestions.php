<?php

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
    $sql = "SELECT * FROM `questions`";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $number = 1;
        while($row = $result->fetch_assoc()){
            echo '<div id="q' . $number .'"  class="c-single-question">';
            
            echo '<div class="categorie">' . $row["category"] . '</div>';
            echo '<div class="enunt">' . $row["enunt"] . '</div>';
            echo '<div class="raspuns">' . $row["raspuns1"] . '</div>';
            echo '<div class="raspuns">' . $row["raspuns2"] . '</div>';
            echo '<div class="raspuns">' . $row["raspuns3"] . '</div>';
            echo '<div class="raspuns">' . $row["raspuns4"] . '</div>';
            echo '<div class="raspuns">' . $row["raspunscorect"] . '</div>';
            echo '<div class="deletebtn"> <div id="b' .$number .'" class="btn-delete">Delete</div> </div>';
            echo '</div>';
        $number++;
        }
    }
    else{
        echo "No questions were found! <br>";
    }
}
$conn->close();

?>