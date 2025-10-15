<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php  
	if(isset($_POST['insert'])&&!empty($_FILES['file']['name'])){
		
		#upload the files
		move_uploaded_file($_FILES['file']['tmp_name'], $_FILES['file']['name']);
		$filename = $_FILES['file']['name'];
		#connection
		$servername = "localhost";
		$dbusername = "root";
		$dbpassword = "";

		$conn = new mysqli($servername, $dbusername, $dbpassword, "pharmacy");

		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		#connection ends
		
		#get excel data
		include "SimpleXLSX.php";

  if ( $xlsx = SimpleXLS::parse($filename) ) {
    
    $i = 0;

    foreach ($xlsx->rows() as $elt) {
      if ($i == 0) {
        
      } else {
        $sql = "INSERT INTO `stock`(`item_name`, `price`, `qty_brought`, `imported_from`, `category`, `qty_sold`, `date`, `month`) VALUES ('$elt[0]', '$elt[1]','$elt[2]','$elt[3]','$elt[4]','$elt[5]','$elt[6]','$elt[7]') ";
        if ($conn->query($sql) === TRUE) {
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
      }      

      $i++;
    }

//echo "record uploaded successfully";
header("loaction:stock.php");
  } else {
    echo SimpleXLS::parseError();
  }

mysqli_close($conn);

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
<!--//skycons-icons-->
</head>
<body>	
<div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here--><br>
				<center><h1>Pharmacy Management System</h1></center>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
    <div class="blank">
    	 <div class="col-md-12 bg-light text-right">
    	 	<!--<button type="button" class="btn btn-success" onclick="window.open('vstock.php')"><i class="fa fa-eye"></i>Stock</button>-->
    	 </div>
    	<h2>+ Stock</h2>
    	
    	<div class="blankpage-main">
    		<form action="stock.php" method="POST" enctype="multipart/form-data">
    		<label style="font-size:15px;">Upload Stock Entry Data(Xls File)</label>
  	<input type="file" name="file">
    
    <div class="col">
	 	<br><br>
<button type="submit" name="insert" class="btn btn-primary">Submit</button>
	 </div>
    	</div>
    </form>
    </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->

<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
		        
		        
		        
		          <li><a href="stock.php"><i class="fa fa-plus"></i><span>Add Stock</span></a></li>
		          <li><a href="sale.php"><i class="fa fa-shopping-cart"></i><span>Sell Medicine</span></a></li>
		          <li><a href="vstock.php"><i class="fa fa-eye"></i><span>View Stock Details</span></a></li>
		          <li><a href="viewsale.php"><i class="fa fa-file"></i><span>View Sell Report</span></a></li>
		        <li><a href="logout.php"><i class="fa fa-user"></i><span>Logout</span></a></li>
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
						
