<?php session_start();if(!$_SESSION['user']){header('Location: ../login');}?>

<?php include("../scripts/dbconnect.php");?>
<?php include("../snippets/header.php");?>
<?php include("../scripts/user-info.php");?>
<title>Customers</title>

<div id="mainpage">
<?php include("../snippets/nav.php");?>


<!--body goes here-->
	<div class="white-bg">
		<div class="container">
		<div class="row-fluid">
			<div class="span4"></div>
			<div class="span4">
				<h2>Add New Customer</h2>
				<form id="add-customer" method="POST" action="">
					<div id="add-customer-error"></div>
					<label>Customer Name</label>
					<input class="input-block-level" id="name" name="name" type="text" >
					<label>Company</label>
						<select id="company" name="company" class="input-block-level">
							<?php
							
							$data = mysql_query("SELECT id, title FROM companies ORDER BY title")or die(mysql_error());
								while($info = mysql_fetch_array($data)){
								
									echo "<option value='".$info['id']."'>".$info['title']."</option>";
								}
							?>
						</select>
					<button class="btn btn-large btn-primary">Add Customer</button>
				</form>
				
			</div>
			<div class="span4"></div>
		</div>
		<hr>
			<div class="row-fluid">
				<div class="span6">
					<h2>All customers</h2>
					 <table id="feed" class="table table-bordered table-striped"></table>

				</div>		
				<div class="span6">
					<div id="edit" class="hide">
						<h2 id='edit-header'>Edit Customer</h2>
						<form id="edit-customer" method="POST" action="">
							<div id="edit-customer-error"></div>
							<label>Customer Name</label>
							<input class="input-block-level" id="edit_name" name="edit_name" type="text" >
							<label>Company</label>
								<select id="edit_company" name="edit_company" class="input-block-level">
									<?php
									
										$data = mysql_query("SELECT id, title FROM companies ORDER BY title")or die(mysql_error());
										while($info = mysql_fetch_array($data)){
										
											echo "<option value='".$info['id']."'>".$info['title']."</option>";
										}
									?>
								</select>
							<input type="hidden" id="edit_id" name="edit_id">
							<button class="btn btn-large btn-primary">Edit Customer</button>

						</form>
						<button id="remove_button" data-id="" class="btn btn-danger">Remove Customer</button>
					</div>
				</div>			
			</div>
		</div>
	</div>
<!-- end of body -->
</div><!--main page-->
<?php include("../snippets/javascripts.php");?>
<!--other scripts here-->
<script src="script.js" type="text/javascript"></script>
<script>

</script>
<?php include("../snippets/footer.php");?>





