<?php
// Start the session
session_start();

if( !isset($_SESSION["loggedin"])){
    $_SESSION["loggedin"] = "false";
}

include("header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Quiz</title>

    <link rel="stylesheet" href="globalStyle.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
   

</head>

<body class="homepage">

    <header>
        <div class="row">
            <div class="logo">
                <h1>Quiz App</h1>
            </div>
            
            <div class="menu">
                <?php myheader(); ?>
            </div>
        </div>
    </header>


    
    <main>

        <div class="description row">
            <h5>What is a quiz?</h5>
            <p>A quiz is a form of game or mind sport in which players attempt to answer questions correctly about a certain or variety of subjects. Quizzes can be used as a brief assessment in education and similar fields to measure growth in knowledge, abilities, or skills. They can also be televised for entertainment purposes, often in a game show format.</p>

            <br> <br>

            <?php if($_SESSION["loggedin"] === "false") echo '<p>To take part in this challenge please <a href="register">Register</a> </p>' ; ?>
        </div>
        <?php if($_SESSION["loggedin"] === "true") require("greetings.php"); ?>

        <div class="row admin-edit">
            <?php if($_SESSION["adminlogged"] === "1") echo "You can <a href='questions'>Edit questions</a>"; ?>
        </div>

        <?php if($_SESSION["loggedin"] === "true") require("getWordsApi/info.php"); ?>

    </main>

    <footer>
        <div class="row">
            <p>© Fabian Ursache 2021</p>
        </div>

        <div class="row">
            <div class="social-links">
                <a href="https://www.linkedin.com/in/fabian-ursache/" target="_blank" class="social-image">
                    <i class="fab fa-linkedin"></i>
                </a>

                <a href="https://github.com/fabiurs" target="_blank" class="social-image">
                    <i class="fab fa-github"></i>
                </a>

            </div>
        </div>
    </footer>

</body>

</html>