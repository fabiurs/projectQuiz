
<?php

    session_start();
    function myheader(){
        if($_SESSION["loggedin"] == "true")
            echo "<a href='account'>My account</a>";
        else
            echo "<a href='login'> Log In</a> <a href='register'>Register</a>";
    }
?>