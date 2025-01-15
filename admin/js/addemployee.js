var errors = 0;
$(function () {
    var rank = '';
//    var empfirstname='';
//     var empfirstname, emplastname,empmiddlename,empdob,empgender,empreligion,empmarital,empcontact,empemail,empplaceofbirth,emphometown,
//     empaddress, staffcategory, stafffaculty, staffdepartment,staffposition ,staffschedule='';

    validateName($("#empFname"), "Firstname data is not valid");
    validateName($("#empLname"), "Lasttname data is not valid");
    validateName($("#empMname"), "Middlename data is not valid");
    validateAge($("#empDob"), "Enter Date of Birth");
    validateOptionbox($("#empGender"), "Select Gender");
    validateOptionbox($("#empreligion"), "Select Religion");
    validateOptionbox($("#empmarital"), "Select Marital Status");
    validateContact($("#empContact"));
    ValidateEmail($("#empEmail"));
    checkAddress($("#empPlaceofbirth"), "Input Place of birth data");
    checkAddress($("#empHometown"), "Input Home town data");
    checkAddress($("#empaddress"), "Input Address data");
//    var staffcategory = $("#empcategorie").val();
    validateOptionbox($("#empcategorie"), "Select Staff categorie");
    validateOptionbox($("#empFaculty"), "Select Staff Faculty");
    validateOptionbox($("#empDepartment"), "Select Staff Department");
    validateOptionbox($("#addaccademicPosition"), "Select Staff Position");
    validateOptionbox($("#addempSchedule"), "Select Staff Schedule");
    validateOptionbox($("#seniormember"), "Select Staff Rank");
    validateOptionbox($("#seniorstaff"), "Select Staff Rank");
    validateOptionbox($("#addempPosition"), "Select Staff Rank");
    validateOptionbox($("#empUnit"), "Select Staff Unit");



    staffcategorie($("#empcategorie"), "Select Staff categorie");
    $("#addnewemp").on("click", function () {
        if ($("#addaccademicPosition").val() === "1") {
            rank = $("#seniormember").val();
        } else if ($("#addaccademicPosition").val() === "2") {
            rank = $("#seniorstaff").val();
        } else {
        }

//        posting for academic staff
        if ($("#empcategorie").val() === "1") {
//check if the personal infor are okay.
            if ($("#empFname").val() === '' || $("#empLname").val() === '' || $("#empMname").val() === '' || $("#empDob").val() === '' || $("#empEmail").val() === '' || $("#empContact").val() === '' || $("#addaccademicPosition").val() === ''
                    || rank === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Fill All Input Field',
                    showConfirmButton: true
                });
            } else {
                $.post("Php/server.php", {
                    action: "Addacademicstaff",
                    empfirstname: $("#empFname").val(),
                    emplastname: $("#empLname").val(),
                    empmiddlename: $("#empMname").val(),
                    empdob: $("#empDob").val(),
                    empgender: $("#empGender").val(),
                    empreligion: $("#empreligion").val(),
                    empmarital: $("#empmarital").val(),
                    empcontact: $("#empContact").val(),
                    empemail: $("#empEmail").val(),
                    empplaceofbirth: $("#empPlaceofbirth").val(),
                    emphometown: $("#empHometown").val(),
                    empaddress: $("#empaddress").val(),
                    staffcategorie: $("#empcategorie").val(),
                    faculty: $("#empFaculty").val(),
                    facultydepartment: $("#empDepartment").val(),
                    staffposition: $("#addaccademicPosition").val(),
                    staffrank: rank,
                    staffschedule: $("#addempSchedule").val()
                }, function (data) {
                    if (data === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Employee Added Sucessfully',
                            text: 'Success',
                            showConfirmButton: false
                        });
                        setInterval('location.reload(true)', 1000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Unsucessfully',
                            text: 'Error Adding Employee',
                            showConfirmButton: true
                        });
                    }
//
                });
            }

        }//posting for non academic staff
        else if ($("#empcategorie").val() === "2") {
            //Posting Department member to the php
            if ($("#depaunit").val() === "1") {
                if ($("#empFname").val() === '' || $("#empLname").val() === '' || $("#empMname").val() === '' || $("#empDob").val() === '' || $("#empEmail").val() === '' || $("#empContact").val() === '' || $("#addempPosition").val() === ''
                        ) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Fill All Input Field',
                        showConfirmButton: true
                    });
                } else {
                    $.post("Php/server.php", {
                        action: "AddnonacademicDepartmentstaff",
                        empfirstname: $("#empFname").val(),
                        emplastname: $("#empLname").val(),
                        empmiddlename: $("#empMname").val(),
                        empdob: $("#empDob").val(),
                        empgender: $("#empGender").val(),
                        empreligion: $("#empreligion").val(),
                        empmarital: $("#empmarital").val(),
                        empcontact: $("#empContact").val(),
                        empemail: $("#empEmail").val(),
                        empplaceofbirth: $("#empPlaceofbirth").val(),
                        emphometown: $("#empHometown").val(),
                        empaddress: $("#empaddress").val(),
                        staffcategorie: $("#empcategorie").val(),
                        department: $("#empDepartment").val(),
                        addempPosition: $("#addempPosition").val(),
                        staffschedule: $("#addempSchedule").val()
                    }, function (data) {
                        console.log(data);
                        if (data === "true") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Employee Added Sucessfully',
                                text: 'Success',
                                showConfirmButton: false
                            });
                            setInterval('location.reload(true)', 1000);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Unsucessfully',
                                text: 'Error Adding Employee',
                                showConfirmButton: true
                            });
                        }
