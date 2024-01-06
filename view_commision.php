<?php include "include/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "top-menu.php"; ?>
<?php
if($_REQUEST['flag'] == "delete")
{
  mysqli_query($conn, "DELETE FROM `decorator_commision` WHERE `decorator_commision_id` = '$_REQUEST[del_id]'");
  echo "<script>alert('Successfully deleted the record.')</script>"; 
  echo "<script>location.href='view_commision.php'</script>";
}
if(isset($_POST['update'])) {
  $decorator_commision_id = $_POST['decorator_commision_id'];
  $tamount = $_POST['tamount'];
  $paid = $_POST['paid'];
  $due = $_POST['due'];
  $description = $_POST['description'];
  $prepaid = $_POST['prepaid'];
  $npaid = ($prepaid+$paid);

  $sql_query = mysqli_query($conn, "UPDATE `decorator_commision` SET
            `decorator_amount` = '".$tamount."',
            `decorator_paid` = '".$npaid."',
            `decorator_due` = '".$due."',
            `description` = '".$description."'
             WHERE `decorator_commision_id` = '".$decorator_commision_id."'");
  if ($sql_query) {
      echo "<script>alert('Update Record Successfully.')</script>";
      echo "<script>location.href='view_commision.php'</script>";
  } else {
  echo "<script>alert('Some Error On Update.')</script>"; 
  echo "<script>location.href='view_commision.php'</script>";
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
                                <i class="fa fa-dashboard"></i> View All  Decorator Commision
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
                          $show = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `decorator_commision` where `decorator_commision_id` = '$_REQUEST[edit_id]'")); ?>
                        <div class="col-lg-12 col-md-12">
                            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input name="decorator_commision_id" value="<?php echo $show['decorator_commision_id']; ?>" type="hidden">
                                <div class="col-lg-12">           
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr class="success">
                                            <th>Decorator Name</th>
                                            <th>Total Commision</th>
                                            <th>Previous Payment</th>
                                            <th>Due Amount</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Rs. <?php $show_dec = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM decorator WHERE decorator_id='".$show['decorator_id']."'")); echo $show_dec['name']; ?> ( <?php echo $show_dec['phone']; ?> )</td>
                                            <td>Rs. <?php echo $show['decorator_amount']; ?></td>
                                            <td>Rs. <?php echo $show['decorator_paid']; ?><input name="prepaid" type="hidden" value="<?php echo $show['decorator_paid']; ?>"></td>
                                            <td>Rs. <?php echo $show['decorator_due']; ?><input id="pddue" name="pddue" type="hidden" value="<?php echo $show['decorator_due']; ?>"></td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Total Amount</label>
                                      <input class="form-control" id="damount" name="tamount" type="text" value="<?php echo $show['decorator_amount']; ?>" placeholder="Enter Total Amount">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Paid</label>
                                      <input class="form-control" id="ppaid" name="paid" type="text" onkeyup="calc1()" placeholder="Enter Paid">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Due</label>
                                      <input class="form-control" id="ddue" name="due" type="text" placeholder="Enter Due">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Description</label>
                                      <textarea class="form-control" name="description" rows="4" cols="50" placeholder="Enter Description" style="height:80px;"><?php echo $show['description']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input name="update" class="btn btn-primary" type="submit" value="Update" />
                                        <a href="view_commision.php" class="btn btn-primary">Cancel</a>
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
                                        <a href="view_commision.php" class="btn btn-primary">Back</a>
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
                                  <th>Amount</th>
                                  <th>Paid</th>
                                  <th>Due</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php $i = 1;
                              if (isset($_POST['search'])) {
                                $from = $_POST["from"];
                                $to = $_POST["to"];
                                $sql_stock = mysqli_query($conn, "SELECT * FROM decorator_commision WHERE date(insert_date) BETWEEN '$from' AND '$to'");  
                              } else {
                                $sql_stock=mysqli_query($conn, "SELECT * FROM decorator_commision ORDER BY decorator_commision_id ASC");
                              }
                              while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php $show_dec1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `sales` where `sales_id` = '".$show_stock['sales_id']."'")); echo $show_dec1['bill_number']; ?></td>
                                  <td><?php $show_dec = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `decorator` where `decorator_id` = '".$show_stock['decorator_id']."'")); echo $show_dec['name']; ?></td>
                                  <td><?php echo $show_stock['decorator_amount']; ?></td>
                                  <td><?php echo $show_stock['decorator_paid']; ?></td>
                                  <td><?php echo $show_stock['decorator_due']; ?></td>
                                  <td><?php if($_SESSION['cus']['role']=="User") { ?>
                                      <a class="btn btn-success btn-xs" href="view_commision.php?flag=view&view_id=<?php echo $show_stock['sales_id']; ?>" style="margin-right:10px;">View</a> 
                                      <?php } else { ?>
                                      <a class="btn btn-success btn-xs" href="view_commision.php?flag=view&view_id=<?php echo $show_stock['sales_id']; ?>" style="margin-right:10px;">View</a> 
                                      <a class="btn btn-success btn-xs" href="view_commision.php?flag=edit&edit_id=<?php echo $show_stock['decorator_commision_id']; ?>" style="margin-right:10px;">Edit</a> 
                                      <a class="btn btn-danger btn-xs" href="view_commision.php?flag=delete&del_id=<?php echo $show_stock['decorator_commision_id']; ?>" onclick="return confirm('Are you sure to delete the record?')">Delete</a>
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
    XLSX.writeFile(wb, fn || ('Commision.' + (type || 'xlsx')));
}
function calc1() {
  var a1 = parseInt(document.getElementById("pddue").value);
  var a2 = parseInt(document.getElementById("ppaid").value);
  if(a2>a1) {
      alert("Decorator Payment not greater than Due Amount.");
      document.getElementById("ppaid").value = 0;
  } else {
    var a3 =(a1-a2);
  }
  document.getElementById("ddue").value = a3 || 0;
}
</script>