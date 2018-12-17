<?php
    if(isset($_COOKIE['id']))
    {
        session_id($_COOKIE['id']);
    }
    session_start();

    if(isset($_SESSION["id"]))
    {
        header("Location:admin.php");
    }

    if(isset($_SESSION["htno"]))
    {
        header("Location:student.php");
    }
    if(isset($_SESSION["fid"]))
    {
        header("Location:faculty.php");
    }
    if(isset($_SESSION["hid"]))
    {
        header("Location:hod.php");
    }
    if(isset($_SESSION["pid"]))
    {
        header("Location:principal.php");
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
    <title>Welcome To VIMS</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script type="text/javascript">
        window.onload = function() {
        history.replaceState("", "", "index.php");
        }
    </script>
<style>

</style>
<script>


</script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!--  Preloader - style you can find in spinners.css -->
   <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper
    <!-- <div id="main-wrapper">-->

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Principal Login</h4>
                                <button type="button" class="btn btn-info btn-rounded m-b-10 m-l-5" ><a href="principal-login.php">Click Here</a></button>
                                <hr>
                                <h4>HOD Login</h4>
                                <button type="button" class="btn btn-info btn-rounded m-b-10 m-l-5" ><a href="hod-login.php">Click Here</a></button>
                                <hr>
                                <h4>Faculty Login</h4>
                                <button type="button" class="btn btn-info btn-rounded m-b-10 m-l-5" ><a href="faculty-login.php">Click Here</a></button>
                                <hr>
                                <h4>Student Login</h4>
                                <button type="button" class="btn btn-info btn-rounded m-b-10 m-l-5" ><a href="student-login.php">Click Here</a></button>
                                <hr>
                                <h4>Admin Login</h4>
                                <button type="button" class="btn btn-info btn-rounded m-b-10 m-l-5" ><a href="admin-login.php">Click Here</a></button>

                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="js/block/javascript.js"></script>

</body>

</html>
