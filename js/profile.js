//  /  Dropzone.autoDiscover = false;
$(function () {

    $.post("Php/server.php", {
        action: "Retrive-user-deatils"
    }, function (data) {

        data = JSON.parse(data);
        $.each(data, function (key, value) {
            $('#userimg').attr('src', value.photo).removeClass('hide').addClass('d-block ui-w-100');
            $('#userId').text(value.username);
            $('#userDob').text(value.dob);
            $('#userContact').text(value.contact);
            $('#userEmail').text(value.email);
//            $('#userMarital').text(value.email);
            //Users gender condition.
            var abbreviation = '';
            if (value.gender === "1") {
                $("#userGen").text("MALE");
                abbreviation = "MR";
                if (value.marital_status === "1") {
                    $("#userMarital").text("Single");
                    abbreviation = "MISS";
                } else {
                    $("#userMarital").text("Married");
                    abbreviation = "MRS";
                }
            } else {
                $("#userGen").text("FEMALE");
                if (value.marital_status === "1") {
                    $("#userMarital").text("Single");
                    abbreviation = "MISS";
                } else {
                    $("#userMarital").text("Married");
                    abbreviation = "MRS";
                }
            }
            $('#userFuname').text(abbreviation + ' ' + value.firstname + ' ' + value.lastname + ' ' + value.middlename);
            if (value.religion === "1") {
                $('#userReligion').text("Musilm");
            } else if (value.religion === "2") {
                $('#userReligion').text("Christian");
            } else if (value.religion === "3") {
                $('#userReligion').text("Traditional");
            } else {
            }
            if (value.staff_schedule === "1") {
                $("#userSchedule").text("Full time");
            } else if (value.staff_schedule === "2") {
                $("#userSchedule").text("Part time");
            } else {
            }
            //checking if the user is an accadamicstaff
            if (value.staff_categ === "1") {
                $("#usercate").text("Accdamic");
                $("#facultyline").removeClass('hide');
                $("#facultyline").addClass('show');
                $("#rankline").removeClass('hide');
                $("#rankline").addClass('show');
                $("#facultyDeparmline").removeClass('hide');
                $("#facultyDeparmline").addClass('show');
                $('#Ufaculty').append("<a href=''class='text-center float-right'>" + value.facultyname + "</a>");
                $('#userfacultyDeparment').append("<a href=''class='text-center float-right'>" + value.departmentname + "</a>");
                if (value.staff_position === "1") {
                    $("#userposition").text("Senior Member");
                    $("#promotioncurrentposit").val("Senior Member");
                    //checking the value for rank
                    if (value.staff_rank === "1") {
                        $("#userrank").text("Professor");
                    } else if (value.staff_rank === "2") {
                        $("#userrank").text("Associate Professor");
                    } else if (value.staff_rank === "3") {
                        $("#userrank").text("Senior lecturer");
                    } else if (value.staff_rank === "4") {
                        $("#userrank").text("Assistant lecturer");
                    } else {
                    }

                } else if (value.staff_position === "2") {
                    $("#userposition").text("Senior Staff");
                    $("#promotioncurrentposit").val("Senior Staff");
                    if (value.staff_rank === "1") {
                        $("#userrank").text("Chairman Research Assistant");
                    } else if (value.staff_rank === "2") {
                        $("#userrank").text("Principal Research Assistant");
                    } else if (value.staff_rank === "3") {
                        $("#userrank").text("Senior Research Assistant");
                    } else if (value.staff_rank === "4") {
                        $("#userrank").text("Research Assistant");
                    }
                    //staff rank else
                    else {
                    }
                    //staff position else
                } else {
                }


            }//checking for non accadamicstaff
            else if (value.staff_categ === "2") {
                $("#usercate").text("Non accdamic");
                //checking if you belong to a unit or department
                if (value.unit_id === null) {
                    $("#departmentline").removeClass('hide');
                    $("#departmentline").removeClass('show');
                    $('#Udepartment').append("<a href=''class='text-center float-right'>" + value.departmentname + "</a>");
                } else if (value.Did === null) {
                    $("#unitline").removeClass('hide');
                    $("#unitline").removeClass('show');
                    $('#userUnit').append("<a href=''class='text-center float-right'>" + value.unitname + "</a>");
                }
                //checking the unaccadamic staff position
                if (value.staff_position === "1") {
                    $("#userposition").text("Senior Member");
                    $("#promotioncurrentposit").val("Senior Member");
                } else if (value.staff_position === "2") {
                    $("#userposition").text("Senior Staff");
                    $("#promotioncurrentposit").val("Senior Staff");
                } else if (value.staff_position === "3") {
                    $("#userposition").text("Junior Staff");
                    $("#promotioncurrentposit").val("Junior Staff");
                } else {
                }

            }//checking for both acc and non acc staff.
            else if (value.staff_categ === "3") {
            } else {
            }



            //next of kin name
            $("#userKiname").text(value.kinName);
            $("#userKicontact").text(value.kinContact);
            $("#userKiemail").text("Unknow");
            $("#userKiaddress").text(value.kinAddress);
            $("#userKirelation").text("Unknow");
        });
    });
    $("#userFile").on("change", function () {
        var formdata = new FormData();
        var files = $('#userFile')[0].files;
        // Check file selected or not
        if (files.length > 0) {
            formdata.append('file', files[0]);
            formdata.append('action', "update-user-photo");
            $.ajax({
                url: 'Php/server.php',
                type: 'post',
                data: formdata,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response !== 0) {
                        $('#userFile').notify("upload sucessful", "success");
                        setInterval('location.reload(true)', 100);
                        location.reload(true);
                    } else {
                        $('#userFile').notify("upload Unsucessful", "Error");
                    }
                }
            });
        } else {
            $('#userFile').notify("Please Select an Image", "info");
        }
    });
    $("#Unewpass2").keyup(checkPasswordMatch);
    $("#changeUpassword").on("click", function () {
        var currentUpass = $("#currentUpass").val();
        var newUpass = $("#Unewpass").val();
        var newUpass2 = $("#Unewpass2").val();
        if ($("#currentUpass").val() !== "" || $("#Unewpass").val() !== "" || $("#Unewpass2").val() !== "") {
            if ($("Unewpass").val() === $("Unewpass2").val()) {
                $.post("Php/server.php", {
                    action: "update-user-password",
                    currentUpass: currentUpass,
                    newUpass: newUpass,
                    newUpass2: newUpass2
                }, function (data) {
                    if (data === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Password Changed Successful',
                            showConfirmButton: false
                        });
                        setInterval('location.reload(true)', 2000);
                    } else {
                        $("#currentUpass").notify("This password does not match the current password", "error");
                    }
                });
            } else {
                $("Unewpass").notify("Password does not match", "error");
                $("Unewpass2").notify("Password does not match", "error");
            }
        } else {

        }


    });
    //changing of th side bar color
    $("#sidebarcolor").on("change", function () {
        var sidecolor = $(this).val();
        var atribute = $(this).attr('name');
        $.post("Php/server.php", {
            action: "Change-sideC",
            sidecolor: sidecolor,
            atribute: atribute
        }, function (data) {
            if (data === "true") {
                $("#sidebarcolor").notify("Color changed sucessfully", "success");
                setInterval('location.reload(true)', 1000);
            }
        });
    });
    var uppy = Uppy.Core({autoProceed: true,
        restrictions: {
            autoProceed: false,
            note: 'Documnet only, 300kb or less',
            maxTotalFileSize: 30000000,
            maxNumberOfFiles: 1,
            minNumberOfFiles: 1,
            allowedFileTypes: ['.pdf', '.doc', '.docx']
        }
    });
    uppy.use(Uppy.Dashboard, {target: '#drag-drop-area', inline: true})
    uppy.use(Uppy.XHRUpload, {
        endpoint: 'http://localhost/FinalYearP/Php/uploadfunctions.php',
        fieldName: 'my_file'
    })
