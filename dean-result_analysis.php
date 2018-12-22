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
        history.replaceState("", "", "dean-result_analysis.php");
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
                    <h3 class="text-primary">View Attendance</h3> </div>
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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Add Results</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="dean-result_analysis.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Batch</label>
                                            <select class="form-control" name="batch">

												<?php
                                                    $sql = "SELECT DISTINCT batch FROM student_details ORDER BY batch DESC;";

                                                    $result = $connect->query($sql);
                                                    $i = 0;
                                                    if($result->num_rows > 0){
                                                        while($row = $result->fetch_assoc()){
                                                            echo "<option>".$row["batch"]."</option>";
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
                                <h4 class="card-title">Analysis of Students</h4>
                                <h6 class="card-subtitle">Total Marks, Percentage, No of Backlogs &amp; Total Credits of the Student.</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>HTNO</th>
                                                <th>TOTAL</th>
                                                <th>PERCENTAGE</th>
                                                <th>NO OF BACKLOGS</th>
                                                <th>TOTAL CREDITS</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>HTNO</th>
                                                <th>TOTAL</th>
                                                <th>PERCENTAGE</th>
                                                <th>NO OF BACKLOGS</th>
                                                <th>TOTAL CREDITS</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php

                                                $branch = $_POST["branch"];
                                                $year = $_POST["year"];
                                                $sem = $_POST["sem"];
                                                $batch = $_POST["batch"];
                                                //include('connection.php');//$table_name = $_POST["batch"]."_results";

                                                $arr = "SELECT DISTINCT subj_code, credits FROM 15_results WHERE credits>0 AND year = '$year' AND sem = '$sem' AND htno LIKE '$batch%%' AND branch = '$branch';";

                                                $arr_result = $connect->query($arr);


                                                $store_data=array();
                                                $assoc=$sub_arr=array();$c=array();$i=0;$count=0;

                                                if($arr_result->num_rows > 0){
                                                    while($row = mysqli_fetch_array($arr_result)){
                                                        $sub_arr[$i] = $row["subj_code"];
                                                        $c[$i]=$row["credits"];  $i++;
                                                    }
                                                }



                                                $sql_htno = "SELECT DISTINCT htno FROM student_details WHERE  branch = '$branch' AND batch = '$batch'";

                                                $result_htno = $connect->query($sql_htno);
                                                if ($result_htno->num_rows > 0) {

                                                while($row_htno = $result_htno->fetch_assoc()) {

                                                $htno = $row_htno["htno"];
                                                $sql_marks = "SELECT * FROM 15_results WHERE type = 0 AND htno = '$htno' AND sem = '$sem' AND year = '$year'";

                                                $result_marks = $connect->query($sql_marks);

                                                $sum = 0;
                                                $sum_credits = 0;
                                                $count = 0;
                                                $total_marks = 0;

                                                if ($result_marks->num_rows > 0) {

                                                    while($row_marks = $result_marks->fetch_assoc()) {
                                                        if($row_marks["type"] == 0 && $row_marks["credits"] == 0){
                                                            $subj = $row_marks["subj_code"];
                                                            $sql_supply = "SELECT * FROM 15_results WHERE type = '1' and credits > 0 and htno = '$htno' and subj_code = '$subj';";

                                                            $result_supply = $connect->query($sql_supply);

                                                            $row_supply = $result_supply->fetch_assoc();

                                                            if(isset($row_supply)){
                                                                $internal = $row_supply["internal"];
                                                                $external = $row_supply["external"];
                                                                $total = $row_supply["total"];
                                                                $credits = $row_supply["credits"];
                                                                if($credits == 2){
                                                                    $total_marks = $total_marks+75;
                                                                }else if($credits == 4){
                                                                    $total_marks = $total_marks+100;
                                                                }
                                                                $sum = $sum+$total;
                                                                $sum_credits = $sum_credits+$credits;
                                                            }
                                                            else{
                                                                $internal = $row_marks["internal"];
                                                                $external = $row_marks["external"];
                                                                $total = $row_marks["total"];
                                                                $sum = $sum+$total;
                                                                $credits = 0;
                                                                $sum_credits = $sum_credits+$credits;
                                                                $count = $count+1;
                                                                for($k=0;$k<count($sub_arr);$k++){
                                                                    if($sub_arr[$k] == $subj){
                                                                        $credits = $c[$k];
                                                                    }
                                                                }
                                                                if($credits == 2){
                                                                    $total_marks = $total_marks+75;
                                                                }else if($credits == 4){
                                                                    $total_marks = $total_marks+100;
                                                                }
                                                                //$total_marks = $total_marks+$store_data[$subj];

                                                            }

                                                        }
                                                        else{
                                                            $internal = $row_marks["internal"];
                                                            $external = $row_marks["external"];
                                                            $total = $row_marks["total"];
                                                            $credits = $row_marks["credits"];
                                                            $sum = $sum+$total;
                                                            $sum_credits = $sum_credits+$credits;
                                                            if($credits == 2){
                                                                $total_marks = $total_marks+75;
                                                            }else if($credits == 4){
                                                                $total_marks = $total_marks+100;
                                                            }
                                                        }

                                                    }
                                                    $percentage = round((($sum/$total_marks)*100),2);
                                                }
                                                if($total_marks != 0){

                                            ?>
                                            <tr>
                                                <td><?php echo $htno;?></td>
                                                <td><?php echo $sum;?></td>
                                                <td><?php echo $percentage."%";?></td>
                                                <td><?php echo $count;?></td>
                                                <td><?php echo $sum_credits;?></td>
                                            </tr>
                                            <?php }}}?>
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
                                <h4 class="card-title">ANALYSIS of Students</h4>
                                <h6 class="card-subtitle">Total Results of the Student</h6>
                                <div class="table-responsive m-t-40">
                                  <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                      <thead>
                                          <tr>
                                              <th>HTNO</th>
                                              <th>GRADE</th>
                                              <th>GPA</th>
                                              <th>NO OF BACKLOGS</th>
                                          </tr>
                                      </thead>
                                      <tfoot>
                                          <tr>
                                              <th>HTNO</th>
                                              <th>GRADE</th>
                                              <th>GPA</th>
                                              <th>NO OF BACKLOGS</th>
                                          </tr>
                                      </tfoot>
                                      <tbody>
                                          <?php

                                              $branch = $_POST["branch"];
                                              $year = $_POST["year"];
                                              $sem = $_POST["sem"];
                                              $batch = $_POST["batch"];
                                              //$table_name = $_POST["batch"]."_results";

                                              include('connection.php');
                                              $sql_htno = "SELECT DISTINCT htno FROM student_details WHERE batch = '$batch' and branch = '$branch'";

                                              $result_htno = $connect->query($sql_htno);
                                              if ($result_htno->num_rows > 0) {

                                              while($row_htno = $result_htno->fetch_assoc()) {

                                              $htno = $row_htno["htno"];
                                              $sql_marks = "SELECT * FROM 16_results WHERE type = 0 and htno = '$htno' AND year = '$year' AND sem = '$sem'";

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
                                              <td><?php echo $htno;?></td>
                                              <td><?php echo $grade;?></td>
                                              <td><?php echo $gpa_ac;?></td>
                                              <td><?php echo $supply_count;?></td>
                                          </tr>
                                          <?php }}}?>
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
    <script>
        window.onload = function() {
            history.replaceState("", "", "dean-result_analysis.php");
        }
    </script>
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
