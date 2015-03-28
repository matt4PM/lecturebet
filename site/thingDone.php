<?php
	require 'globals.php';

	$infoSQL = "SELECT * FROM things WHERE thingID='$_GET[thingID]'";
	$infoResult = $GLOBALS['conn']->query($infoSQL);
	$info = $infoResult ->fetch_assoc();

	$sql = "SELECT * FROM bets WHERE thingID='$_GET[thingID]' AND counted='0'";
	$result = $GLOBALS['conn']->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			placeTransaction($row["userID"],$info["odds"] * transactionAmount($row["transactionID"]),"You won a bet","C");
			$GLOBALS['conn']->query("UPDATE ");
			echo "one payout";
		}
	}

	$GLOBALS['conn']->query("UPDATE bets SET counted='1' WHERE thingID='$_GET[thingID]' AND counted='0'");
?>