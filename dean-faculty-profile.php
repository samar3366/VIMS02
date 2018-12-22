<?php
    if(isset($_COOKIE['id']))
    {
        session_id($_COOKIE['id']);
    }

    session_start();

    if($_SESSION['did'] == null){
        header("Location:dean-login.php");
    }
?>
<?php
$did=$_SESSION['did'];
$count=0;
include("connection.php");
$output=0;
$sql=mysqli_query($connect,"select count(leave_id) as count from facleave where status='0'");
if($sql){
    while($row=mysqli_fetch_array($sql)){
        $count=$row['count'];
    }
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
    <title>Hod Portal</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript">
        window.onload = function() {
        history.replaceState("", "", "dean-faculty.php");
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
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/Admin_25px.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="dean-change_password.php"><i class="fa fa-edit"></i> Change Password</a></li>
                                    <li><a href="dean/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
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
                                <li><a href="dean.php">Profile </a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-label">View Details</li>
                        <li> <a href="dean-student.php" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Student</span></a>
                        </li>
                        <li> <a href="dean-faculty.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Faculty</span></a>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Exam Cell</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dean-view_results.php">View Results</a></li>
                                <li><a href="dean-result_analysis.php">Result Analysis</a></li>
                                <li><a href="dean-subject_analysis.php">Subject Analysis</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Attendance</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dean-view_att.php">View Attendance</a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-label">Manage</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Leaves</span></a>
                            <ul aria-expanded="false" class="collapse">
                              <li><a href="dean-view_leaves.php">View Leaves</a></li>
                              <li><a href="dean-view-leaves2.php">View Leaves(updated)</a></li>
                              <li><a href="dean-view-leaves_history.php">View Leaves History</a></li>
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
                    <h3 class="text-primary">View Faculty</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">View Details</a></li>
                        <li class="breadcrumb-item active">Student</li>
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
                                        $facJntuId = $_GET["facJntuId"];
                                        $res=mysqli_query($connect,"select * from facacademic where facJntuId='$facJntuId'");
                                        while($row=mysqli_fetch_array($res))
                                        {
                                         if($row['propic']==NULL) {echo "<img src='images/faculty_30.png'>";}
                                         else{
                                           echo '<img style="border-radius:50%; padding-top:0px;" id="profile-image1" class="img img-responsive" src="data:image/jpeg;base64,'.base64_encode($row['propic'] ).'" />';
                                         }
                                        }
                                        ?>
                                        </div>
                                        <!-- <a href="#"><i class="fa fa-upload"></i>Upload Picture</a><br> -->
                                    </header>
                                    <?php


                                        //$facJntuId = $_GET["facJntuId"];
                                        $sql = "SELECT * FROM faculty WHERE facJntuId='$facJntuId';";

                                        $result = $connect->query($sql);


                                        $row = $result->fetch_assoc();
                                    ?>
                                    <h3><?php echo $row["facName"]." - ".$row["facJntuId"];?></h3>
                                    <div class="desc">

                                        <?php echo $row["facDesig"].",".$row["facDept"]."<br>".
                                        "Mobile No:".$row["facMobile"].","."Mail Id:".$row["facEmail"];?>
                                    </div>
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

                                    ?>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>JNTUH ID</th>
                                                <td><?php echo $row["facJntuId"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>AICTE ID</th>
                                                <td><?php echo $row["facAicteId"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>AADHAR NO</th>
                                                <td><?php echo $row["facAadhar"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>PAN NO</th>
                                                <td><?php echo $row["facPan"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>PASSPORT</th>
                                                <td><?php echo $row["facPassport"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>VOTER ID</th>
                                                <td><?php echo $row["facVoter"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>DOB</th>
                                                <td><?php echo $row["facDob"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>GENDER</th>
                                                <td><?php echo $row["facGen"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>BLOOD GROUP</th>
                                                <td><?php echo $row["facBg"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>MARTIAL STATUS</th>
                                                <td><?php echo $row["facMartial"];?></td>
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
                                                <th>MOBILE NUMBER</th>
                                                <td><?php echo $row["facMobile"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>MAIL ID</th>
                                                <td><?php echo $row["facEmail"];?></td>
                                            </tr>
                                           <tr>
                                                <th scope="row">#</th>
                                                <th>TEMPORARY ADDRESS</th>
                                                <td><?php echo $row["facTempAdd"];?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th>PERMENANT ADDRESS</th>
                                                <td><?php echo $row["facPerAdd"];?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#academic qualifications" role="tab">Academic Qualifications</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#work experience" role="tab">Work Experience</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">

                            <?php

                                        //include('connection.php');
                                        //$htno = $_SESSION["htno"];
                                        $sql = "SELECT * FROM facacademic WHERE facJntuId='$facJntuId';";

                                        $result = $connect->query($sql);


                                        $row = $result->fetch_assoc();
                                    ?>
                                <div class="tab-pane  active" id="academic qualifications" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.NO</th>
                                                                    <th>DEGREE</th>
                                                                    <th>BOARD/UNIVERSITY</th>
                                                                    <th>INSTITUTION</th>
                                                                    <th>YEAR OF PASSING</th>
                                                                    <th>PERCENTAGE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>1</th>
                                                                    <td>Ph.D</td>
                                                                    <td><?php echo $row["phdUniv"];?></td>
                                                                    <td><?php echo $row["phdInst"];?></td>
                                                                    <td><?php echo $row["phdYear"];?></td>
                                                                    <td><?php echo $row["phdPer"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>2</th>
                                                                    <td>Post Graduation</td>
                                                                    <td><?php echo $row["pgUniv"];?></td>
                                                                    <td><?php echo $row["pgInst"];?></td>
                                                                    <td><?php echo $row["pgYear"];?></td>
                                                                    <td><?php echo $row["pgPer"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>3</th>
                                                                    <td>Under Graduation</td>
                                                                    <td><?php echo $row["ugUniv"];?></td>
                                                                    <td><?php echo $row["ugInst"];?></td>
                                                                    <td><?php echo $row["ugYear"];?></td>
                                                                    <td><?php echo $row["ugPer"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>4</th>
                                                                    <td>Intermediate</td>
                                                                    <td><?php echo $row["intUniv"];?></td>
                                                                    <td><?php echo $row["intInst"];?></td>
                                                                    <td><?php echo $row["intYear"];?></td>
                                                                    <td><?php echo $row["intPer"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>5</th>
                                                                    <td>SSC</td>
                                                                    <td><?php echo $row["sscUniv"];?></td>
                                                                    <td><?php echo $row["sscInst"];?></td>
                                                                    <td><?php echo $row["sscYear"];?></td>
                                                                    <td><?php echo $row["sscPer"];?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="work experience" role="tabpanel">
                                    <div class="card-body">

                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.NO</th>
                                                                    <th>INSTITUTE</th>
                                                                    <th>DESIGNATION</th>
                                                                    <th>JOINING DATE</th>
                                                                    <th>RELEIVING DATE</th>
                                                                    <th>TOTAL DURATION</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php


                                                                    $sql = "SELECT * FROM faculty_experience WHERE facJntuId='$facJntuId';";

                                                                    $result = $connect->query($sql);
                                                                    $i=1;
                                                                    $texp=0;
                                                                    if ($result->num_rows > 0) {

                                                                        while($row = $result->fetch_assoc()) {

                                                                            $exp = ($row["expRel"]-$row["expJoin"]);
                                                                            $texp = $texp+$exp;
                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $i;$i++;?></th>
                                                                    <td><?php echo $row["expInst"];?></td>
                                                                    <td><?php echo $row["expDesig"];?></td>
                                                                    <td><?php echo $row["expJoin"];?></td>
                                                                    <td><?php echo $row["expRel"];?></td>
                                                                    <td><?php echo $exp;?></td>
                                                                </tr>
                                                                <?php }}?>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>TOTAL EXPERIENCE</th>
                                                                    <td><?php echo $texp;?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <!--second tab-->
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                <div class="col-lg-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#research publications" role="tab">Research Publications</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#research project" role="tab">Research Project</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#books published" role="tab">Books Published</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#doctorial guidance" role="tab">Doctorial Guidance</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane  active" id="research publications" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.NO</th>
                                                                    <th>TITLE OF PAPER</th>
                                                                    <th>JOURNAL NAME</th>
                                                                    <th>VOLUME,ISSUE &amp; DATE</th>
                                                                    <th>ISSN</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php


                                                                    $sql = "SELECT * FROM faculty_research_publications WHERE facJntuId='$facJntuId';";

                                                                    $result = $connect->query($sql);
                                                                    $i=1;
                                                                    if ($result->num_rows > 0) {

                                                                        while($row = $result->fetch_assoc()) {

                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $i;$i++;?></th>
                                                                    <td><?php echo $row["resTitle"];?></td>
                                                                    <td><?php echo $row["resJournal"];?></td>
                                                                    <td><?php echo $row["resVol"].",".$row["resIssue"].",".$row["resDate"];?></td>
                                                                    <td><?php echo $row["resIssn"];?></td>
                                                                </tr>
                                                                <?php }}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="research project" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.NO</th>
                                                                    <th>PROJECT NAME</th>
                                                                    <th>PROJECT TEAM</th>
                                                                    <th>DURATION(YEARS)</th>
                                                                    <th>FUNDING AGENCY</th>
                                                                    <th>SANCTIONED AMOUNT</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php


                                                                    $sql = "SELECT * FROM faculty_research_project WHERE facJntuId='$facJntuId';";

                                                                    $result = $connect->query($sql);
                                                                    $i=1;
                                                                    if ($result->num_rows > 0) {

                                                                        while($row = $result->fetch_assoc()) {

                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $i;$i++;?></th>
                                                                    <td><?php echo $row["proName"];?></td>
                                                                    <td><?php echo $row["proTeam"];?></td>
                                                                    <td><?php echo $row["proDuration"];?></td>
                                                                    <td><?php echo $row["proFunding"];?></td>
                                                                    <td><?php echo $row["proSanctioned"];?></td>
                                                                </tr>
                                                                <?php }}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                    <!--third tab-->
                                <div class="tab-pane" id="books published" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.NO</th>
                                                                    <th>NAME OF BOOK</th>
                                                                    <th>NAME OF THE PUBLISHER</th>
                                                                    <th>ISBN NUMBER</th>
                                                                    <th>EDITION</th>
                                                                    <th>YEAR OF PUBLICATION</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php


                                                                    $sql = "SELECT * FROM faculty_books_published WHERE facJntuId='$facJntuId';";

                                                                    $result = $connect->query($sql);
                                                                    $i=1;
                                                                    if ($result->num_rows > 0) {

                                                                        while($row = $result->fetch_assoc()) {

                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $i;$i++;?></th>
                                                                    <td><?php echo $row["bookTitle"];?></td>
                                                                    <td><?php echo $row["bookPublisher"];?></td>
                                                                    <td><?php echo $row["bookIsbn"];?></td>
                                                                    <td><?php echo $row["bookEdition"];?></td>
                                                                    <td><?php echo $row["bookYear"];?></td>
                                                                </tr>
                                                                <?php }}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>

                                    </div>
                                </div>
                                    <!--fourth tab-->
                                <div class="tab-pane" id="doctorial guidance" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.NO</th>
                                                                    <th>UNIVERSITY NAME</th>
                                                                    <th>RESEARCH SCHOLAR NAME</th>
                                                                    <th>THESIS TITLE</th>
                                                                    <th>SPECIALIZATION</th>
                                                                    <th>STATUS</th>
                                                                    <th>YEAR OF REGISTRATION</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php


                                                                    $sql = "SELECT * FROM faculty_doctorial WHERE facJntuId='$facJntuId';";

                                                                    $result = $connect->query($sql);
                                                                    $i=1;
                                                                    if ($result->num_rows > 0) {

                                                                        while($row = $result->fetch_assoc()) {

                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $i;$i++;?></th>
                                                                    <td><?php echo $row["docUniv"];?></td>
                                                                    <td><?php echo $row["docSchName"];?></td>
                                                                    <td><?php echo $row["docThesis"];?></td>
                                                                    <td><?php echo $row["docSpec"];?></td>
                                                                    <td><?php echo $row["docStatus"];?></td>
                                                                    <td><?php echo $row["docYear"];?></td>
                                                                </tr>
                                                                <?php }}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                <div class="col-lg-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#workshops attended" role="tab">WORKSHOPS ATTENDED</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#society memberships" role="tab">SOCIETY MEMBERSHIPS</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#achievements" role="tab">ACHIEVEMENTS</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane  active" id="workshops attended" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.NO</th>
                                                                    <th>NAME OF WORKSHOP</th>
                                                                    <th>VENUE</th>
                                                                    <th>START DATE</th>
                                                                    <th>END DATE</th>
                                                                    <th>CERTIFICATE ISSUED OR NOT</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php


                                                                    $sql = "SELECT * FROM faculty_workshops WHERE facJntuId='$facJntuId';";

                                                                    $result = $connect->query($sql);
                                                                    $i=1;
                                                                    if ($result->num_rows > 0) {

                                                                        while($row = $result->fetch_assoc()) {

                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $i;$i++;?></th>
                                                                    <td><?php echo $row["wsName"];?></td>
                                                                    <td><?php echo $row["wsVenue"];?></td>
                                                                    <td><?php echo $row["wsStart"];?></td>
                                                                    <td><?php echo $row["wsEnd"];?></td>
                                                                    <td><?php echo $row["wsCertificate"];?></td>
                                                                </tr>
                                                                <?php }}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="society memberships" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.NO</th>
                                                                    <th>NAME OF THE SOCIETY</th>
                                                                    <th>MEMBERSHIP ID</th>
                                                                    <th>TYPE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php


                                                                    $sql = "SELECT * FROM faculty_society WHERE facJntuId='$facJntuId';";

                                                                    $result = $connect->query($sql);
                                                                    $i=1;
                                                                    if ($result->num_rows > 0) {

                                                                        while($row = $result->fetch_assoc()) {

                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $i;$i++;?></th>
                                                                    <td><?php echo $row["socName"];?></td>
                                                                    <td><?php echo $row["socId"];?></td>
                                                                    <td><?php echo $row["socType"];?></td>
                                                                </tr>
                                                                <?php }}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                    <!--third tab-->
                                <div class="tab-pane" id="achievements" role="tabpanel">
                                    <div class="card-body">
                                        <div class="col-lg-9">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.NO</th>
                                                                    <th>NAME OF ACHIEVEMENT</th>
                                                                    <th>SCOPE</th>
                                                                    <th>YEAR &AMP; DATE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php


                                                                    $sql = "SELECT * FROM faculty_achievements WHERE facJntuId='$facJntuId';";

                                                                    $result = $connect->query($sql);
                                                                    $i=1;
                                                                    if ($result->num_rows > 0) {

                                                                        while($row = $result->fetch_assoc()) {

                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $i;$i++;?></th>
                                                                    <td><?php echo $row["achName"];?></td>
                                                                    <td><?php echo $row["achScope"];?></td>
                                                                    <td><?php echo $row["achDate"];?></td>
                                                                </tr>
                                                                <?php }}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                        </div>

                                    </div>
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

    <div class="modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="changePassModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <form action="hod/change_pass.php" method="post" novalidate="novalidate">
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
