var facultyid = '';
var facultyid1= '';
$(function () {
//geting the used value from the server side into the datatable
    $.post("Php/server.php", {
        action: "Retrieve-faculty-table"
    }, function (data) {
        data = JSON.parse(data);
        $("#empFaculty").append("<option value=''>Select Faculty</option>");
         populatevalue(data, $("#empFaculty"), 'Fid', 'Fname');
        $.each(data, function (key, value) {
            leaveta = $("#facultyT").DataTable({
                retrieve: true,
                responsive: true,
                paging: false,
                data: data,
                columns: [
                    {data: 'Fname'},
                    {data: 'Fsname'},
                    {data: 'data',
                     render: function (data, type, row) {
                         return row.facultyheadF+" "+row.facultyheadL;
                     }
                    },
                    {
                        data: 'data',
                        render: function (data, type, row) {
                             return '<pre>' +'<a href="#" class=" text-primary editfaculty" id="'+ row.Fid+'" data-toggle="modal" data-target="#editfacultymodal" title="Edit"><i class="fa fa-edit "mr-3 text-gray"style="font-size:20px;"></i></a>'+ ' ... '
                            +'<a href="#" class=" text-primary delectfaculty" id="'+ row.Fid+'" data-toggle="modal" data-target="#delectfacultymodal" title="Delete"><i class="fa fa-trash " mr-3 text-gray" style="font-size:18px;color:red"></i></a>'+ '</pre>';
                        }
                    }
                ]
            });
        });
//geting the value to edit insid the input box from the server side
        $(".editfaculty").on("click", function () {
            facultyid = $(this).attr('id');
            $.post("Php/server.php", {
                action: "edit-faculty-value",
                facultyid: facultyid
            }, function (data) {
                data = JSON.parse(data);
                $.each(data, function (key, value) {
                    $('#editfacultyname').val(value.Fname);
                    $('#editfacultyshortname').val(value.Fsname);
                });
            });
        });
 checkvalueFaculty($('#editfacultyname'),"Enter faculty name");
 checkvalueFaculty($('#editfacultyshortname'),"Enter faculty short name");
                $(".delectunit").on("click", function () {
             unitid1 = $(this).attr('id');
//            console.log(unitid1);
           
          
        });
    });
//Submiting the edited value to the server side
//    $("#submitfacultyunit").on("click", function () {
//        var editfacultyname = $("#editfacultyname").val();
//        var editfacultyshortname = $("#editfacultyshortname").val();
//        if (editfacultyname.length > 2) {
//            if (editfacultyshortname.length > 2) {
//                $.post("Php/server.php", {
//                    action: "edit-faculty",
//                    editunitname: editfacultyname,
//                    editunitshortname: editfacultyshortname,
//                    facultyid: facultyid
//                });
//                  Swal.fire({
//                icon: 'success',
//                title: 'Faculty Edit',
//                text: 'Successfully',
//                showConfirmButton: false
//            });
//             setInterval('location.reload(true)', 1000);
//            }
//        } else {
//             Swal.fire({
//                icon: 'error',
//                title: 'Error',
//                text: 'No Modification as been done on the Faculty'
//            });
//        }
//    });
    //Deleting the unit id
    $('#deletefaculty').on("click",function(){
        $.post("Php/server.php", {
                    action: "delete-faculty",
                    facultyid1: facultyid1
                });
                Swal.fire({
                icon: 'success',
                title: 'Faculty Delete',
                text: 'Successfully',
                showConfirmButton: false
            });
             setInterval('location.reload(true)', 1000);
                
    });
//Submiting new value to the server side
    $("#Submitunit").on("click", function () {
        var facultyname = $("#facultyname").val();
        var facultyshortname = $("#facultyshortname").val();
        if (facultyname.length > 2) {
            if (facultyshortname.length >= 2) {
                $.post("Php/server.php", {
                    action: "insert-faculty",
                    facultyname: facultyname,
                    facultyshortname: facultyshortname
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
function checkvalueFaculty(selector, message) {
    selector.on("change", function () {
        var atribute = $(this).attr('name');
        var newvalue = $(this).val();
        if (selector.val() === '') {
            selector.notify(message, "Error");
//        $("#editemp").addClass("disabled");
            return false;
        } else {
            var data = new FormData();
            data.append('action', "edit-faculty");
            data.append('newdata', newvalue);
            data.append('atribute', atribute);
            data.append('facultyid', facultyid);
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

function populatevalue(data, element, valueid, valuename) {
    $.each(data, function (index, value) {
        (element).append("<option value='" + value[valueid] + "'>" + value[valuename] + "</option>");
    });
}