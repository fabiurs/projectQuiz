<?php
    session_start();
?>


<div class="row <?php if($_SESSION["loggedin"] === "false") echo " hide-row" ?>">
    <div class="c-user">
        <h1>Hello, <?php if($_SESSION["username"]) echo $_SESSION["username"] ?> </h1>
    </div>
</div>