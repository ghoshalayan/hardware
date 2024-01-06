<?php include "include/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "top-menu.php"; ?>
<?php
if($_REQUEST['flag'] == "delete")
{
  mysqli_query($conn, "DELETE FROM `category` WHERE `category_id` = '$_REQUEST[del_id]'");
  echo "<script>alert('Successfully deleted the record.')</script>"; 
  echo "<script>location.href='add_category.php'</script>";
}
if(isset($_POST['add'])) {    
  $name = $_POST['name'];

  $sql=mysqli_query($conn, "INSERT INTO category(name) VALUES ('$name')");
  if ($sql) {
      echo "<script>alert('New Category Added Successfully.')</script>";
      echo "<script>location.href='add_category.php'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_category.php'</script>";
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
                                <i class="fa fa-dashboard"></i> Add New Category
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                              <label>Category Name</label>
                              <input class="form-control" name="name" value="" type="text" placeholder="Enter Category Name" required>
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
                                <th>Name</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;
                              $sql_employee=mysqli_query($conn, "SELECT * FROM category ORDER BY category_id ASC");
                              while($show_employee = mysqli_fetch_array($sql_employee)) { ?>
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $show_employee['name']; ?></td>
                                <td><a class="btn btn-danger btn-xs" href="add_category.php?flag=delete&del_id=<?php echo $show_employee['category_id']; ?>" onclick="return confirm('Are you sure to delete the record?')">Delete</a></td>
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
