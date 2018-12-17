<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $htno = $_POST["htno"];

    $sql = "SELECT * FROM student_info WHERE htno='$htno';";
    $result = $connect->query($sql);
    $row = mysqli_fetch_assoc($result);

    if($_POST["father_no"] == ""){
        $father_no = $row["father_no"];
    }else{
        $father_no = $_POST["father_no"];
    }

    if($_POST["father_mail"] == ""){
        $father_mail = $row["father_mail"];
    }else{
        $father_mail = $_POST["father_mail"];
    }
    
    if($_POST["mother_no"] == ""){
        $mother_no = $row["mother_no"];
    }else{
        $mother_no = $_POST["mother_no"];
    }
    if($_POST["mother_mail"] == ""){
        $mother_mail = $row["mother_mail"];
    }else{
        $mother_mail = $_POST["mother_mail"];
    }
    if($_POST["address"] == ""){
        $address = $row["address"];
    }else{
        $address = $_POST["address"];
    }
    
    
    

    echo $name,",",$htno,",",$batch,",",$branch,",",$section,",",$number,",",$mail;

    $qry1 = "UPDATE student_info SET father_no = '$father_no', father_mail = '$father_mail', mother_no = '$mother_no', mother_mail = '$mother_mail', address = '$address' WHERE htno = '$htno';";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../admin-edit_student_contact_details.php");
    }
    else
    {
        echo "updation failed";
        header("location:../admin-edit_student_contact_details.php");
    }

    $connect->close();

?>