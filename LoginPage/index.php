
<?php
if(!isset($_POST['choice']))
{
	header("Location: /");
	exit();
}
 session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<?php

	require_once '../Attendance_Test/vendor/autoload.php';
	use Kreait\Firebase\Factory;
	use Kreait\Firebase\ServiceAccount;
	$serviceAccount = ServiceAccount::fromJsonFile('../Attendance_Test/secret/attendance-register-12c95-firebase-adminsdk-bg53u-232da2a3e1.json');

	$firebase = (new Factory)
		->withServiceAccount($serviceAccount)
		->create();
	$auth = $firebase->getAuth();
	$database = $firebase->getDatabase();
	$c=0;
	
	if(isset($_POST['bclk']))
	{
		if($_POST['choice']=='Student')
		{
			$det=$database->getReference('Student')->getChild($_POST['username'])->getSnapshot()->getValue();
			if($det!=NULL)
			{
				if($det['spass']==$_POST['pass'])
				{
					$_SESSION['Student']=$_POST['username'];
					header("Location: /Attendance_Test/".$_POST['choice']);
					exit();
				}
				else
				{
					echo "<script> alert('Invalid Username or Password.') </script>";
				}
			}
			else
			{
				echo "<script> alert('Invalid Username or Password.') </script>";
			}
		}
		else
		{
			$em=$_POST["username"]."@iiitnr.edu.in";
			try {
				$user = $auth->verifyPassword($em, $_POST["pass"]);
			} catch (Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
				$c=1;
				echo "<script> alert('".$e->getMessage()."') </script>";
			}
			
			if($c==0)
			{
				$valid=$database->getReference('Faculty')->getChild($_POST["username"])->getChild('type')->getValue();
				if($valid!=strtolower($_POST['choice']))
				{
					echo "<script> alert('You are not ".$_POST['choice'].".') </script>";
				}
				else
				{
					$_SESSION[$_POST['choice']]=$_POST["username"];
					header("Location: /Attendance_Test/".$_POST['choice']);
					exit();
				}
			}
		}
	}
	
?>

<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="#" method="POST" onsubmit="return ver();">
					<span class="login100-form-title p-b-49">
						<?php echo $_POST["choice"]; ?> Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						<input id="lol" class="input100" type=<?php if($_POST["choice"]=='Student')echo "'number'";else echo "'text'"; ?> name="username" placeholder="Type your username" required="required">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password" required="required" minlength="6">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					<input type="hidden" name="choice" value='<?php echo $_POST["choice"]; ?>'>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="bclk" onclick="this.form.submit()">
								Login
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Don't have Account Contact Admin
						</span>
					</div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<script>
	function ver()
	{
		var uname=document.getElementById("lol").value;
		var n = uname.indexOf("@");
		if(n==-1)
			return true;
		else
		{
			alert("Invalid Username");
			return false;
		}
	}
	</script>
	
</body>
</html>