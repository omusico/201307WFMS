<?php
function get_unused_numbers()
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
        $sql = "SELECT phone_number FROM phone_number WHERE status = 'unused';";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            printf("query error!\n%s\n", sqli_error($mysqli));
            exit();
        }
        else
        {
            while($unused_numbers = mysqli_fetch_array($res, MYSQLI_ASSOC))
            {
                echo "<option value=\"".$unused_numbers['phone_number']."\">".$unused_numbers['phone_number']."</option>";
            }
        }
        mysqli_free_result($res);
        //mysqli not close !!!
    }
}
?>
