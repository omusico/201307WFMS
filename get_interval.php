<?php
function get_interval($datatime1, $datatime2)
{
$time1 = strtotime($datatime1);
$time2 = strtotime($datatime2);
$passtime = $time2 - $time1;
$total_minute = floor($passtime/60);
if($passtime % 60 != 0)
   $total_minute = $total_minute +1; 
return $total_minute;
}
?>
