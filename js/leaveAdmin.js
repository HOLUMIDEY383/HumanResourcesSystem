var fullname = '';
var leaveid = '';
var leaveid1 = '';
var display;
var leaveta;
var employeeLS = '';
var employeeLR = '';
var newLeaveEnd = '';
var newLeavedays = '';
var id = '';
var employeeLC = '';
var employeeLE = '';
var employeeLU = '';
var leavetype = '';
log = console.log;
$(function () {
    //Retrieving Leave Details from the database
    $.post("Php/server.php", {
        action: "Retrieve-leave"
    }, function (data) {
//        log(data);
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            leaveta = $("#leaveT").DataTable({
                retrieve: true,
                paging: true,
                data: data,
                columns: [
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            return '<a href="#" class="leavedetails" id="' + row.employeeid + '"  title="preview"><i class="fa fa-plus-circle "text-gray" style="font-size:25px;color:green;" ></i></a>';
                        }
                    },
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            return row.Efirstname + ' ' + row.Elastname;
                        }
                    },
//                    {data: 'unit_name'},
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            if (row.leavetype === "1") {
                                return '<p>Annual Leave</p>';
                            } else if (row.leavetype === "2") {
                                return '<p>Study Leave With Pay</p>';
                            } else if (row.leavetype === "3") {
                                return '<p>Study Leave Without Pay</p>';
                            } else if (row.leavetype === "4") {
                                return '<p>Deferment of Annual Leave</p>';
                            } else if (row.leavetype === "5") {
                                return '<p>Sabbatical Leave</p>';
                            } else if (row.leavetype === "6") {
                                return '<p>Part-Time study leave</p>';
                            } else if (row.leavetype === "7") {
                                return '<p>Leave of absence</p>';
                            } else if (row.leavetype === "8") {
                                return '<p>Sick Leave</p>';
                            } else if (row.leavetype === "9") {
                                return '<p>Maternity Leave </p>';
                            } else {
                                return  '<p>Special</p>';
                            }
                        }
                    },
                    {data: 'starting_date'},
                    {data: 'ending_date'},
                    {data: 'ndays'},

                    {
                        data: 'data',
                        render: function (data, type, row) {
                            return '<pre>' + '<a href="#" class=" text-primary approveleave" id="' + row.id + '"  title="Approve"><i class="fa fa-check-circle mr-3 "text-gray" style="font-size:25px;color:green;" ></i></a>' + '  '
                                    + '<a href="#" class=" text-primary rejectleave" id="' + row.id + '"  title="Decline"><i class="fa fa-close " mr-3 text-gray" style="font-size:25px;color:red;"></i></a>' + '</pre>';
                        }
                    }
                ]
//                 "order": [[1, 'asc']]

            });


        });

        // Add event listener for opening and closing details
        $('.leavedetails').on('click', function () {
            var newid = $(this).attr('id');
            $.post("Php/server.php", {
                action: "retrive-selected-leave",
                id: newid
            }, function (data) {
                if (data !== "false") {
                    data = JSON.parse(data);
                    var newdata = '';
                    $.each(data, function (key, value) {
                        newdata = format(value);
                    });
                    bootbox.alert({
                        message: newdata,
                        callback: function () {
                        }
                    });
                }
            });
        });
//function on approved leave.
        $(".approveleave").on("click", function () {
            leaveid = $(this).attr('id');
            $.post("Php/server.php", {
                action: "approveleave",
                leaveid: leaveid
            }, function (data) {
                if (data === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Approved',
                        text: 'Approved Leave',
                        showConfirmButton: false
                    });
                    setInterval('location.reload(true)', 1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Unable to Approved Leave',
                        showConfirmButton: false
                    });
                    setInterval('location.reload(true)', 1000);
                }
            });
        });
        //function on rejected leave
        $(".rejectleave").on("click", function () {
            leaveid1 = $(this).attr('id');
            $.post("Php/server.php", {
                action: "rejectleave",
                leaveid1: leaveid1
            }, function (data) {
                if (data === "true") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Declined',
                        text: 'Decline Leave successful',
                        showConfirmButton: false
                    });
                    setInterval('location.reload(true)', 1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Unable to Decline Leave',
                        showConfirmButton: false
                    });
                    setInterval('location.reload(true)', 1000);
                }
            });
        });
    });
