<?php
include('../connection.php');
  if(isset($_POST['forward'])){
    echo $table_name = $_POST['tableName'];
    echo $leave_id = $_POST['leave_id'];
    echo $remarks = $_POST['remark'];
    if($table_name == 'leavescl'){
      $q=mysqli_query($connect,"update $table_name set hod_status='APPROVED', dean_status='APPROVED', principal_status='APPROVED', hod_remarks='$remarks' where leave_id='$leave_id'");
      echo "$table_name";
      header("Location:../hod-view-leaves2.php");
    }else{
      $q=mysqli_query($connect,"update $table_name set hod_status='APPROVED' where leave_id='$leave_id'");
      header("Location:../hod-view-leaves2.php");
    }

  }
  if(isset($_POST['reject'])){
    echo $table_name = $_POST['tableName'];
    echo $leave_id = $_POST['leave_id'];
    echo $remarks = $_POST['remark'];
    $q=mysqli_query($connect,"update $table_name set hod_status='REJECTED', dean_status='REJECTED', principal_status='REJECTED', hod_remarks='$remarks' where leave_id='$leave_id'");
    header("Location:../hod-view-leaves2.php");
  }

?>
