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

  		<div class="span3 offset4">
		<?php
		$con = mysqli_connect("localhost","root","123456","db_course_design");
		if ($con == FALSE)
		  {
		  printf("Could not connect: %s", mysqli_connect_error());
		  }
		$charge=$_POST['charge'];
		$number=$_POST['number'];
        if($charge < 0)
        {
            printf("Charge number should large than zero!\n");
            exit();
        }
		$date=date("Y-m-d H:i:s");
		$sql0 = "select * from phone_number where phone_number = $number;";
		$res0=mysqli_query($con,$sql0)or die("error0:".$con->error);
		
		$sql1 = "update phone_number 
		set balance = balance + $charge
		where phone_number = $number;";
		$res1=mysqli_query($con,$sql1)or die("error1:".$con->error);
		$sql2 = "select balance from phone_number where phone_number = $number;";
		$res2=mysqli_query($con,$sql2)or die("error2:".$con->error);
		$row = mysqli_fetch_object($res2);
		if(empty($row)){
		   echo "<h5>No Such Number</h5> \n";
		}
		else{
		$new_balance = $row->balance;
		$sql3 = "insert into charge_record values('$date', $number, $charge, $new_balance);";
		$res3=mysqli_query($con,$sql3)or die("error3:".$con->error);
		if($res1 == true && $res3 == true)
			echo "<h5>Succeed  Recharge</h5>";
			}
        if($new_balance > 0)
        {
            $sql = "update phone_number set status = 'normal' where phone_number = '".$number."';";
            $res = mysqli_query($con, $sql);
       
        }
		mysqli_close($con);
?>
        
  			<a href="admin-money.php" class="btn btn-large btn-block btn-primary">Back</a>
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
