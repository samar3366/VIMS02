<?php
    $connect=new mysqli("localhost","root","","vims01");
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
?>
