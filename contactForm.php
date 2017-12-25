<!DOCTYPE html>
<html lang="en">
<head>
    <charset=UTF-8>
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="print"/>
</head>
<body>
<?php
        require_once 'mainpage.php';
        require_once 'php/Autoloader.php';

    echo '<h1>Contact us</h1>';
    echo '<form action="confirmedPayment.php" method="post">';

    echo    '<p><label>Your name:</label><input type="text" tabindex="2" name="cardnumber" required></p>'.
        '</form>';

    echo    '<p><label>Your email:</label><input type="text" tabindex="2" name="cardnumber" required></p>'.
    '</form>';

    echo    '<p><label>Your message:</label>'.
        '<textarea id="tAddress" rows="4" cols="100" maxlength="500" placeholder="Enter your message" required></textarea>'.
        '<input type="submit" value="Submit">'.
        '</form>';
        ?>
</body>
</html>
