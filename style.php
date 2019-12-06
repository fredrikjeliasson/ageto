<? 
	header("Content-type: text/css");
	
	
	$h1_color = "#000000";
	$h1_size = "18";
	$h2_color = "";
	$h2_size = "16";
	$h3_color = "";
	$h3_size = "12";
	$h4_color = "#EB9113";
	$h4_size = "18";
	
	$button_text_color = "";
	
	$select_height = "2";//(i pixlar) Randen under översta menyn - höjd
	$select_selected = "#EB9113";
	$select_unselected = "#FFFFFF";
	
	$typeMenuContainerHeight = "80";
	$typeMenuContainerTopPadding = "20";
	$selectedMenuTop = ($typeMenuContainerHeight+$typeMenuContainerTopPadding); // höjd på översta menyn i pix

	$typeMenuPaddingTop = "20";
	$typeMenuPaddingBottom = "20";
	
	$standardTileContainerMargin = "10";
	
	//Nedan räknas margin ut för De översta knapparna så att De följer med storlek på text etc.
	$typeMenuMarginTop = ($typeMenuContainerHeight+$typeMenuContainerTopPadding)-($h1_size+$typeMenuContainerTopPadding+$h4_size+$typeMenuPaddingTop+$typeMenuPaddingBottom);
	?>
	
@font-face {
    font-family: Montserrat-Light;
    src: url(lib/fonts/Montserrat-Light.otf);
}
body {
	font-family: Montserrat-Light;
	margin: 0;
	padding: 0;
	width: 100%;
	background-color: #FFFFFF;
	}
h1 {
	color: #000000;
	font-size: <?=$h1_size;?>px;
	margin: 0px;
		padding: 0px;
	line-height: <?=$h1_size;?>px;
}
h2 {
	font-size: <?=$h2_size;?>px;
	*font-weight: 5000;
	margin: 0px 0px 0px 0px;
		padding: 0px;
}
h3 {
	font-size: <?=$h3_size;?>px;
	*font-weight: 100;
	margin: 0px;
		padding: 0px;
}
h4 {
	color: <?=$h4_color;?>;
	font-size: <?=$h4_size;?>px;
	margin: 0px;
	*font-weight: 500;	
	padding: 0px;
	line-height: <?=$h4_size;?>px;
}
a {
	text-decoration: none;
	-webkit-tap-highlight-color: rgba(0,0,0,0);
}

div:hover {
	text-decoration: none;
	-webkit-tap-highlight-color: rgba(0,0,0,0);
}
div:active {
	text-decoration: none;
	-webkit-tap-highlight-color: rgba(0,0,0,0);
}
#outerContainer {
	width: 100%;
	height: auto;
	overflow: none;
	position: relative;
	background-color: #FFFFFF;
}
#loadAPI {
	*visibility: hidden;
	height: 50px;
}
#typeMenuContainer {
	padding-top: <?=$typeMenuContainerTopPadding?>px;
	width: 100%;
	height: <?=$typeMenuContainerHeight?>px;
	overflow: none;
	position: fixed;
	color: #eb9113;
	background-color: #FFFFFF;
	text-align: center;
	z-index: 2;
	box-shadow: 0px 2px 10px #808080;
}
#topMargin {
	top:0px;
	position: relative;
	width: 100%;
	background-color: RGBA(0, 0, 0, 0);
	height: <?=$typeMenuContainerHeight+$typeMenuContainerTopPadding+$select_height?>px;
}
#loadContent {
    background:  none repeat scroll 0 0;
    border: 0px collapse #666;
    padding-top: <?=$standardTileContainerMargin?>px;
	background-color: #FFFFFF;	
    position: relative;
    width: 100%;
    height: calc(100vh-<?=$typeMenuContainerHeight+$typeMenuContainerTopPadding+$select_height?>px);
    overflow: auto;
}

