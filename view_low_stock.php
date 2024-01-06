<?php include "include/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "top-menu.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <p>&nbsp;</p>
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View All Low Stock Products
                            </li>
                            <li style="float:right;"><button class="btn btn-primary btn-xs" onclick="ExportToExcel('xlsx')">Export Excel</button></li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="panel panel-default">
                          <div class="panel-body">
                            <table class="table table-bordered" id="example">
                              <thead>
                                <tr>
                                  <th>Sl No</th>
                                  <th>Item Name</th>
                                  <th>Quantity</th>
                                  <?php if($_SESSION['cus']['role']=="User") { } else { ?>
                                  <th>Purchase Price</th>
                                  <?php } ?>
                                  <th>Selling Price</th>
                                  <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php $i = 1;
                                $sql_stock=mysqli_query($conn, "SELECT * from stock WHERE balance_quanity<5; ");
                              while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php $sql_pname=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM product WHERE product_id='".$show_stock['pname']."'")); echo $sql_pname['product_name']; ?> ( <?php echo $sql_pname['product_volume']; ?> )</td>
                                  <td><?php echo $show_stock['balance_quanity']; ?></td>
                                  <?php if($_SESSION['cus']['role']=="User") { } else { ?>
                                  <td><?php echo $show_stock['pprice']; ?></td>
                                  <?php } ?>
                                  <td><?php echo $show_stock['sprice']; ?></td>
                                  <td><?php echo $show_stock['item_desc']; ?></td>
                                </tr>
                                <?php $i++; } ?>
                              </tbody>
                            </table>
                          </div>              
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
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
function ExportToExcel(type, fn, dl) {
    var elt = document.getElementById('example');
    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
    return dl ?
    XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
    XLSX.writeFile(wb, fn || ('Products.' + (type || 'xlsx')));
}
function calc1() {
  var a1 = parseInt(document.getElementById("pdue").value);
  var a2 = parseInt(document.getElementById("paid1").value);
  if(a2>a1) {
      alert("Due Payment not greater than Due Amount.");
      document.getElementById("paid1").value = 0;
  } else {
    var a3 =(a1-a2);
  }
  document.getElementById("due1").value = a3 || 0;
}
</script>