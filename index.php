<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>

    <header>
        <div class="row">
            <?php
            if($_SESSION["loggedin"] == "true")
                    echo "You are logged in!";
                else
                    echo "<a href='login'> Log In</a> <a href='register'>Register</a>";
             ?>
        </div>
    </header>

    <main>
        <div class="row">
            <p>acesta este un mesaj</p>
        </div>
    </main>

    <footer>

    </footer>

</body>

</html>