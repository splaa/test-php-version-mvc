<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/testFunction.php';


$exc = new \App\Exceptions\DbException('Типа сломалась База', 100);


$uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', $uri);
$str = ucfirst($parts[1]);
$ctrl = $parts[1] ? $str : 'Index';


try {
    $class = '\App\Controllers\\' . trim($ctrl);
    $ctrl = new $class();
    $ctrl();
} catch (\App\Exceptions\DbException $e) {
    echo 'Ошибка БАЗЫ ДАННЫХ: <br>' . $e->getQuery() . $e->getMessage();
    die();

} catch (\App\Exceptions\TestExceptions $exception) {
    echo 'Exception1';
    die();

} catch (\Exception $e) {
    echo $e->getMessage();
    die();
} catch (\App\Exceptions\Errors $errors) {
    foreach ($errors->getAll() as $e) {
        echo $e->getMessage() . '<br>';
    }
    die();

}


