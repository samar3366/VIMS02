<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $htno = $_POST["htno"];

    $sql = "SELECT * FROM student_info WHERE htno='$htno';";
    $result = $connect->query($sql);
    $row = mysqli_fetch_assoc($result);

    if($_POST["full_name"] == ""){
        $full_name = $row["full_name"];
    }else{
        $full_name = $_POST["full_name"];
    }

    if($_POST["gender"] == ""){
        $gender = $row["gender"];
    }else{
        $gender = $_POST["gender"];
    }
    
    if($_POST["father_name"] == ""){
        $father_name = $row["father_name"];
    }else{
        $father_name = $_POST["father_name"];
    }
    if($_POST["mother_name"] == ""){
        $mother_name = $row["mother_name"];
    }else{
        $mother_name = $_POST["mother_name"];
    }
    if($_POST["dob"] == ""){
        $dob = $row["dob"];
    }else{
        $dob = $_POST["dob"];
    }
    if($_POST["mother_tongue"] == ""){
        $mother_tongue = $row["mother_tongue"];
    }else{
        $mother_tongue = $_POST["mother_tongue"];
    }
    if($_POST["aadhar_no"] == ""){
        $aadhar_no = $row["aadhar_no"];
    }else{
        $aadhar_no = $_POST["aadhar_no"];
    }
    
    
    
    

    echo $name,",",$htno,",",$batch,",",$branch,",",$section,",",$number,",",$mail;

    $qry1 = "UPDATE student_info SET full_name = '$full_name', gender = '$gender', father_name = '$father_name', mother_name = '$mother_name', dob = '$dob', mother_tongue = '$mother_tongue', aadhar_no = '$aadhar_no' WHERE htno = '$htno';";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../admin-edit_student_personal_details.php");
    }
    else
    {
        echo "updation failed";
        header("location:../admin-edit_student_personal_details.php");
    }

    $connect->close();

?>