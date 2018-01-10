<!DOCTYPE html>
<html>
<head>
    <charset=UTF-8>
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="resources/css/styles.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<?php
require_once 'mainpage.php';
require_once 'php/Autoloader.php';
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#submitBtn").click(function(){
            $( "#dialog-confirm" ).dialog({
                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: {
                    "Yes": function() {
                        $("#creditCardForm").submit();
                        $( this ).dialog( "close" );
                    },
                    "No": function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        });
    });
</script>

<article>

    <div id="dialog-confirm" class="modal" title="Empty the recycle bin?">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>You are about to pay for your order. Are you sure?</p>
    </div>

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

                <form id="creditCardForm" action="paymentForm.php" method="post">
                    <p><label class="field">Payment method:</label>
                        <select name="paymentInfo[paymentmethod]">
                            <option value="Visa"<?php if (isset($userInput['paymentmethod']) && $userInput['paymentmethod'] == 'Visa') echo ' selected="selected"'; ?>>Visa</option>
                            <option value="MasterCard"<?php if (isset($userInput['paymentmethod']) && $userInput['paymentmethod'] == 'MasterCard') echo ' selected="selected"'; ?>>MasterCard</option>
                            <option value="American Express"<?php if (isset($userInput['paymentmethod']) && $userInput['paymentmethod'] == 'American Express') echo ' selected="selected"'; ?>>American Express</option>
                            <option value="PayPal"<?php if (isset($userInput['paymentmethod']) && $userInput['paymentmethod'] == 'PayPal') echo ' selected="selected"'; ?>>PayPal</option>
                        </select>
                    </p>

                    <p><label>Card-Nr.</label><input type="text" tabindex="2" name="paymentInfo[cardnumber]" value="<?php echo $userInput['cardnumber']; ?>"><?php echo " ".displayErrors('cardnumber'); ?></p>
                    <p><label>Card Holder Name</label><input type="text" tabindex="3" name="paymentInfo[cardholder]" value="<?php echo $userInput['cardholder']; ?>"><?php echo " ".displayErrors('cardholder'); ?></p>
                    <p><label>Card Expiry Date</label><input type="month" tabindex="4" name="paymentInfo[expirydate]" value="<?php echo $userInput['expirydate']; ?>"><?php echo " ".displayErrors('expirydate'); ?></p>
                    <p><label>CVC</label><input type="text" tabindex="5" name="paymentInfo[cvc]" value="<?php echo $userInput['cvc']; ?>"><?php echo " ".displayErrors('cvc'); ?></p>
                    <input type="hidden" name="paymentInfo[remembercheckbox]" value="false"/>
                    <p><label>Remember this Card</label><input type="checkbox" tabindex="6" name="paymentInfo[remembercheckbox]" value="true" <?php if($userInput['remembercheckbox'] == "true") {echo 'checked="checked"';}?>>  </p>
                    <p><input class="submit" id="submitBtn" type="button" value="Submit" name="button" data-toggle="modal" data-target="#confirm-submit"></p>
                </form>
                <?php
            }
        } else {
            printBasicPaymentForm();
        }
    } else { //this is the state when you first enter the page and no user input has been made so far
       printBasicPaymentForm();
    }
    ?>

    <?php
    //print all infos for debugging information
    //######### create method for error handling (isset($errors['paymentmethod'])?$errors['paymentmethod']:'') !!!!!!!
    /*
     *
     *
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

    function printBasicPaymentForm(){
        echo '
          <form id="creditCardForm" action="paymentForm.php" method="post">
          <fieldset>
            <p><label class="field">Payment method:</label>
              <select name="paymentInfo[paymentmethod]">
                <option value="Visa">Visa</option>
                <option value="MasterCard">MasterCard</option>
                <option value="American Express">American Express</option>
                <option value="PayPal">PayPal</option>
              </select>
            </p>

            <p><label class="field">Card-Nr.</label><input type="text" tabindex="2" name="paymentInfo[cardnumber]"</p>
            <p><label class="field">Card Holder Name</label><input type="text" tabindex="3" name="paymentInfo[cardholder]"</p>
            <p><label class="field">Card Expiry Date</label><input type="month" tabindex="4" name="paymentInfo[expirydate]"</p>
            <p><label class="field">CVC</label> <input type="text" tabindex="5" name="paymentInfo[cvc]"</p>
                                  <input type="hidden" name="paymentInfo[remembercheckbox]" value="false" />
            <p><label class="field">Remember this Card</label><input type="checkbox" tabindex="6" name="paymentInfo[remembercheckbox]" value="true" > </p>
            <p><input class="submit" id="submitBtn" type="button" value="Submit" name="button" data-toggle="modal" data-target="#confirm-submit"></p>
            </fieldset>
          </form>

          ';
    }
    ?>



    <h4><a href="index.php">Back to the Main Page</a><h4>

</article>
</body>

</html>
