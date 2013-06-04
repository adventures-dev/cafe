<?php session_start();if(!$_SESSION['user']){header('Location: ../login');}?>

<?php include("../scripts/dbconnect.php");?>
<?php include("../snippets/header.php");?>
<?php include("../scripts/user-info.php");?>
<title>Purchases</title>

<div id="mainpage">
<?php include("../snippets/nav.php");?>


<!--body goes here-->
	<div class="white-bg">
		<div class="container">
			<div class="row-fluid">
									
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





