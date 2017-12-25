<?php

/* Length of the safer session ID */
$sess_id_length = 200;

/* Generating a very long session id to lower the danger of guessing it */
function generate_secure_id($length){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
}

/* Overriding framework-generated session id with that of our own kind*/
session_id(generate_secure_id($sess_id_length));

/* Starting session for tracking returning customers*/
session_start();

// Setting validity time to two days
$validity_time = 60*60*60*24 * 2;

// Setting validity to predefined time from now on
$validity = time()+ $validity_time;

// Determining the language from the query string using GET
// If it is a first visit, setting the language to de
$language = NULL;
if(isset($_GET["language"])){
    $language = get_param("language", "de");
} else {
    $language = "de";
}

//Setting cookie to the user's browser
setcookie("language", $language, $validity);

/* Adding a language parameter to URL QueryString */
function add_parameter(&$url,$name,$value){
    $separator = strpos($url, '?') !== false ? '&' : '?';
    $url .= $separator . $name . "=" . $value;
    return $url;
}

/* Getting any kind of parametres from URL QueryString */
function get_param($name, $default) {
    if (isset($_GET[$name]))
        return urldecode($_GET[$name]);
    else
        return $default;
}

/* Function to navigate through the pages */
function navigation($language){
    $urlBase = $_SERVER['PHP_SELF'];
    add_parameter( $urlBase, "lang", $language);
    for($i=0;$i<5;$i++){
        $url = $urlBase;
        add_parameter( $url, "id", $i);
        echo "<li class=\"dropdown\">";
        echo "<a href=\"$url\">".t('page',$i)."</a>";
        echo "</li>";
    }
}

function languages($language, $pageId){
    $languages = array('de','fr');
    $urlBase = $_SERVER['PHP_SELF'];
    foreach( $languages as $lang ) {
        $url = $urlBase;
        echo "<a class=\"dropbtn\" href=\"".add_parameter($url,'lang',$lang)."&id=".$_GET['id']."\">".strtoupper($lang)."</a> | ";
    }
}

function t($key,$indx){
    global $language;
    $texts = array(
        'page' => array(
            'de'=> array("unserBier","BrauereiHopfenherz","AllesueberBier","OnlineBestellen","Kontakt"),
            'fr'=> array("notreBière","Brasserie Hopfenherz","Tout sur Bière","Commande en Ligne","Contact")),
        'bier' => array(
            'de' => array(
                'bier1' => 'Unser Klassiker <br> Das IPA von HopfenHerz',
                'bier2' => 'Der Altagstaugliche <br> Das Lager von HopfenHerz',
                'bier3' => 'Der Gentleman <br> Das Märzen von HopfenHerz'),
            'fr'=> array(
                'bier1' => 'notre classic <br> L\'IPA de HopfenHerz',
                'bier2' => 'le normal <br> La Lager de HopfenHerz',
                'bier3' => 'le Gentleman <br>Le Märzen de HopfenHerz')),
        'bierT' => array(
            'de' => array('Unserere Biere im Angebot:'),
            'fr' => array('Notre Bières sur l\'offre:')
        ),
        'introduction' => array(
            'de' => array('Das Team HopfenHerz stellt sich vor:'),
            'fr' => array('L\'équipe de HopfenHerz se présente')),
        'onlineBest' => array(
            'de' => array('Unser Webshop ist endlich online!<br> Jetzt kannst du unser Bier auch bequem von zu hause bestellen.<br><br>'),
            'fr' => array('Notre boutique en ligne est enfin online!<br>Maintenant, vous pouvez également commander facilement de la maison de notre bière.<br><br>')),
        'contact' => array(
            'de' => array('Hast du Fragen?<br><br>Möchtest du eine grössere Bestellung machen?<br><br>
                           Du erreichst uns entweder unter folgendener Nummer:<br><br> 079 543 67 65, <br><br>
                           oder schreib uns eine Email auf hopfen.herz@gmail.com'),
            'fr' => array('Tu as de questions?<br><br>Voulez-vous faire une commande plus importante?<br><br>
                           Vous pouvez nous joindre soit au numéro suivant:<br><br> 079 543 67 65, <br><br>
                           ou écrivez-nous un courriel à hopfen.herz@gmail.com<br>'))
    );

    if (isset($texts[$key][$language][$indx]))
        return $texts[$key][$language][$indx];
    else
        return "[$key]";
}
$pageId = get_param('id', 0);
$language = get_param('lang','de');
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
        require_once 'php/Autoloader.php';
    ?>
</body>
</html>