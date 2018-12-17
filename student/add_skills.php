<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $htno = $_SESSION['htno'];

    $skill = $_POST["skill"];

    $skill_domain = $_POST["skill_domain"];

    $skill_level = $_POST["skill_level"];

    $desig = $_POST["desig"];

    //echo $name,",",$htno,",",$batch,",",$branch,",",$section,",",$number,",",$mail;

    $qry1 = "INSERT INTO student_skill (htno, skill, skill_domain, skill_level, desig) VALUES ('$htno','$skill','$skill_domain','$skill_level','$desig')";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../student-skills.php?ack=1");
    }
    else
    {
        echo "updation failed";
        header("location:../student-skills.php?ack=0");
    }

    $connect->close();

?>