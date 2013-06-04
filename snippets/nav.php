  <div class="container">
<div class="navbar">
  <div class="navbar-inner">

    <a class="brand" href="../">museao cafe</a>
 
  				  <ul class="nav pull-right <?php if($_SESSION['user']){echo "hidden";} ?>">
       
                        				  <li>
							  			  		<a href="checkout" id="shopping_count"><?php echo count($shopping_cart);?> <i class="icon-shopping-cart icon-large"></i></a>
							  			  </li>

                    </ul>

    
                    <ul class="nav pull-right <?php if(!$_SESSION['user']){echo "hidden";} ?>">
                       
                        <li id='nav_items'>
                        	<a href="../items">Items</a>
                        </li>
                         <li id='nav_companies'>
                        	<a href="../companies">Companies</a>
                        </li>
                         <li id='nav_customers'> 
                        	<a href="../customers">Customers</a>
                        </li>
                          <li id='nav_purchases'> 
                        	<a href="../purchases">Purchases</a>
                        </li>
                        		<li class="dropdown pull-right" data-dropdown="dropdown">
			                       	<a class="dropdown-toggle" href="#" data-toggle="dropdown"><?php echo $username;?><i class="icon-caret-down"></i></a>
		                           
										<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
											<li><a href="../settings">Edit Profile</a></li>
											 <li id='nav_items'>
					                        	<a href="../admin">Edit Users</a>
					                        </li>
											<li><a href="../scripts/logout.php">Sign Out</a></li>
										</ul>
		                        </li>
                        

                    </ul>
      </div>
  </div>
</div>
