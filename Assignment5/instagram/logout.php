<?php
    session_start();
    session_destroy();
    header("Location: /instagram/login.php");
?>