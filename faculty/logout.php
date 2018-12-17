<?php
    session_start();

    session_unset();

    session_destroy();

    setcookie('id', null, 0);

    header("location:../faculty-login.php");
?>