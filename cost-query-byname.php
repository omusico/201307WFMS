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
	$user=$_COOKIE['user'];
	$sql1 = "select *
	from charge_record,client_number
	where client_number.client_id = $user and charge_record.phone_number = client_number.phone_number and datetime >= '$from' and datetime <= '$to';";
	$res1=mysqli_query($con,$sql1)or die("error1:".$con->error);
	if($res1){
		echo "<table border=\"1\"> \n";
		echo "<tr>\n";
		echo "<td>Datetime</td>\n";
		echo "<td>Charge_value</td>\n";
		echo "<td>Total_value</td>\n";
		echo "</tr>\n";
		while($array = mysqli_fetch_array($res1,MYSQL_ASSOC)){
			echo "<tr> \n";
			$datetime = $array['datetime'];
			$charge_value = $array['charge_value'];
			$new_balance = $array['new_balance'];
			echo "<td>$datetime</td>";
			echo "<td>$charge_value</td>";
			echo "<td>$new_balance</td>";
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

