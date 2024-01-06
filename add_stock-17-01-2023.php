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
      
      $sql=mysqli_query($conn, "INSERT INTO stock(invoice_id,pname,quantity,pprice,sprice,item_desc,ptotal,stotal,profit) 
      VALUES ('$last_id','$name[$i]','$quantity[$i]','$purchase[$i]','$selling[$i]','$description[$i]','$ptotal','$stotal','$profit')");
  }
  
  if ($sql) {
      echo "<script>alert('New Item Added Successfully.')</script>";
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
                <div class="row field_wrapper">
                    <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Item Name</label>
                          <select class="form-control select2" name="name[]" required style="height:34px;">
                            <option selected="selected">Select Product</option>
                            <?php $sql_stock=mysqli_query($conn, "SELECT * FROM product ORDER BY product_id ASC");
                            while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                <option value="<?php echo $show_stock['product_id']; ?>"><?php echo $show_stock['product_name']; ?> ( <?php echo $show_stock['product_volume']; ?> )</option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                          <label>Quantity</label>
                          <input class="form-control" name="quantity[]" type="number" placeholder="Enter Quantity" required>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                          <label>Purchase Price (Per Unit)</label>
                          <input class="form-control" name="purchase[]" type="number" placeholder="Enter Purchase Price" required>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                          <label>Selling Price (Per Unit)</label>
                          <input class="form-control" name="selling[]" type="number" placeholder="Enter Selling Price" required>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                          <label>Item description</label>
                          <textarea class="form-control" name="description[]" rows="4" cols="50" placeholder="Enter Item description" style="height: 50px;"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="images/add-icon.png"/></a>
                    </div>
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

<?php include "include/footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var maxField = 30;
	var addButton = $('.add_button'); 
	var wrapper = $('.field_wrapper'); 
	var fieldHTML = '<div class="row"><div class="col-lg-3"><div class="form-group"><label>Item Name</label><select class="form-control select2" name="name[]" required style="height:34px;"><option selected="selected">Select Product</option><?php $sql_stock=mysqli_query($conn, "SELECT * FROM product ORDER BY product_id ASC"); while($show_stock = mysqli_fetch_array($sql_stock)) { ?><option value="<?php echo $show_stock['product_id']; ?>"><?php echo $show_stock['product_name']; ?> ( <?php echo $show_stock['product_volume']; ?> )</option><?php } ?></select></div></div><div class="col-lg-2"><div class="form-group"><label>Quantity</label><input class="form-control" name="quantity[]" value="" type="number" placeholder="Enter Quantity"></div></div><div class="col-lg-2"><div class="form-group"><label>Purchase Price</label><input class="form-control" name="purchase[]" value="" type="number" placeholder="Enter Purchase Price"></div></div><div class="col-lg-2"><div class="form-group"><label>Selling Price</label><input class="form-control" name="selling[]" value="" type="number" placeholder="Enter Selling Price"></div></div><div class="col-lg-2"><div class="form-group"><label>Item description</label><textarea class="form-control" name="description[]" rows="4" cols="50" placeholder="Enter Item description" style="height: 50px;"></textarea></div></div><a href="javascript:void(0);" class="remove_button"><img src="images/remove-icon.png"/></a></div></div>'; //New input field html 
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
		$(this).parent('div').remove(); 
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