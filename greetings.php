<?php
    session_start();
?>


<div class="row <?php if($_SESSION["loggedin"] === "false") echo " hide-row" ?>">
    <div class="c-user">
        <h1>Hello, <?php if($_SESSION["username"]) echo $_SESSION["username"] ?> </h1>
    </div>
</div>

<div class="row">
    <p>Your current score is <?php if($_SESSION["score"]) echo $_SESSION["score"]; ?> </p>

    <p>To improve it you can start a quiz <a href="quiz">here</a> </p>
</div>

