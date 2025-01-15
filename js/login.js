$(function () {

    $('#signinform').on('submit', function (event) {

        event.preventDefault();
        event.stopPropagation();

        email = $('#login-email').val();
        password = $('#login-password').val();


        var ladda = Ladda.bind('button[type=submit]', {timeout: 20000});

        if (email === "") {
            $('#login-email').notify("Email Empty", "error");
            $('#login-email').focus();
            Ladda.stopAll();
        } else if (password === "") {
            $('#login-password').notify("Password Empty", "error");
            $('#login-password').focus();
            Ladda.stopAll();
        } else if ((email !== "") && (password !== "")) {
            console.log(email);
            console.log(password);
            $.post("Php/server.php",
                    {email: email, password: password, action: 'Usign-in'}, function (response) {
                        console.log(response);
                if (response !== "true") {
                    $('#login-email').notify("Incorrect Username ", "error");
                    $('#login-email').focus();
                    $('#login-password').notify("Incorrect password", "error");
                    $('#login-password').focus();
                    Ladda.stopAll();
                } else if (response === "true") {
                    Ladda.stopAll();
                    $.post("Php/server.php",
                            {action: "retrive-sidebarC"}, function (data) {
                        console.log(data);
                        sidebarrcolor(data);
                    }
                    );
                    window.location.href = "Dashboard";
                } else {
                    Ladda.stopAll();
                }
            }
            );
        } else {
//            console.log("Invalid");
        }
    });
});

function sidebarrcolor(color) {
    if (color === "1") {
        $("#csslink").attr("href", "css/style.blue.css");
    } else if (color === "2") {
        $("#csslink").attr("href", "css/style.green.css");

    } else if (color === "3") {
        $("#csslink").attr("href", "css/style.pink.css");

    } else if (color === "4") {
        $("#csslink").attr("href", "css/style.red.css");

    } else if (color === "5") {
        $("#csslink").attr("href", "css/style.sea.css");
    } else if (color === "6") {
        $("#csslink").attr("href", "css/style.violet.css");
    } else {
        $("#csslink").attr("href", "css/style.default.css");
    }

}