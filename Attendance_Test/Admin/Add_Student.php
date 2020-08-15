<?php

	session_start();
	
	if(!isset($_SESSION['Admin']))
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
    <title>Creating Student Account Via Excel</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="studentsuben.css">
	

</head>

<body style="background-image: url(img/bg-img/1.jpg)">
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
                        <a class="nav-brand" href="./index.php"><img src="./img/core-img/logo.png" alt=""></a>

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
									<li><a >Faculty Section</a>
                                        <ul class="dropdown">
                                            <li><a href="">Create Faculty Ac.</a></li>
                                            <li><a href="#">Delete Faculty Ac.</a></li>
                                            
                                            </li>
                                        </ul>
                                    </li>
									<li><a >Student Section</a>
                                        <ul class="dropdown">
                                            <li><a href="./Add_Student.php">Cr. Stu Ac. using Excel</a></li>
                                            <li><a href="">Create Single Stu Ac. </a></li>
											<li><a href="">Delete Stu Account</a></li>
											<li><a href="">Create New Batch</a></li>
                                            
                                            </li>
                                        </ul>
                                    </li>
									
									<li><a >Subject Section</a>
                                        <ul class="dropdown">
                                            <li><a href="">Add Sub to Faculty </a></li>
                                            <li><a href="./Student_Subject_Enroll.php">Enrl Stu Sub by Excel</a></li>
                                            </li>
                                        </ul>
                                    </li>
									
									 <li><a href="">About</a></li>
                                  
                                   <form action="#" method="POST">
									<button name="lo" id="logoutbtn" onclick="this.form.submit();">Logout</button>
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

    <!-- Welcome Area Start -->
   
          <?php

	ini_set('max_execution_time', 120);
	require_once '../vendor/autoload.php';
	use Kreait\Firebase\Factory;
	use Kreait\Firebase\ServiceAccount;
	$serviceAccount = ServiceAccount::fromJsonFile('../secret/attendance-register-12c95-firebase-adminsdk-bg53u-232da2a3e1.json');

	$firebase = (new Factory)
		->withServiceAccount($serviceAccount)
		->create();
	$database = $firebase->getDatabase();
	$branches=$database->getReference('BatchName')->getSnapshot()->getValue();
	if(isset($_POST['Go']))
	{
		if(!isset($_SESSION['Admin']))
		{
			header("Location: /");
			exit();
		}
		$file_name=$_FILES['file']['name'];
		$file_type=$_FILES['file']['type'];
		$file_size=$_FILES['file']['size'];
		$file_temp=$_FILES['file']['tmp_name'];
		$file_store="upload/".$file_name;
		move_uploaded_file($file_temp,$file_store);
		$file = fopen($file_store, 'r');
		$size = filesize($file_store); 
		$filedata = fread( $file, $size );
		$lines=explode("\n",$filedata);
		$temp=Array();
		foreach($lines as $line)
		{
			$tem=array();
			$data=explode(',',$line);
			if(is_numeric($data[0]))
			{
				$tem['batch']=$_POST["Sel"];
				$tem['sid']=$data[0];
				$tem['sname']=$data[1];
				$tem['spass']='123456';
				$temp[$data[0]]=$tem;
			}
		}
		fclose($file);
		$database->getReference('Student')->update($temp);
	}
?>

<p id="load" align="center"></p>

<div align="center" id="block">
<form action="#" method="POST" enctype="multipart/form-data" onsubmit="return ani();">
<h4>NEW ACCOUNT CREATION</h4>
<h6>Default Password is : 123456</h6>
<a>Choose Batch</a>

<select name="Sel" required="required">
<option value="" selected></option>
<?php
foreach($branches as $i => $j)
{
	print_r('<option value="'.$i.'">'.$i.'</option>'."\n");
}
?>
</select>
<input type="file" name="file" id="kk" required="required">
<input type="submit" name="Go" value="Create Student's Account Via Excel">
</form>
</div>
<script>
function ani()
{
	var fname=document.getElementById('kk').value;
	var res=fname.split(".");
	if(res[res.length-1]!="csv")
	{
		alert("Invalid File type [Please upload only .csv files]");
		return false;
	}
	document.getElementById('load').innerHTML='<div class="container"><div class="shape shape-1"></div><div class="shape shape-2"></div><div class="shape shape-3"></div><div class="shape shape-4"></div></div>';
}
</script>
<div id='full'></div>
<?php
if(isset($_POST['Go']))
{
	echo "<h2 style='color:white'><i>Database got Updated.</i></h2>";
}
?>
    
    

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