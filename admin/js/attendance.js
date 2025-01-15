$(function () {
   $.post("Php/server.php", {
        action: "Retrive-attendance"
    }, function (data) {
     data = JSON.parse(data);
        $.each(data, function (key, value) {
            var UAtable = $("#Aattendance").DataTable({
                retrieve: true,
                responsive: true,
                paging: false,
                data: data,

                columns: [
                    {data:'employeeid'},
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            return row.firstname+' '+row.lastname;
                        }
                    },
                    {data: 'time_in'},
                    {data: 'break_in'},
                    {data: 'break_out'},
                    {data: 'time_out'},
                    {data: 'data',
                        render: function (data, type, row) {
                            return "<div class='dropdown dropdown-action text-right'><a href='#' class='action-icon dropdown-toggle' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'></i></a><div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' style='position: absolute; transform: translate3d(-78px, 32px, 0px); top: 0px; left: 0px; will-change: transform;'><a class='dropdown-item' href='#' data-toggle='modal' data-target='#edit_leave'><i class='fa fa-pencil m-r-5'></i> Edit</a><a class='dropdown-item' href='#' data-toggle='modal' data-target='#delete_approve'><i class='fa fa-trash-o m-r-5'></i> Delete</a></div></div>";
                        }
                    }
                ]
            });
        });
    
    
    });
    
    
});