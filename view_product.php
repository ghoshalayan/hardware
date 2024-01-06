<?php include "include/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "top-menu.php"; ?>
<?php
if($_REQUEST['flag'] == "delete")
{
  mysqli_query($conn, "DELETE FROM `product` WHERE `product_id` = '$_REQUEST[del_id]'");
  echo "<script>alert('Successfully deleted the record.')</script>"; 
  echo "<script>location.href='view_product.php'</script>";
}
if(isset($_POST['update'])) {     
  $serial_no = $_POST['serial_no'];      
  $category = $_POST['category'];
  $sub_category = $_POST['sub_category']; 
  $pname = $_POST['pname'];
  $pvolume = $_POST['pvolume'];
  $pdescription = $_POST['pdescription'];

  $sql_query = mysqli_query($conn, "UPDATE `product` SET
            `category_id` = '".$category."',
            `sub_category_id` = '".$sub_category."',
            `product_name` = '".$pname."',
            `product_volume` = '".$pvolume."',
            `product_desc` = '".$pdescription."'
             WHERE `product_id` = '".$serial_no."'");
  if ($sql_query) {
      echo "<script>alert('Update Record Successfully.')</script>";
      echo "<script>location.href='view_product.php'</script>";
  } else {
  echo "<script>alert('Some Error On Update.')</script>"; 
  echo "<script>location.href='view_product.php'</script>";
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
                    <div class="col-lg-8 col-md-8">
                      <div class="panel panel-default">
                          <div class="panel-body">
                            <table class="table table-bordered" id="example">
                              <thead>
                                <tr>
                                  <th>Sl No</th>
                                  <th>Category</th>
                                  <th>Sub Category</th>
                                  <th>Product Name</th>
                                  <th>Product Volume</th>
                                  <th>Product Description</th>
                                  <?php if($_SESSION['cus']['role']=="User") { } else { ?>
                                  <th>Action</th>
                                  <?php } ?>
                                </tr>
                              </thead>
                              <tbody>
                            <?php $i = 1;
                              $sql_stock=mysqli_query($conn, "SELECT * FROM product ORDER BY product_id DESC");
                              while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php $chk_employee = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM category WHERE category_id='".$show_stock['category_id']."'")); echo $chk_employee['name']; ?></td>
                                  <td><?php $chk_sub_employee = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM sub_category WHERE sub_category_id='".$show_stock['sub_category_id']."'")); echo $chk_sub_employee['name']; ?></td>
                                  <td><?php echo $show_stock['product_name']; ?></td>
                                  <td><?php echo $show_stock['product_volume']; ?></td>
                                  <td><?php echo $show_stock['product_desc']; ?></td>
                                  <?php if($_SESSION['cus']['role']=="User") { } else { ?>
                                  <td style="padding:5px;"><a class="btn btn-success btn-xs" href="view_product.php?flag=edit&edit_id=<?php echo $show_stock['product_id']; ?>" style="margin-right:10px;float:left;">Edit</a> <a class="btn btn-danger btn-xs" href="view_product.php?flag=delete&del_id=<?php echo $show_stock['product_id']; ?>" onclick="return confirm('Are you sure to delete the record?')">Delete</a></td>
                                  <?php } ?>
                                </tr>
                                <?php $i++; } ?>
                              </tbody>
                            </table>
                          </div>              
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                    <?php if($_REQUEST['flag'] == "edit")
                        {
                          $show=mysqli_fetch_array(mysqli_query($conn, "SELECT * from `product` where `product_id` = '$_REQUEST[edit_id]'")); ?>
                      <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input name="serial_no" value="<?php echo $show['product_id']; ?>" type="hidden">
                        <div class="form-group">
                          <label>Category Name</label>
                           <select class="form-control" name="category" id="country-dropdown" required>
                              <option>Select Category</option>
                              <?php $sql_employee=mysqli_query($conn, "SELECT * FROM category ORDER BY category_id ASC");
                              while($show_employee = mysqli_fetch_array($sql_employee)) { ?>
                              <option value="<?php echo $show_employee['category_id']; ?>" <?php if($show['category_id']==$show_employee['category_id']) { echo "selected"; } else { } ?> ><?php echo $show_employee['name']; ?></option>
                              <?php } ?>
                            </select> 
                        </div>
                        <div class="form-group">
                          <label>Sub Category Name</label>
                           <select class="form-control" name="sub_category" id="state-dropdown" required>
                              <option value="<?php echo $show['sub_category_id']; ?>"><?php $chk_sub_employee = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM sub_category WHERE sub_category_id='".$show['sub_category_id']."'")); echo $chk_sub_employee['name']; ?></option>
                            </select> 
                        </div>
                        <div class="form-group">
                          <label>Product Name</label>
                          <input class="form-control" name="pname" value="<?php echo $show['product_name']; ?>" type="text" placeholder="Enter Product Name" required>
                        </div>
                        <div class="form-group">
                          <label>Product Volume</label>
                          <input class="form-control" name="pvolume" value="<?php echo $show['product_volume']; ?>" type="text" placeholder="Enter Product Volume" required>
                        </div>
                        <div class="form-group">
                          <label>Product description</label>
                          <textarea class="form-control" name="pdescription" rows="4" cols="50" placeholder="Enter Product description"><?php echo $show['product_desc']; ?></textarea>
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
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById('example');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
    return dl ?
    XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
    XLSX.writeFile(wb, fn || ('Products.' + (type || 'xlsx')));
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
