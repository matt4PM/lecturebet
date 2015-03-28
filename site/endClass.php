<?php
	require 'globals.php';

	$lectureBetsSQL = "SELECT * FROM things WHERE lectureName='$_GET[name]'";
	$lectureBets = $GLOBALS["conn"]->query($lectureBetsSQL);

	while($row = $lectureBets->fetch_assoc()) {
		$GLOBALS['conn']->query("UPDATE bets SET counted='2' WHERE thingID='$row[thingID]' AND counted='0'");
		echo "one bet closed";
	}
?>