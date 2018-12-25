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
//get faculty dept
$query=mysqli_query($connect,"select facDept from faculty where facJntuId='$facJntuId'");
if($query){
    while($row=mysqli_fetch_array($query)){
        $dept=$row['facDept'];
    }
}
?>
<?php
//Maintain Count

//Academic Leave Count
$year1=date('Y');
$utilizedAL=0;
$remAL=0;
$sql = "SELECT ndays FROM leavesal WHERE YEAR(fdate)=$year1 AND  (principal_status='APPROVED' OR principal_status='PENDING') AND facJntuId='$facJntuId'";
$result = mysqli_query($connect,$sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
          $utilizedAL+=$row['ndays'];
    }
}
$remAL = 14 - $utilizedAL;

//Casual Leave
$utilizedCL=0;
$utilizedCL1=0;
$utilizedCL2=0;
$remCL=0;
$year1=date('Y');
$month=date('m');
$sql = "SELECT ndays,EXTRACT(MONTH FROM fdate) as month FROM leavescl WHERE YEAR(fdate)=$year1 AND  (principal_status='APPROVED' OR principal_status='PENDING') AND facJntuId='$facJntuId'";
$result = mysqli_query($connect,$sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
          if($row["month"] <= 6){
              $utilizedCL1+=$row["ndays"];
          }
          if($row["month"] > 6){
              $utilizedCL2+=$row["ndays"];
          }
    }
}
if($month <= 6){
  $utilizedCL = $utilizedCL1;
}
else{
  $utilizedCL = $utilizedCL2;
}
$remCL = 6 - $utilizedCL;

//Extra Ordinary Leave
$year = date("Y");
$current_date = date("Y-m-d");
$utilized = 0;
$utilized1 = 0;
$utilized2 = 0;
$flagEOL=0;
$status = "PENDING";
$sql = "SELECT * FROM leaveseol WHERE  YEAR(fdate)=$year AND  (principal_status='APPROVED' OR principal_status='PENDING') AND facJntuId='$facJntuId'";
$result = mysqli_query($connect,$sql);
$rowcount=mysqli_num_rows($result);

if($rowcount>1) $flagEOL=2;

//Medical Leave
    $year1=date('Y');
    $utilizedML=0;
    $remML=0;
    $sql = "SELECT ndays FROM leavesml WHERE YEAR(fdate)=$year1 AND (principal_status='APPROVED' OR principal_status='PENDING') AND facJntuId='$facJntuId'";
    $result = mysqli_query($connect,$sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $utilizedML+=$row['ndays'];
        }
    }
    $remML = 7 - $utilizedML;

//Marriage Leave
$flagMRL=0;
$sql = "SELECT * FROM leavesmrl WHERE (principal_status='APPROVED' OR principal_status='PENDING') AND facJntuId='$facJntuId'";
$result = mysqli_query($connect,$sql);
if ($result->num_rows > 0) {
    $count = 1;
    while($row = mysqli_fetch_array($result))
          $flagMRL = 1;
}else{
   $count = 0;
};

//Maternity Leave
$flagMTL=0;
$countMTL=0;
$sql = "SELECT * FROM leavesmtl WHERE (principal_status='APPROVED' OR principal_status='PENDING') AND facJntuId='$facJntuId'";
$result = mysqli_query($connect,$sql);
$rowcount=mysqli_num_rows($result);
if ($result->num_rows > 0) {
    while($row = mysqli_fetch_array($result))
          $flagMTL += 1;
}else{
   $countMTL = 0;
};

