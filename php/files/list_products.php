<?php
/**
 * Created by PhpStorm.
 * User: RSQLAPTOP
 * Date: 15/10/2017
 * Time: 22:19
 */

/**
 *
 */
function print_products_list(){

    $products_list = array(
        "Umaizushi",
        "Sushi",
        "Ramen",
        "Okonomiyaki",
        "Desserts",
        "Drinks",
        "Extras"
    );

    echo '<nav class="products_navigation_menu">';

    echo '<ul>';

    foreach ($products_list as $products){
        echo "<li>$products</li>";
    }

    echo '</ul>';

    echo '</nav>';
}
?>