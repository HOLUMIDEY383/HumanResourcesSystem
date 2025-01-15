var complainid = '';
var log = console.log;
var momodata = '';
var start = '';
var end = '';
var eventid = '';
$(function () {
//    retrive sidebar color
     $.post("Php/server.php",
            {action: "retrive-sidebarC"}, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            $("#Asidebarcolor").val(value.side);
        sidebarrcolor(value.side); 
        });
    }

    );
//Retrieving Complains from the database
    $.post("Php/server.php", {
        action: "Retrieve-complains"
    }, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            complainid = value.id;
            $("#complainT").DataTable({
                retrieve: true,
                paging: false,
                data: data,
                columns: [
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            return row.firstname + ',' + row.lastname;
                        }
                    },
                    {data: 'unit_name'},
                    {data: 'description'},
                    {data: 'sentdate'},
                    {
                        data: 'data',
                        render: function (data, type, row) {
                            return '<a href="#" class=" text-primary replyFeedbackIcon" id="' + row.id + '" data-toggle="modal" data-target="#complainmodal" title="Reply"><i class="fa fa-reply fa-lg" id="faruq" mr-3 text-gray"></i></a>';
                        }
                    }
                ]
            });
        });
        $(".replyFeedbackIcon").on("click", function () {
            complainid = $(this).attr('id');
        });
    });
// this section is to reply  each complain of the employee. 
    $('#feedbackreplybtn').on("click", function () {
        var Fmessage = $('#complainmessage').val();
        if (Fmessage.length > 2) {

            $.post("Php/server.php", {
                action: "Reply-complains",
                complainid: complainid,
                Fmessage: Fmessage
            });
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Feedback',
                showConfirmButton: false
            });
            setInterval('location.reload(true)', 1000);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No response in in the input box',
                showConfirmButton: true
            });
        }
    });
    //Retrieving Dashboard tags Details from the database
    $.post("Php/server.php", {
        action: "Retrieve-totalemp"
    }, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            $('#temployee').append("<span>" + value + "</span>");
        });
    });
    $.post("Php/server.php", {
        action: "Retrieve-totalleave"
    }, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            $('#tleave').append("<span>" + value + "</span>");
        });
    });
    $.post("Php/server.php", {
        action: "Retrieve-unsolvedcomplain"
    }, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            $('#unsolvedcomplain').append("<span>" + value + "</span>");
        });
    });
    $.post("Php/server.php", {
        action: "Retrieve-userinfo"
    }, function (data) {
        data = JSON.parse(data);
//        console.log(data);
        $.each(data, function (key, value) {
//            $('#unsolvedcomplain').append("<span>" + value + "</span>");
            $('#userN').append("<strong>" + value.firstname + "" + value.lastname + "</strong>");
            $('#postion').append("<small>" + value.username +"@gmail.com"+ "</small>");
            $('#ima').attr('src',value.base64photo);
        });
    });
    $.post("Php/server.php", {
        action: "Retrieve-activeuser"
    }, function (data) {
//        log(data);
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            $("#usersonline").prepend("<li class='list'> <i class='fa fa-user mr-3 text-black'></i>" + value.firstname + " " + value.lastname + " </li>");
        });
    });
    $.post("Php/server.php", {
        action: "Retrieve-memo"
    }, function (data) {
        data = JSON.parse(data);
        momodata = data;
        $.each(data, function (key, value) {
            start = value.start;
            end = value.end;
            title = value.title;
        });
        today = Date.now();
        if (today >= Date.parse(start)) {
            if (Date.parse(end) > today) {
                $('#activities').append("<ul class='timeline'><li><a target='_blank' class='eventstaringdate' href='#'>" + start + "</a><a href='#' class='float-right eventendingdate'>" + end + "</a><p id='eventdetails'>" + title + "</p></li><ul>");
            }
        } else {
            $('#activities').append("<p>No Activities Today</p>");
        }
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay,listYear'
            },
            navLinks: true, // can click day/week names to navigate views
            eventLimit: true,
            events: momodata,
            allDayDefault: false,
            editable: true,
            selectable: true,
            selectHelper: true,
            select: function (start, end) {
                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD'));
                $('#ModalAdd').modal('show');
            },
            editable: true,
            eventRender: function (event, element) {
                element.bind('dblclick', function () {
                    eventid = event.id;
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #edittitle').val(event.title);
                    $('#ModalEdit #editcolor').val(event.color);
                    $('#ModalEdit #editstart').val(event.start.format('YYYY-MM-DD'));
                    $('#ModalEdit #editend').val(event.end.format('YYYY-MM-DD'));
                    $('#ModalEdit').modal('show');
                });
            },
            eventResize: function (event) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                var title = event.title;
                var id = event.id;
                $.post("Php/server.php", {
                    action: "edit-memo",
                    start: start,
                    end: end,
                    title: title,
                    id: id
                }, function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Edit Event',
                        text: 'Success',
                        showConfirmButton: false
                    });
                    setInterval('location.reload(true)', 1000);
                });
            },

            eventDrop: function (event) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                var title = event.title;
                var id = event.id;
                $.post("Php/server.php", {
                    action: "edit-memo",
                    start: start,
                    end: end,
                    title: title,
                    id: id
                }, function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Edit Event',
                        text: 'Success',
                        showConfirmButton: false
                    });
                    setInterval('location.reload(true)', 1000);
                });
            },

