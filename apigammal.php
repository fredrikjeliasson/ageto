<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
include "config.php";


########################################################################################################################################################################
###################################################################         Get section         ########################################################################
########################################################################################################################################################################
##############################          This part holds the functions for showing Starred, Devices and Groups         ##################################################

########################################################################################################################################################################
function getStarred()
{
    
    global $lang_on;
    global $lang_off;
    global $lang_devices;
    global $lang_groups;
    global $lang_noDevicesFound;
    global $lang_noGroupsFound;
    
    echo "<div id=\"selectedMenu\"><div id=\"selected\"></div><div id=\"notSelected\"></div><div id=\"notSelected\"></div></div><div id=\"outerContainer\">";
    
    echo "<div class=\"buttonContainer\">";
    echo "<h4>$lang_devices</h4>";
    echo "</div>";
    
    $db = new SQLite3('devices.db');
    
    $results = $db->query("SELECT * FROM devices WHERE deviceStarred = '1'");
    while ($row = $results->fetchArray()) {
        
        $title     = $row['deviceName'];
        $room_name = lcfirst($row['deviceRoom']);
        $code      = $row['deviceCode'];
        $type      = strtolower($row['deviceType']);
        $device_id = $row['deviceID'];
        
        $deviceCodeOn  = $GLOBALS["RF_group_code_on_part"] . $row['deviceCode'];
        $deviceCodeOff = $GLOBALS["RF_group_code_off_part"] . $row['deviceCode'];
        
        echo "<div class=\"buttonContainer\">";
        
        echo "<h2>" . $title . "</h2><h3>" . ucfirst($room_name) . "</h3>";
        
        echo "<div class=\"linkToAPIButtonLeft\" href=\"#\" onClick=\"loadAPI('api.php?RFCodeOnly=$deviceCodeOn')\"><div class=\"centeredDIV\">$lang_on</div></div>"; //Add DIV and CSS here Off-button
        
        echo "<div class=\"linkToAPIButtonRight\" href=\"#\" onClick=\"loadAPI('api.php?RFCodeOnly=$deviceCodeOff')\"><div class=\"centeredDIV\">$lang_off</div></div>"; //Add DIV and CSS here ON-button					
        
        echo "</div></div>";
    }
    if ($row = $results->fetchArray() != true) {
        
        echo "<div class=\"buttonContainer\">";
        
        echo $lang_noDevicesFound;
        
        echo "</div>";
    }
    $db->close();
    
    echo "<div class=\"buttonContainer\">";
    
    echo "<h4>$lang_groups</h4>";
    
    echo "</div>";
    
    $db = new SQLite3('devices.db');
    
    $results = $db->query("SELECT * FROM groups WHERE groupStarred = '1'");
    while ($row = $results->fetchArray()) {
        
        $title            = $row['groupName'];
        $groupDescription = $row['groupDescription'];
        $groupUniqueCode  = $row['groupUniqueCode'];
        
        echo "<div class=\"buttonContainer\">";
        
        echo "<h2>" . $title . "</h2><h3>" . ucfirst($groupDescription) . "</h3>";
        
        echo "<div class=\"linkToAPIButtonLeft\" href=\"#\" onClick=\"loadAPI('api.php?groupId=$groupUniqueCode&action=on')\"><div class=\"centeredDIV\">$lang_on</div></div>";
        
        echo "<div class=\"linkToAPIButtonRight\" href=\"#\" onClick=\"loadAPI('api.php?groupId=$groupUniqueCode&action=off')\"><div class=\"centeredDIV\">$lang_off</div></div>";
        
        echo "</div></div>";
    }
    if ($row = $results->fetchArray() != true) {
        
        echo "<div class=\"buttonContainer\">";
        
        echo $lang_noGroupsFound;
        
        echo "</div>";
    }
    $db->close();
}
########################################################################################################################################################################
function getDevices()
{
    
    global $lang_on;
    global $lang_off;
    global $lang_noDevicesFound;
    global $localIP;
	global $IconStarred;
	global $IconStar;
    
    echo "<div id=\"selectedMenu\"><div id=\"notSelected\"></div><div id=\"selected\"></div><div id=\"notSelected\"></div></div><div id=\"outerContainer\">";
    
    $db = new SQLite3('devices.db');
    
    $results = $db->query('SELECT * FROM devices');
    while ($row = $results->fetchArray()) {
        
        $title     = $row['deviceName'];
        $room_name = lcfirst($row['deviceRoom']);
        $code      = $row['deviceCode'];
        $type      = strtolower($row['deviceType']);
        $device_id = $row['deviceID'];
       // $starred   = $row['deviceStarred'];
        
        $deviceCodeOn  = $GLOBALS["RF_group_code_on_part"] . $row['deviceCode'];
        $deviceCodeOff = $GLOBALS["RF_group_code_off_part"] . $row['deviceCode'];

        
        
        echo "<div class=\"buttonContainer\">";
        
        echo "<h2 onClick=\"APIPromptURL('http://$localIP/api.php?RFCodeOnly=$deviceCodeOn', 'http://$localIP/api.php?RFCodeOnly=$deviceCodeOff')\">" . $title . "</h2><h3>" . ucfirst($room_name) . "</h3>";
        
        echo "<div class=\"linkToAPIButtonLeft\" href=\"#\" onClick=\"loadAPI('api.php?RFCodeOnly=$deviceCodeOn')\"><div class=\"centeredDIV\">$lang_on</div></div>"; //Add DIV and CSS here Off-button
        
        /* if ($starred == '1') {
            
            echo "<a href=\"#\" onClick=\"loadContent('starDevice&deviceId=$device_id')\">$IconStarred</a>";
            
        } elseif ($starred < '1') {
            
            echo "<a href=\"#\" onClick=\"loadContent('starDevice&deviceId=$device_id')\">$IconStar</a>";
            
        }
		*/
        
        echo "<div class=\"linkToAPIButtonRight\" href=\"#\" onClick=\"loadAPI('api.php?RFCodeOnly=$deviceCodeOff')\"><div class=\"centeredDIV\">$lang_off</div></div>"; //Add DIV and CSS here ON-button					
        
        echo "</div></div>";
    }
    if ($row = $results->fetchArray() != true) {
        
        echo "<div class=\"buttonContainer\"><h4>";
        
        echo $lang_noDevicesFound;
        
        echo "</h4></div>";
        
    }
    $db->close();
    echo "<a href=\"#\" onClick=\"loadContent('addDevice')\"><div class=\"addNew\">+</div></a>";
}

