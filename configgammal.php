<?
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

	date_default_timezone_set('Europe/Paris');
	header('Content-type: application/json charset=utf-8');

	$defaultRepeat = 3;
	$defaultBaudRate = 19200;
	
	$RF_group_code_on_part = "F1011010110111010110111010110110111010110111010111010110110110111010111010111011010111";//gamla"F1011101011101011101101101011011101101101101011101011011011011011011011011011101101011";
	$RF_group_code_off_part = "F1011010110111010110111010110110111010110111010111010110110110111010111010111011011011";

	//Nexas slutkod
	################ Language variables ##########################	
	$lang_on = "På";
	$lang_off = "Av";
	
	################ Icon paths for different types of devices ##########################
	$light = "html_images/icons/lightbulb.png";
	$tv = "html_images/icons/tv.png";
	$photoframe = "html_images/icons/image.png";

?>