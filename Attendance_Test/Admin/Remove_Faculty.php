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
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Page</title>
<style>

input, select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

#block{
	margin: 0;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  width:100%;
	border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
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

* {
  box-sizing: border-box;
}

.container {
  position: relative;
  width: 60px;
  height: 60px;
  margin: auto;
  border-radius: 15px;
  -webkit-animation: rotation 1s infinite;
          animation: rotation 1s infinite;
}
.container .shape {
  position: absolute;
  width: 20px;
  height: 20px;
  border-radius: 5px;
}
.container .shape.shape-1 {
  left: 0;
  background-color: #4285F4;
}
.container .shape.shape-2 {
  right: 0;
  background-color: #34A853;
}
.container .shape.shape-3 {
  bottom: 0;
  background-color: #FBBC05;
}
.container .shape.shape-4 {
  bottom: 0;
  right: 0;
  background-color: #EA4335;
}
.container .shape-1 {
  -webkit-animation: shape1 0.5s infinite alternate;
          animation: shape1 0.5s infinite alternate;
}
.container .shape-2 {
  -webkit-animation: shape2 0.5s infinite alternate;
          animation: shape2 0.5s infinite alternate;
}
.container .shape-3 {
  -webkit-animation: shape3 0.5s infinite alternate;
          animation: shape3 0.5s infinite alternate;
}
.container .shape-4 {
  -webkit-animation: shape4 0.5s infinite alternate;
          animation: shape4 0.5s infinite alternate;
}

@-webkit-keyframes rotation {
  from {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}

@keyframes rotation {
  from {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}
@-webkit-keyframes shape1 {
  from {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  to {
    -webkit-transform: translate(20px, 20px);
            transform: translate(20px, 20px);
  }
}
@keyframes shape1 {
  from {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  to {
    -webkit-transform: translate(20px, 20px);
            transform: translate(20px, 20px);
  }
}
@-webkit-keyframes shape2 {
  from {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  to {
    -webkit-transform: translate(-20px, 20px);
            transform: translate(-20px, 20px);
  }
}
@keyframes shape2 {
  from {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  to {
    -webkit-transform: translate(-20px, 20px);
            transform: translate(-20px, 20px);
  }
}
@-webkit-keyframes shape3 {
  from {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  to {
    -webkit-transform: translate(20px, -20px);
            transform: translate(20px, -20px);
  }
}
@keyframes shape3 {
  from {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  to {
    -webkit-transform: translate(20px, -20px);
            transform: translate(20px, -20px);
  }
}
@-webkit-keyframes shape4 {
  from {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  to {
    -webkit-transform: translate(-20px, -20px);
            transform: translate(-20px, -20px);
  }
}
@keyframes shape4 {
  from {
    -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
  }
  to {
    -webkit-transform: translate(-20px, -20px);
            transform: translate(-20px, -20px);
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

</style>
</head>

<?php

	ini_set('max_execution_time', 120);
	require_once '../vendor/autoload.php';
	use Kreait\Firebase\Factory;
	use Kreait\Firebase\ServiceAccount;
	$serviceAccount = ServiceAccount::fromJsonFile('../secret/attendance-register-12c95-firebase-adminsdk-bg53u-232da2a3e1.json');

	$firebase = (new Factory)
		->withServiceAccount($serviceAccount)
		->create();
	$auth = $firebase->getAuth();
	$database = $firebase->getDatabase();
	$users=$database->getReference('Faculty')->getSnapshot()->getValue();
	$facs=array();
	
	foreach($users as $k => $v)
	if($v['type']=='faculty')
	$facs[$k]=$v['tname'];
	
	if(isset($_POST['Go']))
	{
		if(!isset($_SESSION['Admin']))
		{
			header("Location: /");
			exit();
		}
		$em=$_POST["Selected"]."@iiitnr.edu.in";
		$userid = $auth->getUserByEmail($em)->uid;
		$auth->deleteUser($userid);
		$database->getReference('Faculty')->getChild($_POST["Selected"])->remove();
		echo "<script>alert('Faculty removed successfully.')</script>";
	}
?>

<body background="/MY IMAGES/bg2.jpg">
<form action="#" method="POST">
<button class="myButton" name="lo" onclick="this.form.submit();">Log out</button>
</form>

<p id="load" align="center"></p>

<div align="center" id="block">
<h2>Delete Faculty Account</h2>
<form action="#" method="POST" enctype="multipart/form-data" onsubmit="return ani();">
<p>Choose Faculty</p>
<select name="Selected" required="required">
<option value="" selected></option>
<?php
foreach($facs as $i => $j)
{
	print_r('<option value="'.$i.'">'.strtoupper($j).' {'.$i.'@iiitnr.edu.in}</option>'."\n");
}
?>

<input type="submit" name="Go" value="Delete Account">
</form>
</div>
<script>
function ani()
{
	document.getElementById('load').innerHTML='<div class="container"><div class="shape shape-1"></div><div class="shape shape-2"></div><div class="shape shape-3"></div><div class="shape shape-4"></div></div>';
}
</script>
<div id='full'></div>
</body>

</html>