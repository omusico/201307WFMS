<?php
//send_message.php
//$_POST["from_number"]
//$_POST["to_number"]
    if((empty($_POST["from_number"])) || (empty($_POST["to_number"])))
    {
        printf("The number is empty!");
        exit();
    }
    $mysqli = mysqli_connect("localhost", "root", "123456", "db_course_design");
    if(mysqli_connect_errno())
    {
        printf("Connectino error!\n%s\n", mysqli_connect_error($mysqli));
        exit();
    }
    else
    {
        $sql = "SELECT message_count_per_month, message_used_count FROM phone_number WHERE phone_number = '".$_POST["from_number"]."';";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            echo "</br>".$sql."</br>";
            printf("111 Qeruy error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        else
        {
            $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
            mysqli_free_result($res);
            $message_count_per_month = $res_array['message_count_per_month'];
            $message_used_count = $res_array['message_used_count'];
            if($message_used_count < $message_count_per_month)
                $cost = 0;
            else
            {
                $sql = "SELECT message_price, phone_number.balance FROM message_business, phone_number, combo WHERE phone_number.combo_id = combo.combo_id and message_business.message_business_id = combo.message_business_id and phone_number.phone_number = '".$_POST["from_number"]."';";
                $res = mysqli_query($mysqli, $sql);
                if($res == FALSE)
                {
                    echo "</br>".$sql."</br>";
                    printf("111 Qeruy error!\n%s\n", mysqli_error($mysqli));
                    exit();
                }
                else
                {
                    $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
                    mysqli_free_result($res);
                    $cost = $res_array['message_price'];
                    $balance = $res_array['balance'];
                    if($balance < $cost)
                    {
                        echo"<p>Balance not enough!</p>";
                        exit();
                    }
                    $balance = $balance - $cost;
                }
            }
            $message_used_count ++;
            $sql = "INSERT INTO text_message_record VALUES('".$_POST["from_number"]."', '".$_POST["to_number"]."', '".date("Y-m-d H:i:s")."', ".$cost.");";
            $res = mysqli_query($mysqli, $sql);
            if($res == FALSE)
            {
                echo "</br>".$sql."</br>";
                printf("222 Insert error!\n%s\n", mysqli_error($mysqli));
                exit();
            }
            mysqli_free_result($res);
            if(isset($balance))
            {
                if($balance < 0)
                    $sql = "UPDATE phone_number SET balance = ".$balance.", message_used_count = ".$message_used_count." status = 'arrearage' WHERE phone_number = ".$_POST["from_number"].";";
                else
                    $sql = "UPDATE phone_number SET balance = ".$balance.", message_used_count = ".$message_used_count." WHERE phone_number = ".$_POST["from_number"].";";
}
            else
                $sql = "UPDATE phone_number SET message_used_count = ".$message_used_count." WHERE phone_number = ".$_POST["from_number"].";";
            $res = mysqli_query($mysqli, $sql);
            if($res == FALSE)
            {
                echo "</br>".$sql."</br>";
                printf("444 Update error!\n%s\n", mysqli_error($mysqli));
                exit();
            }
            mysqli_free_result($res);
            mysqli_close($mysqli);
            header("Location: send_message_successfully.html");
        }
    }
?>
