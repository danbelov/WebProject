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
echo '<article>';
echo '<h1>Kuma sushi bar is located at Musterstrasse 9, 3016 Bern BE, Switzerland</h1>';
echo '<h2>We are serving only the best traditional japanese foods for you since january 2008. </h2>';
echo '<h3>Our ingredients are always the most fresh you could even imagine having in the Swiss capital - thanks to the unique supply chain</h3>';
echo '<h3>Our chef - Qutozuki Mitomiru - is a real descendant of samurai strictly following the medieval Bushido laws.</h3>';
echo '<h3>He has studied in Kyoto University of Arts and Cooking to work for us</h3>';
echo '<h3>Please do not hesitate to reserve a table for the dinner you will remember a long time after! </h3>';
echo '<h3>Just call us +41 31 0030405 or write us a mail at the following address: kuma.sushi.bern@gmail.com </h3>';
echo '<h3>You can also use a contact form at this website for that.</h3>';
echo '</article>';
?>
</body>

</html>