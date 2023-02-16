<?php
    session_start();
    require "../../vendor/autoload.php";

    unset($_SESSION["token"]);
    session_unset();
    session_destroy();

    header("Location: ../../index.php");
    exit;
?>