<?php session_start(); if($_SESSION[ 'user']){ header( 'Location: admin'); } //checks if the user is logged in ?> 
<?php
	//get cart
	
	$shopping_cart = $_SESSION['cart'];

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
							  			  		<a href="#"><?php echo count($shopping_cart);?> <i class="icon-shopping-cart icon-large"></i></a>
							  			  </li>
						  			  </ul>
						  </div>
						  </div>
						</div>
						
						<div class="container">
							<div class="row-fluid">
								<table id="feed" class="table table-bordered table-striped">
									
									<?php
										$data = mysql_query("SELECT * FROM items ORDER BY title")or die(mysql_error());
										
										while($info=mysql_fetch_array($data)){
											
											echo "<tr>";
											echo "<th>".$info['title']."</th>";
											echo "<td>".$info['description']."</td>";
											echo "<td>".number_format($info['price'], 2)."</td>";
											echo "<td><button data-id='".$info['id']."' class='btn btn-success add_to_cart'>Add to Cart</button></td>";

										}
									
									?>
									
								</table>
								
							
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


        </script><!-- end of other scripts -->
                
    </body>

</html>