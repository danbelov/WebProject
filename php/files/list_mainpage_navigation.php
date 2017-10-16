
<?php

function print_mainpage_navigation_list(){

    $main_navigation = array(
        "Menu",
        "Delivery",
        "About",
        "My Cart",
    );

    echo '<nav class="main_navigation_menu">';

    echo '<ul>';

    foreach ($main_navigation as $navigation){
        echo "<li>$navigation</li>";
    }

    echo '</ul>';

    echo '</nav>';
}

?>