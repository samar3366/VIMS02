<?php
    include('../connection.php');
    
    $htno = $_GET['htno'];

    $qry = "DELETE FROM student_details WHERE htno='$htno'";
    $res = mysqli_query($connect,$qry);

    $qry1 = "DELETE FROM student_info WHERE htno='$htno'";
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