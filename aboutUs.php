<!DOCTYPE html>
<html>
<head>
    <charset=UTF-8>
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="print"/>
</head>

<body>
<h1>About us</h1>
<?php

require_once 'mainpage.php';
require_once 'php/Autoloader.php';

//array containing the error messages
$errors = array();

echo '<h2>Our tasty dishes can be easily enjoyed at home: </h2>';
echo '<h2>If you are: </h2>';
echo '<h3>Within Bern City - free of charge</h3>';
echo '<h3>Within Canton of Bern: in this case we must charge you with a 10 SFr Delivery fee. The food will be delivered within 2 hours. </h3>';
echo '<h3>Within other Swiss territories: we are sorry, but it is physically impossible to deliver food fresh in that case so you cannot order the delivery.'.
    'We would be glad to see in our restaurant ;) </h3>';
echo '<h4>Just choose the appropriate delivery type when checking out your order </h4>';
?>
</body>

</html>