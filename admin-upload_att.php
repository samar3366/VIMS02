<?php
    if(isset($_COOKIE['id']))
    {
        session_id($_COOKIE['id']);
    }

    session_start();

    if($_SESSION['id'] == null){
        header("Location:admin-login.php");
    }
?>
<?php
error_reporting(0);
include('connection.php');
$output = $success=$error='';
$print='';
ini_set('max_execution_time', 1000);
if(isset($_POST["upload"])){
  if(!empty($_POST["batch"])&&!empty($_POST["dept"])&&!empty($_POST["year"])&&!empty($_POST["sem"])&&$_POST["batch"]!="Select any:"&&$_POST["dept"]!="Select any:"&&$_POST["year"]!="Select any:"&&$_POST["sem"]!="Select any:"){
    //make a table name
    $batch=$_POST['batch'];$dept=$_POST['dept'];$year=$_POST['year'];$sem=$_POST['sem'];
    $tbl_name = $batch."_".$dept."_".$year."_".$sem."_attendance";
    $sql="CREATE TABLE `$tbl_name` (
    id int auto_increment not null primary key,
    sno varchar(10),
    hno  varchar(15) not null,
    s1 varchar(10),s2 varchar(10),s3 varchar(10),s4 varchar(10),s5 varchar(10),
    s6 varchar(10),s7 varchar(10),s8 varchar(10),s9 varchar(10),s10 varchar(10),
    s11 varchar(10),s12 varchar(10),spell varchar(5))";
    $res=mysqli_query($connect,$sql);
    if($res){
      $extension = end(explode(".", $_FILES["excelfile"]["name"])); // For getting Extension of selected file
      $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
      if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
      {
       $file = $_FILES["excelfile"]["tmp_name"]; // getting temporary source of excel file
       include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
       $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
       foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
       {
        $highestRow = $worksheet->getHighestRow();
        for($row=2; $row<=$highestRow; $row++)
        {
         $sno = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
         $hno = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
         $s1 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
         $s2 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
         $s3 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
         $s4 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
         $s5 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
         $s6 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
         $s7 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
         $s8 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
         $s9 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
         $s10 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
         $s11 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
         $s12 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());

         if($s1!=NULL){
        //to avoid empty data fields in table
         $query = "insert into `$tbl_name` (sno,hno,s1,s2,s3,s4,s5,s6,s7,s8,s9,s10,s11,s12,spell)
         values ('$sno','$hno','$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8',
         '$s9','$s10','$s11','$s12','1')";
         $result=mysqli_query($connect, $query);
         if(!$res){
           $output.=  mysqli_query($connect);
         }else{
           $success="Uploaded Attendance Successfully!!!";
         }//if query executed successfully
        }

       }//for
     }//for

   }//end of if statement [if it is an excel file]
      else
      {
       $output.= '<label class="text-danger">Invalid File</label>'; //if non excel file then
      }
    }
    //prints error message if table is not created
    else{
      $output.= mysqli_error($connect);
    }


 }// all the values are selected are not ex: dept,year,bat,sem etc.,
 else $output.= '<label class="text-danger">Please Select All the Fields</label>';
}// submit button set
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
    <title>Admin Portal</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript">
        window.onload = function() {
        history.replaceState("", "", "admin-upload_att.php");
        }
    </script>
    <script type="text/javascript" src="javascript.js"></script>
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">-->
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
                        <b><img src="images/admin1.png" alt="homepage" class="dark-logo" /></b>
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
                                    <li><a href="javascript:;" data-toggle="modal" data-target="#changePassModal"><i class="ti-user"></i> Change Password</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="admin/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
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
                                <li><a href="admin.php">Profile </a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-label">View Details</li>
                        <li> <a href="admin-view_students.php" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Student</span></a>
                        </li>
                        <li> <a href="admin-view_faculty.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Faculty</span></a>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Exam Cell</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="admin-view_results.php">View Results</a></li>
                                <li><a href="admin-result_analysis.php">Result Analysis</a></li>
                                <li><a href="admin-subject_analysis.php">Subject Analysis</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Attendance</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="admin-view_att.php">View Attendance</a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li class="nav-label">Manage</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Student</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="admin-add_student.php">Add Students</a></li>
                                <li><a href="admin-add_student_details.php">Add Details</a></li>
                                <li> <a class="has-arrow" href="#" aria-expanded="false">Edit</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="admin-edit_student.php">Edit Students</a></li>
                                        <li><a href="admin-edit_student_personal_details.php">Edit Personal Details</a></li>
                                        <li><a href="admin-edit_student_contact_details.php">Edit Contact Details</a></li>
                                        <li><a href="admin-edit_student_past_academics.php">Edit Past Academics</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Faculty</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="admin-add_faculty.php">Add Faculty</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Exam Cell</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="admin-upload_results.php">Upload Results</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Attendance</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="admin-upload_att.php">Upload Attendance</a></li>
                                <li><a href="admin-update_att.php">Update Attendance</a></li>
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
                    <h3 class="text-primary">Upload Attendance</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-upload_att.php">Manage</a></li>
                        <li class="breadcrumb-item"><a href="admin-upload_att.php">Attendance</a></li>
                        <li class="breadcrumb-item active">Upload Attendance</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-6">
                        <?php if($output!=''){
                          echo '<div style="background-color:#ffffff;" class="well well-sm text-danger">'.$output.'</div>';
                        } ?>
                        <?php if($success!=''){
                          echo '<div style="background-color:#ffffff;" class="well well-sm text-info">'.$success.'</div>';
                        } ?>
                        <div class="card">
                            <div class="card-title">
                                <h4>Upload Attendance</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post"
                                    action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                                    enctype="multipart/form-data">
                                         <div class="form-group">
                                            <label>Batch</label>
                                            <select class="form-control" name="batch" required>
                                                <option>Select any:</option>
								                                <option>2004_2008</option>
                                                <option>2005_2009</option>
                                                <option>2006_2010</option>
                                                <option>2007_2011</option>
                                                <option>2008_2012</option>
                                                <option>2009_2013</option>
                                                <option>2010_2014</option>
                                                <option>2011_2015</option>
                                                <option>2012_2016</option>
                                                <option>2013_2017</option>
                                                <option>2014_2018</option>
                                                <option>2015_2019</option>
                                                <option>2016_2020</option>
                                                <option>2017_2021</option>
                                                <option>2018_2022</option>
                                                <option>2019_2023</option>
                                                <option>2020_2024</option>
                                                <option>2021_2025</option>
                                                <option>2022_2026</option>
                                                <option>2023_2027</option>
                                                <option>2024_2028</option>
                                                <option>2025_2029</option>
                                                <option>2026_2030</option>
                                                <option>2027_2031</option>
                                                <option>2028_2032</option>
                                                <option>2029_2033</option>
                                                <option>2030_2034</option>
								            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select class="form-control" name="dept" required>
                                                <option>Select any:</option>
								                                <option>cse_a</option>
                                                <option>cse_b</option>
                                                <option>cse_c</option>
                                                <option>civil_a</option>
                                                <option>civil_b</option>
                                                <option>civil_c</option>
                                                <option>ece_a</option>
                                                <option>ece_b</option>
                                                <option>ece_c</option>
                                                <option>eee_a</option>
                                                <option>eee_b</option>
                                                <option>eee_c</option>
                                                <option>eie_a</option>
                                                <option>eie_b</option>
                                                <option>eie_c</option>
                                                <option>mech_a</option>
                                                <option>mech_b</option>
                                                <option>mech_c</option>
								            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Year</label>
                                            <select class="form-control" name="year" required>
                                                <option>Select any:</option>
								                                <option>I</option>
                                                <option>II</option>
                                                <option>III</option>
                                                <option>IV</option>
								            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <select class="form-control" name="sem" required>
                                                <option>Select any:</option>
								                                <option>I</option>
                                                <option>II</option>
								            </select>
                                        </div>
                                        <input type="file" name="excelfile" required>
                                        <button type="submit" name="upload" class="btn btn-info m-b-10 m-l-5">Upload Sheet</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
           <footer class="footer"> © 2018 Vignan's Institute Management System, Developed by CSE Dept &amp; Theme by <a href="https://colorlib.com">Colorlib</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>

    <div class="modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="changePassModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <form action="admin/change_pass.php" method="post" novalidate="novalidate">
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
      </div>Select any:
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


<!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
-->

</body>

</html>
