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

if($connected)
{


                            if(isset($_GET["success"])) {
                            echo "<div class=\"alert alert-success alert-dismissable\">
                                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                                                <center>Action Effectué</center>
                                                </div>";
                            }
                         if(isset($_GET["page"]))
                        {
                            if($_GET["page"] == "ViewTable" && isset($_GET["name"])) require_once("view/view_onetable.php");
                            elseif($_GET["page"] == "deleteOneRowFromTable" && isset($_GET["name"], $_GET["id"]) && is_numeric($_GET["id"]))  TratementOfDeleteOneRowFromTable($_GET['name'], $_GET['id']);
                            elseif($_GET["page"] == "updateOneRowFromTable" && isset($_GET["name"], $_GET["id"], $_POST["data"]) && is_numeric($_GET["id"]))  TratementOfUpdateOneRowFromTable($_GET['name'], $_GET['id'], $_POST["data"]);
                            elseif($_GET["page"] == "updateOneRowFromTableForm" && isset($_GET["name"])) require_once("view/view_updaterowintable.php");
                            elseif($_GET["page"] == "addOneRowFromTable" && isset($_GET["name"]) ) require_once("view/view_addrowintable.php");
                            elseif($_GET["page"] == "AddRowSql" && isset($_GET["name"], $_POST["data"])) TratementAddRowSql($_GET["name"], $_POST["data"]);
                            elseif($_GET["page"] == "deco") 
                                {
                                    session_destroy();
                                    echo '<SCRIPT LANGUAGE="JavaScript">
                                        document.location.href="index.php"
                                    </SCRIPT>';
                                }
                            else echo "404";

                        }
                        else require_once("view/view_tables.php");

}
else
{
    if(isset($_POST["pseudo"], $_POST["pass"])) 
    {
        $_SESSION["pseudo"] = $_POST["pseudo"];
        $_SESSION["pass"] = $_POST["pass"];
        echo '<SCRIPT LANGUAGE="JavaScript">
                document.location.href="index.php"
            </SCRIPT>';
    }
    else require_once("view/view_connection.php");
}

  