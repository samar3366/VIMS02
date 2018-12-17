<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $facJntuId = $_SESSION['fid'];

    $docUniv = $_POST["docUniv"];

    $docSchName = $_POST["docSchName"];

    $docThesis = $_POST["docThesis"];

    $docSpec = $_POST["docSpec"];

    $docStatus = $_POST["docStatus"];

    $docYear = $_POST["docYear"];

    //echo $name,",",$htno,",",$batch,",",$branch,",",$section,",",$number,",",$mail;

    $qry1 = "INSERT INTO faculty_doctorial (facJntuId,docUniv,docSchName,docThesis,docSpec,docStatus,docYear) VALUES ('$facJntuId','$docUniv','$docSchName','$docThesis','$docSpec','$docStatus','$docYear')";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../faculty-add_doc.php");
    }
    else
    {
        echo "updation failed";
        header("location:../faculty-add_doc.php");
    }

    $connect->close();

?>