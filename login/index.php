<?php
    session_start();

    require("verifyform.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link rel="stylesheet" href="../globalStyle.css">

</head>

<body>


    <header>
        <div class="row">
            <div class="logo">

            </div>
            
            <div class="gobacklink">
                <a href="../index.php">Home</a>
            </div>
        </div>
    </header>



    <main>
        <div class="row">
            <div class="c-form">
                <form method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
    
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" required><br>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" required>

                    <input type="submit" value="Log In">
                </form>
                
                <p> <?php echo $loginFailed ?> </p>

                <div class="c-message-register">
                    <p>Don&#39;t have an account? <a href="../register">Register</a> </p>
                </div>
            </div>
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



</form>
</body>

</html>