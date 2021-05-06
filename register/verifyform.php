<?php 

$username = $userpassword = $repeatuserpassword = $mesajusername = $mesajpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = input_test($_POST["username"]);
    $userpassword = input_test($_POST["password"]);
    $repeatuserpassword = input_test($_POST["repeatpassword"]);

    if(strcmp($userpassword, $repeatuserpassword) != 0){
        $mesajpassword = "Passwords don't match <br>";
    }
    else{

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
            $sql = "SELECT id, username FROM users WHERE username='$username'";

            $result = $conn->query($sql);
            

            // verific daca username deja exista in baza de date
            if($result->num_rows > 0){
                $mesajusername = "$username username is taken <br>";
            }
            // daca acest username nu este folosit atunci creez contul
            else{
                
                $userpassword = md5($userpassword);
                $userid = uniqid();

                $sql = "INSERT INTO users (id, username, password, score) VALUES ('$userid', '$username', '$userpassword', 0)";

                if( $conn->query($sql) === TRUE){
                    $_SESSION["username"] = $username;
                    $_SESSION["id"] = $userid;
                    $_SESSION["loggedin"] = "true";
                }
                else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            }
        }
    }

}

function input_test($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;
}

?>