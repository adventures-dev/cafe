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
				Show between <input type="date" id="date_one" name="date_one" value="<?php echo date("Y-m-d", strtotime("-1 month"));?>"> and <input type="date" id="date_two" name="date_two" value="<?php echo date('Y-m-d', strtotime(' +1 day'));?>"> <button class="btn btn-primary" id="export_button">Export Data</button>
									
			</div>
			<div class="row-fluid">
				<table id="feed" class="table table-bordered table-striped"></table>

									
			</div>
			
			
		</div>
	</div>
<!-- end of body -->
</div><!--main page-->
<?php include("../snippets/javascripts.php");?>
<!--other scripts here-->
<script src='jquery.TableCSVExport.js'></script>
<script src="script.js" type="text/javascript"></script>
<script>

</script>
<?php include("../snippets/footer.php");?>





