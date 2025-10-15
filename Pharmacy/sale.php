<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
$mm = new PDO('mysql:host=localhost;dbname=pharmacy','root', '');
?>

<?php
 if(isset($_POST["insert"]))
  { 
    
    $statement = $mm->prepare("
     INSERT INTO `sale1`(`bill_date`,`bmonth`) VALUES
      (:bill_date,:bmonth)
    ");
$statement->execute(
      array(
          
          ':bill_date'               =>  trim($_POST["bill_date"]),
          ':bmonth'               =>  trim($_POST["bmonth"]),
          
          
          )
    );

    
    $statement = $mm->query("SELECT LAST_INSERT_ID()");
    $bill_id = $statement->fetchColumn();
     
      
      for($count=0; $count<$_POST["total_row"]; $count++)
      {

        $statement = $mm->prepare("
         INSERT INTO `sale2`(`bill_id`, `item_name`, `qty`, `price`, `tprice`) VALUES 
         (:bill_id, :item_name, :qty, :price, :tprice)
          ");

        $statement->execute(
          array(
            ':bill_id'  =>  $bill_id,
          
            ':item_name'  =>  trim($_POST["item_name"][$count]),
            ':qty'  =>  trim($_POST["qty"][$count]),
            ':price'  =>  trim($_POST["price"][$count]),
            ':tprice'  =>  trim($_POST["tprice"][$count]),
            
            
          )
        );
      }
      header("Location:sale.php");
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
    	 <form action="sale.php" name="myform" id="myform" method="post">
    	<h2>Sale Medicine</h2>
    	
    	<div class="blankpage-main">
<div class="form-row">
    <div class="form-group col-md-6">
     <label for="inputEmail3">Bill Date</label>
      <input type="text" name="bill_date" readonly class="form-control" value="<?php echo date('Y-m-d'); ?>">
       <input type="hidden" name="bmonth" readonly class="form-control" value="<?php echo date('F'); ?>">
    </div>
    
  </div><br><br>
    	</div>
    	<div class="blankpage-main">
    	
    		
    	<table id="outward-table" class="table table-bordered  table-responsive" style="width:1060px;">
<tr>
                              <th bgcolor="#F0F3F4 ">S.No.</th>
                              <th bgcolor="#F0F3F4 ">Medicine Name</th>
                              
                              <th bgcolor="#F0F3F4 ">Quantity</th>
                           
                              <th bgcolor="#F0F3F4 "><center>Price</center></th>
                              <th bgcolor="#F0F3F4 "><center>Total Price</center></th>
                              
                              
							
							   
                              
                              <th bgcolor="#F0F3F4" rowspan="1">Delete</th>
                             
                            </tr>
							
							<tr>
                               
<td>1</td>
							<td><select class="form-control input-sm item_name" style="height:40px;" id="item_name" name="item_name[]">
								<option value="">Select Any</option>
								<?php 
$con=mysqli_connect("localhost", "root", "", "pharmacy");
          $sql = 'SELECT DISTINCT item_name FROM stock';
          $run_sql = mysqli_query($con, $sql);
          
          while($rows = mysqli_fetch_assoc($run_sql))
          {
          
      echo "<option value=\"".$rows["item_name"]."\"";
             if(@$_POST['item_name'] == $rows['item_name'])
                    echo 'selected';
                   
              echo ">".$rows["item_name"]."</option>"; 
      
          } 
 ?>
							</select>
							
							 
							 </td> 
		  <td>
							 <input class="form-control input-sm qty"  id="qty"  name="qty[]"  type="number" min="0" oninput="validateInteger(this)" />

	
		 </td>
		 <td>
							  <input type="text" class="form-control input-sm price" id="price" name="price[]" readonly />
							  </td>
							  <td>
							  <input type="text" id="tprice" name="tprice[]" class="form-control input-sm tprice" readonly />
							  </td>
							 <td><button type="button"  class="btn btn-danger remove_row">X</button></td>
                               </tr>
							 	</table>
							 	<div align="right">
                                            <button type="button" name="add_row" id="add_row" class="btn btn-success">Add Row</button>
                            </div>	
<table align="right">
<tr>
									
                                   
                      </tr>
					 <br>
                      <tr>
                                    <td colspan="2" align="center">
                                        <input type="hidden" name="final_total" id="final_total" value=""/>
										<input type="hidden" name="total_row" id="total_row" value="1"/>
										<input type="submit" class="btn btn-primary" name="insert" value="Submit">
                                        <!--<input type="submit" name="insert" id="insert" class="btn btn-info" value="Submit"/>-->
                                    </td>
                        </tr>
                               
                  </table>
    <br><br>
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
                  <li><a href="#" onclick="window.open('vstock.php')"><i class="fa fa-eye"></i><span>View Stock Details</span></a></li>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/bootstrap.js"> </script>

                  <script>
        $(document).ready(function(){
                   
                    var count = 1;
                    $(document).on('click', '#add_row', function(){
                        count = count+1;
                        $('#total_row').val(count);
                        var html_code = '';
                       html_code +='<tr id="row_id_'+count+'">';
                        html_code +='<td>'+count+'</td>';
                        
                        html_code +='<td><select name="item_name[]" id="item_name'+count+'"  style="height:40px;" data-srno="'+count+'" class="form-control input-sm item_name"><option value="">Select Any</option><?php 
$con=mysqli_connect("localhost", "root", "", "pharmacy");
          $sql = 'SELECT DISTINCT item_name FROM stock';
          $run_sql = mysqli_query($con, $sql);
          
          while($rows = mysqli_fetch_assoc($run_sql))
          {
          
      echo "<option value=\"".$rows["item_name"]."\"";
             if(@$_POST['item_name'] == $rows['item_name'])
                    echo 'selected';
                   
              echo ">".$rows["item_name"]."</option>"; 
      
          } 
 ?></select></td>';//validation
                        html_code +='<td><input type="number" name="qty[]" id="qty'+count+'"  data-srno="'+count+'" class="form-control input-sm qty" min="0" oninput="validateInteger(this)" /></td>';
                        html_code +='<td><input type="text" name="price[]" id="price'+count+'"  data-srno="'+count+'" class="form-control input-sm price" readonly /></td>';
                        html_code +='<td><input type="text" name="tprice[]" id="tprice'+count+'"  data-srno="'+count+'" class="form-control input-sm tprice" readonly /></td>';
                        html_code +='<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger remove_row">X</button></td></tr>';
                        
                        $('#outward-table').append(html_code);

             
                    });
                    $(document).on('click', '.remove_row', function(){
                        var row_id = $(this).attr("id");
                       
                        $('#row_id_'+row_id).remove();
                        count--;
                        $('#total_row').val(count);
                    });
                    function cal_final_total(count){
                        var final_total_article = 0;
                        var grand_total_quintle = 0;
                       
                        for( j=1; j<=count; j++){
                            var article = 0;
                            var qtl = 0;
                            var kg1 = 0;
                            article = $('#article'+j).val();
                             qtl = $('#quintle'+j).val();
                             kg1 = $('#kg'+j).val();
                            
                            if(article > 0){
                                    final_total_article = parseFloat(final_total_article)+parseFloat(article);
									}
									if(qtl > 0){
                                    grand_total_quintle = parseFloat(grand_total_quintle)+parseFloat(qtl);
                                }
								if(kg1 > 0){
                                    grand_total_kg = parseFloat(grand_total_kg)+parseFloat(kg1);
                                }
                        }
                        $('#final_total_article').text(final_total_article);
                        
                        
                    }
					$(document).on('blur', '.article', function(){
                    cal_final_total(count); 
                });
                    $(document).on('blur', '.quintle', function(){
                    cal_final_total(count); 
                });
				$(document).on('blur', '.kg', function(){
                    cal_final_total(count); 
                });

                    // Fetch price when an item is selected
                    $(document).on('change', '.item_name', function(){
                        var item_name = $(this).val();
                        var row_id = $(this).data('srno');
                        
                        if(item_name) {
                            $.ajax({
                                url: "fetch_price.php", // Create this file to fetch price
                                method: "POST",
                                data: {item_name: item_name},
                                dataType: "json",
                                success: function(data) {
                                    $('#price' + row_id).val(data.price); // Set the price in the input
                                    calculateTotal(row_id); // Calculate total price
                                }
                            });
                        } else {
                            $('#price' + row_id).val(''); // Clear price if no item is selected
                            $('#tprice' + row_id).val(''); // Clear total price if no item is selected
                        }
                    });

                    // Calculate total price based on quantity and price
                    $(document).on('blur', '.qty', function(){
                        var row_id = $(this).data('srno');
                        calculateTotal(row_id);
                    });

                    function calculateTotal(row_id) {
                        var qty = $('#qty' + row_id).val();
                        var price = $('#price' + row_id).val();
                        var tprice = qty * price;
                        $('#tprice' + row_id).val(tprice.toFixed(2)); // Set total price and format to 2 decimal places
                    }

                    // Trigger change event for the first row on page load
                    $('.item_name').first().trigger('change');
                });
       
      </script>
     
<!-- mother grid end here-->
</body>
</html>


                      
						





