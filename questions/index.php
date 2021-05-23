<?php
// Start the session
session_start();

include("../header.php");

include("verifyform.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Quiz</title>

    <link rel="stylesheet" href="../globalStyle.css">
    <link rel="stylesheet" href="style.css">
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
        <div class="row" id="addquestion">
            <h2>Add question</h2>
            <form method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
                    <div class="left-form">
                        <div class="c-enunt">
                            <label for="question">Question</label><br>
                            <textarea id="question" name="question" rows="5" required> </textarea> 
                        </div>
                        
                        <div class="c-categ">
                            <label for="category">Category</label><br>
                            <input type="text" id="category" name="category" required>
                        </div>
                    </div>

                    <div class="right-form">
                        <div class="c-response">
                            <label for="answer1">Answer 1</label><br>
                            <input type="text" id="answer1" name="answer1" required>
                        </div>
                        
                        <div class="c-response">
                            <label for="answer2">Answer 2</label><br>
                            <input type="text" id="answer2" name="answer2" required>
                        </div>
                        
                        <div class="c-response">
                            <label for="answer3">Answer 3</label><br>
                            <input type="text" id="answer3" name="answer3" required>
                        </div>
                        
                        <div class="c-response">
                            <label for="answer4">Answer 4</label><br>
                            <input type="text" id="answer4" name="answer4" required>
                        </div>
                        
                        <div class="c-response">
                            <label for="correctanswer">Correct Answer</label><br>
                            <input type="text" id="correctanswer" name="correctanswer" required>
                        </div>
                    </div>
                   
                    <div class="c-submit">
                        <input type="submit" value="Add question">
                    </div>

                    <br>
                    <?php echo $mesaj ?>
                    <br>
                    
                </form>
        </div>

        <div class="row c-questions">
            <?php include("getquestions.php"); ?>
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