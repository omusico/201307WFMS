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
if (isset($_POST['user'])){
	$user=$_POST['user'];
	$sql1 = "select *
	from client
	where client_name = '$user';";
}
	$res1=mysqli_query($con,$sql1)or die("error1:".$con->error);
	if($res1){
		echo "<table border=\"1\"> \n";
		echo "<tr>\n";
		echo "<td>Client Name</td>\n";
		echo "<td>Id</td>\n";
		echo "<td>Client Type</td>\n";
		echo "<td>credentials Number</td>\n";
		echo "<td>credentials Type</td>\n";
		echo "</tr>\n";
		while($array = mysqli_fetch_array($res1,MYSQL_ASSOC)){
			echo "<tr> \n";
			$client_name = $array['client_name'];
			$client_id = $array['client_id'];
			$client_type = $array['client_type'];
			$credentials_number = $array['credentials_number'];
			$credentials_type = $array['credentials_number'];
			
			echo "<td>$client_name</td>";
			echo "<td>$client_id</td>";
			echo "<td>$client_type</td>";
			echo "<td>$credentials_number</td>";
			echo "<td>$credentials_type</td>";
			echo "</tr> \n";
		}
		echo "</table> \n";
	}
		echo "</br> \n";
		$sql2 = "select *
		from phone_number,client_number,client,combo
		where client.client_id = client_number.client_id and client_number.phone_number = phone_number.phone_number and client_name = '$user' and combo.combo_id = phone_number.combo_id;";
		$res2=mysqli_query($con,$sql2)or die("error2:".$con->error);
		if($res2){
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
			while($array2 = mysqli_fetch_array($res2,MYSQL_ASSOC)){
				echo "<tr> \n";
				$phone_number = $array2['phone_number'];
				$balance = $array2['balance'];
				$status = $array2['status'];
				$country = $array2['country'];
				$location = $array2['location'];
				$combo_id = $array2['combo_name'];
				$local_call_time_per_month = $array2['local_call_time_per_month'];
				$ld_call_time_per_month = $array2['ld_call_time_per_month'];
				$international_call_time_per_month = $array2['international_call_time_per_month'];
				$message_count_per_month = $array2['message_count_per_month'];
				$flow_count_per_month = $array2['flow_count_per_month'];
				$local_call_used_time = $array2['local_call_used_time'];
				$ld_call_used_time = $array2['ld_call_used_time'];
				$it_call_used_time = $array2['it_call_used_time'];
				$message_used_count = $array2['message_used_count'];
				$flow_used_count = $array2['flow_used_count'];
				
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
