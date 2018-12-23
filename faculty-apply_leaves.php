<?php
    $facJntuId=$dept='';
    if(isset($_COOKIE['id']))
    {
        session_id($_COOKIE['id']);
    }

    session_start();

    if($_SESSION['fid'] == null){
        header("Location:faculty-login.php");
    }
    $facJntuId=$_SESSION['fid'];
    include('connection.php');
?>
<?php
    $year = date("Y");

    $a=array();
    $fid = $_SESSION['fid'];

    $academics=0;$casual1=0;$casual2=0;$medical=0;$lop=0;$reqccl=0;$appccl=0;

    $sql = "SELECT leave_type,ndays,EXTRACT(MONTH FROM fdate) as month FROM facleave WHERE YEAR(fdate)=$year AND NOT status='Rejected' AND facJntuId='$fid'";

    $result = mysqli_query($connect,$sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

            if($row["leave_type"] == "Academic Leave"){
                $academics+=$row["ndays"];
            }
            if($row["leave_type"] == "Casual Leave" && $row["month"] <= 6){
                $casual1+=$row["ndays"];
            }
            if($row["leave_type"] == "Casual Leave" && $row["month"] > 6){
                $casual2+=$row["ndays"];
            }
            if($row["leave_type"] == "Medical Leave"){
                $medical+=$row["ndays"];
            }
            if($row["leave_type"] == "lop"){
                $lop+=$row["ndays"];
            }
            if($row["leave_type"] == "reqccl"){
                $reqccl+=$row["ndays"];
            }
            if($row["leave_type"] == "appccl"){
                $appccl+=$row["ndays"];
            }
        }
    }
    $r_academics=15-$academics;
    $r_casual1=6-$casual1;
    $r_casual2=6-$casual2;
    $r_medical=10-$medical;
    $r_ccl=$reqccl-$appccl;

?>
<?php
    $year = date("Y");

    $a=array();

    $fid = $_SESSION['fid'];

    $treqccl=0;$tappccl=0;

    $sql = "SELECT leave_type,ndays,EXTRACT(MONTH FROM fdate) as month FROM facleave WHERE YEAR(fdate)=$year AND  status='Approved' AND facJntuId='$fid'";

    $result = mysqli_query($connect,$sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            if($row["leave_type"] == "reqccl"){
                $treqccl+=$row["ndays"];
            }
            if($row["leave_type"] == "appccl"){
                $tappccl+=$row["ndays"];
            }
        }
    }
    $r_tccl=$treqccl-$tappccl;

?>
<?php
//get faculty dept
$query=mysqli_query($connect,"select facDept from faculty where facJntuId='$facJntuId'");
if($query){
    while($row=mysqli_fetch_array($query)){
        $dept=$row['facDept'];
    }
}
?>
<?php

