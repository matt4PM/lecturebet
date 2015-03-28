<?php
	require 'globals.php';

	$sql = "UPDATE lectureActive SET state='disabled' WHERE lectureName='$_GET[name]'";
	$GLOBALS["conn"]->query($sql);
?>