#selectedMenu {
	width: 100%;
	height: 2px;
	position: fixed;
	*background-color: #EFC75E;	
	text-align: center;
	top: <?=$selectedMenuTop?>px;
	z-index: 3;
}
.centeredDIV {
	display: table-cell;
	vertical-align: middle;	
}
.centeredDIV.active {
	color: #eb9113;
	font-weight: 800;
}
.buttonMiddleContainer {
	*background-color: #808080;
	color: #808080;
	background-position: center;
	transition: background 0.8s;
	display: table;
	text-decoration: none;
	width: 33%;
	height: 100px;
	border: 0px collapse #000000;
	text-align: center;
	margin: 0px;
	font-weight: 800;
	float:left;
	}
[class*="linkToAPIButton"] {
	vertical-align: middle;	
	*background-color: #ffffff;
	color: #808080;
	background-position: center;
	transition: background 0.8s;
	display: table;
	text-decoration: none;
	width: 33%;
	height: 100px;
	border: 0px collapse #000000;
	text-align: center;
	*margin: 0px;
	font-weight: 800;
	}
[class*="linkToAPIButton"]:hover {
	background: #ffffff radial-gradient(circle, transparent 1%, #ffffff  1%, #ffffff) center/10000%;
	transition: background 0.5s;
	}
[class*="linkToAPIButton"]:active {
	background-color: #808080;
	background-size: 100%;
	transition: background 1s;
}
.linkToAPIButtonLeft {
	float: left;
	vertical-align: middle;	
	}
.linkToAPIButtonRight {
	vertical-align: middle;	
	float: right;
	}
.typeContainer {
	text-align: center;
	position: relative;
	width: 100%;
	height: auto;
	overflow: auto;
	background-color: #FFFFFF;	
	margin-bottom: <?=$standardTileContainerMargin?>px;
	margin-top: 5px;
	*box-shadow: 0px 2px 10px #D3D3D2;
	}
.infoContainer {
	text-align: center;
	position: relative;
	width: 80%;
	height: auto;
	overflow: auto;
	background-color: #FFFFFF;	
	margin-top: 0px;
	margin-bottom: <?=$standardTileContainerMargin?>px;
	padding: 0% 10% 0% 10%;
	*margin-left: 2%;
	*box-shadow: 0px 2px 10px #D3D3D2;
	}
.settingsContainer h2{
	text-align: center;
}
.settingsContainer {
	text-align: left;
	position: relative;
	width: calc(100%-20px);
	height: auto;
	overflow: auto;
	background-color: #FFFFFF;	
	margin-top: 0px;
	margin-bottom: <?=$standardTileContainerMargin?>px;
	padding: 10px 10px 10px 10px;
	*margin-left: 2%;
	*box-shadow: 0px 2px 10px #D3D3D2;
	}
.buttonContainer h2 {
	margin-top: 5px;
}
.buttonContainer {
	text-align: center;
	position: relative;
	width: 100%;
	height: auto;
	overflow: auto;
	background-color: #FFFFFF;	
	margin-bottom: <?=$standardTileContainerMargin?>px;
	*margin-left: 2%;
	box-shadow: 0px 2px 10px #D3D3D2;
	}
[id*="typeMenu11"] {
	width: 33.33%;
	padding-top: 20px;
	padding-bottom: 20px;
	background-color: blue;
	float: left;
	margin-bottom: 0px;
}
#typeMenuFirst {
	width: 33.33%;
	padding-top: <?=$typeMenuPaddingTop?>px;
	padding-bottom: <?=$typeMenuPaddingBottom?>px;
	background-color: #FFFFFF;
	float: left;
	margin-top: <?=$typeMenuMarginTop?>px;
}
#typeMenuSecond {
	width: 33.33%;
	padding-top: <?=$typeMenuPaddingTop?>px;
	padding-bottom: <?=$typeMenuPaddingBottom?>px;
	background-color: #FFFFFF;;
	float: left;
	margin-top: <?=$typeMenuMarginTop?>px;
}
#typeMenuThird {
	width: 33.33%;
	padding-top: <?=$typeMenuPaddingTop?>px;
	padding-bottom: <?=$typeMenuPaddingBottom?>px;
	background-color: #FFFFFF;
	float: left;
	margin-top: <?=$typeMenuMarginTop?>px;
}
#typeMenuFirst:hover {
	cursor: pointer;
	}
