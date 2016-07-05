<?php

require_once("control/config.php");
require_once("control/main_control.php");




if(isset($_GET["page"]))
{
	if($_GET["page"] == "addWord") require_once("addWord/addword.php");

	elseif($_GET["page"] == "test")require_once("test.php");

	else if($_GET["page"] == "admin") require_once("addWord/admin/admin.php");

	else header('Location: index.php');  
}
else 
{
	require_once("res/header.php");
	require_once("control/context.php");
	require_once("res/footer.php");
}