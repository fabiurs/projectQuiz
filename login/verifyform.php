<?php

session_start();


$username = $password = "";

$loginFailed = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = input_test($_POST["username"]);
    $userpassword = input_test($_POST["password"]);

    $userpassword = md5($userpassword);

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

        $sql = "SELECT isadmin, id, username, score FROM users WHERE username='$username' AND password='$userpassword'";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $_SESSION["userid"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["score"] = $row["score"];
                $_SESSION["adminlogged"] = $row["isadmin"];
            }
        
        $_SESSION["loggedin"] = "true";
        
        } else {
            $loginFailed = "Utilizatorul nu a fost gasit";
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