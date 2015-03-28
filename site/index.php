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
      <h1>What will he do next??</h1>
      <p style=""><?php echo pointsNumber(); ?> points</p>
      <div class="row">
        <a href="lecture.php?name=foundations"><div class="col-md-3 well">Foundations</div></a>
        <a href="lecture.php?name=webdesign"><div class="col-md-3 well">Web Design</div></a>
        <a href="lecture.php?name=programing"><div class="col-md-3 well">Programing</div></a>
        <a href="lecture.php?name=comunications"><div class="col-md-3 well">Comunications</div></a>
      </div>
      <div class="row">
        <div class="col-md-6 well">
          <h2>Your Bets</h2>
          <div style="width: 100%; height: 400px; overflow: scroll;">
          <?php
            betHistory();
          ?>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>