var deparmentid;
var deparment;
$(function () {
    $.post("Php/server.php", {
        action: "Retrieve-Department"
    }, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            var departmentT = $("#departmentT").DataTable({
                retrieve: true,
                responsive: true,
                paging: false,
                data: data,
                columns: [
                    {data: 'Dname'},
                    {data: 'Dsname'},
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            return row.firstname + ' ' + row.lastname;
                        }
                    },
//                    {
//                        data: 'data',
//                        render: function (data, type, row) {
//                            return row.members;
//                        }
//                    },
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            return '<pre>' + '<a href="#" class=" text-primary editdepartment" id="' + row.Did + '" data-toggle="modal" data-target="#editdepartmentmodal" title="Edit"><i class="fa fa-edit "mr-3 text-gray"style="font-size:20px;"></i></a>' + ' ... '
                                    + '<a href="#" class=" text-primary delectdepartment" id="' + row.Did + '" data-toggle="modal" data-target="#delectdepartmentmodal" title="Delete"><i class="fa fa-trash " mr-3 text-gray" style="font-size:18px;color:red"></i></a>' + '</pre>';
                        }
                    }
                ]
            });
        });

        $(".editdepartment").on("click", function () {
            deparmentid = $(this).attr('id');
            $.post("Php/server.php", {
                action: "depatment-value",
                deparmentid: deparmentid
            }, function (data) {
                data = JSON.parse(data);
                $.each(data, function (key, value) {
                    $('#editNdepartment').val(value.Dname);
                    $('#editSDepartment').val(value.Dsname);
                    $('#editHDepartment').val(value.Hod);

                });
            });

        });
        //delecting department.
//            $(".delectdepartment")
        $(".delectdepartment").on("click", function () {
//        var deparment = $(".delectdepartment").attr('id');
            deparment = $(this).attr('id');
        });
        $(".delect").on("click", function () {
            $.post("Php/server.php", {
                action: "delect-depatment",
                deparmentid: deparment
            }, function (data) {
                if(data==="true"){
                    Swal.fire({
                icon: 'success',
                title: 'Department Delete',
                text: 'Successfully',
                showConfirmButton: false
            });
            setInterval('location.reload(true)', 1000);
                }
            });
        });


    });

    checkvalueDepartment($("#editNdepartment"), "Deparment name is Empty ");
    checkvalueDepartment($("#editSDepartment"), "Deparment short name is Empty ");
    checkvalueDepartment($("#editHDepartment"), "Deparment Head of department is empty ");
//Adding a new Department.
    $("#Submitdepartment").on("click", function () {
        var departmentname = $("#departmentname").val();
        var departmentSname = $("#departmentshortname").val();
        var Fid = $("#Dfaculty").val();

        if (departmentname === '') {
            $("#departmentname").notify("Enter new deparment name", "Error");
        } else if (departmentSname === '') {
            $("#departmentshortname").notify("Enter new deparment short name", "Error");
        } else {
            if (Fid !== '') {
                $.post("Php/server.php", {
                    action: "insert-DepartmentA",
                    departmentname: departmentname,
                    departmentSname: departmentSname,
                    Fid: Fid
                }, function (data) {
                    if (data === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Created',
                            text: 'Successfully Created',
                            showConfirmButton: false
                        });
                        setInterval('location.reload(true)', 1000);
                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Unsucessful',
                            text: 'Department was not add successfully'

                        });
                    }

                });
            } else {
                $.post("Php/server.php", {
                    action: "insert-DepartmentB",
                    departmentname: departmentname,
                    departmentSname: departmentSname
                }, function (data) {
                    if (data === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Created',
                            text: 'Successfully Created',
                            showConfirmButton: false
                        });
                        setInterval('location.reload(true)', 1000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Unsucessful',
                            text: 'Department was not add successfully'
                        });
                    }

                });
            }
        }

    });


});

function checkvalueDepartment(selector, message) {
    selector.on("change", function () {
        var atribute = $(this).attr('name');
        var newvalue = $(this).val();
        if (selector.val() === '') {
            selector.notify(message, "Error");
//        $("#editemp").addClass("disabled");
            return false;
        } else {
            var data = new FormData();
            data.append('action', "Update-selected-department");
            data.append('newdata', newvalue);
            data.append('atribute', atribute);
            data.append('deparmentid', deparmentid);
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