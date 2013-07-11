<html>
    <head>
        <title>Report form by month with number</title>
    </head>
    <body>
<?php
//report_form_by_month.php
    $s = $_POST["start_time"];
    $e = $_POST["end_time"];
    $phone_number = $_POST["phone_number"];
    $start_time = new DateTime();
    $end_time = new DateTime();
    $start_time->setTimestamp(strtotime($s));
    $end_time->setTimestamp(strtotime($e));
    $mysqli = mysqli_connect("localhost", "root", "123456", "db_course_design");
    if(mysqli_connect_errno())
    {
        printf("Connecr error!\n%s\n", mysqli_connect_error($mysqli));
        exit();
    }
    else
    {
        if($phone_number == "all")
        {
            echo"<table border=\"1\"><tr><td>Phone number</td><td>Month</td><td>Cost</td></tr>";
            while($start_time->getTimestamp() <= $end_time->getTimestamp())
            {
                $old = "<td>".$start_time->format("Y-m")."</td>";
                $sql = "select dailing_number as phone_number,  sum(cost) as cost from call_record where start_time > '".$start_time->format("Y-m")."' and end_time < '".$start_time->add(new DateInterval('P1M'))->format("Y-m")."'and dailing_number = '".$phone_number."';";
                $res = mysqli_query($mysqli, $sql);
                $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
                echo "<tr><td>".$res_array['phone_number']."</td>".$old;
                echo "<td>".$res_array['cost']."</td></tr>";
                mysqli_free_result($res);
            }
            echo "</table>";
        }
        else
        {
            echo "<table border=\"1\"><tr><td>Month</td><td>Cost</td></tr>";
            while($start_time->getTimestamp() <= $end_time->getTimestamp())
            {
                echo "<tr><td>".$start_time->format("Y-m")."</td>";
                $sql = "select sum(cost) as cost from call_record where start_time > '".$start_time->format("Y-m")."' and end_time < '".$start_time->add(new DateInterval('P1M'))->format("Y-m")."' and dailing_number = '".$phone_number."';";
                $res = mysqli_query($mysqli, $sql);
                $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
                echo "<td>".$res_array['cost']."</td></tr>";
                mysqli_free_result($res);
            }
            echo "</table>";
        }
        mysqli_close($mysqli);
    }
        echo "<a href=\"admin-query.php\">Back</a>";
?>
    </body>
</html>
