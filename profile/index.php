<?php
session_start();

if(!$_SESSION['user']){
	header('Location: ../');
}
?>
<?php include("../scripts/dbconnect.php");?>
<?php include("../snippets/header.php");?>
<?php include("../scripts/user-info.php");?>

<title>Profile Page</title>
<div id="mainpage">
<?php include("../snippets/nav.php");?>


<!--body goes here-->
	<div class="white-bg">
		<div class="container">
			<div class="row-fluid">
				<div class="span6">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
				<div class="span6">
						<table class="table table-bordered table-striped ">
							<thead>
								<tr>
							    	<td><div class="image-container"><img src="<?php echo $image;?>"></div></td>
							    </tr>
							</thead>
							<tbody>
							    <tr>
							      <th>username:</th>
							      <td><?php echo $username;?></td>
							    </tr>				   
							    <tr>
							      <th>name:</th>
							      <td><?php echo $firstname." ".$lastname;?></dt>
							    </tr>
								<tr>
							      <th>email:</th>
							      <td><?php echo $email;?></dt>
							    </tr>
						    </tbody>
						</table>
					
					
				</div>
			</div>
		</div>
	</div>
	
	<!-- end of body -->
</div><!--main page-->
<?php include("../snippets/javascripts.php");?>
<!--other scripts here-->
<?php include("../snippets/footer.php");?>
