<?php
//change_business_user.php
    $mysqli = mysqli_connect("localhost", "root", "123456", "db_course_design");
    if(mysqli_connect_errno())
    {
        printf("Connect error!\n%s\n", mysqli_connect_error($mysqli));
        exit();
    }
    else
    {
        $sql = "select free_message_count, free_flow_count from phone_number, combo, message_business, flow_business where phone_number.combo_id = combo.combo_id and combo.message_business_id = message_business.message_business_id and combo.flow_business_id = flow_business.flow_business_id and phone_number.phone_number = '".$_COOKIE['phone_number']."';";
        $res = mysqli_query($mysqli, $sql);
        $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if(empty($res_array))
        {
            printf("Query error!\n%s\n", mysqli_error($mysqli));
            echo $sql;
            exit();
        }
        else
        {
            $combo_free_message_count = $res_array['free_message_count'];
            $combo_free_flow_count = $res_array['free_flow_count'];
        }

        $extra_free_message_count = 0;
        $extra_free_flow_count = 0;

        if($_POST["message_business"] == "no")
            $message_business_id = "NULL";
        else
        {
            $sql = "SELECT message_business_id, free_message_count FROM message_business WHERE message_business_name ='".$_POST["message_business"]."';";
            $res = mysqli_query($mysqli, $sql);
            $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
            if(empty($res_array))
            {
                printf("query error !\n%s\n", mysqli_error($mysqli));
                echo $sql;
                exit();
            }
            else
            {
                $message_business_id = $res_array['message_business_id'];
                $extra_free_message_count = $res_array['free_message_count'];
            }
            mysqli_free_result($res);
        }
        if($_POST["flow_business"] == "no")
            $flow_business_id = "NULL";
        else
        {
            $sql = "SELECT flow_business_id, free_flow_count FROM flow_business WHERE flow_business_name ='".$_POST["flow_business"]."';";
            $res = mysqli_query($mysqli, $sql);
            $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
            if(empty($res_array))
            {
                printf("query error !\n%s\n", mysqli_error($mysqli));
                echo $sql;
                exit();
            }
            else
            {
                $flow_business_id = $res_array['flow_business_id'];
                $extra_free_flow_count = $res_array['free_flow_count'];
            }
            mysqli_free_result($res);
        }

        $total_free_message_count = $combo_free_message_count + $extra_free_message_count;
        $total_free_flow_count = $combo_free_flow_count + $extra_free_flow_count;

        $sql = "SELECT * FROM number_business WHERE phone_number = '".$_COOKIE['phone_number']."';";
        $res = mysqli_query($mysqli, $sql);
        $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if(empty($res_array))
        {
            $sql = "INSERT INTO number_business VALUES('".$_COOKIE['phone_number']."', ".$message_business_id.", ".$flow_business_id.");";
        }
        else
        {
            if(($message_business_id == NULL) && ($flow_business_id == NULL))
                $sql = "delete from number_business where phone_number = '".$_COOKIE['phone_number']."';";
            else
                $sql = "UPDATE number_business SET message_business_id = ".$message_business_id.", flow_business_id = ".$flow_business_id." WHERE phone_number = '".$_COOKIE['phone_number']."';";
        }
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            echo "</br>".$sql."</br>";
            printf("Change number_business error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        $sql = "update phone_number set message_count_per_month = ".$total_free_message_count.", flow_count_per_month = ".$total_free_flow_count." where phone_number = '".$_COOKIE['phone_number']."';";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            printf("Update error!\n%s\n", mysqli_error($mysqli));
            echo $sql;
            exit();
        }
        header("Location: change_business_successfully_user_byname.html");
        mysqli_close($mysqli);
    }
?>
