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


	if(!isset($_COOKIE["userID"])){
		header('Location: newUser.php');
		die();
	}


	function pointsNumber(){
		$sql = "SELECT * FROM transaction WHERE userID='$_COOKIE[userID]'";
		$result = $GLOBALS['conn']->query($sql);

		$accountValue = 0;

		if ($result->num_rows > 0) {
    		// output data of each row
    		while($row = $result->fetch_assoc()) {
        		if($row["type"] == "C"){
        			$accountValue += $row["amount"];
        		}else{
					$accountValue -= $row["amount"];
        		}
    		}
		}

		return $accountValue;
	}

	function placeTransaction($userID,$amount,$transactionTitle,$type){
		$GLOBALS["conn"]->query("INSERT INTO transaction (userID,transactionTitle,type,amount) VALUES ($userID,'$transactionTitle','$type',$amount)");
		return $GLOBALS["conn"]->insert_id;
	}

	function transactionAmount($transactionID){
		$transactionResult = $GLOBALS["conn"]->query("SELECT * FROM transaction WHERE transactionID='$transactionID'");
		$retuned = $transactionResult->fetch_assoc();
		return $retuned["amount"];
	}

	function betHistory(){
            $betsSQL = "SELECT * FROM bets WHERE userID='$_COOKIE[userID]'";

            $results = $GLOBALS["conn"]->query($betsSQL);

            while($row = $results->fetch_assoc()) {
              $thingInfoSQL = "SELECT * FROM things WHERE thingID='$row[thingID]'";

              $thingInfoResult = $GLOBALS["conn"]->query($thingInfoSQL);

              $thingInfo = $thingInfoResult->fetch_assoc();

              $status = "";

              switch ($row["counted"]) {
                case 1:
                  $status = '<span class="label label-success" style="float: right; margin-bottom: 10px;">Won !!</span>';
                  break;
                case 2:
                  $status = '<span class="label label-warning" style="float: right; margin-bottom: 10px;">Loss</span>';
                  break;
                default:
                  $status = '<span class="label label-primary" style="float: right; margin-bottom: 10px;">Pending</span>';
                  break;
              }

              echo '<div class="well" style="width:100%;">
              <div>
                <h3>' . $thingInfo["thingTitle"] . '</h3>
                <p>' . transactionAmount($row["transactionID"]) . ' - ' . $thingInfo["lectureName"] . '</p>
                ' . $status . '
              </div>
            </div>';
            }
	}
?>