########################################################################################################################################################################
function getGroups()
{
    
    global $lang_on;
    global $lang_off;
    global $lang_noGroupsFound;
	global $localIP;
	global $IconTimer;
	global $IconStarred;
	global $IconStar;
	global $IconDevices;
    
    echo "<div id=\"selectedMenu\"><div id=\"notSelected\"></div><div id=\"notSelected\"></div><div id=\"selected\"></div></div><div id=\"outerContainer\">";
    
    $db = new SQLite3('devices.db');
    
    $results = $db->query('SELECT * FROM groups');
    while ($row = $results->fetchArray()) {
        $title             = $row['groupName'];
        $group_description = $row['groupDescription'];
        $groupId           = $row['groupID'];
        $groupUniqueCode   = $row['groupUniqueCode'];
        $starred           = $row['groupStarred'];
        
        
        echo "<div class='buttonContainer'>";
        
        echo "<h2 onClick=\"APIPromptURL('http://$localIP/api.php?groupId=$groupUniqueCode&action=on', 'http://$localIP/api.php?groupId=$groupUniqueCode&action=off')\">" . $title . "</h2><h3>" . ucfirst($group_description) . "</h3>";
        
        echo "<div class=\"linkToAPIButtonLeft\" href=\"#\" onClick=\"loadAPI('api.php?groupId=$groupUniqueCode&action=on')\"><div class=\"centeredDIV\">$lang_on</div></div>"; //Add DIV and CSS here Off-button
        
        echo "<a href=\"#\" onClick=\"loadContent('showGroupTimers&groupUniqueCode=$groupUniqueCode')\">$IconTimer</a>";
        
        if ($starred == '1') {
            echo "<a href=\"#\" onClick=\"loadContent('starGroup&UniqueGroupId=$groupUniqueCode')\">$IconStarred</a>";
        } elseif ($starred < '1') {
            echo "<a href=\"#\" onClick=\"loadContent('starGroup&UniqueGroupId=$groupUniqueCode')\">$IconStar</a>";
        }
        
        echo "<a href=\"#\" onClick=\"loadContent('showGroupDevices&groupUniqueCode=$groupUniqueCode')\">$IconDevices</a>";
        
        echo "<div class=\"linkToAPIButtonRight\" href=\"#\" onClick=\"loadAPI('api.php?groupId=$groupUniqueCode&action=off')\"><div class=\"centeredDIV\">$lang_off</div></div>"; //Add DIV and CSS here ON-button					
        
        echo "</div></div>";
    }
    if ($row = $results->fetchArray() != true) {
        echo "<div class='buttonContainer'><h2>";
        echo $lang_noGroupsFound;
        echo "</h2></div>";
    }
    $db->close();
    echo "<a href=\"#\" onClick=\"loadContent('addGroup')\"><div class=\"addNew\">+</div></a>";
}




