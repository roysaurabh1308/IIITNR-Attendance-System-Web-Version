<?php

	session_start();
	
	if(!isset($_SESSION['Faculty']))
	{
		header("Location: /");
		exit();
	}
	
	if(isset($_POST['lo']))
	{
		session_destroy();
		header("Location: /");
		exit();
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Attendance Register</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
	
<style>


#logoutbtn {
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
	color:tomato ;
}

input[type=text], input[type=number], input[type=date], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
#block{
	border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-top:100px;
  margin-right:30px;
  margin-left:30px;
 
  
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.myButton {
	float:right;
	-moz-box-shadow:inset 0px 1px 0px 0px #e184f3;
	-webkit-box-shadow:inset 0px 1px 0px 0px #e184f3;
	box-shadow:inset 0px 1px 0px 0px #e184f3;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c123de), color-stop(1, #a20dbd));
	background:-moz-linear-gradient(top, #c123de 5%, #a20dbd 100%);
	background:-webkit-linear-gradient(top, #c123de 5%, #a20dbd 100%);
	background:-o-linear-gradient(top, #c123de 5%, #a20dbd 100%);
	background:-ms-linear-gradient(top, #c123de 5%, #a20dbd 100%);
	background:linear-gradient(to bottom, #c123de 5%, #a20dbd 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c123de', endColorstr='#a20dbd',GradientType=0);
	background-color:#c123de;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #a511c0;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #9b14b3;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #a20dbd), color-stop(1, #c123de));
	background:-moz-linear-gradient(top, #a20dbd 5%, #c123de 100%);
	background:-webkit-linear-gradient(top, #a20dbd 5%, #c123de 100%);
	background:-o-linear-gradient(top, #a20dbd 5%, #c123de 100%);
	background:-ms-linear-gradient(top, #a20dbd 5%, #c123de 100%);
	background:linear-gradient(to bottom, #a20dbd 5%, #c123de 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#a20dbd', endColorstr='#c123de',GradientType=0);
	background-color:#a20dbd;
}
.myButton:active {
	position:relative;
	top:1px;
	
	
.attendance_choosearea{
	
	
  margin-top: 500px;
  margin-left: 100px;
	
}


</style>

</head>

<body style="background-image: url(img/bg-img/1.jpg);>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->
	
	

   
<form action="?" method="POST">
    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="alimeNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="./index.html"><img src="./img/core-img/logo.png" alt="Attendance Register"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="active"><a href="./index.php">Home</a></li>
                                    <li><a href="#">More</a>
                                        <ul class="dropdown">
                                            <li><a href="./excel.php">Download Sheet</a></li>
                                            <li><a href="#">About</a></li>
                                            
                                            </li>
                                        </ul>
                                    </li>
                                   
                                   <form action="#" method="POST">
									<button id="logoutbtn" name="lo" onclick="this.form.submit();">Log out</button>
									</form>
                                </ul>
                         
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
	
	<section >
	
	
	<section class="attendance_choosearea">
			
                <?php

	require_once '../vendor/autoload.php';
	use Kreait\Firebase\Factory;
	use Kreait\Firebase\ServiceAccount;
	$serviceAccount = ServiceAccount::fromJsonFile('../secret/attendance-register-12c95-firebase-adminsdk-bg53u-232da2a3e1.json');

	$firebase = (new Factory)
		->withServiceAccount($serviceAccount)
		->create();
	$database = $firebase->getDatabase();
	
	//$facs=$database->getReference('Faculty')->getSnapshot()->getValue();
	//if(isset($_POST['Sels']))
	//{
		$subs=$database->getReference('FacultySubjectDetails')->getChild($_SESSION['Faculty'])->getSnapshot()->getValue();
		echo "<h1 align='center' style='color:white;'>-</h1>";
	//}
	
?>


<div align="center" id="block">

<form action="Attendance.php" method="POST" enctype="multipart/form-data">
<h3>Take Attendance </h3>
<p>Choose Subject</p>
<select name="Sel" required="required">
<option value="" selected></option>
<?php
//if(isset($_POST['Sels']))
foreach($subs as $i => $j)
{
	print_r('<option value="'.$i.'">'.$i.'</option>'."\n");
}
?>
</select>
<p>Choose Date</p>
<input type="date" name="aday" required="required">

<p>Choose Attendance Value</p>
<input type="number" name="quantity" min="1" max="5" required="required" placeholder="e.g. 1,2 or 5">

<input type="submit" name="Go" value="Open Attendance Page." >
</form>


</section>

</section>
















    
    
    <!-- Footer Area Start -->
    <footer class="footer-area" align="bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content d-flex align-items-center justify-content-between">
                        <!-- Copywrite Text -->
                        <div class="copywrite-text">
                            <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> @Developerdesk9 <a href="#" target="_blank">Attendance Register</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>     
                        <!-- Social Info -->
                        <div class="social-info">
                            <a href="#"><i class="ti-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="ti-twitter-alt" aria-hidden="true"></i></a>
                            <a href="#"><i class="ti-linkedin" aria-hidden="true"></i></a>
                            <a href="#"><i class="ti-pinterest" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="js/alime.bundle.js"></script>
    <!-- Active -->
    <script src="js/default-assets/active.js"></script>

</body>

</html>