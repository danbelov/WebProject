<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site login</title>
    <link rel = "stylesheet" type = "text/css" href = "../../../css/styles.css" media = "screen">
    <link rel = "stylesheet" type = "text/css"  href = "../../../css/styles_print.css" media = "print">
</head>
<body>
    <form class="loginform" action="php/classessses/views/login.php">
        <div class="imgcontainer">
            <img src="img_avatar2.png" alt="Avatar" class="avatar">
        </div>

        <input class="container">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
            <input type="checkbox" checked="checked"> Remember me
        </div>

        <div class="container">
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</body>
</html>