<?php
function show_current_message_business()
{
    global $mysqli;
    $phone_number = $_COOKIE['phone_number'];
    $sql = "SELECT message_business_name FROM message_business, number_business WHERE message_business.message_business_id = number_business.message_business_id and number_business.phone_number = '".$phone_number."';";
    $res = mysqli_query($mysqli, $sql);
    $res_array = mysqli_fetch_array($res);
    if(empty($res_array))
        echo "<p>You don't have extra message business now</p>";
    else
        echo "<p>Your message business is ".$res_array['message_business_name']."</p";
}
?>
