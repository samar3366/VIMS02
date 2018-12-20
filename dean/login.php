<?php

    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $id = $_POST["id"];
    $pass = $_POST["pass"];

    if($id=="" || $pass==""){

        header("Location:../dean-login.php?ack=1");;
    }

    else{

        $sql = "SELECT * FROM dean WHERE did='$id' AND pass='$pass';";

        $result = $connect->query($sql);


        $row = mysqli_fetch_assoc($result);//stores the row values where admin_id = $id

        if(!isset($row['did'])){

            //header("Location:../../admin-login.php");
            header("Location:../dean-login.php?ack=0");
        }
        else{
            $_SESSION["did"] = $row['did'];

            $sid = session_id();

            echo $sid;

            $id = "id";

            setcookie($id, $sid, 2147483647,'/');

            echo $_COOKIE[$id];



            header("Location:../dean.php");
            //echo $_SESSION["id"];

        }
    }

    $connect->close();

?>
