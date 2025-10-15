<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
<!-- Sidebar CSS -->
<style>
.sidebar-menu {
    width: 200px;
    background-color: #f8f9fa;
    position: fixed;
    height: 100%;
    padding-top: 20px;
}

.sidebar-menu ul {
    list-style-type: none;
    padding: 0;
}

.sidebar-menu ul li {
    padding: 10px;
}

.sidebar-menu ul li a {
    text-decoration: none;
    color: #333;
    display: block;
}

.sidebar-menu ul li a:hover {
    background-color: #ddd;
}

.main-content {
    margin-left: 220px; /* Adjust margin to accommodate the sidebar */
    padding: 20px; /* Add padding for better spacing */
}

</style>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--//skycons-icons-->
</head>
<body>	
<div class="page-container">	
   <?php include 'sidebar.php'; ?> <!-- Include the sidebar here -->
   <div class="main-content"> <!-- Added main-content class -->
	   <div class="mother-grid-inner">
            <!--header start here-->
			<!--slider menu-->
			<div class="sidebar-menu" style="background-color: #202121;"> <!-- Changed background color to black -->
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
	<center><h2>E-Pharmacy</h2></center>
<div class="inner-block">
	<h2>View Stock Details</h2>
    <div>  	
    	<form action="vstock.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Item Name</label>
      <select class="form-control" id="item_name" name="item_name">
      		<option value="">Select Any</option>
      		<?php           
      		$con=mysqli_connect("localhost", "root", "", "pharmacy");
         
		$query="SELECT DISTINCT item_name from stock";
		$search_result = mysqli_query($con, $query);
		  if($search_result)
    {
		if(mysqli_num_rows($search_result))
    {
    while($rows=mysqli_fetch_array($search_result))
    {
            echo "<option value=\"".$rows["item_name"]."\"";
             if(@$_POST['item_name'] == $rows['item_name'])
                    echo 'selected';
              echo ">".$rows["item_name"]."</option>"; 
          } 
	}
	}
  ?>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Month</label>
      <select class="form-control" id="month" name="month">
      		<option value="">Select Any</option>
      		<?php           
      		$con=mysqli_connect("localhost", "root", "", "pharmacy");
		$query="SELECT DISTINCT month from stock";
		$search_result = mysqli_query($con, $query);
		  if($search_result)
    {
		if(mysqli_num_rows($search_result))
    {
    while($rows=mysqli_fetch_array($search_result))
    {
            echo "<option value=\"".$rows["month"]."\"";
             if(@$_POST['month'] == $rows['month'])
                    echo 'selected';
              echo ">".$rows["month"]."</option>"; 
          } 
	}
	}
  ?>
      </select>
    </div>
  </div>
  <div class="form-group">
   <button type="submit" name="search" class="btn btn-primary">Search</button>
   <button type="submit" name="clear" onClick="location.reload();" class="btn btn-primary">Clear</button>
  </div>
</form>
    	<table id="view" class="table" align="center" id="manageBrandTable">
					<thead>
						<tr>							
							<th><center>Item Name</center></th>
							<th><center>Price</center></th>
							<th><center>Quantity Brought</center></th>
							<th><center>Imported From</center></th>
							<th><center>Category</center></th>
							<th><center>Quantity Sold</center></th>
                            <th><center>Received Date</center></th>              
							<th><center>Imported Month</center></th>
						</tr>
					</thead>
					<tbody>
						<?php 
										if(isset($_POST['search'])){
											$count = 1;
										if(!empty($_POST['item_name'])||(!empty($_POST['month']))){
											if((isset($_POST['item_name']) || ($_POST['month'])) && $_POST['item_name']!="" || $_POST['month']!="" ):
												$item_name = $_POST['item_name'];
												$month = $_POST['month'];
												$sql="SELECT * from stock WHERE item_name='$item_name' OR month='$month'";
											endif;
										 $run_q = mysqli_query($con, $sql);
											while($row  = mysqli_fetch_assoc($run_q)){
												$id = $row['id'];
										?>
										<tr>
				  <td><center><?php echo $row['item_name'];?></center></td>
				  <td><center><?php echo $row['price'];?></center></td>
				  <td><center><?php echo $row['qty_brought'];?></center></td>
                  <td><center><?php echo $row['imported_from']; ?></center></td>
                  <td><center><?php echo $row['category']; ?></center></td>
                  <td><center><?php echo $row['qty_sold']; ?></center></td>
                  <td><center><?php echo $row['date']; ?></center></td>
                  <td><center><?php echo $row['month']; ?></center></td>
					</tr>
					<?php 
					}} $count++; ?>
				  <?php } ?>
					</tbody>
				</table>
    </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->

<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
$(".sidebar-icon").click(function() {                
  if (toggle) {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  } else {
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script src="dataTable_ini.js"></script>
<script>
  $(document).ready( function () {
    $('#view').DataTable();
} );
</script>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/buttons.print.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/vfs_fonts.js"></script>
<!-- mother grid end here-->
</body>
</html>
