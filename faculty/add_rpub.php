<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $facJntuId = $_SESSION['fid'];

    $resTitle = $_POST["resTitle"];

    $resJournal = $_POST["resJournal"];

    $resVol = $_POST["resVol"];

    $resIssue = $_POST["resIssue"];
    
    $resDate = $_POST["resDate"];

    $resIssn = $_POST["resIssn"];

    $qry1 = "INSERT INTO faculty_research_publications (facJntuId,resTitle,resJournal,resVol,resIssue,resDate,resIssn) VALUES ('$facJntuId','$resTitle','$resJournal','$resVol','$resIssue','$resDate','$resIssn')";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../faculty-add_rpub.php");
    }
    else
    {
        echo "updation failed";
        header("location:../faculty-add_rpub.php");
    }

    $connect->close();

?>