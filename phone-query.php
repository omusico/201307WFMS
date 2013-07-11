<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<?php
$con = mysqli_connect("localhost","root","123456","db_course_design");
if ($con == FALSE)
{
  printf("Could not connect: %s", mysqli_connect_error());
}
if ($_COOKIE['client_type'] != "admin"){
    echo $_COOKIE['client_type'];
	$number=$_COOKIE['phone_number'];
	$sql1 = "select *
	from phone_number,combo
	where phone_number = $number and combo.combo_id = phone_number.combo_id;";
}
else if (isset($_POST['phone_number'])){
	$number=$_POST['phone_number'];
	$sql1 = "select *
	from phone_number,combo
	where phone_number = $number and combo.combo_id = phone_number.combo_id";
}
else{
	$sql1 = "select *
	from phone_number,combo
	where combo.combo_id = phone_number.combo_id";
}
	$res1=mysqli_query($con,$sql1)or die("error1:".$con->error);
	if($res1){
		echo "<table border=\"1\"> \n";
		echo "<tr>\n";
		echo "<td>Phone number</td>\n";
		echo "<td>Balance</td>\n";
		echo "<td>Status</td>\n";
		echo "<td>Country</td>\n";
		echo "<td>Location</td>\n";
		echo "<td>Combo</td>\n";
		echo "<td>Local_call_time_per_month</td>\n";
		echo "<td>ld_call_time_per_month</td>\n";
		echo "<td>internation_call_time_per_month</td>\n";
		echo "<td>message_per_month</td>\n";
		echo "<td>flow_per_month</td>\n";
		echo "<td>local_call_used_time</td>\n";
		echo "<td>ld_call_used_time</td>\n";
		echo "<td>it_call_used_time</td>\n";
		echo "<td>message_used_count</td>\n";
		echo "<td>flow_used_count</td>\n";
		echo "</tr>\n";
		while($array = mysqli_fetch_array($res1,MYSQL_ASSOC)){
			echo "<tr> \n";
			$phone_number = $array['phone_number'];
			$balance = $array['balance'];
			$status = $array['status'];
			$country = $array['country'];
			$location = $array['location'];
			$combo_id = $array['combo_name'];
			$local_call_time_per_month = $array['local_call_time_per_month'];
			$ld_call_time_per_month = $array['ld_call_time_per_month'];
			$international_call_time_per_month = $array['international_call_time_per_month'];
			$message_count_per_month = $array['message_count_per_month'];
			$flow_count_per_month = $array['flow_count_per_month'];
			$local_call_used_time = $array['local_call_used_time'];
			$ld_call_used_time = $array['ld_call_used_time'];
			$it_call_used_time = $array['it_call_used_time'];
			$message_used_count = $array['message_used_count'];
			$flow_used_count = $array['flow_used_count'];
			
			echo "<td>$phone_number</td>";
			echo "<td>$balance</td>";
			echo "<td>$status</td>";
			echo "<td>$country</td>";
			echo "<td>$location</td>";
			echo "<td>$combo_id</td>";
			echo "<td>$local_call_time_per_month</td>";
			echo "<td>$ld_call_time_per_month</td>";
			echo "<td>$international_call_time_per_month</td>";
			echo "<td>$message_count_per_month</td>";
			echo "<td>$flow_count_per_month</td>";
			echo "<td>$local_call_used_time</td>";
			echo "<td>$ld_call_used_time</td>";
			echo "<td>$it_call_used_time</td>";
			echo "<td>$message_used_count</td>";
			echo "<td>$flow_used_count</td>";
			echo "</tr> \n";
		}
		echo "</table> \n";
	}
mysqli_close($con);
?>
</body>
</html>
