<?php 	
include "lib/connection.php";

$productId = $_POST['productId'];

$sql = "SELECT * FROM stock WHERE pname = $productId";
$result = $conn->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
}

$conn->close();

echo json_encode($row);