<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $facJntuId = $_SESSION['fid'];

    $wsName = $_POST["wsName"];

    $wsVenue = $_POST["wsVenue"];

    $wsStartDate = $_POST["wsStart"];

    $wsEndDate = $_POST["wsEnd"];

    $wsCertificate = $_POST["wsCertificate"];


    $qry1 = "INSERT INTO faculty_workshops(facJntuId,wsName,wsVenue,wsStart,wsEnd,wsCertificate) VALUES ('$facJntuId','$wsName','$wsVenue','$wsStartDate','$wsEndDate','$wsCertificate')";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../faculty-add_ws.php");
    }
    else
    {
        echo "updation failed";
        header("location:../faculty-add_ws.php");
    }

    $connect->close();

?>