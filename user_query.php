<html>
    <head>
        <title>user query</title>
    </head>
    <body>
        <p>Welcome! <?php echo $_COOKIE['client_name']; ?></p>
        <h3>Change combo</h3>
        <form action="change_combo_user.php" method="post">
           <?php include 'show_current_combo.php';
                $mysqli;
                show_current_combo(); ?>
            <select name="combo">
                <?php include 'get_combos.php';
                    get_combos(); ?>
            </select>
            <input type="submit" value="submit" />
        </form>
        <h3>Change business</h3>
        <form action="change_business_user.php" method="post">
            <?php include 'show_current_message_business.php';
                show_current_message_business(); ?>
            <select name="message_business">
                <?php include 'get_extra_message_business.php';
                    get_extra_message_business(); ?>
            </select>
            <?php include 'show_current_flow_business.php';
                show_current_flow_business(); ?>
            <select name="flow_business">
                <?php include 'get_extra_flow_business.php';
                    get_extra_flow_business(); ?>
            </select>
            <input type="submit" value="submit" />
        </form>
    </body>
</html> 
