<?php
    if(empty($_POST["new_name"]))
    {
        echo "<p>You do not input your name!</p>";
    }
    if(empty($_POST["new_credentials_number"]))
    {
        echo "<p>You do not input credentials number!</p>";
    }
    if(empty($_POST["new_password"]))
    {
        echo "<p>You do not input password!</p>";
    }

    $mysqli = mysqli_connect("localhost", "root", "123456", "db_course_design");
    if(mysqli_connect_errno())
    {
        printf("111 Connect error!\n%s\n", mysqli_connect_error());
        exit();
    }
    else
    {
        //is name already exist?
        $sql = "select client_id from client where (credentials_type != '".$_POST["new_credentials_type"]."' or credentials_number != '".$_POST["new_credentials_number"]."') and client_name = '".$_POST["new_name"]."';";
        $res = mysqli_query($mysqli, $sql);
        $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if(!empty($res_array))
        {
            printf("User name already exist! Please change a name.\n");
            exit();
        }
        //is client already exist?
        $sql = "SELECT client_id FROM client WHERE credentials_type = '".$_POST["new_credentials_type"]."' and credentials_number = '".$_POST["new_credentials_number"]."';";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            printf("666 Query error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        $id_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if(empty($id_array))
        {
            //client not exist, create a new client
            //insert into client table
            $sql = "INSERT INTO client(credentials_type, credentials_number, client_name, password, client_type) VALUES('".$_POST["new_credentials_type"]."', '".$_POST["new_credentials_number"]."','".$_POST["new_name"]."','".$_POST["new_password"]."', 'client');";
           // echo "sql = ".$sql."</br>";
            $res = mysqli_query($mysqli, $sql);
            if($res == FALSE)
            {
                echo "Insert error!";
                printf("222 %s\n", mysqli_error($mysqli));
                exit();
            }
            mysqli_free_result($res);
        }




        //find out the client_id
        $sql = "SELECT client_id FROM client WHERE credentials_type = '".$_POST["new_credentials_type"]."' and credentials_number = '".$_POST["new_credentials_number"]."';";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            printf("444 Query error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        $id_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $id = $id_array['client_id'];

        //insert into client_number
        $sql = "INSERT INTO client_number VALUES('".$id."', '".$_POST["new_number"]."');";
        mysqli_free_result($res);
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            printf("555 Insert error!\n%s\n", mysqli_error($mysqli));
            exit();
        } 
        mysqli_free_result($res);

        //find out combo_id
        $sql = "SELECT combo_id FROM combo WHERE combo_name = '".$_POST["new_combo"]."';";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            printf("123 Query error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        else
        {
            $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $combo_id = $res_array['combo_id'];
        }
        //find out call message flow free count
        $sql = "SELECT free_local_call_time, free_ld_call_time, free_international_call_time, free_message_count, free_flow_count
from    calling_business, message_business, flow_business, combo
where   combo_id = ".$combo_id." and
        combo.calling_business_id = calling_business.calling_business_id and
        combo.message_business_id = message_business.message_business_id and
        combo.flow_business_id = flow_business.flow_business_id;";
        echo "</br>".$sql."</br>";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            printf("555 Query error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $free_local_call_time = $res_array['free_local_call_time'];
        $free_ld_call_time = $res_array['free_ld_call_time'];
        $free_it_call_time = $res_array['free_international_call_time'];
        $free_message_count = $res_array['free_message_count'];
        $free_flow_count = $res_array['free_flow_count'];
        mysqli_free_result($res);

        //insert into phone_business
        if($_POST["new_message_business"] == "no")
            $extra_message_id = "NULL";
        else
        {
            $sql = "SELECT message_business_id, free_message_count FROM message_business WHERE message_business_name = '".$_POST["new_message_business"]."';";
            //echo $sql."</br>";
            $res = mysqli_query($mysqli, $sql);
            if($sql == FALSE)
            {
                printf("333 Query error!\n%s\n", mysqli_error($mysqli));
                exit();
            }
            else
            {
                $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
                $extra_message_id = $res_array['message_business_id'];
                $free_message_count += $res_array['free_message_count'];
                //echo "</br>".$res_array['message_business_id']."</br>";
            }
        }
        if($_POST["new_flow_business"] == "no")
            $extra_flow_id = "NULL";
        else
        {
            $sql = "SELECT flow_business_id, free_flow_count FROM flow_business WHERE flow_business_name = '".$_POST["new_flow_business"]."';";
            $res = mysqli_query($mysqli, $sql);
            if($sql == FALSE)
            {
                printf("333 Query error!\n%s\n", mysqli_error($mysqli));
                exit();
            }
            else
            {
                $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
                $extra_flow_id = $res_array['flow_business_id'];
                $free_flow_count += $res_array['free_flow_count'];
            }
        }
        if(($extra_message_id != "NULL") || ($extra_flow_id != "NULL"))
        {
            $sql = "INSERT INTO number_business VALUES('".$_POST["new_number"]."', ".$extra_message_id.", ".$extra_flow_id.");";
            $res = mysqli_query($mysqli, $sql);
            if($res == FALSE)
            {
                echo $sql."</br>";
                printf("444 insert error!\n%s\n", mysqli_error($mysqli));
                exit();
            }
        }

        $sql = "UPDATE phone_number SET status = 'normal', combo_id = ".$combo_id .", local_call_time_per_month = ".$free_local_call_time.", ld_call_time_per_month = ".$free_ld_call_time.", international_call_time_per_month = ".$free_it_call_time.", message_count_per_month = ".$free_message_count.", flow_count_per_month = ".$free_flow_count." WHERE phone_number = '".$_POST["new_number"]."';";
        echo "</br>".$sql."</br>";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            echo "Update error!";
            printf("333 %s\n", mysqli_error($mysqli));
            exit();
        }
        mysqli_free_result($res);

        mysqli_close($mysqli);
        header("Location: sign_successfully.html");
    }
?>
