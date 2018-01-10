<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site login</title>
    <link rel = "stylesheet" type = "text/css" href = "resources/css/styles.css" media = "screen">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#logoutBtn").click(function(){
                var xmlhttp = getXmlHttp();
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open('GET','destroy_session.php', true);
                xmlhttp.onreadystatechange=function(){
                    if (xmlhttp.readyState == 4){
                        if(xmlhttp.status == 200){
                            alert(xmlhttp.responseText);
                        }
                    }
                };
                xmlhttp.send(null);
            });
        });


    </script>
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
                echo '<article>Welcome ' . $row['name'] . '</article>';
            } else {
                echo '
            <article class="form">
                <h1>Login</h1>
                <form name="registration" action="" method="post">
                    <fieldset>
                        <input type="text" name="email" placeholder="Email" required />
                        <input type="password" name="password" placeholder="Password" required />
                        <input type="submit" name="submit" value="Login" />
                        
                    </fieldset>
                </form>
            </article>\
            <article class="alert">Login failed, please check your credentials.</article>';
            }
        } else {
            echo include('loginForm.php');
        }
    } else {
        echo '<article><h1>Welcome ' . $_COOKIE['usrName'] . '</h1>';
        echo '<input type="button" id="logoutBtn" value="Logout"></article>';
    }
    ?>




</body>
</html>