<?php

    include('../connection.php');//use $connect for making use of mysqli


    use Box\Spout\Reader\ReaderFactory;
    use Box\Spout\Common\Type;

    require_once ('../Spout/Autoloader/autoload.php');



    if(!empty($_FILES['excelfile']['name']))
    {
        // Get File extension eg. 'xlsx' to check file is excel sheet
        $pathinfo = pathinfo($_FILES['excelfile']['name']);

        // check file has extension xlsx, xls and also check
        // file is not empty
        if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls')&& $_FILES['excelfile']['size'] > 0 )
        {
            $file = $_FILES['excelfile']['tmp_name'];

            // Read excel file by using ReadFactory object.
            $reader = ReaderFactory::create(Type::XLSX);

            // Open file
            $reader->open($file);
            $count = 0;

            // Number of sheet in excel file
            foreach ($reader->getSheetIterator() as $sheet)
            {

                // Number of Rows in Excel sheet
                foreach ($sheet->getRowIterator() as $row)
                {

                    // It reads data after header. In the my excel sheet,
                    // header is in the first row.
                    if ($count > 0) {

                        // Data of excel sheet
                        $htno = $row[0];
                        $full_name = $row[1];
                        $gender = $row[2];
                        $father_name = $row[3];
                        $mother_name = $row[4];
                        $dob = $row[5];
                        $mother_tongue = $row[6];
                        $aadhar_no = $row[7];
                        $father_no = $row[8];
                        $father_mail = $row[9];
                        $mother_no = $row[10];
                        $mother_mail = $row[11];
                        $address = $row[12];
                        $ssc_institute = $row[13];
                        $ssc_percentage = $row[14];
                        $inter_institute = $row[15];
                        $inter_percentage = $row[16];
                        $eamcet_rank = $row[17];

                        //echo $row[0],",",$row[1],",",$row[2],",",$row[3],",",$row[4],",",$row[5],",",$row[6],",",$row[7],",",$row[8],",",$row[9],",",$row[10],",",$row[11],"<br>";

                        //echo $name.",".$mobile."\n";
                        //Here, You can insert data into database.
                        $qry1 = "INSERT INTO student_info (htno, full_name, gender, father_name, mother_name, dob, mother_tongue, aadhar_no, father_no, father_mail, mother_no, mother_mail, address, ssc_institute, ssc_percentage, inter_institute, inter_percentage, eamcet_rank) VALUES ('$htno','$full_name','$gender','$father_name','$mother_name','$dob','$mother_tongue', '$aadhar_no', '$father_no', '$father_mail', '$mother_no', '$mother_mail', '$address', '$ssc_institute', '$ssc_percentage', '$inter_institute', '$inter_percentage', '$eamcet_rank')";
                        $res1 = mysqli_query($connect,$qry1);


                    }
                    $count++;
                }
            }

            if($res1)
            {
                echo "Your file Uploaded Successfull";
                header("location:../admin-add_student_details.php?ack=1");
            }
            else
            {
                echo "Your file Uploaded Failed";
                header("location:../admin-add_student_details.php?ack=0");
            }

            // Close excel file
            $reader->close();
        }
        else
        {
            echo "Please Choose only Excel file";
        }
    }
    else
    {
        echo "File is Empty"."<br>";
        echo "Please Choose Excel file";
    }



    $connect->close();

?>
