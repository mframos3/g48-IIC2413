<?php
    session_start();
    unset($_SESSION["current_user_id"]);
    unset($_SESSION["current_user_mail"]);
    unset($_SESSION["current_user_name"]);
    unset($_SESSION["current_user_date"]);
    unset($_SESSION["current_user_country"]);
    header("Location: ../index.php");
?>
