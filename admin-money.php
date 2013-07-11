<?php 
    session_start();
    if(($_SESSION['guest'] == 2) || (!isset($_SESSION['guest'])))
        header("Location: login_sign.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Wireless Financial Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div class="container">
      <div class="demo-headline">
        <h1 class="demo-logo" style="color:#e74c3c">
          <!--div class="logo"></div-->
          Management
          <small>Wireless Financial Management System</small>
        </h1>
      </div> <!-- /demo-headline -->
      
      <div class="row demo-row">
        <div class="span12" align="center">
          <div class="navbar navbar-inverse">
            <div class="navbar-inner">
              <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse-01"></button>
                <div class="nav-collapse collapse" id="nav-collapse-01">
                  <ul class="nav">
                    <li>
                      <a href="admin-query.php">
                        Menu
                        <span class="navbar-unread">1</span>
                      </a>
                    </li>
                    <li class="active">
                      <a href="#fakelink">
                        Business
                        <span class="navbar-unread">1</span>
                      </a>
                      <ul>
                        <li>
                          <a href="#fakelink">Query</a>
                          <ul>
                            <li><a href="#fakelink">Dial Record</a></li>
                            <li><a href="#fakelink">Message Record</a></li>
                            <li><a href="#fakelink">Tel Cose</a></li>
                          </ul> <!-- /Sub menu -->
                        </li>
                        <li><a href="#fakelink">Change Business</a></li>
                        <li class="active"><a href="#fakelink">Payment</a></li>
                      </ul> <!-- /Sub menu -->
                    </li>
                    <li>
                      <a href="#fakelink">
                        About Us
                      </a>
                    </li>
                  </ul>
                </div><!--/.nav -->
              </div>
            </div>
          </div>
        </div>
      </div> <!-- /row -->

		<div class="row" >
		    <form action="recharge.php" method="post">	
			<h3 align="center" class="span3 offset3">Phone Num</h3>
			<input type="text" name="number" value="" placeholder="Phone Num" class="span3" />
			
		</div>

		<div class="row">

			<h3 align="center" class="span3 offset3">Money</h3>
			<input type="text" name="charge" value="" placeholder="Money" class="span3" />

		</div>

		<div class="span2 offset5">
			<input type="submit" value="Recharge"  class="btn btn-large btn-block btn-primary" />
            <form>
		</div>
      

    </div> <!-- /container -->
    
    <!-- Load JS here for greater good =============================-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery.stacktable.js"></script>
    <script src="http://vjs.zencdn.net/c/video.js"></script>
    <script src="js/application.js"></script>
  </body>
</html>
