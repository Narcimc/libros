<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (empty($_SESSION['user']) || empty($_SESSION['rol'])) {
        header("Location: login.php");

    }

?>