//On Duty Leave
    $countOD=0;
    $utilizedOD=0;
    $utilizedeOD=0;
    $remainingOD=0;
    $remainingeOD=0;
    $year1=date('Y');
    $sql = "SELECT * FROM leavesod WHERE YEAR(fdate)=$year1 AND NOT hod_status='Rejected' AND facJntuId='$facJntuId'";
    $result = mysqli_query($connect,$sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if($row['type'] == 'Spot Evaluation'){
            $count++;
            $utilizedOD+=$row['ndays'];
          }elseif ($row['type'] == 'Exam Related') {
            // code...
            $utilizedeOD+=$row['ndays'];
          }
        }
    }
    $remainingOD = 10 - $utilizedOD;
    $remainingeOD = 7 - $utilizedeOD;


    $haveccl = 0;
    $utilccl = 0;
    $sql = "SELECT ndays FROM leavesccl WHERE YEAR(fdate)=$year1 AND principal_status='APPROVED' AND facJntuId='$facJntuId' AND type = 'Requestccl'";

    $result = mysqli_query($connect,$sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

          $haveccl+=$row['ndays'];
        }
    }

    $sql = "SELECT ndays FROM leavesccl WHERE YEAR(fdate)=$year1 AND (principal_status='APPROVED' OR principal_status='PENDING') AND facJntuId='$facJntuId' AND type = 'Applyccl'";

    $result = mysqli_query($connect,$sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {

          $utilccl+=$row['ndays'];
        }
    }
    $remccl = 0;
    $remccl = $haveccl - $utilccl;
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
        history.replaceState("", "", "faculty-apply_leaves2.php");
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
                        <li class="breadcrumb-item active">Leaves</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                 <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-title">
                               <h4>Table Basic </h4>
                           </div>
                           <div class="card-body">
                               <div class="table-responsive">
                                   <table class="table">
                                       <thead>
                                           <tr>
                                               <th>#</th>
                                               <th>TYPE</th>
                                               <th>MAX</th>
                                               <th>USED</th>
                                               <th>REMAINING</th>
                                               <th>APPLY LEAVES</th>
                                               <th>VIEW DETAILS</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                               <th scope="row">1</th>
                                               <td>Casual Leave(CL)</td>
                                               <td>12</td>
                                               <td><?php echo $utilizedCL; ?></td>
                                               <td><?php echo $remCL; ?></td>
                                               <td><a href="faculty-apply_leaves-cl.php"><button type="button" class="btn btn-success btn-sm m-b-10 m-l-5">APPLY</button></a></td>
                                               <td><a href="faculty-view_leaves-cl.php"><button type="button" class="btn btn-info btn-sm m-b-10 m-l-5">VIEW</button></a></td>
                                           </tr>
                                           <tr>
                                               <th scope="row">2</th>
                                               <td>Maternity Leave(MTL)</td>
                                               <td>2(Life Time)</td>
                                               <td><?php echo $flagMTL; ?></td>
                                               <td><?php echo 2 - $flagMTL; ?></td>
                                               <td><a href="faculty-apply_leaves-mtl.php"><button type="button" class="btn btn-success btn-sm m-b-10 m-l-5">APPLY</button></a></td>
                                               <td><a href="faculty-view_leaves-mtl.php"><button type="button" class="btn btn-info btn-sm m-b-10 m-l-5">VIEW</button></a></td>
                                           </tr>
                                           <tr>
                                               <th scope="row">3</th>
                                               <td>Academic Leave(AL)</td>
                                               <td>14</td>
                                               <td><?php echo $utilizedAL; ?></td>
                                               <td><?php echo $remAL; ?></td>
                                               <td><a href="faculty-apply_leaves-al.php"><button type="button" class="btn btn-success btn-sm m-b-10 m-l-5">APPLY</button></a></td>
                                               <td><a href="faculty-view_leaves-al.php"><button type="button" class="btn btn-info btn-sm m-b-10 m-l-5">VIEW</button></a></td>
                                           </tr>
                                           <tr>
                                               <th scope="row">4</th>
                                               <td>On-Duty(OD)</td>
                                               <td>17</td>
                                               <td><?php echo ($utilizedOD+$utilizedeOD); ?></td>
                                               <td><?php echo ($remainingOD+$remainingeOD); ?></td>
                                               <td><a href="faculty-apply_leaves-od.php"><button type="button" class="btn btn-success btn-sm m-b-10 m-l-5">APPLY</button></a></td>
                                               <td><a href="faculty-view_leaves-od.php"><button type="button" class="btn btn-info btn-sm m-b-10 m-l-5">VIEW</button></a></td>
                                           </tr>
                                           <tr>
                                               <th scope="row">5</th>
                                               <td>Emergency/Medical Leave(ML)</td>
                                               <td>7</td>
                                               <td><?php echo $utilizedML; ?></td>
                                               <td><?php echo $remML; ?></td>
                                               <td><a href="faculty-apply_leaves-ml.php"><button type="button" class="btn btn-success btn-sm m-b-10 m-l-5">APPLY</button></a></td>
                                               <td><a href="faculty-view_leaves-ml.php"><button type="button" class="btn btn-info btn-sm m-b-10 m-l-5">VIEW</button></a></td>
                                           </tr>
                                           <tr>
                                               <th scope="row">6</th>
                                               <td>Compensatory Casual Leave(CCL)</td>
                                               <td><?php echo $haveccl; ?></td>
                                               <td><?php echo $utilccl; ?></td>
                                               <td><?php echo $remccl; ?></td>
                                               <td><a href="faculty-apply_leaves-ccl.php"><button type="button" class="btn btn-success btn-sm m-b-10 m-l-5">APPLY</button></a></td>
                                               <td><a href="faculty-view_leaves-ccl.php"><button type="button" class="btn btn-info btn-sm m-b-10 m-l-5">VIEW</button></a></td>
                                           </tr>
                                           <tr>
                                               <th scope="row">7</th>
                                               <td>Extra Ordinary Leave(EOL)</td>
                                               <td>2</td>
                                               <td><?php echo $flagEOL; ?></td>
                                               <td><?php echo 2-$flagEOL; ?></td>
                                               <td><a href="faculty-apply_leaves-eol.php"><button type="button" class="btn btn-success btn-sm m-b-10 m-l-5">APPLY</button></a></td>
                                               <td><a href="faculty-view_leaves-eol.php"><button type="button" class="btn btn-info btn-sm m-b-10 m-l-5">VIEW</button></a></td>
                                           </tr>
                                           <tr>
                                               <th scope="row">8</th>
                                               <td>Marriage Leaves</td>
                                               <td>7</td>
                                               <td>
                                               <?php
                                                if ($flagMRL==1) {
                                                  // code...
                                                  echo 7;
                                                } else {
                                                  // code...
                                                  echo 0;
                                                }
                                               ?>
                                               </td>
                                               <td>
                                               <?php
                                                if ($flagMRL==1) {
                                                  // code...
                                                  echo 0;
                                                } else {
                                                  // code...
                                                  echo 7;
                                                }
                                               ?>
                                               </td>
                                               <td><a href="faculty-apply_leaves-mrl.php"><button type="button" class="btn btn-success btn-sm m-b-10 m-l-5">APPLY</button></a></td>
                                               <td><a href="faculty-view_leaves-mrl.php"><button type="button" class="btn btn-info btn-sm m-b-10 m-l-5">VIEW</button></a></td>
                                           </tr>
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
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
    <!-- <script src="js/block/javascript.js"></script> -->

</body>

</html>
