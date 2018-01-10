<!DOCTYPE html>
<html>
<head>
    <charset=UTF-8>
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="resources/css/styles.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>

<?php
require_once 'mainpage.php';
require_once 'php/Autoloader.php';
?>

    <article>
        <h1>Bestellung Abschliessen</h1>
        <article class="form">
        <form action="paymentForm.php" method="post">
            <fieldset>
                <legend>Lieferadresse</legend>
                <p>
                    <label class="field">Anrede:</label>

                        <select name="anrede">
                            <option value="male">Herr</option>
                            <option value="female">Frau</option>
                        </select>

                </p>
                <p><label class="field">Vorname:</label><input type="text" tabindex="" name="firstname" value=""</p>
                <p><label class="field">Nachname:</label><input type="text" tabindex="" name="lastname" value=""</p>
                <p><label class="field">Strasse:</label><input type="text" tabindex="" name="street" value=""</p>
                <p><label class="field">PLZ:</label><input type="text" tabindex="" name="zip" value=""</p>
                <p><label class="field">Ortschaft:</label><input type="text" tabindex="" name="location" value=""</p>
                <p><label class="field">Email:</label><input type="text" tabindex="" name="email" value=""</p>
                <p><label class="field">Tel.:</label><input type="text" tabindex="" name="phone" value=""</p>
                <p><input class="submit" type="submit" value="Submit"></p>
            </fieldset>
        </form>
        </article>

    <?php
        echo include('loginForm.php');
    ?>


    </article>


</body>

</html>
