<?php

require_once 'vendor/autoload.php';

function email($email){
    require_once("Autoloader.php");
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'kuma.sushi.bern@gmail.com';
    $mail->Password = 'z8qQsz5pSg59sRcJWy5wvP';
    $mail->Port = 465;
    $mail->From = "kuma.sushi.bern@gmail.com";
    $mail->FromName = "Alex from Kuma Sushi Bern";
    $mail->addAddress("$email");
    $mail->addAddress("kuma.sushi.bern@gmail.com");
    $mail->isHTML(true);
    $mail->Subject= "Order Confirmation";
    $mail->Body = "<h1>We have recieved your order and are processing it now!</h1>";
    $mail->AltBody ="This is a test mail";
    $mail->Send();
}
 ?>