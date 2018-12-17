<?php
    $output='';
    include('../connection.php');
    ini_set('max_execution_time',1000000);

    echo $branch = $_POST["branch"];
    echo $type = $_POST["type"];
    echo $year = $_POST["year"];
    echo $sem = $_POST["sem"];
    echo $batch = (int)$_POST["batch"];
    echo $bat = $_POST["batch"];

    $extension = end(explode(".", $_FILES["excelfile"]["name"])); // For getting Extension of selected file
    $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
    if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
    {
        $file = $_FILES["excelfile"]["tmp_name"]; // getting temporary source of excel file
        include("../PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
        $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() methoand in load method define path of selected file
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
        {
            $highestRow = $worksheet->getHighestRow();
            for($row=2; $row<=$highestRow; $row++)
            {
                $htno = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                $sub_code = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $sub_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());

                if($batch <= 15)
                {
                    $internal = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                    $external = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                    $total = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                    $credits = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());


                    $patt = substr($htno, 0, 2);

                    $x = (int)$patt;

                    $sql = "SELECT * FROM student_details WHERE htno = '$htno' AND batch = '$bat' AND branch = '$branch'";

                    $result = $connect->query($sql);


                    if($result->num_rows > 0){
                        //echo $htno."<br>";
                        $type = $_POST["type"];
                    }else{
                        $type = 1;
                    }

                    if($sub_name != "" && $sub_name != "Subject Name"){
                      $qry1 = "INSERT INTO 15_results (htno, subj_code, subj_name, internal, external, total, credits, branch, year, sem, type, batch) VALUES ('$htno','$sub_code','$sub_name','$internal','$external','$total','$credits','$branch','$year','$sem','$type','$bat')";
                      $res1 = mysqli_query($connect,$qry1);
                    }
                }
                if($batch >= 16)
                {
                    $grade = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                    $grade_points = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());

                    $patt = substr($htno, 0, 2);

                    $x = (int)$patt;

                    $sql = "SELECT * FROM student_details WHERE htno = '$htno' AND batch = '$bat' AND branch = '$branch'";

                    $result = $connect->query($sql);


                    if($result->num_rows > 0){
                        //echo $htno."<br>";
                        $type = $_POST["type"];
                    }else{
                        $type = 1;
                    }


                    if($sub_name != "" && $sub_name != "Subject Name"){
                      $qry1 = "INSERT INTO 16_results (htno, subj_code, subj_name, grade, grade_points, branch, year, sem, type, batch) VALUES ('$htno','$sub_code','$sub_name','$grade','$grade_points','$branch','$year','$sem','$type'.'$bat')";
                      $res1 = mysqli_query($connect,$qry1);
                    }
                }
            }
        }

        if($res1)
        {
            echo "Your file Uploaded Successfull";
            header("location:../admin-upload_results.php?ack=1");
        }
        else
        {
            echo "Your file Uploaded Failed";
            header("location:../admin-upload_results.php?ack=0");
        }

    }//end of if statement [if it is an excel file]
    else
    {
        $output.= '<label class="text-danger">Invalid File</label>'; //if non excel file then
    }

    $connect->close();


?>