//   

    uppy.on('upload', (data) => {
//        console.log(data);
    })
    uppy.on('complete', (result) => {
        // Do something
    })
//    uppy.on('upload-success', (file, response) => {
//        const url = response.uploadURL
//        const fileName = file.name
//        console.log(fileName);
//    })
//    uppy.on('upload-success', (file, response) => {
//        const url = response.uploadURL
//        const fileName = file.name
//
//        const li = document.createElement('li')
//        const a = document.createElement('a')
//        a.href = url
//        a.target = '_blank'
//        a.appendChild(document.createTextNode(fileName))
//        li.appendChild(a)
//
//        document.querySelector('.uploaded-files ol').appendChild(li)
//    })



//    var uppy = Uppy.Core()
////     uppy = Uppy<Uppy.StrictTypes>();
//      .use(Uppy.Tus, {endpoint: 'https://tusd.tusdemo.net/files/'})
//            .use(Uppy.Dashboard, {
//                inline: true,
//                id: 'uppy',
//                target: '#drag-drop-area',
//                theme: 'light',
//                allowMultipleUploads: false,
//                maxFileSize: 300000,
//                maxNumberOfFiles: 1,
//              
//               
//                restrictions: {
//                      autoProceed:true,
//                     note: 'Documnet only, 300kb or less',
//                    maxTotalFileSize: 300,
//                    maxNumberOfFiles: 1,
//                    minNumberOfFiles: 1,
//                    allowedFileTypes: ['video/*', '.pdf'],
//                },
//
//            });

