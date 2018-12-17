<?php
    include('../connection.php');
    
    //$htno = $_GET['htno'];

    $htno = $_POST["htno"];
    $name = $_POST["name"];
    $batch = $_POST["batch"];
    $branch = $_POST["branch"];
    $section = $_POST["section"];
    $number = $_POST["number"];
    $mail = $_POST["mail"];

    $qry = "INSERT INTO student_details(htno, name, batch, branch, section, number, mail) VALUES ('$htno','$name','$batch','$branch','$section','$number','$mail')";
    $res = mysqli_query($connect,$qry);


    $qry1 = "INSERT INTO student_info(htno) VALUES ('$htno')";
    $res1 = mysqli_query($connect,$qry1);


    if($res1)
    {
        echo "Your file Uploaded Successfull";
        header("location:../admin-edit_student.php?ack=1");
    }
    else
    {
        echo "Your file Uploaded Failed";
        header("location:../admin-edit_student.php?ack=0");
    }
?>