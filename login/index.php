<?php
    session_start();
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
                <a href="../index.php">Go to Homepage</a>
            </div>
        </div>
    </header>





    <?php 
        if($_SESSION["loggedin"] == true){
            echo "You are already logged in! <a href='../'>Go to homepage </a>";           
        }
    ?>

    
    <form class="<?php if($_SESSION["loggedin"] == true) echo "hide-form" ?>" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="username">Username</label>
    <input type="text" name="username">
    
    <label for="password">Password</label>
    <input type="password" name="password">

    <input type="submit" value="Log In">



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