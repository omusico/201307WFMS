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
	$sql1 = "select *
	from client_number,client
	where client_number.client_id = client.client_id;";
	$res1=mysqli_query($con,$sql1)or die("error1:".$con->error);
	if($res1){
		echo "<table border=\"1\"> \n";
		echo "<tr>\n";
		echo "<td>Client Name</td>\n";
		echo "<td>Id</td>\n";
		echo "<td>Client Type</td>\n";
		echo "<td>credentials Number</td>\n";
		echo "<td>credentials Type</td>\n";
		echo "<td>Phone</td>\n";
		echo "</tr>\n";
		while($array = mysqli_fetch_array($res1,MYSQL_ASSOC)){
			echo "<tr> \n";
			$client_name = $array['client_name'];
			$client_id = $array['client_id'];
			$client_type = $array['client_type'];
			$credentials_number = $array['credentials_number'];
			$credentials_type = $array['credentials_number'];
			$phone = $array['phone_number'];
			
			echo "<td>$client_name</td>";
			echo "<td>$client_id</td>";
			echo "<td>$client_type</td>";
			echo "<td>$credentials_number</td>";
			echo "<td>$credentials_type</td>";
			echo "<td>$phone</td>";
			echo "</tr> \n";
		}
		echo "</table> \n";
	}

mysqli_close($con);
?>
</body>
</html>
