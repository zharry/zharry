<?php
    session_start();
    unset($_SESSION["brain_username"]);
    session_unset();
    session_destroy();
    header("Location: ../");
?>