<?php
session_start();

if(!$_SESSION['user']){
	header('Location: ../');
}
?>
<?php include("../scripts/dbconnect.php");?>
<?php include("../snippets/header.php");?>
<?php include("../scripts/user-info.php");?>
<div id="mainpage">
<?php include("../snippets/nav.php");?>

<!--body goes here-->
	<div class="white-bg" id="section_one">
		<div class="container">
			<div class="row-fluid">
			
			<div class="span4"></div>
				<div class="span4">
					<h2>Edit Info</h2>
					<?php include("../snippets/settings-form.php");?>
				</div>
			</div>
			<div class="span4"></div>

		</div>
	</div>
<!-- end of body -->
</div><!--main page-->
<?php include("../snippets/javascripts.php");?>
<!--other scripts here-->
<script src="../assets/js/settings-validation.js"></script>

<script>

</script>
<?php include("../snippets/footer.php");?>