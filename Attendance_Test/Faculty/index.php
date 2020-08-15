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
	</style>

</head>

<body>
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
                                    <li class="active"><a href="#">Home</a></li>
									 <li><a href="./Take.php">Take Attendance</a></li>
                                    <li><a href="#">View Attendance</a></li>
                                    <li><a href="#">More</a>
                                        <ul class="dropdown">
                                            <li><a href="./excel.php">Download Sheet</a></li>
                                            <li><a href="#">About</a></li>
                                            
                                            </li>
                                        </ul>
                                    </li>
                                   
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
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">
            <!-- Single Slide -->
            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(img/bg-img/1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-lg-8 col-xl-6">
                            <div class="welcome-text">
                                <h2 data-animation="bounceInDown" data-delay="900ms">Hello, <br>Dr.<?php echo strtoupper($_SESSION['Faculty']); ?></h2>
                                <p data-animation="bounceInDown" data-delay="500ms">Manage your Record Hasselfree</p>
                                <div class="hero-btn-group" data-animation="bounceInDown" data-delay="100ms">
                                    <a href="./Take.php" class="btn alime-btn mb-3 mb-sm-0 mr-4">Take Attendance</a>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
    </section>
    
    <!-- Footer Area Start -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content d-flex align-items-center justify-content-between">
                        <!-- Copywrite Text -->
                        <div class="copywrite-text">
                            <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Developerdesk9 <i class="fa fa-heart-o" aria-hidden="true"></i> @<a href="#" target="_blank">Attendance Register</a>
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