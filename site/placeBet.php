<?php
	require 'globals.php';

	if(isset($_POST["thingID"])){
		if(pointsNumber() >= $_POST["points"]){

			$transactionID = placeTransaction($_COOKIE["userID"],$_POST["points"],"You placed a bet","D");

			$sql = "INSERT INTO bets (userID,thingID,transactionID,counted) VALUES ($_COOKIE[userID],$_POST[thingID],$transactionID,0)";

			if($GLOBALS["conn"]->query($sql) === TRUE){
				echo "Your bet was placed";
			}

		}else{
			echo "Not enought points";
			die();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Place yall bets!!</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
    	<a href="/">Back >></a>
      <h1>Place Bet</h1>

      <form action="" method="POST">
      	<input type="hidden" name="thingID" value="<?php echo $_GET["thingID"]; ?>"/>
      	Number of points betting:<br/>
      	<input type="number" name="points"/><br/>
      	<input type="submit" value="Place Bet"/>
      </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>