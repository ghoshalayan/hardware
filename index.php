<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hardwares :: Login</title>
    <link rel="shortcut icon" type="image/icon" href="images/logo-icon.png"/>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
include("lib/connection.php");
if(isset($_POST['submit'])) {
$chk_already = mysqli_query($conn, "SELECT * from `admin_login` where `user_name` = '".$_REQUEST['username']."' and `password` = '".$_REQUEST['password']."'");
$chk_num = mysqli_num_rows($chk_already);

if($chk_num > 0)
{
  $login = mysqli_fetch_array($chk_already);
  if($login['account_status'] == "Y")
  {
    $_SESSION['cus']['login'] = "true";
    $_SESSION['cus']['name'] = $login['name']; 
    $_SESSION['cus']['role'] = $login['role']; 
    echo "<script>location.href='dashboard.php'</script>";
  } else {
     echo "<script>alert('You are temporarily blocked!! Please contact Admin to solve this problem.')</script>"; 
   }
}
else { echo "<script>alert('Incorrect Username or Password!! Please check.')</script>"; }
}
?>
    <div id="row">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color:#fff;">Hardwares</a>
            </div> 
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row"><p><br><br><br></p></div>
                <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> LOGIN</h3>
                            </div>
                            <div class="panel-body">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                  <div class="form-group has-feedback">
                                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" required>
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                  </div>
                                  <div class="form-group has-feedback">
                                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" required>
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                                  <div class="row">
                                    <div class="col-xs-8">
                                      <div class="checkbox icheck">
                                      </div>
                                    </div>
                                    <div class="col-xs-4">
                                      <input type="submit" name="submit" class="btn btn-primary btn-block btn-flat" value="Sign In">
                                    </div>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>