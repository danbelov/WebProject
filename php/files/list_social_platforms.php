<?php
/**
 * Created by PhpStorm.
 * User: RSQLAPTOP
 * Date: 15/10/2017
 * Time: 22:21
 */

function print_social_platforms_list(){

    $social_platforms = array(
        "Facebook",
        "Instagram",
        "Pinterest",
        "Tripadvisor",
        "Foursquare",
    );

    echo '<nav class="social_platforms_enum">';
    echo '<ul>';

        foreach ($social_platforms as $social){
            echo "<li>$social</li>";
        }

    echo '</ul>';
    echo '</nav>';
}

?>