//
                    });
                }
                //Posting unit member to the php
            } else if ($("#depaunit").val() === "2") {
                if ($("#empFname").val() === '' || $("#empLname").val() === '' || $("#empMname").val() === '' || $("#empDob").val() === '' || $("#empEmail").val() === '' || $("#empContact").val() === ''
                        ) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Fill All Input Field',
                        showConfirmButton: true
                    });
                } else {
                    $.post("Php/server.php", {
                        action: "AddnonacademicUnitstaff",
                        empfirstname: $("#empFname").val(),
                        emplastname: $("#empLname").val(),
                        empmiddlename: $("#empMname").val(),
                        empdob: $("#empDob").val(),
                        empgender: $("#empGender").val(),
                        empreligion: $("#empreligion").val(),
                        empmarital: $("#empmarital").val(),
                        empcontact: $("#empContact").val(),
                        empemail: $("#empEmail").val(),
                        empplaceofbirth: $("#empPlaceofbirth").val(),
                        emphometown: $("#empHometown").val(),
                        empaddress: $("#empaddress").val(),
                        staffcategorie: $("#empcategorie").val(),
                        unit: $("#empUnit").val(),
                        addempPosition: $("#addempPosition").val(),
                        staffschedule: $("#addempSchedule").val()
                    }, function (data) {
                        console.log(data);
                        if (data === "true") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Employee Added Sucessfully',
                                text: 'Success',
                                showConfirmButton: false
                            });
                            setInterval('location.reload(true)', 1000);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Unsucessfully',
                                text: 'Error Adding Employee',
                                showConfirmButton: true
                            });
                        }
//
                    });
                }
                //no posting is done for the nonaccademic staff
            } else {
            }



        }//posting for both academic and non academic staff.
        else if ($("#empcategorie").val() === "3") {
            if ($("#empFname").val() === '' || $("#empLname").val() === '' || $("#empMname").val() === '' || $("#empDob").val() === '' || $("#empEmail").val() === '' || $("#empContact").val() === '' || $("#addaccademicPosition").val() === ''
                    || rank === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Fill All Input Field',
                    showConfirmButton: true
                });
            } else {
                $.post("Php/server.php", {
                    action: "Addbothstaff",
                    empfirstname: $("#empFname").val(),
                    emplastname: $("#empLname").val(),
                    empmiddlename: $("#empMname").val(),
                    empdob: $("#empDob").val(),
                    empgender: $("#empGender").val(),
                    empreligion: $("#empreligion").val(),
                    empmarital: $("#empmarital").val(),
                    empcontact: $("#empContact").val(),
                    empemail: $("#empEmail").val(),
                    empplaceofbirth: $("#empPlaceofbirth").val(),
                    emphometown: $("#empHometown").val(),
                    empaddress: $("#empaddress").val(),
                    staffcategorie: $("#empcategorie").val(),
                    faculty: $("#empFaculty").val(),
                    facultydepartment: $("#empDepartment").val(),
                    unit: $("#empUnit").val(),
                    staffposition: $("#addaccademicPosition").val(),
                    staffrank: rank,
                    staffschedule: $("#addempSchedule").val()
                }, function (data) {
                    if (data === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Employee Added Sucessfully',
                            text: 'Success',
                            showConfirmButton: false
                        });
                        setInterval('location.reload(true)', 1000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Unsucessfully',
                            text: 'Error Adding Employee',
                            showConfirmButton: true
                        });
                    }
