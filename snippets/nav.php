  <div class="container">
<div class="navbar">
  <div class="navbar-inner">

    <a class="brand" href="../">davestrap</a>
 
  			  <ul class="nav pull-right <?php if($_SESSION['user']){echo "hidden";} ?>">
       
                        				<li class="dropdown pull-right" data-dropdown="dropdown">
                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In<i class="icon-caret-down"></i></a>

                                            <div class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="padding: 15px; padding-bottom: 15px;">
                                                <?php include("../snippets/login-form.php");?>
                                                
                                                <!-- FACEBOOK LOGIN BUTTON-->
                                                <a href="javascript:void(0);" onclick="login();" class="input-block-level <?php if($use_facebook != true){echo "hidden";}?>"><img src="../assets/img/facebook_button.png"></a>
                                                                                             
                                                <a style="font-size:.7em" href="../forgot">Forgot your password?</a> <a style="font-size:.7em" href="../register">Register</a>
                                            </div>
                                        </li>

                    </ul>

    
                    <ul class="nav pull-right <?php if(!$_SESSION['user']){echo "hidden";} ?>">
                    	<li>
                            <a href="../page">Sample Page</a>
                        </li>
                        
                        <li class="<?php if($admin != true){echo "hidden";}?>">
                            <a href="../admin">Admin</a>
                        </li>
                        		<li class="dropdown pull-right" data-dropdown="dropdown">
			                       	<a class="dropdown-toggle" href="#" data-toggle="dropdown"><?php echo $username;?><i class="icon-caret-down"></i></a>
		                           
										<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
											<li><a href="../profile">My Profile</a></li>
											<li><a href="../settings">Settings</a></li>
											<li><a href="../scripts/logout.php">Sign Out</a></li>
										</ul>
		                        </li>
                        

                    </ul>
      </div>
  </div>
</div>
