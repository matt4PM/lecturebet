<?php
	require 'globals.php';

	$sql = "UPDATE lectureActive SET state='active' WHERE lectureName='$_GET[name]'";
	$GLOBALS["conn"]->query($sql);
?>