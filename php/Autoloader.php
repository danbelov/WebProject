<?php
function __autoload($class_name){
    $dirs = ['classes/',
        'classes/controller/',
        'classes/layout/',
        'classes/model',
        'classes/views'];

    foreach($dirs as $dir){
        $file = __DIR__ . "/Autoloader.php";
        if(file_exists($file)){
            require_once($file);
            break;
        }

        $file = __DIR__ . "/Autoloader.php" ."class.$class_name.php";
        if(file_exists($file)){
            require_once($file);
            break;
        }
    }
}
?>