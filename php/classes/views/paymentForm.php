<!doctype html>
<html>
  <head>
    <charset=UTF-8>
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="print"/>
  </head>

  <body>
    <h1>Checkout</h1>
    <form action="confirmedPayment.php" method="post">

      <p><label>Select a payment method:</label>
        <select name="paymentmethod">
          <option value="Visa">Visa</option>
          <option value="MasterCard">MasterCard</option>
          <option value="American Express">American Express</option>
          <option value="PayPal">PayPal</option>
        </select>
      </p>

      <p>Card-Nr.           <input type="text" tabindex="2" name="cardnumber" ></p>
      <p>Card Holder Name   <input type="text" tabindex="3" name="cardholder"></p>
      <p>Card Expiry Date   <input type="month" tabindex="4" name="expirydate"></p>
      <p>CVC                <input type="text" tabindex="5" name="cvc"></p>
      <p>Remember this Card <input type="checkbox" tabindex="6" name="remembercheckbox" value="true"></p>
      <input type="submit" value="Submit">
    </form>


  </body>

</html>
