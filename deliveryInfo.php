<!DOCTYPE html>
<html>
<head>
    <charset=UTF-8>
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="resources/css/styles.css"/>
</head>

<body>

<?php

require_once 'mainpage.php';
require_once 'php/Autoloader.php';

//array containing the error messages
$errors = array();
echo '<article>';
echo '<h1>Delivery information</h1>';
echo '<h2>'.translate('delivery','0').'</h2>';
echo '<h2>'.translate('delivery','1').'</h2>';
echo '<h3>'.translate('delivery','2').'</h3>';
echo '<h3>'.translate('delivery','3').'</h3>';
echo '<h3>'.translate('delivery','4').'</h3>';
echo '</article>';
?>
</body>

</html>