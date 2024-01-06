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
                                <i class="fa fa-dashboard"></i> View Profit & Loss
                            </li>
                            <li style="float:right;"><button class="btn btn-primary btn-xs" onclick="ExportToExcel('xlsx')">Export Excel</button></li>
                        </ol>
                    </div>
                </div>
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
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="panel panel-default">
                          <div class="panel-body">
                            <table class="table table-bordered" id="example">
                              <thead>
                                <tr>
                                  <th>Sl No</th>
                                  <th>Item Name</th>
                                  <th>Sales Date</th>
                                  <th>Quantity</th>
                                  <th>PP</th>
                                  <th>SP</th>
                                  <th>P/L</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php $i = 1;
                              if (isset($_POST['search'])) {
                                $from = $_POST["from"];
                                $to = $_POST["to"];
                                $sql_stock = mysqli_query($conn, "SELECT * FROM item_sales WHERE date(insert_date) BETWEEN '$from' AND '$to' ORDER BY item_sales_id DESC");
                              } else {
                                $sql_stock=mysqli_query($conn, "SELECT * FROM item_sales ORDER BY item_sales_id DESC");
                              }
                              while($show_stock = mysqli_fetch_array($sql_stock)) { 
                              $show_dec = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `product` where `product_id` = '".$show_stock['item_name']."'"));
                              $show_pprice = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `stock` where `pname` = '".$show_stock['item_name']."'"));
                              $pp = ($show_stock['quantity']*$show_pprice['pprice']);
                              $sp = $show_stock['total_price']; ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $show_dec['product_name']; ?></td>
                                  <td><?php $timestamp = strtotime($show_stock['insert_date']); $newDate = date('d-m-Y', $timestamp); echo $newDate; ?></td>
                                  <td><?php echo $show_stock['quantity']; ?></td>
                                  <td>Rs. <?php echo $pp; ?></td>
                                  <td>Rs. <?php echo $sp; ?></td>
                                  <td><?php echo ($sp-$pp); ?></td>
                                </tr>
                                <?php $i++; } ?>
                              </tbody>
                            </table>
                          </div>              
                      </div>
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