if(isset($_POST['apply'])){
   $type=$_POST['type'];
   $d1=$_POST['fdate'];
   $d2=$_POST['tdate'];
   $des=$_POST['des'];
//calculate difference of dates
$date1 = new DateTime($_POST['fdate']);
$date2 = new DateTime($_POST['tdate']);
$interval = $date1->diff($date2);
$ndays=$interval->days;
$ndays+=1;

//get previous leave count


//check leave type and limit for that
switch($type){
    case "Casual Leave"   : $x=$d1;
                            $y=$d2;
                            $t1=strtotime($x);
                            $t2=strtotime($y);
                            $month2=date("m",$t2);
                            $month1=date("m",$t1);

                            if($month1<=6 && $month2<=6)
                            {
                            $rem = $r_casual1-$ndays;
                            if($r_casual1-$ndays<0){ header("Location: faculty-apply_leaves.php?ack=0&rem=$r_casual1");}
                           else{
                            $sql="insert into facleave(facJntuId,leave_type,fdate,tdate,ndays,description,status,facDept)
                            values('$facJntuId','$type','$d1','$d2','$ndays','$des',0,'$dept')";
                            $query=mysqli_query($connect,$sql);
                            header("Location: faculty-apply_leaves.php?ack=1&rem=$rem");
                           }
                        }
                        else if($month1>6 && $month2>6)
                            {
                                $rem = $r_casual2-$ndays;
                            if($r_casual2-$ndays<0){ header("Location: faculty-apply_leaves.php?ack=0&rem=$r_casual2");}
                           else{
                            $sql="insert into facleave(facJntuId,leave_type,fdate,tdate,ndays,description,status,facDept)
                            values('$facJntuId','$type','$d1','$d2','$ndays','$des',0,'$dept')";
                            $query=mysqli_query($connect,$sql);
                            header("Location: faculty-apply_leaves.php?ack=1&rem=$rem");
                           }
                        }
                        else
                        {
                            header("Location: faculty-apply_leaves.php?ack=2");
                        }
                        break;
    case "Academic Leave"   :
                            $rem = $r_academics-$ndays;
                        if($r_academics-$ndays<0){ header("Location: faculty-apply_leaves.php?ack=0&rem=$r_academics");}
                       else{
                        $sql="insert into facleave(facJntuId,leave_type,fdate,tdate,ndays,description,status,facDept)
                        values('$facJntuId','$type','$d1','$d2','$ndays','$des',0,'$dept')";
                        $query=mysqli_query($connect,$sql);
                        header("Location: faculty-apply_leaves.php?ack=1&rem=$rem");
                       }
                       break;
    case "Medical Leave"   :
                        $rem = $r_medical-$ndays;
                       if($r_medical-$ndays<0){ header("Location: faculty-apply_leaves.php?ack=0&rem=$r_medical");}
                      else{
                       $sql="insert into facleave(facJntuId,leave_type,fdate,tdate,ndays,description,status,facDept)
                       values('$facJntuId','$type','$d1','$d2','$ndays','$des',0,'$dept')";
                       $query=mysqli_query($connect,$sql);
                       header("Location: faculty-apply_leaves.php?ack=1&rem=$rem");
                      }
                      break;
    case "appccl"   :
                        $rem = $r_tccl-$ndays;
                        if($r_tccl-$ndays<0){ header("Location: faculty-apply_leaves.php?ack=0&rem=$r_tccl");}
                       else{
                        $sql="insert into facleave(facJntuId,leave_type,fdate,tdate,ndays,description,status,facDept)
                        values('$facJntuId','$type','$d1','$d2','$ndays','$des',0,'$dept')";
                        $query=mysqli_query($connect,$sql);
                        header("Location: faculty-apply_leaves.php?ack=1&rem=$rem");
                       }
                       break;
    case "reqccl"   : $sql="insert into facleave(facJntuId,leave_type,fdate,tdate,ndays,description,status,facDept)
                        values('$facJntuId','$type','$d1','$d2','$ndays','$des',0,'$dept')";
                        $query=mysqli_query($connect,$sql);
                        header("Location: faculty-apply_leaves.php?ack=1&rem=$r_ccl");
                        break;
    case "lop"   : $sql="insert into facleave(facJntuId,leave_type,fdate,tdate,ndays,description,status,facDept)
                        values('$facJntuId','$type','$d1','$d2','$ndays','$des',0,'$dept')";
                        $query=mysqli_query($connect,$sql);
                        header("Location: faculty-apply_leaves.php?ack=1");
                        break;




}
// shows the total amount of days (not divided into years, months and days like above)
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/vgnt.png">
    <title>Faculty Portal</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript">
        window.onload = function() {
        history.replaceState("", "", "faculty-apply_leaves.php");
        }
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="images/faculty_30.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!-- <span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span> -->
                        <!-- <span><h4 class="m-b-20">admin</h4></span> -->
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/Admin_25px.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="javascript:;" data-toggle="modal" data-target="#changePassModal"><i class="ti-user"></i> Change Password</a></li>
                                    <li><a href="faculty/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="faculty.php">Profile </a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-label">View Details</li>
                        <li> <a href="faculty-view_student.php" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Student</span></a>
                        </li>
                        <li> <a href="hod-student.php" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Leaves</span></a>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Exam Cell</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="faculty-view_results.php">View Results</a></li>
                                <li><a href="faculty-result_analysis.php">Result Analysis</a></li>
                                <li><a href="faculty-subject_analysis.php">Subject Analysis</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Attendance</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="faculty-view_att.php">View Attendance</a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-label">Manage</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Edit Profile</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="faculty-edit_pd.php">Personal Details</a></li>
                                <li><a href="faculty-edit_ad.php">Academic Details</a></li>
                                <li><a href="faculty-add_exp.php">Work Experience</a></li>
                                <li><a href="faculty-add_rpub.php">Research Publications</a></li>
                                <li><a href="faculty-add_rpro.php">Research Project</a></li>
                                <li><a href="faculty-add_bpub.php">Books Published</a></li>
                                <li><a href="faculty-add_doc.php">Doctorial Guidance</a></li>
                                <li><a href="faculty-add_soc.php">Professional Society Membership</a></li>
                            </ul>

                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Leaves</span></a>
                            <ul aria-expanded="false" class="collapse">
                              <li><a href="faculty-apply_leaves.php">Apply Leaves</a></li>
                              <li><a href="faculty-apply_leaves2.php">Apply Leaves(updated)</a></li>
                              <li><a href="faculty-view_leaves.php">View Leaves</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">WELCOME <?php echo $_SESSION['fid']?></h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                 <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Apply Leave</h4><br>
                                <?php if(isset($_GET['ack'])){ echo "<br>";?>
                                <div class="card-content">
                                    <?php if($_GET['ack'] == 0){ ?>
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Your have only <?php echo $_GET['rem'];?> Leaves</strong>
                                    </div>
                                    <?php
                                        }else if($_GET['ack'] == 1){
                                    ?>
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>You have <?php echo $_GET['rem'];?> Remaining Leaves</strong>
                                    </div>
                                    <?php }
                                    else
                                    {?>
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>Invalid Month selection</strong>
                                    </div>

                                   <?php }


                                }?>
                            </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                    ?>" method="post">
                                       <div class="form-group has-success">
                                          <label class="control-label">Type</label>
                                          <select class="form-control custom-select" name="type">
                                            <option value="Casual Leave">Casual Leave</option>
                                            <option value="Medical Leave">Medical Leave</option>
                                            <option value="Academic Leave">Academic Leave</option>
                                            <option value="lop">lop</option>
                                            <option value="reqccl">Request CCL</option>
                                            <option value="appccl">Apply CCL</option>
                                          </select>
                                          <small class="form-control-feedback"> Select your Leave Type</small>
                                        </div>
                                        <div class="form-group">
                                            <label>From Date</label>
                                            <input type="date" class="form-control"
                                            name="fdate" placeholder="dd/mm/yyyy">

                                        </div>
                                        <div class="form-group">
                                            <label>To Date</label>
                                            <input type="date" class="form-control"
                                            name="tdate" placeholder="dd/mm/yyyy">

                                        </div>
                                        <div class="form-group">
                                        <label for="comment">Description</label>
                                        <textarea class="form-control" rows="8" id="desc" name="des"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-info" name="apply">Submit</button>
                                    </form>
                                </div>


                        </div>
                    </div>
                    <!-- /# column -->


                </div>
                <!-- row ends -->
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 Vignan's Institute Management System Developed by CSE Dept &amp; Theme by <a href="https://colorlib.com">Colorlib</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->

    <div class="modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="changePassModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <form action="javascript:;" novalidate="novalidate">
                    <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="form-group">
                                <label for="oldPass">
                                    old Password
                                </label>
                                <input type="password"  data-val="true" data-val-required="this is Required Field" class="form-control" name="oldPass" id="oldPass"/>
                                <span class="field-validation-valid text-danger" data-valmsg-for="oldPass" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="newPass">
                                    New Password
                                </label>
                                <input type="password" data-val="true" data-val-required="this is Required Field" class="form-control" name="newPass" id="newPass"/>
                                <span class="field-validation-valid text-danger"  data-valmsg-for="newPass" data-valmsg-replace="true"></span>

                            </div>
                            <div class="form-group">
                                <label for="confirmPass">
                                    Confirm Password
                                </label>
                                <input type="password" data-val-equalto="Password not Match ", data-val-equalto-other="newPass" data-val="true" data-val-required="this is Required Field" class="form-control" name="confirmPass" id="confirmPass"/>
                                <span class="field-validation-valid text-danger" data-valmsg-for="confirmPass" data-valmsg-replace="true"></span>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
          </div>
        </div>
      </div>
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
    <script src="js/block/javascript.js"></script>

</body>

</html>
