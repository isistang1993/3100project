<?php
require_once('../Connections/conn.php');
session_start();
?>
<html lang="en">
    <head>
  	<title> 114SHOES | CSCI3100 Group 16 </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="114SHOES Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<meta charset utf="8">

		<!--fonts-->
		<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
		<!--bootstrap-->
		 <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<!--coustom css-->
		<link href="css/style.css" rel="stylesheet" type="text/css"/>
        <!--shop-kart-js-->
        <script src="js/simpleCart.min.js"></script>
		<!--default-js-->
		<script src="js/jquery-2.1.4.min.js"></script>
		<!--bootstrap-js-->
		<script src="js/bootstrap.min.js"></script>
		<!--script-->
         <!-- FlexSlider -->
        <script src="js/imagezoom.js"></script>
        <script defer src="js/jquery.flexslider.js"></script>
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

        <!--by yuyu-->
        <script src="js/register.js"></script>
        <link rel="icon" type="image/png" sizes="32x32" href="images/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="images/icon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon-16x16.png">


            <!--script>
            // Can also be used with $(document).ready()
            $(window).load(function() {
              $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
              });
            });
            </script-->
        <!-- //FlexSlider-->
    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="header-top">
                    <div class="logo">
                        <a href="index.html">114SHOES</a>
                    </div>
                    <div class="login-bars">
                        <?php
                            if(isset($_SESSION['type'])){
                                switch($_SESSION['type']){
                                    case "nor":
                                    case "sup":
                                    echo "<a class='btn btn-default log-bar' href='register.php' role='button'>Sign up</a> ";
                                }
                                echo "<a class='btn btn-default log-bar' href='view_profile.php' role='button'>$_SESSION[username]</a> ";
                                echo "<a class='btn btn-default log-bar' id='logout' href='logout.php' role='button'>Logout</a>";
                            }else{
                                echo "<a class='btn btn-default log-bar' href='register.php' role='button'>Sign up</a> ";
                                echo "<a class='btn btn-default log-bar' href='signup.php' role='button'>Login</a>";
                            }
                        ?>
                        <div class="cart box_1">
                            <a href="checkout.html">
                            <h3>
                                <div class="total">
