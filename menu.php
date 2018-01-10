<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kuma sushi Bern</title>
    <link rel = "stylesheet" type = "text/css" href = "resources/css/styles.css" media = "screen">
</head>
<body>
    <?php

        require_once 'translations.php';

        require_once 'mainpage.php';

        require_once 'php/classes/DB.php';

        //check if the starting row variable was passed in the URL or not
        if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
        //we give the value of the starting row to 0 because nothing was found in URL
            $startrow = 0;
        //otherwise we take the value from the URL
        } else {
            $startrow = (int)$_GET['startrow'];
        }

        $sql = NULL;

        if(isset($_GET["products"])){
            $product = $_GET["products"];
            $sql = "SELECT * FROM products WHERE category LIKE '%$product' LIMIT $startrow, 10;" ;
        } else {
            $sql = "SELECT * FROM products LIMIT $startrow, 10";
        }

        function get_quantity_options($max_count){

            $cnt = 0;

            echo "<td><select name='ExtraOptions' size='1'>";

            while($cnt < $max_count){
                echo '<option>'.$cnt.'<option>';
                $cnt = $cnt+1;
            }
            echo "</select></td>";
        }


        function get_extras_option(){

            $extras = array(
                "Baked + 1.20",
                "Roasted + 2.00",
                "Katsuobushi(Bonito slim slices) + 4.00",
                "Colored ginger + 2.00",
                "Tobikko + 2.50",
                "Wakame + 3.50",
                "Wasabi + 1.20",
                "Thermal packaging + 3.00");
            echo "<td><select name='ExtraOptions' size='1'>";
            foreach ($extras as $extra){
                echo '<option>'.$extra.'<option>';
            }
            echo "</select><a href='#' class='infobutton'>Add extra</a></td>";
        }

        $db = DB::getInstance();

            echo '<article>';
            echo '<h1>'.translate('products','0').'</h1> ';
            echo '<table>';
            echo "<tr>";
            echo '<td>'.translate('products','1').'</td>';
            echo '<td>'.translate('products','2').'</td>';
            echo '<td>'.translate('products','3').'</td>';
            echo '<td>'.translate('products','4').'</td>';
            echo '<td>'.translate('products','5').'</td>';
            echo '<td>'.translate('products','6').'</td>';
            echo '<td>'.translate('products','7').'</td>';
            echo "</tr>";

            echo '<form>';

            foreach($db->query($sql) as $row){
                $category = $row['category'];
                echo "<tr>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['qtyInASet']}</td>";
                echo "<td>{$category}</td>";
                echo "<td>{$row['price']} CHF</td>";
                if($category != "EXTRA" or $category != "SAUCE") {
                    get_quantity_options(10);
                    echo "<td><input type='checkbox' name='thermobox' value='Thermobox'></td>";
                    if(isset($_GET['products']) && !(($_GET['products'] == "extra") or ($_GET['products'] == "sauce"))) {
                        get_extras_option();
                    }
                    echo "<td><a href='#' class='infobutton'>Info</a></td>";
                    echo "<td><a href='#' class='addtocartbutton'>Add to cart</a>></td>";
                } else {

                };
                echo "</tr>";
            }

            echo '</table>';
            echo '</article>';

            //now this is the link..
            echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+10).'">Next</a>';

            $prev = $startrow - 10;

            //only print a "Previous" link if a "Next" was clicked
            if ($prev >= 0)
                echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'">Previous</a>';
?>
</body>
</html>