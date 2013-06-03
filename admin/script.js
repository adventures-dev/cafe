  $("#register-form").validate({
                
                
                    rules: {
                        username: {
                            required: true
                        },
                        firstname: {
                            required: true
                        },
                        lastname: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 5
                        },
                        password2: {
                            equalTo: "#pass",
                            required: true

                        }
                    },
                    messages: {
                         password: {
                            minlength: "Your password must be at least 5 characters long"
                        },
                        password2: {
                            equalTo: "Your passwords must match"
                        },

                        
                    },
                    submitHandler: function (form) {
	                    $("#register-form").append('<div class="center spinner"><i class="icon-spinner icon-spin"></i></div>');

                        $("#error").empty();
                        
                        var username = $('#new_username').val();
                        var password = $('#pass').val();
                        var firstname = $('#firstname').val();
                        var lastname = $('#lastname').val();
                        var email = $('#email').val();

                        var data = {
                            username: username,
                            password: password,
                            firstname: firstname,
                            lastname: lastname,
                            email: email
                        }; 

                        $.ajax({
                            type: "POST",
                            url: "register-new.php",
                            data: data,
                            success: function (res) {
                            
                            	$("#register-form div").remove(".spinner");//remove loading icon here

                            	if (res == true) {
                                    $("#error").append('<h4>User successfully added!</h4>');
                                    nodata = false;
                                    getData();
    
                                 } else {
                                        
                                        $("#error").append(res);
                                 }

                            

                            }
                        });
                    }
                });


    var nodata = false; //this tells the program if there is no more data to display
    var loading = false; //this tells the program if the ajax is currently running
    var number = 0; //number used to determine location of tables in database
    $(document).ready(function () {
        getData();
    });

    $(window).scroll(function () {

        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 100 && loading != true && nodata != true) {
            getData();
        }

    });

    function makeAdmin(ele, id) {

        if (confirm('Are you sure you want to give this user admin controls?')) {
            var data = {
                id: id
            };
            $.ajax({
                type: "POST",
                url: "make-admin.php",
                data: data,
                success: function (res) {
                    if (res == true) {
                        //success action
                        ele.remove();

                    } else {
                        //failure action
                    }

                }
            });

        }
    }

    function removeUser(ele, id) {

        if (confirm('Are you sure you want to remove this user?')) {

            var data = {
                id: id
            };
            $.ajax({
                type: "POST",
                url: "remove-user.php",
                data: data,
                success: function (res) {
                    if (res == true) {
                        //success action
                        ele.remove();

                    } else {
                        //failure action
                    }
                }
            });
        }

    }

    function getData() {

        loading = true;
        var data = {
            ///include all post data in this array
            number: number
        };

        //insert loading icon here
        $("#feed").append('<div class="center spinner"><i class="icon-spinner icon-spin icon-2x"></i></div>');

        $.ajax({
            type: "POST",
            url: "admin-data.php", //example script can be anything
            data: data,
            success: function (res) {
                res = $.parseJSON(res);

                $("#feed div").remove(".spinner"); //remove loading icon here
                for (var i = 0; i < res.length; i++) {
                    //use this section to display all the data, use some .append() or something

                    $("#feed").append("<tr id='" + res[i]['id'] + "'><td>" + res[i]["username"] + "</td><td><a href='#' class='adminbutton'>Make Admin</a></td><td><a href='#' class='removebutton'>Remove User</a></td></tr>");
                    number++;
                }

                if (res.length == 0) { //no date left :( sad day
                    //display error message here
                    nodata = true;
                }  
                
                $(".adminbutton").click(function () {
                    //action here
                    makeAdmin($(this).parent().parent(), $(this).parent().parent().attr('id'));

                });

                $(".removebutton").click(function () {
                    //action here
                    removeUser($(this).parent().parent(), $(this).parent().parent().attr('id'));

                });


                loading = false;
            }
        });
    }