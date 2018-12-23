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
    $htno = $_SESSION["htno"];
    $sql = "SELECT * FROM student_details WHERE htno = '$htno'";

    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
    $batch = $row["batch"];
    $branch = $row["branch"];
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
        history.replaceState("", "", "student-marks_analysis.php");
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
                               else echo '<img style="border-radius:50%; width:25px; height:25px; object-fit: cover;" id="profile-image1" class="img img-responsive profile-pic" src="data:image/jpeg;base64,'.base64_encode($row['propic'] ).'" />';
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
                        <!-- <li class="nav-label">Manage</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Accomplishments </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="student-certificates.php">Certificates</a></li>
                                <li><a href="studentcourses.php">Courses</a></li>
                                <li><a href="student-projects.php">Projects</a></li>
                                <li><a href="student-skills.php">Skills</a></li>
                            </ul>
                        </li> -->
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
                    <h3 class="text-primary">Sem-wise Marks Table</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="student-marks_analysis.php">View Details</a></li>
                        <li class="breadcrumb-item active">Results</li>
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
                                <h4 class="card-title">Semester Total</h4>
                                <h6 class="card-subtitle">Total Results of the Student</h6>
                                <div class="table-responsive m-t-40">
                                    <?php if($batch <=15){?>
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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
                                                $backlogs=0;
                                                $total_credits=0;
                                                for ($x = 0; $x < 4; $x++) {
                                                    for ($y = 0; $y < 2; $y++) {
                                            ?>
                                            <?php

                                                $htno = $_SESSION['htno'];
                                                //include('connection.php');
                                                //$table_name = $batch."_results";
                                                $year_st = $year[$x];
                                                $sem_st = $sem[$y];


                                                $arr = "SELECT DISTINCT subj_code, credits FROM 15_results WHERE credits>0 AND year = '$year_st' AND sem = '$sem_st' AND htno LIKE '$batch%%' AND branch = '$branch';";

                                                $arr_result = $connect->query($arr);


                                                $store_data=array();
                                                $assoc=$sub_arr=array();$c=array();$i=0;$count=0;

                                                if($arr_result->num_rows > 0){
                                                    while($row = mysqli_fetch_array($arr_result)){
                                                        $sub_arr[$i] = $row["subj_code"];
                                                        $c[$i]=$row["credits"];  $i++;
                                                    }
                                                }
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

                                                                for($k=0;$k<count($sub_arr);$k++){
                                                                    if($sub_arr[$k] == $subj){
                                                                        $credits = $c[$k];
                                                                    }
                                                                }
                                                                if($credits == 2 ){
                                                                    $total_marks = $total_marks+75;
                                                                }else if($credits == 4 ){
                                                                    $total_marks = $total_marks+100;
                                                                }
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
                                                if($year_st == "I" && $sem_st == "I" && $total_marks > 0){
                                                  $total_marks = 1000;

                                                }
                                                $total_credits = $total_credits + $sum_credits;
                                                $backlogs = $backlogs + $count;
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
                                            <tr>
                                                <th>#</th>
                                                <th colspan="2">TOTAL BACKLOGS:</th>
                                                <td><?php echo $backlogs;?></td>
                                                <th>TOTAL CREDITS:</th>
                                                <td><?php echo $total_credits;?></td>
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
