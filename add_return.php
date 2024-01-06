<?php include "include/header.php"; ?>

    <div id="wrapper">
    
        <?php include "top-menu.php"; ?>
<?php
if(isset($_POST['add'])) {
  $customer = $_POST['customer'];
  $show_cus = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM sales WHERE sales_id='".$customer."'"));

  $sql=mysqli_query($conn, "INSERT INTO sales(bill_number,name,address,phone,email,pay_mode,total_amount,paid,due,description,decorator_id,next_payment_date,refer_type) 
  VALUES ('".$show_cus['bill_number']."','".$show_cus['name']."','".$show_cus['address']."','".$show_cus['phone']."','".$show_cus['email']."','".$show_cus['pay_mode']."','".$show_cus['total_amount']."','".$show_cus['paid']."','".$show_cus['due']."','".$show_cus['description']."','".$show_cus['decorator_id']."','".$show_cus['next_payment_date']."','R')");
  $last_id = mysqli_insert_id($conn);
  
  $iname = $_POST['iname'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $tprice = $_POST['tprice'];
  $description = $_POST['description'];
  
  for($i=0; $i<count($iname); $i++) {
      $sql=mysqli_query($conn, "INSERT INTO item_sales(sales_id,item_name,quantity,price,total_price,description,refer_type) 
      VALUES ('$last_id','$iname[$i]','$quantity[$i]','$price[$i]','$tprice[$i]','$description[$i]','R')");
      
      $show = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `stock` where `pname` = '$iname[$i]'"));
      $rest_quantity = ($show['quantity']-$quantity[$i]);
      $irest_quantity = ($show['issued_quantity']+$quantity[$i]);
      
      $sql_query = mysqli_query($conn, "UPDATE `stock` SET
            `issued_quantity` = '".$irest_quantity."',
            `balance_quanity` = '".$rest_quantity."'
             WHERE `stock_id` = '".$show['stock_id']."'");
  }
  
  if ($sql) {
      echo "<script>alert('New Return Added Successfully.')</script>";
      echo "<script>location.href='add_return.php'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_return.php'</script>";
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
                                <i class="fa fa-dashboard"></i> Add New Return
                            </li>
                        </ol>
                    </div>
                </div>
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Select Customer</label>
                          <select class="form-control select2" name="customer" id="customer" style="height:40px;">
                            <option selected="selected">Select Customer</option>
                            <?php $sql_cus = mysqli_query($conn, "SELECT * FROM item_sales INNER JOIN sales ON item_sales.sales_id = sales.sales_id");
                            while($show_cus = mysqli_fetch_array($sql_cus)) { ?>
                                <option value="<?php echo $show_cus['sales_id']; ?>"><?php echo $show_cus['name']; ?> ( <?php echo $show_cus['phone']; ?> )</option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div id="response"></div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="sumtable">
                          <thead>
                            <tr class="success">
                              <th>Item Name</th>
                              <th>Balance Quantity</th>
                              <th>Quantity</th>
                              <th>Price (Per Unit)</th>
                              <th>Discount (%)</th>
                              <th>Total Price</th>
                              <th>Item Description</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody class="field_wrapper" id="product_table">
        			  		<?php $arrayNumber = 0;
        			  		for($x = 1; $x < 2; $x++) { ?>
    			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">
                              <td>
                                  <select class="form-control select2" name="iname[]" required style="height:34px;" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" tabindex="12">
                                    <option selected="selected">Select Product</option>
                                    <?php $sql_stock=mysqli_query($conn, "SELECT * FROM stock INNER JOIN product ON stock.pname =product.product_id WHERE stock.balance_quanity>0 ORDER BY stock.pname ASC");
                                    while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                        <option value="<?php echo $show_stock['pname']; ?>"><?php echo $show_stock['product_name']; ?> ( <?php echo $show_stock['product_volume']; ?> ) - ( <?php echo $show_stock['balance_quanity']; ?> ) - ( Rs. <?php echo $show_stock['sprice']; ?> )</option>
                                    <?php } ?>
                                  </select></td>
                              <td><p id="available_quantity<?php echo $x; ?>"></p></td>
                              <td><input class="quantity form-control" name="quantity[]" type="text" placeholder="Enter Quantity"  tabindex="13" required></td>
                              <td><input class="price form-control" name="price[]" id="rate<?php echo $x; ?>" type="text" placeholder="Enter Price"></td>
                              <td>
                                  <select class="form-control" name="discount[]">
                                      <option selected="selected">Select %</option>
                                      <option value="1">1 %</option>
                                      <option value="2">2 %</option>
                                      <option value="4">3 %</option>
                                      <option value="5">5 %</option>
                                      <option value="6">6 %</option>
                                      <option value="7">7 %</option>
                                      <option value="8">8 %</option>
                                      <option value="9">9 %</option>
                                      <option value="10">10 %</option>
                                  </select>
                              </td>
                              <td><input class="subtot form-control" name="tprice[]" id="subtot" type="text" placeholder="Enter Total Price" tabindex="14" required></td>
                              <td><textarea class="form-control" name="description[]" rows="4" cols="50" placeholder="Enter Item description" tabindex="15" style="height: 50px;"></textarea></td>
                              <td><a href="javascript:void(0);" class="add_button" title="Add field"><img src="images/add-icon.png"/></a></td>
                            </tr>
        		  			<?php $arrayNumber++; }  ?>
                          </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                        	<label>Payment mode <span class="text-danger">*</span></label>
                        	<select class="form-control" name="paytype" id="paytype" required tabindex="16">
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
                          <input class="grdtot form-control" id="tamount" name="tamount" onkeyup="calc()" type="text" placeholder="Enter Total Amount" tabindex="17">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Advance Payment</label>
                          <input class="form-control" id="apayment" name="apayment" onkeyup="calc()" type="text" placeholder="Enter Advance Payment" tabindex="18">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Remaining Amount</label>
                          <input class="form-control" id="ramount" name="ramount" type="text" placeholder="Enter Remaining Amount" tabindex="19">
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
<script>
function getProductData(row = null) {
	if(row) {
		var productId = $("#productName"+row).val();
		if(productId == "") {
			$("#rate"+row).val("");
			$("#available_quantity"+row).val("");
		} else {
			$.ajax({
				url: 'fetchSelectedProduct.php',
				type: 'post',
				data: {productId : productId},
				dataType: 'json',
				success:function(response) {
					$("#rate"+row).val(response.sprice);
					$("#available_quantity"+row).text(response.balance_quanity);
				}
			});
		}
				
	} else {
		alert('no row! please refresh the page');
	}
}
</script>
<script type="text/javascript">
$(document).ready(function() {
    alert("afdasfa");
    var maxField = 30;
    var addButton = $('.add_button'); 
    var wrapper = $('.field_wrapper'); 
	$(addButton).click(function(){
    	var tableLength = $("#sumtable tbody tr").length;
    	var tableRow;
    	var arrayNumber;
    	var count;
    	if(tableLength > 0) {		
    		tableRow = $("#sumtable tbody tr:last").attr('id');
    		arrayNumber = $("#sumtable tbody tr:last").attr('class');
    		count = tableRow.substring(3);	
    		count = Number(count) + 1;
    		arrayNumber = Number(arrayNumber) + 1;					
    	} else {
    		count = 1;
    		arrayNumber = 0;
    	}
    	var fieldHTML = '<tr id="row'+count+'" class="'+arrayNumber+'"><td><select class="form-control select2" name="iname[]" required style="height:34px;" id="productName'+count+'" onchange="getProductData('+count+')"><option selected="selected">Select Product</option><?php $sql_stock=mysqli_query($conn, "SELECT * FROM stock INNER JOIN product ON stock.pname =product.product_id WHERE stock.balance_quanity>0 ORDER BY stock.pname ASC"); while($show_stock = mysqli_fetch_array($sql_stock)) { ?><option value="<?php echo $show_stock['product_id']; ?>" data-price="<?php echo $show_stock['sprice']; ?>"><?php echo $show_stock['product_name']; ?> ( <?php echo $show_stock['product_volume']; ?> ) - ( <?php echo $show_stock['quantity']; ?> ) - ( Rs. <?php echo $show_stock['sprice']; ?> )</option><?php } ?></select></td><td><p id="available_quantity'+count+'"></p></td><td><input class="quantity form-control" name="quantity[]" type="text" placeholder="Enter Quantity"  required></td><td><input class="price form-control" name="price[]" id="rate'+count+'" type="text" placeholder="Enter Price"></td><td><select class="form-control" name="discount[]"><option selected="selected">Select %</option><option value="1">1 %</option><option value="2">2 %</option><option value="4">3 %</option><option value="5">5 %</option><option value="6">6 %</option><option value="7">7 %</option><option value="8">8 %</option><option value="9">9 %</option><option value="10">10 %</option></select></td><td><input class="subtot form-control" id="subtot" name="tprice[]" type="text" placeholder="Enter Total Price" required></td><td><textarea class="form-control" name="description[]" rows="4" cols="50" placeholder="Enter Item description" style="height: 50px;"></textarea></td><td><a href="javascript:void(0);" class="remove_button"><img src="images/remove-icon.png"/></a></td></tr>';
    	var x = 1;
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
function showDiv(did) {
    if(did=="Select Decorator"){
        document.getElementById('DecoratorDiv').style.display = "none";
    } else {
        document.getElementById('DecoratorDiv').style.display = "block";
    }
}
</script>
<script>
const table = document.getElementById('product_table');
const grandTotal = 0;
table.addEventListener('input', ({ target }) => {
  const tr = target.closest('tr');
  const [price, quantity, total] = tr.querySelectorAll('input');
  total.value = (price.value * quantity.value).toFixed(2);
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
$("#customer").on("change", function() {
        var selectedCustomer = $("#customer").val();
        $.ajax({
          type: "POST",
          url: "process-request.php",
          data: { customer: selectedCustomer },
          cache: false,
          success: function(result) {
            $("#response").html(result);
          }
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
function calc1() {
  var a3 = parseInt(document.getElementById("dtamount").value);
  var a4 = parseInt(document.getElementById("dapayment").value);
  if(a4>a3) {
      alert("Decorator Advance Payment not greater than Total Amount.");
      document.getElementById("dapayment").value = 0;
  } else {
    var a5 =(a3-a4);
  }
  document.getElementById("dramount").value = a5 || 0;
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