<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site login</title>
    <link rel = "stylesheet" type = "text/css" href = "resources/css/styles.css" media = "screen">
</head>
<body>
<?php
require_once 'mainpage.php';
require_once 'php/Autoloader.php';
?>
<?php
require('php/classes/DB.php');

$db = DB::getInstance();

// If form submitted, insert values into the database.
if (isset($_POST['username'])){
    // removes backslashes
    $username = stripslashes($_POST['username']);
    //escapes special characters in a string
    //$username = mysqli_real_escape_string($con,$username);
    $email = stripslashes($_POST['email']);
    //$email = mysqli_real_escape_string($con,$email);
    $password = stripslashes($_POST['password']);
    //$password = mysqli_real_escape_string($con,$password);
    $regDate = date("d-m-Y H:i:s");
    $query = "INSERT into `users` (name, password, email, registrationDate) VALUES ('$username', '".md5($password)."', '$email', '$regDate')";
    $result = $db->query($query);
    if($result){
        echo "<div class='form'>
        <h3>You are registered successfully.</h3>
        <br/>Click here to <a href='login.php' class='linkButton'>Login</a></div>";
    }
}else{

}
echo '
<article class="form_register">
    <form name="registration" action="register.php" method="post">
       <fieldset>
       <legend class="">Register</legend>
        <p><label class="field">Username:</label><input type="text" name="username" placeholder="Username" required /></p>
        <p><label class="field">Email:</label><input type="email" name="email" placeholder="Email" required /></p>
        <p><label class="field"> Password:</label><input type="password" name="password" placeholder="Password" required /></p>
        <p><input type="submit" name="submit" value="Register" class="submit" /></p>
       </fieldset>
    </form>
</article>';
?>
</body>
</html>