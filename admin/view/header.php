<?php
if(isset($_POST["pseudo"], $_POST["pass"]))
{
    $_SESSION["pseudo"] = $_POST["pseudo"];
    $_SESSION["pass"] = sha1($_POST["pass"]);
}

if(isset($_SESSION["pseudo"], $_SESSION["pass"]))
{
    if($_SESSION["pseudo"] == USER_ADMIN && $_SESSION["pass"] == PASS_ADMIN) $connected = true;
    else $connected = false;
}
else $connected = false;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OrthoCité | Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../addWord/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../addWord/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../addWord/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../addWord/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../addWord/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../addWord/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="../favicon.ico" />

    <link href="../addWord/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../addWord/bower_components/datatables-responsive/css/responsive.dataTables.scss" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

   
        

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">OrthoCité | Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> DashBoard</a>
                        </li>
                        <li>
                            <a href="../index.php?page=addWord"><i class="fa fa-home fa-fw"></i> Retour à l'accueil</a>
                        </li>   
                        <?php if($connected) echo'<li>
                            <a href="index.php?page=deco"><i class="fa fa-sign-in fa-fw"></i> Deconnection</a>
                            </li>';
                            ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">PAGE : ACCUEIL <?php if(isset($_GET["page"], $_GET["name"]) && ctype_alpha($_GET["page"]) && ctype_alpha($_GET["name"])) echo " => ".strtoupper($_GET["page"]).":".strtoupper($_GET["name"]); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">