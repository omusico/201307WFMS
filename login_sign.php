<?php
    include 'get_unused_numbers.php';
    include 'get_combos.php';
    include 'get_extra_message_business.php';
    include 'get_extra_flow_business.php';
    $mysqli;
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
          Welcome
          <small>Wireless Financial Management System</small>
        </h1>
      </div> <!-- /demo-headline -->

      <div class="login">
        <div class="login-left">
          <div class="login-screen">
		        <div class="login-form">
              <form action="sign_php.php" method="post">
  		            <div class="control-group">
  		              <input type="text" name="new_name" class="login-field" value="" placeholder="Enter your name" id="login-name" />
  		              <label class="login-field-icon fui-user" for="login-name"></label>
  		            </div>
                
                  <div class="control-group">
                    <input type="password" name="new_password" class="login-field" value="" placeholder="Password" id="login-pass" />
                    <label class="login-field-icon fui-lock" for="login-pass"></label>

                    <select name="new_credentials_type" class="select-block span3">
                      <option value="id_card" selected="selected">ID card</option>
                      <option value="passport">Passport</option>
                    </select>

                    <input type="text" name="new_credentials_number" class="login-field" placeholder="Enter your ID" id="login-name" />

                    <select name="new_number" class="select-block span3">
                      <?php get_unused_numbers(); ?>
                    </select>

                  </div>
		
  		            <div class="control-group">
  		              <select name="new_combo" class="select-block span3">
                      <?php get_combos(); ?>
                    </select>

                    <select name="new_message_business" class="select-block span3">
                      <option value="no">No extra message business</option>
                      <?php get_extra_message_business(); ?>
                    </select>

                    <select name="new_flow_business" class="select-block span3">
                      <option value="no">No extra flow business</option>
                      <?php get_extra_flow_business();
                          mysqli_close($mysqli);
                      ?>
                    </select>
  		            </div>

		              <input type="submit" value="Register" class="btn btn-primary btn-large btn-block" href="#">
              </form>
		        </div>
		      </div>
        </div>


        <div class="login-right">
		        <div class="login-screen2">
		          <div class="login-form">
                <form action="login_php.php" method="post">
                <div class="control-group">
                  <select name="login_type" class="select-block span3">
                    <option value="name" selected="selected">Name</option>
                    <option value="phone_number">Phone number</option>
                  </select>
                </div>
                
		            <div class="control-group">  
		              <input type="text" name="phone_number" class="login-field" value="" placeholder="Enter your phone number" id="login-name" />
		              <label class="login-field-icon fui-user" for="login-name"></label>
		            </div>
		
		            <div class="control-group">
		              <input type="password" name="password" class="login-field" value="" placeholder="Password" id="login-pass" />
		              <label class="login-field-icon fui-lock" for="login-pass"></label>
		            </div>
		
		            <input type="submit" value="submit" class="btn btn-primary btn-large btn-block" href="#">Login</a>
                    
                <a class="login-link" href="#">Lost your password?</a>
		            </form>
              </div>
		          </div>
        </div>
	

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
