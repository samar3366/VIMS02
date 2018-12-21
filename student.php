<?php
    if(isset($_COOKIE['id']))
    {
        session_id($_COOKIE['id']);
    }
    session_start();

    if($_SESSION['htno'] == null){
        header("Location:student-login.php");
    }
    include('connection.php');
    $htno=$_SESSION['htno'];
?>
<?php
if(isset($_POST['uploadpic'])){
   if(!empty($_FILES['propic']['tmp_name'])&&file_exists($_FILES['propic']['tmp_name'])){
      $image= addslashes(file_get_contents($_FILES['propic']['tmp_name']));
      $query=mysqli_query($connect,"update student_details set propic='$image' where htno='$htno'");
      if ($query) {
      header("Location: student.php");
      } else {
       echo "Error:".mysqli_error($connect);
      }
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
    <title>Student Portal</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript">
        window.onload = function() {
        history.replaceState("", "", "student.php");
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
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="images/student1.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <!--<span><img src="images/stuent.png" alt="homepage" style="width:75px;height:75px;" class="dark-logo" /></span> -->
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Search
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li> -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <!-- display propic -->
                              <?php
                              $res=mysqli_query($connect,"select * from student_details where htno='$htno'");
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
                                    <li><a href="student-change_password.php"><i class="fa fa-edit"></i> Change Password</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="student/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
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
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="student.php">Profile </a></li>
                            </ul>
                        </li>
                        <li class="nav-label">View Details</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Results</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="student-marks_table.php">Marks Table</a></li>
                                <li><a href="student-marks_analysis.php">Analysis</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Attendance</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="student-view_att.php">View Attendance</a></li>
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
                    <h3 class="text-primary">Profile</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="student.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                                          <!-- display propic -->
                                          <?php
                                          $res=mysqli_query($connect,"select * from student_details where htno='$htno'");
                                          while($row=mysqli_fetch_array($res))
                                          {
                                           if($row['propic']==NULL) {echo "<img src='images/Student2.png'>";}
                                           else{
                                             echo '<img style="border-radius:50%; padding-top:0px;" id="profile-image1" class="img img-responsive" src="data:image/jpeg;base64,'.base64_encode($row['propic'] ).'" />';
                                           }
                                          }
                                          ?>
                                          <!-- display propic -->
                                        </div>
                                        <a href="#changePropic" data-toggle="modal" data-target="#changePropic" class="text-info"><i class="fa fa-upload"></i>Upload Picture</a><br>
                                    </header>
                                    <?php

                                        include('connection.php');
                                        $htno = $_SESSION["htno"];
                                        $sql = "SELECT * FROM student_details WHERE htno='$htno';";

                                        $result = $connect->query($sql);

                                        if ($result->num_rows > 0) {

                                            while($row = $result->fetch_assoc()) {
                                    ?>



                                    <h3><?php echo $row["name"]." - ".$row["htno"];?></h3>
                                    <div class="desc">

                                        <?php echo $row["batch"].",".$row["branch"]."-".$row["section"]."<br>".
                                        "Mobile No:".$row["number"].","."Mail Id:".$row["mail"];?>
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
                                        $htno = $_SESSION["htno"];
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
                        <div class="card"> -->
                            <!-- Nav tabs -->
                            <!-- <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#courses" role="tab">Courses/Workshops</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#certificates" role="tab">Certificates</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#projects" role="tab">Projects</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#skills" role="tab">Skills</a> </li>
                            </ul> -->
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


                                                                    $sql = "SELECT * FROM student_courses WHERE htno='$htno';";

                                                                    $result = $connect->query($sql);
                                                                    $i=1;
                                                                    if ($result->num_rows > 0) {

                                                                        while($row = $result->fetch_assoc()) {

                                                                ?>
                                                                <tr>
                                                                    <th><?php echo $i;$i++;?></th>
                                                                    <td><?php echo $row["title"];?></td>
                                                                    <td><?php echo $row["online_offline"];?></td>
                                                                    <td><?php echo $row["organized_by"];?></td>
                                                                    <td><?php echo $row["instructor"];?></td>
                                                                    <td><?php echo $row["time_duration"];?></td>
                                                                </tr>
                                                                <?php }}?>
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
                                </div> -->
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
                                                                    <th>Domain</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php


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


                                                                    // $sql = "SELECT * FROM student_skill WHERE htno='$htno';";
                                                                    //
                                                                    // $result = $connect->query($sql);
                                                                    // $i=1;
                                                                    // if ($result->num_rows > 0) {
                                                                    //
                                                                    //     while($row = $result->fetch_assoc()) {

                                                                ?>
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
                                </div> -->

                            </div>
                        </div>
                    </div> -->

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

    <!-- change propic -->
    <div class="modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="changePropic">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                    <h5 class="modal-title">Change Your Profile Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="form-group">
                                <label for="propic">Select Your Profile Picture</label>
                                <input type="file"  name="propic" id="propic"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" name="uploadpic" class="btn btn-primary">Upload</button>
                    </div>
                </form>
          </div>
        </div>
      </div>
    <!-- change propic -->
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/lib/form-validation/jquery.validate.min.js"></script>
    <script src="js/lib/form-validation/jquery.validate.unobtrusive.min.js"></script>
    <script src="js/lib/jquery.nicescroll/jquery.nicescroll.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- <script src="js/block/javascript.js"></script> -->

</body>

</html>
