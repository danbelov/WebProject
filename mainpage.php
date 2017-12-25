<?php
/**
 * Created by PhpStorm.
 * User: RSQLAPTOP
 * Date: 15/10/2017
 * Time: 22:36
 */


function load_images($productType)
{
    $directory = "assets/img/" + $productType;
    $images = glob($directory . "*.jpg");

    foreach ($images as $image) {
        echo $image;
    }
}

/**
 *
 */
function loadImages()
{
    $directory = "assets/img/ramen";
    $images = glob($directory . "*.jpg");

    foreach ($images as $image) {
        if (!empty($image)) {
            echo '<img class="main_shop_logo" src='.$image.' width="50" height="50">';
        }
    }
}

function load_header()
{

    echo '<header class="top_logo_border">' .
        '<ul class="ga_menu">';
            print_mainpage_navigation_list();
        echo'</ul>' ;
        echo '<ul class="language_menu">';
            print_languages_list();
        echo '</ul>' ;
     echo  '</header>';
}

function print_languages_list(){

    $languages_list = array(
        "DE",
        "FR"
    );

    foreach ($languages_list as $languages){
        echo "<li>$languages</li>";
    }
}

/**
 *
 */
function print_mainpage_navigation_list(){

    $page1 = 'aaa';

    $main_navigation = array(
        "Menu",
        "Delivery",
        "About",
        "Contact",
        "My Cart",
        "Login"
    );

    $main_navigation_links = array(
        "menu.php",
        "deliveryInfo.php",
        "index.php?services=about",
        "contactForm.php",
        "paymentForm.php",
        "login.php"
    );

    $i = 0;

    $isActive = "";

    foreach ($main_navigation as $products){
        if ($page1 == strtolower($main_navigation[$i])){
            $isActive="active";
        } else{
            $isActive = "";
        }

        echo "<li class='$isActive'</li>";
        echo "<a href='$main_navigation_links[$i]'>$products</a>";
        $i = $i + 1;
    }
}

/**
 *
 */
function print_products_list(){

   // $page = $_GET['products'];

    $page = '123';

    $products_list = array(
        "Umaizushi",
        "Sushi",
        "Ramen",
        "Okonomiyaki",
        "Sauces",
        "Extras"
    );

    $products_links = array(
        "index.php?products=umaizushi",
        "index.php?products=sushi",
        "index.php?products=ramen",
        "index.php?products=okonomiyaki",
        "index.php?products=sauces",
        "index.php?products=extras",
    );

    echo '<nav class="vertical-menu">';

    $i = 0;

    $isActive = "";

    foreach ($products_list as $products){

        if ($page == strtolower($products_list[$i])){
            $isActive="active";
        } else{
            $isActive = "";
        }

        echo "<a class='$isActive' href='$products_links[$i]'>$products</a>";
        $i = $i + 1;

    }
    echo '</div>';
}

function print_footer()
{
    echo '<footer>' .
        '<ul class="lowest_info_about">' .
        '<li><p>Kuma sushi GmbH</p></li>' .
        '<li><p>Musterstrasse 9, 3016 Bern</p> </li>' .
        '<li><p>MWST CHE 123.490.789</p> </li>'.
        '<li><p>Website:Daniil Belov and Janek Bobst</p></li>';
    echo  '</ul>' .
        '</footer>';
}
load_header();
print_products_list();
loadImages();
print_footer();

?>