<?php session_start(); if(!$_SESSION[ 'user']){ header('Location: ../'); } ?>
<?php include("../scripts/dbconnect.php");?>
<?php include("../snippets/header.php");?>
<?php include("../scripts/user-info.php");?>
<div id="mainpage">
    <?php include("../snippets/nav.php");?>
    <!--body goes here-->
    <div class="white-bg">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                <h2>New User</h2>
                    	<?php include("../snippets/register-form.php");?>


                </div>
                <div class="span6">
                    <table id="feed" class="table table-bordered table-striped "></table>
                </div>
            </div>
        </div>
    </div>
    <!-- end of body -->
</div>
<!--main page-->
<?php include("../snippets/javascripts.php");?>
<!--other scripts here-->
<script src="script.js"></script>
<?php include( "../snippets/footer.php");?>