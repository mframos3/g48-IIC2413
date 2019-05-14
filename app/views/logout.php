<?php
    session_start();
    unset($_SESSION["current_user_id"]);
    unset($_SESSION["current_user_mail"]);
    unset($_SESSION["current_user_name"]);
    header("Location: ../index.html");
?>
