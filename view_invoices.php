<?php include "include/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "top-menu.php"; ?>
<?php
if($_REQUEST['flag'] == "delete")
{
  mysqli_query($conn, "DELETE FROM `invoice` WHERE `invoice_id` = '$_REQUEST[del_id]'");
  echo "<script>alert('Successfully deleted the record.')</script>"; 
  echo "<script>location.href='view_invoices.php'</script>";
}
if(isset($_POST['update'])) {     
  $invoice_id = $_POST['invoice_id'];    
  $bill_num = $_POST['bill_num'];
  $cdate = date("Y-m-d",strtotime($_POST['cdate']));
  $purchase_from = $_POST['purchase_from'];
  $paytype = $_POST['paytype'];
  $tamount = $_POST['total_amount'];
  $apayment = $_POST['advance_payment'];
  if($_POST['remaining_amount']=="") {
    $ramount = $_POST['pdue'];
  } else {
    $ramount = $_POST['remaining_amount'];
  }
  $prepaid = $_POST['prepaid'];
  if($_POST['advance_payment']=="") {
    $npaid = $prepaid;
  } else {
    $npaid = ($prepaid+$apayment);
  }

  $sql_query = mysqli_query($conn, "UPDATE `invoice` SET
            `bill_no` = '".$bill_num."',
            `bill_date` = '".$cdate."',
            `purchase_from` = '".$purchase_from."',
            `payment_mode` = '".$paytype."',
            `total_amount` = '".$tamount."',
            `advance_payment` = '".$npaid."',
            `remaining_amount` = '".$ramount."'
             WHERE `invoice_id` = '".$invoice_id."'");
  if ($sql_query) {
      echo "<script>alert('Update Record Successfully.')</script>";
      echo "<script>location.href='view_invoices.php'</script>";
  } else {
  echo "<script>alert('Some Error On Update.')</script>"; 
  echo "<script>location.href='view_invoices.php'</script>";
  }
}
?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <p>&nbsp;</p>
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View All Invoices
                            </li>
                            <li style="float:right;"><button class="btn btn-primary btn-xs" onclick="ExportToExcel('xlsx')">Export Excel</button></li>
                        </ol>
                    </div>
                </div>
                 <?php if(($_REQUEST['flag'] == "edit") || ($_REQUEST['flag'] == "view")) { } else { ?>
                <div class="row">
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>From Date</label>
                          <input class="form-control" name="fdate" value="" type="date" placeholder="Enter From Date" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>To Date</label>
                          <input class="form-control" name="tdate" value="" type="date" placeholder="Enter To Date" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <input name="search" class="btn btn-success" type="submit" value="Submit" style="margin-top:25px;">
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    </form>
                </div>
                <?php } ?>
                <div class="row">
                    <?php if($_REQUEST['flag'] == "edit") {
                          $show = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `invoice` where `invoice_id` = '$_REQUEST[edit_id]'")); ?>
                    <div class="col-lg-12 col-md-12">
                      <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input name="invoice_id" value="<?php echo $show['invoice_id']; ?>" type="hidden">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label>Bill Number</label>
                          <input class="form-control" name="bill_num" value="<?php echo $show['bill_no']; ?>" type="text" placeholder="Enter Bill Number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label>Date</label>
                          <input class="form-control" name="cdate" value="<?php echo $show['bill_date']; ?>" type="date" placeholder="Enter Date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label>Purchase From</label>
                          <input class="form-control" name="purchase_from" value="<?php echo $show['purchase_from']; ?>" type="text" placeholder="Enter Purchase From" required>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                            <table class="table table-bordered" id="sumtable">
                              <thead>
                                <tr class="success">
                                  <th>Item Name</th>
                                  <th>Quantity</th>
                                  <?php if($_SESSION['cus']['role']=="User") { } else { ?>
                                  <th>Purchase Price (Per Unit)</th>
                                  <?php } ?>
                                  <th>Selling Price (Per Unit)</th>
                                  <th>Item Description</th>
                                </tr>
                              </thead>
                              <tbody class="field_wrapper" id="product_table">
                                <?php $sql_stock = mysqli_query($conn, "SELECT * FROM stock WHERE invoice_id='".$show['invoice_id']."'");
                                while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                <tr>
                                  <td><?php $sql_pname = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product WHERE product_id = '".$show_stock['pname']."'")); echo $sql_pname['product_name']; ?></td>
                                  <td><?php echo $show_stock['quantity']; ?></td>
                                  <?php if($_SESSION['cus']['role']=="User") { } else { ?>
                                  <td><?php echo $show_stock['pprice']; ?></td>
                                  <?php } ?>
                                  <td><?php echo $show_stock['sprice']; ?></td>
                                  <td><?php echo $show_stock['item_desc']; ?></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                    </div>
                    <div class="col-md-12">
                            <table class="table table-bordered" id="sumtable">
                              <thead>
                                <tr class="success">
                                  <th>Total Amount</th>
                                  <th>Advance Payment</th>
                                  <th>Due Amount</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <td><?php echo $show['total_amount']; ?></td>
                                  <td><?php echo $show['advance_payment']; ?><input name="prepaid" type="hidden" value="<?php echo $show['advance_payment']; ?>"></td>
                                  <td><?php echo $show['remaining_amount']; ?><input id="pdue" name="pdue" type="hidden" value="<?php echo $show['remaining_amount']; ?>"></td>
                                </tr>
                              </tbody>
                            </table>
                    </div>
                    <hr>
                    <div class="col-md-3">
                        <div class="form-group">
                        	<label>Payment mode <span class="text-danger">*</span></label>
                        	<select class="form-control" name="paytype" id="paytype" required="">
                        		<option>Select Pay Mode</option>
                        		<option value="Cash" <?php if($show['payment_mode']=="Cash") { echo "selected"; } else { } ?>>Cash</option>
                        		<option value="Google pay" <?php if($show['payment_mode']=="Google pay") { echo "selected"; } else { } ?>>Google pay</option>
                        		<option value="UPI/Net banking" <?php if($show['payment_mode']=="UPI/Net banking") { echo "selected"; } else { } ?>>UPI/Net banking</option>
                        		<option value="Credit card" <?php if($show['payment_mode']=="Credit card") { echo "selected"; } else { } ?>>Credit card</option>
                        		<option value="Debit card" <?php if($show['payment_mode']=="Debit card") { echo "selected"; } else { } ?>>Debit card</option>
                        		<option value="Cheque" <?php if($show['payment_mode']=="Cheque") { echo "selected"; } else { } ?>>Cheque</option>
                        		<option value="Paytm" <?php if($show['payment_mode']=="Paytm") { echo "selected"; } else { } ?>>Paytm</option>													
                        	</select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Total Amount</label>
                          <input class="form-control" name="total_amount" value="<?php echo $show['total_amount']; ?>" type="text" placeholder="Enter Total Amount">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Advance Payment</label>
                          <input class="form-control" id="ppaid" name="advance_payment" type="text" onkeyup="calc1()" placeholder="Enter Advance Payment">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Due Amount</label>
                          <input class="form-control" id="ddue" name="remaining_amount" type="text" placeholder="Enter Due Amount">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input name="update" class="btn btn-primary" type="submit" value="Update" />
                        </div>
                    </div>
                      </form>
                    </div>
                    <?php } else if($_REQUEST['flag'] == "view") {
                          $show = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `invoice` where `invoice_id` = '$_REQUEST[view_id]'")); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="sumtable">
                              <thead>
                                <tr class="success">
                                  <th>Bill Number</th>
                                  <th>Date</th>
                                  <th>Purchase From</th>
                                </tr>
                              </thead>
                              <tbody class="field_wrapper" id="product_table">
                                <tr>
                                  <td><?php echo $show['bill_no']; ?></td>
                                  <td><?php echo $show['bill_date']; ?></td>
                                  <td><?php echo $show['purchase_from']; ?></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <table class="table table-bordered" id="sumtable">
                              <thead>
                                <tr class="success">
                                  <th>Item Name</th>
                                  <th>Quantity</th>
                                  <th>Purchase Price (Per Unit)</th>
                                  <th>Selling Price (Per Unit)</th>
                                  <th>Item Description</th>
                                </tr>
                              </thead>
                              <tbody class="field_wrapper" id="product_table">
                                <?php $sql_stock = mysqli_query($conn, "SELECT * FROM stock WHERE invoice_id='".$show['invoice_id']."'");
                                while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                <tr>
                                  <td><?php $sql_pname = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product WHERE product_id = '".$show_stock['pname']."'")); echo $sql_pname['product_name']; ?></td>
                                  <td><?php echo $show_stock['quantity']; ?></td>
                                  <td><?php echo $show_stock['pprice']; ?></td>
                                  <td><?php echo $show_stock['sprice']; ?></td>
                                  <td><?php echo $show_stock['item_desc']; ?></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <table class="table table-bordered" id="sumtable">
                              <thead>
                                <tr class="success">
                                  <th>Payment mode</th>
                                  <th>Total Amount</th>
                                  <th>Advance Payment</th>
                                  <th>Due Payment</th>
                                </tr>
                              </thead>
                              <tbody class="field_wrapper" id="product_table">
                                <tr>
                                  <td><?php echo $show['payment_mode']; ?></td>
                                  <td>Rs. <?php echo $show['total_amount']; ?></td>
                                  <td>Rs. <?php echo $show['advance_payment']; ?></td>
                                  <td>Rs. <?php echo $show['remaining_amount']; ?></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <a href="view_invoices.php" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="col-lg-12 col-md-12">
                      <div class="panel panel-default">
                          <div class="panel-body">
                            <table class="table table-bordered" id="example">
                              <thead>
                                <tr>
                                  <th>Sl No</th>
                                  <th>Bill No</th>
                                  <th>Bill Date</th>
                                  <th>Purchase From</th>
                                  <th>Payment Mode</th>
                                  <th>Total Amount</th>
                                  <th>Advance Payment</th>
                                  <th>Remaining Amount</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php $i = 1;
                            if(isset($_POST['search'])) {
                              $fdate = $_POST['fdate'];
                              $tdate = $_POST['tdate'];
                              $sql_invoice=mysqli_query($conn, "SELECT * FROM invoice WHERE bill_date BETWEEN '$fdate' AND '$tdate' ORDER BY invoice_id ASC");
                            } else {
                              $sql_invoice=mysqli_query($conn, "SELECT * FROM invoice ORDER BY invoice_id ASC");
                            }
                              while($show_invoice = mysqli_fetch_array($sql_invoice)) { ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $show_invoice['bill_no']; ?></td>
                                  <td><?php echo $show_invoice['bill_date']; ?></td>
                                  <td><?php echo $show_invoice['purchase_from']; ?></td>
                                  <td><?php echo $show_invoice['payment_mode']; ?></td>
                                  <td><?php echo $show_invoice['total_amount']; ?></td>
                                  <td><?php echo $show_invoice['advance_payment']; ?></td>
                                  <td><?php echo $show_invoice['remaining_amount']; ?></td>
                                  <td>
                                    <?php if($_SESSION['cus']['role']=="User") { ?>
                                      <a class="btn btn-success btn-xs" href="view_invoices.php?flag=view&view_id=<?php echo $show_invoice['invoice_id']; ?>" style="margin-right:10px;">View</a> &nbsp; 
                                    <?php } else { ?>
                                      <a class="btn btn-success btn-xs" href="view_invoices.php?flag=view&view_id=<?php echo $show_invoice['invoice_id']; ?>" style="margin-right:10px;">View</a> &nbsp; 
                                      <a class="btn btn-success btn-xs" href="view_invoices.php?flag=edit&edit_id=<?php echo $show_invoice['invoice_id']; ?>" style="margin-right:10px;">Edit</a> &nbsp; 
                                      <a class="btn btn-danger btn-xs" href="view_invoices.php?flag=delete&del_id=<?php echo $show_invoice['invoice_id']; ?>" onclick="return confirm('Are you sure to delete the record?')">Delete</a>
                                    <?php } ?>
                                  </td>
                                </tr>
                                <?php $i++; } ?>
                              </tbody>
                            </table>
                          </div>              
                      </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "include/footer.php"; ?>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById('example');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
    return dl ?
    XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
    XLSX.writeFile(wb, fn || ('Invoices.' + (type || 'xlsx')));
}
</script>
<script>
function calc() {
  var a1 = parseInt(document.getElementById("tamount").value);
  var a2 = parseInt(document.getElementById("apayment").value);
  if(a2>a1) {
      alert("Advance Payment not greater than Total Amount.");
      document.getElementById("apayment").value = 0;
  } else {
    var a3 =(a1-a2);
  }
  document.getElementById("ramount").value = a3 || 0;
}
function calc1() {
  var a1 = parseInt(document.getElementById("pdue").value);
  var a2 = parseInt(document.getElementById("ppaid").value);
  if(a2>a1) {
      alert("Due Payment not greater than Due Amount.");
      document.getElementById("ppaid").value = 0;
  } else {
    var a3 =(a1-a2);
  }
  document.getElementById("ddue").value = a3 || 0;
}
</script>