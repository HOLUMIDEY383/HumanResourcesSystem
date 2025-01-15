var employeeid = '';
var display = '';
var leaveta;
var la = '';
var employeeindex = '';
var fullname = '';
log = console.log;
staffdata="";
$(function () {
    //Retrieving Staff Details from the database
    $.post("Php/server.php", {
        action: "Retrieve-staff"
    }, function (data) {
//        console.log(data);
        data = JSON.parse(data);
            staffdata=data;
        
        $.each(data, function (key, value) {
            $('#staffT tbody tr').each(function (idx) {
                $(this).children("td:eq(0)").html(idx + 1);
            });
            var stafftable = $("#staffT").DataTable({
                dom: 'Bfrtip',
                retrieve: true,
                responsive: true,
                paging: false,
                data: data,
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ],
                columns: [
                    {
                        "data": null
                    },
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            return row.firstname + ' ' + row.lastname;
                        }
                    },
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            if (row.gender === "1") {
                                return "Male";
                            } else {
                                return "Female";
                            }
                        }
                    },
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            if (row.staff_label === "1") {
                                return   '<p>Senior Member</p>';
                            } else if (row.staff_label === "2") {
                                return   '<p>Senior Staff</p>';
                            } else {
                                return  '<p>Junior Staff</p>';
                            }
                        }
                    },
                    {data: 'contact'},
                    {data: 'email'},
                    {
                        data: "data",
                        render: function (data, type, row) {
                            return '<a href="#" class=" text-muted priviewemployee" data-toggle="modal" data-target=".bd-example-modal-md" title="preview" id="' + row.employeeid + '"><i class="fa fa-eye" mr-3 text-gray"></i></a>';
                        }
                    }
                ]
            });
        });
        //Retriving user full details.
        $(".priviewemployee").on("click", function () {
            employeeid = $(this).attr('id');
            $.post("Php/server.php", {
                action: "Retrieve-selected-staff",
                employeeid: employeeid
            }, function (data) {
                console.log(data);
                data = JSON.parse(data);
                $.each(data, function (key, value) {
                    var abbreviation = '';
                    if (value.gender === "1") {
                        $("#empgender").val("Male");
                        abbreviation = "MR";
                    } else {
                        $("#empgender").val("Female");
                        if (value.marital_status === "1") {
                            $("#empmaritalstatus").text("Single");
                            abbreviation = "MISS";
                        } else {
                            $("#empmaritalstatus").text("Married");
                            abbreviation = "MRS";
                        }
                    }
                    $("#emppro").text(abbreviation + ' ' + value.firstname + " " + value.lastname + " Personal Record");
                    $("#empimage").attr('src', value.photo);
                    $("#empusername").text(value.username);
                    $("#empemail").text(value.email);
                    $("#empcontact").text(value.contact);
                    $("#empsurname").val(value.firstname);
                    $("#emplastname").val(value.lastname);
                    $("#empdob").val(value.dob);
                    $("#emphometown").val(value.Hometown);
                    $("#empaddress").val(value.address);
                    $("#empplaceofbirth").val(value.place_of_birth);
                    $("#empcv").text(value.curriculumvitae);
                    $("#empcv").attr("href", value.curriculumvitae);
                    $("#empeducationlevel").text(value.educationlevel);
                    $("#empeducationlevel").attr("href", value.educationlevel);
                    $("#empnextofkinname").val(value.kinName);
                    $("#empnextofkinaddress").text(value.kinAddress);
                    $("#empnextofkincontact").val(value.kinContact);
                    $("#empcontratstart").val(value.contractStart);
                    $("#empcontratend").val(value.contractEnd);
                });
            });
        });
    });

    
});
function checkvalue(selector, message) {
    selector.on("change", function () {
        var atribute = $(this).attr('name');
        var newvalue = $(this).val();
        if (selector.val() === '') {
            selector.notify(message, "Error");
//        $("#editemp").addClass("disabled");
            return false;
        } else {
            var data = new FormData();
            data.append('action', "Update-selected-staff");
            data.append('newdata', newvalue);
            data.append('atribute', atribute);
            data.append('employeeid', employeeid);
//            data = $(this).serialize() + "&" + $.param(data);
//            console.log(typeof (data));
            $.ajax({
                url: 'Php/server.php',
                type: 'post',
                data: data,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response !== 0) {
                        selector.notify("Edit sucessful", "success");
                    } else {
                        selector.notify("Error", "error");
                    }
                }
            });
        }
    });
}
function check_contract(selector, message) {
    if (!selector.val()) {
        selector.notify(message, "Error");
        $("#submitnewcontract").addClass("disabled");
        return false;
    } else {
        $("#submitnewcontract").removeClass("disabled");
        return selector.val();
    }
}
;
function datecalulation(dateS, dateE) {
    var date1 = new Date(dateE);
    var date2 = new Date(dateS);
    var time_difference = date1.getTime() - date2.getTime();
    //calculate days difference by dividing total milliseconds in a day  
    var days_difference = time_difference / (1000 * 60 * 60 * 24);
    return days_difference;
}
;
//function populatevalue(data, element, valueid, valuename) {
//    $.each(data, function (index, value) {
//        element.append("<option value='" + value[valueid] + "'>" + value[valuename] + "</option>");
//    });
//}
//function validateeditemp(selector, message) {
//    if (selector.val() === undefined) {
//        selector.notify(message, "Error");
//        $("#editemp").addClass("disabled");
//        return false;
//    } else {
//        $("#editemp").removeClass("disabled");
//        return selector.val();
//    }
//
//}
