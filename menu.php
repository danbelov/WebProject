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

    echo '<article>';
    echo '<h1>Our menu:</h1> ';
    echo '<table>';
    echo "<tr>";
    echo "<td>Name</td>";
    echo "<td>Quantity in a set</td>";
    echo "<td>Category</td>";
    echo "<td>Price</td>";
    echo "</tr>";
    foreach($db->query($sql) as $row){
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['qtyInASet']}</td>";
        echo "<td>{$row['category']}</td>";
        echo "<td>{$row['price']} CHF</td>";
        echo "</tr>";
    }
    echo '</table>';
    echo '</article>';

    ?>
</body>
</html>