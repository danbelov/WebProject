<?php
/**
 * Created by PhpStorm.
 * User: RSQLAPTOP
 * Date: 15/10/2017
 * Time: 22:36
 */

function load_header()
{
    echo '<header class="top_logo_border">' .
        '<ul class="picture_and_fillspace">' .
        '<img class="main_shop_logo" src="assets/img/logo.gif" width="50" height="50">' .
        '<li class="main_shop_name"> KUMA sushi</li>' .
        '</ul>' .
        '</header>';
}

function print_languages_list(){

    $languages_list = array(
        "DE",
        "FR",
        "EN"
    );

    echo '<nav class="languages_menu">';

    echo '<ul>';

    foreach ($languages_list as $languages){
        echo "<li>$languages</li>";
    }

    echo '</ul>';

    echo '</nav>';
}

/**
 *
 */
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

    echo '<div class="vertical-menu"';

    foreach ($products_list as $products){
        echo "<a>$products</a>";
    }
    echo '</div>';
}

function print_footer()
{
    echo '<footer class="lowest_info_about">' .
        '<ul class="site_info">' .
        '<li><a href="php/classes/views/paymentForm.php">Kuma sushi GmbH </a></li>' .
        '<li>Musterstrasse 9, 3016 Bern </li>' .
        '<li>MWST CHE 123.490.789 </li>' .
        '</ul>' .
        '</footer>';
}

function print_social_platforms_list(){

    $social_platforms = array(
        "Facebook",
        "Instagram",
        "Pinterest",
        "Tripadvisor",
        "Foursquare",
    );

    echo '<nav class="social-btns">';
    echo '<a class="btn facebook" href="#"><i class="fa fa-facebook"></i></a><a class="btn twitter" href="#"><i class="fa fa-twitter"></i></a><a class="btn google" href="#"><i class="fa fa-google"></i></a><a class="btn dribbble" href="#"><i class="fa fa-dribbble"></i></a><a class="btn skype" href="#"><i class="fa fa-skype"></i></a>';
    /*echo '<ul>';

        foreach ($social_platforms as $social){
            echo "<li>$social</li>";
        }

    echo '</ul>'; */
    echo '</nav>';
}

?>