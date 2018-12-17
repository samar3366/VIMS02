<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $htno = $_SESSION['htno'];

    $title = $_POST["title"];

    $organized_by = $_POST["organized_by"];

    $online = $_POST["online"];

    $instructor = $_POST["instructor"];

    $time_duration = $_POST["time_duration"]."hrs";

    //echo $name,",",$htno,",",$batch,",",$branch,",",$section,",",$number,",",$mail;

    $qry1 = "INSERT INTO student_courses (htno, title, organized_by, online_offline, instructor, time_duration) VALUES ('$htno','$title','$organized_by','$online','$instructor','$time_duration')";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../student-courses.php?ack=1");
    }
    else
    {
        echo "updation failed";
        header("location:../student-courses.php?ack=0");
    }

    $connect->close();

?>