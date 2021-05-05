<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .hide-form{
            display: none;
        }
    </style>

</head>

<body>

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

    

</form>
</body>

</html>