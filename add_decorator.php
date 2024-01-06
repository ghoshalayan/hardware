<?php include "include/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "top-menu.php"; ?>
<?php
if(isset($_POST['add'])) {    
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $address = $_POST['address'];

  $sql=mysqli_query($conn, "INSERT INTO decorator(name,phone,address) 
  VALUES ('$name','$mobile','$address')");
  if ($sql) {
      echo "<script>alert('New Product Added Successfully.')</script>";
      echo "<script>location.href='add_decorator.php'</script>";
  } else {
  echo "<script>alert('There is an error.')</script>";
  echo "<script>location.href='add_decorator.php'</script>";
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
                                <i class="fa fa-dashboard"></i> Add New Decorator
                            </li>
                        </ol>
                    </div>
                </div>
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                          <label>Name</label>
                          <input class="form-control" name="name" value="" type="text" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                          <label>Mobile Number</label>
                          <input class="form-control" name="mobile" value="" type="text" placeholder="Enter Mobile Number" required>
                        </div>
                        <div class="form-group">
                          <label>Address</label>
                          <textarea class="form-control" name="address" rows="4" cols="50" placeholder="Enter Address"></textarea>
                        </div>
                        <div class="form-group">
                            <input name="add" class="btn btn-primary" type="submit" value="Submit" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
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
