<?php
include('../connection.php');
  if(isset($_POST['forward'])){
    echo $table_name = $_POST['tableName'];
    echo $leave_id = $_POST['leave_id'];
    echo $remarks = $_POST['remark'];
    $q=mysqli_query($connect,"update $table_name set dean_status='APPROVED', dean_remarks = '$remarks'  where leave_id='$leave_id'");
    header("Location:../dean-view_leaves.php");
  }
  if(isset($_POST['reject'])){
    echo $table_name = $_POST['tableName'];
    echo $leave_id = $_POST['leave_id'];
    echo $remarks = $_POST['remark'];
    $q=mysqli_query($connect,"update $table_name set dean_status='REJECTED', principal_status='REJECTED', dean_remarks='$remarks' where leave_id='$leave_id'");
    header("Location:../dean-view_leaves.php");
  }

?>
