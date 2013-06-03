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
            url: "../scripts/login.php",
            data: data,
            success: function (res) {
                $("#login-form div").remove(".spinner"); //remove loading icon here

                if (res == true) {
                    window.location = "../admin";
                } else {

                    $("#login-error").append('<font style="color:red;">' + res + '</font>');
                }
            }
        });

    }
});