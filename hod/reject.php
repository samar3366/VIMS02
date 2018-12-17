<?php

session_start();
include('../connection.php');
$lid=$_GET['id'];?>

<?php
//$reason = $_POST["reason"];
$sql="update facleave set status='Rejected' where leave_id='$lid' ";
$query=mysqli_query($connect,$sql);
if($query===TRUE){
    header("Location:../hod-view_leaves.php");
}else{
    header("Location:../hod-view_leaves.php");
}
?>
