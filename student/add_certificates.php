<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $htno = $_SESSION['htno'];

    $title = $_POST["title"];

    $given_by = $_POST["given_by"];

    $type = $_POST["type"];

    $achievement = $_POST["achievement"];

    //echo $name,",",$htno,",",$batch,",",$branch,",",$section,",",$number,",",$mail;

    $qry1 = "INSERT INTO student_certificate (htno, title, given_by, type, achievement) VALUES ('$htno','$title','$given_by','$type','$achievement')";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../student-certificates.php?ack=1");
    }
    else
    {
        echo "updation failed";
        header("location:../student-certificates.php?ack=0");
    }

    $connect->close();

?>