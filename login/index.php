
<?php include("../scripts/dbconnect.php");?>
<?php include("../snippets/header.php");?>
<?php include("../scripts/user-info.php");?>
<title>Sample Page</title>

<div id="mainpage">
<?php include("../snippets/nav.php");?>


<!--body goes here-->
	<div class="white-bg">
		<div class="container">
			<div class="row-fluid">
				<div class="span4"></div>
				<div class="span4">
					<?php include("../snippets/login-form.php");?>
				</div>
				<div class="span4"></div>					
			</div>
		</div>
	</div>
<!-- end of body -->
</div><!--main page-->
<?php include("../snippets/javascripts.php");?>
<!--other scripts here-->
<script src="../assets/js/login-validation.js" type="text/javascript"></script>
<script>

</script>
<?php include("../snippets/footer.php");?>





