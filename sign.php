<?php
    include 'get_unused_numbers.php';
    include 'get_combos.php';
    include 'get_extra_message_business.php';
    include 'get_extra_flow_business.php';
    $mysqli;
?>

<html>
    <head>
        <title>Sign</title>
    </head>
    <body>
        <form action="sign_php.php" method="post">
            <p>Name:</p>
            <input type="text" name="new_name" />
            <p>Password:</p>
            <input type="password" name="new_password" />
            <p>Credentials type:</p>
            <select name="new_credentials_type" >
                <option value="id_card" selected="selected">ID Card</option>
                <option value="passport">Passport</option>
            </select>
            <p>Credentials number:<p>
            <input type="text" name="new_credentials_number"</p>
            <p>Select a phone number</p>
            <select name="new_number">
                <?php 
                    get_unused_numbers();
                ?>
            </select>
            <p>Select a combo</p>
            <select name="new_combo">
                <?php get_combos(); ?>
            </select>
            <p>Select extra bussiness</p>
            <select name="new_message_business">
                <option value="no">No extra message business</option>
                <?php get_extra_message_business(); ?>
            </select>
            <select name="new_flow_business">
                <option value="no">No extra flow business</option>
                <?php get_extra_flow_business();
                    mysqli_close($mysqli);
                ?>
            </select>
            <input type="submit" name="submit_button" />
        </form>
    </body>
</html>
