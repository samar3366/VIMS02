<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $htno = $_SESSION['htno'];

    $name = $_POST["name"];

    $team = $_POST["team"];

    $guide = $_POST["guide"];

    $description = $_POST["description"];

    $domain = $_POST["domain"];

    //echo $name,",",$htno,",",$batch,",",$branch,",",$section,",",$number,",",$mail;

    $qry1 = "INSERT INTO student_projects (htno, name, team, guide, description, domain) VALUES ('$htno','$name','$team','$guide','$description','$domain')";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../student-projects.php?ack=1");
    }
    else
    {
        echo "updation failed";
        header("location:../student-projects.php?ack=0");
    }

    $connect->close();

?>