//
                });
            }


        }//Do noting on post anything 
        else {

        }

    });
//    var empfirstname = $("#empFname").val();
//    var emplastname = $("#empLname").val();
//    var empmiddlename = $("#empMname").val();
//    var empdob = $("#empDob").val();
//    var empgender = $("#empGender").val();
//    var empreligion = $("#empreligion").val();
//    var empmarital = $("#empmarital").val();
//    var empcontact = $("#empContact").val();
//    var empemail = $("#empEmail").val();
//    var empplaceofbirth = $("#empPlaceofbirth").val();
//    var emphometown = $("#empHometown").val();
//    var empaddress = $("#empaddress").val();







});
function staffcategorie(selector, message) {
    selector.on("change", function () {
        selector.val();
        //accademic staff
        if (selector.val() === "1") {
            $("#faculty").removeClass('hide');
            $("#faculty").addClass('show');
            $("#deparunit").removeClass('show');
            $("#deparunit").addClass('hide');
            $("#department").removeClass('show');
            $("#department").addClass('hide');
            $("#empnonaccposition").removeClass('show');
            $("#empnonaccposition").addClass('hide');
            $("#empFaculty").on("change", function () {
                var facultydepartment = $("#empFaculty").val();
                //fetching the department under the faculty.
                $.post("Php/server.php", {
                    action: "Retrieve-faculty-department",
                    department: facultydepartment
                }, function (data) {
                    data = JSON.parse(data);
                    $("#empDepartment").empty().append("<option value=''>Select the Faculty Department</option>");
                    populatevalue(data, $("#empDepartment"), 'Did', 'Dname');
                    $("#department").removeClass('hide');
                    $("#department").addClass('show');
                });

                $("#empaccposition").removeClass('hide');
                $("#empaccposition").addClass('show');
                //checking employees position.
                $("#addaccademicPosition").on("change", function () {
                    if ($("#addaccademicPosition").val() === "1") {

                        $("#seniormemberRank").removeClass('hide');
                        $("#seniormemberRank").addClass('show');
                        $("#seniorstaffRank").removeClass('show');
                        $("#seniorstaffRank").addClass('hide');
                        $("#empschedule").removeClass('hide');
                        $("#empschedule").addClass('show');
//                        $("#submitButton").append("<button type='button' class='btn btn-md btn-info' id='registeremp'>Register</button>");

                    } else if ($("#addaccademicPosition").val() === "2") {
                        $("#seniorstaffRank").removeClass('hide');
                        $("#seniorstaffRank").addClass('show');
                        $("#seniormemberRank").removeClass('show');
                        $("#seniormemberRank").addClass('hide');
                        $("#empschedule").removeClass('hide');
                        $("#empschedule").addClass('show');
//                        $("#submitButton").append("<button type='button' class='btn btn-md btn-info' id='registeremp'>Register</button>");

                    } else {

                    }
                });

            });





//              non accademin staff
        } else if (selector.val() === "2") {
            $("#faculty").removeClass('show');
            $("#faculty").addClass('hide');
            $("#deparunit").removeClass('hide');
            $("#deparunit").addClass('show');
            $("#depaunit").on("change", function () {
                if ($("#depaunit").val() === "1") {
                    $.post("Php/server.php", {
                        action: "Retrieve-nonAccDepartment"
                    }, function (data) {
                        data = JSON.parse(data);
                        console.log(data);
                        $("#empDepartment").empty().append("<option value=''>Select the Department</option>");
                        populatevalue(data, $("#empDepartment"), 'Did', 'Dname');
                    });
                    $("#department").removeClass('hide');
                    $("#department").addClass('show');
                    $("#unit").removeClass('show');
                    $("#unit").addClass('hide');
                    $("#empschedule").removeClass('hide');
                    $("#empschedule").addClass('show');
                    $("#faculty").removeClass('show');
                    $("#faculty").addClass('hide');

                } else if ($("#depaunit").val() === "2") {
                    $("#department").removeClass('show');
                    $("#department").addClass('hide');
                    $.post("Php/server.php", {
                        action: "Retrieve-unit"
                    }, function (data) {
                        data = JSON.parse(data);
                        $("#empUnit").empty().append("<option value=''>Select the Unit</option>");
                        populatevalue(data, $("#empUnit"), 'unit_id', 'unit_name');
                    });
                    $("#unit").removeClass('hide');
                    $("#unit").addClass('show');
                    $("#empschedule").removeClass('hide');
                    $("#empschedule").addClass('show');
                    $("#faculty").removeClass('show');
                    $("#faculty").addClass('hide');
                } else {
                }
                $("#faculty").removeClass('show');
                $("#faculty").addClass('hide');
                $("#empschedule").removeClass('hide');
                $("#empschedule").addClass('show');
                $("#empnonaccposition").removeClass('hide');
                $("#empnonaccposition").addClass('show');
            });


//       bothaccademin & non accademin staff
        } else if (selector.val() === "3") {
            $("#faculty").removeClass('hide');
            $("#faculty").addClass('show');
            $("#department").removeClass('show');
            $("#department").addClass('hide');
            $("#empFaculty").on("change", function () {
                var facultydepartment = $("#empFaculty").val();
                //fetching the department under the faculty.
                $.post("Php/server.php", {
                    action: "Retrieve-faculty-department",
                    department: facultydepartment
                }, function (data) {
                    data = JSON.parse(data);
                    $("#empDepartment").empty().append("<option value=''>Select the Faculty Department</option>");
                    populatevalue(data, $("#empDepartment"), 'Did', 'Dname');
                    $("#department").removeClass('hide');
                    $("#department").addClass('show');
                });
                $.post("Php/server.php", {
                    action: "Retrieve-unit"
                }, function (data) {
                    data = JSON.parse(data);
                    $("#empUnit").empty().append("<option value=''>Select the Unit</option>");
                    populatevalue(data, $("#empUnit"), 'unit_id', 'unit_name');
                });
                $("#unit").removeClass('hide');
                $("#unit").addClass('show');
                $("#empaccposition").removeClass('hide');
                $("#empaccposition").addClass('show');

                //checking employees position.
                $("#addaccademicPosition").on("change", function () {
                    if ($("#addaccademicPosition").val() === "1") {
                        $("#seniormemberRank").removeClass('hide');
                        $("#seniormemberRank").addClass('show');
                        $("#seniorstaffRank").removeClass('show');
                        $("#seniorstaffRank").addClass('hide');
                        $("#empschedule").removeClass('hide');
                        $("#empschedule").addClass('show');

                    } else if ($("#addaccademicPosition").val() === "2") {
                        $("#seniorstaffRank").removeClass('hide');
                        $("#seniorstaffRank").addClass('show');
                        $("#seniormemberRank").removeClass('show');
                        $("#seniormemberRank").addClass('hide');
                        $("#empschedule").removeClass('hide');
                        $("#empschedule").addClass('show');

                    } else {

                    }
                });

            });
        } else {

        }
    });
}

