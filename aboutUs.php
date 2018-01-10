<!DOCTYPE html>
<html>
<head>
    <charset=UTF-8>
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="resources/css/styles.css"/>
</head>
<body>
<?php

require_once 'mainpage.php';
require_once 'php/Autoloader.php';

//array containing the error messages
$errors = array();
echo '<article>';
echo '<h1>About us</h1>';
echo '<h2>Kuma sushi bar is located at Musterstrasse 9, 3016 Bern BE, Switzerland</h2>';
echo '<h3>We are serving only the best traditional japanese foods for you since january 2008. </h3>';
echo '<p>Our ingredients are always the most fresh you could even imagine having in the Swiss capital - thanks to the unique supply chain</p>';
echo '<p>Our chef - Qutozuki Mitomiru - is a real descendant of samurai strictly following the medieval Bushido laws.</p>';
echo '<p>He has studied in Kyoto University of Arts and Cooking to work for us</p>';
echo '<p>Please do not hesitate to reserve a table for the dinner you will remember a long time after! </p>';
echo '<p>Just call us +41 31 0030405 or write us a mail at the following address: kuma.sushi.bern@gmail.com </p>';
echo '<p>You can also use a contact form at this website for that.</p>';
echo '</article>';
?>
</body>

</html>