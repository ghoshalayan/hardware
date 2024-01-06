<?php include "include/header.php"; ?>

    <div id="wrapper">
    
        <?php include "top-menu.php"; ?>
<?php
if(isset($_POST['add'])) {
$show_bill = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM sales ORDER BY bill_number DESC LIMIT 1"));

  $tprice = "";
  $quantity = $_POST['quantity'];
  $iname = $_POST['iname'];
  for($i=0; $i<count($iname); $i++) {
      $sql_pprice = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM stock WHERE stock.pname='".$iname[$i]."'"));
      $tprice +=($sql_pprice['pprice']*$quantity[$i]);
  }
  
  $name = $_POST['name'];
  $bill_num = $_POST['bill_num'];
  $cdate = date("Y-m-d",strtotime($_POST['cdate']));
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $decorator = $_POST['decorator'];
  $dtamount = $_POST['dtamount'];
  $dapayment = $_POST['dapayment'];
  $dramount = $_POST['dramount'];
  $paytype = $_POST['paytype'];
  $tamount = $_POST['tamount'];
  $apayment = $_POST['apayment'];
  $ramount = $_POST['ramount'];
  $desc = $_POST['desc'];
  $ddescription = $_POST['ddescription'];

  $sql=mysqli_query($conn, "INSERT INTO sales(bill_number,name,address,phone,email,pay_mode,total_purchase_amount,total_amount,paid,due,description,decorator_id,next_payment_date) 
  VALUES ('$bill_num','$name','$address','$phone','$email','$paytype','$tprice','$tamount','$apayment','$ramount','$desc','$decorator','$cdate')");
  $last_id = mysqli_insert_id($conn);
  
  $sql1=mysqli_query($conn, "INSERT INTO decorator_commision(sales_id,decorator_id,decorator_amount,decorator_paid,decorator_due,description) 
  VALUES ('$last_id','$decorator','$dtamount','$dapayment','$dramount','$ddescription')");
  
  $tprice = $_POST['tprice'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  
  for($i=0; $i<count($iname); $i++) {
      $sql=mysqli_query($conn, "INSERT INTO item_sales(sales_id,item_name,quantity,price,total_price,description) 
      VALUES ('$last_id','$iname[$i]','$quantity[$i]','$price[$i]','$tprice[$i]','$description[$i]')");
      
      $show = mysqli_fetch_array(mysqli_query($conn, "SELECT * from `stock` where `pname` = '$iname[$i]'"));
      $rest_quantity = ($show['quantity']-$quantity[$i]);
      $irest_quantity = ($show['issued_quantity']+$quantity[$i]);
      
      $sql_query = mysqli_query($conn, "UPDATE `stock` SET
            `issued_quantity` = '".$irest_quantity."',
            `balance_quanity` = '".$rest_quantity."'
             WHERE `stock_id` = '".$show['stock_id']."'");
  }
  
  if ($sql) {
      echo "<script>alert('New Sales Added Successfully.')</script>";
      echo "<script>location.href='print_sales.php?view_id=$last_id'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_sales.php'</script>";
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
      echo "<script>location.href='add_sales.php'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_sales.php'</script>";
  }
}
if(isset($_POST['addcategory'])) {    
  $name = $_POST['category'];

  $sql=mysqli_query($conn, "INSERT INTO category(name) VALUES ('$name')");
  if ($sql) {
      echo "<script>alert('New Category Added Successfully.')</script>";
      echo "<script>selectRefresh();</script>";
      echo "<script>location.href='add_sales.php'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_sales.php'</script>";
  }
}
if(isset($_POST['addsubcategory'])) {    
  $sname = $_POST['sname'];    
  $name = $_POST['name'];

  $sql=mysqli_query($conn, "INSERT INTO sub_category(category_id,name) VALUES ('$sname','$name')");
  if ($sql) {
      echo "<script>alert('New Sub Category Added Successfully.')</script>";
      echo "<script>selectRefresh();</script>";
      echo "<script>location.href='add_sales.php'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_sales.php'</script>";
  }
}
if(isset($_POST['addstock'])) {
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
      echo "<script>selectRefresh();</script>";
      echo "<script>location.href='add_sales.php'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_sales.php'</script>";
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
                                <i class="fa fa-dashboard"></i> Add New Sales
                            </li>
                            <li style="float:right;"><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">Add Product</button></li>
                            <li style="float:right;"><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#mySubCategory">Add Sub Category</button></li>
                            <li style="float:right;"><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myCategory">Add Category</button></li>
                            <li style="float:right;"><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myStock">Add Stock</button></li>
                        </ol>
                    </div>
                </div>
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Bill Number</label>
                          <input class="form-control" name="bill_num" value="<?php $show_bill = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM sales ORDER BY bill_number DESC LIMIT 1")); echo ($show_bill['bill_number']+1); ?>" type="text" placeholder="Enter Bill Number">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Name</label>
                          <input class="form-control" name="name" value="" type="text" placeholder="Enter Name" tabindex="1">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Phone</label>
                          <input class="form-control" name="phone" value="" type="text" placeholder="Enter Phone" tabindex="2">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label>Email</label>
                          <input class="form-control" name="email" value="" type="email" placeholder="Enter Email" tabindex="3">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label>Next Payment Date</label>
                          <input class="form-control" name="cdate" value="" type="date" placeholder="Enter Date" tabindex="4">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label>Address</label>
                          <textarea class="form-control" name="address" rows="4" cols="50" placeholder="Enter Address" style="height: 50px;" tabindex="5"></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label>Description</label>
                          <textarea class="form-control" name="desc" rows="4" cols="50" placeholder="Enter Description" style="height: 50px;" tabindex="6"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                          <label>Select Decorator</label>
                          <select class="form-control select2" name="decorator" style="height:40px;" onchange="showDiv(this.value)" tabindex="7">
                            <option selected="selected">Select Decorator</option>
                            <?php $sql_stock=mysqli_query($conn, "SELECT * FROM decorator ORDER BY decorator_id ASC");
                            while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                <option value="<?php echo $show_stock['decorator_id']; ?>"><?php echo $show_stock['name']; ?> ( <?php echo $show_stock['phone']; ?> )</option>
                            <?php } ?>
                          </select>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row" id="DecoratorDiv" style="display:none;">
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label>Decorator Total Amount</label>
                                  <input class="form-control" id="dtamount" name="dtamount" onkeyup="calc1()" type="text" placeholder="Total Amount" tabindex="8">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label>Decorator Advance Payment</label>
                                  <input class="form-control" id="dapayment" name="dapayment" onkeyup="calc1()" type="text" placeholder="Advance Payment" tabindex="9">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label>Decorator Remaining Amount</label>
                                  <input class="form-control" id="dramount" name="dramount" type="text" placeholder="Remaining Amount" tabindex="10">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Decorator Description</label>
                                  <textarea class="form-control" name="ddescription" rows="4" cols="50" placeholder="Enter Description" style="height:60px;" tabindex="11"></textarea>
                                </div>
                            </div>
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
<!-- Add Product -->
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
<!-- Add Category -->
<div id="myCategory" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Category</h4>
      </div>
      <div class="modal-body">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                          <label>Category Name</label>
                          <input class="form-control" name="category" value="" type="text" placeholder="Enter Category Name" required>
                        </div>
                        <div class="form-group">
                            <input name="addcategory" class="btn btn-primary" type="submit" value="Submit" />
                        </div>
                    </div>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!-- Add Sub Category -->
<div id="mySubCategory" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Sub Category</h4>
      </div>
      <div class="modal-body">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Category Name</label>
                            <select class="form-control" name="sname" required>
                                  <option>Select Category</option>
                                  <?php $sql_employee=mysqli_query($conn, "SELECT * FROM category ORDER BY category_id ASC");
                                  while($show_employee = mysqli_fetch_array($sql_employee)) { ?>
                                  <option value="<?php echo $show_employee['category_id']; ?>"><?php echo $show_employee['name']; ?></option>
                                  <?php } ?>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label>Sub Category Name</label>
                            <input class="form-control" name="name" value="" type="text" placeholder="Enter Sub Category Name" required>
                        </div>
                        <div class="form-group">
                            <input name="addsubcategory" class="btn btn-primary" type="submit" value="Submit" />
                        </div>
                    </div>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!-- Add Stock -->
<div id="myStock" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Stock</h4>
      </div>
      <div class="modal-body">
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
                            <input name="addstock" class="btn btn-primary" type="submit" value="Submit" />
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
		selectSum();
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