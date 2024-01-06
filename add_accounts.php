<?php include "include/header.php"; ?>
<style>
th { text-align:center; }
</style>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "top-menu.php"; ?>
<?php
$cd = date("Y-m-d");
if(isset($_POST['addcash'])) {      
  $amount = $_POST['amount']; 
  $reason = $_POST['reason'];
  $password = $_POST['password'];
  $password1 = $config_row['password']; 
    if($password==$password1) {
        $sql = mysqli_query($conn, "INSERT INTO accounts (cash,cash_reason) VALUES ('$amount','$reason')");
        if ($sql) {
              echo "<script>alert('Cash Added Successfully.')</script>";
              echo "<script>location.href='add_accounts.php'</script>";
        } else {
          echo "<script>alert('There is an error.')</script>";
          echo "<script>location.href='add_accounts.php'</script>";
        }
    } else {
          echo "<script>alert('Incorrect Password! Please try again.')</script>";
          echo "<script>location.href='add_accounts.php'</script>";
    }
}
if(isset($_POST['addbank'])) {      
  $amount = $_POST['amount']; 
  $reason = $_POST['reason'];
  $password = $_POST['password'];
  $password1 = $config_row['password'];
    if($password==$password1) {
        $sql = mysqli_query($conn, "INSERT INTO accounts (bank,bank_reason) VALUES ('$amount','$reason')");
        if ($sql) {
              echo "<script>alert('Cash Added in Bank Account Successfully.')</script>";
              echo "<script>location.href='add_accounts.php'</script>";
        } else {
          echo "<script>alert('There is an error.')</script>";
          echo "<script>location.href='add_accounts.php'</script>";
        }
    } else {
          echo "<script>alert('Incorrect Password! Please try again.')</script>";
          echo "<script>location.href='add_accounts.php'</script>";
    }
}


