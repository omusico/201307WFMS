<?php
    session_start();
//login_php.php
//$_POST["phone_number"] can be phone_number or user name!!!
    if(empty($_POST["phone_number"]))
    {
        printf("Phone number is empty!\n");
        exit();
    }
    if(empty($_POST["password"]))
    {
        printf("Password is empty!\n");
        exit();
    }

    $mysqli = mysqli_connect("localhost", "root", "123456", "db_course_design");
    if(mysqli_connect_errno())
    {
        printf("Connect faild!\n%s\n", mysqli_connect_error());
        exit();
    }
    else
    {
        if($_POST["login_type"] == "phone_number")
        {
            $sql = "SELECT client.client_name, client.client_type, client.client_id FROM client, client_number WHERE client_number.phone_number = '".$_POST["phone_number"]."' and client_number.client_id = client.client_id and client.password = '".$_POST["password"]."';";
            $res = mysqli_query($mysqli, $sql);
            $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
            if(empty($res_array))
            {
                printf("Client not exist or password error!\n");
                exit();
            }
            else
            {
                $client_name = $res_array['client_name'];
                $client_type = $res_array['client_type'];
                setcookie('user', $res_array['client_id']);
                setcookie('client_name', $client_name);
                mysqli_free_result($res);
                mysqli_close();
                if($client_type == "admin"){
                    $_SESSION['guest'] = 1;
                    setcookie('phone_number', "sss", time()-3600);
                    header("Location: admin-query.php");
                }
                else
                {
                    setcookie('phone_number', $_POST["phone_number"]);
                    $_SESSION['guest'] = 2;
                    header("Location: user-query.php");
                }
            }
        }
        else//login_type == "name"
        {
            $sql = "select client_type, client_id from client where client.client_name = '".$_POST["phone_number"]."' and client.password = '".$_POST["password"]."';";
            $res = mysqli_query($mysqli, $sql);
            $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
            if(empty($res_array))
            {
                echo $sql;
                printf("Password error or client not exist!\n");
                exit();
            }
            else
            {
                setcookie('user', $res_array['client_id']);
                setcookie('client_name', $_POST["phone_number"]);
                setcookie('client_type', $res_array['client_type']);
                if($res_array['client_type'] == "admin")
                {
                    $_SESSION['guest'] = 1;
                    header("Location: admin-query.php");
                }
                else
                {
                    $_SESSION['guest'] = 2;
                    header("Location: user-query-byname.php");
                }
            }
        }
    }   
?>
