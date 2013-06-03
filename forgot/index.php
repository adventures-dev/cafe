<?php
session_start();

if($_SESSION['user']){
	header('Location: ../profile');
}
?>
<?php include("../scripts/dbconnect.php");?>
<?php include("../snippets/header.php");?>

<div id="mainpage">

<?php include("../snippets/nav.php");?>

<!--body goes here-->
	<div class="white-bg" id="section_one">
		<div class="container">
			<div class="row-fluid">
				
				<div class="span12">
					<?php include("../snippets/recover-form.php");?>
				</div>
			</div>
		</div>
	</div>
<!-- end of body -->
</div><!--main page-->
<?php include("../snippets/javascripts.php");?>
<!--other scripts here-->
<script src="../assets/js/login-validation.js" type="text/javascript"></script>
<?php if($use_facebook){ include("../scripts/facebook-js.php");}?>


<?php include("../snippets/footer.php");?>