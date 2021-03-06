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

    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

</head>

<body>

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
    <div class="row leadboard-title">
        <h2>leadboard</h2>
    </div>

    <div class="row leadboard-row">
        <?php include("getLeadboard.php") ?>
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

</body>

</html>