<?php
    
    include('../connection.php');//use $connect for making use of mysqli

    session_start();

    $facJntuId = $_SESSION['fid'];

    $bookTitle = $_POST["bookTitle"];

    $bookPublisher = $_POST["bookPublisher"];

    $bookEdition = $_POST["bookEdition"];

    $bookYear = $_POST["bookYear"];

    $bookIsbn = $_POST["bookIsbn"];

    $qry1 = "INSERT INTO faculty_books_published (facJntuId,bookTitle,bookPublisher,bookEdition,bookYear,bookIsbn) VALUES ('$facJntuId','$bookTitle','$bookPublisher','$bookEdition','$bookYear','$bookYear')";
    $res1 = mysqli_query($connect,$qry1);
    if($res1)
    {
        echo "updation success";
        header("location:../faculty-add_bpub.php");
    }
    else
    {
        echo "updation failed";
        header("location:../faculty-add_bpub.php");
    }

    $connect->close();

?>