<?php

// returns true if $needle is a substring of $haystack
function contains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}

function translate($key, $index){
    $language = determine_language();
    $texts = array(
        'menu' => array(
            'en' => array("Menu", "Delivery", "About", "Contact", "My Cart", "Login"),
            'de' => array("Angebot", "Zustellung", "Ueber uns", "Kontakt", "Warenkorb", "Einloggen")),
         'products' => array(
            'en' => array("Our menu:", "Name", "Qty in a set", "Category", "Price", "Quantity", "Thermobox", "Extras"),
            'de' => array("Unseres Angebot:", "Name", "Warenmenge in einem Set", "Kategorie", "Preis", "Menge", "Thermopackung", "Zusaetzliches")),
         'delivery' => array(
            'en' => array("Our tasty dishes can be easily enjoyed at home:",
                            "If you are: ",
                            "Within Bern City - free of charge",
                            "Within Canton of Bern: in this case we must charge you with a 10 SFr Delivery fee. The food will be delivered within 2 hours. ",
                            "Within other Swiss territories: we are sorry, but it is physically impossible to deliver food fresh in that case so you cannot order the delivery.'.
                              'We would be glad to see in our restaurant personally ;)"),
             'de' => array( "Unsere schmackhaften Meisterstuecke koennen Sie sich locker daheim zustellen lassen",
                            "Wenn Sie sich innerhalb der folgenden Gebiete befinden: ",
                            "In Bern - kostenlose Zustellung",
                            "Innerhalb des Kantons Bern, aber nicht in Bern selber: In diesem Fall muessen wir leider zusaetzlich 10 SFr abbuchen. Das Essen wird Ihnen innerhalb von zwei Stunden zugestellt. Versprochen oder Geld zurueck! ",
                            "Andere Schweizerische Kantone oder Ausland: Leider ist die Zustellung in diesem Fall nicht moeglich'.
                              'Wir erwarten Sie gerne in unserem Restaurant ;)"))
    );
    if (isset($texts[$key][$language][$index]))
        return $texts[$key][$language][$index];
    else
        return "[$key]";
}

function determine_language(){

    $default = "en";
    //Checking the cookies first
    if(isset($_COOKIE['lang'])){
        $lang = $_COOKIE['lang'];
        return $lang;
    }
    else if(isset($_GET['lang'])) {
        setcookie('lang', $_GET['lang'], time() + 1800);
        return $_GET['lang'];
    } else {
        return $default;
    }
}

 ?>