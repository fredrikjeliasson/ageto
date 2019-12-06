<!doctype html>
<? include "swedish.php"; ?>
<html lang="se">
<head>
	<meta charset="utf-8">

	<title>Switch it!</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="style.php" media="screen">

	  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/switch.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="favicon/switch.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/switch.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/switch.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/switch.png">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/switch.png">
</head>

<body>
		<div id="typeMenuContainer">
			<h1>Switch it!</h1> 
			<a href="#" onClick="loadContent('settings')"><img src="html_images/icons/iconfinder_menu.png" width="30px" style="position:fixed; top:10px; right: 5px; z-index: 3;"></a>		
			<div id="typeMenuFirst" onClick="loadContent('starred')"><?=$lang_starred;?>
			</div>
			<div id="typeMenuSecond" onClick="loadContent('devices')"><?=$lang_devices;?>
			</div>
			<div id="typeMenuThird" onClick="loadContent('groups')"><?=$lang_groups;?>
			</div>
		</div>
		
		<div id="topMargin">
		
		</div>
		<div id="loadContent"></div>
				
		
		<div id="loadAPI"></div>
		
		<script>
		function loadAPI(code){
		   $("#loadAPI").load(code);
		}
		</script>
		
		<script>
			function loadContent(type){
				$("#loadContent").scrollTop(0).load("api.php?loadContent=" +type)}
		</script>
		
		<script>
			$(document).ready(function(){ 
				$("#loadContent").scrollTop(0).load("api.php?loadContent=starred");
			}) 
		</script>
		<script>
		function APIPromptURL(urlon, urloff) {
			var on = prompt("<?=$lang_onNFC;?>", urlon);
			var off = prompt("<?=$lang_offNFC;?>", urloff);
		}
		</script>

</body>
</html>




