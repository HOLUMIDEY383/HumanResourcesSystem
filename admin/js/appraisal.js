   $(function () {
       
   
   $("#employeeaidL").on("keyup", function () {
        id = $(this).val();
        if (id !== "") {
            $("#submitnewleave").removeClass("disabled");
            $.post("Php/server.php", {
                action: "Retrieve-selected-staff",
                employeeid: id
            }, function (data) {
//                console.log(data);
                if (data !== "false") {
                    data = JSON.parse(data);
                    newdata='';
                    $.each(data, function (key, value) {
                        $("#employeeaLname").val(value.firstname + " " + value.lastname);
                        $("#employeeFapp").val(value.reg_date);
                        $("#employeedob").val(value.dob);
//                        
                    });
                    
                } else {
                    $("#employeeidL").notify("Invalid Index number", "Error");
                }
            });

        } else {
            $("#employeeLname").val("");
            $("#employeeLA").val("");
            $("#employeeLcontact").val("");
            $("#submitnewleave").addClass("disabled");
        }
    });
    });
//  console.log("faculty show:"+value.unitname);
//                         console.log("faculty show:"+value.facultyname);
//                     if(value.unitname ==="null"){
//                        $("#employeeFD").val(value.facultyname);
//                        }else if(value.unitname!=="null"){
//                        $("#employeeFD").val(value.unitname);
//                        }else{
//                            $("#employeeFD").val(value.facultyname+"&"+value.unitname);
//                        }   
    