<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Tel Cost</title>
</head>
<?php
	$con = mysqli_connect("localhost","root","123456","db_course_design");
	if ($con == FALSE)
	{
	  printf("Could not connect: %s", mysqli_connect_error());
	}
	$from=$_POST['from'];
	$to=$_POST['to'];
	if (isset ($_POST['user']))
		$user=$_POST['user'];
	else
		$user=$_COOKIE['client_name'];
	$sql1 = "select *
	from text_message_record,client_number,client
	where client.client_id = client_number.client_id and client.client_name = '$user' and (sending_number = client_number.phone_number or receiving_number = client_number.phone_number) and sending_time >= '$from' and sending_time <= '$to';";
	$res1=mysqli_query($con,$sql1)or die("error1:".$con->error);
	if($res1){
		echo "<table border=\"1\"> \n";
		echo "<tr>\n";
		echo "<td>Send</td>\n";
		echo "<td>Receive</td>\n";
		echo "<td>Time</td>\n";
		echo "<td>Cost</td>\n";
		echo "</tr>\n";
		while($array = mysqli_fetch_array($res1,MYSQL_ASSOC)){
			echo "<tr> \n";
			$sending_num = $array['sending_number'];
			$receiving_num = $array['receiving_number'];
			$sending_time = $array['sending_time'];
			$cost = $array['cost'];
			echo "<td>$sending_num</td>";
			echo "<td>$receiving_num</td>";
			echo "<td>$sending_time</td>";
			echo "<td>$cost</td>";
			echo "</tr> \n";
		}
		echo "</table> \n";
}
mysqli_close($con);
?>
</br>
<a href="user-query-byname.php">返回</a>
<body>
</body>
</html>

