<?php
    session_start();
?>


<div class="row <?php if($_SESSION["loggedin"] === "false") echo " hide-row" ?>">
    <div class="c-user">
        <h1>Hello, <span class="username"> <?php if($_SESSION["username"]) echo $_SESSION["username"] ?> </span> </h1>
    </div>
</div>

<div class="row">

    <p>You can start a quiz <a href="quiz">here</a> </p>
</div>

