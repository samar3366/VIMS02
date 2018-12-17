<?php
    if(isset($_COOKIE['id']))
    {
        session_id($_COOKIE['id']);
    }

    session_start();

    if($_SESSION['fid'] == null){
        header("Location:faculty-login.php");
    }

    include('connection.php');
    $facJntuId = $_SESSION['fid'];
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
        history.replaceState("", "", "faculty-view_student.php");
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
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <!-- display propic -->
                              <?php
                              $res=mysqli_query($connect,"select * from facacademic where facJntuId='$facJntuId'");
                              while($row=mysqli_fetch_array($res))
                              {
                                if($row['propic']==NULL) echo '<img src="images/Student2.png" alt="user" class="profile-pic" />';
                                else echo '<img style="border-radius:50%; padding-top:0px;" id="profile-image1" class="img img-responsive profile-pic" src="data:image/jpeg;base64,'.base64_encode($row['propic'] ).'" width="100%;"/>';
                              }
                              ?>
                              <!-- display propic -->
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="faculty-change_password.php"><i class="fa fa-edit"></i> Change Password</a></li>
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
                                <li><a href="faculty-add_ws.php">Workshops Attended</a></li>
                            </ul>
                        </li>
                        <li> <a href="faculty-apply_leaves.php" aria-expanded="false"><i class="fa fa-plane"></i><span class="hide-menu">Apply Leaves</span></a>
                        </li>
                        <li> <a href="faculty-view_leaves.php" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">View Leaves</span></a>
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
                    <h3 class="text-primary">View Students</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="faculty-view_student.php">View Details</a></li>
                        <li class="breadcrumb-item"><a href="faculty-view_student.php">Student</a></li>
                        <li class="breadcrumb-item active">Student's Profile</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-two">
                                    <header>
                                        <div class="avatar">
                                          <?php
                                          $htno = $_GET['htno'];
                                        $res=mysqli_query($connect,"select * from student_details where htno='$htno'");
                                        while($row=mysqli_fetch_array($res))
                                        {
                                         if($row['propic']==NULL) {echo "<img src='images/Student2.png'>";}
                                         else{
                                           echo '<img style="border-radius:50%; padding-top:0px;" id="profile-image1" class="img img-responsive" src="data:image/jpeg;base64,'.base64_encode($row['propic'] ).'" />';
                                         }
                                        }
                                        ?>
                                        </div>

                                    </header>
                                    <?php

                                        //include('connection.php');
                                        //$htno = $_SESSION["htno"];
                                        //$htno = $_GET['htno'];
                                        $sql = "SELECT * FROM student_details WHERE htno='$htno';";

                                        $result = $connect->query($sql);

                                        if ($result->num_rows > 0) {

                                            while($row = $result->fetch_assoc()) {
                                    ?>



                                    <h3><?php echo $row["name"]." - ".$row["htno"];?></h3>
                                    <div class="desc">

                                        <?php echo $row["batch"].",".$row["branch"]."-".$row["section"]."<br>".
                                        "Mobile No:".$row["number"].","."Mail Id:".$row["mail"];
                                            $batch = $row["batch"];
                                        ?>
                                    </div>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Personal Details </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php

                                        //include('connection.php');
                                        //$htno = $_GET['htno'];
                                        $sql = "SELECT * FROM student_info WHERE htno='$htno';";

                                        $result = $connect->query($sql);

                                        if ($result->num_rows > 0) {

                                            while($row = $result->fetch_assoc()) {
                                    ?>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>Full Name</th>
                                                <td><?php echo $row["full_name"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>Gender</th>
                                                <td><?php echo $row["gender"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>Father's Name</th>
                                                <td><?php echo $row["father_name"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>Mother's Name</th>
                                                <td><?php echo $row["mother_name"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>DOB</th>
                                                <td><?php echo $row["dob"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>Mother Tongue</th>
                                                <td><?php echo $row["mother_tongue"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>Aadhar No</th>
                                                <td><?php echo $row["aadhar_no"];?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Contact Details </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>Father's No</th>
                                                <td><?php echo $row["father_no"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>Father's Mail</th>
                                                <td><?php echo $row["father_mail"];?></td>
                                            </tr>
                                           <tr>
                                                <th scope="row">#</th>
                                                <th>Mother's No</th>
                                                <td><?php echo $row["mother_no"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>Mother's Mail</th>
                                                <td><?php echo $row["mother_mail"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>Address</th>
                                                <td><?php echo $row["address"];?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>

            <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#past academics" role="tab">Past Academics</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">

                            <?php

                                        //include('connection.php');
                                        //$htno = $_SESSION["htno"];
                                        $sql = "SELECT * FROM student_info WHERE htno='$htno';";

                                        $result = $connect->query($sql);

                                        if ($result->num_rows > 0) {

                                            while($row = $result->fetch_assoc()) {
                                    ?>
                                <div class="tab-pane  active" id="past academics" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Course</th>
                                                                    <th>Institute</th>
                                                                    <th>Percentage</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <td>Intermediate</td>
                                                                    <td><?php echo $row["inter_institute"];?></td>
                                                                    <td><?php echo $row["inter_percentage"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <td>Intermediate</td>
                                                                    <td><?php echo $row["ssc_institute"];?></td>
                                                                    <td><?php echo $row["ssc_percentage"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="4">Others</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th colspan="2">Eamcet Rank</th>
                                                                    <td><?php echo $row["eamcet_rank"];?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }}?>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                <!-- <div class="col-lg-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <!-- <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#courses" role="tab">Courses/Workshops</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#certificates" role="tab">Certificates</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#projects" role="tab">Projects</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#skills" role="tab">Skills</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <!-- <div class="tab-content">
                                <div class="tab-pane  active" id="courses" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.NO</th>
                                                                    <th>Title of the Course/Workshop</th>
                                                                    <th>Online/Offline</th>
                                                                    <th>Organized By</th>
                                                                    <th>Instructors</th>
                                                                    <th>Time Duration</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php


                                                                    // $sql = "SELECT * FROM student_courses WHERE htno='$htno';";
                                                                    //
                                                                    // $result = $connect->query($sql);
                                                                    // $i=1;
                                                                    // if ($result->num_rows > 0) {
                                                                    //
                                                                    //     while($row = $result->fetch_assoc()) {

                                                                ?>
                                                                <tr>
                                                                    <th><?php //echo $i;$i++;?></th>
                                                                    <td><?php //echo $row["title"];?></td>
                                                                    <td><?php //echo $row["online_offline"];?></td>
                                                                    <td><?php //echo $row["organized_by"];?></td>
                                                                    <td><?php //echo $row["instructor"];?></td>
                                                                    <td><?php //echo $row["time_duration"];?></td>
                                                                </tr>
                                                                <?php //}}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <!--second tab-->
                                <!-- <div class="tab-pane" id="certificates" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.NO</th>
                                                                    <th>Title of Certificate</th>
                                                                    <th>Given By</th>
                                                                    <th>Type</th>
                                                                    <th>Achievement</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php


                                                                    // $sql = "SELECT * FROM student_certificate WHERE htno='$htno';";
                                                                    //
                                                                    // $result = $connect->query($sql);
                                                                    // $i=1;
                                                                    // if ($result->num_rows > 0) {
                                                                    //
                                                                    //     while($row = $result->fetch_assoc()) {

                                                                ?>
                                                                <tr>
                                                                    <th><?php //echo $i;$i++;?></th>
                                                                    <td><?php //echo $row["title"];?></td>
                                                                    <td><?php //echo $row["given_by"];?></td>
                                                                    <td><span class="badge badge-primary"><?php //echo $row["type"];?></span></td>
                                                                    <td><?php //echo $row["achievement"];?></td>
                                                                </tr>
                                                                <?php //}}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                    <!--third tab-->
                                <!-- <div class="tab-pane" id="projects" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.NO</th>
                                                                    <th>Name of Project</th>
                                                                    <th>Team</th>
                                                                    <th>Guide</th>
                                                                    <th>Description</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php

                                                                    //
                                                                    // $sql = "SELECT * FROM student_projects WHERE htno='$htno';";
                                                                    //
                                                                    // $result = $connect->query($sql);
                                                                    // $i=1;
                                                                    // if ($result->num_rows > 0) {
                                                                    //
                                                                    //     while($row = $result->fetch_assoc()) {

                                                                ?>
                                                                <tr>
                                                                    <th><?php //echo $i;$i++;?></th>
                                                                    <td><?php //echo $row["name"];?></td>
                                                                    <td><?php //echo $row["team"];?></td>
                                                                    <td><?php //echo $row["guide"];?></td>
                                                                    <td><?php //echo $row["description"];?></td>
                                                                    <td><?php //echo $row["domain"];?></td>
                                                                </tr>
                                                                <?php //}}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="skills" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.NO</th>
                                                                    <th>Skill</th>
                                                                    <th>Skill Domain</th>
                                                                    <th>Skill Level</th>
                                                                    <th>Any Domain Specific Designation</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php


                                                                //     $sql = "SELECT * FROM student_skill WHERE htno='$htno';";
                                                                //
                                                                //     $result = $connect->query($sql);
                                                                //     $i=1;
                                                                //     if ($result->num_rows > 0) {
                                                                //
                                                                //         while($row = $result->fetch_assoc()) {
                                                                //
                                                                // ?>
                                                                <tr>
                                                                    <th><?php //echo $i;$i++;?></th>
                                                                    <td><?php //echo $row["skill"];?></td>
                                                                    <td><?php //echo $row["skill_domain"];?></td>
                                                                    <td><?php //echo $row["skill_level"];?></td>
                                                                    <td><?php //echo $row["desig"];?></td>
                                                                </tr>
                                                                <?php //}}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>  -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Marks Table</h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php if($batch <=15){?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>YEAR</th>
                                                <th>SEM</th>
                                                <th>TOTAL</th>
                                                <th>PERCENTAGE</th>
                                                <th>NO OF BACKLOGS</th>
                                                <th>TOTAL CREDITS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $year = array("I", "II", "III", "IV");
                                                $sem = array("I", "II");
                                                $final_marks=0;
                                                $final_total=0;
                                                for ($x = 0; $x < 4; $x++) {
                                                    for ($y = 0; $y < 2; $y++) {
                                            ?>
                                            <?php

                                                //$htno = $_SESSION['htno'];
                                                //include('connection.php');
                                                $table_name = $batch."_results";
                                                $year_st = $year[$x];
                                                $sem_st = $sem[$y];
                                                $sql = "SELECT * FROM 15_results WHERE type = 0 and htno = '$htno' and year = '$year_st' and sem = '$sem_st'";

                                                $result = $connect->query($sql);

                                                $sum = 0;
                                                $sum_credits = 0;
                                                $count = 0;
                                                $total_marks = 0;

                                                if ($result->num_rows > 0) {

                                                    while($row = $result->fetch_assoc()) {
                                                        if($row["type"] == 0 && $row["credits"] == 0){
                                                            $htno = $row["htno"];
                                                            $subj = $row["subj_code"];
                                                            $sql1 = "SELECT * FROM 15_results WHERE type = '1' and credits > 0 and htno = '$htno' and subj_code = '$subj';";

                                                            $result1 = $connect->query($sql1);

                                                            $val = $result1->fetch_assoc();

                                                            if(isset($val)){
                                                                $internal = $val["internal"];
                                                                $external = $val["external"];
                                                                $total = $val["total"];
                                                                $credits = $val["credits"];
                                                                if($credits == 2){
                                                                    $total_marks = $total_marks+75;
                                                                }else if($credits == 4){
                                                                    $total_marks = $total_marks+100;
                                                                }
                                                                $sum = $sum+$total;
                                                                $sum_credits = $sum_credits+$credits;
                                                            }
                                                            else{
                                                                $internal = $row["internal"];
                                                                $external = $row["external"];
                                                                $total = $row["total"];
                                                                $sum = $sum+$total;
                                                                $credits = 0;
                                                                $sum_credits = $sum_credits+$credits;
                                                                $count = $count+1;
                                                                $total_marks = $total_marks+100;

                                                            }

                                                        }
                                                        else{
                                                            $internal = $row["internal"];
                                                            $external = $row["external"];
                                                            $total = $row["total"];
                                                            $credits = $row["credits"];
                                                            $sum = $sum+$total;
                                                            $sum_credits = $sum_credits+$credits;
                                                            if($credits == 2){
                                                                $total_marks = $total_marks+75;
                                                            }else if($credits == 4){
                                                                $total_marks = $total_marks+100;
                                                            }
                                                        }

                                                    }
                                                }
                                                if($year_st == "I" && $sem_st == "I"){
                                                  $total_marks = 1000;
                                                }
                                                $final_marks = $final_marks + $sum;
                                                $final_total = $final_total + $total_marks;
                                                if($total_marks!=0){
                                                    $percentage = round((($sum/$total_marks)*100),2);

                                            ?>
                                            <tr>
                                                <td> <?php echo $year_st;?></td>
                                                <td> <?php echo $sem_st;?></td>
                                                <td><?php echo $sum;?></td>
                                                <td><?php echo $percentage."%";?></td>
                                                <td><?php echo $count;?></td>
                                                <td><?php echo $sum_credits;?></td>
                                            </tr>
                                            <?php
                                                }
                                                }}?>
                                            <?php

                                                if($final_total!=0){
                                                    $per = round((($final_marks/$final_total)*100),2);
                                            ?>
                                            <tr>
                                                <th>#</th>
                                                <th colspan="3">TOTAL PERCENTAGE:</th>
                                                <td><?php echo $per."%";?></td>
                                                <td><?php echo $final_marks."/".$final_total;?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                    <?php }?>
                                    <?php if($batch >=16){?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>YEAR</th>
                                                <th>SEM</th>
                                                <th>GRADE</th>
                                                <th>GPA</th>
                                                <th>NO OF BACKLOGS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $year = array("I", "II", "III", "IV");
                                                $sem = array("I", "II");
                                                $agg_gradep = 0;
                                                $total_subj = 0;
                                                for ($x = 0; $x < 4; $x++) {
                                                    for ($y = 0; $y < 2; $y++) {
                                            ?>
                                            <?php


                                                $table_name = $batch."_results";

                                                $year_st = $year[$x];
                                                $sem_st = $sem[$y];


                                                $sql_marks = "SELECT * FROM 16_results WHERE type = 0 and htno = '$htno' and year = '$year_st' and sem = '$sem_st'";

                                                $result_marks = $connect->query($sql_marks);

                                                $sum = 0;
                                                $sum_credits = 0;
                                                $count = 0;
                                                $total_marks = 0;
                                                $grade_count = 0;
                                                $supply_count = 0;

                                                if ($result_marks->num_rows > 0) {

                                                    while($row_marks = $result_marks->fetch_assoc()) {
                                                        if($row_marks["type"] == 0 && $row_marks["grade_points"] == 0){
                                                            $subj = $row_marks["subj_code"];
                                                            $sql_supply = "SELECT * FROM 16_results WHERE type = '1' and grade_points > 0 and htno = '$htno' and subj_code = '$subj';";

                                                            $result_supply = $connect->query($sql_supply);

                                                            $row_supply = $result_supply->fetch_assoc();

                                                            if(isset($row_supply)){
                                                                $grade = $row_supply["grade"];
                                                                $grade_points = $row_supply["grade_points"];
                                                                $grade_count++;
                                                                $sum = $sum+$grade_points;
                                                            }
                                                            else{
                                                                $grade = $row_marks["grade"];
                                                                $grade_points = $row_marks["grade_points"];
                                                                $grade_count++;
                                                                $sum = $sum+$grade_points;
                                                                $supply_count++;

                                                            }

                                                        }
                                                        else{
                                                            $grade = $row_marks["grade"];
                                                            $grade_points = $row_marks["grade_points"];
                                                            $grade_count++;
                                                            $sum = $sum+$grade_points;
                                                        }

                                                    }
                                                }

                                            if($grade_count != 0){
                                                $agg_gradep = $agg_gradep + $sum;
                                                $total_subj = $total_subj + $grade_count;
                                                $gpa = ceil($sum/$grade_count);
                                                $gpa_ac = round($sum/$grade_count,2);
                                                if($gpa == 10){
                                                    $grade = "O";
                                                }
                                                else if($gpa == 9){
                                                    $grade = "A+";
                                                }
                                                    else if($gpa == 8){
                                                    $grade = "A";
                                                }
                                                    else if($gpa == 7){
                                                    $grade = "B+";
                                                }
                                                    else if($gpa ==6){
                                                    $grade = "B";
                                                }
                                                    else if($gpa ==5){
                                                    $grade = "C";
                                                }
                                                    else if($gpa <= 4){
                                                    $grade = "F";
                                                }
                                            ?>
                                            <tr>
                                                <td><?php echo $year_st?></td>
                                                <td><?php echo $sem_st?></td>
                                                <td><?php echo $grade;?></td>
                                                <td><?php echo $gpa_ac;?></td>
                                                <td><?php echo $supply_count;?></td>
                                            </tr>
                                            <?php }}}?>
                                            <tr>
                                                <th colspan="3">GRADE POINT AVERAGE:</th>
                                                <td><?php echo round($agg_gradep/$total_subj,2);?></td>
                                                <td><?php echo " of ".$total_subj." subjects";?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
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

    <script type="text/javascript">
        $(function () {
          $(document).bind("contextmenu",function(e){
            e.preventDefault();
            //alert("Right Click is not allowed");
          }
        );
        /*$('.dvOne').bind("contextmenu",function(e){
        e.preventDefault();
        alert("Right Click is not allowed on div");
        }
        );
        */
        }
         );
      </script>
      <script>
      $(document).keydown(function (event) {
          if (event.keyCode == 123) { // Prevent F12
              return false;
          }else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
              return false;
          }else if (event.ctrlKey && event.keyCode == 85) { // Prevent Ctrl+U
              return false;
          }
      });
      </script>

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
