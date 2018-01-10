<?php
require_once 'mainpage.php';

//check if the starting row variable was passed in the URL or not
if (!isset($_GET['productId']) or !is_numeric($_GET['productId'])) {
    //we give the value of the starting row to 0 because nothing was found in URL
    $productId = 0;
    //otherwise we take the value from the URL
} else {
    $productId = (int)$_GET['productId'];
}

$FILEPATH = '\\resources\\texts\\';

$fh = fopen(__FILE__.$FILEPATH.'philadelphia.txt','r');
while ($line = fgets($fh)) {
     echo($line);
}
fclose($fh);
?>