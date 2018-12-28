<?php

    if(isset($_COOKIE['id']))
    {
        session_id($_COOKIE['id']);
    }

    session_start();

    if($_SESSION['cid'] == null){
        header("Location:clerk-login.php");
    }

?>
<?php
$cid=$_SESSION['cid'];
include("connection.php");
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
    <title>Clerk Portal</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript">
        window.onload = function() {
        history.replaceState("", "", "clerk-view_approved_leaves.php");
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
                        <b><img src="images/University.png" alt="homepage" class="dark-logo" /></b>
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
                                      <li><a href="clerk-change_password.php"><i class="fa fa-edit"></i> Change Password</a></li>
                                    <li><a href="clerk/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
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
                                <li><a href="clerk.php">Profile </a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-label">Leaves</li>
                        <li> <a href="clerk-view_approved_leaves.php" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Approved</span></a>
                        </li>
                        <li> <a href="clerk-view_rejected_leaves.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Rejected</span></a>
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
                    <h3 class="text-primary">WELCOME <?php echo $_SESSION['cid'];?></h3> </div>
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

                  <div class="col-12">
                       <div class="card">
                           <div class="card-body">
                               <h4 class="card-title">History of leaves</h4>
                               <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                               <div class="table-responsive m-t-40">
                                   <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                     <thead>
                                         <tr>
                                             <th>Leave ID</th>
                                             <th>Faculty Name</th>
                                             <th>Department</th>
                                             <th>Leave Type</th>
                                             <th>From Date</th>
                                             <th>To Date</th>
                                             <th>Leave Status</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                         //get faculty dept
                                         $leaves = array("leavescl","leavesmtl","leavesal","leavesod","leavesml","leavesccl","leaveseol","leavesmrl");
                                         for($i=0;$i<8;$i++){
                                          $tableName = $leaves[$i];
                                         $query=mysqli_query($connect,"SELECT * FROM $tableName WHERE principal_status = 'APPROVED'");
                                         if($query){
                                             while($row=mysqli_fetch_array($query)){
                                               $leave_id=$row['leave_id'];
                                               $facName = $row['facName'];
                                               $facDept = $row['facDept'];
                                               $fdate = $row['fdate'];
                                               $tdate = $row['tdate'];
                                               $principal_status = $row['principal_status'];
                                               if($tableName == 'leavescl'){
                                                 $leave_type = 'CASUAL LEAVES';
                                               }elseif ($tableName == 'leavesmtl') {
                                                 // code...
                                                 $leave_type = 'MATERNITY LEAVES';
                                               }elseif ($tableName == 'leavesal') {
                                                 // code...
                                                 $leave_type = 'ACADEMIC LEAVES';
                                               }elseif ($tableName == 'leavesod') {
                                                 // code...
                                                 $leave_type = 'ON-DUTY LEAVES';
                                               }elseif ($tableName == 'leavesml') {
                                                 // code...
                                                 $leave_type = 'EMERGENCY LEAVES';
                                               }elseif ($tableName == 'leavesccl') {
                                                 // code...
                                                 if($row['type'] == 'Requestccl'){
                                                   $leave_type = 'REQUEST CCL LEAVES';
                                                 }else{
                                                   $leave_type = 'APPLY CCL LEAVES';
                                                 }
                                               }elseif ($tableName == 'leaveseol') {
                                                 // code...
                                                 $leave_type = 'EXTRA ORDINARY LEAVES';
                                               }
                                               elseif ($tableName == 'leaveseol') {
                                                 // code...
                                                 $leave_type = 'EXTRA ORDINARY LEAVES';
                                               }
                                               elseif ($tableName == 'leavesmrl') {
                                                 // code...
                                                 $leave_type = 'MARRIAGE LEAVE';
                                               }
                                               $facName = $row['facName'];?>
                                               <tr>
                                                   <th scope="row"><?php echo $leave_id;?></th>
                                                   <td><?php echo $facName;?></td>
                                                   <td><?php echo $facDept;?></td>
                                                   <td><?php echo $fdate;?></td>
                                                   <td><?php echo $tdate;?></td>
                                                   <td><?php echo $leave_type;?></td>
                                                   <td><?php echo $principal_status;?></td>
                                               </tr><?php
                                             }
                                           }
                                         }
                                         ?>
                                     </tbody>
                                     <tfoot>
                                       <tr><th>Leave ID</th>
                                       <th>Faculty Name</th>
                                       <th>Department</th>
                                       <th>Leave Type</th>
                                       <th>From Date</th>
                                       <th>To Date</th>
                                       <th>Leave Status</th>
                                       </tr>
                                     </tfoot>
                                   </table>
                               </div>
                           </div>


               <!-- row ends -->
               <!-- End PAge Content -->
               </div>
             </div>

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
