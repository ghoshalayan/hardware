<?php
include "lib/connection.php";
if ($_SESSION['cus']['login'] != "true") {
  echo "<script>location.href='index.php'</script>";
} else { }
$uri = $_SERVER['REQUEST_URI'];
$config_row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `admin_login` WHERE `role`='Admin'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hardwares</title>
    <link rel="shortcut icon" type="image/icon" href="images/logo-icon.png"/>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <script type="text/javascript" language="javascript" src="js/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
</head>
<body>