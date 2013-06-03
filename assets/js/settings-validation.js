
                        //form validation rules
                        $("#settings-form").validate({
                            rules: {
                                username: {
                                    required: false,
                                },                                
                                password: {
                                    minlength: 5
                                },
                                password2: {
                                    equalTo: "#pass"

                                },
                                oldpassword: "required"
                            },
                            messages: {
                                username: {
                                    notEqual: "<font style='color:red;'>Please enter a new username</font>",

                                },
                                password: {
                                    minlength: "<font style='color:red;'>Your password must be at least 5 characters long</font>"
                                },
                                password2: {
                                    equalTo: "<font style='color:red;'>Your passwords must match</font>"
                                },
                                oldpassword: "<font style='color:red;'>Please enter your password to continue</font>"
                            },
                            submitHandler: function (form) {

                               	$("#settings-form").append('<div class="center spinner"><i class="icon-spinner icon-spin"></i></div>');
                                $("#error").empty();
                                
                                var username = document.getElementById('username').value;
                                var newpassword = document.getElementById('pass').value;
                                var oldpassword = document.getElementById('oldpass').value;
                          

                                var data = {
                                    username: username,
                                    newpassword: newpassword,
                                    oldpassword: oldpassword,
                      

                                };
                                 ///ajax here::::
                                $.ajax({
                                    type: "POST",
                                    url: "../scripts/update-info.php",
                                    data: data,
                                    success: function (res) {
                                    	$("#settings-form div").remove(".spinner");//remove loading icon here

                                        if (res == true) {
                                             
                                             
                            
                                             if($("#username").val() != ""){
                                             	$("#username").attr("placeholder", username);

                                             }
                           
                               

                                           $("#error").append('<h4>Your information has been saved</h4>');


                                        } else {
                                        	
                                            $("#error").append('<font style="color:red;">' + res + '</font>');
                                        }

                                    }
                                });
                            }
                        });
