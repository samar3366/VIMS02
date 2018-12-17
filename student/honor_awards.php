<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $htno = $_SESSION['htno'];

    $title = $_POST["title"];

    $description = $_POST["description"];

    $type = $_POST["type"];

    //echo $name,",",$htno,",",$batch,",",$branch,",",$section,",",$number,",",$mail;

    $qry1 = "INSERT INTO honor_awards (htno, title, description, type) VALUES ('$htno','$title','$description','$type')";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../honor_awards.php?ack=1");
    }
    else
    {
        echo "updation failed";
        header("location:../honor_awards.php?ack=0");
    }

    $connect->close();

?>