//retring leave history
    $.post("Php/server.php", {
        action: "Retrieve-leavehistory"
    }, function (data) {
        data = JSON.parse(data);
        var display = '';
        $.each(data, function (key, value) {
            if (value.status === "1") {
                if (Date.now() < Date.parse(value.ending_date)) {
                } else {
                    leaveid2 = $(this).attr('id');
                    $.post("Php/server.php", {
                        action: "Reset-leave",
                        leaveid2: leaveid2
                    }, function (data) {
                    });
                }
            } else {
            }
            $("#leavehistory").DataTable({
                retrieve: true,
                paging: false,
                responsive: true,
                data: data,
                columns: [

                    {
                        data: 'data',
                        render: function (data, type, row) {
                            return row.firstname + ' ' + row.lastname;
                        }
                    },
                    {data: 'leaveemail'},
                    {data: 'leavecontact'},
                    {data: 'unit_name'},
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            if (row.leavetype === "1") {
                                return '<p>Annual Leave</p>';
                            } else if (row.leavetype === "2") {
                                return '<p>Study Leave With Pay</p>';
                            } else if (row.leavetype === "3") {
                                return '<p>Study Leave Without Pay</p>';
                            } else if (row.leavetype === "4") {
                                return '<p>Deferment of Annual Leave</p>';
                            } else if (row.leavetype === "5") {
                                return '<p>Sabbatical Leave</p>';
                            } else if (row.leavetype === "6") {
                                return '<p>Part-Time study leave</p>';
                            } else if (row.leavetype === "7") {
                                return '<p>Leave of absence</p>';
                            } else if (row.leavetype === "8") {
                                return '<p>Sick Leave</p>';
                            } else if (row.leavetype === "9") {
                                return '<p>Maternity Leave </p>';
                            } else {
                                return  '<p>Special</p>';
                            }
                        }
                    },
                    {data: 'starting_date'},
                    {data: 'ending_date'},
                    {data: 'description'},
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            if (row.status === "1") {
                                if (Date.now() < Date.parse(row.ending_date)) {
                                    return  "<div class='badge text-light bg-green'>Approved</div>";
                                } else {
                                    return "<div class='badge text-light bg-red'>Expired</div>";
                                    leaveid2 = $(this).attr('id');
                                }
                            } else {
                                return "<div class='badge text-light bg-red'>Reject</div>";
                            }
                        }
                    }
                ]
            });
        });
    });
    //add new leave.
    $("#employeeidL").on("input focusOut", function () {
        
        id = $(this).val();
        if (id !== "") {
            $("#submitnewleave").removeClass("disabled");
            $.post("Php/server.php", {
                action: "Retrieve-selected-staff",
                employeeid: id
            }, function (data) {
                if (data !== "false") {
                    data = JSON.parse(data);
                    $.each(data, function (key, value) {
                        $("#employeeLname").val(value.firstname + " " + value.lastname);
                        $("#employeeLA").val(value.AnnualLeave);
                        $("#employeeLcontact").val(value.contact);
                        employeeLE = value.email;
                        employeeLU = value.Fid;
                    });
                } else {
                    $("#employeeidL").notify("Invalid employee ID", "Error");
                    $("#employeeLname").val("");
                    $("#employeeLA").val("");
                    $("#employeeLcontact").val("");
                    $("#submitnewleave").addClass("disabled");
                }
            });

        } else {
            $("#employeeLname").val("");
            $("#employeeLA").val("");
            $("#employeeLcontact").val("");
            $("#submitnewleave").addClass("disabled");
        }
    });
    $("#employeeLcontact").on("focusout", function () {
        if (validatePhone($("#employeeLcontact"))) {
            employeeLC = $("#employeeLcontact").val();
            return true;
        } else {
            return false;
        }
    });
    $("#empleavetype").on("focusout", function () {
        leavetype = validateOption($("#empleavetype"), "Select The Type of leave");
    });
    $("#employeeLS").on("focusout", function () {
        employeeLS = check_contract($("#employeeLS"), "Input Leave start");
    });
    $("#leavereason").on("focusout", function () {
        employeeLR = check_contract($("#leavereason"), "Input Leave Purpose/Reason");
    });
    $("#employeeLE").on("focusout", function () {
        newLeaveEnd = check_contract($("#employeeLE"), "Input Leave end");
        var e = $("#employeeLE").val();
        var s = $("#employeeLS").val();
        newLeavedays = datecalulation(s, e);
//        console.log(datecalulation(s, e));
        $("#employeeLD").val(datecalulation(s, e) + "days");
    });
    $("#submitnewleave").on("click", function () {
        if ($("#employeeLS").val() !== "" || $("#employeeLE").val() !== "" || $("#leavereason").val() !== "" || $("#employeeLcontact").val() !== "" || $("#empleavetype").val() !== "") {
            $.post("Php/server.php", {
                action: "Addnew-leave",
                employeeLS: employeeLS,
                employeeLR: employeeLR,
                newLeaveEnd: newLeaveEnd,
                newLeavedays: newLeavedays,
                employeeLC: employeeLC,
                employeeLE: employeeLE,
                employeeLU: employeeLU,
                leavetype: leavetype,
                employeeid: id
            }, function (data) {
                console.log(data);
                if (data === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'You have successfully Requested a leave for',
                        showConfirmButton: false
                    });
                    setInterval('location.reload(true)', 2000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'The new leave request was unsuccessful',
                        showConfirmButton: false
                    });
                    setInterval('location.reload(true)', 2000);
                }
            });

        } else {
            $("#employeeLS").notify("Leave Start field is empty", "Error");
            $("#employeeLE").notify("Leave End field is empty", "Error");
            $("#employeeidL").notify("Enter employee ID ", "Error");
        }
    });
});

