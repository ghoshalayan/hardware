<?php include "include/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "top-menu.php"; ?>
<?php
if($_REQUEST['flag'] == "delete")
{
  mysqli_query($conn, "DELETE FROM `decorator` WHERE `decorator_id` = '$_REQUEST[del_id]'");
  echo "<script>alert('Successfully deleted the record.')</script>"; 
  echo "<script>location.href='view_decorator.php'</script>";
}
if(isset($_POST['update'])) {     
  $serial_no = $_POST['serial_no'];    
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $address = $_POST['address'];

  $sql_query = mysqli_query($conn, "UPDATE `decorator` SET
            `name` = '".$name."',
            `phone` = '".$mobile."',
            `address` = '".$address."'
             WHERE `decorator_id` = '".$serial_no."'");
  if ($sql_query) {
      echo "<script>alert('Update Record Successfully.')</script>";
      echo "<script>location.href='view_decorator.php'</script>";
  } else {
  echo "<script>alert('Some Error On Update.')</script>"; 
  echo "<script>location.href='view_decorator.php'</script>";
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
                                <i class="fa fa-dashboard"></i> View All  Decorators
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
                                  <th>Name</th>
                                  <th>Mobile</th>
                                  <th>Address</th>
                                  <?php if($_SESSION['cus']['role']=="User") { } else { ?>
                                  <th>Action</th>
                                  <?php } ?>
                                </tr>
                              </thead>
                              <tbody>
                            <?php $i = 1;
                              $sql_stock=mysqli_query($conn, "SELECT * FROM decorator ORDER BY decorator_id ASC");
                              while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $show_stock['name']; ?></td>
                                  <td><?php echo $show_stock['phone']; ?></td>
                                  <td><?php echo $show_stock['address']; ?></td>
                                  <?php if($_SESSION['cus']['role']=="User") { } else { ?>
                                  <td style="padding:5px;"><a class="btn btn-success btn-xs" href="view_decorator.php?flag=edit&edit_id=<?php echo $show_stock['decorator_id']; ?>" style="margin-right:10px;float:left;">Edit</a> <a class="btn btn-danger btn-xs" href="view_decorator.php?flag=delete&del_id=<?php echo $show_stock['decorator_id']; ?>" onclick="return confirm('Are you sure to delete the record?')">Delete</a></td>
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
                          $show=mysqli_fetch_array(mysqli_query($conn, "SELECT * from `decorator` where `decorator_id` = '$_REQUEST[edit_id]'")); ?>
                      <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input name="serial_no" value="<?php echo $show['decorator_id']; ?>" type="hidden">
                        <div class="form-group">
                          <label>Product Name</label>
                          <input class="form-control" name="name" value="<?php echo $show['name']; ?>" type="text" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                          <label>Mobile</label>
                          <input class="form-control" name="mobile" value="<?php echo $show['phone']; ?>" type="text" placeholder="Enter Mobile Number" required>
                        </div>
                        <div class="form-group">
                          <label>Address</label>
                          <textarea class="form-control" name="address" rows="4" cols="50" placeholder="Enter Address"><?php echo $show['address']; ?></textarea>
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
    XLSX.writeFile(wb, fn || ('Decorators.' + (type || 'xlsx')));
}
</script>