function checkAddress(selector, message) {
    selector.on("focusout", function () {
        if (selector.val() === '') {
            selector.notify(message, "error");
            selector.addClass('focusedB');
            selector.focus();
        } else {
            if (selector.val().length >= 5) {
                selector.notify("Valid", "success");
                selector.removeClass('focusedB');
                selector.addClass('focusedS');
                $("#registeremp").removeClass("disabled");
                return selector.val();
            } else {
                $("#registeremp").removeClass("disabled");
                selector.notify("Invalid", "error");
                selector.addClass('focusedB');
                selector.focus();
            }
        }
    });
}
function validateName(selector, message) {
    selector.on("focusout", function () {
        if (selector.val() !== '') {
            if (selector.val().length >= 3) {
                var regex = /^[a-zA-Z ]{2,30}$/;
                if (regex.test(selector.val())) {
                    selector.notify("Valid", "success");
                    selector.removeClass('focusedB');
                    selector.addClass('focusedS');
                    return selector.val();
                } else {
                    selector.addClass('focusedB');
                    selector.notify(message, "error");
                    selector.focus();
                    $("#registeremp").addClass("disabled");
                }
            } else {
                selector.addClass('focusedB');
                selector.notify("Data as to be more than 3 charaters ", "error");
            }
        } else {
            selector.notify("Input data", "error");
            selector.focus();
            selector.addClass('focusedB');
            $("#registeremp").addClass("disabled");
        }
    });
}



