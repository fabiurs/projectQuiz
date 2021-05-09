<?php

$mesaj = $quest = $categ = $ans1 = $ans2 = $ans3 = $ans4 = $anscorrect = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quest = input_test($_POST["question"]);
    $categ = input_test($_POST["category"]);
    $ans1 = input_test($_POST["answer1"]);
    $ans2 = input_test($_POST["answer2"]);
    $ans3 = input_test($_POST["answer3"]);
    $ans4 = input_test($_POST["answer4"]);
    $anscorrect = input_test($_POST["correctanswer"]);


    // create database conn

    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "quizProject";

    // Create connection
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    else{
        $qid = uniqid();
        $sql = "INSERT INTO questions (enunt, category, id, raspuns1, raspuns2, raspuns3, raspuns4, raspunscorect) VALUES ('$quest', '$categ', '$qid', '$ans1', '$ans2', '$ans3', '$ans4', '$anscorrect')";
        
        if ($conn->query($sql) === TRUE) {
            $mesaj = "Intrebarea a fost adaugata!";
        } else {
            $mesaj = "Intrebarea nu a putut fi adaugata! <br>" . "Error: " . $sql . "<br>" . $conn->error ;
        }
    }
    $conn->close();

}



  
function input_test($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;
}
?>