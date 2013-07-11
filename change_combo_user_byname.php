<?php
//change_combo_user.php
    $mysqli = mysqli_connect("localhost", "root", "123456", "db_course_design");
    if(mysqli_connect_errno())
    {
        printf("Connect error!\n%s\n", mysqli_connect_error($mysqli));
        exit();
    }
    else
    {
        echo "combo = ".$_POST["combo"];
        $sql = "SELECT combo_id from combo where combo_name = '".$_POST["combo"]."';";
        $res = mysqli_query($mysqli, $sql);
        $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $combo_id = $res_array['combo_id'];
        mysqli_free_result($res);
        $sql = "select free_local_call_time, free_ld_call_time, free_international_call_time, free_message_count, free_flow_count from calling_business, message_business, flow_business, combo where calling_business.calling_business_id = combo.calling_business_id and combo.message_business_id = message_business.message_business_id and combo.flow_business_id = flow_business.flow_business_id and combo.combo_id = ".$combo_id.";";
        $res = mysqli_query($mysqli, $sql);
        $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if(empty($res_array))
        {
            printf("Query error!\n%s\n", mysqli_error($mysqli));
            echo $sql;
            exit();
        }
        $free_local_call_time = $res_array['free_local_call_time'];
        $free_ld_call_time = $res_array['free_ld_call_time'];
        $free_it_call_time = $res_array['free_international_call_time'];
        $free_message_count = $res_array['free_message_count'];
        $free_flow_count = $res_array['free_flow_count'];
        mysqli_free_result($res);
        $sql = "update phone_number set combo_id =".$combo_id;
        $sql = $sql.", local_call_time_per_month = ".$free_local_call_time.",ld_call_time_per_month = ".$free_ld_call_time.",international_call_time_per_month = ";
        $sql = $sql.$free_it_call_time.", message_count_per_month = ".$free_message_count.", flow_count_per_month = ".$free_flow_count." where phone_number = '".$_POST["phone_number"]."';";
        echo $sql;
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            echo $sql;
            printf("Update error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        mysqli_close($mysqli);
        header("Location: change_combo_successfully_byname.html");
    }
?>
