  <div class="container">
<div class="navbar">
  <div class="navbar-inner">

    <a class="brand" href="../">davestrap</a>
 
  			  <ul class="nav pull-right <?php if($_SESSION['user']){echo "hidden";} ?>">
       
                        				<li>
                                    
                                        </li>

                    </ul>

    
                    <ul class="nav pull-right <?php if(!$_SESSION['user']){echo "hidden";} ?>">
                        
                        <li class="<?php if($admin != true){echo "hidden";}?>">
                            <a href="../admin">Users</a>
                        </li>
                        		<li class="dropdown pull-right" data-dropdown="dropdown">
			                       	<a class="dropdown-toggle" href="#" data-toggle="dropdown"><?php echo $username;?><i class="icon-caret-down"></i></a>
		                           
										<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
											<li><a href="../settings">Edit Profile</a></li>
											<li><a href="../scripts/logout.php">Sign Out</a></li>
										</ul>
		                        </li>
                        

                    </ul>
      </div>
  </div>
</div>
