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
       //array containing the current errors
       $errors = array();

       //contains the values the user has entered
       $userInput= array();

       //array containing the error messages
       $e_Messages = array(
         'paymentmethod' => "Please choose a payment method.",
         'cardholder' => "Please enter your name.",
         'cardnumber' => "Please enter your card number.",
         'expirydate' => "Please enter the expiry date of your card.",
         'cvc' => "Please enter the cvc of your card.",
         'remembercheckbox' => "false"
       );

       if(count($_POST)>0){
         if(isset($_POST['paymentInfo'])){
         $paymentInfoPost = $_POST['paymentInfo'];
         }
       }

       /*
       This function takes the name of an attribute and checks if there is any information about it in the Posted values
       if there isn't then it sets an error for this attribute and looks up the corresponding error message.
       */
       function validateAttribute($currentAttribute){
         global $paymentInfoPost, $errors, $output, $e_Messages, $userInput;
         if(!isset($paymentInfoPost[$currentAttribute]) || $paymentInfoPost[$currentAttribute] ==''){
           $errors[$currentAttribute] = $e_Messages[$currentAttribute];
           $userInput[$currentAttribute] = "";
           return $userInput[$currentAttribute];
         } else {
           unset($errors[$currentAttribute]);
           $userInput[$currentAttribute] = $paymentInfoPost[$currentAttribute];
           return $userInput[$currentAttribute];

         }
       }



        //validate form
        //validate payment method
        //######### create method for  validation  !isset($paymentInfoPost['paymentmethod']) || $paymentInfoPost['paymentmethod'] =='' !!!!!!!
        foreach($paymentInfoPost as $key => $attribute){
          validateAttribute($key);
        }
      /*
        if(!isset($paymentInfoPost['paymentmethod']) || $paymentInfoPost['paymentmethod'] ==''){
          $errors['paymentmethod'] = "Please chose a payment method.";
          $method = "";
        } else {
          $method = $paymentInfoPost['paymentmethod'];
          unset($errors['paymentmethod']);
        }
        //validate name
        validateAttribute('cardholder');
        //validate card number
        if(!isset($paymentInfoPost['cardnumber']) || $paymentInfoPost['cardnumber'] ==''){
          $errors['cardnumber'] = "Please enter your card number.";
          $crdNmbr="";
        } else {
          $crdNmbr = $paymentInfoPost['cardnumber'];
          unset($errors['cardnumber']);
        }
        //validate date
        if(!isset($paymentInfoPost['expirydate']) || $paymentInfoPost['expirydate'] ==''){
          $errors['expirydate'] = "Please enter the expiry date of your card.";
          $date="";
        } else {
          $date = $paymentInfoPost['expirydate'];
          unset($errors['expirydate']);
        }
        //validate cvc
        if(!isset($paymentInfoPost['cvc']) || $paymentInfoPost['cvc'] ==''){
          $errors['cvc'] = "Please enter the cvc of your card.";
          $cvc="";
        } else {
          $cvc = $paymentInfoPost['cvc'];
          unset($errors['cvc']);
        }
        //validate the checkbox
        if(!isset($paymentInfoPost['remembercheckbox']) || $paymentInfoPost['remembercheckbox'] ==''){
          $check = "false";
        } else {
          $check = "true";
        }*/
//end of form validation

      if(count($paymentInfoPost) > 0 && count($errors) == 0){
        //all fields are validation --> return an confirmation message
        echo "<p>Thank you $name!\nYour payment with $method has been confirmed.</p>";
      } else {?>

        <form action="paymentForm.php" method="post">

          <p><label>Select a payment method:</label>
            <select name="paymentInfo[paymentmethod]">
              <option value="Visa">Visa</option>
              <option value="MasterCard">MasterCard</option>
              <option value="American Express">American Express</option>
              <option value="PayPal">PayPal</option>
            </select>
          </p>

          <p>Card-Nr.           <input type="text" tabindex="2" name="paymentInfo[cardnumber]" value="<?php $userInput['cardnumber']; ?>"></p>
          <p>Card Holder Name   <input type="text" tabindex="3" name="paymentInfo[cardholder]" value="<?php $userInput['cardholder']; ?>"> </p>
          <p>Card Expiry Date   <input type="month" tabindex="4" name="paymentInfo[expirydate]" value="<?php $userInput['expirydate']; ?>"> </p>
          <p>CVC                <input type="text" tabindex="5" name="paymentInfo[cvc]" value="<?php $userInput['cvc']; ?>"> </p>
          <p>Remember this Card <input type="checkbox" tabindex="6" name="paymentInfo[remembercheckbox]" value="<?php $userInput['remembercheckbox']; ?>"> </p>
          <input type="submit" value="Submit">
        </form>
        <?php
      }

      //print all infos for debugging information
      //######### create method for error handling (isset($errors['paymentmethod'])?$errors['paymentmethod']:'') !!!!!!!
       echo"<p>For debugging all values are listed here:</p>
           <ul>
              <li>Method:    ".validateAttribute('paymentmethod')."</br>Error Message: ".displayErrors('paymentmethod')."</li></br>
              <li>Name:      ".validateAttribute('cardholder')."</br>Error Message: ".displayErrors('cardholder')."</li></br>
              <li>CardNumber:".validateAttribute('cardnumber')."</br>Error Message: ".displayErrors('cardnumber')."</li></br>
              <li>Date:      ".validateAttribute('expirydate')."</br>Error Message: ".displayErrors('expirydate')."</li></br>
              <li>CVC:       ".validateAttribute('cvc')."</br>Error Message: ".displayErrors('cvc')."</li></br>
              <li>CheckBox:  ".validateAttribute('remembercheckbox')."</br>Error Message: ".displayErrors('remembercheckbox')."</li>
           </ul>";
     ?>

     <?php
        function displayErrors($currentAttribute){
          global $errors;
          if(isset($errors[$currentAttribute])){
            return $errors[$currentAttribute];
          } else {
            return "no error";
          }

        }
     ?>

     <h4><a href="../../../index.php">Back to the Main Page</a><h4>


  </body>

</html>
