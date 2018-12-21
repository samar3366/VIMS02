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
//$hdept=$_SESSION['pid'];
?>
<?php
//get the tables names
$x="select min(AttPercentage) as min,count(hno) as c from(
select hno,sum(Stot) as TotalAttended,sum(Stot1) as TotalConducted,(sum(Stot)/sum(Stot1))*100 as AttPercentage,'a' as Section from(
select * from(
select hno,Spell,sum(s1)+sum(s2)+sum(s3)+sum(s4)+sum(s5)+sum(s6)+sum(s7)+sum(s8)+sum(s9)+sum(s10)+sum(s11)+sum(s12) as Stot from (
select hno,Spell,sum(case when s1='' then 0 else s1 end) as s1,sum(case when s2='' then 0 else s2 end) as s2,sum(case when s3='' then 0 else s3 end) as s3,sum(case when s4='' then 0 else s4 end) as s4,sum(case when s5='' then 0 else s5 end) as s5,sum(case when s6='' then 0 else s6 end) as s6,sum(case when s7='' then 0 else s7 end) as s7,sum(case when s8='' then 0 else s8 end) as s8,sum(case when s9='' then 0 else s9 end) as s9,sum(case when s10='' then 0 else s10 end) as s10,sum(case when s11='' then 0 else s11 end) as s11,sum(case when s12='' then 0 else s12 end) as s12 from `2015_2019_cse_a_IV_I_attendance` where spell between 1 and 6 and hno not in ('HTNO/TotalClass','SubjectCode') group by hno,Spell) as k group by hno,Spell) as l left outer join (
select hno as hno1,Spell as Spell1,sum(s1)+sum(s2)+sum(s3)+sum(s4)+sum(s5)+sum(s6)+sum(s7)+sum(s8)+sum(s9)+sum(s10)+sum(s11)+sum(s12) as Stot1 from (
select hno,Spell,sum(case when s1='' then 0 else s1 end) as s1,sum(case when s2='' then 0 else s2 end) as s2,sum(case when s3='' then 0 else s3 end) as s3,sum(case when s4='' then 0 else s4 end) as s4,sum(case when s5='' then 0 else s5 end) as s5,sum(case when s6='' then 0 else s6 end) as s6,sum(case when s7='' then 0 else s7 end) as s7,sum(case when s8='' then 0 else s8 end) as s8,sum(case when s9='' then 0 else s9 end) as s9,sum(case when s10='' then 0 else s10 end) as s10,sum(case when s11='' then 0 else s11 end) as s11,sum(case when s12='' then 0 else s12 end) as s12 from `2015_2019_cse_a_IV_I_attendance` where spell between 1 and 6 and hno in ('HTNO/TotalClass') group by hno,Spell) as k1 group by hno,Spell) as l1 on l.Spell=l1.Spell1) as ta group by hno
union all
select hno,sum(Stot) as TotalAttended,sum(Stot1) as TotalConducted,(sum(Stot)/sum(Stot1))*100 as AttPercentage,'b' as Section from(
select * from(
select hno,Spell,sum(s1)+sum(s2)+sum(s3)+sum(s4)+sum(s5)+sum(s6)+sum(s7)+sum(s8)+sum(s9)+sum(s10)+sum(s11)+sum(s12) as Stot from (
select hno,Spell,sum(case when s1='' then 0 else s1 end) as s1,sum(case when s2='' then 0 else s2 end) as s2,sum(case when s3='' then 0 else s3 end) as s3,sum(case when s4='' then 0 else s4 end) as s4,sum(case when s5='' then 0 else s5 end) as s5,sum(case when s6='' then 0 else s6 end) as s6,sum(case when s7='' then 0 else s7 end) as s7,sum(case when s8='' then 0 else s8 end) as s8,sum(case when s9='' then 0 else s9 end) as s9,sum(case when s10='' then 0 else s10 end) as s10,sum(case when s11='' then 0 else s11 end) as s11,sum(case when s12='' then 0 else s12 end) as s12 from `2015_2019_cse_b_IV_I_attendance` where spell between 1 and 6 and hno not in ('HTNO/TotalClass','SubjectCode') group by hno,Spell) as k group by hno,Spell) as l left outer join (
select hno as hno1,Spell as Spell1,sum(s1)+sum(s2)+sum(s3)+sum(s4)+sum(s5)+sum(s6)+sum(s7)+sum(s8)+sum(s9)+sum(s10)+sum(s11)+sum(s12) as Stot1 from (
select hno,Spell,sum(case when s1='' then 0 else s1 end) as s1,sum(case when s2='' then 0 else s2 end) as s2,sum(case when s3='' then 0 else s3 end) as s3,sum(case when s4='' then 0 else s4 end) as s4,sum(case when s5='' then 0 else s5 end) as s5,sum(case when s6='' then 0 else s6 end) as s6,sum(case when s7='' then 0 else s7 end) as s7,sum(case when s8='' then 0 else s8 end) as s8,sum(case when s9='' then 0 else s9 end) as s9,sum(case when s10='' then 0 else s10 end) as s10,sum(case when s11='' then 0 else s11 end) as s11,sum(case when s12='' then 0 else s12 end) as s12 from `2015_2019_cse_b_IV_I_attendance` where spell between 1 and 6 and hno in ('HTNO/TotalClass') group by hno,Spell) as k1 group by hno,Spell) as l1 on l.Spell=l1.Spell1) as ta group by hno
union all
select hno,sum(Stot) as TotalAttended,sum(Stot1) as TotalConducted,(sum(Stot)/sum(Stot1))*100 as AttPercentage,'c' as Section from(
select * from(
select hno,Spell,sum(s1)+sum(s2)+sum(s3)+sum(s4)+sum(s5)+sum(s6)+sum(s7)+sum(s8)+sum(s9)+sum(s10)+sum(s11)+sum(s12) as Stot from (
select hno,Spell,sum(case when s1='' then 0 else s1 end) as s1,sum(case when s2='' then 0 else s2 end) as s2,sum(case when s3='' then 0 else s3 end) as s3,sum(case when s4='' then 0 else s4 end) as s4,sum(case when s5='' then 0 else s5 end) as s5,sum(case when s6='' then 0 else s6 end) as s6,sum(case when s7='' then 0 else s7 end) as s7,sum(case when s8='' then 0 else s8 end) as s8,sum(case when s9='' then 0 else s9 end) as s9,sum(case when s10='' then 0 else s10 end) as s10,sum(case when s11='' then 0 else s11 end) as s11,sum(case when s12='' then 0 else s12 end) as s12 from `2015_2019_cse_c_IV_I_attendance` where spell between 1 and 6 and hno not in ('HTNO/TotalClass','SubjectCode') group by hno,Spell) as k group by hno,Spell) as l left outer join (
select hno as hno1,Spell as Spell1,sum(s1)+sum(s2)+sum(s3)+sum(s4)+sum(s5)+sum(s6)+sum(s7)+sum(s8)+sum(s9)+sum(s10)+sum(s11)+sum(s12) as Stot1 from (
select hno,Spell,sum(case when s1='' then 0 else s1 end) as s1,sum(case when s2='' then 0 else s2 end) as s2,sum(case when s3='' then 0 else s3 end) as s3,sum(case when s4='' then 0 else s4 end) as s4,sum(case when s5='' then 0 else s5 end) as s5,sum(case when s6='' then 0 else s6 end) as s6,sum(case when s7='' then 0 else s7 end) as s7,sum(case when s8='' then 0 else s8 end) as s8,sum(case when s9='' then 0 else s9 end) as s9,sum(case when s10='' then 0 else s10 end) as s10,sum(case when s11='' then 0 else s11 end) as s11,sum(case when s12='' then 0 else s12 end) as s12 from `2015_2019_cse_c_IV_I_attendance` where spell between 1 and 6 and hno in ('HTNO/TotalClass') group by hno,Spell) as k1 group by hno,Spell) as l1 on l.Spell=l1.Spell1) as ta group by hno) as s where AttPercentage<=65.00";

