$(function () {
    $.post("Php/server.php",
            {action: "retrive-sidebarC"}, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            $("#sidebarcolor").val(value.side);
        sidebarrcolor(value.side); 
        });
        
    }

    );
//    retriving the user permission

    $.post("Php/server.php", {
        action: "Retrieve-permission"
    }, function (data) {
        if(data!== "false"){
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            $("#adminDrop").append("<li><a href='"+ value.linkname + '.' + value.linkextention + "'>"+value.linkname+" (admin)</a></li>");
        });
        $("#adminpages").removeClass('hide');
        $("#adminpli").removeClass('hide');
        $("#greets").removeClass('hide').addClass('d-block ui-w-100');
        $("#greets2").removeClass('hide').addClass('d-block ui-w-100');
        }else{
            $("#adminpages").addClass('hide');
            $("#adminpli").addClass('hide');
        }
    });
    $.post("Php/server.php", {
        action: "Retrive-user-deatils"
    }, function (data) {
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            $('#Uima').attr('src', value.photo).removeClass('hide').addClass('d-block ui-w-100');
            $('#UuserN').text(value.firstname + ' ' + value.lastname + ' ' + value.middlename);
            $('#UuserDas').text(value.firstname + ' ' + value.lastname + ' ' + value.middlename);
            $('#Uemail').text(value.email);
        });
    });
    //retriving memo for users.
    $.post("Php/server.php", {
        action: "Retrieve-user-memo"
    }, function (data) {
//        console.log(data);
        data = JSON.parse(data);
        $.each(data, function (key, value) {
            var date = new Date(value.start);
            dbdate = date.toDateString();
            $("#Uevent").append(" <li class='text-capitalize'>" + dbdate + "-" + value.title + "</li>");
        });
//        momodata = data;

        var calendar = $('#Ucalendar').fullCalendar({
            header: {
                left: 'prev,next '
//                center: 'title',
//                right: 'month,basicWeek,basicDay,listYear'
            },
            navLinks: true, // can click day/week names to navigate views
            eventLimit: true,
//            events: momodata,
            allDayDefault: false,
            editable: true,
            selectable: true,
            selectHelper: true,
            select: function (start, end) {
                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
                $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD'));
                $('#ModalAdd').modal('show');
//               
            }});
    });


});

function sidebarrcolor(color) {
    if (color === "1") {
        $("#csslink").attr("href", "css/style.blue.css");
    } else if (color === "2") {
        $("#csslink").attr("href", "css/style.green.css");

    } else if (color === "3") {
        $("#csslink").attr("href", "css/style.pink.css");

    } else if (color === "4") {
        $("#csslink").attr("href", "css/style.red.css");

    } else if (color === "5") {
        $("#csslink").attr("href", "css/style.sea.css");
    } else if (color === "6") {
        $("#csslink").attr("href", "css/style.violet.css");
    } else {
        $("#csslink").attr("href", "css/style.default.css");
    }

}