#typeMenuSecond:hover {
	cursor: pointer;
	}
#typeMenuThird:hover {
	cursor: pointer;
	}
#selected {
	width: 33.33%;
	background-color: #eb9113;
	float: left;
	height: 2px;
}
#notSelected {
	width: 33.33%;
	float: left;
	height: 2px;
	background-color: #ffffff;
}
.addNew {
	background-color: #03A9F4;
	border-radius: 35px;
	box-shadow: 0px 2px 10px #808080;
	text-align: center;
	color: #FFFFFF;
	font-size: 30px;
	font-weight: 100;
	float: right;
	bottom: 10px;
	right: 10px;
	position: fixed;
	padding: 7px 18px 7px 18px;
}
input:not([type]), input[type=text] {
	-webkit-appearance: none;
    -moz-appearance:    none;
    appearance:         none;
}
input[type=text] {
    font-weight: 100;
    *color: grey;
    height: 50px;
    width: 90vw;
    padding-left: 10px;
	padding-right: 10px;
    font-size: 16px;
    border: none;
    border-bottom: 1px SOLID #C0C0C0;
    font-weight: 800;
    *box-shadow: inset 0px 0px 5px #E7E7E7;
	margin: 0px;
	*background-color: #F9F9F9;
    color: #B9B9B9;
	outline: none;
}
input[type=text]:focus, select:focus {
	border-radius: 0px;
    border-bottom: 1px solid #555;
}
.submitButtons {
	-webkit-border-radius: 5;
	-moz-border-radius: 5;
	border-radius: 5px;
	font-family: Arial;
	color: #ffffff;
	font-size: 20px;
	background: #eb9113;
	padding-top: 15px;
	padding-bottom: 15px;
	width: 220px;
	text-decoration: none;
	border: none;
	margin: 15px 5px 15px 5px;
 }
form {
	*text-align: center;
	position: relative;
	width: 100%;
	height: auto;
	overflow: auto;
	background-color: #FFFFFF;	
	margin-bottom: 10px;
	margin-left: 0%;
	box-shadow: 0px 2px 10px #808080;
	*border-radius: 10px;
	padding-top: 5px;
	padding-left: 2%;
}
select {
    color: #B9B9B9;
    height: 50px;
    width: 96vw;
	padding: 10px 10px;
    font-size: 16px;
    *border-radius: 8px;
    border: 1px SOLID #C0C0C0;
    font-weight: 800;
    box-shadow: inset 0px 0px 5px #E7E7E7;
	margin: 0px;
	background-color: #F9F9F9;
	outline: none;
	    border: none;
    border-bottom: 1px SOLID #C0C0C0;
 } 
input[type="checkbox"] {
    display:none;
}
input[type=checkbox] {
   display:inline-block;
    width:25px;
    height:25px;
	background-color: #808080;
}
.selectionContainer {
	font-size: 14px;
	text-align: left;
	position: relative;
	width: 100%;
	height: auto;
	overflow: auto;
	background-color: #FFFFFF;	
	margin-top: 10px;
	margin-left: 0%;
	box-shadow: 0px 2px 6px #808080;
	padding: 5px;
	}
.selectionContainer select {
    font-weight: 100;
    color: grey;
    height: 40px;
    width: 85px;
    padding-left: 5px;
    font-size: 14px;
    border-radius: 8px;
    border: 1px SOLID #C0C0C0;
    font-weight: 100;
    box-shadow: inset 0px 0px 5px #E7E7E7;
	margin: 0px;
	background-color: #F8F8FF;
 } 