$result=mysqli_query($connect,$x);
if($result){
  while ($row=mysqli_fetch_array($result)){
     $c1=$row['c'];
  }
}


$y="select min(AttPercentage) as min,count(hno) as c from(
select hno,sum(Stot) as TotalAttended,sum(Stot1) as TotalConducted,(sum(Stot)/sum(Stot1))*100 as AttPercentage,'a' as Section from(
select * from(
select hno,Spell,sum(s1)+sum(s2)+sum(s3)+sum(s4)+sum(s5)+sum(s6)+sum(s7)+sum(s8)+sum(s9)+sum(s10)+sum(s11)+sum(s12) as Stot from (
select hno,Spell,sum(case when s1='' then 0 else s1 end) as s1,sum(case when s2='' then 0 else s2 end) as s2,sum(case when s3='' then 0 else s3 end) as s3,sum(case when s4='' then 0 else s4 end) as s4,sum(case when s5='' then 0 else s5 end) as s5,sum(case when s6='' then 0 else s6 end) as s6,sum(case when s7='' then 0 else s7 end) as s7,sum(case when s8='' then 0 else s8 end) as s8,sum(case when s9='' then 0 else s9 end) as s9,sum(case when s10='' then 0 else s10 end) as s10,sum(case when s11='' then 0 else s11 end) as s11,sum(case when s12='' then 0 else s12 end) as s12 from `2015_2019_cse_a_IV_I_attendance` where spell between 1 and 6 and hno not in ('HTNO/TotalClass','SubjectCode') group by hno,Spell) as k group by hno,Spell) as l left outer join (
select hno as hno1,Spell as Spell1,sum(s1)+sum(s2)+sum(s3)+sum(s4)+sum(s5)+sum(s6)+sum(s7)+sum(s8)+sum(s9)+sum(s10)+sum(s11)+sum(s12) as Stot1 from (
select hno,Spell,sum(case when s1='' then 0 else s1 end) as s1,sum(case when s2='' then 0 else s2 end) as s2,sum(case when s3='' then 0 else s3 end) as s3,sum(case when s4='' then 0 else s4 end) as s4,sum(case when s5='' then 0 else s5 end) as s5,sum(case when s6='' then 0 else s6 end) as s6,sum(case when s7='' then 0 else s7 end) as s7,sum(case when s8='' then 0 else s8 end) as s8,sum(case when s9='' then 0 else s9 end) as s9,sum(case when s10='' then 0 else s10 end) as s10,sum(case when s11='' then 0 else s11 end) as s11,sum(case when s12='' then 0 else s12 end) as s12 from `2015_2019_cse_a_IV_I_attendance` where spell between 1 and 6 and hno in ('HTNO/TotalClass') group by hno,Spell) as k1 group by hno,Spell) as l1 on l.Spell=l1.Spell1) as ta group by hno
union all
select hno,sum(Stot) as TotalAttended,sum(Stot1) as TotalConducted,(sum(Stot)/sum(Stot1))*100 as AttPercentage,'b' as Section from(
select * from(
select hno,Spell,sum(s1)+sum(s2)+sum(s3)+sum(s4)+sum(s5)+sum(s6)+sum(s7)+sum(s8)+sum(s9)+sum(s10)+sum(s11)+sum(s12) as Stot from (
select hno,Spell,sum(case when s1='' then 0 else s1 end) as s1,sum(case when s2='' then 0 else s2 end) as s2,sum(case when s3='' then 0 else s3 end) as s3,sum(case when s4='' then 0 else s4 end) as s4,sum(case when s5='' then 0 else s5 end) as s5,sum(case when s6='' then 0 else s6 end) as s6,sum(case when s7='' then 0 else s7 end) as s7,sum(case when s8='' then 0 else s8 end) as s8,sum(case when s9='' then 0 else s9 end) as s9,sum(case when s10='' then 0 else s10 end) as s10,sum(case when s11='' then 0 else s11 end) as s11,sum(case when s12='' then 0 else s12 end) as s12 from `2015_2019_cse_b_IV_I_attendance` where spell between 1 and 6 and hno not in ('HTNO/TotalClass','SubjectCode') group by hno,Spell) as k group by hno,Spell) as l left outer join (
select hno as hno1,Spell as Spell1,sum(s1)+sum(s2)+sum(s3)+sum(s4)+sum(s5)+sum(s6)+sum(s7)+sum(s8)+sum(s9)+sum(s10)+sum(s11)+sum(s12) as Stot1 from (
select hno,Spell,sum(case when s1='' then 0 else s1 end) as s1,sum(case when s2='' then 0 else s2 end) as s2,sum(case when s3='' then 0 else s3 end) as s3,sum(case when s4='' then 0 else s4 end) as s4,sum(case when s5='' then 0 else s5 end) as s5,sum(case when s6='' then 0 else s6 end) as s6,sum(case when s7='' then 0 else s7 end) as s7,sum(case when s8='' then 0 else s8 end) as s8,sum(case when s9='' then 0 else s9 end) as s9,sum(case when s10='' then 0 else s10 end) as s10,sum(case when s11='' then 0 else s11 end) as s11,sum(case when s12='' then 0 else s12 end) as s12 from `2015_2019_cse_b_IV_I_attendance` where spell between 1 and 6 and hno in ('HTNO/TotalClass') group by hno,Spell) as k1 group by hno,Spell) as l1 on l.Spell=l1.Spell1) as ta group by hno
union all
select hno,sum(Stot) as TotalAttended,sum(Stot1) as TotalConducted,(sum(Stot)/sum(Stot1))*100 as AttPercentage,'c' as Section from(
select * from(
select hno,Spell,sum(s1)+sum(s2)+sum(s3)+sum(s4)+sum(s5)+sum(s6)+sum(s7)+sum(s8)+sum(s9)+sum(s10)+sum(s11)+sum(s12) as Stot from (
select hno,Spell,sum(case when s1='' then 0 else s1 end) as s1,sum(case when s2='' then 0 else s2 end) as s2,sum(case when s3='' then 0 else s3 end) as s3,sum(case when s4='' then 0 else s4 end) as s4,sum(case when s5='' then 0 else s5 end) as s5,sum(case when s6='' then 0 else s6 end) as s6,sum(case when s7='' then 0 else s7 end) as s7,sum(case when s8='' then 0 else s8 end) as s8,sum(case when s9='' then 0 else s9 end) as s9,sum(case when s10='' then 0 else s10 end) as s10,sum(case when s11='' then 0 else s11 end) as s11,sum(case when s12='' then 0 else s12 end) as s12 from `2015_2019_cse_c_IV_I_attendance` where spell between 1 and 6 and hno not in ('HTNO/TotalClass','SubjectCode') group by hno,Spell) as k group by hno,Spell) as l left outer join (
select hno as hno1,Spell as Spell1,sum(s1)+sum(s2)+sum(s3)+sum(s4)+sum(s5)+sum(s6)+sum(s7)+sum(s8)+sum(s9)+sum(s10)+sum(s11)+sum(s12) as Stot1 from (
select hno,Spell,sum(case when s1='' then 0 else s1 end) as s1,sum(case when s2='' then 0 else s2 end) as s2,sum(case when s3='' then 0 else s3 end) as s3,sum(case when s4='' then 0 else s4 end) as s4,sum(case when s5='' then 0 else s5 end) as s5,sum(case when s6='' then 0 else s6 end) as s6,sum(case when s7='' then 0 else s7 end) as s7,sum(case when s8='' then 0 else s8 end) as s8,sum(case when s9='' then 0 else s9 end) as s9,sum(case when s10='' then 0 else s10 end) as s10,sum(case when s11='' then 0 else s11 end) as s11,sum(case when s12='' then 0 else s12 end) as s12 from `2015_2019_cse_c_IV_I_attendance` where spell between 1 and 6 and hno in ('HTNO/TotalClass') group by hno,Spell) as k1 group by hno,Spell) as l1 on l.Spell=l1.Spell1) as ta group by hno) as s where AttPercentage between 65.01 and 75.00";

