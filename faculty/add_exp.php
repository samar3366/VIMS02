<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $facJntuhId = $_SESSION['fid'];

    $expInst = $_POST["expInst"];

    $expDesig = $_POST["expDesig"];

    $expJoin = $_POST["expJoin"];

    $expRel = $_POST["expRel"];

    $qry1 = "INSERT INTO faculty_experience (facJntuId,expInst,expDesig,expJoin,expRel) VALUES ('$facJntuhId','$expInst','$expDesig','$expJoin','$expRel')";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../faculty-add_exp.php?ack=1");
    }
    else
    {
        echo "updation failed";
        header("location:../faculty-add_exp.php?ack=0");
    }

    $connect->close();

?>