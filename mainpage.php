<?php

require_once('translations.php');

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
/*
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
*/

function load_header()
{
    echo '<header>';
    echo '<div class="top_logo_border">
    <div class="language_menu"><ul>';
    print_languages_list();
    echo '</ul></div>'.
         '</div>'.
         '<div class="ga_menu"><ul>';
    print_mainpage_navigation_list();
    echo '</ul></div>' ;

    echo '</header>';
}

function print_languages_list(){

    $languages_list = array(
        "EN",
        "DE"
    );

    $j = 0;
    foreach ($languages_list as $languages){
        echo '<li><a href='.$_SERVER['PHP_SELF'].'?lang='.strtolower($languages_list[$j]).' onclick="">'.$languages.'</a></li>';
        $j=$j+1;
    }
}

function navigate_to_page($page_id){
    $page_result = "0";
    switch($page_id){
        case 0 :
            $page_result = "index.php";
            break;
        case 1 :
            $page_result = "menu.php";
            break;
        case 2 :
            $page_result = "deliveryInfo.php";
            break;
        case 3 :
            $page_result = "aboutUs.php";
            break;
        case 4 :
            $page_result = "contactForm.php";
            break;
        case 5 :
            $page_result = "paymentForm.php";
            break;
        case 6 :
            $page_result = "adminConsole.php";
            break;
    }
    return $page_result;
}

/**
 *
 */
function print_mainpage_navigation_list(){

    $page1 = 'aaa';

    $lang = NULL;
    if (!isset($_GET['lang'])) {
        $lang = 'de';
    } else {
        $lang = $_GET['lang'];
        setcookie('lang', $lang, time() + 1800);
    }

    $userName = translate('menu',  5);
    if(isset($_COOKIE['usrName'])){
        $userName = $_COOKIE['usrName'];
    }

    $main_navigation = array(
        translate('menu',  0),
        translate('menu',  1),
        translate('menu',  2),
        translate('menu',  3),
        translate('menu',  4),
        $userName
    );

    $main_navigation_links =
        array(
        "menu.php",
        "deliveryInfo.php",
        "aboutUs.php",
        "contactForm.php",
        checkLogin(),
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

function checkLogin(){
    if(isset($_COOKIE['usrName']) && isset($_COOKIE['usrID'])){
        return "paymentForm.php";
    } else {
        return "credentialsForm.php";
    }
}

/**
 *
 */
function print_products_list(){

    if (isset($_GET['products'])) {
        $page = $_GET['products'];
    } else $page = "";

    $products_list = array(
        "Umaizushi",
        "Rolls",
        "Ramen",
        "Okonomiyaki",
        "Sauces",
        "Extras"
    );

    $products_links = array(
        "menu.php?products=simplesushi",
        "menu.php?products=sushirolls",
        "menu.php?products=ramen",
        "menu.php?products=okonomiyaki",
        "menu.php?products=sauce",
        "menu.php?products=extra",
    );

    echo '<nav><ul>'; // class="vertical-menu" removed !

    $i = 0;

    $isActive = "";

    foreach ($products_list as $products){

        if ($page == strtolower($products_list[$i])){
            $isActive="active";
        } else{
            $isActive = "";
        }

        echo "<li><a class='$isActive' href='$products_links[$i]'>$products</a></li>";
        $i = $i + 1;

    }
    echo '</ul></nav>';
}

function print_footer()
{
    echo '<footer>' .
        '<ul>' .
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