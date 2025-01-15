var employeeid = '';
var display = '';
var leaveta;
var la = '';
var newContractS = '';
var newContractdays = '';
var newContractEnd = '';
var employeeindex = '';
var fullname = '';
log = console.log;
staffdata = "";
$(function () {
    $.post("Php/server.php", {
        action: "Retrieve-faculty"
    }, function (data) {
        data = JSON.parse(data);
        $("#editempFaculty").append("<option value=''>Select the Faculty</option>");
        $("#Dfaculty").append("<option value=''>Select the Faculty</option>");
        $.each(data, function (key, value) {
            $("#editempFaculty").append("<option value=" + value.Fid + ">" + value.Fname + "</option>");
            $("#Dfaculty").append("<option value=" + value.Fid + ">" + value.Fname + "</option>");
        });

    });
    $.post("Php/server.php", {
        action: "Retrieve-unit"
    }, function (data) {
        data = JSON.parse(data);
        $("#editempDepartment").append("<option value=''>Select the Department</option>");
        $.each(data, function (key, value) {
            $("#editempDepartment").append("<option value=" + value.unit_id + ">" + value.unit_name + "</option>");
        });

    });
//    var editfname, editlname, editmname, editdob, editcontact, editemail, editplaceofbirth, edithometown, editcontracts, editcontracte, editaddress, editgender, editreligion, editposition, editdepartment;
    //Retrieving Staff Details from the database
    $.post("Php/server.php", {
        action: "Retrieve-staff"
    }, function (data) {
        data = JSON.parse(data);
        staffdata = data;
        $.each(data, function (key, value) {
//                    console.log(value.employeeStatus);
$("#empStatus").val(value.employeeStatus);
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
                      data:null  
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
//                    {data: 'unit_name'},
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            if (row.staff_categ === "1") {
                                return   '<p>Academic</p>';
                            } else if (row.staff_categ === "2") {
                                return   '<p>Non Academic</p>';
                            } else if (row.staff_categ === "3") {
                                return  '<p>Academic/Non Academic</p>';
                            } else {
                            }
                        }
                    },
                    {data: 'contact'},
                    {data: 'email'},
                  
                    {
                        data: "data",
                        render: function (data, type, row) {
                            if(row.employeeStatus==="1"){
                                return  "<div class='badge text-light bg-green'>Active</div>";
                            }else if(row.employeeStatus==="2"){
                                 return "<div class='badge text-light bg-red'>Inactive</div>";
                            }
                             
                     
//                            return'<select id="empStatus"><option value="1">Active</option><option value="2">Inactive</option></select>';
                        }
                    },
                  
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
                    $("#editempAddress").val(value.address);
                    $("#editempGen").val(value.gender);
                    $("#editempMarital").val(value.marital_status);
                    $("#editempReli").val(value.religion);
                    
                    //checking emp status
                      $("#editempstatus").val(value.employeeStatus);
//                    if(editempstatus){}
//                     if(value.employeeStatus==="1"){
//                                $("#editempstatus").val()
//                            }else if(value.employeeStatus==="2"){
//                                 return "<div class='badge text-light bg-red'>Inactive</div>";
//                            }
                    //display accademeic details to the admin
                    if (value.staff_categ === "1") {
                        $("#editnonemppostionline").removeClass('show');
                        $("#editnonemppostionline").addClass('hide');
                        $("#editunit").removeClass('show');
                        $("#editunit").addClass('hide');

                        $("#editfaculty").removeClass('hide');
                        $("#editfaculty").addClass('show');
                        $("#editempFaculty").val(value.Fid);
                        $("#editdepartment").removeClass('hide');
                        $("#editdepartment").addClass('show');
                        var facultydepartment = value.Fid;
                        $.post("Php/server.php", {
                            action: "Retrieve-faculty-department",
                            department: facultydepartment
                        }, function (data) {
                            data = JSON.parse(data);
                            $("#editempDepartmenta").empty().append("<option value=''>Select the Faculty Department</option>");
                            populatevalue(data, $("#editempDepartmenta"), 'Did', 'Dname');
                            $("#editempDepartmenta").val(value.Did);
                        });
                        $("#editaccemppostionline").removeClass('hide');
                        $("#editaccemppostionline").addClass('show');
                        $("#seniormemberRank").removeClass('hide');
                        $("#seniormemberRank").addClass('show');

                        $("#editempPositiona").val(value.staff_position);
                        $("#seniormember").val(value.staff_rank);
                        $("#editempSchedulea").val(value.staff_schedule);


                        $("#editempFaculty").on("change", function () {
                            var changefacultydepartment = value.Fid;
                            $.post("Php/server.php", {
                                action: "Retrieve-faculty-department",
                                department: changefacultydepartment
                            }, function (data) {
                                data = JSON.parse(data);
                                $("#editempDepartmenta").empty().append("<option value=''>Select the Faculty Department</option>");
                                populatevalue(data, $("#editempDepartmenta"), 'Did', 'Dname');
                            });
                        });




                    }//display Non accademeic details to the admin
                    else if (value.staff_categ === "2") {
                        $("#editfaculty").removeClass('show');
                        $("#editfaculty").addClass('hide');
                        $("#editaccemppostionline").removeClass('show');
                        $("#editaccemppostionline").addClass('hide');
                        $("#seniormemberRank").removeClass('show');
                        $("#seniormemberRank").addClass('hide');
                        $("#seniorstaffRank").removeClass('show');
                        $("#seniorstaffRank").addClass('hide');

                        if (value.unit_id === null) {
                            $("#editdepartment").removeClass('hide');
                            $("#editdepartment").addClass('show');
                            $("#editunit").removeClass('show');
                            $("#editunit").addClass('hide');
                            $.post("Php/server.php", {
                                action: "Retrieve-nonAccDepartment"
                            }, function (data) {
                                data = JSON.parse(data);
                                $("#editempDepartmenta").empty().append("<option value=''>Select the Department</option>");
                                populatevalue(data, $("#editempDepartmenta"), 'Did', 'Dname');
                            });
                            $("#editempDepartmenta").val(value.Did);
                            $("#editnonemppostionline").removeClass('hide');
                            $("#editnonemppostionline").addClass('show');
                            $("#editempPosition").val(value.staff_position);
                            $("#editempSchedulea").val(value.staff_schedule);

                        } else if (value.Did === null) {
                            $("#editunit").removeClass('hide');
                            $("#editunit").addClass('show');

                            $.post("Php/server.php", {
                                action: "Retrieve-unit"
                            }, function (data) {
                                data = JSON.parse(data);
                                $("#editempunita").empty().append("<option value=''>Select the Unit</option>");
                                populatevalue(data, $("#editempunita"), 'unit_id', 'unit_name');
                                $("#editempunit").val(value.unit_id);
                            });
                            $("#editnonemppostionline").removeClass('hide');
                            $("#editnonemppostionline").removeClass('show');
                            $("#editempPosition").val(value.staff_position);
                            $("#editempSchedulea").val(value.staff_schedule);
                        }






                    }//display both details to the admin
                    else if (value.staff_categ === "3") {
                        $("#editfaculty").removeClass('hide');
                        $("#editfaculty").addClass('show');
                        $("#editempFaculty").val(value.Fid);
                        $("#editdepartment").removeClass('hide');
                        $("#editdepartment").addClass('show');
                        $("#editempDepartmenta").val(value.Did);
                        var facultydepartment = value.Fid;
                        $.post("Php/server.php", {
                            action: "Retrieve-faculty-department",
                            department: facultydepartment
                        }, function (data) {
                            data = JSON.parse(data);
                            $("#editempDepartmenta").empty().append("<option value=''>Select the Faculty Department</option>");
                            populatevalue(data, $("#editempDepartmenta"), 'Did', 'Dname');

                        });
                        $("#editaccemppostionline").removeClass('hide');
                        $("#editaccemppostionline").addClass('show');
                        $("#seniormemberRank").removeClass('hide');
                        $("#seniormemberRank").addClass('show');

                        $("#editempPositiona").val(value.staff_position);
                        $("#seniormember").val(value.staff_rank);
                        $("#editempSchedulea").val(value.staff_schedule);
                        $("#editempFaculty").on("change", function () {
                            var changefacultydepartment = value.Fid;
                            $.post("Php/server.php", {
                                action: "Retrieve-faculty-department",
                                department: changefacultydepartment
                            }, function (data) {
                                data = JSON.parse(data);
                                $("#editempDepartmenta").empty().append("<option value=''>Select the Faculty Department</option>");
                                populatevalue(data, $("#editempDepartmenta"), 'Did', 'Dname');
                            });
                        });
                        $("#editunit").removeClass('hide');
                        $("#editunit").removeClass('show');
                        $("#editempunita").val(value.unit_id);
                        $.post("Php/server.php", {
                            action: "Retrieve-unit"
                        }, function (data) {
                            data = JSON.parse(data);
                            $("#editempunita").empty().append("<option value=''>Select the Unit</option>");
                            populatevalue(data, $("#editempunita"), 'unit_id', 'unit_name');
                        });
                    } else {
                    }


//                    $("#editempPosition").val(value.staff_label);
//                    $("#editempContractD").val(value.contractDays);
//                    $("#editempSchedule").val(value.staff_schedule);
//                    $("#editempcategory").val(value.staff_cate);
//                    $("#editempDepartment").val(value.unit_id);
//                    $("#editempFaculty").val(value.Fid);
//                    $("#editempDepartment").val(value.unit_id);
//                    $("#editempcategory").val(value.staff_cate);
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
        checkvalue($("#editempMarital"), 'Marital field is empty');
        checkvalue($("#editempPosition"), 'Positon field is empty');
        checkvalue($("#editempPositiona"), 'Positon field is empty');
        checkvalue($("#seniormember"), 'Rank field is empty');
        checkvalue($("#seniorstaff"), 'Rank field is empty');
        checkvalue($("#editdepartment"), 'Department field is empty');
        checkvalue($("#editempunita"), 'Unit field is empty');
        checkvalue($("#editempFaculty"), 'Faculty field is empty');
        checkvalue($("#editempcategory"), 'Staff Category field is empty');
        checkvalue($("#editempSchedulea"), 'Staff Schedule field is empty');
        checkvalue($("#editempSchedule"), 'Staff Schedule field is empty');
        checkvalue($("#editempstatus"), '');

        $(".priviewemployee").on("click", function () {
            employeeid = $(this).attr('id');
            $.post("Php/server.php", {
                action: "Retrieve-selected-staff",
                employeeid: employeeid
            }, function (data) {
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
                    $('#userimg').attr('src', value.photo).removeClass('hide').addClass('d-block ui-w-100');
                    $('#userId').text(value.username);

                    $('#userDob').text(value.dob);
                    $('#userContact').text(value.contact);
                    $('#userEmail').text(value.email);
//            $('#userMarital').text(value.email);
                    //Users gender condition.
                    var abbreviation = '';
                    if (value.gender === "1") {
                        $("#userGen").text("MALE");
                        abbreviation = "MR";
                        if (value.marital_status === "1") {
                            $("#userMarital").text("Single");
                            abbreviation = "MISS";
                        } else {
                            $("#userMarital").text("Married");
                            abbreviation = "MRS";
                        }
                    } else {
                        $("#userGen").text("FEMALE");
                        if (value.marital_status === "1") {
                            $("#userMarital").text("Single");
                            abbreviation = "MISS";
                        } else {
                            $("#userMarital").text("Married");
                            abbreviation = "MRS";
                        }
                    }
                    $('#userFuname').text(abbreviation + ' ' + value.firstname + ' ' + value.lastname + ' ' + value.middlename);
                    if (value.religion === "1") {
                        $('#userReligion').text("Musilm");
                    } else if (value.religion === "2") {
                        $('#userReligion').text("Christian");
                    } else if (value.religion === "3") {
                        $('#userReligion').text("Traditional");
                    } else {
                    }
                    if (value.staff_schedule === "1") {
                        $("#userSchedule").text("Full time");
                    } else if (value.staff_schedule === "2") {
                        $("#userSchedule").text("Part time");
                    } else {
                    }
                    //checking if the user is an accadamicstaff
                    if (value.staff_categ === "1") {
                        $("#usercate").text("Accdamic");
                        $("#facultyline").removeClass('hide');
                        $("#facultyline").addClass('show');
                        $("#rankline").removeClass('hide');
                        $("#rankline").addClass('show');
                        $("#facultyDeparmline").removeClass('hide');
                        $("#facultyDeparmline").addClass('show');
                        $('#Ufaculty').append("<a href=''class='text-center float-right'>" + value.facultyname + "</a>");
                        $('#userfacultyDeparment').append("<a href=''class='text-center float-right'>" + value.departmentname + "</a>");

                        if (value.staff_position === "1") {
                            $("#userposition").text("Senior Member");
                            //checking the value for rank
                            if (value.staff_rank === "1") {
                                $("#userrank").text("Professor");
                            } else if (value.staff_rank === "2") {
                                $("#userrank").text("Associate Professor");
                            } else if (value.staff_rank === "3") {
                                $("#userrank").text("Senior lecturer");
                            } else if (value.staff_rank === "4") {
                                $("#userrank").text("Assistant lecturer");
                            } else {
                            }

                        } else if (value.staff_position === "2") {
                            $("#userposition").text("Senior Staff");
                            if (value.staff_rank === "1") {
                                $("#userrank").text("Chairman Research Assistant");
                            } else if (value.staff_rank === "2") {
                                $("#userrank").text("Principal Research Assistant");
                            } else if (value.staff_rank === "3") {
                                $("#userrank").text("Senior Research Assistant");
                            } else if (value.staff_rank === "4") {
                                $("#userrank").text("Research Assistant");
                            }
                            //staff rank else
                            else {
                            }
                            //staff position else
                        } else {
                        }


                    }//checking for non accadamicstaff
                    else if (value.staff_categ === "2") {
                        $("#usercate").text("Non accdamic");
                        //checking if you belong to a unit or department
                        if (value.unit_id === null) {
                            $("#departmentline").removeClass('hide');
                            $("#departmentline").removeClass('show');
                            $('#Udepartment').append("<a href=''class='text-center float-right'>" + value.departmentname + "</a>");
                        } else if (value.Did === null) {
                            $("#unitline").removeClass('hide');
                            $("#unitline").removeClass('show');
                            $('#userUnit').append("<a href=''class='text-center float-right'>" + value.unitname + "</a>");
                        }
                        //checking the unaccadamic staff position
                        if (value.staff_position === "1") {
                            $("#userposition").text("Senior Member");
                        } else if (value.staff_position === "2") {
                            $("#userposition").text("Senior Staff");
                        } else if (value.staff_position === "3") {
                            $("#userposition").text("Junior Staff");
                        } else {
                        }

                    }//checking for both acc and non acc staff.
                    else if (value.staff_categ === "3") {
                    } else {
                    }



                    //next of kin name
                    $("#userKiname").text(value.kinName);
                    $("#userKicontact").text(value.kinContact);
                    $("#userKiemail").text("Unknow");
                    $("#userKiaddress").text(value.kinAddress);
                    $("#userKirelation").text("Unknow");









//                         $("#empimage").attr('src', value.photo);
//                    $("#empusername").text(value.username);
//                    $("#empemail").text(value.email);
//                    $("#empcontact").text(value.contact);
//                    $("#empsurname").val(value.firstname);
//                    $("#emplastname").val(value.lastname);
//                    $("#empdob").val(value.dob);
//                    $("#emphometown").val(value.Hometown);
//                    $("#empaddress").val(value.address);
//                    $("#empplaceofbirth").val(value.place_of_birth);
//                    $("#empcv").text(value.curriculumvitae);
//                    $("#empcv").attr("href", value.curriculumvitae);
//                    $("#empeducationlevel").text(value.educationlevel);
//                    $("#empeducationlevel").attr("href", value.educationlevel);
//                    $("#empnextofkinname").val(value.kinName);
//                    $("#empnextofkinaddress").text(value.kinAddress);
//                    $("#empnextofkincontact").val(value.kinContact);
//                    $("#empcontratstart").val(value.contractStart);
//                    $("#empcontratend").val(value.contractEnd);
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
                paging: true,
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
                    }
                ]
            });
        });
    });
    $("#employeecontractid").on("keyup", function () {
        employeeindex = $(this).val();
        if (employeeindex !== "") {
            $.post("Php/server.php", {
                action: "Retrieve-selected-staff",
                employeeid: employeeindex
            }, function (data) {
                if (data !== "false") {
                    $("#employeecontractid").notify("Valid Index number", "success");
                    $("#submitnewcontract").removeClass("disabled");
                    $("#submitnewcontract").addClass('show');
                    data = JSON.parse(data);
                    $.each(data, function (key, value) {
                        fullname = value.firstname + ' ' + value.lastname + ' ' + value.middlename;
                        if ($("#employeecontractid").val() !== '') {
                            $(".form-group").removeClass('hide');
                            $(".form-group").addClass('show');
                            $("#employeecontractname").val(value.firstname + ' ' + value.lastname + ' ' + value.middlename);
                            $("#employeecontractunit").val(value.unit_name);
                            if (value.staff_label === "1") {
                                return     $("#employeelable").text("Senior Member Staff");
                            } else if (value.staff_label === "2") {
                                return    $("#employeelable").text("Senior Staff");
                            } else {
                                return   $("#employeelable").text("Junior Staff");
                            }
                        } else {
                            $("#submitnewcontract").addClass("disabled");
                        }
                    });
                } else {
                    $("#employeecontractid").notify("Invalid Index number", "Error");
                    $("#submitnewcontract").addClass("disabled");
                }
            });
        } else {
            $("#employeecontractname").val("");
            $("#employeecontractunit").val("");
            $("#submitnewcontract").addClass("disabled");
        }
    });
    $("#employeecontractS").on("focusout", function () {
        newContractStart = check_contract($("#employeecontractS"), "Input contract start");
    });
    $("#employeecontractE").on("focusout", function () {
        newContractEnd = check_contract($("#employeecontractE"), "Input contract end");
        var e = $("#employeecontractE").val();
        var s = $("#employeecontractS").val();
        newContractdays = datecalulation(s, e);
//        console.log(datecalulation(s, e));
        $("#employeecontractD").val(datecalulation(s, e) + "days");
    });
    $("#submitnewcontract").on("click", function () {
        if ($("#employeecontractS").val() !== "" || $("#employeecontractE").val() !== "") {
            $.post("Php/server.php", {
                action: "Addnew-contract",
                newContractStart: newContractStart,
                newContractEnd: newContractEnd,
                newContractdays: newContractdays,
                employeeid: employeeindex
            }, function (data) {
                if (data === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'You have successful awared ' + newContractdays + ' days contract to ' + fullname,
                        showConfirmButton: false
                    });
                    setInterval('location.reload(true)', 2000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'The new contract was unsuccessful',
                        showConfirmButton: false
                    });
                    setInterval('location.reload(true)', 2000);
                }
            });
        } else {
            $("#employeecontractS").notify("Contract Start field is empty", "Error");
            $("#employeecontractE").notify("Contract End field is empty", "Error");
        }
    });

    $("#employeepriviligeid").on("input", function () {
        var employeepriviligeid = $(this).val();
        log(employeepriviligeid);
        $.post("Php/server.php", {
            action: "retrive-previleges",
            privilegeid: employeepriviligeid
        }, function (data) {
          
            data = JSON.parse(data);
            $.each(data, function (key, value) {
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
