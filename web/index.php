<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/testFunction.php';


try {
    $uri = $_SERVER['REQUEST_URI'];
    $parts = explode('/', $uri);
    $str = ucfirst($parts[1]);
    $ctrl = $parts[1] ? $str : 'Index';
    $class = '\App\Controllers\\' . trim($ctrl);
    $ctrl = new $class();
    $ctrl();
} catch (Exception $e) {


    die('Что то пошло не так ');
}




