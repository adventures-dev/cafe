<?php session_start(); if($_SESSION[ 'user']){ header( 'Location: profile'); } //checks if the user is logged in ?> 

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Davestrap</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <!-- Le styles -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/smoothness/jquery.custom.min.css " rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
        <![endif]-->
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
    </head>
    
    <body>
        <?php include( "config.php");?>
        <?php include( "scripts/dbconnect.php");?>

        
        <div id='wrap'>
            <div id='main'>
               
    
	            <div id="mainpage">
        
     
                      <div class="container">
						<div class="navbar">
						  <div class="navbar-inner">
						
						    <a class="brand" href="../">davestrap</a>
						 
						  			  <ul class="nav pull-right <?php if($_SESSION['user']){echo "hidden";} ?>">
						       
						                    </ul>
						  </div>
						  </div>
						</div>

                                        
                   <div class="off-white-bg">
	                   	<div class="container">
	                   		<div class="row-fluid">
	                   		  <div class="span4"></div> 
	                   			<div class="span4">
	                   				<?php include( "snippets/login-form.php");?>
                                                    
                                    <!-- FACEBOOK LOGIN BUTTON -->
                                    <a href="javascript:void(0);" onclick="login();" class="input-block-level <?php if($use_facebook != true){echo " hidden ";}?>">
                                        <img src="assets/img/facebook_button.png">
                                    </a><!--end facebook button -->
                                    
                                    <a style="font-size:.7em" href="forgot">Forgot your password?</a><br>
                                    <a style="font-size:.7em" href="register">Register</a>

	                   			</div>
	                   			  <div class="span4"></div> 
	                   		</div>
	                   	</div>
                   </div>
                    
                    <div class="white-bg"> <!--section-->

                        <div class="container">
                            <div class="row-fluid">
                            <div class="span4"></div>                
                                <div class="span4">
                                    <h4>Enter Admin Info</h4>
                                    <div id="create-error"></div>
                                    <form id="create-form" action="" method="post">
                                        <input type="text" id="admin" name="admin" placeholder="username" class="input-block-level">
                                        <input type="password" id="adminpass" name="adminpass" placeholder="password" class="input-block-level">
                                        <button class="btn btn-large" id="createbutton">Create Table</button>
                                    </form>
                                </div><!-- end of table creation-->
                                  <div class="span4"></div> 
                            </div>
                        </div>
                    </div><!--end of section-->
                </div><!--end of main-->
            </div> <!--end-of-wrap-->
           
        </div><!--end-of-main-page-->
        
        <footer>
        	<div class="container">
	        <div>
        </footer><!-- end of foooooooter -->
        
        
        <!-- Le javascript-->
	    <!-- Placed at the end of the document so the pages load faster -->
	    <!--davestrap comes with a bunch of really sweet js files to use.  below are the basics that should be in every single webpage you ever make-->
        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery-ui.custom.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/js/hide-address-bar.js" type="text/javascript"></script>
        <!-- end of basics-->
                        
        <script type="text/javascript">
        
            $("#create-form").validate({

                rules: {
                    admin: "required",
                    adminpass: {
                        required: true,
                        minlength: 5
                    }

                },
                messages: {
                    admin: "<font style='color:red;'>Please enter a username</font>",
                    adminpass: {
                        required: "<font style='color:red;'>Please enter a password</font>",
                        minlength: "<font style='color:red;'>Your password must be at least 5 characters long</font>"
                    }
                },
                submitHandler: function (form) {
                    $("<idorclass>").append('<div class="center spinner"><i class="icon-spinner icon-spin"></i></div>');
                    $("create-error").empty();

                    var admin = $("#admin").val();
                    var password = $("#adminpass").val();

                    var data = {
                        admin: admin,
                        password: password
                    };
                    $.ajax({
                        type: "POST",
                        url: "scripts/create-tables.php",
                        data: data,
                        success: function (res) {
                            if (res == true) {
                                $("#error").empty();
                                $("#error").append('<h4>Your tables have been created!</h4>');
                                window.location = 'profile';
                            } else {
                                $("#error").empty();
                                $("#error").append('<font style="color:red;">' + res + '</font>');
                            }
                        }
                    });
                }
            });

            //login validation
            $("#login-form").validate({

                rules: {
                    username: "required",
                    password: "required"

                },
                messages: {
                    username: "<font style='color:red;'>Please enter a username</font>",
                    password: "<font style='color:red;'>Please enter a password</font>"
                },
                submitHandler: function (form) {
                    $("#login-form").append('<div class="center spinner"><i class="icon-spinner icon-spin"></i></div>');

                    ///ajax here::::
                    $("#login-error").empty();

                    var user_username = $(form).children("#username").val();
                    var user_password = $(form).children("#password").val();

                    var data = {
                        username: user_username,
                        password: user_password,
                    };

                    $.ajax({
                        type: "POST",
                        url: "scripts/login.php",
                        data: data,
                        success: function (res) {
                            $("#login-form div").remove(".spinner"); //remove loading icon here

                            if (res == true) {
                                window.location = "profile";
                            } else {

                                $("#login-error").append('<font style="color:red;">' + res + '</font>');
                            }
                        }
                    });

                }
            });

           
        </script><!-- end of other scripts -->
        
        <?php if($use_facebook){include( "scripts/facebook-js.php");}?> <!-- used for facebook controls, if you don't want to use facebook just ignore-->
        
    </body>

</html>