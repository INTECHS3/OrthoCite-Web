<?php

require_once("control/config.php");
require_once("control/main_control.php");




if(isset($_GET["page"]))
{
	if($_GET["page"] == "addWord") require_once("addWord/addword.php");

	elseif($_GET["page"] == "generateXML" && isset($_GET["name"]))require_once("control/xml_generate.php");

	else header('Location: index.php');  
}
else 
{
	require_once("res/header.php");
	require_once("control/context.php");
	require_once("res/footer.php");
}