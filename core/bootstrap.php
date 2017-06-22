<?php
require realpath(__DIR__.'/../').'/config/app.php';

// подключаем файлы ядра
function autoloadsystem($class) {
    $filename = ROOT . "/core/" . $class . ".php";
    if(file_exists($filename)){
       require $filename;
    }
    $filename = ROOT . "/app/models/" . $class . ".php";
    if(file_exists($filename)){
       require $filename;
    }
 }

spl_autoload_register("autoloadsystem");

$app = new App();
$app->init();