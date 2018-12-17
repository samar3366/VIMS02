<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $facJntuId = $_POST["facJntuId"];

    $sql = "SELECT * FROM facacademic WHERE facJntuId='$facJntuId';";
    $result = $connect->query($sql);
    $row = mysqli_fetch_assoc($result);

    if($_POST["phdUniv"] == ""){
        $phdUniv = $row["phdUniv"];
    }else{
        $phdUniv = $_POST["phdUniv"];
    }

    if($_POST["phdInst"] == ""){
        $phdInst = $row["phdInst"];
    }else{
        $phdInst = $_POST["phdInst"];
    }
    
    if($_POST["phdYear"] == ""){
        $phdYear = $row["phdYear"];
    }else{
        $phdYear = $_POST["phdYear"];
    }
    if($_POST["phdPer"] == ""){
        $phdPer = $row["phdPer"];
    }else{
        $phdPer = $_POST["phdPer"];
    }
    if($_POST["pgUniv"] == ""){
        $pgUniv = $row["pgUniv"];
    }else{
        $pgUniv = $_POST["pgUniv"];
    }
    if($_POST["pgInst"] == ""){
        $pgInst = $row["pgInst"];
    }else{
        $pgInst = $_POST['pgInst'];
    }
    if($_POST["pgYear"] == ""){
        $pgYear = $row["pgYear"];
    }else{
        $pgYear = $_POST["pgYear"];
    }
    if($_POST["pgPer"] == ""){
        $pgPer = $row["pgPer"];
    }else{
        $pgPer = $_POST["pgPer"];
    }
    if($_POST["ugUniv"] == ""){
        $ugUniv = $row["ugUniv"];
    }else{
        $ugUniv = $_POST["ugUniv"];
    }
    if($_POST["ugInst"] == ""){
        $ugInst = $row["ugInst"];
    }else{
        $ugInst = $_POST["ugInst"];
    }
    if($_POST["ugYear"] == ""){
        $ugYear = $row["ugYear"];
    }else{
        $ugYear = $_POST["ugYear"];
    }
    if($_POST["ugPer"] == ""){
        $ugPer = $row["ugPer"];
    }else{
        $ugPer = $_POST["ugPer"];
    }
    if($_POST["intUniv"] == ""){
        $intUniv = $row["intUniv"];
    }else{
        $intUniv = $_POST["intUniv"];
    }
    if($_POST["intInst"] == ""){
        $intInst = $row["intInst"];
    }else{
        $intInst = $_POST["intInst"];
    }
    if($_POST["intYear"] == ""){
        $intYear = $row["intYear"];
    }else{
        $intYear = $_POST["intYear"];
    }
    if($_POST["intPer"] == ""){
        $intPer = $row["intPer"];
    }else{
        $intPer = $_POST["intPer"];
    }    
    if($_POST["sscUniv"] == ""){
        $sscUniv = $row["sscUniv"];
    }else{
        $sscUniv = $_POST["sscUniv"];
    }
    if($_POST["sscInst"] == ""){
        $sscInst = $row["sscInst"];
    }else{
        $sscInst = $_POST["sscInst"];
    }
    if($_POST["sscYear"] == ""){
        $sscYear = $row["sscYear"];
    }else{
        $sscYear = $_POST["sscYear"];
    }
    if($_POST["sscPer"] == ""){
        $sscPer = $row["sscPer"];
    }else{
        $sscPer = $_POST["sscPer"];
    }      
    
    
    

    //echo $name,",",$htno,",",$batch,",",$branch,",",$section,",",$number,",",$mail;

    $qry1 = "UPDATE facacademic SET phdUniv = '$phdUniv', phdInst = '$phdInst', phdYear = '$phdYear', phdPer = '$phdPer',pgUniv = '$pgUniv', pgInst = '$pgInst', pgYear = '$pgYear', pgPer = '$pgPer',ugUniv = '$ugUniv', ugInst = '$ugInst', ugYear = '$ugYear', ugPer = '$ugPer',intUniv = '$intUniv', intInst = '$intInst', intYear = '$intYear', intPer = '$intPer',sscUniv = '$sscUniv', sscInst = '$sscInst', sscYear = '$sscYear', sscPer = '$sscPer'  WHERE facJntuId = '$facJntuId';";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../faculty-edit_ad.php");
    }
    else
    {
        echo "updation failed";
//        header("location:../faculty-edit_ad.php");
        mysqli_error($connect);
    }

    $connect->close();

?>