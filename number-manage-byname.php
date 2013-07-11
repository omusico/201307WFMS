<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<?php 
function halt($con,$number)
{
  $sql1 = "select * from phone_number where phone_number = $number;";
  $res1=mysqli_query($con,$sql1)or die("error1:".$con->error);
  $row1 = mysqli_fetch_object($res1);
  $state1 = $row1->status;
  if ($state1 == "normal"){
  	$sql4 = "update phone_number 
	set status = \"halt\"
	where phone_number = $number;";
	$res4=mysqli_query($con,$sql4)or die("error4:".$con->error);
	echo "停机成功";
  }
  else{
  	if ($state1 == "halt")
		echo "当前已经停机 </br>";
	else if ($state1 == "arrearage")
		echo "当前已经欠费 </br>";
	else if ($state1 == "unused")
		echo "该号码为空号 </br>";
  	echo "停机失败";
  }
}

function normal($con,$number)
{
  $sql2 = "select * from phone_number where phone_number = $number;";
  $res2=mysqli_query($con,$sql2)or die("error2:".$con->error);
  $row2 = mysqli_fetch_object($res2);
  $state2 = $row2->status;
  if ($state2 == "halt"){
  	$sql5 = "update phone_number 
	set status = \"normal\"
	where phone_number = $number;";
	$res5=mysqli_query($con,$sql5)or die("error5:".$con->error);
	echo "复机成功";
  }
  else{
  	if ($state2 == "normal")
		echo "当前没有停机 </br>";
	else if ($state2 == "arrearage")
		echo "当前已经欠费 </br>";
	else if ($state2 == "unused")
		echo "该号码为空号 </br>";
  	echo "复机失败";
  }
}

function unuse($con,$number)
{
  $sql3 = "select * from phone_number where phone_number = $number;";
  $res3=mysqli_query($con,$sql3)or die("error3:".$con->error);
  $row3 = mysqli_fetch_object($res3);
  $state3 = $row3->status;
  if ($state3 == "normal"){
  	$sql4 = "update phone_number 
	set status = \"unused\" , balance = 0 , combo_id = 10001 , local_call_time_per_month =0 , 
	ld_call_time_per_month = 0 ,
	international_call_time_per_month = 0 , 
	message_count_per_month = 0 ,
	flow_count_per_month = 0,
    local_call_used_time = 0,
    ld_call_used_time = 0,
    it_call_used_time = 0,
    message_used_count = 0,
    flow_used_count = 0
	where phone_number = $number;";
	$sql6 = "delete from client_number where phone_number = $number;";
	$res4=mysqli_query($con,$sql4)or die("error4:".$con->error);
	$res6=mysqli_query($con,$sql6)or die("error6:".$con->error);
	echo "撤机成功";
  }
  else{
  	if ($state3 == "halt")
		echo "当前已经停机 </br>";
	else if ($state3 == "arrearage")
		echo "当前已经欠费 </br>";
	else if ($state3 == "unused")
		echo "该号码为空号 </br>";
  	echo "撤机失败";
  }
}

$con = mysqli_connect("localhost","root","123456","db_course_design");
if ($con == FALSE)
{
  printf("Could not connect: %s", mysqli_connect_error());
}
$number = $_POST['phone_number'];
$sql0 = "select * from phone_number where phone_number = $number;";
$res0=mysqli_query($con,$sql0)or die("error0:".$con->error);
$row = mysqli_fetch_object($res0);
if(empty($row)){
   printf("no such number");
}
else{
	if ($_POST["herolist"] == 1)
		halt($con,$number);
	else if ($_POST["herolist"] == 2)
		normal($con,$number);
	else
		unuse($con,$number);
}
?>
</br>
<a href="number-manage-byname111.php">返回</a>
</body>
</html>
