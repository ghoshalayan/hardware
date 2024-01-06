<?php
session_start();
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");
$conn = new mysqli('localhost', 'oipoelqh_udemohardware', '{X_tVU30p6P.', 'oipoelqh_demohardware');
if($conn->connect_error) {
    die('conn Error '. $conn->connect_error);
}
?>