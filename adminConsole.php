<!DOCTYPE html>
<html>
  <head>
    <charset=UTF-8>
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="resources/css/styles.css"/>
  </head>

  <body>
    <?php
        require_once 'mainpage.php';
        require_once 'php/Autoloader.php';
    ?>
    <article>


        <form action="" method="post">
            <h1>New User:</h1>
            <p>First name<input type="text" tabindex="2" name="firstName"></p>
            <p>Last name type="text" tabindex="2" name="lastName"></p>
            <p>Shipping name<input type="text" tabindex="2" name="shippingName"></p>
            <p>Shipping address<input type="text" tabindex="2" name="shippingAddress"></p>
            <p>Total price inklusive shipping<input type="text" tabindex="2" name="totalAmount"></p>
        </form>



    <form action="update_db_2.php" method="post">
	    <h3>Please update your personal data</h3>
	    <p><label>First Name: </label>
		    <input name="address[fname]" value="John"/></p>
	    <p><label>Last Name: </label>
		    <input name="address[lname]" value="Smith"/></p>
	    /* .. */
	    <input type="hidden" name="address[id]" value="23" />
	    <p>
		    <input type="submit" name="action" value="Update" />
		    <input type="submit" name="action" value="Delete" />
	    </p>
    </form>
    </article>
  </body>

</html>