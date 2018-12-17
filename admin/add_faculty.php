<?php

    include('../connection.php');//use $connect for making use of mysqli
           

    

            $facJntuId = $_POST["facJntuId"];
            $facName = $_POST["facName"];
            $facEmail = $_POST["facEmail"];
            $facMobile = $_POST["facMobile"];
            $facDesig = $_POST["facDesig"];
            $facDept = $_POST["facDept"];

                        //echo $name.",".$mobile."\n";
                        //Here, You can insert data into database.
            $qry1 = "INSERT INTO faculty (facJntuId, facName, facDesig, facDept, facEmail, facMobile,countcl1,countcl2,countccl,countal,countml,lop)VALUES ('$facJntuId','$facName','$facDesig','$facDept','$facEmail','$facMobile',6,6,0,6,6,0)";
            $res1 = mysqli_query($connect,$qry1);
                        
            $qry2 = "INSERT INTO faculty_auth (facJntuId, pass) VALUES ('$facJntuId','$facJntuId')";
            $res2 = mysqli_query($connect,$qry2);

            $qry3 = "INSERT INTO facacademic (facJntuId) VALUES ('$facJntuId')";
            $res3 = mysqli_query($connect,$qry3);

            if($res3)
            {
                echo "Your file Uploaded Successfull";
                header("location:../admin-add_faculty.php?ack=1");
            }
            else
            {
                echo "Your file Uploaded Failed";
                header("location:../admin-add_faculty.php?ack=0");
            }


    

    $connect->close();

?>