//            .use(Uppy.Dashboard, {
//                inline: true,
//                target: '#drag-drop-area',
//                autoProceed: true,
//                allowMultipleUploads: false,
//                debug: false,
//                restrictions: {
//                    maxTotalFileSize: 300,
//                    maxNumberOfFiles: 1,
//                    minNumberOfFiles: null,
//                    allowedFileTypes: ['video/*', '.pdf'],
//                },
//                meta: {},
//                onBeforeFileAdded: (currentFile, files) => currentFile,
//                onBeforeUpload: (files) => {
//                },
//                locale: {},
//                infoTimeout: 5000
//            });


//    uppy.on('upload-success', function (file, response) {
//        var url = response.uploadURL
//        var fileName = file.name
//        var file = file;
//        console.log(file);
//    });
//    uppy.on('complete', (result) => {
//        console.log('Upload complete! We’ve uploaded these files:', result.successful);
//    });
//$("#but_upload").click(function(){
//
//  var fd = new FormData();
//  var files = $('#file')[0].files[0];
//  fd.append('file',files);
//  fd.append('request',1);
//  fd.append('action', "upload-CV");
//
//  // AJAX request
//  $.ajax({
//   url: 'Php/server.php',
//   type: 'post',
//   data: fd,
//   contentType: false,
//   processData: false,
//   success: function(response){
//     if(response != 0){
//         console.log(response);
//       var count = $('.container .content').length;
//       count = Number(count) + 1;
//
//       // Show image preview with Delete button
//       $('.container').append("<div class='content' id='content_"+count+"' ><img src='"+response+"' width='100' height='100'><span class='delete' id='delete_"+count+"'>Delete</span></div>");
//     }else{
//       alert('file not uploaded');
//     }
//   }
//  });
// });
//
// // Remove file
// $('.container').on('click','.content .delete',function(){
// 
//  var id = this.id;
//  var split_id = id.split('_');
//  var num = split_id[1];
//
//  // Get image source
//  var imgElement_src = $( '#content_'+num+' img' ).attr("src");
//  var deleteFile = confirm("Do you really want to Delete?");
//  if (deleteFile == true) {
//      // AJAX request
//      $.ajax({
//        url: 'addremove.php',
//        type: 'post',
//        data: {path: imgElement_src,request: 2},
//        success: function(response){
//           // Remove
//           if(response == 1){ 
//              $('#content_'+num).remove(); 
//           } 
//        } 
//      }); 
//   } 
// }); 

//$("#cvupload").fileupload({
//    url:'index.php',
//    dropZone:'#dropZone',
//    dataType: 'json',
//    autoUpload: false
//}).on('fileuploadadd',function (e,data){
//    var fileTypeAllowed = /.\.(doc|docx|pdf)$/i;
//    var fileName=data.originalFiles[0]['name'];
//    var fileSize=data.originalFiles[0]['size'];
//    
//    if(!fileTypeAllowed.test(fileName)){
//        $.notify("this file is not allowed","error");
//    }
//    else if(fileSize>500000){
//        $.notify("this file size is above 500kb","error");
//    }
//    else{
//        
//        data.submit();
//                var formdata = new FormData();
//                var files = $('#cvupload')[0].files;
////                console.log(files);
//        // Check file selected or not
//            formdata.append('file', files);
//            formdata.append('action', "upload-CV");
//            $.ajax({
//                url: 'Php/server.php',
//                type: 'post',
//                data: formdata,
//                contentType: false,
//                processData: false,
//                success: function (response) {
//                    console.log(response);
////                    if (response != 0) {
////                        $('#file').notify("upload sucessful", "success");
////                        setInterval('location.reload(true)', 100);
////                        location.reload(true);
////                    } else {
////                        $('#file').notify("upload Unsucessful", "Error");
////                    }
//                }
//            });
//    
//}
//}).on('fileuploaddone',function(e,data){
//
//
//}).on('fileuploadprogressall',function(e,data){
//console.log(data);
//var progress = parseInt(data.loaded / data.total *100,10);
//$("#progress").html("Completed: "+progress+"%");
//
//});







});
function checkPasswordMatch() {
    var password = $("#Unewpass").val();
    var confirmPassword = $("#Unewpass2").val();
    if (password != confirmPassword) {
        $("#Unewpass").notify("Password does not match", "error");
        $("#Unewpass2").notify("Password does not match", "error");
    } else {
        $("#Unewpass").notify("Password match", "success");
        $("#Unewpass2").notify("Passwords match", "success");
    }
}