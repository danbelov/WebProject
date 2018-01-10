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
   <h1>Checkout</h1>
   <?php
   //array containing the current errors
   $errors = array();

   //contains the values the user has entered
   $userInput = array();

   //array containing the error messages
   $e_Messages = array(
       'paymentmethod' => "Please choose a payment method.",
       'cardholder' => "Please enter your name.",
       'cardnumber' => "Please enter your card number.",
       'expirydate' => "Please enter the expiry date of your card.",
       'cvc' => "Please enter the cvc of your card.",
       'remembercheckbox' => "false"
   );

   //contains the regex to validate each user input
   $regexValidation = array(
       'paymentmethod' => "some regex",
       'cardholder' => "some regex",
       'cardnumber' => "some regex",
       'expirydate' => "some regex",
       'cvc' => "some regex",
       'remembercheckbox' => "false"
   );


   //validate form
   //validate payment method

   if(count($_POST)>0){

       if(isset($_POST['paymentInfo'])){
           $paymentInfoPost = $_POST['paymentInfo'];

           foreach($paymentInfoPost as $key => $attribute){
               validateAttribute($key);
           }

           if(count($paymentInfoPost) > 0 && count($errors) == 0){
               //all fields are validation --> return an confirmation message
               echo "<p>Thank you ".$userInput['cardholder']."!\nYour payment with ".$userInput['paymentmethod']." has been confirmed and an email has been sent to . . </p>";
           } else {?>

               <form action="confirmedPayment.php" method="post">

                   <p><label>Select a payment method:</label>
                       <select name="paymentInfo[paymentmethod]">
                           <option value="Visa"<?php if (isset($userInput['paymentmethod']) && $userInput['paymentmethod'] == 'Visa') echo ' selected="selected"'; ?>>Visa</option>
                           <option value="MasterCard"<?php if (isset($userInput['paymentmethod']) && $userInput['paymentmethod'] == 'MasterCard') echo ' selected="selected"'; ?>>MasterCard</option>
                           <option value="American Express"<?php if (isset($userInput['paymentmethod']) && $userInput['paymentmethod'] == 'American Express') echo ' selected="selected"'; ?>>American Express</option>
                           <option value="PayPal"<?php if (isset($userInput['paymentmethod']) && $userInput['paymentmethod'] == 'PayPal') echo ' selected="selected"'; ?>>PayPal</option>
                       </select>
                   </p>

                   <p>Card-Nr.           <input type="text" tabindex="2" name="paymentInfo[cardnumber]" value="<?php echo $userInput['cardnumber']; ?>"><?php echo " ".displayErrors('cardnumber'); ?></p>
                   <p>Card Holder Name   <input type="text" tabindex="3" name="paymentInfo[cardholder]" value="<?php echo $userInput['cardholder']; ?>"><?php echo " ".displayErrors('cardholder'); ?></p>
                   <p>Card Expiry Date   <input type="month" tabindex="4" name="paymentInfo[expirydate]" value="<?php echo $userInput['expirydate']; ?>"><?php echo " ".displayErrors('expirydate'); ?></p>
                   <p>CVC                <input type="text" tabindex="5" name="paymentInfo[cvc]" value="<?php echo $userInput['cvc']; ?>"><?php echo " ".displayErrors('cvc'); ?></p>
                   <input type="hidden" name="paymentInfo[remembercheckbox]" value="false"/>
                   <p>Remember this Card <input type="checkbox" tabindex="6" name="paymentInfo[remembercheckbox]" value="true" <?php if($userInput['remembercheckbox'] == "true") {echo 'checked="checked"';}?>>  </p>
                   <input type="submit" value="Submit">
               </form>
               <?php
           }
       }
   } else { //this is the state when you first enter the page and no user input has been made so far
       echo '
          <form action="confirmedPayment.php" method="post">

            <p><label>Select a payment method:</label>
              <select name="paymentInfo[paymentmethod]">
                <option value="Visa">Visa</option>
                <option value="MasterCard">MasterCard</option>
                <option value="American Express">American Express</option>
                <option value="PayPal">PayPal</option>
              </select>
            </p>

            <p>Card-Nr.           <input type="text" tabindex="2" name="paymentInfo[cardnumber]"</p>
            <p>Card Holder Name   <input type="text" tabindex="3" name="paymentInfo[cardholder]"</p>
            <p>Card Expiry Date   <input type="month" tabindex="4" name="paymentInfo[expirydate]"</p>
            <p>CVC                <input type="text" tabindex="5" name="paymentInfo[cvc]"</p>
                                  <input type="hidden" name="paymentInfo[remembercheckbox]" value="false" />
            <p>Remember this Card <input type="checkbox" tabindex="6" name="paymentInfo[remembercheckbox]" value="true" > </p>
            <input type="submit" value="Submit">
          </form>

          ';

   }
   ?>

   <?php
   //print all infos for debugging information
   //######### create method for error handling (isset($errors['paymentmethod'])?$errors['paymentmethod']:'') !!!!!!!
    /*
   echo"<p>For debugging all values are listed here:</p>
           <ul>
              <li>Method:    ".validateAttribute('paymentmethod')."</br>Error Message: ".displayErrors('paymentmethod')."</li></br>
              <li>Name:      ".validateAttribute('cardholder')."</br>Error Message: ".displayErrors('cardholder')."</li></br>
              <li>CardNumber:".validateAttribute('cardnumber')."</br>Error Message: ".displayErrors('cardnumber')."</li></br>
              <li>Date:      ".validateAttribute('expirydate')."</br>Error Message: ".displayErrors('expirydate')."</li></br>
              <li>CVC:       ".validateAttribute('cvc')."</br>Error Message: ".displayErrors('cvc')."</li></br>
              <li>CheckBox:  ".validateAttribute('remembercheckbox')."</br>Error Message: ".displayErrors('remembercheckbox')."</li>
           </ul>";
   */
   //All functions are definded here for now

   /*
   The validateAttribute-function takes the name of an attribute and checks if there is any information about it in the Posted values:
    - if it finds information it tries to validate this information by running it against a regex specified for each attribute in the regexValidation-array
    - if there is NO information then it sets an error for this attribute and looks up the corresponding error message in the e-Messages-array
      each e-Message will be displayed in the correspinding language (not yet implemented!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!)
   */
   function validateAttribute($currentAttribute){
       global $paymentInfoPost, $errors, $output, $e_Messages, $userInput;
       if(!isset($paymentInfoPost[$currentAttribute]) || $paymentInfoPost[$currentAttribute] ==''){//check if the argument is NOT set or empty
           $errors[$currentAttribute] = $e_Messages[$currentAttribute];// add the corresponding error to the errors array for the current argument
           $userInput[$currentAttribute] = '';  //set the user input array to an empty string for the current argument
           return $userInput[$currentAttribute];
       } else {
           unset($errors[$currentAttribute]);
           $userInput[$currentAttribute] = $paymentInfoPost[$currentAttribute];
           return $userInput[$currentAttribute];
       }
   }

   function displayErrors($currentAttribute){
       global $errors;
       if(!isset($errors[$currentAttribute]) || $errors[$currentAttribute] == ''){
           return "";
       } else {
           return $errors[$currentAttribute];
       }
   }
   ?>

   <h4><a href="../../../index.php">Back to the Main Page</a><h4>

    </article>
   </body>

 </html>
