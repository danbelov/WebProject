<?php


class Layout
{

    private static $instance = NULL;

    /**
     * Layout constructor.
     */
    public function __construct()
    {
        require_once '../../Autoloader.php';
    }

    private function __clone() {}

    public static function getInstance() {

        if (!isset(self::$instance)) {
            try
            {

            }
            catch (Exception $e)
            {
                echo 'Connection failed: '.$e->getMessage();
            }
        }

        return self::$instance;
    }


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



    static function load_header()
    {

        echo '<header class="top_logo_border">' .
            '<ul class="picture_and_fillspace">' .
            '<img class="main_shop_logo" src="assets/img/logo.gif" width="50" height="50">' .
            '<li class="main_shop_name"> KUMA sushi</li>';
        print_mainpage_navigation_list();
        print_languages_list();
        echo   '</ul>' ;
        echo  '</header>';
    }

    function print_languages_list(){

        $languages_list = array(
            "DE",
            "FR",
            "EN"
        );

        foreach ($languages_list as $languages){
            echo "<li>$languages</li>";
        }
    }

    /**
     *
     */
    function print_mainpage_navigation_list(){

        $page1 = $_GET['services'];

        $main_navigation = array(
            "Menu",
            "Delivery",
            "About",
            "My Cart",
        );

        $main_navigation_links = array(
            "index.php?services=menu",
            "index.php?services=delivery",
            "index.php?services=about",
            "index.php?services=mycart",
        );

        $i = 0;

        $isActive = "";

        foreach ($main_navigation as $products){

            if ($page1 == strtolower($main_navigation[$i])){
                $isActive="active";
            } else{
                $isActive = "";
            }

            echo "<a class='$isActive' href='$main_navigation_links[$i]'>$products</a>";
            $i = $i + 1;

        }
    }

    /**
     *
     */
    function print_products_list(){

        $page = $_GET['products'];

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

        echo '<div class="vertical-menu">';

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
        echo '<footer class="lowest_info_about">' .
            '<ul class="site_info">' .
            '<li><a href="php/classes/views/paymentForm.php">Kuma sushi GmbH </a></li>' .
            '<li>Musterstrasse 9, 3016 Bern </li>' .
            '<li>MWST CHE 123.490.789 </li>';
        print_social_platforms_list();
        echo  '</ul>' .
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

}