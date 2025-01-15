var employeeid = '';
var display = '';
var leaveta;
var la = '';
log = console.log;
$(function () {
    var editfname, editlname, editmname, editdob, editcontact, editemail, editplaceofbirth, edithometown, editcontracts, editcontracte, editaddress, editgender, editreligion, editposition, editdepartment;
    //Retrieving Staff Details from the database
    $.post("Php/server.php", {
        action: "Retrieve-staff"
    }, function (data) {
        data = JSON.parse(data);
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
                    {data: 'unit_name'},
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
                    },
                    {
                        data: "data",
                        render: function (data, type, row) {
                            return '<a href="#" class=" text-muted editemployee" data-toggle="modal" data-target=".editmodal" title="Edit" id="' + row.employeeid + '"><i class="fa fa-edit" mr-3 text-gray"></i></a>';
                        }
                    }
                ]
            });
        });

        //Retriving user details to be edited.
        $(".editemployee").on("click", function () {
             employeeid = $(this).attr('id');
            $.post("Php/server.php", {
                action: "Retrieve-selected-staff",
                employeeid: employeeid
            }, function (data) {
                data = JSON.parse(data);
                $.each(data, function (key, value) {
                    $("#empdeteal").text(value.firstname + value.lastname);
                    $("#editempFname").val(value.firstname);
                    $("#editempLname").val(value.lastname);
                    $("#editempMname").val(value.middlename);
                    $("#editempDob").val(value.dob);
                    $("#editempContact").val(value.contact);
                    $("#editempEmail").val(value.email);
                    $("#editempPlaceofbirth").val(value.place_of_birth);
                    $("#editempHometown").val(value.Hometown);
                    $("#editempContractS").val(value.contractStart);
                    $("#editempContractE").val(value.contractEnd);
                    $("#editempAddress").val(value.address);
                    $("#editempGen").val(value.gender);
                    $("#editempReli").val(value.religion);
                    $("#editempPosition").val(value.staff_label);
                    $("#editempDepartment").val(value.unit_id);
                    $("#editempContractD").val(value.contractDays);
                });
            });
        });

        checkvalue($("#editempFname"), "firstname field is empty");
        checkvalue($("#editempLname"), 'lastname field is empty');
        checkvalue($("#editempMname"), 'middlename field is empty');
        checkvalue($("#editempDob"), 'Dob field is empty');
        checkvalue($("#editempContact"), 'Contact field is empty');
        checkvalue($("#editempEmail"), 'Email field is empty');
        checkvalue($("#editempPlaceofbirth"), 'Placeofbirth field is empty');
        checkvalue($("#editempHometown"), 'Hometown field is empty');
        checkvalue($("#editempContractS"), 'Contract starting date is empty');
        checkvalue($("#editempContractE"), 'Contract ending date is empty');
        checkvalue($("#editempAddress"), 'Address field is empty');
        checkvalue($("#editempGen"), 'Gender field is empty');
        checkvalue($("#editempReli"), 'Religion field is empty');
        checkvalue($("#editempPosition"), 'Positon field is empty');
        checkvalue($("#editempDepartment"), 'Department field is empty');

