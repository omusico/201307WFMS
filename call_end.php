<?php
//call_end.php
include 'get_interval.php';
    $balance = $_COOKIE['balance'];
    $from_number = $_COOKIE['from_number'];
    $to_number = $_COOKIE['to_number'];
    $start_time = $_COOKIE['start_time'];
    $end_time = date("Y-m-d H:i:s");
    $lasting_time = get_interval($start_time, $end_time)*10;

    /*echo $from_number."</br>";
    echo $to_number."</br>";
    echo $start_time."</br>";
    echo $end_time."</br>";*/

    $mysqli = mysqli_connect("localhost", "root", "123456", "db_course_design");
    if(mysqli_connect_errno())
    {
        printf("Connect error!\n%s\n", mysqli_connect_error($mysqli));
        exit();
    }
    else
    {
        //from_number price info, and consume from_number location is Beijing, China
        $sql = "SELECT local_call_time_per_month, ld_call_time_per_month, international_call_time_per_month, local_call_used_time, ld_call_used_time, it_call_used_time, calling_business.local_call_price as local_price, calling_business.ld_call_price as ld_price, calling_business.international_call_price as it_price FROM phone_number, combo, calling_business WHERE phone_number.combo_id = combo.combo_id and combo.calling_business_id = calling_business.calling_business_id and phone_number = '".$from_number."';";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            echo "</br>".$sql."</br>";
            printf("111 Query error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        else
        {
            $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $from_number_free_local_call_time = $res_array['local_call_time_per_month'];
            $from_number_free_ld_call_time = $res_array['ld_call_time_per_month'];
            $from_number_free_it_call_time = $res_array['international_call_time_per_month'];
            $from_number_used_local_call_time = $res_array['local_call_used_time'];
            $from_number_used_ld_call_time = $res_array['ld_call_used_time'];
            $from_number_used_it_call_time = $res_array['it_call_used_time'];
            $local_price = $res_array['local_price'];
            $ld_price = $res_array['ld_price'];
            $it_price = $res_array['it_price'];
            mysqli_free_result($res);
        }
        //to_number location info
        $sql = "SELECT location, country FROM phone_number WHERE phone_number = '".$to_number."';"; 
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            echo "</br>".$sql."</br>";
            printf("222 Query error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        else
        {
            $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $to_number_location = $res_array['location'];
            $to_number_country = $res_array['country'];
            mysqli_free_result($res);
        }

        //judge call type
        if($to_number_country != "China")
            $calling_type = "international_calls";
        else if($to_number_location != "Beijing")
            $calling_type = "ld_calls";
        else
            $calling_type = "local_calls";

        //compute cost
        switch($calling_type)
        {
            case "local_calls" :
                $free_time = $from_number_free_local_call_time - $from_number_used_local_call_time;
                if($free_time >= $lasting_time)
                    //free time is enough
                    $cost = 0;
                else
                {
                    if($free_time > 0)
                    //free time is not enough
                        $cost = ($lasting_time - $free_time) * $local_price;
                    else
                    //free time is used out
                        $cost = $lasting_time * $local_price;
                }
                break;
            case "ld_calls":
                $free_time = $from_number_free_ld_call_time - $from_number_used_ld_call_time;
                if($free_time >= $lasting_time)
                    //free time is enough
                    $cost = 0;
                else
                {
                    if($free_time > 0)
                    //free time is not enough
                        $cost = ($lasting_time - $free_time) * $ld_price;
                    else
                    //free time is used out
                        $cost = $lasting_time * $ld_price;
                }
                break;
            case "international_calls":
                $free_time = $from_number_free_it_call_time - $from_number_used_it_call_time;
                if($free_time >= $lasting_time)
                    //free time is enough
                    $cost = 0;
                else
                {
                    if($free_time > 0)
                    //free time is not enough
                        $cost = ($lasting_time - $free_time) * $ld_price;
                    else
                    //free time is used out
                        $cost = $lasting_time * $ld_price;
                }
                break;
            default : break;
        }
        $sql = "INSERT INTO call_record VALUES('".$from_number."', '".$to_number."', '".$start_time."', '".$end_time."', '".$calling_type."', ".$cost.");";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            echo "</br>".$sql."</br>";
            printf("333 Insert error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        mysqli_free_result($res);
        $balance = $balance - $cost;
        $sql = "UPDATE phone_number SET balance = ".$balance.", ";
        switch($calling_type)
        {
            case "local_calls" :
                $from_number_used_local_call_time += $lasting_time;
                $sql = $sql."local_call_used_time = ".$from_number_used_local_call_time;
                break;
            case "ld_calls" :
                $from_number_used_ld_call_time += $lasting_time;
                $sql = $sql."ld_call_used_time = ".$from_number_used_ld_call_time;
                break;
            case "international_calls" :
                $from_number_used_local_call_time += $lasting_time;
                $sql = $sql."it_call_used_time = ".$from_number_used_it_call_time;
                break;
            default:
        }
        if($balance < 0)
        $sql = $sql.", status = 'arrearage'";
        $sql = $sql." WHERE phone_number = '".$from_number."';";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            echo "</br>".$sql."</br>";
            printf("444 UPDATE error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        mysqli_free_result($res);
        header("Location: communication.html");
    }
?>
