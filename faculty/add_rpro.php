<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $facJntuId = $_SESSION['fid'];

    $proName = $_POST["proName"];

    $proTeam = $_POST["proTeam"];

    $proDuration = $_POST["proDuration"];

    $proFunding = $_POST["proFunding"];

    $proSanctioned = $_POST["proSanctioned"];

    //echo $name,",",$htno,",",$batch,",",$branch,",",$section,",",$number,",",$mail;

    $qry1 = "INSERT INTO faculty_research_project(facJntuId,proName,proTeam,proDuration,proFunding,proSanctioned) VALUES ('$facJntuId','$proName','$proTeam','$proDuration','$proFunding','$proSanctioned')";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../faculty-add_rpro.php");
    }
    else
    {
        echo "updation failed";
        header("location:../faculty-add_rpro.php");
    }

    $connect->close();

?>