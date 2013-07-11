<?php
function get_extra_flow_business()
{
    global $mysqli;
    $sql = "SELECT flow_business_name FROM flow_business WHERE type = 'extra';";
    $res = mysqli_query($mysqli, $sql);
    if($res == FALSE)
    {
        printf("111 Query error!\n%s\n", mysqli_error($mysqli));
        exit();
    }
    else
    {
        while($res_array = mysqli_fetch_array($res, MYSQLI_ASSOC))
        {
            echo "<option value=\"".$res_array['flow_business_name']."\">".$res_array['flow_business_name']."</option>";
        }
    }
    mysqli_free_result($res);
}
