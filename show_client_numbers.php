<?php
function show_client_numbers_start()
{
    global $result;
    $mysqli = mysqli_connect("localhost", "root", "123456", "db_course_design");
    if(mysqli_connect_errno())
    {
        printf("Connect error!\n%s\n", mysqli_connect_error($mysqli));
        exit();
    }
    $sql = "select phone_number from client, client_number where client.client_id = client_number.client_id and client_number.client_id = ".$_COOKIE['user'].";";
    $res = mysqli_query($mysqli, $sql);
    if($res == FALSE)
    {
        printf("Query error!\n%s\n", mysqli_error($mysqli));
        exit();
    }
    $result = "";
    while($res_array = mysqli_fetch_array($res, MYSQLI_ASSOC))
    {
        $result = $result. "<option value=\"".$res_array['phone_number']."\">".$res_array['phone_number']."</option>";
    }
    mysqli_free_result($res);
}

function show_client_numbers()
{
    global $result;
      echo $result;
}

function close_db()
{
    mysqli_close($mysqli);
}
