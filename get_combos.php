<?php
    function get_combos()
    {
        global $mysqli;
        $sql = "SELECT combo_name FROM combo;";
        $res = mysqli_query($mysqli, $sql);
        if($res == FALSE)
        {
            printf("get_combo 111 Query error!\n%s\n", mysqli_error($mysqli));
            exit();
        }
        else
        {
            echo $sql."</br>";
            while($res_array = mysqli_fetch_array($res, MYSQLI_ASSOC))
            {
               echo "<option value=\"".$res_array['combo_name']."\">".$res_array['combo_name']."</option>"; 
            } 
        }
        mysqli_free_result($res);
    }
?>