//            eventClick: function (event) {
//                if (confirm("Are you sure you want to remove this event?")) {
//                    var id = event.id;
//                    $.post("Php/server.php", {
//                        action: "delete-memo",
//                        id: id
//                    }, function () {
//                        Swal.fire({
//                            icon: 'success',
//                            title: 'Delete Event',
//                            text: 'Success',
//                            showConfirmButton: false
//                        });
//                        setInterval('location.reload(true)', 1000);
//                    });
//                }
//                ;
//            }


        }
        );
        $('#addevent').on("click", function () {
            var title = $('#title').val();
            var color = $('#color').val();
            var start = $('#start').val();
            var end = $('#end').val();
            $.post("Php/server.php", {
                action: "insert-memo",
                start: start,
                end: end,
                title: title,
                color: color
            }, function (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Add Event',
                    text: 'Success',
                    showConfirmButton: false
                });
                setInterval('location.reload(true)', 1000);
            });

        });
        var delectevent = $('#delect').on("change", function () {
                  if (confirm("Are you sure you want to remove this event?")) {
                    
                    $.post("Php/server.php", {
                        action: "delete-memo",
                       eventid: eventid,
                    }, function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Delete Event',
                            text: 'Success',
                            showConfirmButton: false
                        });
                        setInterval('location.reload(true)', 1000);
                    });
                }
            });
        $('#editevent').on("click", function () {
            var edittitle = $('#edittitle').val();
            var editcolor = $('#editcolor').val();
            var editstart = $('#editstart').val();
            var editend = $('#editend').val();
            
            if (edittitle !=='') {
                $.post("Php/server.php", {
                    action: "edit-memo-date",
                    editstart: editstart,
                    editend: editend,
                    edittitle: edittitle,
                    eventid: eventid,
                    editcolor:editcolor
                }, function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Edit Event',
                        text: 'Success',
                        showConfirmButton: false
                    });
                    setInterval('location.reload(true)', 1000);
                });
            }
        });
    });
    $('#Submitcompany').on("click", function () {
        companyname = $('#Companyname').val();
        log(companyname);
        if (companyname !== '') {
            $.post("Php/server.php", {
                action: "Insert-Companyname",
                companyname: companyname
            }, function (data) {

            });

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No Text in the Company name'

            });
        }
    });
});
function displayMessage(message)
{
    $(".response").html("<div align='center' style='padding:20px;font-size:18px;color:#3539EA' class='success'>" + message

            + "</div>");
    setInterval(function () {
        $(".success").fadeOut();
    }, 2000);
}
//function for changing the side bar.
   function sidebarrcolor(color) {
    if (color === "1") {
        $("#Acsslink").attr("href", "css/style.blue.css");
    } else if (color === "2") {
        $("#Acsslink").attr("href", "css/style.green.css");

    } else if (color === "3") {
        $("#Acsslink").attr("href", "css/style.pink.css");

    } else if (color === "4") {
        $("#Acsslink").attr("href", "css/style.red.css");

    } else if (color === "5") {
        $("#Acsslink").attr("href", "css/style.sea.css");
    } else if (color === "6") {
        $("#Acsslink").attr("href", "css/style.violet.css");
    } else {
        $("#Acsslink").attr("href", "css/style.default.css");
    }

}       