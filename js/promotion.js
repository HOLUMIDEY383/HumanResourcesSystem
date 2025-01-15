$(function () {
    //retriving vacancy
    $.post("Php/server.php",
            {action: "retrive-vacancy"}, function (data) {
        data = JSON.parse(data);
        $("#vacancyList").empty().append("<option value=''>Select  Vancancy</option>");
        populatevalue(data, $("#vacancyList"), 'id', 'Vtitle');
    });
    //retriving promotion details;
    $.post("Php/server.php",
            {action: "retrive-promotion"}, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            $("#Ustaffpromotion").DataTable({
                retrieve: true,
                responsive: true,
                paging: false,
                data: data,
                columns: [
                  
                    {data: 'promotiontitle'},
                    {data: 'Promotiondetails'},
                    {data: 'data',
                        render: function (data, type, row) {
                            if (row.promotionstatus === "0") {
                                return  "<div class='badge text-light bg-dark'>pending</div>";
                            } else if (row.promotionstatus === "1") {
                                return "<div class='badge text-light bg-dark'>Processing</div>";
                            } else if (row.promotionstatus === "2") {
                                return "<div class='badge text-light bg-green'>Approved</div>";
                            } else if (row.promotionstatus === "3") {
                                return "<div class='badge text-light bg-red'>Delined</div>";
                            }
                        }
                    }
                ]
            });
        });

    });
    promotionvalues($("#promotionTitle"));
//    promotionvalues($("#promotiongraduation"));
//    promotionvalues($("#promotionresearcharea"));
//    promotionvalues($("#promotionpublication"));
//    promotionvalues($("#promotionstatement"));
    promotionvalues($("#promotionDetails"));

    $("#requestpromotion").on("click", function () {
        if ($("#promotionTitle").val() !== '' || $("#promotionDetails").val() !== '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Fill All Input Field',
                showConfirmButton: true
            });
            if ($("#vacancyList").val() === '') {
                $.post("Php/server.php",
                        {action: "request-promotion",
                            promotiontitle: $("#promotionTitle").val(),
//                            currentposition: $("#promotioncurrentposit").val(),
                            promotiondetails: $("#promotionDetails").val()
                        }, function (data) {
                    console.log(data);
                    if (data === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Request Sent Sucessfully',
                            text: 'Success',
                            showConfirmButton: false
                        });
                        setInterval('location.reload(true)', 1000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Request Sent Unsucessfully',
                            text: 'Unsucessfully',
                            showConfirmButton: true
                        });
                    }

                });
            } else {

            }
        } else {
        }
    })

});

//<-- Function to display value to the user in the option box -->
function populatevalue(data, element, valueid, valuename) {
    $.each(data, function (index, value) {
        (element).append("<option value='" + value[valueid] + "'>" + value[valuename] + "</option>");
    });

}
function promotionvalues(selector) {
    selector.on("focusout", function () {
        if (selector.val() === '') {
            selector.focus();
            selector.addClass('focusedB');
        } else if (selector.val() !== '') {
            if (selector.val().length >= 5) {
                selector.notify("Valid", "success");
                selector.removeClass('focusedB');
                selector.addClass('focusedS');
            } else {
                selector.focus();
                selector.notify("You need to provide more details in this section", "error");
                selector.addClass('focusedB');
            }
        } else {
            selector.focus();
            selector.addClass('focusedB');
        }
    })

}