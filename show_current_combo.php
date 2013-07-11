<?php 
//show_current_combo.php
function show_current_combo()
{
    global $mysqli;
    $mysqli = mysqli_connect("localhost", "root", "123456", "db_course_design");
    if(mysqli_connect_errno())
    {
        printf("Connect error!\n%s\n", mysqli_connect_error());
        exit();
    }
    else
    {
        $phone_number = $_COOKIE['phone_number'];
        $sql = "SELECT combo_name FROM combo, phone_number WHERE phone_number.combo_id = combo.combo_id and phone_number.phone_number = '".$phone_number."';";
        $res = mysqli_query($mysqli, $sql);
        $res_array = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if(empty($res_array))
        {
            echo $sql."</br>";
            printf("Query error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        else
        {
            echo "<p>Your combo is ".$res_array['combo_name']."</p>";
        }
    }
}
?>
