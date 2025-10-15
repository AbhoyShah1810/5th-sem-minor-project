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
     INSERT INTO `sale1`(`bill_date`) VALUES
      (:bill_date)
    ");
$statement->execute(
      array(
          
          ':bill_date'               =>  trim($_POST["bill_date"]),
          
          
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
    	 <form action="viewsale.php" name="myform" id="myform" method="post">
    	<h2>View Sale Medicine</h2>
    	
    	<div class="blankpage-main">
<div class="form-group col-md-6">
      <label for="inputEmail4">Item Name</label>
      <select class="form-control" id="item_name" name="item_name">
            <option value="">Select Any</option>
            <?php           
            $con=mysqli_connect("localhost", "root", "", "pharmacy");
         
        
        
        $query="SELECT DISTINCT item_name from stock"
;
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

    <br><br>

    	</div><br>
        <div class="form-group">

   <button type="submit" name="search" class="btn btn-primary">Search</button>
   <button type="submit" name="clear" onClick="location.reload();" class="btn btn-primary">Clear</button>
   <button type="button" class="btn-primary" data-toggle="modal" data-target="#emailModal" id="sendButton">Send</button>
  </div>
    	<div class="blankpage-main">
    	
    		
    	<table id="view" class="table" align="center" id="manageBrandTable">
                    <thead>
                        <tr>                            
                            
                            <th><center>Bill Id</center></th>
                            <th><center>Date</center></th>
                            <th><center>Month</center></th>
                            <th><center>Item Name</center></th>
                            <th><center>Quantity</center></th>
                            <th><center>Price</center></th>
                            <th><center>Total Price</center></th>
              
                            
                           
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                                        if(isset($_POST['search'])){
                                            $count = 1;
                                        if(!empty($_POST['item_name'])){
                                            if((isset($_POST['item_name'])) && $_POST['item_name']!=""):
                                                $item_name = $_POST['item_name'];
                                                
                                                
                                                
                                                
                                                
                                                $sql="SELECT * from sale1 INNER JOIN sale2 ON sale1.bill_id = sale2.bill_id WHERE sale2.item_name='$item_name'";
                                            endif;
                                            
                                            
                                            
                                            
                                                
                                         $run_q = mysqli_query($con, $sql);
                                            while($row  = mysqli_fetch_assoc($run_q)){
                                                
                                                $id = $row['id'];
                                            
                                        ?>
                                        <tr>
                  
                    
                  <td><center><?php echo $row['bill_id'];?></center></td>
                  <td><center><?php echo $row['bill_date'];?></center></td>
                  <td><center><?php echo $row['bmonth'];?></center></td>
                  <td><center><?php echo $row['item_name'];?></center></td>
                  <td><center><?php echo $row['qty']; ?></center></td>
                  <td><center><?php echo $row['price']; ?></center></td>
                  <td><center><?php echo $row['tprice']; ?></center></td>
                  
                 
                  
                          
                            
                          
               
                            
                    </tr>
                    <?php 
                  
                                        }}


              $count++;
             
                  
                  ?>
                                        
                  <?php }
                  else
                        
                        {
                            
                                     
                            
                                        //$dname="";
                                            $sql = "SELECT * from sale1 INNER JOIN sale2 ON sale1.bill_id = sale2.bill_id";
$run_q = mysqli_query($con, $sql);
                                            while($row  = mysqli_fetch_assoc($run_q)){
                                               
                                                
                                                 
                                                
?>  
          
          
              
                   <tr>
                  
                  
                          <td><center><?php echo $row['bill_id'];?></center></td>
                  <td><center><?php echo $row['bill_date'];?></center></td>
                  <td><center><?php echo $row['bmonth'];?></center></td>
                  <td><center><?php echo $row['item_name'];?></center></td>
                  <td><center><?php echo $row['qty']; ?></center></td>
                  <td><center><?php echo $row['price']; ?></center></td>
                  <td><center><?php echo $row['tprice']; ?></center></td>
         
                  
                      
                            </tr>
                            <?php
   
  }?>
  <?php 
  
  
  
                        }
                  
               
                            
                                            
                            
                  
                  ?>

                
                    </tbody>
                </table>
    
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
 ?></select></td>';
                        html_code +='<td><input type="text" name="qty[]" id="qty'+count+'"  data-srno="'+count+'" class="form-control input-sm qty" /></td>';
                        html_code +='<td><input type="text" name="price[]" id="price'+count+'"  data-srno="'+count+'" class="form-control input-sm price" /></td>';
                        html_code +='<td><input type="text" name="tprice[]" id="tprice'+count+'"  data-srno="'+count+'" class="form-control input-sm tprice" /></td>';
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
                });
       
      </script>
      
     
<!-- mother grid end here-->
</body>
</html>

<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="emailModalLabel">Send bill to customer:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="emailForm">
          <div class="form-group">
            <label for="recipientEmail">Cuatomer's Email address</label>
            <input type="email" class="form-control" id="recipientEmail" required>
          </div>
          <div class="form-group">
            <label for="emailContent">Content</label>
            <textarea class="form-control" id="emailContent" rows="3" readonly></textarea>
          </div>
          <button type="button" class="btn btn-primary" id="sendEmailButton">Send</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  //send email
$(document).ready(function() {
    $('#sendButton').click(function() {
        // Prepare the email content
        let items = [];
        $('#view tbody tr').each(function() {
            let itemName = $(this).find('td:nth-child(4)').text(); 
            let totalPrice = $(this).find('td:nth-child(7)').text();
            items.push(itemName + ': ' + totalPrice);
        });
        
        let message = "Here are your items and total price:\n\n" + items.join('\n') + "\n\nHave a great day ahead!";
        $('#emailContent').val(message);
    });

    $('#sendEmailButton').click(function() {
        let email = $('#recipientEmail').val();
        let content = $('#emailContent').val();
        
       
        let mailtoLink = `mailto:${email}?subject=Sale Report&body=${encodeURIComponent(content)}`;
        
        
        window.location.href = mailtoLink;

        
        $('#emailModal').modal('hide');
    });
});
</script>


                      
						
