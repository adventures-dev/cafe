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
								<table id="feed" class="table table-bordered table-striped">
									
									<?php
										$total = 0;
										for($i = 0; $i<count($shopping_cart); $i++){
											
											echo "<tr data-id='".$info['id']."'>";
											echo "<td>".$shopping_cart[$i]['title']."</td>";
											$amount = number_format($shopping_cart[$i]['price'], 2);
											$total = $total + $amount;
											echo "<td>$".$amount."</td>";
											echo "<td><button data-id='".$shopping_cart[$i]['id']."' class='btn btn-danger pull-right remove_from_cart'>Remove Item</button></td>";
											echo "</tr>";

										}
										
										echo "<tr><th>Total:</th><th>".$total."</th><th><button class='btn btn-large btn-danger pull-right' id='clear_cart'>Clear Cart</button></th></tr>";
									
									?>
									
								</table>
								
							
							</div>
							<div class="row-fluid">

								<button class="btn btn-large btn-success  pull-right" id="purchase_button">Purchase <i class="icon-money icon-large"></i></button> 
								<button class="btn btn-large btn-warning  pull-right" id="back_button">Continue Shopping <i class="icon-shopping-cart icon-large"></i></button>

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
	
	$("#purchase_button").click(function(e){
		e.preventDefault();
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
			       	                 	} 
		       	                  });
		       	       
		       	
		       	     }
		       	});
		       	
		       	
	        });

</script>
<?php include("../snippets/footer.php");?>





