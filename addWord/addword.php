<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OrthoCité | Ajouter des mots</title>

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
                <a class="navbar-brand" href="index.php?page=addWord">OrthoCité | Ajouter des mots / Voir</a>
            </div>
            <!-- /.navbar-header -->

            

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                           
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php?page=addWord"><i class="fa fa-plus fa-fw"></i> Ajouter Des Mots / Voir</a>
                        </li>  
                        <li>
                            <a href="./admin"><i class="fa fa-dashboard fa-fw"></i> Espace Admin </a>
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
                    <h1 class="page-header">Ajouter des mots / Voir</h1>
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
                                <center>Mot(s) ajouté(s).</center>
                            </div></div></div>';

                if(isset($_GET["action"]))
                {
                    if($_GET["action"] == "addInTheGame" && isset($_GET["name"])) printFormForAddInGame($_GET["name"]);
                    else if($_GET["action"] == "addInGamePost" && isset($_GET["name"])) 
                    {
                        $name = htmlspecialchars($_GET["name"]);

                        switch ($name) 
                        {
                            case 'doorgame':
                            if(isset($_POST["district"], $_POST["porte"], $_POST["word_valid"], $_POST["word_invalid_1"], $_POST["word_invalid_2"])) addInDoorGame($_POST["district"], $_POST["porte"], $_POST["word_valid"], $_POST["word_invalid_1"], $_POST["word_invalid_2"]);
                            else redirectAddWord();
                                break;
                            case 'platformer':
                            if(isset($_POST["district"], $_POST["word_valid"], $_POST["word_invalid_1"], $_POST["word_invalid_2"], $_POST["word_invalid_3"], $_POST["word_invalid_4"])) addInPlatformer($_POST["district"], $_POST["word_valid"], $_POST["word_invalid_1"], $_POST["word_invalid_2"], $_POST["word_invalid_3"], $_POST["word_invalid_4"]);
                            else redirectAddWord();
                                break;
                            case 'rearranger':
                            if(isset($_POST["district"], $_POST["word"])) addInRearranger($_POST["district"], $_POST["word"]);
                            else redirectAddWord();
                                break;
                            case 'guessgame':
                            if(isset($_POST["word"], $_POST["validornot"])) addInGuessGame($_POST["word"], $_POST["validornot"]);
                            else redirectAddWord();
                                break;
                            case 'stopgame':
                            if(isset($_POST["word_invalid"], $_POST["term_word_invalid"], $_POST["word_valid_1"], $_POST["term_word_valid_1"], $_POST["word_valid_2"], $_POST["term_word_valid_2"], $_POST["word_valid_3"], $_POST["term_word_valid_3"])) addInStopGame($_POST["word_invalid"], $_POST["term_word_invalid"], $_POST["word_valid_1"], $_POST["term_word_valid_1"], $_POST["word_valid_2"], $_POST["term_word_valid_2"], $_POST["word_valid_3"], $_POST["term_word_valid_3"]);
                            else redirectAddWord();
                                break;
                            case 'throwgame':
                            if(isset($_POST["word"], $_POST["validornot"])) addInThrowGame($_POST["word"], $_POST["validornot"]);
                            else redirectAddWord();
                                break;
                            case 'superboss':
                            if(isset($_POST["word"])) addInSuperBoss($_POST["word"]);
                            else redirectAddWord();
                                break;
                        }
                    }
                    else if($_GET["action"] == "viewWord" && isset($_GET["name"], $_GET["valid"])) lookWords($_GET["name"], $_GET["valid"], $difXmlGame);
                    else echo '<SCRIPT LANGUAGE="JavaScript">
                                document.location.href="index.php?page=addWord"
                                </SCRIPT>';
                }
                else printDifferentGame($difXmlGame);



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
