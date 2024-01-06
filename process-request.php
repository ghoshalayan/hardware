<?php
include "lib/connection.php";
if(isset($_POST["customer"])){
    $customer = $_POST["customer"];
    $sql_cus = mysqli_query($conn, "SELECT * FROM `item_sales` WHERE `sales_id` = '".$customer."'");
    
    echo '<table class="table table-bordered">
                          <thead>
                            <tr class="success">
                              <th>Item Name</th>
                              <th>Quantity</th>
                              <th>Price (Per Unit)</th>
                              <th>Total Price</th>
                              <th>Item Description</th>
                            </tr>
                          </thead>
                          <tbody class="field_wrapper">';
    
    while($show_cus = mysqli_fetch_array($sql_cus)) {
        $show_pro = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product WHERE product_id='".$show_cus['item_name']."'"));
        echo '<tr>
                              <td>'.$show_pro['product_name'].'</td>
                              <td>'.$show_cus['quantity'].'</td>
                              <td>'.$show_cus['price'].'</td>
                              <td>'.$show_cus['total_price'].'</td>
                              <td>'.$show_cus['description'].'</td>
                            </tr>';
    }
    echo '</tbody></table>';
}
?>