<span class="simpleCart_total"></span>(<span id="simpleCart_quantity" class="simpleCart_quantity"></span>)</div></h3>
                            </a>
                            <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
        <div class="clearfix"></div>
                </div>
                <!---menu-----bar--->
                <div class="header-botom">
                    <div class="content white">
                    <nav class="navbar navbar-default nav-menu" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!--/.navbar-header-->

                        <div class="collapse navbar-collapse collapse-pdng" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav nav-font">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="products.html">Running</a></li>
                                        <li><a href="products.html">Training</a></li>
                                        <li class="divider"></li>
                                        <li><a href="products.html">Basketball</a></li>
                                        <li><a href="products.html">Football</a></li>
                                        <li><a href="products.html">Soccer</a></li>
                                        <li><a href="products.html">Tennis</a></li>
                                        <li><a href="products.html">Skateboarding</a></li>
                                        <li class="divider"></li>
                                        <li><a href="products.html">Casual</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Men<b class="caret"></b></a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <div class="row">
                                            <div class="col-sm-4 menu-img-pad">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="products.html">Running</a></li>
                                                    <li><a href="products.html">Training</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="products.html">Basketball</a></li>
                                                    <li><a href="products.html">Football</a></li>
                                                    <li><a href="products.html">Soccer</a></li>
                                                    <li><a href="products.html">Tennis</a></li>
                                                    <li><a href="products.html">Skateboarding</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="products.html">Casual</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4 menu-img-pad">
                        <a href="#"><img src="images/menu1.jpg" alt="/" class="img-rsponsive men-img-wid" /></a>
                                            </div>
                                            <div class="col-sm-4 menu-img-pad">
                        <a href="#"><img src="images/menu2.jpg" alt="/" class="img-rsponsive men-img-wid" /></a>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Women<b class="caret"></b></a>
                                    <ul class="dropdown-menu multi-column columns-2">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <ul class="multi-column-dropdown">
                                                    <li><a href="products.html">Running</a></li>
                                                    <li><a href="products.html">Training</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="products.html">Basketball</a></li>
                                                    <li><a href="products.html">Football</a></li>
                                                    <li><a href="products.html">Soccer</a></li>
                                                    <li><a href="products.html">Tennis</a></li>
                                                    <li><a href="products.html">Skateboarding</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="products.html">Casual</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                        <a href="#"><img src="images/menu3.jpg" alt="/" class="img-rsponsive men-img-wid" /></a>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kids<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="products.html">Running</a></li>
                                        <li><a href="products.html">Training</a></li>
                                        <li class="divider"></li>
                                        <li><a href="products.html">Basketball</a></li>
                                        <li><a href="products.html">Football</a></li>
                                        <li><a href="products.html">Soccer</a></li>
                                        <li><a href="products.html">Tennis</a></li>
                                        <li><a href="products.html">Skateboarding</a></li>
                                        <li class="divider"></li>
                                        <li><a href="products.html">Casual</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Catch</a></li>
                                <div class="clearfix"></div>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <!--/.navbar-collapse-->
                        <div class="clearfix"></div>
                    </nav>
                    <!--/.navbar-->
                        <div class="clearfix"></div>
                    </div>
                    <!--/.content--->
                </div>
                    <!--header-bottom-->
            </div>
        </div>
        <div class="head-bread">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="signup.php">LOGIN</a></li>
                    <li class="active">REGISTER</li>
                </ol>
            </div>
        </div>
        <!-- reg-form -->
	<div class="reg-form">
		<div class="container">
			<div class="reg">
				<h3>Register Account</h3>
				 <form>
                    <ul>
                        <li class="text-info">Username: </li>
                        <li><input type="text" id="username"></li>
                    </ul>
                    <ul>
                        <li class="text-info">Password: </li>
                        <li><input type="password" id="password"></li>
                    </ul>
                    <ul>
                        <li class="text-info">Re-enter Password:</li>
                        <li><input type="password" id="re_password"></li>
                    </ul>
                    <?php
                        if(isset($_SESSION['type'])&&($_SESSION['type']=="sup"||$_SESSION['type']=="nor")){echo "<ul>";}else{echo "<ul hidden>";};
                    ?>
                        <li class="text-info">Type: </li>
                        <li><input type="radio" class="job_type" name="job_type" id ="job_type" value="U" checked>User &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="job_type" name="job_type" id="job_type" value="PT">Driver-Part Time &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="job_type" class="job_type" name="job_type" value="FT">Driver-Full Time &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="job_type" class="job_type" name="job_type" value="nor">Officer-NOR &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="job_type" class="job_type" name="job_type" value="sup">Officer-SUP</li>
                    </ul>
                    <ul>
						<li class="text-info">First Name: </li>
						<li><input type="text" id="f_name"></li>
					</ul>
					<ul>
						<li class="text-info">Last Name: </li>
						<li><input type="text" id="l_name"></li>
					 </ul>
                     <ul>
                        <li class="text-info">Sex: </li>
                        <li><input type="radio" class="sex" name="sex" id ="sex" value="M">Men &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="sex" name="sex" id="sex" value="F">Women &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="sex" class="sex" name="sex" value="K" checked>Kids &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="sex" class="sex" name="sex" value="O" checked>Other</li>
                    </ul>
					<ul>
						<li class="text-info">Email: </li>
						<li><input type="text" id="email"></li>
					</ul>
					<ul>
						<li class="text-info">Mobile Number:</li>
						<li><input type="text" id="phone"></li>
					</ul>
					<!--input type="submit" value="Register Now"-->
                    <p class="click"><br /><input type="checkbox" id="check_policy"> By clicking this button, you are agree to my  <a href="https://www.theaa.com/resources/Documents/pdf/insurance/aa_life_insurance_terms_conditions_Mar_2016.pdf" target="_blank">Policy Terms and Conditions.</a></p>
                    <div class="col-md-6 login-right">
                        <br />
                        <a class="button" id="add_account">Register</a>
                        <br />
                    </div>
				</form>
			</div>
		</div>
	</div>
        <div class="footer-grid">
            <div class="container">
                <div class="col-md-2 re-ft-grd">
                    <h3>Categories</h3>
                    <ul class="categories">
                        <li><a href="products.html">Shop</a></li>
                        <li><a href="products.html">Men</a></li>
                        <li><a href="products.html">Women</a></li>
                        <li><a href="products.html">Kids</a></li>
                    </ul>
                </div>
                <div class="col-md-2 re-ft-grd">
                    <h3>Short links</h3>
                    <ul class="shot-links">
                        <li><a href="contact.html">Contact us</a></li>
                    </ul>
                </div>
                <div class="col-md-6 re-ft-grd">
                    <h3>Social</h3>
                    <ul class="social">
                        <li><a href="https://www.facebook.com/loveyu516" class="fb">facebook</a></li>
                        <li><a href="#" class="twt">twitter</a></li>
                        <li><a href="#" class="gpls">g+ plus</a></li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="col-md-2 re-ft-grd">
                    <div class="bt-logo">
                        <div class="logo">
                            <a href="index.html" class="ft-log">114SHOES</a>
                        </div>
                    </div>
                </div>
        <div class="clearfix"></div>
            </div>
            <div class="copy-rt">
                <div class="container">
            <p>&copy;   2017 114SHOES All Rights Reserved. </p>
                </div>
            </div>
        </div>
    </body>
</html>
