

 <!doctype html>
 <html>
   <head>
     <charset=UTF-8>
     <title>Payment</title>
     <link rel="stylesheet" type="text/css" href="css/styles.css"/>
     <link rel="stylesheet" type="text/css" href="css/styles.css" media="print"/>
   </head>

   <body>
     <h1>Confirmation</h1>
     <?php
        //array containing the error messages
        $errors = array();

        if(count($_POST)>0){
          if(isset($_POST['paymentInfo'])){
          $paymentInfoPost = $_POST['paymentInfo'];
          }
        }

         //validate form
         //validate payment method
         if(!isset($paymentInfoPost['paymentmethod']) || $paymentInfoPost['paymentmethod'] ==''){
           $errors['paymentmethod'] = "Please chose a payment method.";
           $method = "";
         } else {
           $method = $paymentInfoPost['paymentmethod'];
         }
         //validate name
         if(!isset($paymentInfoPost['cardholder']) || $paymentInfoPost['cardholder'] ==''){
           $errors['cardholder'] = "Please enter your name.";
           $name="";
         } else {
           $name = $paymentInfoPost['cardholder'];
         }
         //validate card number
         if(!isset($paymentInfoPost['cardnumber']) || $paymentInfoPost['cardnumber'] ==''){
           $errors['cardnumber'] = "Please enter your card number.";
           $crdNmbr="";
         } else {
           $crdNmbr = $paymentInfoPost['cardnumber'];
         }
         //validate date
         if(!isset($paymentInfoPost['expirydate']) || $paymentInfoPost['expirydate'] ==''){
           $errors['expirydate'] = "Please enter the expiry date of your card.";
           $date="";
         } else {
           $date = $paymentInfoPost['expirydate'];
         }
         //validate cvc
         if(!isset($paymentInfoPost['cvc']) || $paymentInfoPost['cvc'] ==''){
           $errors['cvc'] = "Please enter the cvc of your card.";
           $cvc="";
         } else {
           $cvc = $paymentInfoPost['cvc'];
         }
         //validate the checkbox
         if(!isset($paymentInfoPost['remembercheckbox']) || $paymentInfoPost['remembercheckbox'] ==''){
           $check = "false";
         } else {
           $check = "true";
         }
//end of form validation

       if(count($paymentInfoPost) > 0 && count($errors) == 0){
         //all fields are validation --> return an confirmation message
         echo "<p>Thank you $name!\nYour payment with $method has been confirmed.</p>";
       } else {?>

         <form action="confirmedPayment.php" method="post">

           <p><label>Select a payment method:</label>
             <select name="paymentInfo[paymentmethod]">
               <option value="Visa">Visa</option>
               <option value="MasterCard">MasterCard</option>
               <option value="American Express">American Express</option>
               <option value="PayPal">PayPal</option>
             </select>
           </p>

           <p>Card-Nr.           <input type="text" tabindex="2" name="paymentInfo[cardnumber]" ></p>
           <p>Card Holder Name   <input type="text" tabindex="3" name="paymentInfo[cardholder]"></p>
           <p>Card Expiry Date   <input type="month" tabindex="4" name="paymentInfo[expirydate]"></p>
           <p>CVC                <input type="text" tabindex="5" name="paymentInfo[cvc]"></p>
           <p>Remember this Card <input type="checkbox" tabindex="6" name="paymentInfo[remembercheckbox]" value="true"></p>
           <input type="submit" value="Submit">
         </form>
         <?php
       }

        echo"<p>For debugging all values are listed here:</p>
            <ul>
               <li>Method:    $method</li>
               <li>Name:      $name</li>
               <li>CardNumber:$crdNmbr</li>
               <li>Date:      $date</li>
               <li>CVC:       $cvc</li>
               <li>CheckBox:  $check</li>
            </ul>";
      ?>

      <h4><a href="../../../index.php">Back to the Main Page</a><h4>


   </body>

 </html>
