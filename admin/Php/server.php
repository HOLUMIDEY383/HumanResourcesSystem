<?php

//echo "My first PHP script!";
include './dbManager.php';
//require_once './mailer.php';
session_start();
$adminid = $_SESSION['admin'];
switch ($_POST['action']) {
    case "update-photo";
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
        $result = executequery("UPDATE admin SET base64photo= '$base64photo' WHERE id = 1");
//        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $_FILES['file']['name'])) {
//            $uploadedFile = $fileName;
//           
//        }

        break;
    case "sign-in";
//        session_start();
        $username = $_POST['email'];
        $password = $_POST['password'];
        $log = executequery("SELECT * FROM admin WHERE username = '$username'");
        if ($log->num_rows < 1) {
            print_r(json_encode(false));
        } else {
            while ($row = $log->fetch_assoc()) {
                $row["pass_word"];
                if ($row["pass_word"] == md5($password)) {
                    $id = $row['id'];
                    $currentdatetime = date('M d, Y - g:i A', time());
                    $onlinestatus = 1;
//                    session_start();
                    $_SESSION['admin'] = $id;
                    $update = executequery("UPDATE admin set lastlogin='$currentdatetime' where id='$id'");
                    $online = executequery("UPDATE admin set onlineS ='$onlinestatus' where id='$id'");
                    //geting ip address of the system trying to login in;
                    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
                        $ip = $_SERVER["HTTP_CLIENT_IP"];
                    } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                    } else {
                        $ip = $_SERVER["REMOTE_ADDR"];
                    }
                    $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                    $ipup = executequery("update admin set ipaddress='$ip'");
                    $logs = executequery("INSERT INTO `logs`(`adminid`,`ipaddress`, `hostname`) VALUES ('$id','$ip','$host')");
                    print_r(json_encode(true));
                    createFolder("faruqnew");
                } else {
                    print_r(json_encode(false));
                }
            }
        }
        //        header('location: index.php');
        break;

    case "Retrieve-complains";
        $result = executequery("SELECT complains.id,description,sentdate, employees.firstname,lastname, unit.unit_name FROM complains INNER JOIN employees ON complains.employeeid = employees.employeeid"
                . " JOIN unit ON complains.unit_id = unit.unit_id where status = 0");
        FetchResult($result);
        //        $values = array();
        //        while ($row = $result->fetch_assoc()) {
        //            array_push($values, $row);
        //        }
        //        print_r(json_encode($values));
        break;
    case "Retrieve-leave";
        $result = executequery("SELECT * from employeeleave INNER JOIN employees ON employeeleave.id = employees.employeeid"
                . " JOIN unit ON employeeleave.unit_id = unit.unit_id where status=0");
        //        $result = executequery("SELECT employeeleave.id,leavetype,description,status,starting_date,ending_date,ndays, employees.firstname,lastname,AnnualLeave, unit.unit_name FROM employeeleave INNER JOIN employees ON employeeleave.id = employees.employeeid "
        //                . "JOIN unit ON employeeleave.unit_id = unit.unit_id where status=1 ");
        FetchResult($result);
        break;
    case "approveleave";
        $leaveid = $_POST['leaveid'];
        echo $leaveid;
        print_r($leaveid);
        $approve = 1;
        $active = 1;

        $result = executequery("UPDATE `employeeleave` SET `status`= '$approve',active = '$active' WHERE id='$leaveid'");
        break;
    case "rejectleave";
        $leaveid1 = $_POST['leaveid1'];
        $approve = 2;
        $active = 0;

        $result = executequery("UPDATE `employeeleave` SET `status`= '$approve', active = '$active' WHERE id='$leaveid1'");
        break;

    case "Retrieve-leavehistory";
        $result = executequery("SELECT employeeleave.id,leavetype,description,leaveemail,status,leavecontact,starting_date,ending_date, employees.firstname,lastname, unit.unit_name FROM employeeleave INNER JOIN employees ON employeeleave.id = employees.employeeid "
                . "JOIN unit ON employeeleave.unit_id = unit.unit_id where status !=0");
        FetchResult($result);
        //        $values = array();
        //        while ($row = $result->fetch_assoc()) {
        //            array_push($values, $row);
        //        }
        //        print_r(json_encode($values));
        break;

    case "Retrieve-totalemp";
        $result = executequery("SELECT COUNT(*) FROM employees;");
        while ($row = $result->fetch_assoc()) {
            print_r(json_encode($row));
        }
        break;

    case "Retrieve-totalleave";
        $result = executequery("SELECT COUNT(*) FROM employeeleave where active = 1;");
        while ($row = $result->fetch_assoc()) {
            print_r(json_encode($row));
        }
        break;

    case "Retrieve-unsolvedcomplain";
        $result = executequery("SELECT COUNT(*) FROM complains where status = 0;");
        while ($row = $result->fetch_assoc()) {
            print_r(json_encode($row));
        }
        break;

    case "Retrieve-staff";
        $result = executequery("select emp.employeeid,employeeStatus,firstname,lastname,middlename,contact,email,`staff_categ`, `staff_position`, `staff_rank`,gender,
            (select fac.Fname from faculty fac where fac.Fid=emp.Fid) as facultyname, 
            (select dep.Dname from department dep where dep.Did=emp.Did) as deparmentname, 
                (select un.unit_name from unit un where un.unit_id=emp.unit_id) as unitname 
                from employees emp");
        //        $result = executequery("SELECT employees.employeeid,firstname,lastname,middlename,contact,email,staff_label,gender,unit.unit_name,faculty.Fname,Fsname FROM employees"
        //                . " INNER JOIN unit ON employees.unit_id = unit.unit_id  JOIN faculty ON employees.Fid = faculty.Fid");
        FetchResult($result);

        break;
    case "Retrieve-accademic-staff";
        $result = executequery("select emp.employeeid,firstname,lastname,middlename,contact,email,`staff_categ`, `staff_position`, `staff_rank`,gender,
            (select fac.fname from faculty fac where fac.Fid=emp.Fid) as facultyname 
                from employees emp where Fid IS NOT NULL");
        //        $result = executequery("SELECT employees.employeeid,firstname,lastname,middlename,contact,email,staff_label,gender,unit.unit_name,faculty.Fname,Fsname FROM employees"
        //                . " INNER JOIN unit ON employees.unit_id = unit.unit_id  JOIN faculty ON employees.Fid = faculty.Fid");
        FetchResult($result);

        break;

    case "Retrieve-userinfo";
        $result = executequery("SELECT * FROM admin");
        FetchResult($result);
        //        $values = array();
        //        while ($row = $result->fetch_assoc()) {
        //            array_push($values, $row);
        //        }
        //        print_r(json_encode($values));
        break;
    case "Reply-complains";
        $Fmessage = $_POST['Fmessage'];
        $complainid = $_POST['complainid'];
        $status = 1;
        $result = executequery("INSERT INTO notification(message, complainid) VALUES ('$Fmessage','$complainid')");
        $result2 = executequery("UPDATE `complains` SET `status`= '$status' WHERE id='$complainid'");
        break;
    case "Retrieve-unit";
        $result = executequery("SELECT * from unit JOIN employees ON unit.unit_head=employees.employeeid");
        FetchResult($result);

        break;
    case "insert-unit";
        $unitname = $_POST['unitname'];
        $unitshortname = $_POST['unitshortname'];
        $result = executequery("INSERT INTO unit(unit_name, unit_short_name) VALUES ('$unitname','$unitshortname')");
        break;
    case "edit-unit-value";
        $unitid = $_POST['unitid'];
        $result = executequery("SELECT * FROM unit where unit_id='$unitid'");
        $values = array();
        while ($row = $result->fetch_assoc()) {
            array_push($values, $row);
        }
        print_r(json_encode($values));
        break;
    case "edit-unit";

        $unitid = $_POST['unitid'];
        $editunitname = $_POST['editunitname'];
        $editunitshortname = $_POST['editunitshortname'];
        $result = executequery("UPDATE `unit` SET `unit_name`= '$editunitname', unit_short_name='$editunitshortname' WHERE unit_id='$unitid' ");
        break;

    case "delete-unit";
        $unitid1 = $_POST['unitid1'];
        $result = executequery("DELETE FROM `unit` WHERE unit_id= '$unitid1'");
        break;
    case "Retrieve-activeuser";
        $result = executequery("SELECT * FROM employees where online = 1");
        FetchResult($result);
        //        $values = array();
        //        while ($row = $result->fetch_assoc()) {
        //            array_push($values, $row);
        //        }
        //        print_r(json_encode($values));
        break;

    case "Retrieve-selected-staff";
        $employeeid = $_POST['employeeid'];
        $result = executequery("select emp.employeeStatus,firstname,lastname,middlename,contact,email,`staff_categ`, `staff_position`, `staff_rank`,staff_schedule,photo,gender,Fid,unit_id,dob,place_of_birth,marital_status,religion,Hometown,address,contractStart,contractEnd,contractDays,kinName,kinAddress,kinContact,AnnualLeave,reg_date,
            (select fac.Fname from faculty fac where fac.Fid=emp.Fid) as facultyname, 
            (select dep.Dname from department dep where dep.Did=emp.Did) as departmentname, 
                (select un.unit_name from unit un where un.unit_id=emp.unit_id) as unitname 
                from employees emp 
                where emp.employeeid ='$employeeid'");
        //        $result = executequery("select emp.firstname,lastname,middlename,contact,email,staff_label,staff_cate,staff_schedule,photo,gender,dob,place_of_birth,marital_status,religion,Hometown,address,contractStart,contractEnd,contractDays,kinName,kinAddress,kinContact,AnnualLeave,
        //            (select fac.Fid,fsname from faculty fac where fac.Fid=emp.Fid) as facultyname, 
        //	(select un.unit_id,unit_short_name from unit un where un.unit_id=emp.unit_id) as unitname 
        //		from employees emp where emp.employeeid ='9'");
        //        $result = executequery("SELECT employees.employeeid,firstname,lastname,middlename,contact,email,staff_label,photo,gender,dob,place_of_birth,marital_status,religion,Hometown,"
        //                . "staff_label,address,contractStart,contractEnd,contractDays,kinName,kinAddress,kinContact,AnnualLeave,"
        //                . "unit.unit_id,unit_short_name,unit_name,faculty.Fid,Fname,Fsname FROM employees"
        //                . " INNER JOIN unit ON employees.unit_id = unit.unit_id  JOIN faculty ON employees.Fid = faculty.Fid where employeeid='$employeeid' ");
        if ($result->num_rows > 0) {
            FetchResult($result);
        } else {
            print_r(json_encode(false));
        }

        break;
    case "Reset-leave";
        $leaveid2 = $_POST['leaveid2'];
        $active = 0;
        $result = executequery("UPDATE `employeeleave` SET active = '$active' WHERE id='$leaveid2'");
        break;

    case "Retrieve-memo";
        $result = executequery("SELECT * FROM table_events");
        FetchResult($result);
        break;
    case "insert-memo";
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $color = $_POST['color'];
        $status = 1;
        $result = executequery("INSERT INTO `table_events`( `title`, `start`, `end`, `status`,`color`) VALUES ('$title','$start','$end','$status','$color')");
        break;
    case "edit-memo";
        $id = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $result = executequery("UPDATE `table_events`SET title='$title', start ='$start',end='$end' where id = '$id'");
        break;
    case "delete-memo";
        $eventid = $_POST['eventid'];
        $result = executequery("DELETE FROM `table_events` where id = '$eventid'");
        break;
    case "edit-memo-date";
        $eventid = $_POST['eventid'];
        $editeventstart = $_POST['editstart'];
        $editeventend = $_POST['editend'];
        $editeventcolor = $_POST['editcolor'];
        $editeventtitle = $_POST['edittitle'];
        $result = executequery("UPDATE `table_events`SET title='$editeventtitle', start ='$editeventstart',end='$editeventend',color='$editeventcolor' where id = '$eventid'");
        print_r($result);
        break;

    case "Retrive-Notification";
        //        $update= executequery("UPDATE comments SET comment_status=1 WHERE comment_status=0");
        $result = executequery("SELECT * FROM comments ORDER BY comment_id DESC LIMIT 5");
        FetchResult($result);
        break;
    case "Insert-Companyname";
        $companyname = $_POST['companyname'];
        $parse = parse_ini_file('companyname.ini', FALSE, INI_SCANNER_RAW);
        $companyname = $parse['Company-Name'];
        break;
    case "changepassword";
        $adminid = $_POST['adminid'];
        $currentpassword = $_POST['currentpassword'];
        $newpassword = $_POST['newpassword'];
        $newpassword2 = $_POST['newpassword2'];
        $result = executequery("SELECT * FROM admin where id = '$adminid'");
        while ($row = $result->fetch_assoc()) {
            $row["pass_word"];
            if ($row["pass_word"] == md5($currentpassword)) {
                if ($newpassword == $newpassword2) {
                    $new = md5($newpassword);
                    $update = executequery("UPDATE admin set pass_word='$new'");
                    print_r(json_encode($update));
                } else {
                    exit();
                }
            } else {
                print_r(json_encode(false));
            }
        }
        break;
    case "Addacademicstaff";
        $firstname = $_POST['empfirstname'];
        $lastname = $_POST['emplastname'];
        $middlename = $_POST['empmiddlename'];
        $contact = $_POST['empcontact'];
        $email = $_POST['empemail'];
        $dob = $_POST['empdob'];
        $placeofbirth = $_POST['empplaceofbirth'];
        $hometown = $_POST['emphometown'];
        $address = $_POST['empaddress'];
        $gender = $_POST['empgender'];
        $faculty = $_POST['faculty'];
        $facultydepartment = $_POST['facultydepartment'];
        $staffcat = $_POST['staffcategorie'];
        $schedule = $_POST['staffschedule'];
        $position = $_POST['staffposition'];
        $rank = $_POST['staffrank'];
        $Marital = $_POST['empmarital'];
        $religion = $_POST['empreligion'];
        $regdate = date('Y-m-d H:i:s');
        $username = 'name';
        $password = md5(generateStrongPassword());
        $side = 1;
        $active = 1;
        $fodername = $firstname . $dob;
        $photo = "data:image/png;base64,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";
        $result = executequery("INSERT INTO `employees`(employeeStatus,`firstname`, `lastname`, `middlename`, `username`, `pass_word`, `gender`, `place_of_birth`, `Hometown`, `marital_status`, `dob`, `address`, `contact`, `email`, `photo`, `reg_date`, `religion`,`Fid`, `Did`,`staff_categ`, `staff_position`, `staff_rank`, `staff_schedule`,`side`,`foldername`) "
                . "VALUES ('$active','$firstname','$lastname','$middlename','$username','$password','$gender','$placeofbirth','$hometown','$Marital','$dob','$address','$contact','$email','$photo','$regdate','$religion','$faculty','$facultydepartment','$staffcat','$position','$rank','$schedule','$side','$fodername')");
        print_r(json_encode($result));
        createFolder($fodername);

        break;
    case "AddnonacademicDepartmentstaff";
        $firstname = $_POST['empfirstname'];
        $lastname = $_POST['emplastname'];
        $middlename = $_POST['empmiddlename'];
        $contact = $_POST['empcontact'];
        $email = $_POST['empemail'];
        $dob = $_POST['empdob'];
        $placeofbirth = $_POST['empplaceofbirth'];
        $hometown = $_POST['emphometown'];
        $address = $_POST['empaddress'];
        $gender = $_POST['empgender'];
        $department = $_POST['department'];
        $staffcat = $_POST['staffcategorie'];
        $schedule = $_POST['staffschedule'];
        $position = $_POST['addempPosition'];
        $Marital = $_POST['empmarital'];
        $religion = $_POST['empreligion'];
        $regdate = date('Y-m-d H:i:s');
        $username = 'name';
        $password = generateStrongPassword();
        $hashedpassword = hash('sha512', $password);
        $side = 1;
        $active = 1;
        $fodername = $firstname . $dob;
        $photo = "data:image/png;base64,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";
        $result = executequery("INSERT INTO `employees`(employeeStatus,`firstname`, `lastname`, `middlename`, `username`, `pass_word`, `gender`, `place_of_birth`, `Hometown`, `marital_status`, `dob`, `address`, `contact`, `email`, `photo`, `reg_date`, `religion`,`Did`,`staff_categ`, `staff_position`,`staff_schedule`,`side`,`foldername`) "
                . "VALUES ('$active','$firstname','$lastname','$middlename','$username','$hashedpassword','$gender','$placeofbirth','$hometown','$Marital','$dob','$address','$contact','$email','$photo','$regdate','$religion','$department','$staffcat','$position','$schedule','$side','$fodername')");
        print_r(json_encode($result));
        createFolder($fodername);
        break;
    case "AddnonacademicUnitstaff";
        $firstname = $_POST['empfirstname'];
        $lastname = $_POST['emplastname'];
        $middlename = $_POST['empmiddlename'];
        $contact = $_POST['empcontact'];
        $email = $_POST['empemail'];
        $dob = $_POST['empdob'];
        $placeofbirth = $_POST['empplaceofbirth'];
        $hometown = $_POST['emphometown'];
        $address = $_POST['empaddress'];
        $gender = $_POST['empgender'];
        $unit = $_POST['unit'];
        $staffcat = $_POST['staffcategorie'];
        $schedule = $_POST['staffschedule'];
        $position = $_POST['addempPosition'];
        $Marital = $_POST['empmarital'];
        $religion = $_POST['empreligion'];
        $regdate = date('Y-m-d H:i:s');
        $username = 'name';
        $password = generateStrongPassword();
        $hashedpassword = hash('sha512', $password);
        $side = 1;
        $active = 1;
        $fodername = $firstname . $dob;
        $photo = "data:image/png;base64,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";
        $result = executequery("INSERT INTO `employees`(employeeStatus,`firstname`, `lastname`, `middlename`, `username`, `pass_word`, `gender`, `place_of_birth`, `Hometown`, `marital_status`, `dob`, `address`, `contact`, `email`, `photo`, `reg_date`, `religion`,`unit_id`,`staff_categ`, `staff_position`,`staff_schedule`,`side``foldername`) "
                . "VALUES ('$active','$firstname','$lastname','$middlename','$username','$hashedpassword','$gender','$placeofbirth','$hometown','$Marital','$dob','$address','$contact','$email','$photo','$regdate','$religion','$unit','$staffcat','$position','$schedule','$side',$fodername)");
        print_r(json_encode($result));
        createFolder($fodername);
        break;
    case "Addbothstaff";
        $firstname = $_POST['empfirstname'];
        $lastname = $_POST['emplastname'];
        $middlename = $_POST['empmiddlename'];
        $contact = $_POST['empcontact'];
        $email = $_POST['empemail'];
        $dob = $_POST['empdob'];
        $placeofbirth = $_POST['empplaceofbirth'];
        $hometown = $_POST['emphometown'];
        $address = $_POST['empaddress'];
        $gender = $_POST['empgender'];
        $faculty = $_POST['faculty'];
        $facultydepartment = $_POST['facultydepartment'];
        $unit = $_POST['unit'];
        $staffcat = $_POST['staffcategorie'];
        $schedule = $_POST['staffschedule'];
        $position = $_POST['staffposition'];
        $rank = $_POST['staffrank'];
        $Marital = $_POST['empmarital'];
        $religion = $_POST['empreligion'];
        $regdate = date('Y-m-d H:i:s');
        $username = 'name';
        $password = generateStrongPassword();
        $hashedpassword = hash('sha512', $password);
        $side = 1;
        $active = 1;
        $fodername = $firstname . $dob;
        $photo = "data:image/png;base64,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";
        $result = executequery("INSERT INTO `employees`(employeeStatus,`firstname`, `lastname`, `middlename`, `username`, `pass_word`, `gender`, `place_of_birth`, `Hometown`, `marital_status`, `dob`, `address`, `contact`, `email`, `photo`, `reg_date`, `religion`,`unit_id`,`Fid`, `Did`,`staff_categ`, `staff_position`, `staff_rank`, `staff_schedule`,`side`,`foldername`) "
                . "VALUES ('$active','$firstname','$lastname','$middlename','$username','$hashedpassword','$gender','$placeofbirth','$hometown','$Marital','$dob','$address','$contact','$email','$photo','$regdate','$religion','$unit','$faculty','$facultydepartment','$staffcat','$position','$rank','$schedule','$side','$fodername')");
        print_r(json_encode($result));

        createFolder($fodername);

        break;

    case "retrive-contract";
        $result = executequery("SELECT employecontract.id,contractS,contractE,contractstatus,employees.firstname,lastname FROM employecontract"
                . " INNER JOIN employees ON employecontract.employeeid = employees.employeeid ");
        FetchResult($result);
        break;
    case "validate-contract";
        $ID = $_POST['id'];
        $status = 0;
        $result = executequery("UPDATE `employecontract` SET `status`='$status' WHERE id='$ID' ");
        print_r(json_encode($result));
        break;
    case "Update-admininfo";
        $adminid = $_POST['adminid'];
        $newvalue = $_POST['newdata'];
        $attribute = $_POST['atribute'];

        $result = executequery("UPDATE admin SET $attribute='$newvalue' WHERE id='$adminid'");
        print_r(json_encode($result));
        break;
    case "Retrieve-nonAccDepartment";
        $retrive = executequery("select * from department where Fid is null");
        FetchResult($retrive);
        break;
    case "Update-selected-staff";
        $employeeid = $_POST['employeeid'];
        $newvalue = $_POST['newdata'];
        $attribute = $_POST['atribute'];
        $update = executequery("UPDATE employees SET $attribute='$newvalue' WHERE employeeid='$employeeid'");
        print_r(json_encode($update));
        break;
    case "Addnew-contract";
        $employeeid = $_POST['employeeid'];
        $newContractStart = $_POST['newContractStart'];
        $newContractEnd = $_POST['newContractEnd'];
        $newContractdays = $_POST['newContractdays'];
        $status = 1;
        $employee = executequery("UPDATE employees SET contractStart='$newContractStart',contractEnd='$newContractEnd',contractDays='$newContractdays' WHERE employeeid='$employeeid'");
        $contract = executequery("INSERT INTO `employecontract`(`employeeid`, `contractS`, `contractE`,`contractdays`, `contractstatus`) VALUES ('$employeeid','$newContractStart','$newContractEnd','$newContractdays','$status')");
        print_r(json_encode($contract));
        break;
    case "retrive-selected-leave";
        $id = $_POST['id'];
        $result = executequery("SELECT employeeleave.leavetype,description,status,starting_date,ending_date,ndays, employees.firstname,lastname,AnnualLeave, unit.unit_name FROM employeeleave INNER JOIN employees ON employeeleave.id = employees.employeeid "
                . "JOIN unit ON employeeleave.unit_id = unit.unit_id where id ='$id'");
        if ($result->num_rows > 0) {
            FetchResult($result);
        } else {
            print_r(json_encode(false));
        }
        break;
    case "Retrieve-faculty";
        $retrive = executequery("SELECT * FROM faculty");
        //        $retrive = executequery("SELECT faculty.Fid,Fname,Fsname,employees.firstname,lastname FROM faculty INNER JOIN employees ON faculty.Fid=employees.employeeid");
        FetchResult($retrive);
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
        $result = executequery("INSERT INTO `employeeleave`(`leavetype`, `leavecontact`, `leaveemail`, `description`, `starting_date`, `ending_date`, `ndays`, `status`, `employeeid`, `unit_id`, `active`) "
                . "VALUES ('$leavetype','$employeeLC','$employeeLE','$leavereson','$leavestart','$leaveend','$leavedays','$status','$employeeid','$employeeLU','$status')");
        print_r(json_encode($result));
        break;
    case "Add-vacancy";
        $Vend = $_POST['Vend'];
        $Vtitle = $_POST['Vtitle'];
        $Vavalia = $_POST['Vavalia'];
        $Vdescrip = $_POST['Vdescrip'];
        $Vstatus = 1;
        $query = executequery("INSERT INTO `vancancy`(`Vtitle`, `Vinformation`, `Vavaliablity`,`VendD`, `Vstatus`) VALUES ('$Vtitle','$Vdescrip','$Vavalia','$Vend','$Vstatus')");
        print_r(json_encode($query));
        break;
    case "Retrieve-vacancy";
        $vacancy = executequery("SELECT * FROM vancancy");
        FetchResult($vacancy);
        break;
    case "validate-vacancy";
        $id = $_POST['id'];
        $Vstatus = 0;
        $result = executequery("UPDATE vancancy SET Vstatus ='$Vstatus' WHERE id ='$id'");
        break;
    case "Retrieve-selected-vacancy";
        $id = $_POST['id'];
        $query = executequery("SELECT * FROM vancancy WHERE id='$id'");
        FetchResult($query);
        break;
    case "Update-selected-vacancy";
        $vid = $_POST['vid'];
        $newvalue = $_POST['newdata'];
        $attribute = $_POST['atribute'];
        $update = executequery("UPDATE vancancy SET $attribute='$newvalue' WHERE id='$vid'");
        print_r(json_encode($update));
        break;
    case "retrive-promotion";
        $result = executequery("SELECT promotion.fileLocal, employees.firstname,lastname,contact, unit.unit_name FROM promotion INNER JOIN employees ON promotion.Pid = employees.employeeid "
                . "JOIN unit ON promotion.Pid = unit.unit_id");
        FetchResult($result);
        break;
    case "retrive-previleges";
        $employeeid = $_POST['privilegeid'];
        $retrive = executequery("SELECT permission.Pid,Pstatus,link.Lid,name,icon,extenion,employess.firstname,lastname, FROM permission INNER JOIN employees ON promotion.Pid = employees.employeeid "
                . " JOIN unit ON permission.unit_id = unit.unit_id where employeeid='$employeeid'");
        FetchResult($retrive);
        break;
    case "Retrieve-faculty-table";
        $retrive = executequery("select fac.Fid,Fname,Fsname,
                (select emp.firstname from employees emp where emp.employeeid=fac.Fhead) as facultyheadF, 
                (select emp.lastname from employees emp where emp.employeeid=fac.Fhead) as facultyheadL 
                from faculty fac");
        FetchResult($retrive);

        break;
    case "edit-faculty-value";
        $facultyid = $_POST['facultyid'];
        $retrive = executequery("select fac.Fid,Fname,Fsname,
                (select emp.firstname from employees emp where emp.employeeid=fac.Fhead) as facultyheadF, 
                (select emp.lastname from employees emp where emp.employeeid=fac.Fhead) as facultyheadL 
                from faculty fac where Fid ='$facultyid'");
        FetchResult($retrive);
        break;
    case "edit-faculty";
        $facultyid = $_POST['facultyid'];
        $newdata = $_POST['newdata'];
        $atribute = $_POST['atribute'];
        $update = executequery("UPDATE `faculty` SET '$atribute'='$newdata' WHERE Fid='$facultyid'");
        print_r(json_encode($update));
        break;
    case "delete-faculty";
        $facultyid1 = $_POST['facultyid1'];
        $result = executequery("DELETE FROM `faculty` WHERE Did= '$facultyid1'");
        break;
    case "insert-faculty";
        $facultyname = $_POST['facultyname'];
        $facultyshortname = $_POST['facultyshortname'];
        $result = executequery("INSERT INTO unit(Fname, Fsname) VALUES ('$facultyname','$facultyshortname')");
        break;
    case "Retrive-attendance";
        $retrive = executequery("select atten.employeeid,time_in,break_in,time_out,break_out,
(select emp.firstname from employees emp where emp.employeeid=atten.employeeid) as firstname,
(select emp.lastname from employees emp where emp.employeeid=atten.employeeid) as lastname,
(select fac.fname from faculty fac where fac.Fid=atten.Fid) as facultyname,
(select uni.unit_name from unit uni where uni.unit_id=atten.unit_id) as unitname 
from attendance atten;
");
        FetchResult($retrive);
        break;
    case"Retrieve-links-modues";
        $fetch = executequery("select permin.Pstatus,employeeid,Lid,"
                . "(select lin.name from link lin where lin.Lid=permin.Lid)as linkname from permission permin");
        FetchResult($fetch);
        break;
    case "Retrieve-selected-staff-permission";
        $id = $_POST['employeeid'];
//        $linkname = $_POST['linkname'];
        $fetch = executequery("select * from permission where employeeid='$id'");
//        $fetch= executequery("select Pstatus from permission where employeeid='$id' AND Lid='$linkname'");
//        print_r(json_encode($linkname));
        FetchResult($fetch);
        break;
    case "grant-permission";
        $id = $_POST['employeeid'];
        $atribute = $_POST['atribute'];
        $Permissionstatus = 1;
        $grant = executequery("update permission set Pstatus='$Permissionstatus' where employeeid='$id' and Lid='$atribute'");
        print_r(json_encode($grant));
        break;
    case "revoke-permission";
        $id = $_POST['employeeid'];
        $atribute = $_POST['atribute'];
        $Permissionstatus = 0;
        $revoke = executequery("update permission set Pstatus='$Permissionstatus' where employeeid='$id' and Lid='$atribute'");
        print_r(json_encode($revoke));
        break;
    case"Change-sideC";
        $sidecolor = $_POST['sidecolor'];
        $atribute = $_POST['atribute'];
        $update = executequery("update admin set side = '$sidecolor' where id='$adminid'");
        print_r(json_encode($update));
        break;
    case "retrive-sidebarC";
        $retrive = executequery("select `side` from admin where id = '$adminid'");
//                print_r(json_encode($retrive));
        FetchResult($retrive);
        break;
    case "Retrieve-Department";
        $query = ("select dep.Did,Dname,Dsname,"
                . "(select emp.firstname from employees emp where emp.employeeid=dep.Hod)as firstname,"
                . "(select emp.lastname from employees emp where emp.employeeid=dep.Hod) as lastname from department dep");
        $retrive = executequery($query);
        FetchResult($retrive);
        break;
    case "depatment-value";
        $deparmentid = $_POST['deparmentid'];
        $retrive = executequery("select * from department where Did ='$deparmentid'");
        FetchResult($retrive);
        break;
    case "Update-selected-department";
        $deparmentid = $_POST['deparmentid'];
        $newvalue = $_POST['newdata'];
        $attribute = $_POST['atribute'];
        $update = executequery("UPDATE department SET $attribute='$newvalue' WHERE Did='$deparmentid'");
        print_r(json_encode($update));
        break;
    case "delect-depatment";
        $deparmentid = $_POST['deparmentid'];
        $delect = executequery("DELETE FROM `department` WHERE Did ='$deparmentid'");
        print_r(json_encode($delect));
        break;
    case "insert-DepartmentA";
        $departmentname = $_POST['departmentname'];
        $departmentSname = $_POST['departmentSname'];
        $Fid = $_POST['Fid'];
        $insert = executequery("INSERT INTO `department`(`Dname`, `Dsname`, `Fid`) VALUES ('$departmentname','$departmentSname','$Fid')");
        print_r(json_encode($insert));
        break;
    case "insert-DepartmentB";
        $departmentname = $_POST['departmentname'];
        $departmentSname = $_POST['departmentSname'];
        $insert = executequery("INSERT INTO `department`(`Dname`, `Dsname`) VALUES ('$departmentname','$departmentSname')");
        print_r(json_encode($insert));
        break;
    case "Retrieve-faculty-department";
        $department = $_POST['department'];
        $retrive = executequery("select * from department where Fid='$department'");
        FetchResult($retrive);
        break;
    case "checking-mail";
        $Email = $_POST['Email'];
            $check= executequery("select email from employees where email='$Email'");
        if ($check->num_rows > 0) {
                print_r(json_encode("Email already exit in the system"));
        } else {
                print_r(json_encode(true));
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

function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds') {
    $sets = array();
    if (strpos($available_sets, 'l') !== false)
        $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    if (strpos($available_sets, 'u') !== false)
        $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
    if (strpos($available_sets, 'd') !== false)
        $sets[] = '23456789';
    if (strpos($available_sets, 's') !== false)
        $sets[] = '!@#$%&*?';

    $all = '';
    $password = '';
    foreach ($sets as $set) {
        $password .= $set[array_rand(str_split($set))];
        $all .= $set;
    }

    $all = str_split($all);
    for ($i = 0; $i < $length - count($sets); $i++)
        $password .= $all[array_rand($all)];

    $password = str_shuffle($password);

    if (!$add_dashes)
        return $password;

    $dash_len = floor(sqrt($length));
    $dash_str = '';
    while (strlen($password) > $dash_len) {
        $dash_str .= substr($password, 0, $dash_len) . '-';
        $password = substr($password, $dash_len);
    }
    $dash_str .= $password;
    return $dash_str;
}

function ipaddress() {
    if (!emptyempty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    } elseif (!emptyempty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    } else {
        $ip = $_SERVER["REMOTE_ADDR"];
    }
    return$ip;
}

function createFolder($value) {
    $dirName = $value;
    $currentpath = getcwd();
    $currentpath = $currentpath . '../../../upload/' . $dirName;
    if (!is_dir($currentpath)) {
        mkdir($currentpath, 077, true);
    }
}

//Handling image file upload
                //if (isset($POST['adminimage'])) {
                ////    <?php
////include './dbManager.php';
//    echo "image upload";
//    exit();
//    $target_dir = "../img/upload/";
//    $fileName = basename($_FILES["file"]["name"]);
//    $target_file = $target_dir . basename($_FILES["file"]["name"]);
//    $targetFilePath = $target_Dir . $fileName;
//    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
//    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $_FILES['file']['name'])) {
//        $uploadedFile = $fileName;
//        $result = executequery("UPDATE admin SET photo='$fileName'WHERE id = 1");
//    }
//if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
//   $status = 1;
//}
// $uploadedFile = ''; 
// $allowTypes = array('jpg','png','jpeg','gif','pdf');
// if(in_array($fileType, $allowTypes)){
////        // Upload file to server
//        
// }
// 
//}
