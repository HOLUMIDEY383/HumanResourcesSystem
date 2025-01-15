<?php
$servername = "localhost";
$username = "root";
$dbname = ("hrsystem");
$password = "";

// Create connection


function opendb() {

    global $servername;
    global $username;
    global $dbname;
    global $password;


    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
//       echo "Connected successfully";
        return $conn;
    }
}

$connn = opendb();
function executequery ($query){
//print_r($connn);
    global $connn;
    
    $result = mysqli_query($connn,$query);
  // print_r($result);
    if ($result){
        return $result;
    } else {
        return "Error in runing query : ".mysqli_connect_error($connn);    
    }
}



?>