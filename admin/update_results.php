<?php
        
    
    include('../connection.php');

    ini_set('max_execution_time',1000000);
    $batch = (int)$_POST["batch"];
    $type = $_POST["type"];

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
                $subj_code = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $subj_name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
         
                if($batch <= 15)
                {
                    $internal = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                    $external = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                    $total = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                    $credits = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                            
                    $qry1 = "UPDATE 15_results SET internal=$internal,external=$external,total=$total,credits=$credits WHERE htno='$htno' AND subj_code='$subj_code' AND subj_name='$subj_name' AND type=$type";
                    $res1 = mysqli_query($connect,$qry1);
                    
                    //echo "test sucess";
                }
                if($batch >= 16)
                {
                    $grade = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                    $grade_points = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                            
                   
                            
                    $qry1 = "UPDATE `16_results` SET `grade`=$grade,`grade_points`=$grade_points WHERE htno='$htno' AND subj_code='$subj_code' AND subj_name='$subj_name' AND type=$type";
                    $res1 = mysqli_query($connect,$qry1);
                }
            

            
         //if query executed successfully
            }//for
        }//for
          
        if($res1)
        {
            echo "Your file Uploaded Successfull";
            header("location:../admin-update_revaluation.php?ack=1");
        }
        else
        {
            echo "Your file Uploaded Failed";
            header("location:../admin-update_revaluation.php?ack=0");
        }

    }//end of if statement [if it is an excel file]
    else
    {
        $output.= '<label class="text-danger">Invalid File</label>'; //if non excel file then
    }

    $connect->close();

?>