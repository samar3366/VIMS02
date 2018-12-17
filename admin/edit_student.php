<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $htno = $_POST["htno"];

    $sql = "SELECT * FROM student_details WHERE htno='$htno';";
    $result = $connect->query($sql);
    $row = mysqli_fetch_assoc($result);

    if($_POST["name"] == ""){
        $name = $row["name"];
    }else{
        $name = $_POST["name"];
    }

    if($_POST["batch"] == ""){
        $batch = $row["batch"];
    }else{
        $batch = $_POST["batch"];
    }
    
    if($_POST["branch"] == ""){
        $branch = $row["branch"];
    }else{
        $branch = $_POST["branch"];
    }
    if($_POST["section"] == ""){
        $section = $row["section"];
    }else{
        $section = $_POST["section"];
    }
    if($_POST["number"] == ""){
        $number = $row["number"];
    }else{
        $number = $_POST["number"];
    }
    if($_POST["mail"] == ""){
        $mail = $row["mail"];
    }else{
        $mail = $_POST["mail"];
    }
    
    
    
    

    echo $name,",",$htno,",",$batch,",",$branch,",",$section,",",$number,",",$mail;

    $qry1 = "UPDATE student_details SET name = '$name', batch = '$batch', branch = '$branch', section = '$section', number = '$number', mail = '$mail' WHERE htno = '$htno';";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../admin-edit_student.php");
    }
    else
    {
        echo "updation failed";
        header("location:../admin-edit_student.php");
    }

    $connect->close();

?>