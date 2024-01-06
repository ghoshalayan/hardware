<?php include "include/header.php";
$cd = date("Y-m-d"); ?>

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
                                <i class="fa fa-dashboard"></i> Add All Accounts
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="table-responsive">           
                          <table class="table table-bordered">
                            <thead>
                                <tr class="table-success">  
                                    <th align="center">Stock Cost Price</th>
                                    <th align="center">Stock Sale Price</th>
                                    <th align="center">Cash</th>
                                    <th align="center">Bank</th>
                                    <th align="center">Due</th>
                                    <th align="center">P/L</th>
                                    <th align="center">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a=$b=$c=$d=$e=$f="";
                                $sql_check = mysqli_query($conn, "SELECT * FROM item_sales INNER JOIN sales ON item_sales.sales_id = sales.sales_id");
                                while($show_check = mysqli_fetch_array($sql_check)) { ?>
                                <tr>
                                    <td align="center"><?php $sql_pprice = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `stock` WHERE pname='".$show_check['item_name']."'")); 
                                    $sprice1 = ($sql_pprice['pprice']*$show_check['quantity']); $f+=$sprice1;
                                    echo "- ".$sprice1; ?></td>
                                    <td align="center"><?php $a+=$show_check['total_amount']; echo "+ ".$show_check['total_amount']; ?></td>
                                    <td align="center"><?php if($show_check['pay_mode']=="Cash") { $b+=$show_check['total_amount']; echo "+ ".$show_check['total_amount']; } else { } ?></td>
                                    <td align="center"><?php if($show_check['pay_mode']!="Cash") { $c+=$show_check['total_amount']; echo "+ ".$show_check['total_amount']; } else { } ?></td>
                                    <td align="center"><?php if($show_check['due']!="0") { $d+=$show_check['due']; echo "- ".$show_check['due']; } else { } ?></td>
                                    <td align="center"><?php $e+=($show_check['total_amount']-$sprice1); echo "+ ".($show_check['total_amount']-$sprice1); ?></td>
                                    <td align="center"><?php echo date("h:i:s a", $show_check['insert_date']); ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td align="center"><label>Total: <?php echo "- ".$f; ?></label></td>
                                    <td align="center"><label>Total: <?php echo "+ ".$a; ?></label></td>
                                    <td align="center"><label>Total: <?php echo "+ ".$b; ?></label></td>
                                    <td align="center"><label>Total: <?php echo "+ ".$c; ?></label></td>
                                    <td align="center"><label>Total: <?php echo "- ".$d; ?></label></td>
                                    <td align="center"><label>Total: <?php echo "+ ".$e; ?></label></td>
                                    <td align="center"></td>
                                </tr>
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