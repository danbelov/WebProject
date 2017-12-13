<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kuma sushi Bern</title>
    <link rel = "stylesheet" type = "text/css" href = "assets/css/styles.css" media = "screen">
    <link rel = "stylesheet" type = "text/css" href = "assets/css/styles_print.css" media = "print">
</head>
<body>
    <?php
        require_once 'php/files/mainpage.php';

        echo '<div id="container">';
        load_header();
        print_products_list();
        print_languages_list();
        print_social_platforms_list();
        print_mainpage_navigation_list();
        print_footer();
        echo '</div>';
    ?>
</body>
</html>