<?php session_start(); if($_SESSION[ 'user']){ header( 'Location: admin'); } //checks if the user is logged in ?> 
<?php
	//get cart
	$shopping_cart = $_SESSION['cart'];
	//session_destroy();
	//for($i=0; $i<count($shopping_cart); $i++){
	//	echo $shopping_cart[$i]." ";
	//}
?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Museao Cafe</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <!-- Le styles -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/smoothness/jquery-ui.custom.min.css " rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
        <![endif]-->
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
    </head>
    
    <body>
        <?php include( "config.php");?>
        <?php include( "scripts/dbconnect.php");?>

        
        <div id='wrap'>
            <div id='main'>
               
    
	            <div id="mainpage">
        
     
                      <div class="container">
						<div class="navbar">
						  <div class="navbar-inner">
						
						    <a class="brand" href="../">museao cafe</a>
						 
						  			  <ul class="nav pull-right <?php if($_SESSION['user']){echo "hidden";} ?>">
							  			  <li>
							  			  		<a href="checkout" id="shopping_count"><?php echo count($shopping_cart);?> <i class="icon-shopping-cart icon-large"></i></a>
							  			  </li>
						  			  </ul>
						  </div>
						  </div>
						</div>
						
						<div class="container">
							<?php
								if($_GET['purchase'] == "successful"){
									
									echo '<div class="alert alert-success">
											  <button type="button" class="close" data-dismiss="alert">&times;</button>
											  <strong>Success!</strong> Your purchase was successful!
											</div>';
								}
						
							?>
							<div class="row-fluid">
								<table id="feed" class="table table-bordered table-striped">
									
									<?php
										$data = mysql_query("SELECT * FROM items ORDER BY title")or die(mysql_error());
										
										while($info=mysql_fetch_array($data)){
											
											echo "<tr>";
											echo "<th>".$info['title']."</th>";
											echo "<td>".$info['description']."</td>";
											echo "<td>$".number_format($info['price'], 2)."</td>";
											$count = 0;
											for($i=0; $i<count($shopping_cart); $i++){
												if($shopping_cart[$i]['id'] == $info['id']){
													$count++;
												}
												
											}
											echo "<td data-id='".$info['id']."' data-count='".$count."' class='amount_in_cart'>".$count." in cart</td>";
											if($count > 0){
												echo "<td><button data-id='".$info['id']."' class='btn btn-danger pull-right remove_from_cart'>Remove Item</button></td>";
											}else{
												echo "<td><button data-id='".$info['id']."' class='btn btn-danger pull-right remove_from_cart hidden'>Remove Item</button></td>";

											}
											echo "<td><button data-id='".$info['id']."'  data-title='".$info['title']."'  data-price='".$info['price']."' class='btn btn-success pull-right add_to_cart'>Add to Cart</button></td>";
											echo "</tr>";

										}
									
									?>
									
								</table>
								
							
							</div>
							<div class="row-fluid" align="center">
								<button class="btn btn-large btn-primary" id="checkout_button">Checkout <i class="icon-shopping-cart icon-large"></i></button>
							</div>
						</div>

                  </div><!--end of main-->
            </div> <!--end-of-wrap-->
           
        </div><!--end-of-main-page-->
        <hr>
        <footer>
        	<div class="container" align="center">
        		<a href="../">Museao</a> | <a href="">Help</a> | <a href="login">Admin</a>
	        <div>
        </footer><!-- end of foooooooter -->
        
        
       
        
        <!-- Le javascript-->
	    <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery-ui.custom.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/js/hide-address-bar.js" type="text/javascript"></script>
        <!-- end of basics-->
                        
        <script type="text/javascript">
	        $(".add_to_cart").click(function(e){
	        	e.preventDefault();
	        	
		       	$(this).append('<div class="center spinner"><i class="icon-spinner icon-spin"></i></div>');	                   

		       	var item = $(this).data("id");
		       	var title = $(this).data("title");
		       	var price = $(this).data("price");

		       	var data = {
			       	item: item,
			       	title: title,
			       	price: price
		       	};
		       	
		       	$.ajax({
		       	     type: "POST",
		       	     url: "scripts/add_to_cart.php",
		       	     data: data,
		       	     success: function (res) {
		       	     	$(".add_to_cart div").remove(".spinner");

		       	          if (res != false) {
		       	                  $("#shopping_count").html(res+ '<i class="icon-shopping-cart icon-large"></i>');
		       	                  $(".amount_in_cart").each(function(){
			       	                  var id = $(this).data("id");
			       	                  var amount = parseInt($(this).data("count"));
			       	                  if(id == item){
			       	                  	var total = amount+1;
				       	                  $(this).html(total+" in cart");
				       	                  $(this).data("count", total);
				       	                  $(".remove_from_cart").each(function(){
					       	                 	var remove_id = $(this).data("id"); 
					       	                 	if(remove_id == item){
					       	                 		$(this).removeClass("hidden");
					       	                 		$(this).show();
					       	                 	}
				       	                  });
			       	                  }
		       	                  })
		       	                  
		       	                  
		       	          } else {
		       	                  //failure action
		       	          }
		       	
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
		       	     url: "scripts/remove_from_cart.php",
		       	     data: data,
		       	     success: function (res) {
		       	     	$(".remove_from_cart div").remove(".spinner");

		       	                  $("#shopping_count").html(res+ '<i class="icon-shopping-cart icon-large"></i>');
		       	                  $(".amount_in_cart").each(function(){
			       	                  var id = $(this).data("id");
			       	                  var amount = parseInt($(this).data("count"));
			       	                  if(id == item){
			       	                  		var total = amount-1;
				       	                  $(this).html(total+" in cart");
				       	                  $(this).data("count", total);
				       	                  
				       	                  if(total <= 0){
					       	                  button.hide();
				       	                  }
			       	                  }
		       	                  })
		       	                  
		       	       
		       	
		       	     }
		       	});
		       	
		       	
	        });
	        
	        $("#checkout_button").click(function(e){
		        e.preventDefault();
		        window.location = "checkout";
	        });


        </script><!-- end of other scripts -->
                
    </body>

</html>