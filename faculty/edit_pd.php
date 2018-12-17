<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $facJntuId = $_POST["facJntuId"];

    $sql = "SELECT * FROM faculty WHERE facJntuId='$facJntuId';";
    $result = $connect->query($sql);
    $row = mysqli_fetch_assoc($result);

    if($_POST["facAicteId"] == ""){
        $facAicteId = $row["facAicteId"];
    }else{
        $facAicteId = $_POST["facAicteId"];
    }

    if($_POST["facAadhar"] == ""){
        $facAadhar = $row["facAadhar"];
    }else{
        $facAadhar = $_POST["facAadhar"];
    }
    
    if($_POST["facPan"] == ""){
        $facPan = $row["facPan"];
    }else{
        $facPan = $_POST["facPan"];
    }
    if($_POST["facPassport"] == ""){
        $facPassport = $row["facPassport"];
    }else{
        $facPassport = $_POST["facPassport"];
    }
    if($_POST["facVoter"] == ""){
        $facVoter = $row["facVoter"];
    }else{
        $facVoter = $_POST["facVoter"];
    }
    if($_POST["facDob"] == ""){
        $facDob = $row["facDob"];
    }else{
        $facDob = $_POST['facDob'];
    }
    if($_POST["facDoj"] == ""){
        $facDoj = $row["facDoj"];
    }else{
        $facDoj = $_POST['facDoj'];
    }
    if($_POST["facGen"] == ""){
        $facGen = $row["facGen"];
    }else{
        $facGen = $_POST["facGen"];
    }
    if($_POST["facBg"] == ""){
        $facBg = $row["facBg"];
    }else{
        $facBg = $_POST["facBg"];
    }
    if($_POST["facMartial"] == ""){
        $facMartial = $row["facMartial"];
    }else{
        $facMartial = $_POST["facMartial"];
    }
    if($_POST["facMobile"] == ""){
        $facMobile = $row["facMobile"];
    }else{
        $facMobile = $_POST["facMobile"];
    }
    if($_POST["facEmail"] == ""){
        $facEmail = $row["facEmail"];
    }else{
        $facEmail = $_POST["facEmail"];
    }
    if($_POST["facTempAdd"] == ""){
        $facTempAdd = $row["facTempAdd"];
    }else{
        $facTempAdd = $_POST["facTempAdd"];
    }
    if($_POST["facMartial"] == ""){
        $facPerAdd = $row["facPerAdd"];
    }else{
        $facPerAdd = $_POST["facPerAdd"];
    }
    
    
    
    

    //echo $name,",",$htno,",",$batch,",",$branch,",",$section,",",$number,",",$mail;

    $qry1 = "UPDATE faculty SET facAicteId = '$facAicteId', facAadhar = '$facAadhar', facPan = '$facPan', facPassport = '$facPassport', facVoter = '$facVoter', facDob = '$facDob',facDoj = '$facDoj', facGen = '$facGen', facBg = '$facBg', facMartial = '$facMartial', facMobile = '$facMobile', facEmail = '$facEmail', facTempAdd = '$facTempAdd', facPerAdd = '$facPerAdd' WHERE facJntuId = '$facJntuId';";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../faculty-edit_pd.php");
    }
    else
    {
        echo "updation failed";
        header("location:../faculty-edit_pd.php");
    }

    $connect->close();

?>