########################################################################################################################################################################
##############################################################        Calls functions above         ####################################################################
########################################################################################################################################################################
if (isset($_GET['loadContent']) && $_GET['loadContent'] == "starred") {
    getStarred();
}

if (isset($_GET['loadContent']) && $_GET['loadContent'] == "devices") {
    getDevices();
}

if (isset($_GET['loadContent']) && $_GET['loadContent'] == "groups") {
    getGroups();
}




########################################################################################################################################################################
######################################################################         Timers       ############################################################################
########################################################################################################################################################################


########################################################################################################################################################################
if (isset($_GET['loadContent']) && $_GET['loadContent'] == "showGroupTimers") {
    
    echo "<div id=\"selectedMenu\"><div id=\"notSelected\"></div><div id=\"notSelected\"></div><div id=\"selected\"></div></div><div id=\"outerContainer\">";
    
    $groupUniqueCode = $_GET['groupUniqueCode'];
    $db              = new SQLite3('devices.db');
    $results         = $db->query("SELECT * FROM groups WHERE groupUniqueCode = '$groupUniqueCode'");
    while ($row = $results->fetchArray()) {
        $group_name = lcfirst($row['groupName']);
    }
    $db->close();
    
?>
			<div class='buttonContainer'><?
    echo "<h2>Timer i grupp $group_name</h2>";
?>
			
		<?
    $db      = new SQLite3('devices.db');
    $results = $db->query("SELECT * FROM timers WHERE timerGroupId = '$groupUniqueCode'");
    while ($row = $results->fetchArray()) {
        $timer_name = lcfirst($row['timerAction']);
        $timer_time = $row['timerTime'];
		$timerWeekdays = $row['timerWeekdays'];
		
        echo "<div class='selectionContainer'>";
        echo $timer_name;
        echo ", ";
        echo $timer_time;
		echo ", $timerWeekdays";
        echo "</div>";
    }
    $db->close();
    
?>
			</div>
			<?
    echo "<a href=\"#\" onClick=\"loadContent('newTimer&groupUniqueCode=$groupUniqueCode')\"><div class=\"addNew\">+</div></a>";
}
########################################################################################################################################################################
if (isset($_GET['loadContent']) && $_GET['loadContent'] == "newTimer") {
    
    echo "<div id=\"selectedMenu\"><div id=\"notSelected\"></div><div id=\"notSelected\"></div><div id=\"selected\"></div></div><div id=\"outerContainer\">";
    
    $groupUniqueCode = $_GET['groupUniqueCode'];
    $db              = new SQLite3('devices.db');
    $results         = $db->query("SELECT * FROM groups WHERE groupUniqueCode = '$groupUniqueCode'");
    while ($row = $results->fetchArray()) {
        $group_name = lcfirst($row['groupName']);
    }
    $db->close();
?>
		<form style="font-size:14px; float: left;" action="api.php?saveNewTimer=true&groupUniqueCode=<?= $groupUniqueCode ?>" method="post">
			<?
    echo "<h2>Ny timer i grupp $group_name</h2>";
?>
			<h2>Veckodagar</h2><br />
			
			<div class='selectionContainer'>
			
			<input type="checkbox" name="weekdays[]" value="Monday"><label>Måndag</label><br />
			<input type="checkbox" name="weekdays[]" value="Tuesday"><label>Tisdag</label><br />
			<input type="checkbox" name="weekdays[]" value="Wednesday"><label>Onsdag</label><br />
			<input type="checkbox" name="weekdays[]" value="Thursday"><label>Torsdag</label><br />
			<input type="checkbox" name="weekdays[]" value="Friday"><label>Fredag</label><br />
			<input type="checkbox" name="weekdays[]" value="Saturday"><label>Lördag</label><br />
			<input type="checkbox" name="weekdays[]" value="Sunday"><label>Söndag</label><br />
			</div><br /><br />
			<h2>Handling</h2><br />
			<select name="action">
				<option value="On">On</option>
				<option value="Off">Off</option>
			</select>
			<h2>Timme</h2><br />
			
			<select name="hour">

			<?
    $i = 0;
    while ($i <= 23) {
        if (strlen($i) < 2) {
            $i = "0" . $i;
        }
        echo "<option value=\"" . $i . "\">" . $i . " Hr</option>";
        $i++;
    }
?>
			
			</select>
			<h2>Minut</h2><br />
			<select name="minute">
			
			<?
    $i = 0;
    while ($i <= 55) {
        if (strlen($i) < 2) {
            $i = "0" . $i;
        }
        echo "<option value=\"" . $i . "\">" . $i . " Min</option>";
        $i = $i + 5;
    }
?>
			
			</select>
			

	
			<button type="submit" value="Spara" class="submitButtons"><?=$IconSave?> Spara</button>
		</form>
<?
}
if (isset($_GET['saveNewTimer'])) {
    
    $groupUniqueCode  = $_GET['groupUniqueCode'];
    $timerHour        = $_POST['hour'];
    $timerMinute      = $_POST['minute'];
    $timerTime        = $timerHour . ":" . $timerMinute;
    $timerWeekdays    = $_POST['weekdays'];
    $timerWeekdays    = implode(",", $timerWeekdays);
    $timerAction      = $_POST['action'];
    
    $db = new SQLite3('devices.db');
    $db->exec("INSERT INTO timers
				(timerGroupId, timerWeekdays, timerTime, timerAction, timerLastAction) VALUES 
				('$groupUniqueCode', '$timerWeekdays', '$timerTime', '$timerAction', '0')");
    $db->close();
    
    //echo "<script>window.location = \"index.php\"</script>";
    
    
    
}




########################################################################################################################################################################
######################################################################        Devices       ############################################################################
########################################################################################################################################################################


########################################################################################################################################################################
if (isset($_GET['loadContent']) && $_GET['loadContent'] == "addDevice") {
    do {
        $RFCode = generateRFCode();
    } while (!$RFCode);
    $newDevice = $RF_group_code_on_part . $RFCode;
?>
		<form style="font-size:14px; float: left;" action="api.php?saveNewDevice=true" method="post">
			<h2>Namn</h2><br />
			<input name="title" type="text" value="Ex. Fönsterlampa" onfocus="if(this.value=='Ex. Fönsterlampa') this.value='';"><br /><br />
			<h2>Rum</h2><br />
			
			<select name="room">
			<?
    $db = new SQLite3('devices.db');
    
    $results = $db->query("SELECT * FROM rooms");
    while ($row = $results->fetchArray()) {
        $roomName = $row['roomName'];
		global $iconSend
?>
			  <option value="<?= $roomName ?>"><?= $roomName ?></option>
			<?
    }
?>
			</select>
			<br /><br />
			<h2>Slumpad kod</h2> (går ej att ändra)<br />
			<input name="rfcode" type="text" value="<?= $RFCode; ?>" READONLY>
			<button value="Spara" class="submitButtons" onclick="loadAPI('api.php?RFCodeOnly=<?= $newDevice ?>');return false;" href="#"><?=$IconSend;?>Skicka signalen</button>
			<button type="submit" value="Spara" class="submitButtons"><?=$IconSave;?>Spara</button>
		</form>
<?
}
if (isset($_GET['saveNewDevice'])) {
    
    $RFCode   = $_POST['rfcode'];
    $roomName = $_POST['room'];
    $title    = $_POST['title'];
    
    $db = new SQLite3('devices.db');
    $db->exec("INSERT INTO devices 
				(deviceID, deviceName, deviceDescription, deviceRoom, deviceGroup, deviceMood, deviceCode, deviceOff) VALUES 
				(NULL, '$title', NULL, '$roomName', NULL, NULL, '$RFCode', NULL)");
    $db->close();
    
    echo "<script>window.location = \"index.php\"</script>";
    
    
    
}
########################################################################################################################################################################
if (isset($_GET['loadContent']) && $_GET['loadContent'] == "starDevice") {
    
    
    $deviceId = $_GET['deviceId'];
    
    $db      = new SQLite3('devices.db');
    $results = $db->query("SELECT * FROM devices WHERE deviceID = '$deviceId'");
    while ($row = $results->fetchArray()) {
        $starred = $row['deviceStarred'];
    }
    $db->close();
    
    
    $db = new SQLite3('devices.db');
    
    if ($starred == '1') {
        $query = $db->exec("UPDATE devices SET deviceStarred='0' WHERE deviceID = '$deviceId'");
    } elseif ($starred < '1') {
        $query = $db->exec("UPDATE devices SET deviceStarred='1' WHERE deviceID = '$deviceId'");
    }
    
    $db->close();

    echo "<script>window.location = \"index.php\"</script>";
    
    
    
}




########################################################################################################################################################################
######################################################################        Groups        ############################################################################
########################################################################################################################################################################

########################################################################################################################################################################
if (isset($_GET['loadContent']) && $_GET['loadContent'] == "addGroup") {
	
    global $lang_name;
    global $lang_save;
    global $lang_description;
    global $lang_groups;
	global $lang_exampleOne;
    global $lang_exampleTwo;
    
?>
		<form style="font-size:14px; float: left;" action="api.php?saveNewGroup=true" method="post">
			<h2><?=$lang_name;?></h2><br />
			<input name="groupName" type="text" value="<?=$lang_exampleOne;?>" onfocus="if(this.value=='<?=$lang_exampleOne;?>') this.value='';"><br /><br />
			<h2><?=$lang_description;?></h2><br />
			<input name="groupDescription" type="text" value="<?=$lang_exampleTwo;?>" onfocus="if(this.value=='<?=$lang_exampleTwo;?>') this.value='';"><br /><br />
			<button type="submit" value="Spara" class="submitButtons"><img src="html_images/icons/ic_save_white_18dp_1x.png"> <?=$lang_save;?></button>
		</form>
<?
}
if (isset($_GET['saveNewGroup'])) {
    
    $groupName   		= $_POST['groupName'];
    $groupDescription 	= $_POST['groupDescription'];
    $groupUniqueCode 	= time();
    
    $db = new SQLite3('devices.db');
    $db->exec("INSERT INTO groups
				(groupName, groupDescription, groupUniqueCode) VALUES 
				('$groupName' , '$groupDescription', '$groupUniqueCode')");
    $db->close();
    
    echo "<script>window.location = \"index.php\"</script>";
    
    
    
}
########################################################################################################################################################################
if (isset($_GET['loadContent']) && $_GET['loadContent'] == "starGroup") {
    
    
    $groupId = $_GET['UniqueGroupId'];
    
    $db      = new SQLite3('devices.db');
    $results = $db->query("SELECT * FROM groups WHERE groupUniqueCode = '$groupId'");
    while ($row = $results->fetchArray()) {
        $starred = $row['groupStarred'];
    }
    $db->close();
    
    
    $db = new SQLite3('devices.db');
    
    if ($starred == '1') {
        $query = $db->exec("UPDATE groups SET groupStarred='0' WHERE groupUniqueCode = '$groupId'");
    } elseif ($starred < '1') {
        $query = $db->exec("UPDATE groups SET groupStarred='1' WHERE groupUniqueCode = '$groupId'");
    }
    
    
    
    
    $db->close();
    
    
    
    
    echo "<script>window.location = \"index.php\"</script>";
    
    
    
}
########################################################################################################################################################################
if (isset($_GET['loadContent']) && $_GET['loadContent'] == "showGroupDevices") {
    
    echo "<div id=\"selectedMenu\"><div id=\"notSelected\"></div><div id=\"notSelected\"></div><div id=\"selected\"></div></div><div id=\"outerContainer\">";
    
    $groupUniqueCode = $_GET['groupUniqueCode'];
    $db              = new SQLite3('devices.db');
    $results         = $db->query("SELECT * FROM groups WHERE groupUniqueCode = '$groupUniqueCode'");
    while ($row = $results->fetchArray()) {
        $group_name = lcfirst($row['groupName']);
    }
    $db->close();
?>
		
		<form name="saveGroupForm" style="font-size:14px; float: left;" action="api.php?saveGroup=<?= $groupUniqueCode ?>" method="post">
		<?
    echo "<h2>Enheter i grupp $group_name</h2>";
    $numberOfDevices = "";
    $db              = new SQLite3('devices.db');
    
    $results = $db->query('SELECT * FROM devices');
    while ($row = $results->fetchArray()) {
        $title                = $row['deviceName'];
        $room_name            = lcfirst($row['deviceRoom']);
        $code                 = $row['deviceCode'];
        $type                 = strtolower($row['deviceType']);
        $device_id            = $row['deviceID'];
        $deviceGroupMemberOn  = $row['deviceGroupMemberOn'];
        $deviceGroupMemberOff = $row['deviceGroupMemberOff'];
        
        $lang_on  = $GLOBALS["lang_on"];
        $lang_off = $GLOBALS["lang_off"];
        
        $deviceCodeOn  = $GLOBALS["RF_group_code_on_part"] . $row['deviceCode'];
        $deviceCodeOff = $GLOBALS["RF_group_code_off_part"] . $row['deviceCode'];
        
        $numberOfDevices++;
        
        echo "<div class='selectionContainer'>";
        
        //echo "<fieldset name=\"fieldset$numberOfDevices\"";
        echo "<select name=\"action$numberOfDevices\">";
        echo "<option value=\"leave\">Leave</option>";
        
        echo "<option value=\"on\"";
        if (strpos($deviceGroupMemberOn, $groupUniqueCode) !== false) {
            echo " selected";
        }
        echo ">Turn on</option>";
        echo "<option value=\"off\"";
        if (strpos($deviceGroupMemberOff, $groupUniqueCode) !== false) {
            echo " selected";
        }
        echo ">Turn off</option>";
        echo "</select> ";
        echo "<input type=\"text\" value=\"$device_id\" name=\"deviceNumber$numberOfDevices\" HIDDEN>";
        
        $title = preg_replace('/\s+/', '', $title);
        
        echo $title . ", " . ucfirst($room_name);
        
        //echo "</fieldset>";
        
        
        echo "</div>";
    }
    $db->close();
?>
			<input type="text" name="numberOfDevices" value="<?= $numberOfDevices ?>" HIDDEN>
			<button type="submit" value="Spara" class="submitButtons"><img src="html_images/icons/ic_save_white_18dp_1x.png"> Spara</button>
		</form>
<?
}
if (isset($_GET['saveGroup'])) {
    
    $groupUniqueCode = $_GET['saveGroup'];
    
    $numberOfDevices = $_POST['numberOfDevices'];
    
    
    
    $i = 1;
    while ($i <= $numberOfDevices) {
        
        
        $deviceId = $_POST['deviceNumber' . $i];
        $db       = new SQLite3('devices.db');
        $action   = $_POST['action' . $i];
        
        $deviceMemberAction = "deviceGroupMember" . $action;
			$query = $db->exec("UPDATE devices SET deviceGroupMemberOn=REPLACE(deviceGroupMemberOn,'$groupUniqueCode',''), deviceGroupMemberOff=REPLACE(deviceGroupMemberOff,'$groupUniqueCode','') WHERE deviceID = '$deviceId'");
        if ($action !== "leave") {
            $query = $db->exec("UPDATE devices SET $deviceMemberAction = '$groupUniqueCode' WHERE deviceID = '$deviceId'");
        }
        
        //echo $groupUniqueCode . "->" . $deviceId . "</br>";
        
        
        $db->close();
        $i++;
    }
    
    
    
    echo "<script>window.location = \"index.php\"</script>";
    
    
    
}




########################################################################################################################################################################
###################################################################        Generate code        ########################################################################
########################################################################################################################################################################

function generateTriBits()
{
    
    $triBit1 = "101";
    $triBit2 = "011";
    
    $array  = array(
        $triBit1,
        $triBit2
    );
    $triBit = $array[rand(0, count($array) - 1)];
    
    return $triBit;
}
function generateRFCode()
{
    $total = null;
    $total = $total . generateTriBits();
    $total = $total . generateTriBits();
    $total = $total . generateTriBits();
    $total = $total . generateTriBits();
    
    $db = new SQLite3('devices.db');
    
    $results = $db->query("SELECT * FROM devices WHERE deviceCode='$total'");
    if ($row = $results->fetchArray()) {
        return false;
    } else {
        return $total;
    }
    $db->close();
}




########################################################################################################################################################################
###################################################################          Send code          ########################################################################
########################################################################################################################################################################


function sendCode($type, $repeat, $code)
{
    
    // Set device controle options (See man page for stty)
    exec("/bin/stty -F /dev/ttyS0 19200 sane raw cs8 hupcl cread clocal -echo -onlcr ");
    
    // Open serial port
    $fp = fopen("/dev/ttyS0", "c+");
    if (!$fp)
        die("Can't open device");
    
    // Set blocking mode for writing
    stream_set_blocking($fp, 1);
    fwrite($fp, "R," . $repeat . "," . $code . "E");
	// felsök echo "R," . $repeat . "," . $code;
    
    
}

###################################################################          RFCodeOnly          ########################################################################
if (isset($_GET['RFCodeOnly'])) {
    
    $defaultRepeat = $GLOBALS["defaultRepeat"];
    $RFCode        = $_GET['RFCodeOnly'];
    sendCode("R", $defaultRepeat, $RFCode);
}

###################################################################          Group Code          ########################################################################

if (isset($_GET['groupId'])) {
    
    $groupId     = $_GET['groupId'];
    $groupAction = $_GET['action'];
    
    
    $deviceCodeOn  = $GLOBALS["RF_group_code_on_part"];
    $deviceCodeOff = $GLOBALS["RF_group_code_off_part"];
    global $groupUsleep;
    
    $db = new SQLite3('devices.db');
    
    if ($groupAction == "on") {
        $resultsGroup = $db->query("SELECT * FROM devices WHERE deviceGroupMemberOn LIKE '%$groupId%' OR deviceGroupMemberOff LIKE '%$groupId%'");
        while ($rowGroup = $resultsGroup->fetchArray()) {
            $deviceCode        = $rowGroup['deviceCode'];
            $rowGroupMemberOff = $rowGroup['deviceGroupMemberOff'];
            $rowGroupMemberOn  = $rowGroup['deviceGroupMemberOn'];
            
            $pos = strpos($rowGroupMemberOff, $groupId);
            if ($pos !== false) {
                $deviceCode = $RF_group_code_off_part . $deviceCode . "E";
                sendCode("R", "5", $deviceCode);
                usleep($groupUsleep);
            }
            $pos = strpos($rowGroupMemberOn, $groupId);
            if ($pos !== false) {
                $deviceCode = $RF_group_code_on_part . $deviceCode . "E";
                sendCode("R", "5", $deviceCode);
                usleep($groupUsleep);
            }
        }
    }
    
    
    if ($groupAction == "off") {
        $resultsGroup = $db->query("SELECT * FROM devices WHERE deviceGroupMemberOn LIKE '%$groupId%' OR deviceGroupMemberOff LIKE '%$groupId%'");
        while ($rowGroup = $resultsGroup->fetchArray()) {
            $deviceCode        = $rowGroup['deviceCode'];
            $rowGroupMemberOff = $rowGroup['deviceGroupMemberOff'];
            $rowGroupMemberOn  = $rowGroup['deviceGroupMemberOn'];
            
            $pos = strpos($rowGroupMemberOff, $groupId);
            if ($pos !== false) {
                $deviceCode = $RF_group_code_off_part . $deviceCode . "E";
                sendCode("R", "5", $deviceCode);
                usleep($groupUsleep);
            }
            $pos = strpos($rowGroupMemberOn, $groupId);
            if ($pos !== false) {
                $deviceCode = $RF_group_code_off_part . $deviceCode . "E";
                sendCode("R", "5", $deviceCode);
                usleep($groupUsleep);
            }
        }
    }
}

?>