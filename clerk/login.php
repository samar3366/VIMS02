<?php

    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $id = $_POST["id"];
    $pass = $_POST["pass"];

    if($id=="" || $pass==""){

        header("Location:../clerk-login.php?ack=1");;
    }

    else{

        $sql = "SELECT * FROM clerk WHERE cid='$id' AND pass='$pass';";

        $result = $connect->query($sql);


        $row = mysqli_fetch_assoc($result);//stores the row values where admin_id = $id

        if(!isset($row['cid'])){

            //header("Location:../../admin-login.php");
            header("Location:../clerk-login.php?ack=0");
        }
        else{
            $_SESSION["cid"] = $row['cid'];

            $cid = session_id();

            echo $cid;

            $id = "id";

            setcookie($id, $cid, 2147483647,'/');

            echo $_COOKIE[$id];



            header("Location:../clerk.php");
            //echo $_SESSION["id"];

        }
    }

    $connect->close();

?>
