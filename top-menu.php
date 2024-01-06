<?php include "lib/connection.php"; ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="dashboard.php">Hardwares</a></li>
                    <li><a style="color:#fff;font-size:15px;"><?php echo $_SESSION['cus']['name']; ?></a></li>
                    <li>
                        <a href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> Category & Sub Category <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="add_category.php"><i class="fa fa-circle-o"></i> Add Category</a></li>
                            <li><a href="add_sub_category.php"><i class="fa fa-circle-o"></i> Add Sub Category</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> Product <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="add_product.php"><i class="fa fa-circle-o"></i> Add Product</a></li>
                            <li><a href="view_product.php"><i class="fa fa-circle-o"></i> View All Products</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> Stock <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="add_stock.php"><i class="fa fa-circle-o"></i> Add Stock</a></li>
                            <li><a href="view_stock.php"><i class="fa fa-circle-o"></i> View All Stocks</a></li>
                            <li><a href="view_invoices.php"><i class="fa fa-circle-o"></i> View All Invoices</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> Decorator <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="add_decorator.php"><i class="fa fa-circle-o"></i> Add Decorator</a></li>
                            <li><a href="view_decorator.php"><i class="fa fa-circle-o"></i> View All Decorator</a></li>
                            <li><a href="view_commision.php"><i class="fa fa-circle-o"></i> View Decorator Commision</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> Sales <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="add_sales.php"><i class="fa fa-circle-o"></i> New Sales</a></li>
                            <li><a href="view_sales.php"><i class="fa fa-circle-o"></i> View All Sales</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> Return <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="add_return.php"><i class="fa fa-circle-o"></i> Add Return Sales</a></li>
                            <li><a href="view_return.php"><i class="fa fa-circle-o"></i> View All Return</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> Accounts <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="add_accounts.php"><i class="fa fa-circle-o"></i> Today Accounts</a></li>
                            <li><a href="view_accounts.php"><i class="fa fa-circle-o"></i> View All Accounts</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="profit.php"><i class="fa fa-fw fa-dashboard"></i> P/L</a>
                    </li>
                    <li style="float:right;">
                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>