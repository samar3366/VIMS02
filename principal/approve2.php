<?php
include('../connection.php');
  if(isset($_POST['forward'])){
    echo $table_name = $_POST['tableName'];
    echo $leave_id = $_POST['leave_id'];
    $q=mysqli_query($connect,"update $table_name set principal_status='APPROVED' where leave_id='$leave_id'");
    header("Location:../principal-view_leaves.php");
  }
  if(isset($_POST['reject'])){
    echo $table_name = $_POST['tableName'];
    echo $leave_id = $_POST['leave_id'];
    echo $remarks = $_POST['remark'];
    if($remarks == ""){
      header("Location:../principal-view_leaves.php?ack=0");
    }
    $q=mysqli_query($connect,"update $table_name set hod_status='REJECTED', dean_status='REJECTED', principal_status='REJECTED', hod_remarks='$remarks', dean_remarks='$remarks', principal_remarks='$remarks' where leave_id='$leave_id'");
    header("Location:../principal-view_leaves.php");
  }

?>
