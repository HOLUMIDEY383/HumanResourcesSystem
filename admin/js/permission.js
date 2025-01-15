accesslink = [];
var id = "";
$(function () {
    $.post("Php/server.php", {
        action: "Retrieve-links-modues"
    }, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
//            accesslink.push(value.Lid);
//            $("#permissiontable").append("<tr><td id=" + value.Lid + " class='linkname'>" + value.linkname + "</td><td class='text-center'><input type='checkbox'id='permissioncheck'> </td></tr>");
        });
    });
    $.post("Php/server.php", {
        action: "Retrieve-accademic-staff"
    }, function (data) {
        data = JSON.parse(data);
        staffdata = data;
        $.each(data, function (key, value) {
            $('#permission tbody tr').each(function (idx) {
                $(this).children("td:eq(0)").html(idx + 1);
            });
            var permissiontable = $("#permission").DataTable({
                dom: 'Bfrtip',
                retrieve: true,
                responsive: true,
                paging: false,
                data: staffdata,
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
                    {data: 'email'},
                    {data: 'contact'},
                    {
                        data: "data",
                        render: function (data, type, row) {
                            return '<a href="#" class=" text-muted editpermission" data-toggle="modal" data-target=".permissionMo" title="Edit" id="' + row.employeeid + '"><i class="fa fa-edit" mr-3 text-gray"></i></a>';
                        }
                    }
                ]
            });
            $(".editpermission").on("click", function () {

                $(".linkname").append("");
//                console.log($(".linkname").attr('id'));
//                console.log(accesslink[2]);

                id = $(this).attr('id');
                $.post("Php/server.php", {
                    action: "Retrieve-selected-staff-permission",
                    employeeid: id
                }, function (data) {
                    data = JSON.parse(data);
                    console.log(data);
                    $.each(data, function (key, value) {
//                       if()
                    });
                });

            });

        });
        $('input[type=checkbox]').click(function () {
            var atribute = $(this).attr('name');
            var id = $(this).attr('id');
//             $("#"+id+"")
            permission($("#" + id + ""), id, atribute);

//        $("#employeeaccess").on("click", function () {
//        });
        });
    });

});

function permission(selector, selectorid, name) {
    if (selector.is(':checked')) {
        $.post("Php/server.php", {
            action: "grant-permission",
            atribute: name,
            employeeid: id
        }, function (data) {
            if(data==="true"){
                $.notify("Access granted","success");
            }else{
                $.notify("Error","error");
            }
        });
    } else {
        $.post("Php/server.php", {
            action: "revoke-permission",
            atribute: name,
            employeeid: id
        }, function (data) {
           if(data==="true"){
                $.notify("Access deny","success");
            }else{
                $.notify("Error","error");
            }
        });
    }
}