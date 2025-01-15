log = console.log;
var adminid = '';
$(function () {

    $("#file").on("change", function () {
        var formdata = new FormData();
        var files = $('#file')[0].files;
        // Check file selected or not
        if (files.length > 0) {
            formdata.append('file', files[0]);
            formdata.append('action', "update-photo");
            $.ajax({
                url: 'Php/server.php',
                type: 'post',
                data: formdata,
                contentType: false,
                processData: false,
                success: function (response) {
//                    console.log(response);
                    if (response != 0) {
                        $('#file').notify("upload sucessful", "success");
                        setInterval('location.reload(true)', 100);
                        location.reload(true);
                    } else {
                        $('#file').notify("upload Unsucessful", "Error");
                    }
                }
            });
        } else {
            $('#file').notify("Please Select an Image", "info");
        }
    });




//    $('#adminimg').submit(function (e) {
//        e.preventDefault();
//        console.log("faruq");
////        var atribute = $(this).attr('name');
////        var fileName = e.target.files[0].name;
//        alert('The file  has been selected.');
//        $.post("Php/server.php", {
//            action: "update-photo",
//            data: new FormData(this),
//            cache: false,
//            processData: false,
//            contentType: false
//        }, function (data) {
//            console.log(data);
//
//        });
//
//
//
//    });

    $.post("Php/server.php", {
        action: "Retrieve-userinfo"
    }, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            adminid = value.id;
            $('#adminimg').attr('src', value.base64photo).removeClass('hide').addClass('d-block ui-w-100');

            $('#Adminusername').val(value.username);
            $('#Adminfname').val(value.firstname);
            $('#Adminlname').val(value.lastname);
            $('.Adminemail').val(value.email);
        });
        checkAvalue($('#Adminusername'), 'message');
        checkAvalue($('#Adminfname'), 'message');
        checkAvalue($('#Adminlname'), 'message');
        checkAvalue($('.Adminemail'), 'message');

        $('#changepassword').on("click", function () {
            var currentpassword = $('#currentpass').val();
//         console.log(currentpassword);
            var newpassword = $('#newpass').val();
            var newpassword2 = $('#newpass2').val();
            if ($('#currentpass').val() !== '') {
                if (newpassword === newpassword2) {
                    $.post("Php/server.php", {
                        action: "changepassword",
                        adminid: adminid,
                        currentpassword: currentpassword,
                        newpassword: newpassword,
                        newpassword2: newpassword2
                    }, function (data) {
                        if (data === "true") {
                            $('#currentpass').notify("Edit sucessful", "success");
                            $('#newpass2').notify("Edit sucessful", "success");
                            $('#newpass').notify("Edit sucessful", "success");

                        } else {
                            $('#currentpass').notify("Error", "error");
                            $('#newpass2').notify("Error", "error");
                            $('#newpass').notify("Error", "error");
                        }

                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'The new password does not march'
                    });
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'The Current password is empty'
                });
            }


        });
    });
    //changing of th side bar color
    $("#Asidebarcolor").on("change", function () {
        var sidecolor = $(this).val();
        var atribute = $(this).attr('name');
        $.post("Php/server.php", {
            action: "Change-sideC",
            sidecolor: sidecolor,
            atribute: atribute
        }, function (data) {
          
            if (data === "true") {
                $("#Asidebarcolor").notify("Color changed sucessfully", "success");
                setInterval('location.reload(true)', 1000);
            }
        });
    });
});
function checkAvalue(selector, message) {
    selector.on("change", function () {
        var atribute = $(this).attr('name');
        var newvalue = $(this).val();
        if (selector.val() === '') {
            selector.notify(message, "Error");
            return false;
        } else {
            $.post("Php/server.php", {
                action: "Update-admininfo",
                adminid: adminid,
                newdata: newvalue,
                atribute: atribute
            }, function (data) {
                if (data === "true") {
                    selector.notify("Edit sucessful", "success");
//                    $('#staffT').ajax.reload();
                } else {
                    selector.notify("Error", "error");
                }
            });
        }
    });
}


//https://www.bootdey.com/snippets/view/User-Profile-with-tabs