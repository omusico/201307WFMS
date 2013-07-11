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
                            <li><a href="user-query.php">Dial Record</a></li>
                            <li><a href="user-query.php">Message Record</a></li>
                            <li><a href="user-query.php">Tel Cost</a></li>
                          </ul> <!-- /Sub menu -->
                        </li>
                        <li><a href="user-query.php">Change Business</a></li>
                        <li><a href="number-manage-byname111.php">Recover/Retirte Business</a></li>
                      </ul> <!-- /Sub menu -->
                    </li>
                    <li>
                      <a href="about.html">
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

      <!--div class="row">
        <h5 align="center">Your Account Remain:
          <?php
            $con = mysqli_connect("localhost","root","123456","db_course_design");
            if ($con == FALSE)
            {
              printf("Could not connect: %s", mysqli_connect_error());
            }
            $number=$_COOKIE['phone_number'];
            $sql1 = "select * from phone_number where phone_number = $number";
            $res1=mysqli_query($con,$sql1)or die("error1:".$con->error);
            if($res1){
              $row = mysqli_fetch_object($res1);
              echo $row->balance;
            }
            mysqli_close($con);
          ?>
        </h5> 
      </div--><!--查询手机账户余下的钱-->






      <form action="dial-query-byname.php" method="post"><!--查看当前用户的区间通话记录-->
        <div style="float:center">
          <h3>查看当前用户的区间通话记录</h3>
          <div class="row">
            <div class="span3">
              <input type="text" name="from"  value="" placeholder="From:YYYY-MM-DD" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="to" value="" placeholder="To:YYYY-MM-DD" class="span3" />
            </div>
            <div class="span3">
              <input type="submit" value="Query"  class="btn btn-large btn-block btn-primary" />
            </div>
          </div>
        </div>
      </form>
      
      <form action="message-query-byname.php" method="post"><!--查看当前用户的区间短信记录-->
        <div style="float:center">
          <h3>查看当前用户的区间短信记录</h3>
          <div class="row">     	
            <div class="span3">
              <input type="text" name="from"  value="" placeholder="From:YYYY-MM-DD" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="to" value="" placeholder="To:YYYY-MM-DD" class="span3" />
            </div>
            <div class="span3">
              <input type="submit" value="Query" class="btn btn-large btn-block btn-primary" />    
            </div>
          </div>
        </div>
      </form>
      
      <form action="cost-query-byname.php" method="post"><!--查看当前用户的区间充值记录-->
        <div style="float:center">
          <h3>查看当前用户的区间充值记录</h3>
          <div class="row">
            <div class="span3">
              <input type="text" name="from" value="" placeholder="From:YYYY-MM-DD" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="to" value="" placeholder="To:YYYY-MM-DD" class="span3" />
            </div>
            <div class="span3">
              <input type="submit" value="Query" class="btn btn-large btn-block btn-primary" />
            </div>
          </div>
        </div>
      </form>

      <form action="dial-query.php" method="post"><!--查看当前用户下属号码区间通话记录-->
        <div style="float:center">
          <h3>查看下属号码的区间通话记录</h3>
          <div class="row">
            <div class="span3">
              <select class="select-block span3" name="number"><!--这里显示用户的拥有的手机号码-->
                <?php include 'show_client_numbers.php'; 
                    $result = "";
                    show_client_numbers_start();
                    show_client_numbers();
                ?>
              </select>
            </div>
            <div class="span3">
              <input type="text" name="from"  value="" placeholder="From:YYYY-MM-DD" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="to" value="" placeholder="To:YYYY-MM-DD" class="span3" />
            </div>
            <div class="span3">
              <input type="submit" value="Query"  class="btn btn-large btn-block btn-primary" />
            </div>
          </div>
        </div>
      </form>
      
      <form action="message-query.php" method="post"><!--查看当前用户下属号码区间短信记录-->
        <div style="float:center">
          <h3>查看下属号码的区间短信记录</h3>
          <div class="row">
            <div class="span3">
              <select class="select-block span3" name="number"><!--这里显示用户的拥有的手机号码-->
                <?php  
                    show_client_numbers();
                ?>
              </select>
            </div>
            <div class="span3">
              <input type="text" name="from"  value="" placeholder="From:YYYY-MM-DD" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="to" value="" placeholder="To:YYYY-MM-DD" class="span3" />
            </div>
            <div class="span3">
              <input type="submit" value="Query" class="btn btn-large btn-block btn-primary" />    
            </div>
          </div>
        </div>
      </form>
      
      <form action="cost-query.php" method="post"><!--查看当前用户下属号码区间充值记录-->
        <div style="float:center">
          <h3>查看下属号码的区间充值记录</h3>
          <div class="row">
            <div class="span3">
              <select class="select-block span3" name="number"><!--这里显示用户的拥有的手机号码-->
                <?php 
                    show_client_numbers();
                ?>
              </select>
            </div>
            <div class="span3">
              <input type="text" name="from" value="" placeholder="From:YYYY-MM-DD" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="to" value="" placeholder="To:YYYY-MM-DD" class="span3" />
            </div>
            <div class="span3">
              <input type="submit" value="Query" class="btn btn-large btn-block btn-primary" />
            </div>
          </div>
        </div>
      </form>



      <form action="report_form_by_week.php" method="post"><!--查看当前用户下属号码周报表-->
        <div style="float:center">
          <h3>查看下属号码的周报表</h3>
          <div class="row">
            <div class="span3">
              <select class="select-block span3" name="phone_number"><!--这里显示用户的拥有的手机号码和全选-->
                <?php show_client_numbers(); ?>
              </select>
            </div>
            <div class="span3">
              <input type="text" name="start_time" value="" placeholder="From:YYYY-MM" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="end_time" value="" placeholder="To:YYYY-MM" class="span3" />
            </div>
            <div class="span3">
              <input type="submit" value="Query" class="btn btn-large btn-block btn-primary" />
            </div>
          </div>
        </div>
      </form>

      <form action="report_form_by_month.php" method="post"><!--查看当前用户下属号码月报表-->
        <div style="float:center">
          <h3>查看下属号码的月报表</h3>
          <div class="row">
            <div class="span3">
              <select class="select-block span3" name="phone_number"><!--这里显示用户的拥有的手机号码和全选-->
                <?php show_client_numbers(); ?>
              </select>
            </div>
            <div class="span3">
              <input type="text" name="start_time" value="" placeholder="From:YYYY-MM" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="end_time" value="" placeholder="To:YYYY-MM" class="span3" />
            </div>
            <div class="span3">
              <input type="submit" value="Query" class="btn btn-large btn-block btn-primary" />
            </div>
          </div>
        </div>
      </form>

      <form action="report_form_by_year.php" method="post"><!--查看当前用户下属号码年报表-->
        <div style="float:center">
          <h3>查看下属号码的年报表</h3>
          <div class="row">
            <div class="span3">
              <select class="select-block span3" name="phone_number"><!--这里显示用户的拥有的手机号码和全选-->
                <?php show_client_numbers(); ?>
              </select>
            </div>
            <div class="span3">
              <input type="text" name="start_time" value="" placeholder="From:YYYY" class="span3" />
            </div>
            <div class="span3">
              <input type="text" name="end_time" value="" placeholder="To:YYYY" class="span3" />
            </div>
            <div class="span3">
              <input type="submit" value="Query" class="btn btn-large btn-block btn-primary" />
            </div>
          </div>
        </div>
      </form>

      
      <form action="change_combo_user_byname.php" method="post"><!--更改当前用户的号码套餐-->
        <div style="float:center">
          <h3>更改当前用户的号码套餐</h3>
          <div class="row"> 
            <div class="span3">
              <select class="select-block span3" name="phone_number"><!--这里显示用户的拥有的手机号码-->
                <?php show_client_numbers(); 
                      close_db();?>
              </select>
            </div>
            <div class="span3">
            </div>
            <div class="span3">
              <select class="select-block span3" name="combo">
                  <?php include 'get_combos.php';
                    $mysqli = mysqli_connect("localhost", "root", "123456", "db_course_design");
                    if(mysqli_connect_errno())
                    {
                        printf("fqqergr Connect error!\n%s\n", mysqli_connect_error($mysqli));
                        exit();
                    }
                    get_combos(); 
                  ?>
              </select>
            </div>
            <div class="span3">
              <input class="btn btn-large btn-block btn-primary" type="submit" value="submit" />
            </div>
          </div>
        </div>
      </form>
    
      <form action="change_business_user_byname.php" method="post"><!--更改当前用户的号码业务-->
        <div style="float:center">
          <h3>更改当前用户的号码业务</h3>
          <div class="row">
            <div class="span3">
            </div>
            <div class="span2">
              <select class="span3" name="message_business">
                    <option value="no">No extra message business</option>
                    <?php include 'get_extra_message_business.php';
                      get_extra_message_business(); ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="span3">
            </div>
            <div class="span2">
              <select class="select-block span3" name="flow_business">
                <option value="no">No extra flow business</option>
                <?php include 'get_extra_flow_business.php';
                  get_extra_flow_business(); 
                ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="span3">
              <select class="select-block span3" name="phone_number"><!--这里显示用户的拥有的手机号码-->
                <?php show_client_numbers(); ?>
              </select>
            </div>
            <div class="span3">
              <input class="btn btn-large btn-block btn-primary" type="submit" value="submit" />
            </div>
          </div>
        </div>
      </form>

      <form action="phone-query-byname.php" method="post"><!--查看当前用户账户下的所有信息-->
        <div style="float:center">
          <h3>查看当前用户下所有信息</h3>
          <div class="span12">
            <input type="submit" value="Query"  class="btn btn-large btn-block btn-primary" />
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
