
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" media="all" href="resources/css/styles.css">
  <title>My Cart</title>
</head>
<body>
<?php

require_once 'translations.php';
require_once 'mainpage.php';
require_once 'php/classes/ShoppingCart.php';

session_start();

if(!isset($_SESSION["cart"])){
  $_SESSION["cart"] = new ShoppingCart();
} else {

}

$cart = $_SESSION["cart"];
$itemId = $_POST["itemid"];
$quantity = $_POST["qty"];
$quantity = $_POST["qty"];
$size = 0;
$cart->addItem($itemId,$quantity,$size);
?>
  <div class="row">
    <nav class ="columns">
    </nav>
    <section class="column col-4">
      <h1>Dein Warenkorb</h1>
      <?php
      $cart->render();
      ?>

    <form action = <?php echo "index.php?id=3&lang=".$_COOKIE['language'];?> method=post>
      <button type="submit">Weiter einkaufen...</button>
    </form>
    <form action = <?php echo "order2.php?lang=".$_COOKIE['language'];?> method="post">
      <button type="submit">zur Kasse...</button>
      <input type='hidden' name = "kind" value = <?php if(isset($_POST['kind'])){echo $_POST['kind'];} else{ echo "IPA";}?>>
      <input type='hidden' name = 'quantity' value = <?php if(isset($_POST['quantity'])){echo $_POST['quantity'];} else{ echo 24;}?>>
    </form>
  </body>
  </html>