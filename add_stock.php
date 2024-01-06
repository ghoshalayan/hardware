<?php include "include/header.php"; ?>

    <div id="wrapper">
    
        <?php include "top-menu.php"; ?>
<?php
if(isset($_POST['add'])) {
  $bill_num = $_POST['bill_num'];
  $cdate = date("Y-m-d",strtotime($_POST['cdate']));
  $purchase_from = $_POST['purchase_from'];
  $paytype = $_POST['paytype'];
  $tamount = $_POST['tamount'];
  $apayment = $_POST['apayment'];
  $ramount = $_POST['ramount'];

  $sql=mysqli_query($conn, "INSERT INTO invoice(bill_no,bill_date,purchase_from,payment_mode,total_amount,advance_payment,remaining_amount) 
  VALUES ('$bill_num','$cdate','$purchase_from','$paytype','$tamount','$apayment','$ramount')");
  $last_id = mysqli_insert_id($conn);
  
  $name = $_POST['name'];
  $quantity = $_POST['quantity'];
  $purchase = $_POST['purchase'];
  $selling = $_POST['selling'];
  $description = $_POST['description'];
  
  for($i=0; $i<count($name); $i++) {
      $ptotal = round(($quantity[$i]*$purchase[$i]), 2);
      $stotal = round(($quantity[$i]*$selling[$i]), 2);
      $profit = ($stotal-$ptotal);
      
      $sql=mysqli_query($conn, "INSERT INTO stock(invoice_id,pname,quantity,balance_quanity,pprice,sprice,item_desc,ptotal,stotal,profit) 
      VALUES ('$last_id','$name[$i]','$quantity[$i]','$quantity[$i]','$purchase[$i]','$selling[$i]','$description[$i]','$ptotal','$stotal','$profit')");
      
      $show = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `product` where `product_id` = '".$name[$i]."'"));
      if(($show['quantity']=="") || ($show['quantity']=="0")) {
          $tquantity = $quantity[$i];
      } else {
          $tquantity = ($show['quantity']+$quantity[$i]);
      }
      $sql_query = mysqli_query($conn, "UPDATE `product` SET
            `quantity` = '".$tquantity."'
             WHERE `product_id` = '".$name[$i]."'");
  }
  
  if ($sql) {
      echo "<script>alert('New Item Added Successfully.')</script>";
      echo "<script>location.href='add_stock.php'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_stock.php'</script>";
  }
}
if(isset($_POST['addproduct'])) {      
  $category = $_POST['category'];
  $sub_category = $_POST['sub_category']; 
  $pname = $_POST['pname'];
  $pvolume = $_POST['pvolume'];
  $pdescription = $_POST['pdescription'];

  $sql=mysqli_query($conn, "INSERT INTO product(category_id,sub_category_id,product_name,product_volume,product_desc) 
  VALUES ('$category','$sub_category','$pname','$pvolume','$pdescription')");
  if ($sql) {
      echo "<script>alert('New Product Added Successfully.')</script>";
      echo "<script>selectRefresh();</script>";
      echo "<script>location.href='add_stock.php'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_stock.php'</script>";
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
                                <i class="fa fa-dashboard"></i> Add New Stock
                            </li>
                            <li style="float:right;"><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">Add Product</button></li>
                        </ol>
                    </div>
                </div>
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label>Bill Number</label>
                          <input class="form-control" name="bill_num" value="" type="text" placeholder="Enter Bill Number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label>Date</label>
                          <input class="form-control" name="cdate" value="" type="date" placeholder="Enter Date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label>Purchase From</label>
                          <input class="form-control" name="purchase_from" value="" type="text" placeholder="Enter Purchase From">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="sumtable">
                          <thead>
                            <tr class="success">
                              <th>Item Name</th>
                              <th>Quantity</th>
                              <th>Purchase Price (Per Unit)</th>
                              <th>Selling Price (Per Unit)</th>
                              <th>Item Description</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody class="field_wrapper" id="product_table">
                            <tr>
                              <td>
                                  <select class="form-control select2" name="name[]" required style="height:34px;">
                                    <option selected="selected">Select Product</option>
                                    <?php $sql_stock=mysqli_query($conn, "SELECT * FROM product ORDER BY product_id ASC");
                                    while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                        <option value="<?php echo $show_stock['product_id']; ?>"><?php echo $show_stock['product_name']; ?> ( <?php echo $show_stock['product_volume']; ?> )</option>
                                    <?php } ?>
                                  </select></td>
                              <td><input class="quantity form-control" name="quantity[]" type="number" placeholder="Enter Quantity" required></td>
                              <td><input class="price form-control" name="purchase[]" type="number" placeholder="Enter Purchase Price" required><input class="subtot" id="subtot" type="hidden"></td>
                              <td><input class="form-control" name="selling[]" type="number" placeholder="Enter Selling Price" required></td>
                              <td><textarea class="form-control" name="description[]" rows="4" cols="50" placeholder="Enter Item description" style="height: 50px;"></textarea></td>
                              <td><a href="javascript:void(0);" class="add_button" title="Add field"><img src="images/add-icon.png"/></a></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                        	<label>Payment mode <span class="text-danger">*</span></label>
                        	<select class="form-control" name="paytype" id="paytype" required="">
                        		<option>Select Pay Mode</option>
                        		<option value="Cash">Cash</option>
                        		<option value="Google pay">Google pay</option>
                        		<option value="UPI/Net banking">UPI/Net banking</option>
                        		<option value="Credit card">Credit card</option>
                        		<option value="Debit card">Debit card</option>
                        		<option value="Cheque">Cheque</option>
                        		<option value="Paytm">Paytm</option>													
                        	</select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Total Amount</label>
                          <input class="form-control" id="tamount" name="tamount" onkeyup="calc()" type="text" placeholder="Enter Total Amount">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Advance Payment</label>
                          <input class="form-control" id="apayment" name="apayment" onkeyup="calc()" type="text" placeholder="Enter Advance Payment">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Remaining Amount</label>
                          <input class="form-control" id="ramount" name="ramount" type="text" placeholder="Enter Remaining Amount">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input name="add" class="btn btn-primary" type="submit" value="Submit" />
                        </div>
                    </div>
                </div>
                </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Product</h4>
      </div>
      <div class="modal-body">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
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
                          <label>Product Name</label>
                          <input class="form-control" name="pname" value="" type="text" placeholder="Enter Product Name" required>
                        </div>
                        <div class="form-group">
                          <label>Product Volume (Ltr / ml / Kg / grm)</label>
                          <input class="form-control" name="pvolume" value="" type="text" placeholder="Enter Product Volume" required>
                        </div>
                        <div class="form-group">
                          <label>Product description</label>
                          <textarea class="form-control" name="pdescription" rows="4" cols="50" placeholder="Enter Product description"></textarea>
                        </div>
                        <div class="form-group">
                            <input name="addproduct" class="btn btn-primary" type="submit" value="Submit" />
                        </div>
                    </div>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>

<?php include "include/footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var maxField = 30;
	var addButton = $('.add_button'); 
	var wrapper = $('.field_wrapper'); 
	var fieldHTML = '<tr><td><select class="form-control select2" name="name[]" required style="height:34px;"><option selected="selected">Select Product</option><?php $sql_stock=mysqli_query($conn, "SELECT * FROM product ORDER BY product_id ASC"); while($show_stock = mysqli_fetch_array($sql_stock)) { ?><option value="<?php echo $show_stock['product_id']; ?>"><?php echo $show_stock['product_name']; ?> ( <?php echo $show_stock['product_volume']; ?> )</option><?php } ?></select></td><td><input class="quantity form-control" name="quantity[]" type="number" placeholder="Enter Quantity" required></td><td><input class="price form-control" name="purchase[]" type="number" placeholder="Enter Purchase Price" required><input class="subtot" id="subtot" type="hidden"></td><td><input class="form-control" name="selling[]" type="number" placeholder="Enter Selling Price" required></td><td><textarea class="form-control" name="description[]" rows="4" cols="50" placeholder="Enter Item description" style="height: 50px;"></textarea></td><td><a href="javascript:void(0);" class="remove_button"><img src="images/remove-icon.png"/></a></td></tr>'; //New input field html 
	var x = 1; 
	$(addButton).click(function(){
		if(x < maxField){ 
			x++; 
			$(wrapper).append(fieldHTML);
			selectRefresh();
		}
	});
	$(wrapper).on('click', '.remove_button', function(e){
		e.preventDefault();
		$(this).closest('tr').remove(); 
		x--; 
	});
});
function selectRefresh(){
    $('.select2').select2({
        tags:true,
        allowClear: true,
        width:'100%'
    });
}
</script>
<script>
const table = document.getElementById('product_table');
const grandTotal = 0;
table.addEventListener('input', ({ target }) => {
  const tr = target.closest('tr');
  const [price, quantity, total] = tr.querySelectorAll('input');
  total.value = price.value * quantity.value;
  selectSum();
});

function selectSum() {
    var calculated_total_sum = 0;
    $("#sumtable .subtot").each(function () {
    var get_textbox_value = $(this).val();
        if ($.isNumeric(get_textbox_value)) {
            calculated_total_sum += parseFloat(get_textbox_value);
        }                  
    });
    document.getElementById("tamount").value = calculated_total_sum;
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script>
$(document).ready(function() {
    $('.select2').select2({
        closeOnSelect: true
    });
});
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
</script>
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