function validateContact(selector) {
    selector.on("focusout", function () {
        if (selector.val() !== '') {
            if (selector.val().length === 10) {
                var filter = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
                if (filter.test(selector.val())) {
                    $("#registeremp").removeClass("disabled");
                    selector.notify("Valid", "success");
                    selector.removeClass('focusedB');
                    selector.addClass('focusedS');
                    return selector.val();
                } else {
                    selector.focus();
                    selector.addClass('focusedB');
                    selector.notify("Invalid Contact", "error");
                    $("#registeremp").addClass("disabled");
                }
            } else {
                $("#registeremp").addClass("disabled");
                selector.focus();
                selector.addClass('focusedB');
            }
        } else {
            $("#registeremp").addClass("disabled");
            selector.focus();
            selector.addClass('focusedB');
        }
    });
}

function ValidateEmail(selector) {
    selector.on("focusout", function () {
        var mail=selector.val();
        if (selector.val() !== '') {
            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (selector.val().match(validRegex)) {
                //checking if the email already exit in the system.
                $.post("Php/server.php", {
                    action: "checking-mail",
                    Email: mail
                }, function (data) {
                    if (data === "true") {
                        $("#registeremp").removeClass("disabled");
                        selector.notify("Valid", "success");
                        selector.removeClass('focusedB');
                        selector.addClass('focusedS');
                    } else {
                        selector.notify(data, "error");
                        selector.addClass('focusedB');
                        $("#registeremp").addClass("disabled");
                    }
                });
            } else {
                selector.focus();
                selector.addClass('focusedB');
                $("#registeremp").addClass("disabled");
                selector.notify("Invalid Email", "error");

            }
        } else {
            selector.focus();
            selector.addClass('focusedB');
            selector.notify("Input Email Address", "error");
        }
    });

}
//validateing option box .
function validateOptionbox(selector, message) {
    selector.on("focusout", function () {
        if (selector.val() === '') {
            selector.focus();
            selector.addClass('focusedB');
            selector.notify(message, "error");
            $("#registeremp").addClass("disabled");

        } else {
            selector.removeClass('focusedB');
            selector.addClass('focusedS');
            selector.notify("Valid", "success");
            $("#registeremp").removeClass("disabled");
            return selector.val();

        }
    });

}

function populatevalue(data, element, valueid, valuename) {
    $.each(data, function (key, value) {
        element.append("<option class='' value='" + value[valueid] + "'>" + value[valuename] + "</option>");
    });
}
function loadIframe(iframeName, url) {
    var $iframe = iframeName;
    if ($iframe.length) {
        $iframe.attr('src', url); // here you can change src
        return false;
    }
    return true;
}
function getUrlParameter(sParam) {
    var sPageURL = windows.location.search.substring(1),
            sURLVariables = sPageURL.split('?'),
            sParameterName,
            i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return typeof sParameterName[1] === undefined ? true : decodeURLComponent(sParameterName[1]);
        }
    }
    return false;
}
function datecal(dateS, dateE) {
    var date1 = new Date(dateE);
    var date2 = new Date(dateS);
    var time_difference = date1.getTime() - date2.getTime();
    //calculate days difference by dividing total milliseconds in a day  
    var days_difference = time_difference / (1000 * 60 * 60 * 24);
    return days_difference;
}
function validateAge(selector, message) {
    selector.on("focusout", function () {
        var input = selector.val();
        var dob = new Date(input);
        if (input !== '') {
//calculate month difference from current date in time  
            var month_diff = Date.now() - dob.getTime();
            //convert the calculated difference in date format  
            var age_dt = new Date(month_diff);
            //extract year from date      
            var year = age_dt.getUTCFullYear();
            //now calculate the age of the user  
            var age = Math.abs(year - 1970);
            //display the calculated age  
            if (age >= 18) {
                $("#registeremp").removeClass("disabled");
                selector.removeClass('focusedB');
                selector.addClass('focusedS');
                selector.notify("Valid", "success");
            } else {
                selector.focus();
                selector.addClass('focusedB');
                $(selector).notify("UnderAge", "error");
                $("#registeremp").addClass("disabled");
            }
        } else {
            selector.focus();
            selector.addClass('focusedB');
            $(selector).notify(message, "error");
            $("#registeremp").addClass("disabled");

        }
    });
}