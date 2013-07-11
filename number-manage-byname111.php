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
                      <a href="user-query.php">
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

      <h3 align="center">Number Manage</h3>
      <div class="offset2">
        <form action="number-manage-byname.php" method="post">
           <div class="span3">
            <select name="phone_number">
                <?php include'show_client_numbers.php';
                    show_client_numbers_start();
                    show_client_numbers();
                    close_db();
                ?>
            </select>
           </div>
            <div class="span3">
              <select name="herolist" class="select-block span3">
                <option value="1" selected="selected">Stop</option>
                <option value="2">Recover</option>
                <option value="3">Retrite</option>
              </select>
            </div>
            
            <div class="span3"><input type="submit" value="Confirm" class="btn btn-large btn-block btn-primary"></div> 

        </form>
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
