<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $facJntuId = $_POST["facJntuId"];
    $pass = $_POST["pass"];

    if($facJntuId=="" || $pass==""){
       
        header("Location:../faculty-login.php?ack=1");;
    }

    else{
        
        $sql = "SELECT * FROM faculty_auth WHERE facJntuId='$facJntuId' AND pass='$pass';";

        $result = $connect->query($sql);


        $row = mysqli_fetch_assoc($result);//stores the row values where admin_id = $id
        
        if(!isset($row['facJntuId'])){
        
            //header("Location:../../admin-login.php");
            header("Location:../faculty-login.php?ack=0");
        }
        else{
            $_SESSION["fid"] = $row['facJntuId'];
            
            $sid = session_id();
            
            echo $sid;
            
            $id = "id";
            
            setcookie($id, $sid, 2147483647,'/');
            
            echo $_COOKIE[$id];
            


            header("Location:../admin.php");
            //echo $_SESSION["id"];
            
        }
    }

    $connect->close();

?>