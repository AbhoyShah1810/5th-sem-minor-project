<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
    ob_start();
    session_start();
    $con=mysqli_connect("localhost", "root", "", "pharmacy");
    //Response.Cache.SetNoStore();
    if(isset($_POST['login']))
    {
        $username = mysqli_real_escape_string($con, strtolower($_POST['username']));
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * from login WHERE username = '$username' and password='$password'";
        $check_email_run = mysqli_query($con, $check_email);
        $result = mysqli_num_rows($check_email_run);
        if($result > 0)
        {
            $row1 = mysqli_fetch_assoc($check_email_run);
            
            header('Location: stock.php');
        
        
        }
        else
        {
            $error = "<div>Incorrect username or Password!</div>";
        }
}


?>
<!DOCTYPE HTML>
<html>
<head>
<title>E-Pharmacy</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
</head>
<body>	
<div class="login-page">
    <div class="login-main">  	
    	 <div class="login-head"><br>
				<center><h2 style="color:white;">Pharmacy Management System</h2></center>
				<center><h2 style="color:white;">Admin Login</h2></center>
			</div>
			<div class="login-block">
				<form action="index.php" method="POST">
					<input type="text" placeholder="Username" name="username" required="">
					<input type="password" name="password" name="password" class="lock" placeholder="Password">
					<div class="forgot-top-grids">
						
						
						<div class="clearfix"> </div>
					</div>
					<input type="submit" name="login" value="Login">	
					
				</form>
				
			</div>
      </div>
</div>
<!--inner block end here-->

<!--COPY rights end here-->

<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
						
