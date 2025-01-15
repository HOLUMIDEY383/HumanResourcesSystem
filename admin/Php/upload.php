<?php
include './dbManager.php';
$target_dir = "../img/upload/";
$fileName = basename($_FILES["file"]["name"]); 
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$targetFilePath = $target_Dir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])){
            $uploadedFile = $fileName; 
            $result= executequery("UPDATE admin SET photo='$fileName'WHERE id = 1");
        }
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


