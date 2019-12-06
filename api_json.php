<?php
	include "config.php";

	############################ //gets devices from DB and echoes them. Add DIV and CSS!!!	
	function deviceIcon($iconType) { 			
						
			echo "<img class=\"deviceTypeIcon\" src=\"$GLOBALS[$iconType]\">";
			
	}
	
	############################ //gets devices from DB and echoes them. Add DIV and CSS!!! #########
	function getStarred() { 
			
			$devices_arr=array();
			$devices_arr["records"]=array();

			$db = new SQLite3('devices.db');
			
			$results = $db->query('SELECT * FROM devices');
			while ($row = $results->fetchArray()) {
					extract($row);
					
					$deviceCodeOn = $GLOBALS["RF_group_code_on_part"] . $row['deviceCode']; 
					$deviceCodeOff = $GLOBALS["RF_group_code_off_part"] . $row['deviceCode'];
					
					$device=array(
						"id" => $deviceID, 
						"title" => $deviceName,
						"room_name" => lcfirst($deviceRoom),
						"code" => $deviceCode,
						"type" => strtolower($deviceType),
						"code_on" => $deviceCodeOn
					); 
					
					array_push($devices_arr["records"], $device);
					

					
									
				 }
				 	// set response code - 200 OK
					http_response_code(200);
				 
					// show products data in json format
					echo json_encode($devices_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
					
				 $db->close();
	}	
	
	
	############################ //gets devices from DB and echoes them. Add DIV and CSS!!! #########
	function getDevice() { 
			
			$products_arr=array();
			$products_arr["records"]=array();

			$db = new SQLite3('devices.db');
			
			$results = $db->query('SELECT * FROM devices');
			while ($row = $results->fetchArray()) {
					extract($row);
					
					$deviceCodeOn = $GLOBALS["RF_group_code_on_part"] . $row['deviceCode']; 
					$deviceCodeOff = $GLOBALS["RF_group_code_off_part"] . $row['deviceCode'];
					
					$product_item=array(
						"id" => $deviceID, 
						"title" => $deviceName,
						"room_name" => lcfirst($deviceRoom),
						"code" => $deviceCode,
						"type" => strtolower($deviceType),
						"code_on" => $deviceCodeOn
					); 
					
					array_push($products_arr["records"], $product_item);
					

					
									
				 }
				 	// set response code - 200 OK
					http_response_code(200);
				 
					// show products data in json format
					echo json_encode($products_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
					
				 $db->close();
	}	
	############################ //gets devices from DB and echoes them. Add DIV and CSS!!! #########
	function getdev() { 
	
			echo "<div id=\"selectedMenu\"><div id=\"notSelected\"></div><div id=\"selected\"></div><div id=\"notSelected\"></div><div id=\"notSelected\"></div></div><div id=\"outerContainer\">";
	
			$db = new SQLite3('devices.db');
			
			$results = $db->query('SELECT * FROM devices');
			while ($row = $results->fetchArray()) {
					$title = $row['deviceName']; 
					$room_name = lcfirst($row['deviceRoom']); 
				 	$code = $row['deviceCode']; 
					$type = strtolower($row['deviceType']); 
					$device_id = $row['deviceID']; 
					
					$lang_on = $GLOBALS["lang_on"];
					$lang_off = $GLOBALS["lang_off"];
				
					$deviceCodeOn = $GLOBALS["RF_group_code_on_part"] . $row['deviceCode']; 
					$deviceCodeOff = $GLOBALS["RF_group_code_off_part"] . $row['deviceCode'];
									
					echo "<div class='buttonContainer'>";

					//deviceIcon($type);
					
					echo "<h2>" . $title . "</h2><h3>" . ucfirst($room_name) . "</h3>";
					
					echo "<div class=\"linkToAPIButtonLeft\" href=\"#\" onClick=\"loadAPI('api.php?RFCodeOnly=$deviceCodeOn')\"><div class=\"centeredDIV\">On</div></div>";  //Add DIV and CSS here Off-button
					
					echo "<div class=\"linkToAPIButtonRight\" href=\"#\" onClick=\"loadAPI('api.php?RFCodeOnly=$deviceCodeOff')\"><div class=\"centeredDIV\">Off</div></div>"; //Add DIV and CSS here ON-button					
					
					echo "</div></div>";
				 }
				 $db->close();
				 echo "<a href=\"#\" onClick=\"loadContent('addDevice')\"><div class=\"addNew\">+</div></a>";
	}	
	
	############################ //gets groups from DB and echoes them. Add DIV and CSS!!! #########
	function getGroups() { 
	
			echo "<div id=\"selectedMenu\"><div id=\"notSelected\"></div><div id=\"notSelected\"></div><div id=\"selected\"></div><div id=\"notSelected\"></div></div><div id=\"outerContainer\">";
	
			$db = new SQLite3('devices.db');
			
			$results = $db->query('SELECT * FROM groups');
			while ($row = $results->fetchArray()) {
					$title = $row['groupName']; 
					$group_description = $row['groupDescription']; 
					$group_id = $row['groupID']; 

					$lang_on = $GLOBALS["lang_on"];
					$lang_off = $GLOBALS["lang_off"];
				
									
					echo "<div class='buttonContainer'>";

					//deviceIcon($type);
					
					echo "<h2>" . $title . "</h2><h3>" . ucfirst($group_description) . "</h3>";
					
					echo "<div class=\"linkToAPIButtonLeft\" href=\"#\" onClick=\"loadAPI('api.php?groupId=$group_id&action=on')\"><div class=\"centeredDIV\">On</div></div>";  //Add DIV and CSS here Off-button
					
					echo "<div class=\"linkToAPIButtonRight\" href=\"#\" onClick=\"loadAPI('api.php?groupId=$group_id&action=off')\"><div class=\"centeredDIV\">Off</div></div>"; //Add DIV and CSS here ON-button					
					
					echo "</div></div>";
				 }
				 $db->close();
					echo "<div class=\"addNew\">+</div>";
	}	
	
	
	############################ //gets devices from DB and echoes them. Add DIV and CSS!!! #########
	function getMoods() { 
	
			echo "<div id=\"selectedMenu\"><div id=\"notSelected\"></div><div id=\"notSelected\"></div><div id=\"notSelected\"></div><div id=\"selected\"></div></div><div id=\"outerContainer\">";
	
			$db = new SQLite3('devices.db');
			
			$results = $db->query('SELECT * FROM devices');
			while ($row = $results->fetchArray()) {
					$title = $row['deviceName']; 
					$room_name = lcfirst($row['deviceRoom']); 
				 	$code = $row['deviceCode']; 
					$type = strtolower($row['deviceType']); 
					$device_id = $row['deviceID']; 
					
					$lang_on = $GLOBALS["lang_on"];
					$lang_off = $GLOBALS["lang_off"];
				
					$deviceCodeOn = $GLOBALS["RF_group_code_on_part"] . $row['deviceCode']; 
					$deviceCodeOff = $GLOBALS["RF_group_code_off_part"] . $row['deviceCode'];
									
					echo "<div class='buttonContainer'>";

					//deviceIcon($type);
					
					echo "<h2>" . $title . "</h2><h3>" . ucfirst($room_name) . "</h3>";
					
					echo "<div class=\"linkToAPIButtonLeft\" href=\"#\" onClick=\"loadAPI('api.php?RFCodeOnly=$deviceCodeOn')\"><div class=\"centeredDIV\">On</div></div>";  //Add DIV and CSS here Off-button
					
					echo "<div class=\"linkToAPIButtonRight\" href=\"#\" onClick=\"loadAPI('api.php?RFCodeOnly=$deviceCodeOff')\"><div class=\"centeredDIV\">Off</div></div>"; //Add DIV and CSS here ON-button					
					
					echo "</div></div>";
				 }
				 $db->close();
				 echo "<div class=\"addNew\">+</div>";
	}	
	
	############################//gets devices from DB and echoes them. Add DIV and CSS!!!	
		function sendCode($type, $repeat, $code) {
			
		// Set device controle options (See man page for stty)
		exec("/bin/stty -F /dev/ttyS2 19200 sane raw cs8 hupcl cread clocal -echo -onlcr ");

		// Open serial port
		$fp=fopen("/dev/ttyS2","c+");
		if(!$fp) die("Can't open device");

		// Set blocking mode for writing
		stream_set_blocking($fp,1);
		fwrite($fp,"R," . $repeat . "," . $code . "E");

		
		}	
	
	// If receive only rf code via GET RFCodeOnly, send to function with defaults
	if(isset($_GET['RFCodeOnly'])) {
				
		$RFCode = $_GET['RFCodeOnly'];
		sendCode("R", $defaultRepeat, $RFCode);

	}
	if(isset($_GET['groupId'])) {
		
		$groupAction = $_GET['action'];
			if($groupAction == "on") {
			$groupActionCode = $RF_group_code_on_part;
			} elseif ($groupAction == "off") {
			$groupActionCode = $RF_group_code_off_part;
			}
		$groupId = $_GET['groupId'];
		
		$dbGroup = new SQLite3('devices.db');
			
		$resultsGroup = $dbGroup->query("SELECT * FROM devices WHERE deviceGroup = '$groupId'");
		while ($rowGroup = $resultsGroup->fetchArray()) {
			$deviceCode = $rowGroup['deviceCode']; 
			$deviceCode = $groupActionCode . $deviceCode . "E";
			
		sendCode("R", "5", $deviceCode);
		usleep(450000);
		}
		$dbGroup->close();
	}
	
	if(isset($_GET['loadContent']) && $_GET['loadContent'] == "starred") {
		getStarred();
	}
	
	if(isset($_GET['loadContent']) && $_GET['loadContent'] == "devices") {
		getdev();
	}

	if(isset($_GET['loadContent']) && $_GET['loadContent'] == "groups") {
		getGroups();
	}
	
	if(isset($_GET['loadContent']) && $_GET['loadContent'] == "moods") {
		getMoods();
	}
	
	//################################################################# Form for new device #################################################################################

	if (isset($_GET['loadContent']) && $_GET['loadContent'] == "addDevice") { 
		$RFCode = rfcode();
		$newDevice = $RF_group_code_on_part . $RFCode;
	?>
		<form style="font-size:14px; float: left;" action="api.php?saveNew=true" method="post">
			Namn<br />
			<input name="title" type="text" value="Ex. Fönsterlampa" onfocus="if(this.value=='Ex. Fönsterlampa') this.value='';"><br /><br />
			Rum<br />
			<input name="room" type="text" value="Ex. Vardagsrum"  onfocus="if(this.value=='Ex. Vardagsrum') this.value='';"><br /><br />
			Slumpad kod (går ej att ändra)<br />
			<input name="rfcode" type="text" value="<?=$RFCode;?>" READONLY>
			<br /><a onclick="send_device('?sendDevice=<?=$newDevice?>');return false;" href="#">Skicka signalen</a><br /><br />
			
			<button type="submit" value="Spara" class="device_buttons"><img src="html_images/floppy1.png"> Spara</button>
		</form>
<?	}	if (isset($_GET['saveNew'])) {

			$RFCode = $_POST['rfcode'];
			$roomName = $_POST['room'];
			$title = $_POST['title'];
			
				$db = new SQLite3('devices.db');
				$db->exec("INSERT INTO devices 
				(deviceID, deviceName, deviceDescription, deviceRoom, deviceGroup, deviceMood, deviceCode, deviceOff) VALUES 
				(NULL, '$title', NULL, '$roomName', NULL, NULL, '$RFCode', NULL)");
				$db->close();
						
			echo "<script>window.location = \"index.php\"</script>";
			
			
			
} 

	//####################################### The top function returns 1 or 0 randomly, the second function calls the first in a pattern to create a new RFCode #############################################	
	
	function rfcodehighs($mini,$maxi) {
		$partnr = rand($mini, $maxi);
		$part = '';
		
			while($partnr > '0') {
        
				$part = $part . 1;
				$partnr = $partnr - 1;
		} 
		return $part;	
}

	function rfcode() {
		$total = rand(0, 1);
		if($total == '1') $total = $total . '0';
		$total = $total . rfcodehighs(1, 3);
		$total = $total . '0';
		$total = $total . rfcodehighs(1, 3);
		$total = $total . '0';
		$total = $total . rfcodehighs(1, 3);
		$total = $total . '0';
		$total = $total . rfcodehighs(2, 4); //ta reda på om detta är en bugg att det måste vara 2-3 i slutet, samt om det blir skillnad på 3 och 4
			
		$db = new SQLite3('devices.db');

		$results = $db->query("SELECT * FROM devices WHERE deviceCode='$total'");
		if($row = $results->fetchArray()) {
						$total = null;
						rfcode();
					} else {
						return $total;
					}				 	
		$db->close();
	}
rfcode();

?>