
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
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        


<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type=checkbox]{
	display:none;
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

label{
font-size:100%;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

#kol {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

#lol {
  background-color: red;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}



.d1
{
	width:auto;
	background-color:red;
	border:1px solid black;
	font-size:25px;
}

.bbox {
	border:2px solid #ccc;
	width:70%;
	height: 85vh;
	overflow-y: scroll;
	}

.container {
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

* {
  box-sizing: border-box;
}

.cont {
  position: relative;
  width: 60px;
  height: 60px;
  margin: auto;
  border-radius: 15px;
  -webkit-animation: rotation 1s infinite;
          animation: rotation 1s infinite;
}
.cont .shape {
  position: absolute;
  width: 20px;
  height: 20px;
  border-radius: 5px;
}
.cont .shape.shape-1 {
  left: 0;
  background-color: #4285F4;
}
.cont .shape.shape-2 {
  right: 0;
  background-color: #34A853;
}
.cont .shape.shape-3 {
  bottom: 0;
  background-color: #FBBC05;
}
.cont .shape.shape-4 {
  bottom: 0;
  right: 0;
  background-color: #EA4335;
}
.cont .shape-1 {
  -webkit-animation: shape1 0.5s infinite alternate;
          animation: shape1 0.5s infinite alternate;
}
.cont .shape-2 {
  -webkit-animation: shape2 0.5s infinite alternate;
          animation: shape2 0.5s infinite alternate;
}
.cont .shape-3 {
  -webkit-animation: shape3 0.5s infinite alternate;
          animation: shape3 0.5s infinite alternate;
}
.cont .shape-4 {
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

#logoutbtn {
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
	color:tomato ;
}

</style>
</head>
<body style="background-image: url(img/bg-img/1.jpg);">


<nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" href="#hidden" aria-controls="collapseExample" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" ></a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="hidden">
              <ul class="nav navbar-nav navbar-right">
			  <li><a href="./index.php">Home</a></li>
                    <li><a href="./Take.php">Previous Page</a></li>
					<li><form action="#" method="POST">
									<button id="logoutbtn" name="lo" onclick="this.form.submit();">Log out</button>
									</form></li>
               
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

 

<p id="load" align="center"></p>

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
	$storage = $firebase->getStorage();
	$filesystem = $storage->getFilesystem();
	
	if(isset($_POST['sa']))
	{
		if(!isset($_SESSION['Faculty']))
		{
			header("Location: /");
			exit();
		}
		$data = $_POST['hid'];
		$info = explode("|",$data);
		$t=explode('-',$info[1]);
		date_default_timezone_set('Asia/Kolkata');
		$k=$t[2]."-".$t[1]."-".$t[0]."(".strtoupper(str_replace(":","-",date("h:i a"))).")";
		$temp=Array();
		$Vals=$database->getReference('StuEnSubDetails')->getChild($info[0])->getSnapshot()->getValue();
		for($i=0;$i<count($Vals);$i++)
		{
			$tem=Array();
			if(isset($_POST['i'.$i]) && $_POST['i'.$i]=='v'.$i)
				$tem['atvalue']=$info[2].'/'.$info[2];
			else
				$tem['atvalue']='0/'.$info[2];
			$temp[$Vals[array_keys($Vals)[$i]]['sid']] = $tem;
		}
		$database->getReference('AttendanceRecord')->getChild($info[0])->getChild($k)->set($temp);
		die("<center><h3>Attendance Submitted Successfully </h3><br> <h2><a href='/Attendance_Test/Faculty/'>Go to Home</a></h2></center>");
	}
	
	if(isset($_POST['Go']))
	{
		echo "<center><h1>Mentioned date : ".$_POST['aday']."<br>Attendance Value : ";
		echo $_POST['quantity']."</h1></center>";
		$subject=$_POST['Sel'];
		echo "<center>Subject Chosen : ".$subject."</center>";
		$Vals=$database->getReference('StuEnSubDetails')->getChild($subject)->getSnapshot()->getValue();
		if($Vals==NULL)
			die("<h1 color='red'>Subject not assigned yet</h1>");
		
		
		
		echo "<script>var names=[";
		for($i=0;$i<count($Vals);$i++)
		{
			echo "'".$Vals[array_keys($Vals)[$i]]['sname']."'";
			if($i!=count($Vals)-1)
				echo ',';
		}
		echo "];\nvar rolls=[";
		for($i=0;$i<count($Vals);$i++)
		{
			echo "'".$Vals[array_keys($Vals)[$i]]['sid']."'";
			if($i!=count($Vals)-1)
				echo ',';
		}
		echo '];var ind=0;</script>';
	}
?>

<table width="100%" cellspacing="10">
<tr>
<td>
<button onclick="start();" style="width:96;">Take Attendance</button>
</td>
<td >
<form action="?" method="POST" onsubmit="return Pucho();">
<input type="submit" name="sa" value="Submit Attendance">
</td>
</tr>
</table>
<center>
<div class="bbox" align="center">
	<?php
	for($i=0;$i<count($Vals);$i++)
		echo '<div class="d1" id="c'.$i.'" onclick="ind='.$i.';take();">'.$Vals[array_keys($Vals)[$i]]['sid']."<br>".$Vals[array_keys($Vals)[$i]]['sname'].'<input type="checkbox" id="i'.$i.'" name="i'.$i.'" value="v'.$i.'"/><br /></div>'."\n";
	?>
</div>
</center>

<input type="hidden" name="hid" value=<?php echo "'".$subject."|".$_POST['aday']."|".$_POST['quantity']."'"; ?>>

</form>

<div id="id01" class="modal">
  
  <div class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
    <center>
      <b>Name : <label id="sname"></label></b>
      <br>
      <b>Enroll : <label id="en"></label></b>
        </center>
      <button id="kol" onclick="present();">Present</button>
      <button id="lol" onclick="absent();">Absent</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
</script>

</body>
</html>