function GetFormattedDate(date) {
    var todayTime = date;
    var month = format(todayTime.getMonth() + 1);
    var day = format(todayTime.getDate());
    var year = format(todayTime.getFullYear());
    return month + "/" + day + "/" + year;
}

function format(id) {
    return '<table class="table table-striped display col" style="width: 100%; table-layout: auto;">' +
            '<tr>' +
            '<td>Employee ID::</td>' +
            '<td>' + id.employeeid + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Full name::</td>' +
            '<td>' + id.Efirstname + ' ' + id.Elastname + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Annual-Leave-Days::</td>' +
            '<td>' + id.Eannuanlleave + ' ' + 'Days' + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Remaining-Leave-Days::</td>' +
            '<td>' + id.Eremainingleave + ' ' + 'Days' + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Description/Purpose::</td>' +
            '<td>' + id.description + '</td>' +
            '</tr>' +
            '</table>';
}
function check_contract(selector, message) {
    if (!selector.val()) {
        selector.notify(message, "Error");
        $("#submitnewleave").addClass("disabled");
        return false;
    } else {
        $("#submitnewleave").removeClass("disabled");
        return selector.val();
    }
}
function validatePhone(phoneText) {
    var filter = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
    if (filter.test(phoneText.val())) {
        $("#submitnewleave").removeClass("disabled");
        return phoneText.val();
    } else {
        $(phoneText).notify("Invalid Contact", "Error");
        $("#submitnewleave").addClass("disabled");
        return false;
    }
}
function validateOption(selector, message) {
    if (selector.val() === '') {
        $(selector).notify(message, "Error");
        $("#submitnewleave").addClass("disabled");
        return false;
    } else {
        $("#submitnewleave").removeClass("disabled");
        return selector.val();

    }
}