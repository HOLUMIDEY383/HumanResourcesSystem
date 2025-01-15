// $(function () {
// //retriving promotion details;
//    $.post("Php/server.php",
//            {action: "retrive-promotion"}, function (data) {
//        data = JSON.parse(data);
//        $.each(data, function (key, value) {
//            $("#Astaffpromotion").DataTable({
//                retrieve: true,
//                responsive: true,
//                paging: false,
//                data: data,
//                columns: [
//                  
//                    {data: 'employeeid'},
//                    {data: 'data',
//                     render: function (data, type, row) {
//                         return row.facultyheadF+" "+row.facultyheadL;
//                     }
//                    },
//                    {data: 'contact'},
//                    {data: 'Email'},
//                    {data: 'Promotiontitle'},
//                    {data: 'Promotiondetails'},
//                    {data: 'data',
//                        render: function (data, type, row) {
//                            if (row.promotionstatus === "0") {
//                                return  "<div class='badge text-light bg-dark'>pending</div>";
//                            } else if (row.promotionstatus === "1") {
//                                return "<div class='badge text-light bg-dark'>Processing</div>";
//                            } else if (row.promotionstatus === "2") {
//                                return "<div class='badge text-light bg-green'>Approved</div>";
//                            } else if (row.promotionstatus === "3") {
//                                return "<div class='badge text-light bg-red'>Delined</div>";
//                            }
//                        }
//                    }
//                ]
//            });
//        });
//
//    });
//    });