<?php
    if(isset($_COOKIE['id']))
    {
        session_id($_COOKIE['id']);
    }

    session_start();

    if($_SESSION['pid'] == null){
        header("Location:principal-login.php");
    }
    include('connection.php');
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
    <title>Hod Portal</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript">
        window.onload = function() {
        history.replaceState("", "", "principal-view_results.php");
        }
    </script>
    <script type="text/javascript" src="javascript.js"></script>
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

                        <!-- Search
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li> -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/Admin_25px.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="principal-change_password.php"><i class="fa fa-edit"></i> Change Password</a></li>
                                    <li><a href="principal/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
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
                                <li><a href="principal.php">Profile </a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-label">View Details</li>
                        <li> <a href="principal-student.php" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Student</span></a>
                        </li>
                        <li> <a href="principal-faculty.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Faculty</span></a>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Exam Cell</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="principal-view_results.php">View Results</a></li>
                                <li><a href="principal-result_analysis.php">Result Analysis</a></li>
                                <li><a href="principal-subject_analysis.php">Subject Analysis</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Attendance</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="principal-view_att.php">View Attendance</a></li>
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
                    <h3 class="text-primary">WELCOME <?php echo $_SESSION['pid']?></h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">View Details</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Exam Cell</a></li>
                        <li class="breadcrumb-item active">View Results</li>
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
                                <h4>View Results</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="principal-view_results.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Batch</label>
                                            <select class="form-control" name="batch">

												<?php
                                                    $sql = "SELECT DISTINCT batch FROM student_details ORDER BY batch DESC;";

                                                    $result = $connect->query($sql);
                                                    $i = 0;
                                                    if($result->num_rows > 0){
                                                        while($row = $result->fetch_assoc()){
                                                            $batch = $row["batch"];
                                                            echo "<option value='$batch'>".$row["batch"]."</option>";
                                                            $i++;
                                                            if($i>=4){
                                                                break;
                                                            }
                                                        }
                                                    }

                                                ?>
								            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Branch</label>
                                            <select class="form-control" name="branch">
								                <option>Select any:</option>
												<option value="CSE">CSE</option>
												<option value="ECE">ECE</option>
                                                <option value="MECH">EEE</option>
                                                <option value="MECH">MECH</option>
                                                <option value="CIVIL">CIVIL</option>
                                                <option value="EIE">EIE</option>
								            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Year</label>
                                            <select class="form-control" name="year">
								                <option>Select any:</option>
												<option value="I">I</option>
												<option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
								            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <select class="form-control" name="sem">
								                <option>Select any:</option>
												<option value="I">I</option>
												<option value="II">II</option>
								            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-rounded m-b-10 m-l-5">Show Results</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($_POST["batch"])){?>
                    <?php if($_POST["batch"] <= 15){?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Results</h4>
                                <h6 class="card-subtitle">Total Results of all Students</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>HTNO</th>
                                                <th>SUBJECT CODE</th>
                                                <th>SUBJECT NAME</th>
                                                <th>INTERNAL</th>
                                                <th>EXTERNAL</th>
                                                <th>TOTAL</th>
                                                <th>CREDITS</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>HTNO</th>
                                                <th>SUBJECT CODE</th>
                                                <th>SUBJECT NAME</th>
                                                <th>INTERNAL</th>
                                                <th>EXTERNAL</th>
                                                <th>TOTAL</th>
                                                <th>CREDITS</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php

                                                $branch = $_POST["branch"];
                                                $year = $_POST["year"];
                                                $sem = $_POST["sem"];
                                                $batch = $_POST["batch"];
                                                //$table_name = $_POST["batch"]."_results";
                                                $st = "SELECT htno FROM student_details WHERE batch = '$batch' AND branch = '$branch';";

                                                $res = $connect->query($st);
                                                if($res->num_rows > 0){
                                                    while($st_list = $res->fetch_assoc()){
                                                        $htno = $st_list["htno"];

                                                $sql = "SELECT * FROM 15_results WHERE htno='$htno' AND type = '0' AND branch = '$branch' AND year = '$year' AND sem = '$sem'";

                                                $result = $connect->query($sql);

                                                if ($result->num_rows > 0) {

                                                    while($row = $result->fetch_assoc()) {
                                                        if($row["type"] == 0 && $row["credits"] == 0){
                                                            //$htno = $row["htno"];
                                                            $subj = $row["subj_code"];
                                                            $sql1 = "SELECT * FROM 15_results WHERE type = '1' and credits > 0 and htno = '$htno' and subj_code = '$subj';";

                                                            $result1 = $connect->query($sql1);

                                                            $val = $result1->fetch_assoc();

                                                            if(isset($val)){
                                                                $internal = $val["internal"]."*";
                                                                $external = $val["external"]."*";
                                                                $total = $val["total"]."*";
                                                                $credits = $val["credits"];
                                                            }
                                                            else{
                                                                $internal = "F";
                                                                $external = "F";
                                                                $total = "F";
                                                                $credits = "Backlog";
                                                            }

                                                        }
                                                        else{
                                                            $internal = $row["internal"];
                                                            $external = $row["external"];
                                                            $total = $row["total"];
                                                            $credits = $row["credits"];
                                                        }
                                            ?>
                                            <tr>
                                                <td><?php $htno=$row["htno"];echo "<a href='principal-student-profile.php?htno=".$htno."'>"; echo $htno."</a>";?></td>
                                                <td><?php echo $row["subj_code"];?></td>
                                                <td><?php echo $row["subj_name"];?></td>
                                                <td><?php echo $internal;?></td>
                                                <td><?php echo $external;?></td>
                                                <td><?php echo $total;?></td>
                                                <td><?php echo $credits;?></td>
                                            </tr>
                                            <?php }}}}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php if($_POST["batch"] >= 16){?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Results</h4>
                                <h6 class="card-subtitle">Total Results of all Students</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>HTNO</th>
                                                <th>SUBJECT CODE</th>
                                                <th>SUBJECT NAME</th>
                                                <th>GRADE</th>
                                                <th>GRADE_POINTS</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>HTNO</th>
                                                <th>SUBJECT CODE</th>
                                                <th>SUBJECT NAME</th>
                                                <th>GRADE</th>
                                                <th>GRADE_POINTS</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php


                                                $branch = $_POST["branch"];
                                                $year = $_POST["year"];
                                                $sem = $_POST["sem"];
                                                $batch = $_POST["batch"];
                                                //$table_name = $_POST["batch"]."_results";


                                                $st = "SELECT htno FROM student_details WHERE batch = '$batch' AND branch = '$branch';";

                                                $res = $connect->query($st);
                                                if($res->num_rows > 0){
                                                    while($st_list = $res->fetch_assoc()){
                                                        $htno = $st_list["htno"];

                                                //include('connection.php');
                                                $sql = "SELECT * FROM 16_results WHERE  htno = '$htno' AND type = '0' AND branch = '$branch' AND year = '$year' AND sem = '$sem';";

                                                $result = $connect->query($sql);

                                                if ($result->num_rows > 0) {

                                                    while($row = $result->fetch_assoc()) {
                                                        if($row["type"] == 0 && $row["grade_points"] == 0){
                                                            $htno = $row["htno"];
                                                            $subj = $row["subj_code"];
                                                            $sql1 = "SELECT * FROM 16_results WHERE type = '1' and grade_points > 0 and htno = '$htno' and subj_code = '$subj';";

                                                            $result1 = $connect->query($sql1);

                                                            $val = $result1->fetch_assoc();

                                                            if(isset($val)){
                                                                $grade = $val["grade"]."*";
                                                                $grade_points = $val["grade_points"]."*";
                                                            }
                                                            else{
                                                                $grade_points = 0;
                                                                $grade = "Backlog";
                                                            }

                                                        }
                                                        else{

                                                            $grade = $row["grade"];
                                                            $grade_points = $row["grade_points"];
                                                        }
                                            ?>
                                            <tr>
                                                <td><?php $htno=$row["htno"];echo "<a href='admin-profile.php?htno=".$htno."'>"; echo $htno."</a>";?></td>
                                                <td><?php echo $row["subj_code"];?></td>
                                                <td><?php echo $row["subj_name"];?></td>
                                                <td><?php echo $grade;?></td>
                                                <td><?php echo $grade_points;?></td>
                                            </tr>
                                            <?php }}}}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php }?>
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
    <!-- End Wrapper -->
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
