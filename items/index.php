<?php session_start();if(!$_SESSION['user']){header('Location: ../login');}?>

<?php include("../scripts/dbconnect.php");?>
<?php include("../snippets/header.php");?>
<?php include("../scripts/user-info.php");?>
<title>Items</title>

<div id="mainpage">
<?php include("../snippets/nav.php");?>


<!--body goes here-->
	<div class="white-bg">
		<div class="container">
		<div class="row-fluid">
			<div class="span4"></div>
			<div class="span4">
				<h2>Add New Item</h2>
				<form id="add-item" method="POST" action="">
					<div id="add-item-error"></div>
					<label>Item Name</label>
					<input class="input-block-level" id="title" name="title" type="text" >
					<label>Item Description</label>
					<textarea class="input-block-level" id="description" name="description"></textarea>
					<label>Price</label>
						<select id="price" name="price" class="input-block-level">
							<?php
								for($i=1; $i<21; $i++){
									$price = .25 * $i;
									echo "<option>".number_format($price, 2) ."</option>";
								}
							?>
						</select>
					<button class="btn btn-large btn-primary">Add Item</button>
				</form>
				
			</div>
			<div class="span4"></div>
		</div>
		<hr>
			<div class="row-fluid">
				<div class="span6">
					<h2>All Items</h2>
					 <table id="feed" class="table table-bordered table-striped"></table>

				</div>		
				<div class="span6">
					<div id="edit" class="hide">
						<h2 id='edit-header'>Edit Item</h2>
						<form id="edit-item" method="POST" action="">
							<div id="edit-item-error"></div>
							<label>Item Name</label>
							<input class="input-block-level" id="edit_title" name="edit_title" type="text" >
							<label>Item Description</label>
							<textarea class="input-block-level" id="edit_description" name="edit_description"></textarea>
							<label>Price</label>
								<select id="edit_price" name="edit_price" class="input-block-level">
									<?php
										for($i=1; $i<21; $i++){
											$price = .25 * $i;
											echo "<option>".number_format($price, 2) ."</option>";
										}
									?>
								</select>
							<input type="hidden" id="edit_id" name="edit_id">
							<button class="btn btn-large btn-primary">Edit Item</button>

						</form>
						<button id="remove_button" data-id="" class="btn btn-danger">Remove Item</button>
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