if(isset($_POST['cashwithdraw'])) {     
  $amount = $_POST['amount'];   
  $reason = $_POST['reason'];
  $password = $_POST['password'];
  $password1 = $config_row['password']; 
  
    if($password==$password1) {
        $sql = mysqli_query($conn, "INSERT INTO accounts (cash_withdraw,cash_withdraw_reason) VALUES ('$amount','$reason')");
        if ($sql) {
              echo "<script>alert('Cash Withdraw in Bank Account Successfully.')</script>";
              echo "<script>location.href='add_accounts.php'</script>";
        } else {
          echo "<script>alert('There is an error.')</script>";
          echo "<script>location.href='add_accounts.php'</script>";
        }
    } else {
          echo "<script>alert('Incorrect Password! Please try again.')</script>";
          echo "<script>location.href='add_accounts.php'</script>";
    }
}
if(isset($_POST['bankwithdraw'])) {     
  $amount = $_POST['amount'];   
  $reason = $_POST['reason'];
  $password = $_POST['password'];
  $password1 = $config_row['password']; 
  
    if($password==$password1) {
        $sql = mysqli_query($conn, "INSERT INTO accounts (bank_withdraw,bank_withdraw_reason) VALUES ('$amount','$reason')");
        if ($sql) {
              echo "<script>alert('Cash Withdraw in Bank Account Successfully.')</script>";
              echo "<script>location.href='add_accounts.php'</script>";
        } else {
          echo "<script>alert('There is an error.')</script>";
          echo "<script>location.href='add_accounts.php'</script>";
        }
    } else {
          echo "<script>alert('Incorrect Password! Please try again.')</script>";
          echo "<script>location.href='add_accounts.php'</script>";
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
                                <i class="fa fa-dashboard"></i> Add Accounts
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php  $sprice = "";
                            $sql_stock = mysqli_query($conn, "SELECT * FROM stock");
                            while($show_stock = mysqli_fetch_array($sql_stock)) {
                                if($show_stock['balance_quanity']<=0) { } else {
                                $sprice += ($show_stock['balance_quanity']*$show_stock['pprice']);
                                }
                            } 
                            $sql_ccash = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(cash) as sum_cash FROM `accounts` WHERE DATE(`insert_date`)='".$cd."'"));
                            $sql_bcash = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(bank) as sum_bank FROM `accounts` WHERE DATE(`insert_date`)='".$cd."'"));
                            $sql_ccash1 = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(cash_withdraw) as sum_cash1 FROM `accounts` WHERE DATE(`insert_date`)='".$cd."'"));
                            $sql_bcash1 = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(bank_withdraw) as sum_bank1 FROM `accounts` WHERE DATE(`insert_date`)='".$cd."'"));
                            $first_balance = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `accounts` WHERE DATE(`insert_date`)='".$cd."' ORDER BY DATE(`insert_date`) DESC LIMIT 1"));
                            
                        ?>
                        <center>
                        <div  id="1">Total Initial Balance (Cash + Stock + Bank) : <label id="bal2_id"><?php echo ($sql_ccash['sum_cash']+$sprice+$sql_bcash['sum_bank']); ?></label></div>
                        <table id="bal_tab2id" class="table table-bordered">
                            <tr class="table-success">
                                <th align="center">Cash ( First Balance: <?php echo $first_balance['cash']; ?> )</th>
                                <th align="center">Bank Account ( First Balance:  <?php echo $first_balance['bank']; ?> )</th>
                            </tr>
                            <tr>
                                <td align="center"><?php echo ($sql_ccash['sum_cash']-$sql_ccash1['sum_cash1']); ?></td>
                                <td align="center"><?php echo ($sql_bcash['sum_bank']-$sql_bcash1['sum_bank1']); ?></td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myAdd">ADD</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myWithdraw">WITHDRAW</button>
                                </td>
                                <td align="center">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myAdd1">ADD</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myWithdraw1">WITHDRAW</button>
                                </td>
                            </tr>
                        </table>
                        <table id="bal_tab2id" class="table table-bordered">
                            <tr class="table-success">
                                <th align="center">Cash Transition</th>
                                <th align="center">Cash Transition Reason</th>
                                <th align="center">Bank Transition</th>
                                <th align="center" colspan="2">Bank Account Transition Reason</th>
                            </tr>
                            <?php $sql_stock = mysqli_query($conn, "SELECT * FROM accounts WHERE DATE(`insert_date`)='".$cd."'");
                                while($show_stock = mysqli_fetch_array($sql_stock)) { ?>
                            <tr>
                                <td align="center"><?php if($show_stock['cash_withdraw']=="") { if($show_stock['cash']=="") { } else {echo "+ ".$show_stock['cash']; } } else { echo "- ".$show_stock['cash_withdraw']; } ?></td>
                                <td align="center"><?php if($show_stock['cash_withdraw_reason']=="") { echo $show_stock['cash_reason']; } else { echo $show_stock['cash_withdraw_reason']; } ?></td>
                                <td align="center"><?php if($show_stock['bank_withdraw']=="") { if($show_stock['bank']=="") { } else { echo "+ ".$show_stock['bank']; } } else { echo "- ".$show_stock['bank_withdraw']; } ?></td>
                                <td align="center" colspan="2"><?php if($show_stock['bank_withdraw_reason']=="") { echo $show_stock['bank_reason']; } else { echo $show_stock['bank_withdraw_reason']; } ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                        <br>
                        <div  id="">Total Stock Price : <label id="bal_id"><?php echo $sprice; ?></label></div>
                        <table id="bal_tabid" class="table table-bordered">
                            <tr class="table-success">  
                                <th align="center">Stock Cost Price</th>
                                <th align="center">Stock Sale Price</th>
                                <th align="center">Cash</th>
                                <th align="center">Bank</th>
                                <th align="center">Due</th>
                                <th align="center">P/L</th>
                                <th align="center">Time</th>
                            </tr>
                            <?php $a=$b=$c=$d=$e=$f="";
                            $sql_check = mysqli_query($conn, "SELECT * FROM sales WHERE DATE(insert_date)='".$cd."'");
                            while($show_check = mysqli_fetch_array($sql_check)) { ?>
                            <tr>
                                <td align="center"><?php $f+=$show_check['total_purchase_amount']; echo "- ".$show_check['total_purchase_amount']; ?></td>
                                <td align="center"><?php $a+=$show_check['total_amount']; echo "+ ".$show_check['total_amount']; ?></td>
                                <td align="center"><?php if($show_check['pay_mode']=="Cash") { $b+=$show_check['total_amount']; echo "+ ".$show_check['total_amount']; } else { } ?></td>
                                <td align="center"><?php if($show_check['pay_mode']!="Cash") { $c+=$show_check['total_amount']; echo "+ ".$show_check['total_amount']; } else { } ?></td>
                                <td align="center"><?php if($show_check['due']!="0") { $d+=$show_check['due']; echo "- ".$show_check['due']; } else { } ?></td>
                                <td align="center"><?php $e+=($show_check['total_amount']-$show_check['total_purchase_amount']); echo $e; ?></td>
                                <td align="center"><?php echo date("h:i:s a", $show_check['insert_date']); ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="center"><label>Total: <?php echo "- ".$f; ?></label></td>
                                <td align="center"><label>Total: <?php echo "+ ".$a; ?></label></td>
                                <td align="center"><label>Total: <?php echo "+ ".$b; ?></label></td>
                                <td align="center"><label>Total: <?php echo "+ ".$c; ?></label></td>
                                <td align="center"><label>Total: <?php echo "- ".$d; ?></label></td>
                                <td align="center"><label>Total: <?php echo $e; ?></label></td>
                                <td align="center"></td>
                            </tr>
                        </table>
                        <table id="bal_tabid" class="table table-bordered">
                            <tr class="table-success">  
                                <th align="center">Stock Cost Price (Purchase)</th>
                                <th align="center">Cash</th>
                                <th align="center">Bank</th>
                                <th align="center">Due</th>
                                <th align="center">Time</th>
                            </tr>
                            <?php $b=$c=$d=$a="";
                            $sql_check1 = mysqli_query($conn, "SELECT * FROM invoice WHERE DATE(insert_date)='".$cd."'");
                            while($show_check1 = mysqli_fetch_array($sql_check1)) { ?>
                            <tr>
                                <td align="center"><?php $a+=$show_check1['total_amount']; echo "+ ".$show_check1['total_amount']; ?></td>
                                <td align="center"><?php if($show_check1['payment_mode']=="Cash") { $b+=$show_check1['total_amount']; echo "- ".$show_check1['total_amount']; } else { } ?></td>
                                <td align="center"><?php if($show_check1['payment_mode']!="Cash") { $c+=$show_check1['total_amount']; echo "- ".$show_check1['total_amount']; } else { } ?></td>
                                <td align="center"><?php if($show_check1['remaining_amount']!="") { $d+=$show_check1['remaining_amount']; echo "+ ".$show_check1['remaining_amount']; } else { } ?></td>
                                <td align="center"><?php echo date("h:i:s a", $show_check1['insert_date']); ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="center"><label>Total: <?php echo "+ ".$a; ?></label></td>
                                <td align="center"><label>Total: <?php echo "- ".$b; ?></label></td>
                                <td align="center"><label>Total: <?php echo "- ".$c; ?></label></td>
                                <td align="center"><label>Total: <?php echo "+ ".$d; ?></label></td>
                                <td align="center"></td>
                            </tr>
                        </table>
                        </center>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

                                <div id="myAdd" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Cash</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="form-group">
                                              <label>Amount</label>
                                              <input class="form-control" name="amount" type="text" placeholder="Enter Amount" required>
                                            </div>
                                            <div class="form-group">
                                              <label>Reason</label>
                                              <textarea class="form-control" name="reason" rows="4" cols="50" placeholder="Enter Withdraw Reason"></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label>Password</label>
                                              <input class="form-control" name="password" type="password" placeholder="Enter Password" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="addcash" class="btn btn-primary" type="submit" value="Submit" />
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                <div id="myWithdraw" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Cash Withdraw</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="form-group">
                                              <label>Amount</label>
                                              <input class="form-control" name="amount" type="text" placeholder="Enter Amount" required>
                                            </div>
                                            <div class="form-group">
                                              <label>Withdraw Reason</label>
                                              <textarea class="form-control" name="reason" rows="4" cols="50" placeholder="Enter Withdraw Reason"></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label>Password</label>
                                              <input class="form-control" name="password" type="password" placeholder="Enter Password" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="cashwithdraw" class="btn btn-primary" type="submit" value="Submit" />
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>   

                                <div id="myAdd1" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Cash in Bank Account</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="form-group">
                                              <label>Amount</label>
                                              <input class="form-control" name="amount" type="text" placeholder="Enter Amount" required>
                                            </div>
                                            <div class="form-group">
                                              <label>Reason</label>
                                              <textarea class="form-control" name="reason" rows="4" cols="50" placeholder="Enter Withdraw Reason"></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label>Password</label>
                                              <input class="form-control" name="password" type="password" placeholder="Enter Password" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="addbank" class="btn btn-primary" type="submit" value="Submit" />
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                <div id="myWithdraw1" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Cash Withdraw from Bank Account</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="form-group">
                                              <label>Amount</label>
                                              <input class="form-control" name="amount" type="text" placeholder="Enter Amount" required>
                                            </div>
                                            <div class="form-group">
                                              <label>Withdraw Reason</label>
                                              <textarea class="form-control" name="reason" rows="4" cols="50" placeholder="Enter Withdraw Reason"></textarea>
                                            </div>
                                            <div class="form-group">
                                              <label>Password</label>
                                              <input class="form-control" name="password" type="password" placeholder="Enter Password" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="bankwithdraw" class="btn btn-primary" type="submit" value="Submit" />
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>     
                                
<?php include "include/footer.php"; ?>