//            console.log(checkvalue($("#editempFname")));
//        $("#editempFname").on({
//            change: function () {
//                console.log($(this).val());
//
//            },
//            input: function () {
//                console.log($(this).val());
//            },
//            click: function () {
//                console.log($(this).val());
//
//            }
//        });
        $("#editemp").on("click", function () {
//            editfname = validateeditemp($("#editempFname"), "firstname field is empty");
//            editlname = validateeditemp($("#editempLname"), 'lastname field is empty');
//            editmname = validateeditemp($("#editempMname"), 'middlename field is empty');
//            editdob = validateeditemp($("#editempDob"), 'Dob field is empty');
//            editcontact = validateeditemp($("#editempContact"), 'Contact field is empty');
//            editemail = validateeditemp($("#editempEmail"), 'Email field is empty');
//            editplaceofbirth = validateeditemp($("#editempPlaceofbirth"), 'Placeofbirth field is empty');
//            edithometown = validateeditemp($("#editempHometown"), 'Hometown field is empty');
//            editcontracts = validateeditemp($("#editempContractS"), 'Contract starting date is empty');
//            editcontracte = validateeditemp($("#editempContractE"), 'Contract ending date is empty');
//            editaddress = validateeditemp($("#editempAddress"), 'Address field is empty');
//            editgender = validateeditemp($("#editempGen"), 'Gender field is empty');
//            editreligion = validateeditemp($("#editempReli"), 'Religion field is empty');
//            editposition = validateeditemp($("#editempPosition"), 'Positon field is empty');
//            editdepartment = validateeditemp($("#editempDepartment"), 'Department field is empty');
//            console.log(editfname);
//             editlname = checkvalue($("#editempLname"), 'lastname field is empty');
//            console.log(editlname);

//            console.log(editmname);
        });
        $(".priviewemployee").on("click", function () {
            employeeid = $(this).attr('id');
            $.post("Php/server.php", {
                action: "Retrieve-selected-staff",
                employeeid: employeeid
            }, function (data) {
                data = JSON.parse(data);
                $.each(data, function (key, value) {
                    $("#emppro").text(value.firstname + " " + value.lastname + " Personal Record");
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
                    if (value.marital_status === "1") {
                        $("#empmaritalstatus").text("Single");
                    } else {
                        $("#empmaritalstatus").text("Married");
                    }
                    if (value.gender === "1") {
                        $("#empgender").val("Male");
                    } else {
                        $("#empgender").val("Female");
                    }
                });
            });
        });
    });

    $.post("Php/server.php", {
        action: "retrive-contract"
    }, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            $('#staffcontract tbody tr').each(function (idx) {
                $(this).children("td:eq(0)").html(idx + 1);
            });
            $("#staffcontract").DataTable({
                dom: 'Bfrtip',
                retrieve: true,
                paging: false,
                "scrollY": "200px",
                "scrollCollapse": true,
                responsive: true,
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
                    {data: "contractS"},
                    {className: "validatecon",
                        "id": value.id,
                        data: 'data',
                        render: function (data, type, row) {
                            if (Date.now() > Date.parse(row.contractend)) {
                                $.post("Php/server.php", {
                                    action: "validate-contract",
                                    id: row.id
                                }, function (data) {
                                });
                            } else {

                            }
                            return row.contractE;
                        }

                    },
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            if (row.contractstatus === "1") {
                                return  "<div class='badge text-light bg-green'>Active</div>";
                            } else {
                                return "<div class='badge text-light bg-red'>Expired</div>";
                            }
                        }
                    },
                    {
                        data: "data",
                        render: function (data, type, row) {
                            return '<a href="#" class=" text-muted editemployee" data-toggle="modal" data-target=".editmodal" title="Edit" id="' + row.employeeid + '"><i class="fa fa-edit" mr-3 text-gray"></i></a>';
                        }
                    }
                ]
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


//            var formdata = new FormData();
//            formdata.append(newvalue,atribute);
//            formdata.append(employeeid,employeeid);
//            var formdata={selector:newvalue};
//            formdata.append('action',"Update-selected-staff");
            var data = new FormData();
            data.append('action', "Update-selected-staff");
            data.append('newdata',newvalue);
            data.append('atribute',atribute);
            data.append('employeeid',employeeid);
//            data = $(this).serialize() + "&" + $.param(data);
            console.log(typeof (data));
            $.ajax({
                url: 'Php/server.php',
                type: 'post',
                data: data,
                contentType: false,
                processData: false,
                success: function (response) {
                  if (response != 0) {
                       selector.notify("Edit sucessful", "success");
//                       stafftable.ajax.reload();
                    } else {
                        selector.notify("Error", "error");
                       
                    }


                }
            });
//            $.post("Php/server.php", {
//                action: "Update-selected-staff",
//                employeeid: employeeid,
//                newdata: newvalue,
//                atribute: atribute
//            }, function (data) {
//                console.log(data);
//                if (data === "true") {
//                    selector.notify("Edit sucessful", "success");
//                } else {
//                    selector.notify("Error", "error");
//                }
//            });
        }
    });

}
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
