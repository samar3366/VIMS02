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
                        $name = $row[1];
                        $batch = $row[2];
                        $branch = $row[3];
                        $section = $row[4];
                        $number = $row[5];
                        $mail = $row[6];

                        if($htno != ""){
                          //echo $name.",".$mobile."\n";
                          //Here, You can insert data into database.
                          $qry1 = "INSERT INTO student_details (htno, name, batch, branch, section, number, mail) VALUES ('$htno','$name','$batch','$branch','$section','$number','$mail')";
                          $res1 = mysqli_query($connect,$qry1);

                          $qry2 = "INSERT INTO student_auth (htno, pass) VALUES ('$htno','$htno')";
                          $res2 = mysqli_query($connect,$qry2);
                        }
                    }
                    $count++;
                }
            }

            if($res2)
            {
                echo "Your file Uploaded Successfull";
                header("location:../admin-add_student.php?ack=1");
            }
            else
            {
                echo "Your file Uploaded Failed";
                header("location:../admin-add_student.php?ack=0");
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
