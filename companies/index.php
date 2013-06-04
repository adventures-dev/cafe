<?php session_start();if(!$_SESSION['user']){header('Location: ../login');}?>

<?php include("../scripts/dbconnect.php");?>
<?php include("../snippets/header.php");?>
<?php include("../scripts/user-info.php");?>
<title>Companies</title>

<div id="mainpage">
<?php include("../snippets/nav.php");?>


<!--body goes here-->
	<div class="white-bg">
		<div class="container">
		<div class="row-fluid">
			<div class="span4"></div>
			<div class="span4">
				<h2>Add New Company</h2>
				<form id="add-company" method="POST" action="">
					<div id="add-company-error"></div>
					<label>Company Name</label>
					<input class="input-block-level" id="title" name="title" type="text" >
					<button class="btn btn-large btn-primary">Add Company</button>
				</form>
				
			</div>
			<div class="span4"></div>
		</div>
			<hr>
			<div class="row-fluid">
				<div class="span6">
					<h2>All Companies</h2>
					 <table id="feed" class="table table-bordered table-striped"></table>

				</div>		
				<div class="span6">
					<div id="edit" class="hide">
						<h2 id='edit-header'>Edit Company</h2>
						<form id="edit-company" method="POST" action="">
							<div id="edit-company-error"></div>
							<label>Company Name</label>
							<input class="input-block-level" id="edit_title" name="edit_title" type="text" >
							<input type="hidden" id="edit_id" name="edit_id">
							<button class="btn btn-large btn-primary">Edit Company</button>
						</form>
						<button id="remove_button" data-id="" class="btn btn-danger">Remove Company</button>

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





