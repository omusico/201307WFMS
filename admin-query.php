<?php session_start();
    if($_SESSION['guest'] == 2)
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
                      <a href="#fakelink">
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
                            <li><a href="#fakelink">Tel Cost</a></li>
                          </ul> <!-- /Sub menu -->
                        </li>
                        <li><a href="#fakelink">Change Business</a></li>
                        <li><a href="admin-money.php">Payment</a></li>
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
	  
    <form action="user-info-query-byname.php" method="post"><!--查询单个用户的所有信息-->
        <div style="float:left">
          <div class="row">
            <h3>查询单个用户的所有信息</h3>
            <div class="span3">
              <input type="text" name="user" value="" placeholder="Enter Your User Name" class="span3" />
            </div>
            <div class="span3">
              <input class="btn btn-large btn-block btn-primary" type="submit" value="submit" />
            </div>
          </div>
        </div>
    </form>

    <form action="phone-query.php" method="post"><!--查询单个手机的所有信息-->
        <div style="float:right">
          <div class="row">
            <h3>查询单个手机的所有信息</h3>
            <div class="span3">
              <input type="text" name="phone_number" value="" placeholder="Phone Number" class="span3" />
            </div>
            <div class="span3">
              <input class="btn btn-large btn-block btn-primary" type="submit" value="submit" />
            </div>
          </div>
        </div>
    </form>
    
    <form action="user-info-query.php" method="post"><!--查询所有用户的所有信息-->
        <div style="float:left">
          <div class="row offset1">
            <h3>查询所有用户的所有信息</h3>
            <div class="span3">
              <input name="submit" type="submit" class="btn btn-large btn-block btn-primary" value="submit" />
            </div>
          </div>
        </div>
    </form>
    
    <form action="phone-query.php" method="post"><!--查询所有手机的所有信息-->
        <div style="float:left">
          <div class="row offset2">
            <h3>查询所有手机的所有信息</h3>
            <div class="span3">
              <input class="btn btn-large btn-block btn-primary" type="submit" value="submit" />
            </div>
          </div>
        </div>
    </form>

    <form action="report_form_by_week_admin.php" method="post"><!--查询用户的区间周报表-->
        <div style="float:left">
          <h3>查询周报表</h3>
          <div class="row">
            <div class="span3">
              <input type="text" name="phone_number" value="" placeholder="Phone number" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="start_time" value="" placeholder="From:YYYY-MM" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="end_time" value="" placeholder="To:YYYY-MM" class="span3" />
            </div>
            <div class="span3">
              <input class="btn btn-large btn-block btn-primary" type="submit" value="submit" />
            </div>
          </div>
        </div>
    </form>

    <form action="report_form_by_month_admin.php" method="post"><!--查询用户的区间月报表-->
        <div style="float:left">
          <h3>查询月报表</h3>
          <div class="row">
            <div class="span3">
              <input type="text" name="phone_number" value="" placeholder="Phone number" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="start_time" value="" placeholder="From:YYYY-MM" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="end_time" value="" placeholder="To:YYYY-MM" class="span3" />
            </div>
            <div class="span3">
              <input class="btn btn-large btn-block btn-primary" type="submit" value="submit" />
            </div>
          </div>
        </div>
    </form>

    <form action="report_form_by_year.php" method="post"><!--查询用户的区间年报表-->
        <div style="float:left">
          <h3>查询年报表</h3>
          <div class="row">
            <div class="span3">
              <input type="text" name="phone_number" value="" placeholder="Phone number" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="start_time" value="" placeholder="From:YYYY" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="end_time" value="" placeholder="To:YYYY" class="span3" />
            </div>
            <div class="span3">
              <input class="btn btn-large btn-block btn-primary" type="submit" value="submit" />
            </div>
          </div>
        </div>
    </form>

	  <form action="dial-query.php" method="post">
      <div style="float:left">
        <div class="row">
        	<h3>Dial Record By Phone Num</h3>
          <div class="span3">
            <input type="text" name="number" value="" placeholder="Phone Number" class="span3" />
          </div>
          <div class="span3">
            <input type="text" name="from" value="" placeholder="From:YYYY-MM-DD" class="span3" />
          </div>
          <div class="span3">
            <input type="text" name="to" value="" placeholder="To:YYYY-MM-DD" class="span3" />
          </div>
          <div class="span3">
              <input type="submit" value="Query" class="btn btn-block btn-primary">
          </div>
        </div>
      </div>
    </form>

    <form action="dial-query-byname.php" method="post">
      <div style="float:left">
        <div class="row">
          <h3>Dial Record By User Name</h3>
          <div class="span3">
            <input type="text" name="user" value="" placeholder="Enter your User Name" class="span3" />
          </div>
          <div class="span3">
            <input type="text" name="from" value="" placeholder="From:YYYY-MM-DD" class="span3" />
          </div>
          <div class="span3">
            <input type="text" name="to" value="" placeholder="To:YYYY-MM-DD" class="span3" />
          </div>
          <div class="span3">
              <input type="submit" value="Query" class="btn btn-block btn-primary">
          </div>
        </div>
      </div>
    </form>
	  
	  <form action="message-query.php" method="post">
      <div style="float:right">
        <div class="row">
        	<h3>Message Record By Phone Num</h3>
          <div class="span3">
            <input type="text" name="number" value="" placeholder="Phone Number" class="span3" />
          </div>
          <div class="span3">
            <input type="text" name="from" value="" placeholder="From:YYYY-MM-DD" class="span3" />
          </div>
          <div class="span3">
            <input type="text" name="to" value="" placeholder="To:YYYY-MM-DD" class="span3" />
          </div>
          <div class="span3">
            <input type="submit" value="Query" class="btn btn-large btn-block btn-primary">
          </div>
        </div>
      </div>
    </form>

    <form action="message-query-byname.php" method="post">
      <div style="float:right">
        <div class="row">
          <h3>Message Record By User Name</h3>
          <div class="span3">
            <input type="text" name="user" value="" placeholder="Enter Your User Name" class="span3" />
          </div>
          <div class="span3">
            <input type="text" name="from" value="" placeholder="From:YYYY-MM-DD" class="span3" />
          </div>
          <div class="span3">
            <input type="text" name="to" value="" placeholder="To:YYYY-MM-DD" class="span3" />
          </div>
          <div class="span3">
            <input type="submit" value="Query" class="btn btn-large btn-block btn-primary">
          </div>
        </div>
      </div>
    </form>
	  
	  <form action="cost-query.php" method="post">
      <div style="float:left">
        <div class="row">
        	<h3>Recharge Record By Phone Num</h3>
          <div class="span3">
            <input type="text" name="number" value="" placeholder="Phone Number" class="span3" />
          </div>
          <div class="span3">
            <input type="text" name="from" value="" placeholder="From:YYYY-MM-DD" class="span3" />
          </div>
          <div class="span3">
            <input type="text" name="to" value="" placeholder="To:YYYY-MM-DD" class="span3" />
          </div>
          <div class="span3">
            <input type="submit" value="Query" class="btn btn-large btn-block btn-primary">
          </div>
        </div>
      </div>
    </form>

    <form action="change_combo_admin.php" method="post">
      <div style="float:left">
        <div class="row">
          <h3>Change Combo</h3>
          <div class="span3">
            <input type="text" name="phone_number" value="" placeholder="Phone Number" class="span3" />
          </div>
          <div class="span3">
            <select class="select-block span3" name="combo">
              <?php include 'get_combos_admin.php';
                $mysqli;
                get_combos_admin(); 
              ?>
            </select>
          </div>
          <div class="span3">
            <input class="btn btn-large btn-block btn-primary" type="submit" value="submit" />
          </div>
        </div>
      </div>
    </form>
    
    <form action="change_business_admin.php" method="post">
        <div style="float:left">
          <div class="row">
            <h3>Change Buniess</h3>
            <div class="span3">
              <input type="text" name="phone_number" value="" placeholder="Phone Number" class="span3" />
            </div>
            <div class="span3">
              <select class="select-block span3" name="message_business">
                <option value="no">No extra message business</option>
                <?php include 'get_extra_message_business.php';
                  get_extra_message_business(); 
                ?>
              </select>
            </div>
            <div class="span3">
              <select class="select-block span3" name="flow_business">
                <option value="no">No extra flow business</option>
                 <?php include 'get_extra_flow_business.php';
                  get_extra_flow_business(); 
                ?>
              </select>
            </div>
            <div class="span3">
              <input class="btn btn-large btn-block btn-primary" type="submit" value="submit" />
            </div>
          </div>
        </div>
    </form>

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
