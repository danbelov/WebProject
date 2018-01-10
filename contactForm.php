<!DOCTYPE html>
<html lang="en">
<head>
    <charset=UTF-8>
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="resources/css/styles.css"/>
</head>
<body>
<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'mainpage.php';

        function email($email){

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
            try {
                $mail->Send();
            } catch (\PHPMailer\PHPMailer\Exception $e) {
            }

        }

    echo '<article>
            <h1>Contact us</h1>
            <form action="confirmedPayment.php" method="post">
                <fieldset>
                    <p><label class="field">Your name:</label><input type="text" tabindex="2" name="cardnumber" required></p>
                    <p><label class="field">Your email:</label><input type="text" tabindex="2" name="cardnumber" required></p>
                    <p><label class="field">Your message:</label>
                    <textarea id="tAddress" rows="4" cols="100" maxlength="500" placeholder="Enter your message" required></textarea>
                    <p><input class="submit" type="submit" value="Submit"></p>
                </fieldset>
            </form>
           </article>';
        ?>
</body>
</html>
