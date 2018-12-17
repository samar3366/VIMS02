<?php
session_start();
include('../connection.php');
$lid=$_GET['id'];
$flt=mysqli_query($connect,"select * from facleave where leave_id='$lid'");
$rowflt=mysqli_fetch_assoc($flt);
 $facid=$rowflt['facJntuId'];
 $type=$rowflt['leave_type'];
switch($type){
    case "Casual Leave"   : $date=$rowflt['fdate'];
							$time=strtotime($date);
							$month=date("m",$time);
    						if($month<=6)
    						{
    							$ft=mysqli_query($connect,"select countcl1 from faculty where facJntuId='$facid'");
    							$rowft=mysqli_fetch_assoc($ft);
                            	$remLeave=$rowft['countcl1'];
                            	 $nodays=$rowflt['ndays'];
                            	 $rem=$remLeave-$nodays;
                            	$q1=mysqli_query($connect,"update faculty set countcl1='$rem' where facJntuId='$facid'");

                            $q=mysqli_query($connect,"update facleave set status='Approved' where leave_id='$lid'");
                            header("Location:../hod-view_leaves.php");
                           }
                           else
                           {
                                $ft=mysqli_query($connect,"select countcl2 from faculty where facJntuId='$facid'");
                                $rowft=mysqli_fetch_assoc($ft);
                                $remLeave=$rowft['countcl2'];
                                 $nodays=$rowflt['ndays'];
                                 $rem=$remLeave-$nodays;
                                $q1=mysqli_query($connect,"update faculty set countcl2='$rem' where facJntuId='$facid'");

                            $q=mysqli_query($connect,"update facleave set status='Approved' where leave_id='$lid'");
                            header("Location:../hod-view_leaves.php");
                           }
                           break;
    case "Academic Leave"   : $ft=mysqli_query($connect,"select countal from faculty where facJntuId='$facid'");
                                $rowft=mysqli_fetch_assoc($ft);
                                $remLeave=$rowft['countal'];
                                 $nodays=$rowflt['ndays'];
                                 $rem=$remLeave-$nodays;
                                $q1=mysqli_query($connect,"update faculty set countal='$rem' where facJntuId='$facid'");

                            $q=mysqli_query($connect,"update facleave set status='Approved' where leave_id='$lid'");
                            header("Location:../hod-view_leaves.php");
                            break;

    case "Medical Leave"   : $ft=mysqli_query($connect,"select countml from faculty where facJntuId='$facid'");
                                $rowft=mysqli_fetch_assoc($ft);
                                $remLeave=$rowft['countml'];
                                 $nodays=$rowflt['ndays'];
                                 $rem=$remLeave-$nodays;
                                $q1=mysqli_query($connect,"update faculty set countml='$rem' where facJntuId='$facid'");

                            $q=mysqli_query($connect,"update facleave set status='Approved' where leave_id='$lid'");
                            header("Location:../hod-view_leaves.php");
                            break;
    case "lop"   : $ft=mysqli_query($connect,"select countlop from faculty where facJntuId='$facid'");
                                $rowft=mysqli_fetch_assoc($ft);
                                $remLeave=$rowft['countlop'];
                                 $nodays=$rowflt['ndays'];
                                 $rem=$remLeave+$nodays;
                                $q1=mysqli_query($connect,"update faculty set countlop='$rem' where facJntuId='$facid'");

                            $q=mysqli_query($connect,"update facleave set status='Approved' where leave_id='$lid'");
                            header("Location:../hod-view_leaves.php");
                            break;
    case "appccl"   : $ft=mysqli_query($connect,"select countccl from faculty where facJntuId='$facid'");
                                $rowft=mysqli_fetch_assoc($ft);
                                $remLeave=$rowft['countccl'];
                                 $nodays=$rowflt['ndays'];
                                 $rem=$remLeave-$nodays;
                                $q1=mysqli_query($connect,"update faculty set countccl='$rem' where facJntuId='$facid'");

                            $q=mysqli_query($connect,"update facleave set status='Approved' where leave_id='$lid'");
                            header("Location:../hod-view_leaves.php");
                            break;
    case "reqccl"   : $ft=mysqli_query($connect,"select countccl from faculty where facJntuId='$facid'");
                                $rowft=mysqli_fetch_assoc($ft);
                                $remLeave=$rowft['countccl'];
                                 $nodays=$rowflt['ndays'];
                                 $rem=$remLeave+$nodays;
                                $q1=mysqli_query($connect,"update faculty set countccl='$rem' where facJntuId='$facid'");

                            $q=mysqli_query($connect,"update facleave set status='Approved' where leave_id='$lid'");
                            header("Location:../hod-view_leaves.php");
                            break;

}
?>
