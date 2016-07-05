<?php

session_start();
if(isset($_GET["beConnect"], $_POST["user"], $_POST["pass"])) 
{
    $_SESSION["user"] = $_POST["user"];
    $_SESSION["pass"] = sha1($_POST["pass"]);
    header("Location: index.php?page=admin&actionSuccess");
} 

if(isset($_SESSION["user"], $_SESSION["pass"]))
{
    if($_SESSION["user"] == USER_ADMIN && $_SESSION["pass"] == PASS_ADMIN) $admin = true;
    else $admin = false;
}
else $admin = false;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OrthoCité | DashBoard Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="addWord/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="addWord/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="addWord/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="addWord/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="addWord/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="addWord/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="favicon.ico" />

    <link href="addWord/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="addWord/bower_components/datatables-responsive/css/responsive.dataTables.scss" rel="stylesheet">

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
                <a class="navbar-brand" href="index.php?page=addWord">OrthoCité | DashBoard Admin</a>
            </div>
            <!-- /.navbar-header -->

            

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                           
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php?page=admin"><i class="fa fa-dashboard fa-fw"></i> DashBoard Admin</a>
                        </li>  
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Retour à l'accueil</a>
                        </li>                      
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
    </div>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">DashBoard Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo intAllWordValid() ?></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Tous les mots validés</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pause fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo intAllWordInvalid() ?></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Tout les mots en attente de validation</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               
            
            <?php 
                if(isset($_GET["actionSuccess"])) echo '<div class="col-lg-12"><div class="row"><div class="alert alert-success">
                                <center>Action Effectuée.</center>
                            </div></div></div>';

                if($admin)
                {
                    if(isset($_GET["action"]))
                    {

                    }
                    else printDifferentGame($difXmlGame);
                }
                else 
                {
                    echo '<div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="login-panel panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Connectez Vous</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form role="form" action="index.php?page=admin&beConnect" method="POST">
                                            <fieldset>
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="User" name="user" type="text" autofocus="">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                                                </div>
                                                <!-- Change this to a button or input when using this as a form -->
                                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Se connecter">
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                

                for ($i=0; $i < 25; $i++) 
                { 
                    echo "<div class='row'></br></div>";
                }
            ?>
        
    <!-- /#wrapper -->



    <!-- jQuery -->
    <script src="addWord/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="addWord/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="addWord/bower_components/metisMenu/dist/metisMenu.min.js"></script>



    <script src="addWord/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="addWord/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="addWord/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="addWord/dist/js/sb-admin-2.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
