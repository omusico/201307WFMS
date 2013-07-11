<?php
//call.php
//$_POST["from_number"]
//$_POST["to_number"]
//write into cookie: start_time end_time when hang up
    if(empty($_POST["from_number"]) || empty($_POST["to_number"]))
    {
        printf("number is empty!\n");
        exit();
    }
    $mysqli = mysqli_connect("localhost", "root", "123456", "db_course_design");
    if(mysqli_connect_errno())
    {
        printf("Connect error!\n%s\n", mysqli_connect_error($mysqli));
        exit();
    }
    else
    {
        //get from_number status, balance and to_number status
        $sql = "SELECT balance, status FROM phone_number WHERE phone_number = '".$_POST["from_number"]."';";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            echo "</br>".$sql."</br>";
            printf("111 Query error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        else
        {
            $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $from_number_status = $res_array['status'];
            $from_number_balance = $res_array['balance'];
            mysqli_free_result($res);
        }
        $sql = "SELECT status FROM phone_number WHERE phone_number = '".$_POST["to_number"]."';";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            echo "</br>".$sql."</br>";
            printf("111 Query error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        else
        {
            $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $to_number_status = $res_array['status'];
            mysqli_free_result($res);
        }
        //check from_number status, balance and to_number status
        if(($from_number_status != "normal") || ($to_number_status != "normal") || ($from_number_balance < 0))
        {
            printf("Phone number is not available or you don't have enough money! \n");
            exit();
        }
        $start_time = date("Y-m-d H:i:s");
        setcookie('start_time', $start_time);
        setcookie('from_number', $_POST["from_number"]);
        setcookie('to_number', $_POST["to_number"]);
        setcookie('balance', $from_number_balance);
        mysqli_close($mysqli);
    }
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
    <script type="text/javascript">
        var sec = 0
        var minute = 0
        var hour = 0
        var count
        var temp
        function timedCount(){
            temp = hour.toString().concat(":").concat(minute.toString()).concat(":").concat(sec.toString())
            document.getElementById('txt').value = temp
            
            sec ++
            if (sec == 60){
                minute ++
                sec = 0
                if (minute == 60){
                    hour ++
                    minute = 0
                }
            }
            count = setTimeout("timedCount()",1000)
        }
    </script>
        
  </head>
  
  <body onLoad="timedCount()">
    <div class="container">
      <div class="demo-headline">
        <h1 class="demo-logo" style="color:#e74c3c">
          <!--div class="logo"></div-->
          Management
          <small>Wireless Financial Management System</small>
        </h1>
      </div> <!-- /demo-headline -->

  		<div class="span2 offset5">
        <h5>Start!</h5>
            <input type="text" id="txt">
  			<a href="call_end.php" class="btn btn-large btn-block btn-primary">Hang up</a>
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
