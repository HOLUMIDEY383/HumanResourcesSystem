$(function () {

    $.post("Php/server.php", {
        action: "Retrive-user-leave"
    }, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            $('#UleaveT tbody tr').each(function (idx) {
                $(this).children("td:eq(0)").html(idx + 1);
            });
            var ULtable = $("#UleaveT").DataTable({
                retrieve: true,
                responsive: true,
                paging: false,
                data: data,

                columns: [
                    {
                        data: null
                    },
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
                    {data: 'description'},
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            if (row.status === "0") {
//                                return "<div class='action-label text-center'><a class='btn btn-light btn-sm btn-rounded-dark text-dark ' href=''><i class='fa fa-dot-circle-o text-dark'> </i> Pending</a></div>";
                                return "<div class='badge text-light bg-dark'>Pending</div>";
                            } else if (row.status === "1") {
                                return  "<div class='badge text-light bg-green'>Approved</div>";
                            } else {
                                return "<div class='badge text-light bg-red'>Reject</div>";
                            }
                        }
                    }, {data: 'approveBY'},
                    {data: 'data',

                        render: function (data, type, row) {
                            return "<div class='dropdown dropdown-action text-right'><a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'></i></a><div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' style='position: absolute; transform: translate3d(-78px, 32px, 0px); top: 0px; left: 0px; will-change: transform;'><a class='dropdown-item' href='#' data-toggle='modal' data-target='#edit_leave'><i class='fa fa-pencil m-r-5'></i> Edit</a><a class='dropdown-item' href='#' data-toggle='modal' data-target='#delete_approve'><i class='fa fa-trash-o m-r-5'></i> Delete</a></div></div>";
                        }
                    }
                ]
            });

        });
    });

    $.post("Php/server.php", {
        action: "Retrive-user-deatils"
    }, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            $("#UannualLe").text(value.AnnualLeave);
            $("#annualleave").text(value.AnnualLeave);
            $("#UremainingL").text(value.remaingLeave);
            $("#remaingleave").text(value.remaingLeave);
            $("#UemployeeidL").val(value.employeeid);
            $("#UemployeeLname").val(value.firstname + ' ' + value.lastname);
            $("#UemployeeLA").val(value.AnnualLeave);
        });
    });
    validatePhone($("#UemployeeLcontact"));
    focusdata($("#Uempleavetype"));
    focusdata($("#UemployeeLS"));
    focusdata($("#UemployeeLE"));

    focusdata($("#Uleavereason"));
    $("#Usubmitnewleave").on("click", function () {
        var e = $("#UemployeeLE").val();
        var s = $("#UemployeeLS").val();
        $("#UemployeeLD").val(datecalulation(s, e));
        var UcontractL = $("#UemployeeLcontact").val();
        var Uleavetype = $("#Uempleavetype").val();
        var Uleavestart = $("#UemployeeLS").val();
        var Uleaveend = $("#UemployeeLE").val();
        var Uleaveday = $("#UemployeeLD").val();
        var Uleavereason = $("#Uleavereason").val();
        if (UcontractL === "") {
            $("#UemployeeLcontact").focus();
        } else if (Uleavetype === "") {
            $("#Uempleavetype").focus();
        } else if (Uleavestart === "") {
            $("#UemployeeLS").focus();
        } else if (Uleaveend === "") {
            $("#UemployeeLE").focus();
        } else if (Uleaveday === "") {
            $("#UemployeeLD").focus();
        } else if (Uleavereason === "") {
            $("#Uleavereason").focus();
        } else {
            console.log("good");
           $.post("Php/server.php", {
        action: "user-leave-request",
        UcontractL:UcontractL,
        Uleavetype:Uleavetype,
        Uleavestart:Uleavestart,
        Uleaveend:Uleaveend,
        Uleaveday:Uleaveday,
        Uleavereason:Uleavereason
    }, function (data) {
       if(data==="true"){
           Swal.fire({
                icon: 'success',
                title: 'Booked',
                text: 'Leave Booked',
                showConfirmButton: false
            });
            setInterval('location.reload(true)', 1000);

       }else{
           Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Leave request was unsuccess',
                showConfirmButton: false
            });
            setInterval('location.reload(true)', 1000);
       }
    });
        }
    });






});
function focusdata(selector) {
    selector.on("focusout", function () {
        if (selector.val() === "") {
            $("#Usubmitnewleave").addClass("disabled");
            selector.focus();
        } else if (selector.val() !== "") {
            $("#Usubmitnewleave").removeClass("disabled");
        }
    });
}
function datecalulation(dateS, dateE) {
    var date1 = new Date(dateE);
    var date2 = new Date(dateS);
    var time_difference = date1.getTime() - date2.getTime();
    //calculate days difference by dividing total milliseconds in a day  
    var days_difference = time_difference / (1000 * 60 * 60 * 24);
    return days_difference;
}
function validatePhone(selector) {
    var filter = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
    selector.on("focusout", function () {
        if (selector.val() === "") {
            $("#Usubmitnewleave").addClass("disabled");
            selector.focus();
        } else if (selector.val() !== "") {
            if (filter.test(selector.val())) {
                $("#Usubmitnewleave").removeClass("disabled");
                
//                return selector.val();
            } else {
                selector.notify("Invalid Contact", "Error");
                 selector.focus();
                $("#Usubmitnewleave").addClass("disabled");
//                return false;
            }
            $("#Usubmitnewleave").removeClass("disabled");
        }
    });
}
