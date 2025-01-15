<?php
session_start();
//echo 'sess'.$_SESSION['admin'];
// Check user login or not
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
}
?>