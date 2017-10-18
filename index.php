<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kuma sushi Bern</title>
    <link rel = "stylesheet" type = "text/css" href = "css/styles.css" media = "screen">
    <link rel = "stylesheet" type = "text/css"  href = "css/styles_print.css" media = "print">
</head>
<body>
    <?php
        require_once 'php/files/load_header.php';
        require_once 'php/files/list_mainpage_navigation.php';
        require_once 'php/files/list_products.php';
        require_once 'php/files/list_social_platforms.php';
        require_once 'php/files/print_footer.php';

        load_header();
        print_products_list();
        print_social_platforms_list();
        print_mainpage_navigation_list();
        print_footer();
    ?>
</body>
</html>