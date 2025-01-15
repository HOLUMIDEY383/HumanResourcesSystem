<?php
session_start();
//echo 'sess'.$_SESSION['admin'];
// Check user login or not
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
$empid=$_SESSION['user'];
?>