<?php

//include './session.php';
//echo "My first PHP script!";
session_start();
$empid = $_SESSION['user'];
include '../admin/Php/dbManager.php';
switch ($_POST['action']) {
    case"Usign-in";
        $email = $_POST['email'];
        $password = $_POST['password'];
        $log = executequery("SELECT * FROM employees WHERE email = '$email'");
        if ($log->num_rows > 1) {
            print_r(json_encode(false));
        } else if ($log->num_rows === 1) {
            while ($row = $log->fetch_assoc()) {
                //checking if the password matches the db one
                if ($row["pass_word"] == hash('sha512', $password)) {
                    //update the last login of the user
                    $userid = $row['employeeid'];
                    $currentdatetime = date('M d, Y - g:i A', time());
                    $onlinestatus = 1;
                    $update = executequery("UPDATE employees set lastlogin='$currentdatetime' where employeeid='$userid'");
                    $online = executequery("UPDATE employees set online='$onlinestatus' where employeeid='$userid'");
                    //session start. 
//                    session_start();
                    $_SESSION['user'] = $userid;
                    $fetch = executequery("select per.Pstatus,employeeid, (select lin.name from link lin where lin.Lid=per.Lid)as linkname,"
                            . "(select lin.icon from link lin where lin.Lid=per.Lid)as linkicon,"
                            . "(select lin.extention from link lin where lin.Lid=per.Lid)as linkextention"
                            . " from permission per where employeeid='$userid'");
//                    print_r(json_encode($fetch));
//                    FetchResult($fetch);
//                    print_r(json_encode(array("true",FetchResult($fetch))));
//                    $values = array();
//                    while ($row = $fetch->fetch_assoc()) {
//                        array_push($values, $row);
//                    }
//                    $links = $values;
//                    print_r(json_encode(array(
//                        'obj_1' => "true",
//                        'obj_2' => $links,
////                        'obj_2' => print_r(json_encode($values)),
//                    )));
                    print json_encode((true));
                } else {
                    print_r(json_encode(false));
                }
            }
        } else {
            
        }
        break;
    case "Retrive-user-leave";
        $empid;
        $retrive = executequery("SELECT * FROM employeeleave where employeeid='$empid'");
        FetchResult($retrive);
        break;
    case "Retrive-user-deatils";
        $empid;
        $retrive = executequery("select emp.`employeeid`, `employeeStatus`, `firstname`, `lastname`, `middlename`, `username`, `pass_word`, `gender`, `place_of_birth`,
            `Hometown`, `marital_status`, `dob`, `address`, `contact`, `email`, `photo`, `reg_date`, `lastlogin`, `religion`, `unit_id`, `Fid`, `Did`, `online`, `staff_categ`, 
            `staff_position`, `staff_rank`, `staff_schedule`,`foldername`,`kinName`, `kinAddress`, `kinContact`, `conStatus`, `contractStart`, 
            `contractEnd`, `contractDays`, `MacAddress`, `AnnualLeave`, `remaingLeave`, `side`, 
         (select fac.fname from faculty fac where fac.Fid=emp.Fid) as facultyname,
	(select dep.Dname from department dep where dep.Did=emp.Did) as departmentname,
	(select un.unit_name from unit un where un.unit_id=emp.unit_id) as unitname
		from employees emp 
			where emp.employeeid ='$empid'");
        FetchResult($retrive);
//        $retrive = executequery("select emp.employeeid,firstname,lastname,middlename,contact,email,
//          staff_label,staff_categ,staff_position,staff-rank,photo,gender,Fid,Did,unit_id,dob,place_of_birth,
//          marital_status,religion,Hometown,address,contractStart,contractEnd,contractDays,kinName,kinAddress,kinContact,AnnualLeave,remaingLeave, 
//         (select fac.fname from faculty fac where fac.Fid=emp.Fid) as facultyname,
//	(select dep.Dname from department dep where dep.Did=emp.Did) as departmentname,
//	(select un.unit_name from unit un where un.unit_id=emp.unit_id) as unitname
//		from employees emp 
//			where emp.employeeid ='$empid'");
//        print_r(json_encode($retrive));

        break;
    case "update-user-photo";
        $empid;
        $target_dir = "../img/upload/";
        $fileName = basename($_FILES["file"]["name"]);
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $targetFilePath = $target_dir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $image = file_get_contents($_FILES["file"]["tmp_name"]);
        $encodedimage = base64_encode($image);
        $base64photo = "data:image/" . $fileType . ";base64, " . $encodedimage;
        print_r(json_encode($fileType));
        print_r(json_encode($base64photo));
        $result = executequery("UPDATE employees SET photo= '$base64photo' WHERE employeeid='$empid'");
        break;
    case "update-user-password";
        $currentUpassword = $_POST['currentUpass'];
        $newUpass = $_POST['newUpass'];
        $newUpass2 = $_POST['newUpass2'];
        $checkpassword = executequery("SELECT pass_word FROM employees WHERE employeeid='$empid'");
        while ($row = $checkpassword->fetch_assoc()) {
            $row["pass_word"];
            if ($row["pass_word"] == md5($currentUpassword)) {
                if ($newUpass == $newUpass2) {
                    $new = md5($newUpass);
                    $update = executequery("UPDATE employees set pass_word='$new' WHERE employeeid='$empid' ");
                    print_r(json_encode($update));
                } else {
                    exit();
                }
            } else {
                print_r(json_encode(false));
            }
        }
        break;
    case "Retrieve-permission";

        $fetch = executequery("select per.Pstatus,employeeid, (select lin.name from link lin where lin.Lid=per.Lid)as linkname,"
                . "(select lin.icon from link lin where lin.Lid=per.Lid)as linkicon,"
                . "(select lin.extention from link lin where lin.Lid=per.Lid)as linkextention"
                . " from permission per where employeeid='$empid'");
        if ($fetch->num_rows < 1) {
            print_r(json_encode(false));
        } elseif ($fetch->num_rows >= 1) {
            FetchResult($fetch);
        } else {
            
        }
        break;
    case "Retrieve-user-memo";
        $result = executequery("SELECT * FROM table_events");
        FetchResult($result);
        break;
    case "user-leave-request";
        $UcontractL = $_POST['UcontractL'];
        $Uleavetype = $_POST['Uleavetype'];
        $Uleavestart = $_POST['Uleavestart'];
        $Uleaveend = $_POST['Uleaveend'];
        $Uleaveday = $_POST['Uleaveday'];
        $Uleavereason = $_POST['Uleavereason'];
        $retrive = executequery("select firstname,lastname,email,AnnualLeave,remaingLeave,Fid,unit_id from employees where employeeid='$empid'");
        $annualleave = "";
        $facultyid = "";
        $unitid = "";
        $email = "";
        while ($row = $retrive->fetch_assoc()) {
//            print_r(json_encode($row["AnnualLeave"]-$Uleaveday));
            $annualleave = $row["AnnualLeave"];
            $facultyid = $row["Fid"];
            $unitid = $row["unit_id"];
            $email = $row["email"];
        }
        $remainingleave = $annualleave - $Uleaveday;
        $update = executequery("UPDATE employees SET remaingLeave= '$remainingleave' where employeeid='$empid'");
        if ($update === true) {
//           print_r(json_encode($update));
            $status = 0;
            $insert = executequery("INSERT INTO `employeeleave`(`leavetype`, `leavecontact`, `leaveemail`, `description`, `starting_date`, `ending_date`, `ndays`, `status`, `employeeid`, `unit_id`, `Fid`)"
                    . " VALUES ('$Uleavetype','$UcontractL','$email','$Uleavereason','$Uleavestart','$Uleaveend','$Uleaveday','$status','$empid','$unitid','$facultyid')");
            if ($insert === true) {
                print json_encode((true));
            } else {
                print_r(json_encode(false));
            }
        } elseif ($update !== true) {
            print_r(json_encode(false));
        } else {
            print_r(json_encode(false));
        }
//        $insert = executequery($query);
        break;
    case"Retrieve-leave";
        $retrive = executequery("select firstname,lastname,Fid from employees where employeeid='$empid'");
        $firstname = "";
        $lastname = "";
        $Fid = "";

        while ($row = $retrive->fetch_assoc()) {
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $Fid = $row["Fid"];
        }
        $result = executequery("select lea.id,`leavetype`,`leavecontact`,`leaveemail`,`description`,`starting_date`,`ending_date`,`ndays`,employeeid,status,
               (select emp.firstname from employees emp where emp.employeeid=lea.employeeid) as Efirstname,
               (select emp.lastname from employees emp where emp.employeeid=lea.employeeid) 
               as Elastname from employeeleave lea where Fid='$Fid' AND status = 0 ");
//           print_r(json_encode($result));
        FetchResult($result);
        break;
    case"retrive-selected-leave";
        $employeeid = $_POST['id'];
        $result = executequery("select lea.id,`leavetype`,employeeid,`leavecontact`,`leaveemail`,`description`,`starting_date`,`ending_date`,`ndays`,
               (select emp.firstname from employees emp where emp.employeeid=lea.employeeid) as Efirstname,
               (select emp.lastname from employees emp where emp.employeeid=lea.employeeid)as Elastname,
                (select emp.remaingLeave from employees emp where emp.employeeid=lea.employeeid)as Eremainingleave,
                 (select emp.AnnualLeave from employees emp where emp.employeeid=lea.employeeid)as Eannuanlleave
               from employeeleave lea where employeeid='$employeeid'");
        FetchResult($result);
        break;
    case "approveleave";
        $leaveid = $_POST['leaveid'];
        $retrive = executequery("select firstname,lastname,Fid from employees where employeeid='$empid'");
        $name = "";
        while ($row = $retrive->fetch_assoc()) {
            $name = $row["firstname"] . ' ' . $row["lastname"];
        }
        $status = 1;
        $approval = executequery("update employeeleave set status='$status',approveBY='$name' where id='$leaveid'");
        print_r(json_encode($approval));
        break;
    case "rejectleave";
        $leaveid = $_POST['leaveid'];
        $retrive = executequery("select firstname,lastname,Fid from employees where employeeid='$empid'");
        $name = "";
        while ($row = $retrive->fetch_assoc()) {
            $name = $row["firstname"] . ' ' . $row["lastname"];
        }
        $status = 2;
        $reject = executequery("update employeeleave set status='$status',approveBY='$name' where id='$leaveid'");
        print_r(json_encode($reject));
        break;
    case "Retrieve-staff";
        $retrive = executequery("select Fid from employees where employeeid='$empid'");
        $facultyid = "";
        while ($row = $retrive->fetch_assoc()) {
            $facultyid = $row["Fid"];
        }
        $result = executequery("select emp.employeeid,firstname,lastname,middlename,contact,username,email,staff_categ,staff_position,staff-rank,staff_schedule,photo,gender,Fid,Did,unit_id,dob,place_of_birth,marital_status,religion,Hometown,address,contractStart,contractEnd,contractDays,kinName,kinAddress,kinContact,AnnualLeave,remaingLeave, 
         (select fac.fname from faculty fac where fac.Fid=emp.Fid) as facultyname 
		from employees emp 
			where emp.Fid ='$facultyid'");
        FetchResult($result);
        break;
    case "Retrieve-selected-staff";
        $employeeid = $_POST['employeeid'];
        $retrive = executequery("select Fid from employees where employeeid='$empid'");
        $facultyid = "";
        while ($row = $retrive->fetch_assoc()) {
            $facultyid = $row["Fid"];
        }
        $result = executequery("select emp.employeeid,firstname,lastname,middlename,contact,username,email,staff_label,staff_cate,staff_schedule,photo,gender,Fid,unit_id,dob,place_of_birth,marital_status,religion,Hometown,address,contractStart,contractEnd,contractDays,kinName,kinAddress,kinContact,AnnualLeave,remaingLeave, 
         (select fac.fname from faculty fac where fac.Fid=emp.Fid) as facultyname 
		from employees emp 
			where emp.employeeid ='$employeeid' AND Fid = '$facultyid'");
        FetchResult($result);
        break;
    case "Addnew-leave";
        $leavereson = $_POST['employeeLR'];
        $leavestart = $_POST['employeeLS'];
        $leaveend = $_POST['newLeaveEnd'];
        $leavedays = $_POST['newLeavedays'];
        $employeeLC = $_POST['employeeLC'];
        $employeeLE = $_POST['employeeLE'];
        $employeeLU = $_POST['employeeLU'];
        $leavetype = $_POST['leavetype'];
        $employeeid = $_POST['employeeid'];
        $status = 0;
        $result = executequery("INSERT INTO `employeeleave`(`leavetype`, `leavecontact`, `leaveemail`, `description`, `starting_date`, `ending_date`, `ndays`, `status`, `employeeid`, `Fid`, `active`) "
                . "VALUES ('$leavetype','$employeeLC','$employeeLE','$leavereson','$leavestart','$leaveend','$leavedays','$status','$employeeid','$employeeLU','$status')");
        print_r(json_encode($result));
        break;
    case "retrive-sidebarC";
        $retrive = executequery("select `side` from employees where employeeid = '$empid'");
//                print_r(json_encode($retrive));
        FetchResult($retrive);
        break;
    case"Change-sideC";
        $sidecolor = $_POST['sidecolor'];
        $atribute = $_POST['atribute'];
        $update = executequery("update employees set side = '$sidecolor' where employeeid='$empid'");
        print_r(json_encode($update));
        break;
    case "pageaccesscheck";
        $employeeid = $_POST['empid'];
        $pagename = $_POST['pagename'];
        $linkid = executequery("select Lid from link where name='$pagename'");
        $Lid = "";
        while ($row = $linkid->fetch_assoc()) {
            $Lid = $row["Lid"];
        }
        $access = executequery("select Pstatus from permission where Lid='$Lid' and employeeid='$employeeid'");
        if ($access->num_rows > 0) {
            $Pstatus = "";
            while ($row = $access->fetch_assoc()) { //are you done? yes. is it working
                $Pstatus = $row["Pstatus"];
            }
            print_r(json_encode($Pstatus));
        } else {
            print_r(json_encode("2"));
        }
        break;
//    case "upload-CV";
//       $request = $_POST['request'];
//// Upload file
//if($request == 1){
//     $filename = $_FILES['file']['name'];
//    /* Location */
//    $location = "../upload/cvfiles/".$filename;
//    $uploadOk = 1;
//    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
//
//    // Check document format
//    if($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf") {
//         $uploadOk = 0;
//    }
//    if($uploadOk == 0){
//        print_r(json_decode(0));
//    }else{
//         /* Upload file */
//         if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
//                print_r(json_decode($location));
//         }else{
//                print_r(json_decode(0));
//         }
//    }
//    exit;
//}
//
//// Remove file
//if($request == 2){
//
//    $path = $_POST['path'];
//    $return_text = 0;
//
//    // Check file exist or not
//    if( file_exists($path) ){
//       // Remove file
//       unlink($path);
//     
//       // Set status
//       $return_text = 1;
//    }else{
//       // Set status
//       $return_text = 0;
//    }
//
//    // Return status
//    echo $return_text;
//    exit;
//} 
//        break;

    case"retrive-vacancy";
        $reteive = executequery("select * from vancancy");
        FetchResult($reteive);
        break;
    case"request-promotion";
        $promotiontitle = $_POST['promotiontitle'];
//        $currentposition = $_POST['promotioncurrentposit'];
        $promotionDetails = $_POST['promotiondetails'];
        $insert= executequery("INSERT INTO `promotion`(`employeeid`, `promotiontitle`, `Promotiondetails`) "
                . "VALUES ('$empid','$promotiontitle','$promotionDetails')");
        print_r(json_encode($insert));
//        $retrive = executequery("select firstname,lastname,`middlename`,contact,email,foldername from employees where employeeid='$empid'");
//         $name='';
//         $contact='';
//         $email='';
//         $foldername = '';
//        while ($row = $retrive->fetch_assoc()) {
//            $name = $row['firstname'].$row['lastname'].$row['middlename'];
//             $contact = $row['contact'];
//              $email = $row['email'];
//              $foldername = $row['foldername'];
//        }
//        $regdate = date('Y-m-d H:i:s');
//        $target_dir = "../upload/$foldername/prmotion$regdate";
////        file_put_contents($target_dir, $currentposition);
//        $file = 'promotion.txt';
//        file_put_contents($file, $prmotionDetails);
       

        break;
    case"retrive-promotion";
        $retrive= executequery("select * from promotion where employeeid='$empid'");
        FetchResult($retrive);
        break;
    
        case "checking-mail";
            $Email = $_POST['Email'];
              print_r(json_encode($Email));
//            $check= executequery("select email from employees where email='$Email'");
            if ($check->num_rows > 0) {
//                print_r(json_encode("Email already exit in the system"));
            }else{
//                print_r(json_encode(true));
            }
            break;
}

//Declared a function to process the query from an object to an array.
function FetchResult($Fetch) {
    $values = array();
    while ($row = $Fetch->fetch_assoc()) {
        array_push($values, $row);
    }
    return print_r(json_encode($values));
}
