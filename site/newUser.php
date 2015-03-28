<?php
	$servername = "localhost";
	$username = "root";
	$password = "UI0SKKC0bp";
	$dbname = "bettingSite";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	if(isset($_POST["name"])){
		if ($GLOBALS['conn']->query("INSERT INTO users (name) VALUES ('$_POST[name]')") === TRUE){

			$newUserID = $GLOBALS['conn']->insert_id;

			setcookie("userID", $newUserID, time($newUserID) + (86400 * 30), "/");

			$conn->query("INSERT INTO transaction (userID,transactionTitle,type,amount) VALUES ($newUserID,'Welcome','C',500)");

			header('Location: /');
		}
	}
?>
<html>
	<head>
	</head>
	<body>
		<div style="width: 300px;">
		<h1>Whats your name</h1>
		<p>What name do you want to appear on our site</p>
		<form action="" method="POST">
			Name: <input type="text" name="name"/><br/>
			By pressing continue you are aggreeing to any logical terms and conditions as well as the fact that THIS IS A GAME AND IM NOT GIVING YOU ANY MONEY IF YOU WIN THINGS HERE!!!!<br/>
			<input type="submit" value="Aggree and Continue >>">
		</form>
		</div>
	</body>
</html>