

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

       if(count($_POST)>0){ //validate form
         //validate payment method
         if(!isset($_POST['paymentmethod']) || $_POST['paymentmethod'] ==''){
           $errors['paymentmethod'] = "Please chose a payment method.";
         } else {
           $method = $_POST['paymentmethod'];
         }
         //validate name
         if(!isset($_POST['cardholder']) || $_POST['cardholder'] ==''){
           $errors['cardholder'] = "Please enter your name.";
         } else {
           $name = $_POST['cardholder'];
         }
         //validate card number
         if(!isset($_POST['cardnumber']) || $_POST['cardnumber'] ==''){
           $errors['cardnumber'] = "Please enter your card number.";
         } else {
           $crdNmbr = $_POST['cardnumber'];
         }
         //validate date
         if(!isset($_POST['expirydate']) || $_POST['expirydate'] ==''){
           $errors['expirydate'] = "Please enter the expiry date of your card.";
         } else {
           $date = $_POST['expirydate'];
         }
         //validate cvc
         if(!isset($_POST['cvc']) || $_POST['cvc'] ==''){
           $errors['cvc'] = "Please enter the cvc of your card.";
         } else {
           $cvc = $_POST['cvc'];
         }
         //validate the checkbox
         if(!isset($_POST['remembercheckbox']) || $_POST['remembercheckbox'] ==''){
           $check = "false";
         } else {
           $check = "true";
         }

       }//end of form validation

       if(count($_POST) > 0 && count($errors) == 0){
         //all fields are validation --> return an confirmation message
         echo "<p>Thank you $name!\nYour payment with $method has been confirmed.</p>";
       } else {

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
