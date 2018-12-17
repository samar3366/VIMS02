<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $facJntuId = $_SESSION['fid'];

    $socName = $_POST["socName"];

    $socId = $_POST["socId"];

    $socType = $_POST["socType"];


    $qry1 = "INSERT INTO faculty_society (facJntuId,socName,socId,socType) VALUES ('$facJntuId','$socName','$socId','$socType')";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../faculty-add_soc.php");
    }
    else
    {
        echo "updation failed";
        header("location:../faculty-add_soc.php");
    }

    $connect->close();

?>