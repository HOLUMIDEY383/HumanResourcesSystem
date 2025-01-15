$(function () {

    $('#signinform').on('submit', function (event) {
        event.preventDefault();
        event.stopPropagation();
        email = $('#login-username').val();
        password = $('#login-password').val();

var ladda= Ladda.bind('button[type=submit]',{ timeout: 20000 });

        if (email === "") {
            $('#login-username').notify("Username Empty", "error");
            $('#login-username').focus();
            Ladda.stopAll();
        } else if (password === "") {
            $('#login-password').notify("Password Empty", "error");
            $('#login-password').focus();
            Ladda.stopAll();
        } else if ((email !== "") && (password !== "")) {

            $.post("Php/server.php",
                    {email: email, password: password, action: 'sign-in'}, function (response) {
                if (response !== "true") {
                    $('#login-username').notify("Incorrect Username ", "error");
                    $('#login-username').focus();
                    $('#login-password').notify("Incorrect password", "error");
                    $('#login-password').focus();
                    Ladda.stopAll();
                    console.log("Response after processing : " + response);
                } else if (response === "true") {
                    Ladda.stopAll();
                    window.location.href = "Dashboard.php";
                } else {
                     Ladda.stopAll();
                }
            }

            );
        } else {
            console.log("Invalid");
        }



    });


//    $("button[name='Sign-inButton']").on("click",function() {
//        var formData = {
//            email: $("#email").val(),
//            password: $("#password").val(),
//            action:'sign-in'
//        };
//        console.log("Form data : " + formData);
//        $.ajax({
//            type: "POST",
//            url: "process/server.php",
//            data: formData,
//            dataType: "json",
//            encode: true
//        }).done(function (data) {
//            console.log("data after process : " + data);
////        });

//    });
//    });




});