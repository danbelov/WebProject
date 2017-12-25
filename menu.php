<?php
/**
 * Created by PhpStorm.
 * User: redsquare
 * Date: 12/24/2017
 * Time: 2:50 PM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kuma sushi Bern</title>
    <link rel = "stylesheet" type = "text/css" href = "resources/css/styles.css" media = "screen">
    <link rel = "stylesheet" type = "text/css" href = "resources/css/styles_print.css" media = "print">
</head>
<body>
    <?php
        require_once 'mainpage.php';

        require_once 'php/classes/model/DB.php';

        $sql = "SELECT * FROM products";

        $db = DB::getInstance();

    foreach($db->query($sql) as $row){
        echo "<li>{$row['name']}</li>";
    }

    ?>
</body>
</html>