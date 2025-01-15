var Vend = '';
var Vtitle = '';
var Vavalia = '';
var Vdescrip = '';
var vid='';
$(function () {
//        var editor = CKEDITOR.replace('content');
    $.post("Php/server.php", {
        action: "Retrieve-vacancy"
    }, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            if (Date.now() > Date.parse(value.VendD)) {
                $.post("Php/server.php", {
                    action: "validate-vacancy",
                    id: value.id
                }, function (data) {
                });
            } else {

            }
            $('#vacancyT tbody tr').each(function (idx) {
                $(this).children("td:eq(0)").html(idx + 1);
            });
            var vacancytable = $("#vacancyT").DataTable({
                dom: 'Bfrtip',
                retrieve: true,
                responsive: true,
                paging: true,
                data: data,
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ],
                columns: [
                    {
                        "data": null
                    },
                    {data: 'Vtitle'},
                    {data: 'Vinformation'},
                    {data: 'Vavaliablity'},
//                    {
//                        data: 'data',
//                        render: function (data, type, row) {
//                            if (Date.now() > Date.parse(row.VendD)) {
//                                $.post("Php/server.php", {
//                                    action: "validate-vacancy",
//                                    id: row.id
//                                }, function (data) {
//                                });
//                            } else {
//
//                            }
//                        }
//                    },
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            if (row.Vstatus === "1") {
                                return  "<div class='badge text-light bg-green'>Active</div>";
                            } else {
                                return "<div class='badge text-light bg-red'>InActive</div>";
                            }
                        }
                    },
                    {
                        data: "data",
                        render: function (data, type, row) {
                            return '<a href="#" class=" text-muted editvacancy" data-toggle="modal" data-target="#editvacancymodal" title="Edit" id="' + row.id + '"><i class="fa fa-edit" mr-3 text-gray"></i></a>';
                        }
                    }

                ]
            });
        });
        //Retriving Vacancys details to be edited.
        $(".editvacancy").on("click", function () {
            vid = $(this).attr('id');
            $.post("Php/server.php", {
                action: "Retrieve-selected-vacancy",
                id: vid
            }, function (data) {
                data = JSON.parse(data);
                $.each(data, function (key, value) {
                    $("#editvacancyTitle").val(value.Vtitle);
                    $("#editvacancyAva").val(value.Vavaliablity);
                    $("#editvacancyEnd").val(value.VendD);
                    $("#editvacancyD").text(value.Vinformation);
                });
            });
        });
        checkvacancy($("#editvacancyTitle"), "Vacancy title field is empty");
        checkvacancy($("#editvacancyAva"), "Vacancy Avaliablity field is empty");
        checkvacancy($("#editvacancyEnd"), "Vacancy Ending date field is empty");
        checkvacancy($("#editvacancyD"), "Vacancy Description field is empty");
    });
//    var editor = $("#editor");
    $("#vacancyD").on("focusout", function () {
        if ($("#vacancyD").val().length > 1) {
            Vdescrip = $(this).val();
//            console.log(Vdescrip);
        } else {
            $("#vacancyD").notify("Vacancy details field is empty", "Error");
            $("#submitnewvacancy").addClass("disabled");
        }
    });
    $("#vacancyEnd").on("focusout", function () {
        Vend = validateOption($("#vacancyEnd"), "Vacancy Endind date field is empty");
    });
    $("#vacancyAva").on("focusout", function () {
        Vavalia = validateOption($("#vacancyAva"), "Avalability  field is empty");
    });
    $("#vacancyTitle").on("focusout", function () {
        Vtitle = validateOption($("#vacancyTitle"), "Vacancy Title field is empty");
    });
    $("#submitnewvacancy").on("click", function () {

        if ($("#vacancyEnd").val() !== "" || $("#vacancyD").val().length > 1 || $("#vacancyAva").val() !== "" || $("#vacancyTitle").val() !== "") {
            $.post("Php/server.php", {
                action: "Add-vacancy",
                Vend: Vend,
                Vtitle: Vtitle,
                Vavalia: Vavalia,
                Vdescrip: Vdescrip
            }, function (data) {
                console.log(data);
                if (data === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'You have successful added a new vacancy',
                        showConfirmButton: false
                    });
                    setInterval('location.reload(true)', 2000);
                }
            });
        } else {
            wal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'The new vacancy was unsuccessful added',
                showConfirmButton: false
            });
            setInterval('location.reload(true)', 2000);
        }
    }
    );

});

function validateOption(selector, message) {
    if (selector.val() === '') {
        $(selector).notify(message, "Error");
        $("#submitnewvacancy").addClass("disabled");
        return false;
    } else {
        $("#submitnewvacancy").removeClass("disabled");
        return selector.val();
    }
}
function checkvacancy(selector, message) {
    selector.on("change", function () {
        var atribute = $(this).attr('name');
        var newvalue = $(this).val();
        if (selector.val() === '') {
            selector.notify(message, "Error");
//        $("#editemp").addClass("disabled");
            return false;
        } else {
            var data = new FormData();
            data.append('action', "Update-selected-vacancy");
            data.append('newdata', newvalue);
            data.append('atribute', atribute);
            data.append('vid', vid);
//            data = $(this).serialize() + "&" + $.param(data);
            console.log(data);
            $.ajax({
                url: 'Php/server.php',
                type: 'post',
                data: data,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
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