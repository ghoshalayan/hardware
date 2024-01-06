<?php include "include/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "top-menu.php"; ?>
<?php
if($_REQUEST['flag'] == "delete")
{
  mysqli_query($conn, "DELETE FROM `sub_category` WHERE `sub_category_id` = '$_REQUEST[del_id]'");
  echo "<script>alert('Successfully deleted the record.')</script>"; 
  echo "<script>location.href='add_sub_category.php'</script>";
}
if(isset($_POST['add'])) {    
  $sname = $_POST['sname'];    
  $name = $_POST['name'];

  $sql=mysqli_query($conn, "INSERT INTO sub_category(category_id,name) VALUES ('$sname','$name')");
  if ($sql) {
      echo "<script>alert('New Sub Category Added Successfully.')</script>";
      echo "<script>location.href='add_sub_category.php'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_sub_category.php'</script>";
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
                                <i class="fa fa-dashboard"></i> Add New Sub Category
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
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
                                <input name="add" class="btn btn-primary" type="submit" value="Submit" />
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="table-responsive">           
                          <table class="table table-bordered">
                            <thead>
                              <tr class="success">
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Action</th>
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
                                <td><a class="btn btn-danger btn-xs" href="add_sub_category.php?flag=delete&del_id=<?php echo $show_employee['sub_category_id']; ?>" onclick="return confirm('Are you sure to delete the record?')">Delete</a></td>
                              </tr>
                              <?php $i++; } ?>
                            </tbody>
                          </table>
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
