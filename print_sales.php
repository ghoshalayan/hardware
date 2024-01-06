<?php include "include/header.php"; ?>
<style>
table td { padding:5px !important; }
</style>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "top-menu.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <p>&nbsp;</p>
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View All Sales
                            </li>
                            <li style="float:right;"><input type="button" class="btn-sm btn btn-success" value="Print" onclick="printDiv()" style="float:right;padding:2px 10px;colr:#fff;background:#000;border:0;"></li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <?php  $show_sales = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `sales` where `sales_id` = '$_REQUEST[view_id]'")); ?>
                    <div class="col-lg-12 col-md-12" id="GFG">
                          <table cellspacing="0" cellpadding="0" border="0" style="width:100%;font-size:16px;">
                              <tr>
                                <td align="center" valign="top" colspan="1" style="font-size:19px;font-weight:bold;text-align:left;color:green;">Hardware Store</td>
                                <td align="center" valign="top" style="text-align:right;"><?php echo $show_sales['insert_date'];?></td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" colspan="3" height="5"></td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" colspan="3" style="font-size:17px;text-align:left;">Hooghly</td>
                              </tr>
                              <tr>
                                <td align="left" valign="top" colspan="3" height="10"></td>
                              </tr>
                          </table>
                          <div class="table-responsive">           
                              <table cellspacing="0" cellpadding="0" border="1" style="width:100%;font-size:16px;">
                                <tbody>
                                  <tr>
                                    <td colspan="2" align="left" valign="middle" style="padding:5px;"><b>Bill Number:</b> <?php echo $show_sales['bill_number']; ?></td>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Bill Date:</b> <?php echo $show_sales['insert_date']; ?></td>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Next Payment Date:</b> <?php echo $show_sales['next_payment_date']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Name:</b> <?php echo $show_sales['name']; ?></td>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Address:</b> <?php echo $show_sales['address']; ?></td>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Phone:</b> <?php echo $show_sales['phone']; ?></td>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Email:</b> <?php echo $show_sales['email']; ?></td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Pay Mode:</b> <?php echo $show_sales['pay_mode']; ?></td>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Total Amount:</b> <?php echo $show_sales['total_amount']; ?></td>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Paid:</b> <?php echo $show_sales['paid']; ?></td>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Due:</b> <?php echo $show_sales['due']; ?></td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" align="left" valign="middle" style="padding:5px;"><b>Description:</b> <?php echo $show_sales['description']; ?></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <p>&nbsp;</p>
                            <div class="table-responsive">           
                              <table cellspacing="0" cellpadding="0" border="1" style="width:100%;font-size:16px;">
                                <thead>
                                  <tr>
                                    <th colspan="5" align="left" valign="middle" style="padding:5px;">Product Details</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $sql_item = mysqli_query($conn, "SELECT * FROM item_sales WHERE sales_id='".$show_sales['sales_id']."'");
                                        while($show_item = mysqli_fetch_array($sql_item)) { ?>
                                  <tr>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Item Name:</b> <?php $show_nam = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `product` where `product_id` = '".$show_item['item_name']."'")); ?><?php echo $show_nam['product_name']; ?></td>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Price:</b> <?php echo $show_item['price']; ?></td>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Quantity:</b> <?php echo $show_item['quantity']; ?></td>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Total Price:</b> <?php echo $show_item['total_price']; ?></td>
                                    <td align="left" valign="middle" style="padding:5px;"><b>Description:</b> <?php echo $show_item['description']; ?></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                            <p>&nbsp;</p>
                            <p><img src="images/barcode.jpg" alt="Bar Code" style="width:150px;"></p>
                        </div>
                            <p>&nbsp;</p>
                        <div class="col-lg-12 col-md-12">
                            <a href="view_sales.php" class="btn btn-primary">Back</a>
                        </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "include/footer.php"; ?>
    <script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=auto, width=auto');
            a.document.write('<html><head><style type="text/css">');
            a.document.write('body{font-family:arial, Helvetica, sans-serif;font-size:11px;color:#000;padding:30px;} table td {font-size:11px;} @media print { @page {margin:0;}.pagebreak {height: 730px; page-break-before: always;}.pagebreak1 {height:280px; page-break-before: always;}}');
            a.document.write('</style></head><body>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>