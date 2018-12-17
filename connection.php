<?php
    $connect=new mysqli("localhost","root","","vims02");
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
?>
