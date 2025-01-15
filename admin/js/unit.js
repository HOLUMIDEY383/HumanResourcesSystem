var unitid = '';
var unitid1 = '';
$(function () {
//geting the used value from the server side into the datatable
    $.post("Php/server.php", {
        action: "Retrieve-unit"
    }, function (data) {
        data = JSON.parse(data);
        populatevalue(data, $("#editempDepartment"), 'unit_id', 'unit_name');
        $.each(data, function (key, value) {

            leaveta = $("#unitT").DataTable({
                retrieve: true,
                responsive: true,
                paging: false,
                data: data,
                columns: [
                    {data: 'unit_name'},
                    {data: 'unit_short_name'},
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            return row.firstname + ' ' + row.lastname;
                        }
                    },
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            return '<pre>' + '<a href="#" class=" text-primary editunit" id="' + row.unit_id + '" data-toggle="modal" data-target="#editunitmodal" title="Edit"><i class="fa fa-edit "mr-3 text-gray"style="font-size:20px;"></i></a>' + ' ... '
                                    + '<a href="#" class=" text-primary delectunit" id="' + row.unit_id + '" data-toggle="modal" data-target="#delectunitmodal" title="Delete"><i class="fa fa-trash " mr-3 text-gray" style="font-size:18px;color:red"></i></a>' + '</pre>';
//                            return '<pre>' + '  <input type="button" class="btn-success btn-sm editunit" value="Edit" id="' + row.unit_id + '" data-target="#editunitmodal" data-toggle="modal" >' + ' '
//                                    + '<input type="button" class="btn-danger btn-sm delectunit" value="Delete" id="' + row.unit_id + '"data-target="#delectunitmodal" data-toggle="modal">' + '</pre>';
                        }
                    }
                ]
            });
        });
//geting the value to edit insid the input box from the server side
        $(".editunit").on("click", function () {
            unitid = $(this).attr('id');
            $.post("Php/server.php", {
                action: "edit-unit-value",
                unitid: unitid
            }, function (data) {
                data = JSON.parse(data);
                $.each(data, function (key, value) {
                    $('#editunitname').val(value.unit_name);
                    $('#editunitshortname').val(value.unit_short_name);
                });
            });
        });
        $(".delectunit").on("click", function () {
            unitid1 = $(this).attr('id');
//            console.log(unitid1);


        });
    });
//Submiting the edited value to the server side
    $("#submiteditunit").on("click", function () {
        var editunitname = $("#editunitname").val();
        var editunitshortname = $("#editunitshortname").val();
        if (editunitname.length > 2) {
            if (editunitshortname.length > 2) {
                $.post("Php/server.php", {
                    action: "edit-unit",
                    editunitname: editunitname,
                    editunitshortname: editunitshortname,
                    unitid: unitid
                });
                Swal.fire({
                    icon: 'success',
                    title: 'Unit Edit',
                    text: 'Successfully',
                    showConfirmButton: false
                });
                setInterval('location.reload(true)', 1000);
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No Modification as been done on the unit name'
            });
        }
    });
    //Deleting the unit id
    $('#deleteunit').on("click", function () {
        $.post("Php/server.php", {
            action: "delete-unit",
            unitid1: unitid1
        });
        Swal.fire({
            icon: 'success',
            title: 'Unit Delete',
            text: 'Successfully',
            showConfirmButton: false
        });
        setInterval('location.reload(true)', 1000);

    });
//Submiting new value to the server side
    $("#Submitunit").on("click", function () {
        var unitname = $("#unitname").val();
        var unitshortname = $("#unitshortname").val();
        if (unitname.length > 2) {
            if (unitshortname.length >= 2) {
                $.post("Php/server.php", {
                    action: "insert-unit",
                    unitname: unitname,
                    unitshortname: unitshortname
                });
                Swal.fire({
                    icon: 'success',
                    title: 'Created',
                    text: 'Successfully Created',
                    showConfirmButton: false
                });

                setInterval('location.reload(true)', 1000);
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No Text in the unit name'

            });
//            alert("bad");
        }
    });
});
//<-- Function to display value to the user in the option box -->
function populatevalue(data, element, valueid, valuename) {
    $.each(data, function (index, value) {
        (element).append("<option value='" + value[valueid] + "'>" + value[valuename] + "</option>");
    });
}