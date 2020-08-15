<?php

	session_start();
	
	if(!isset($_SESSION['Student']))
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
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="loading-bar.css"/>
<script type="text/javascript" src="loading-bar.js"></script>
<style>

.ldBar-label {
    color: red;
    font-family: tahoma;
    font-size: 0.4em;
    font-weight: 900;
}

table#t01 {
  width:100%;
  position:absolute;
  top:20%;
}
table#t01, th, td {
  border: 2px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: center;
  font-size: 30px;
  font-family: Calibri Light (Headings);
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}

#kal {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table#kal td, table#kal th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

table#kal tr:nth-child(even) {
  background-color: #dddddd;
}

/* Set a style for all buttons */
.cancelbtn {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

.cancelbtn:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcont {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.cont {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
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
}


#blockk{
	
  padding: 20px;
  margin-top:300px;
 
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
	
	<section id="blockk">
	
	<?php
	echo '<p id="load" align="center"></p>';
	ini_set('max_execution_time', 120);
	require_once '../vendor/autoload.php';
	use Kreait\Firebase\Factory;
	use Kreait\Firebase\ServiceAccount;
	$serviceAccount = ServiceAccount::fromJsonFile('../secret/attendance-register-12c95-firebase-adminsdk-bg53u-232da2a3e1.json');

	$firebase = (new Factory)
		->withServiceAccount($serviceAccount)
		->create();
	$database = $firebase->getDatabase();
	$detail=$database->getReference('Student')->getChild($_SESSION['Student'])->getSnapshot()->getValue();
	$rsubs=$database->getReference('StudentSubDeatails')->getChild($_SESSION['Student'])->getChildKeys();
	$marr=array();
	foreach($rsubs as $k => $v)
	{
		$tut=$database->getReference('AttendanceRecord')->getChild($v)->getSnapshot()->getValue();
		if($tut!=NULL)
		$marr[$v]=$tut;
	}
	echo "<h1 align='center' style='color:blue;'>- </h1>";
	echo "<script>var subarr=['";
	echo join("','",array_keys($marr));
	echo "'];</script>"."\n";
	//print_r($marr[$rsubs[0]]);
	
	$lol=array();
	foreach($marr as $k => $v)
		array_push($lol,"['".join("','",array_keys($v))."']");
	echo "<script>var datesarr=[".join(",",$lol)."];</script>"."\n";
	
	$avalus=array();$pers=array();
	foreach($marr as $k => $v)
	{
		$tem=array();$s1=0;$s2=0;
		foreach($v as $k1 => $v1)
		{
			$rat=$v1[$detail['sid']]['atvalue'];
			array_push($tem,$rat);
			$tp=explode("/",$rat);
			$s1+=$tp[0];
			$s2+=$tp[1];
		}
		array_push($avalus,$tem);
		array_push($pers,($s1/$s2)*100);
	}
	$tar=array();
	for($i=0;$i<count($avalus);$i++)
	{
		$tar[$i] = "['".join("','",$avalus[$i])."']";
	}
	echo "<script>var avalarr=[".join(",",$tar)."];</script>";
?>

<script>

var ind=0;var cont=new Array();var pres=new Array()

for(var i=0;i<(avalarr.length);i++)
{
	var count=0;
	var count2=0;
	for(var j=0;j<(avalarr[i].length);j++)
	{
		var iv=avalarr[i][j].split("/");
		count+=Number(iv[1]);
		count2+=Number(iv[0]);
	}
	cont[i]=count;
	pres[i]=count2;
}
</script>


<br >
<table id="t01" width="100%">
  <tr>
    <th>Subject name</th>
    <th>Attendance Percentage</th>
  </tr>
  <?php
	for($i=0;$i<count($marr);$i++)
	{
		echo '<tr><td onclick="document.getElementById('."'id01'".').style.display='."'block'".';ind='.$i.';move()">'.$rsubs[$i].'</td><td><div class="ldBar label-center" id="lol" style="width:15%;height:15%;margin:auto" data-value="'.round($pers[$i],2).'" data-preset="circle"></div></td></tr>';
	}
  ?>

</table>

<!--button  onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button-->

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="?">
    <div class="imgcont">
    <h1 id="st">Subject title</h1><br>
	<h2 id="pr" style="color:green;float:left;margin-left:20%">Present:</h2>
	<h2 id="ab" style="color:red;float:right;margin-right:20%">Absent:</h2><br>
	<h2 id="status" style="color:red"></h2>
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>
	<br><br><br>
	<div class="container">
	<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0.5%" id="myBar">
      00%
    </div>
  </div>
</div>

    <div class="cont">
      <table id="kal">
	  </table>
    </div>

    <div class="cont" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
     
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<p id="lol1"></p>
<script>
function move() {
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 10);
  var thresh=Number(((pres[ind]/cont[ind])*100).toFixed(2));
  elem.innerHTML=thresh+"%";
  if(thresh<=65)
  {
	  elem.className="progress-bar progress-bar-danger progress-bar-striped active";
	  document.getElementById("status").innerHTML="Help Yourself!";
	  document.getElementById("status").style.color="red";
  }
  else if(thresh<=70)
  {
	  elem.className="progress-bar progress-bar-danger progress-bar-striped active";
	  document.getElementById("status").innerHTML="Danzer Zone!";
	  document.getElementById("status").style.color="tomato";
  }
  else if(thresh<=85)
  {
	  elem.className="progress-bar progress-bar-warning progress-bar-striped active";
	  document.getElementById("status").innerHTML="Safe Zone!";
	  document.getElementById("status").style.color="pink";
  }
  else
  {
	  elem.className="progress-bar progress-bar-success progress-bar-striped active";
	  document.getElementById("status").innerHTML="Enjoy Zone";
	  document.getElementById("status").style.color="green";
  }
  function frame() {
    if (width >= thresh) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%';
    }
  }
  document.getElementById("st").innerHTML=subarr[ind];
  document.getElementById("pr").innerHTML="Present:"+pres[ind];
  document.getElementById("ab").innerHTML="Absent:"+(cont[ind]-pres[ind]);
  var es="<tr><th>Date & Time [Format]</th><th>Attendance Value</th></tr>";
  for(var k=0;k<datesarr[ind].length;k++)
  {
	  es+="<tr><td>"+datesarr[ind][k]+"</td><td>"+avalarr[ind][k]+"</td></tr>";
  }
  document.getElementById("kal").innerHTML=es;
}
</script>
	
</section>

</section>
















    
    
 

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