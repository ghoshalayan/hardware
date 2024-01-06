<?php include "include/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "top-menu.php"; ?>
<?php
if($_REQUEST['flag'] == "delete")
{
  mysqli_query($conn, "DELETE FROM `stock` WHERE `stock_id` = '$_REQUEST[del_id]'");
  echo "<script>alert('Successfully deleted the record.')</script>"; 
  echo "<script>location.href='view_stock.php'</script>";
}
if(isset($_POST['update'])) {     
  $invoice_id = $_POST['invoice_id'];    
  $bill_num = $_POST['bill_num'];
  $cdate = date("Y-m-d",strtotime($_POST['cdate']));
  $purchase_from = $_POST['purchase_from'];
  $paytype = $_POST['paytype'];
  $tamount = $_POST['tamount'];
  $apayment = $_POST['advance_payment'];
  $ramount = $_POST['remaining_amount'];

  $sql_query = mysqli_query($conn, "UPDATE `invoice` SET
            `bill_no` = '".$bill_num."',
            `bill_date` = '".$cdate."',
            `purchase_from` = '".$purchase_from."',
            `payment_mode` = '".$paytype."',
            `total_amount` = '".$tamount."',
            `advance_payment` = '".$apayment."',
            `remaining_amount` = '".$ramount."'
             WHERE `invoice_id` = '".$invoice_id."'");
  if ($sql_query) {
      echo "<script>alert('Update Record Successfully.')</script>";
      echo "<script>location.href='view_stock.php'</script>";
  } else {
  echo "<script>alert('Some Error On Update.')</script>"; 
  echo "<script>location.href='view_stock.php'</script>";
  }
}
if(isset($_POST['update1'])) {     
  $stock_id = $_POST['stock_id']; 
  $pprice = $_POST['pprice'];
  $sprice = $_POST['sprice'];

  $sql_query = mysqli_query($conn, "UPDATE `stock` SET
            `pprice` = '".$pprice."',
            `sprice` = '".$sprice."'
             WHERE `stock_id` = '".$stock_id."'");
  if ($sql_query) {
      echo "<script>alert('Update Record Successfully.')</script>";
      echo "<script>location.href='view_stock.php'</script>";
  } else {
  echo "<script>alert('Some Error On Update.')</script>"; 
  echo "<script>location.href='view_stock.php'</script>";
  }
}
if(isset($_POST['update2'])) { 
  $category = $_POST['category'];
  $sub_category = $_POST['sub_category'];
  $pprice = $_POST['pprice'];
  $sprice = $_POST['sprice'];
  
  $sql_cat = mysqli_query($conn, "SELECT * FROM product WHERE category_id='".$category."' AND sub_category_id='".$sub_category."'");
  
  while($show_cat = mysqli_fetch_array($sql_cat)) { 
      
    $sql_product = mysqli_query($conn, "SELECT * FROM stock WHERE pname='".$show_cat['product_id']."'");
    
    while($show_product = mysqli_fetch_array($sql_product)) {
        
        $price = $show_product['pprice'];
        $upprice = $price + ($pprice / 100 ) * $price;
        
        $price1 = $show_product['sprice'];
        $usprice = $price1 + ($sprice / 100 ) * $price1;
        
        $sql_query = mysqli_query($conn, "UPDATE `stock` SET
            `pprice` = '".$upprice."',
            `sprice` = '".$usprice."'
             WHERE `stock_id` = '".$show_product['stock_id']."'");
    }
  }
  
  if ($sql_query) {
      echo "<script>alert('Update Record Successfully.')</script>";
      echo "<script>location.href='view_stock.php'</script>";
  } else {
  echo "<script>alert('Some Error On Update.')</script>"; 
  echo "<script>location.href='view_stock.php'</script>";
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
                                <i class="fa fa-dashboard"></i> View All Stocks
                            </li>
                            <li style="float:right;"><button class="btn btn-primary btn-xs" onclick="ExportToExcel('xlsx')">Export Excel</button></li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-10 col-md-10">
                      <div class="panel panel-default">
                          <div class="panel-body">
                            <table class="table table-bordered" id="example">
                              <thead>
                                <tr>
                                  <th>Sl No</th>
                                  <th>Item Name</th>
                                  <th>Quantity</th>
                                  <?php if($_SESSION['cus']['role']=="User") { } else { ?>
                                  <th>Purchase Price</th>
                                  <?php } ?>
                                  <th>Selling Price</th>
                                  <th>Description</th>
                                  <?php if($_SESSION['cus']['role']=="User") { } else { ?>
                                  <th>Action</th>
                                  <?php } ?>
                                </tr>
                              </thead>
                              <tbody>
                            <?php $i = 1;
                              $sql_stock=mysqli_query($conn, "SELECT * FROM stock ORDER BY stock_id ASC");
                              while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php $sql_pname=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product WHERE product_id='".$show_stock['pname']."'")); echo $sql_pname['product_name']; ?> ( <?php echo $sql_pname['product_volume']; ?> )</td>
                                  <td><?php echo $show_stock['balance_quanity']; ?></td>
                                  <?php if($_SESSION['cus']['role']=="User") { } else { ?>
                                  <td><?php echo $show_stock['pprice']; ?></td>
                                  <?php } ?>
                                  <td><?php echo $show_stock['sprice']; ?></td>
                                  <td><?php echo $show_stock['item_desc']; ?></td>
                                  <?php if($_SESSION['cus']['role']=="User") { } else { ?>
                                  <td style="display: inherit;"><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal<?php echo $i; ?>">Edit</button> &nbsp; <a class="btn btn-danger btn-xs" href="view_stock.php?flag=delete&del_id=<?php echo $show_stock['stock_id']; ?>" onclick="return confirm('Are you sure to delete the record?')">Delete</a></td>
                                    <div id="myModal<?php echo $i; ?>" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Update Price</h4>
                                          </div>
                                          <div class="modal-body">
                                                <ul class="nav nav-tabs">
                                                  <li class="active"><a data-toggle="tab" href="#item<?php echo $i; ?>">By Item Wise</a></li>
                                                  <li><a data-toggle="tab" href="#category<?php echo $i; ?>">By Category Wise</a></li>
                                                </ul>
                                                
                                                <div class="tab-content">
                                                  <div id="item<?php echo $i; ?>" class="tab-pane fade in active">
                                                      <p style="margin: 0;">&nbsp;</p>
                                                      <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                                        <input name="stock_id" value="<?php echo $show_stock['stock_id']; ?>" type="hidden">
                                                        <div class="form-group">
                                                          <label>Purchase Price</label>
                                                          <input class="form-control" name="pprice" value="<?php echo $show_stock['pprice']; ?>" type="text" placeholder="Enter Purchase Price" required>
                                                        </div>
                                                        <div class="form-group">
                                                          <label>Selling Price</label>
                                                          <input class="form-control" name="sprice" value="<?php echo $show_stock['sprice']; ?>" type="text" placeholder="Enter Selling Price" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="update1" class="btn btn-primary" type="submit" value="Update" />
                                                        </div>
                                                      </form>
                                                  </div>
                                                  <div id="category<?php echo $i; ?>" class="tab-pane fade">
                                                      <p style="margin: 0;">&nbsp;</p>
                                                      <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                                        <div class="form-group">
                                                          <label>Category Name</label>
                                                           <select class="form-control" name="category" id="country-dropdown" required>
                                                              <option>Select Category</option>
                                                              <?php $sql_employee=mysqli_query($conn, "SELECT * FROM category ORDER BY category_id ASC");
                                                              while($show_employee = mysqli_fetch_array($sql_employee)) { ?>
                                                              <option value="<?php echo $show_employee['category_id']; ?>"><?php echo $show_employee['name']; ?></option>
                                                              <?php } ?>
                                                            </select> 
                                                        </div>
                                                        <div class="form-group">
                                                          <label>Sub Category Name</label>
                                                           <select class="form-control" name="sub_category" id="state-dropdown" required>
                                                              <option>Select Sub Category</option>
                                                            </select> 
                                                        </div>
                                                        <div class="form-group">
                                                          <label>Purchase Price %</label>
                                                          <input class="form-control" name="pprice" type="number" placeholder="Enter Purchase Price %" step="any" required>
                                                        </div>
                                                        <div class="form-group">
                                                          <label>Selling Price %</label>
                                                          <input class="form-control" name="sprice" type="number" placeholder="Enter Selling Price %" step="any" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="update2" class="btn btn-primary" type="submit" value="Update" />
                                                        </div>
                                                      </form>
                                                  </div>
                                                </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  <?php } ?>
                                </tr>
                                <?php $i++; } ?>
                              </tbody>
                            </table>
                          </div>              
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                    <?php if($_REQUEST['flag'] == "edit") {
                          $show = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `invoice` where `invoice_id` = '$_REQUEST[edit_id]'")); ?>
                      <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input name="invoice_id" value="<?php echo $show['invoice_id']; ?>" type="hidden">
                        <div class="form-group">
                          <label>Bill Number</label>
                          <input class="form-control" name="bill_num" value="<?php echo $show['bill_no']; ?>" type="text" placeholder="Enter Bill Number">
                        </div>
                        <div class="form-group">
                          <label>Date</label>
                          <input class="form-control" name="cdate" value="<?php echo $show['bill_date']; ?>" type="date" placeholder="Enter Date">
                        </div>
                        <div class="form-group">
                          <label>Purchase From</label>
                          <input class="form-control" name="purchase_from" value="<?php echo $show['purchase_from']; ?>" type="text" placeholder="Enter Purchase From" required>
                        </div>
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
                        <div class="form-group">
                          <label>Total Amount</label>
                          <input class="form-control" name="total_amount" value="<?php echo $show['total_amount']; ?>" type="text" placeholder="Enter Total Amount">
                        </div>
                        <div class="form-group">
                          <label>Advance Payment</label>
                          <input class="form-control" name="advance_payment" value="<?php echo $show['advance_payment']; ?>" type="text" placeholder="Enter Advance Payment">
                        </div>
                        <div class="form-group">
                          <label>Due Amount</label>
                          <input class="form-control" name="remaining_amount" value="<?php echo $show['remaining_amount']; ?>" type="text" placeholder="Enter Due Amount">
                        </div>
                        <div class="form-group">
                            <input name="update" class="btn btn-primary" type="submit" value="Update" />
                        </div>
                      </form>
                      <?php } ?>
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
$(document).ready(function() {
$('#country-dropdown').on('change', function() {
var country_id = this.value;
$.ajax({
url: "check_sub.php",
type: "POST",
data: {
country_id: country_id
},
cache: false,
success: function(result){
$("#state-dropdown").html(result);
}
});
});    
});
</script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById('example');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
    return dl ?
    XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
    XLSX.writeFile(wb, fn || ('Stocks.' + (type || 'xlsx')));
}
</script>
