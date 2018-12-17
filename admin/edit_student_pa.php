<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $htno = $_POST["htno"];

    $sql = "SELECT * FROM student_info WHERE htno='$htno';";
    $result = $connect->query($sql);
    $row = mysqli_fetch_assoc($result);

    if($_POST["ssc_institute"] == ""){
        $ssc_institute = $row["ssc_institute"];
    }else{
        $ssc_institute = $_POST["ssc_institute"];
    }

    if($_POST["ssc_percentage"] == ""){
        $ssc_percentage = $row["ssc_percentage"];
    }else{
        $ssc_percentage = $_POST["ssc_percentage"];
    }
    
    if($_POST["inter_institute"] == ""){
        $inter_institute = $row["inter_institute"];
    }else{
        $inter_institute = $_POST["inter_institute"];
    }
    if($_POST["inter_percentage"] == ""){
        $inter_percentage = $row["inter_percentage"];
    }else{
        $inter_percentage = $_POST["inter_percentage"];
    }
    if($_POST["eamcet_rank"] == ""){
        $eamcet_rank = $row["eamcet_rank"];
    }else{
        $eamcet_rank = $_POST["eamcet_rank"];
    }
    
    
    

    echo $name,",",$htno,",",$batch,",",$branch,",",$section,",",$number,",",$mail;

    $qry1 = "UPDATE student_info SET ssc_institute = '$ssc_institute', ssc_percentage = '$ssc_percentage', inter_institute = '$inter_institute', inter_percentage = '$inter_percentage', eamcet_rank = '$eamcet_rank' WHERE htno = '$htno';";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../admin-edit_student_past_academics.php");
    }
    else
    {
        echo "updation failed";
        header("location:../admin-edit_student_past_academics.php");
    }

    $connect->close();

?>