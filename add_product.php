<?php include "include/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "top-menu.php"; ?>
<?php
if(isset($_POST['add'])) {      
  $category = $_POST['category'];
  $sub_category = $_POST['sub_category']; 
  $pname = $_POST['pname'];
  $pvolume = $_POST['pvolume'];
  $pdescription = $_POST['pdescription'];

  $sql=mysqli_query($conn, "INSERT INTO product(category_id,sub_category_id,product_name,product_volume,product_desc) 
  VALUES ('$category','$sub_category','$pname','$pvolume','$pdescription')");
  if ($sql) {
      echo "<script>alert('New Product Added Successfully.')</script>";
      echo "<script>location.href='add_product.php'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_product.php'</script>";
  }
}
if(isset($_POST['addcat'])) {    
  $name = $_POST['name'];

  $sql=mysqli_query($conn, "INSERT INTO category(name) VALUES ('$name')");
  if ($sql) {
      echo "<script>alert('New Category Added Successfully.')</script>";
      echo "<script>location.href='add_product.php'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_product.php'</script>";
  }
}
if(isset($_POST['addsubcat'])) {    
  $sname = $_POST['sname'];    
  $name = $_POST['name'];

  $sql=mysqli_query($conn, "INSERT INTO sub_category(category_id,name) VALUES ('$sname','$name')");
  if ($sql) {
      echo "<script>alert('New Sub Category Added Successfully.')</script>";
      echo "<script>location.href='add_product.php'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_product.php'</script>";
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
                                <i class="fa fa-dashboard"></i> Add New Product
                            </li>
                        </ol>
                    </div>
                </div>
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
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
                            <input name="add" class="btn btn-primary" type="submit" value="Submit" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="table-responsive">           
                          <table class="table table-bordered">
                            <thead>
                              <tr class="success">
                                <th>ID</th>
                                <th>Category Name <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addCatModal" style="float: right;">Add New</button></th>
                                <th>Sub Category Name <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addSubCatModal" style="float: right;">Add New</button></th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;
                              $sql_employee=mysqli_query($conn, "SELECT * FROM sub_category ORDER BY sub_category_id ASC");
                              while($show_employee = mysqli_fetch_array($sql_employee)) { ?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php $chk_employee = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM category WHERE category_id='".$show_employee['category_id']."'")); echo $chk_employee['name']; ?></td>
                                <td><?php echo $show_employee['name']; ?></td>
                              </tr>
                              <?php $i++; } ?>
                            </tbody>
                          </table>
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

                                <div id="addCatModal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Category Name</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="form-group">
                                              <label>Category Name</label>
                                              <input class="form-control" name="name" value="" type="text" placeholder="Enter Category Name" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="addcat" class="btn btn-primary" type="submit" value="Submit" />
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                <div id="addSubCatModal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Sub Category Name</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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
                                                <input name="addsubcat" class="btn btn-primary" type="submit" value="Submit" />
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>     
                                
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