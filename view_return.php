<?php include "include/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "top-menu.php"; ?>
<?php
if($_REQUEST['flag'] == "delete")
{
  mysqli_query($conn, "DELETE FROM `sales` WHERE `sales_id` = '$_REQUEST[del_id]'");
  echo "<script>alert('Successfully deleted the record.')</script>"; 
  echo "<script>location.href='view_sales.php'</script>";
}
if(isset($_POST['update'])) {
  $sales_id = $_POST['sales_id'];
  $bill_num = $_POST['bill_num'];
  $name = $_POST['name'];
  $cdate = date("Y-m-d",strtotime($_POST['cdate']));
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $decorator = $_POST['decorator'];
  $paytype = $_POST['paytype'];
  $tamount = $_POST['tamount'];
  
  if($_POST['paid']=="") {
      $paid = 0;
  } else {
      $paid = $_POST['paid'];
  }
  
  if($_POST['due']=="") {
      $due = $_POST['pdue'];
  } else {
      $due = $_POST['due'];
  }
  
  $description = $_POST['description'];
  $ppaid = $_POST['ppaid'];
  $npaid = ($ppaid+$paid);
  
  $sql_query = mysqli_query($conn, "UPDATE `sales` SET
            `bill_number` = '".$bill_num."',
            `name` = '".$name."',
            `address` = '".$address."',
            `phone` = '".$phone."',
            `email` = '".$email."',
            `pay_mode` = '".$paytype."',
            `total_amount` = '".$tamount."',
            `paid` = '".$npaid."',
            `due` = '".$due."',
            `description` = '".$description."',
            `decorator_id` = '".$decorator."',
            `next_payment_date` = '".$cdate."'
             WHERE `sales_id` = '".$sales_id."'");
  
  $sql_dec = mysqli_query($conn, "UPDATE `decorator_commision` SET
            `decorator_id` = '".$decorator."'
             WHERE `sales_id` = '".$sales_id."'");
             
  if ($sql_query) {
      echo "<script>alert('Update Record Successfully.')</script>";
      echo "<script>location.href='view_sales.php'</script>";
  } else {
  echo "<script>alert('Some Error On Update.')</script>"; 
  echo "<script>location.href='view_sales.php'</script>";
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
                                <i class="fa fa-dashboard"></i> View All Returns
                            </li>
                            <li style="float:right;"><button class="btn btn-primary btn-xs" onclick="ExportToExcel('xlsx')">Export Excel</button></li>
                        </ol>
                    </div>
                </div>
                <?php if(($_REQUEST['flag'] == "view") || ($_REQUEST['flag'] == "edit")) { } else { ?>
                <div class="row">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputName1">From Date </label>
                                <input type="date" class="form-control" name="from" id="exampleInputEmail3" placeholder="Name" value="<?php $month = date('m');$day = date('d');$year = date('Y');$today = $year . '-' . $month . '-' . $day; echo $today; ?>"required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputName1">To Date </label>
                                <input type="date" class="form-control" name="to" id="exampleInputEmail3" placeholder="Name" value="<?php $month = date('m');$day = date('d');$year = date('Y');$today = $year . '-' . $month . '-' . $day; echo $today; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputName1">&nbsp;</label>
                                <button type="submit" class="btn btn-primary" id="search" name="search" style="margin-top: 24px;">Search</button>
                            </div>
                        </div>
					</form>
                </div>
                <?php } ?>
                <!-- /.row -->
                <div class="row">
                    <?php if($_REQUEST['flag'] == "edit") {
                          $show=mysqli_fetch_array(mysqli_query($conn, "SELECT * from `sales` where `sales_id` = '$_REQUEST[edit_id]'")); ?>
                        <div class="col-lg-12 col-md-12">
                            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input name="sales_id" value="<?php echo $show['sales_id']; ?>" type="hidden">
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Bill Number</label>
                                      <input class="form-control" name="bill_num" value="<?php echo $show['bill_number']; ?>" type="text" placeholder="Enter Bill Number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Name</label>
                                      <input class="form-control" name="name" value="<?php echo $show['name']; ?>" type="text" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Phone</label>
                                      <input class="form-control" name="phone" value="<?php echo $show['phone']; ?>" type="text" placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input class="form-control" name="email" value="<?php echo $show['email']; ?>" type="text" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-lg-12">           
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr class="success">
                                            <th>Total Amount</th>
                                            <th>Previous Payment</th>
                                            <th>Due Amount</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Rs. <?php echo $show['total_amount']; ?></td>
                                            <td>Rs. <?php echo $show['paid']; ?><input name="ppaid" type="hidden" value="<?php echo $show['paid']; ?>"></td>
                                            <td>Rs. <?php echo $show['due']; ?><input id="pdue" name="pdue" type="hidden" value="<?php echo $show['due']; ?>"></td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                    	<label>Payment mode <span class="text-danger">*</span></label>
                                    	<select class="form-control" name="paytype" id="paytype" required="">
                                    		<option>Select Pay Mode</option>
                                    		<option value="Cash" <?php if($show['pay_mode']=="Cash") { echo "selected"; } else { } ?>>Cash</option>
                                    		<option value="Google pay" <?php if($show['pay_mode']=="Google pay") { echo "selected"; } else { } ?>>Google pay</option>
                                    		<option value="UPI/Net banking" <?php if($show['pay_mode']=="UPI/Net banking") { echo "selected"; } else { } ?>>UPI/Net banking</option>
                                    		<option value="Credit card" <?php if($show['pay_mode']=="Credit card") { echo "selected"; } else { } ?>>Credit card</option>
                                    		<option value="Debit card" <?php if($show['pay_mode']=="Debit card") { echo "selected"; } else { } ?>>Debit card</option>
                                    		<option value="Cheque" <?php if($show['pay_mode']=="Cheque") { echo "selected"; } else { } ?>>Cheque</option>
                                    		<option value="Paytm" <?php if($show['pay_mode']=="Paytm") { echo "selected"; } else { } ?>>Paytm</option>													
                                    	</select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Total Amount</label>
                                      <input class="form-control" name="tamount" value="<?php echo $show['total_amount']; ?>" type="text" placeholder="Enter Total Amount">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Paid</label>
                                      <input class="form-control" id="paid1" name="paid" onkeyup="calc1()" type="text" placeholder="Enter Paid">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Due</label>
                                      <input class="form-control" id="due1" name="due" type="text" placeholder="Enter Due">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Description</label>
                                      <textarea class="form-control" name="description" rows="4" cols="50" placeholder="Enter Description" style="height:80px;"><?php echo $show['description']; ?></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                        <table class="table table-bordered" id="sumtable">
                                          <thead>
                                            <tr class="success">
                                              <th>Item Name</th>
                                              <th>Quantity</th>
                                              <th>Price (Per Unit)</th>
                                              <th>Total Price</th>
                                              <th>Item Description</th>
                                            </tr>
                                          </thead>
                                          <tbody class="field_wrapper" id="product_table">
                                            <?php $sql_stock = mysqli_query($conn, "SELECT * FROM item_sales WHERE sales_id='".$show['sales_id']."'");
                                            while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                            <tr>
                                              <td><?php $sql_pname = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product WHERE product_id = '".$show_stock['item_name']."'")); echo $sql_pname['product_name']; ?></td>
                                              <td><?php echo $show_stock['quantity']; ?></td>
                                              <td><?php echo $show_stock['price']; ?></td>
                                              <td><?php echo ($show_stock['quantity']*$show_stock['price']); ?></td>
                                              <td><?php echo $show_stock['description']; ?></td>
                                            </tr>
                                            <?php } ?>
                                          </tbody>
                                        </table>
                                </div>
                                <hr>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                      <label>Select Decorator</label>
                                      <select class="form-control select2" name="decorator" style="height:40px;" onchange="showDiv(this.value)">
                                        <option selected="selected">Select Decorator</option>
                                        <?php $sql_stock=mysqli_query($conn, "SELECT * FROM decorator ORDER BY decorator_id ASC");
                                        while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                            <option value="<?php echo $show_stock['decorator_id']; ?>" <?php if($show['decorator_id']==$show_stock['decorator_id']) { echo "selected"; } else { } ?>><?php echo $show_stock['name']; ?> ( <?php echo $show_stock['phone']; ?> )</option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Next Payment Date</label>
                                      <input class="form-control" name="cdate" value="<?php echo $show['next_payment_date']; ?>" type="date" placeholder="Enter Next Payment Date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Address</label>
                                      <textarea class="form-control" name="address" rows="4" cols="50" placeholder="Enter Address"><?php echo $show['address']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input name="update" class="btn btn-primary" type="submit" value="Update" />
                                        <a href="view_sales.php" class="btn btn-primary">Cancel</a>
                                    </div>
                                </div>
                            </form>
                    </div>
                    <?php } else if($_REQUEST['flag'] == "view") {
                          $show_sales = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `sales` where `sales_id` = '$_REQUEST[view_id]'")); ?>
                    <div class="col-lg-12 col-md-12">
                          <div class="table-responsive">           
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th colspan="2">Bill Number: <?php echo $show_sales['bill_number']; ?></th>
                                    <th>Bill Date: <?php echo $show_sales['insert_date']; ?></th>
                                    <th>Next Payment Date: <?php echo $show_sales['next_payment_date']; ?></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><b>Name:</b> <?php echo $show_sales['name']; ?></td>
                                    <td><b>Address:</b> <?php echo $show_sales['address']; ?></td>
                                    <td><b>Phone:</b> <?php echo $show_sales['phone']; ?></td>
                                    <td><b>Email:</b> <?php echo $show_sales['email']; ?></td>
                                  </tr>
                                  <tr>
                                    <td><b>Pay Mode:</b> <?php echo $show_sales['pay_mode']; ?></td>
                                    <td><b>Total Amount:</b> <?php echo $show_sales['total_amount']; ?></td>
                                    <td><b>Paid:</b> <?php echo $show_sales['paid']; ?></td>
                                    <td><b>Due:</b> <?php echo $show_sales['due']; ?></td>
                                  </tr>
                                  <tr>
                                    <td colspan="4"><b>Description:</b> <?php echo $show_sales['description']; ?></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <?php $show_dec = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `decorator` where `decorator_id` = '".$show_sales['decorator_id']."'")); ?>
                          <div class="table-responsive mt-3">           
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th colspan="4">Decorator Name: <?php echo $show_dec['name']; ?></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $sql_comm = mysqli_query($conn, "SELECT * FROM decorator_commision WHERE sales_id='".$show_sales['sales_id']."'");
                                        while($show_comm = mysqli_fetch_array($sql_comm)) { ?>
                                  <tr>
                                    <td><b>Amount:</b> <?php echo $show_comm['decorator_amount']; ?></td>
                                    <td><b>Paid:</b> <?php echo $show_comm['decorator_paid']; ?></td>
                                    <td><b>Due:</b> <?php echo $show_comm['decorator_due']; ?></td>
                                    <td><b>Description:</b> <?php echo $show_comm['description']; ?></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          <div class="table-responsive mt-3">           
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th colspan="5">Product Details</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $sql_item = mysqli_query($conn, "SELECT * FROM item_sales WHERE sales_id='".$show_sales['sales_id']."'");
                                        while($show_item = mysqli_fetch_array($sql_item)) { ?>
                                  <tr>
                                    <td><b>Item Name:</b> <?php $show_nam = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `product` where `product_id` = '".$show_item['item_name']."'")); ?><?php echo $show_nam['product_name']; ?></td>
                                    <td><b>Price:</b> <?php echo $show_item['price']; ?></td>
                                    <td><b>Quantity:</b> <?php echo $show_item['quantity']; ?></td>
                                    <td><b>Total Price:</b> <?php echo $show_item['total_price']; ?></td>
                                    <td><b>Description:</b> <?php echo $show_item['description']; ?></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                                    <div class="form-group">
                                        <a href="view_sales.php" class="btn btn-primary">Back</a>
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
                                  <th>Name</th>
                                  <th>Address</th>
                                  <th>Phone</th>
                                  <th>Email</th>
                                  <th>Pay Mode</th>
                                  <th>Amount</th>
                                  <th>Paid Amount</th>
                                  <th>Due</th>
                                  <th>Decorator</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php $i = 1;
                              if (isset($_POST['search'])) {
                                $from = $_POST["from"];
                                $to = $_POST["to"];
                                $sql_stock = mysqli_query($conn, "SELECT * FROM sales WHERE WHERE refer_type='R' AND date(insert_date) BETWEEN '$from' AND '$to'");  
                              } else {
                                $sql_stock=mysqli_query($conn, "SELECT * FROM sales WHERE refer_type='R' ORDER BY sales_id ASC");
                              }
                              while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $show_stock['bill_number']; ?></td>
                                  <td><?php echo $show_stock['name']; ?></td>
                                  <td><?php echo $show_stock['address']; ?></td>
                                  <td><?php echo $show_stock['phone']; ?></td>
                                  <td><?php echo $show_stock['email']; ?></td>
                                  <td><?php echo $show_stock['pay_mode']; ?></td>
                                  <td><?php echo $show_stock['total_amount']; ?></td>
                                  <td><?php echo $show_stock['paid']; ?></td>
                                  <td><?php echo $show_stock['due']; ?></td>
                                  <td><?php $show_dec = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `decorator` where `decorator_id` = '".$show_stock['decorator_id']."'")); echo $show_dec['name']; ?></td>
                                  <td><?php if($_SESSION['cus']['role']=="User") { ?>
                                      <a class="btn btn-success btn-xs" href="view_sales.php?flag=view&view_id=<?php echo $show_stock['sales_id']; ?>" style="margin-right:10px;margin-bottom:5px;">View</a> 
                                      <?php } else { ?>
                                      <a class="btn btn-success btn-xs" href="view_sales.php?flag=view&view_id=<?php echo $show_stock['sales_id']; ?>" style="margin-right:10px;margin-bottom:5px;">View</a> 
                                      <a class="btn btn-success btn-xs" href="view_sales.php?flag=edit&edit_id=<?php echo $show_stock['sales_id']; ?>" style="margin-right:10px;margin-bottom:5px;">Edit</a> 
                                      <a class="btn btn-danger btn-xs" href="view_sales.php?flag=delete&del_id=<?php echo $show_stock['sales_id']; ?>" onclick="return confirm('Are you sure to delete the record?')">Delete</a>
                                      <a class="btn btn-success btn-xs" href="print_sales.php?view_id=<?php echo $show_stock['sales_id']; ?>" style="margin-right:10px;">Print</a> 
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
    XLSX.writeFile(wb, fn || ('Products.' + (type || 'xlsx')));
}
function calc1() {
  var a1 = parseInt(document.getElementById("pdue").value);
  var a2 = parseInt(document.getElementById("paid1").value);
  if(a2>a1) {
      alert("Due Payment not greater than Due Amount.");
      document.getElementById("paid1").value = 0;
  } else {
    var a3 =(a1-a2);
  }
  document.getElementById("due1").value = a3 || 0;
}
</script>