<?php
function show_current_flow_business()
{
    global $mysqli;
    $phone_number = $_COOKIE['phone_number'];
    $sql = "SELECT flow_business_name FROM flow_business, number_business WHERE flow_business.flow_business_id = number_business.flow_business_id and number_business.phone_number = '".$phone_number."';";
    $res = mysqli_query($mysqli, $sql);
    $res_array = mysqli_fetch_array($res);
    if(empty($res_array))
        echo "<p>You don't have extra flow business now</p>";
    else
        echo "<p>Your flow business is ".$res_array['flow_business_name']."</p";
}
?>
