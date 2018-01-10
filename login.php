<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site login</title>
    <link rel = "stylesheet" type = "text/css" href = "resources/css/styles.css" media = "screen">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>
<body>
    <?php
        require_once 'mainpage.php';
        require_once 'php/Autoloader.php';

    if(!(isset($_COOKIE['usrID'])&&isset($_COOKIE['usrName']))) {
        require('php/classes/DB.php');
        $db = DB::getInstance();
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = stripslashes($_POST['email']);
            $password = stripslashes($_POST['password']);
            $hash = md5($password);

            $stmt = $db->prepare("SELECT ID, name FROM users WHERE email LIKE '%$email' AND password LIKE '%$hash';");
            $stmt->execute();
            $row = $stmt->fetch();

            if ($stmt->rowCount() > 0) {
                setcookie('usrID', $row['ID'], time() + 1800);
                setcookie('usrName', $row['name'], time() + 1800);
                loadLoggedInView();
            } else {
                echo '
            <article class="form">
                <h1>Login</h1>
                <form name="registration" action="" method="post">
                    <fieldset>
                        <legend>Login</legend>
                        <p><label class="field">Email:</label><input type="text" name="email" placeholder="Email" required /></p>
                        <p><label class="field">Password:</label><input type="password" name="password" placeholder="Password" required /></p>
                        <p><input type="submit" name="submit" value="Login" class="submit"/></p>
                    </fieldset>
                </form>
            </article>\
            <article class="alert">Login failed, please check your credentials.</article>';
            }
        } else {
            echo include('loginForm.php');
        }
    } else {
        loadLoggedInView();
        echo '</article>';
    }
    
    function loadLoggedInView(){
        echo '
                <article>
                <h1>Welcome ' . $_COOKIE['usrName'] . '</h1>
                <a href="logout.php" class="linkButton" >Logout</a>
                </article>
                ';
    }
    ?>




</body>
</html>