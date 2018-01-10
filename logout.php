<?php
session_start();
setcookie("usrName", "", time()-3600);
setcookie("usrID", "", time()-3600);
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site login</title>
    <link rel = "stylesheet" type = "text/css" href = "resources/css/styles.css" media = "screen">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>
<body>
<?php
require_once 'mainpage.php';
require_once 'php/Autoloader.php';

?>
<article>
    <p></p><h2>You have been logged out.</h2></p>
    <p><a href="index.php" class="linkButton">Back to Main Page</a></p>
</article>




</body>
</html>
