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

a#kkk {
    display: block;
    width: 20.25em;
    line-height: 5em;
    margin: 1em auto;
    border: 0.06em solid #666;
    background-color: #000;
    box-shadow: 0.4em 0.4em 0.4em #999;
    font-weight: bold;
    color: #fff;
    text-transform: uppercase;
    text-align: center;
    animation: blink 2s ease infinite;
 }
@keyframes blink {
   0%   {color: #fff;}
   25%   {color: #FF00FF;}
   50%  {color: #f00;}
   75%   {color: #00FF7F;}
   100% {color: #00FFFF;}
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
		echo "<h1 align='center' style='color:blue;'>-</h1>";
	//}
	
	if(isset($_POST['Go']))
	{
		if(!isset($_SESSION['Faculty']))
		{
			header("Location: /");
			exit();
		}
		$subj=$_POST['Sel'];
		$Childs=$database->getReference('AttendanceRecord')->getChild($subj)->getSnapshot()->getValue();
		if($Childs==NULL)
			die("<h1 style='color:red'>No attendance Record Yet....</h1>");
		$file = fopen($subj.".csv", 'w');
		fwrite($file,'Roll no.,Name,');
		foreach($Childs as $dat => $arr)
		{
			fwrite($file,$dat.',');
		}
		fwrite($file,'Present,Total,Percentage,');
		fwrite($file,"\n");
		fclose($file);
		
		$temp=$database->getReference('StuEnSubDetails')->getChild($subj)->getSnapshot()->getValue();
		$nd=count($Childs);
		
		$char1="";
		$char2="";
		$rnd=($nd+2)%26;
		$rnd2=($nd+3)%26;
		$qnd=intdiv(($nd+2),26);
		$qnd2=intdiv(($nd+3),26);
		$char1=$char1.(chr(65+$rnd));
		$char2=$char2.(chr(65+$rnd2));
		if($qnd!=0)
		{
			$char1=(chr(64+$qnd)).$char1;
		}
		if($qnd2!=0)
		{
			$char2=(chr(64+$qnd2)).$char2;
		}
		$file = fopen($subj.".csv", 'a');
		$h=2;
			foreach($arr as $keys => $val)
			{
				fwrite($file,$keys.',');
				$str=$temp[$keys]['sname'];
				fwrite($file,$str.",");
				$count=0;
				$tot=0;
				
				foreach($Childs as $dat => $arr1)
				{
					$val1=$arr1[$keys]['atvalue'];
					$modified=explode('/',$val1);
					$count+=$modified[0];
					$tot+=$modified[1];
					fwrite($file,$modified[0].',');
				}
				fwrite($file,$count.",".$tot.","."=(".$char1.($h)."/".$char2.($h).")*100,"."\n");
				$h++;
			}
		fclose($file);
	}
?>

<p id="load" align="center"></p>

<div align="center" id="block">

<form action="#" method="POST" enctype="multipart/form-data" onsubmit="ani();">
<h4>Make Excel Sheet of Past Attendance </h4>
<p>Choose Subject</p>
<select name="Sel" required="required">
<option value="" selected></option>
<?php
foreach($subs as $i => $j)
{
	print_r('<option value="'.$i.'">'.$i.'</option>'."\n");
}
?>
</select>
<input type="submit" name="Go" value="Create Excel">
</form>
</div>
<script>
function ani()
{
	document.getElementById('load').innerHTML='<div class="loader"></div>';
}
</script>
<div id='full'></div>
<?php
if(isset($_POST['Go']))
{
	echo "<h2 align='center' style='color:white'><i>Excel Sheet is created.......</i></h2>";
	echo "<a id='kkk' href='./".$_POST['Sel'].".csv'>Click Here To Download</a>";
}
?>
	
	

</section>


    
   
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