$result=mysqli_query($connect,$y);
if($result){
  while ($row=mysqli_fetch_array($result)){
     $c2=$row['c'];
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
    <title>Principal Portal</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript">
        window.onload = function() {
        history.replaceState("", "", "principal.php");
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
                        <li class="nav-devider"></li>
                        <li class="nav-label">Manage</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Leaves <span class="label label-rounded label-info"><?php echo "5"; ?></span></span></a>
                            <ul aria-expanded="false" class="collapse">
                              <li><a href="principal-view_leaves.php">View Leaves</a></li>
                              <li><a href="principal-view-leaves_history.php">View Leaves History</a></li>
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                  <div class="row"><!-- 1st row starts here -->

                    <!-- CSE Table -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>CSE Attendance Analysis</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Batch</th>
                                                <th><= 65%</th>
                                                <th>65% - 75%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>2015-2019</td>
                                                <td class="color-primary">
                                                <?php
                                                echo $c1;
                                                ?>
                                                </td>
                                                <td class="color-primary">
                                                <?php
                                                echo $c2;
                                                ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>2016-2020</td>
                                                <td class="color-primary">21.56</td>
                                                <td class="color-primary">55.32</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>2017-2021</td>
                                                <td class="color-primary">14.85</td>
                                                <td class="color-primary">14.85</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CSE table ends -->


                    <!-- ECE Table -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>ECE Attendance Analysis</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Batch</th>
                                                <th><= 65%</th>
                                                <th>65% - 75%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>2015-2019</td>
                                                <td class="color-primary">21.56</td>
                                                <td class="color-primary">21.56</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>2016-2020</td>
                                                <td class="color-primary">21.56</td>
                                                <td class="color-primary">55.32</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>2017-2021</td>
                                                <td class="color-primary">14.85</td>
                                                <td class="color-primary">14.85</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ECE table ends -->

                  </div><!-- 1st row ends here-->

                  <div class="row"><!-- 2nd row starts here-->

                    <!-- mech Table -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Mechanical Attendance Analysis</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Batch</th>
                                                <th><= 65%</th>
                                                <th>65% - 75%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>2015-2019</td>
                                                <td class="color-primary">21.56</td>
                                                <td class="color-primary">21.56</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>2016-2020</td>
                                                <td class="color-primary">21.56</td>
                                                <td class="color-primary">55.32</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>2017-2021</td>
                                                <td class="color-primary">14.85</td>
                                                <td class="color-primary">14.85</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- mech table ends -->


                    <!-- civil Table -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>CIVIL Attendance Analysis</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Batch</th>
                                                <th><= 65%</th>
                                                <th>65% - 75%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>2015-2019</td>
                                                <td class="color-primary">21.56</td>
                                                <td class="color-primary">21.56</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>2016-2020</td>
                                                <td class="color-primary">21.56</td>
                                                <td class="color-primary">55.32</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>2017-2021</td>
                                                <td class="color-primary">14.85</td>
                                                <td class="color-primary">14.85</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- civil table ends -->

                  </div><!--2nd  row ends here-->

                  <div class="row"><!-- 3rd row starts here-->

                    <!-- eee Table -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>EEE Attendance Analysis</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Batch</th>
                                                <th><= 65%</th>
                                                <th>65% - 75%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>2015-2019</td>
                                                <td class="color-primary">21.56</td>
                                                <td class="color-primary">21.56</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>2016-2020</td>
                                                <td class="color-primary">21.56</td>
                                                <td class="color-primary">55.32</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>2017-2021</td>
                                                <td class="color-primary">14.85</td>
                                                <td class="color-primary">14.85</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- eee table ends -->


                    <!-- eie Table -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>EIE Attendance Analysis</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Batch</th>
                                                <th><= 65%</th>
                                                <th>65% - 75%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>2015-2019</td>
                                                <td class="color-primary">21.56</td>
                                                <td class="color-primary">21.56</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>2016-2020</td>
                                                <td class="color-primary">21.56</td>
                                                <td class="color-primary">55.32</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>2017-2021</td>
                                                <td class="color-primary">14.85</td>
                                                <td class="color-primary">14.85</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- eie table ends -->

                  </div><!-- 3rd row ends here-->


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

</body>

</html>
