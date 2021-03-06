<?php

/* Length of the safer session ID */
$sess_id_length = 26;

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kuma sushi Bern</title>
    <link rel = "stylesheet" type = "text/css" href = "resources/css/styles.css" media = "screen">
</head>
<body>

<?php
require_once 'mainpage.php';
?>

    <div class="carouselcontainer">
        <div class="imagecarousel">
            <div><img src="resources/img/carousel/restaurant_lounge.jpg" width="1000" height="500"></div>
            <div><img src="resources/img/carousel/rolls.jpg" width="1000" height="500"></div>
            <div><img src="resources/img/carousel/umaizushi.jpg" width="1000" height="500"></div>
            <div><img src="resources/img/carousel/umaizushi_1.jpg" width="1000" height="500"></div>
            <div><img src="resources/img/carousel/ramen.jpg" width="1000" height="500"></div>
            <div><img src="resources/img/carousel/okonomiyaki.jpg" width="1000" height="500"></div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>
    <link href="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css" rel="stylesheet" />

    <script type="text/javascript">
        $(document).ready(function() {
            $('.imagecarousel').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000
            });
        });
    </script>
</body>
</html>