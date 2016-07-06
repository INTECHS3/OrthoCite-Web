<?php
header("Content-type: text/xml");
switch ($_GET["name"]) 
{
	case 'doorgame_1':
	echo doorGame();
		break;
	case 'doorgame_2':
	echo doorGame2();
		break;
	case 'platformer':
	echo platformer();
		break;
	case 'rearranger':
	echo rearranger();
		break;
	case 'stopgame':
	echo stopgame();
		break;
	case 'throwgame':
	echo throwgame();
		break;
	case 'guessgame':
	echo guessGame();
		break;
	case 'superboss':
	echo superboss();
		break;
}
?>
