<?php
// Start the session
session_start();

include("../header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Quiz</title>

    <link rel="stylesheet" href="../globalStyle.css">
    <link rel="stylesheet" href="localStyle.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

</head>

<body>

    <header>
        <div class="row">
            <div class="logo">

            </div>
            
            <div class="menu">
                <?php myheader(); ?>
            </div>
        </div>
    </header>
    
    <main>
        <div id="first-row" class="row has-transition">
            <h2>Start a quiz!</h2>
        </div>

        <div id="row-categ" class="row has-transition">
            <p>Choose a category</p>
            <div id="c-categ">
                <button onclick="getCode('sport')">Sport</button>
                <button onclick="getCode('geography')">Geography</button>
                <button onclick="getCode('culture')">Culture</button>
                <button onclick="getCode('tech')">Tech</button>
            </div>
        </div>

        <div id="instructions" class="row">
            <h3>Instructions</h3>
            <p>Each quiz has 10 questions</p>
            <p>Select only one answer </p>
            <p>And good luck;)</p>
        
            <button onClick="startQuiz()">Accept</button>
            <button onClick="showCateg()">Back</button>

        </div>

        <div id="row-questions" class="row has-transition">
            <div id="title">
                <p></p>
            </div>
            <div id="c-question-number">
                Question number <span id="question-number">1</span>
            </div>
            <div id="question">
                <p></p>
            </div>

            <div class="responses">
                <button id="r-btn-1" class="response-btn"></button>
                <button id="r-btn-2" class="response-btn"></button>
                <button id="r-btn-3" class="response-btn"></button>
                <button id="r-btn-4" class="response-btn"></button>
            </div>

            <div class="next">
                <button id="verify">Verify</button>
            </div>
            <div class="mesaj-eroare1"></div>
        </div>

        <div style="display: none;" id="finish-msj" class="row">
            <p>Congratulations on this quiz! You have collected another <span id="points"></span> points!</p>
        </div>
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

    <script src="script.js"></script>

</body>

</html>