<?php session_start();if(!$_SESSION['cart']){header('Location: ../');}?>
<?php
		$shopping_cart = $_SESSION['cart'];
?>
<?php include("../scripts/dbconnect.php");?>
<?php include("../snippets/header.php");?>
<?php include("../scripts/user-info.php");?>
<title>Checkout</title>

<div id="mainpage">
<?php include("../snippets/nav.php");?>


<!--body goes here-->
					<div class="container">
							<div class="row-fluid">
								<h2>My Cart   <button class='btn btn-danger' id='clear_cart'>Clear</button></h2>
								<table id="feed" class="table table-bordered table-striped">
									
									<?php
										$total = 0;
										for($i = 0; $i<count($shopping_cart); $i++){
											
											echo "<tr data-id='".$shopping_cart[$i]['id']."'>";
											echo "<td>".$shopping_cart[$i]['title']."</td>";
											$amount = number_format($shopping_cart[$i]['price'], 2);
											$total = $total + $amount;
											echo "<td>$".$amount."</td>";
											echo "<td><button data-id='".$shopping_cart[$i]['id']."' class='btn btn-danger pull-right remove_from_cart'>Remove Item</button></td>";
											echo "</tr>";

										}
										
										echo "<tr><th>Total:</th><th>$".number_format($total, 2)."</th><th>";
										echo '<button class="btn btn-large btn-warning pull-right" id="back_button">Continue Shopping <i class="icon-shopping-cart icon-large"></i></button>';

										echo "</th></tr>";
										
									?>
									
								</table>
								
							
							</div>
							<div class="row-fluid">
								<div class="span4"></div>
								<div class="span4">
									<h2>Checkout</h2>
									<form id="purchase_form" method="POST" action="">
										<div id="purchase-error"></div>
										
										<select id="customer" name="customer" class="input-block-level">
											<option>Guest</option>
											
											<?php
												$data = mysql_query("SELECT * FROM customers ORDER BY name")or die(mysql_error());
												
												while($info = mysql_fetch_array($data)){
													
													echo "<option value='".$info['id']."'>".$info['name']."</option>";
												}
											
											?>
										
										</select>
										
										<select id="company" name="customer" class="input-block-level">
											<?php
												$data = mysql_query("SELECT * FROM companies ORDER BY title")or die(mysql_error());
												
												while($info = mysql_fetch_array($data)){
													
													echo "<option value='".$info['id']."'>".$info['title']."</option>";
												}
											
											
											?>
										
										</select>
									
											<button class="btn btn-large btn-success input-block-level" id="purchase_button">Purchase <i class="icon-money icon-large"></i></button> <br>
									</form>
								</div>
								<div class="span4"></div>

								</div>

							</div>


<!-- end of body -->
</div><!--main page-->
<?php include("../snippets/javascripts.php");?>
<!--other scripts here-->
<script>

	$("#back_button").click(function(e){
		e.preventDefault();
		window.location = "../";
	});
	
	$("#customer").change(function(){
		if($(this).val() != "Guest"){
			
			$("#company").slideUp();
		}else{
			$("#company").slideDown();
		}
	});
	
	
	 $("#clear_cart").click(function(e){
	        	e.preventDefault();
	        			       	
		       	var data = {
			      
		       	};
		       	
		       	$.ajax({
		       	     type: "POST",
		       	     url: "../scripts/clear_cart.php",
		       	     data: data,
		       	     success: function (res) {
		       	               
			       	        window.location="../";
		       	     }
		       	});
		       	
		       	
	        });
	
	         $(".remove_from_cart").click(function(e){
	        	e.preventDefault();
	        	var button = $(this);
		       	$(this).append('<div class="center spinner"><i class="icon-spinner icon-spin"></i></div>');	                   

		       	var item = $(this).data("id");
		       	
		       	var data = {
			       	item: item
		       	};
		       	
		       	$.ajax({
		       	     type: "POST",
		       	     url: "../scripts/remove_from_cart.php",
		       	     data: data,
		       	     success: function (res) {
		       	     	$(".remove_from_cart div").remove(".spinner");
		       	                  $("#shopping_count").html(res+ '<i class="icon-shopping-cart icon-large"></i>');
		       	                  
		       	                  if(res <=0){
			       	                  window.location="../";
		       	                  }
		       	                  
		       	                  $("tr").each(function(){
		       	                 
			       	                 	var id = $(this).data("id");
			       	                 	if(id == item){
				       	                 	
				       	                 	$(this).remove();
				       	                 	     window.location="";
			       	                 	} 
		       	                  });
		       	       
		       	
		       	     }
		       	});
		       	
		       	
	        });
	        
	                 $("#purchase_form").validate({
	        
                        rules: {
                            customer: "required",
    
                        },
                        submitHandler: function (form) {

                            
                            var customer = $("#customer").val();
                            var company = 0;
                            if(customer == "Guest"){
	                            var company = $("#company").val();
                            }
                            
                            
                            	var data = {
	                            	customer:customer,
	                            	company: company
                            	};
                            	
                            	$.ajax({
                            	     type: "POST",
                            	     url: "purchase_items.php",
                            	     data: data,
                            	     success: function (res) {
                            	     	console.log(res);
                            	          window.location = "../?purchase=successful"
                            	
                            	     }
                            	});
                            	
                            
    
                        }
                    });
	        

</script>
<?php include("../snippets/footer.php");?>





