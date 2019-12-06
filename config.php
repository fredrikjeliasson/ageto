<?
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

	date_default_timezone_set('Europe/Paris');
	// header('Content-Type: application/json');
	header('Content-type: text/html; charset=utf-8');

	$defaultRepeat = 4;
	$defaultBaudRate = 19200;
	
	$RF_group_code_on_part = "F101101011011101011011101011011011101011011101011101011011011011101011101011101101011";
	$RF_group_code_off_part = "F101101011011101011011101011011011101011011101011101011011011011101011101011101101101";

	//Gamla
	//$RF_group_code_on_part = "F101101011011011011101101011101101011101101101011101011101011101011101101011101101011";
	//$RF_group_code_off_part = "F101101011011011011101101011101101011101101101011101011101011101011101101011101101101";
	
	$localIP = "192.168.86.108";
	
	$groupRepeat = "5";
	$groupUsleep = "460000";
	
	################ Translation ##########################	
    include "swedish.php";
	
	################ Icon paths for different types of devices ##########################
	$light = "<img src=\"html_images/icons/idea.png\" style=\"margin-top: 5px; margin-left: 5px; margin-right: 5px; width:30px;\">";
	$tv = "html_images/icons/tv.png";
	$photoframe = "html_images/icons/image.png";
	$IconStarred = "<img src=\"html_images/icons/star.png\" style=\"margin-top: 20px; margin-left: 5px; margin-right: 5px;width:30px\">";
	$IconStar = "<img src=\"html_images/icons/star-1.png\" style=\"margin-top: 20px; margin-left: 5px; margin-right: 5px;width:30px\">";
	$IconTimer = "<img src=\"html_images/icons/clock96.png\" style=\"margin-top: 20px; margin-left: 5px; margin-right: 5px;\">";
	$IconDevices = "<img src=\"html_images/icons/responsive16.png\" style=\"margin-top: 20px; margin-left: 5px; margin-right: 5px;\">";
	$IconSave = "<img src=\"html_images/icons/save31.png\" style=\"margin-left: 5px; margin-right: 5px; width: 22px;\">";
	$IconSend = "<img src=\"html_images/icons/smartphone12.png\" style=\"margin-left: 5px; margin-right: 5px; width: 22px;\">";
?>
