<?php

class DB extends PDO {

    private static $instance = NULL;

    private function __clone() {}

    public static function getInstance() {

        if (!isset(self::$instance)) {
            try
            {
              /*  $credentials = simplexml_load_file("credentials.xml");
                    $host = $credentials->host;


                    $db   = $credentials->database;


                    $user = $credentials->user;


                    $password = ;


                    $charset = $credentials->charset;

        */
                $dsn = "mysql:host=localhost;dbname=webshop;charset=utf8";
                $user = "webshop123";
                $password = "1234";
                $opt = [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];

                        self::$instance = new PDO($dsn, $user, $password, $opt);
            }
            catch (PDOException $e)
            {
                echo 'Connection failed: '.$e->getMessage();
            }
        }

        return self::$instance;
    }

    public function query($query)
    {
        $result = parent::query($query);
        return($result);
    }

}
?>