<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $htno = $_POST["htno"];
    $pass = $_POST["pass"];

    if($htno=="" || $pass==""){
       
        header("Location:../student-login.php?ack=1");;
    }

    else{
        
        $sql = "SELECT * FROM student_auth WHERE htno='$htno' AND pass='$pass';";

        $result = $connect->query($sql);


        $row = mysqli_fetch_assoc($result);//stores the row values where admin_id = $id
        
        if(!isset($row['htno'])){
        
            //header("Location:../../admin-login.php");
            header("Location:../student-login.php?ack=0");
        }
        else{
            $_SESSION["htno"] = $row['htno'];
            
            $sid = session_id();
            
            echo $sid;
            
            $id = "id";
            
            setcookie($id, $sid, 2147483647,'/');
            
            echo $_COOKIE[$id];
            


            header("Location:../student.php");
            //echo $_SESSION["id"];
            
        }
    }

    $connect->close();

?>