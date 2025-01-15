<?php

session_start();
$empid = $_SESSION['user'];
include '../admin/Php/dbManager.php';

//fectching folder name.
$foldername = '';
$fetch = executequery("select foldername from employees where employeeid='$empid'");
while ($row = $fetch->fetch_assoc()) {
    $foldername = $row['foldername'];
}
//echo 'foldername' . $foldername;


$target_dir = "../upload/$foldername/";
//$my_file = $_FILES['my_file'];
$fileName = basename($_FILES["my_file"]["name"]);
$file_path = $my_file['tmp_name']; // temporary upload path of the file
$file_name = $_POST['name']; // desired name of the file
// save the file at `img/FILE_NAME`
if (move_uploaded_file($_FILES["my_file"]["tmp_name"], $target_dir . $_FILES['my_file']['name'])) {
    
    $insert = executequery("INSERT INTO `filelog`(`Filename`, `employeeid`) VALUES ('$file_name','$empid')");
}

//echo ;





//$delete_file = 0;
//if(isset($_POST['delete_file'])){ 
//    $delete_file = $_POST['delete_file'];
//}
//
//$targetPath = dirname( __FILE__ ) . '/uploads/';
//
//// Check if it's an upload or delete and if there is a file in the form
//if ( !empty($_FILES) && $delete_file == 0 ) {
//
//    // Check if the upload folder is exists
//    if ( file_exists($targetPath) && is_dir($targetPath) ) {
//
//        // Check if we can write in the target directory
//        if ( is_writable($targetPath) ) {
//
//            /**
//             * Start dancing
//             */
//            $tempFile = $_FILES['file']['tmp_name'];
//
//            $targetFile = $targetPath . $_FILES['file']['name'];
//
//            // Check if there is any file with the same name
//            if ( !file_exists($targetFile) ) {
//
//                move_uploaded_file($tempFile, $targetFile);
//
//                // Be sure that the file has been uploaded
//                if ( file_exists($targetFile) ) {
//                    $response = array (
//                        'status'    => 'success',
//                        'file_link' => $targetFile
//                    );
//                } else {
//                    $response = array (
//                        'status' => 'error',
//                        'info'   => 'Couldn\'t upload the requested file :(, a mysterious error happend.'
//                    );
//                }
//
//            } else {
//                // A file with the same name is already here
//                $response = array (
//                    'status'    => 'error',
//                    'info'      => 'A file with the same name is exists.',
//                    'file_link' => $targetFile
//                );
//            }
//
//        } else {
//            $response = array (
//                'status' => 'error',
//                'info'   => 'The specified folder for upload isn\'t writeable.'
//            );
//        }
//    } else {
//        $response = array (
//            'status' => 'error',
//            'info'   => 'No folder to upload to :(, Please create one.'
//        );
//    }
//
//    // Return the response
//    echo json_encode($response);
//    exit;
//}
//
//
//// Remove file
//if( $delete_file == 1 ){
//    $file_path = $_POST['target_file'];
//
//    // Check if file is exists
//    if ( file_exists($file_path) ) {
//
//        // Delete the file
//        unlink($file_path);
//
//        // Be sure we deleted the file
//        if ( !file_exists($file_path) ) {
//            $response = array (
//                'status' => 'success',
//                'info'   => 'Successfully Deleted.'
//            );
//        } else {
//            // Check the directory's permissions
//            $response = array (
//                'status' => 'error',
//                'info'   => 'We screwed up, the file can\'t be deleted.'
//            );
//        }
//    } else {
//        // Something weird happend and we lost the file
//        $response = array (
//            'status' => 'error',
//            'info'   => 'Couldn\'t find the requested file :('
//        );
//    }
//
//    // Return the response
//    echo json_encode($response);
//    exit;
//}


