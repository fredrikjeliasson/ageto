<!doctype html>

<html lang="se">
<head>
	<meta charset="utf-8">

	<title>Ageto</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="default.css">
	  
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
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
</head>

<body>
		<div id="typeMenu">
			<h4>Ageto: in control. ver. 0.3</h4>
			<div id="typeMenuFirst" onClick="loadContent('starred')">Starred
			</div>
			<div id="typeMenuSecond" onClick="loadContent('devices')">Devices
			</div>
			<div id="typeMenuSecond" onClick="loadContent('groups')">Groups
			</div>
			<div id="typeMenuThird" onClick="loadContent('moods')">Moods
			</div>
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
		   $("#loadContent").load("api.php?loadContent=" +type);
		}
		</script>
		
		<script>
			$(document).ready(function(){ 
				$("#loadContent").load("api.php?loadContent=starred");
			}) 
		</script>

</body>
</html>




