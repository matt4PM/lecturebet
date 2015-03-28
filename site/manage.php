<?php
  require "globals.php";
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
      <h1>ManageBetting</h1>
      <div class="row">
        <a href="manage.php?name=foundations"><div class="col-md-3 well">Foundations</div></a>
        <a href="manage.php?name=webdesign"><div class="col-md-3 well">Web Design</div></a>
        <a href="manage.php?name=programing"><div class="col-md-3 well">Programing</div></a>
        <a href="manage.php?name=comunications"><div class="col-md-3 well">Comunications</div></a>
      </div>
      <div class="row">
        <div class="col-md-6 well">
          <h2>Things he'll do</h2>
          <div style="width: 100%; height: 400px; overflow: scroll;">
            <!--div class="well" style="width:100%; height:130px;">
              <div style="width: 70%; display:inline-block; float:left;">
                <h3>Something he did</h3>
                <p>Some sort of sub title</p>
              </div>
              <div style="width: 30%; display:inline-block; float:left;">
                <button type="button" class="btn btn-primary" style="margin-top:30px; float: right;">Done</button>
              </div>
            </div-->
            <?php
              $sql = "SELECT * FROM things WHERE lectureName='$_GET[name]'";
              $result = $GLOBALS['conn']->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo '<div class="well" style="width:100%; height:130px;">
              <div style="width: 70%; display:inline-block; float:left;">
                <h3>' . $row["thingTitle"] . '</h3>
                <p>' . $row["subtitle"] . '</p>
              </div>
              <div style="width: 30%; display:inline-block; float:left;">
                <a href="thingDone.php?thingID=' . $row["thingID"] . '"><button type="button" class="btn btn-primary" style="margin-top:30px; float: right;">Done</button></a>
              </div>
            </div>';
                }
              }
            ?>
          </div>
        </div>
        <div class="col-md-6 well">
        <a href="endClass.php?name=<?php echo $_GET["name"]; ?>">End lecture</a><br/>
        <a href="disableLecture.php?name=<?php echo $_GET["name"]; ?>">Disable Lecture</a><br/>
        <a href="enableLecture.php?name=<?php echo $_GET["name"]; ?>">Enable Lecture</a>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>