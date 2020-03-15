<?php

use App\Controllers\Index;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/testFunction.php';


$ctrl = $_GET['ctrl'] ?? 'Index';

$class = 'App\Controllers\\' . $ctrl;


$ctrl = new $class();
$ctrl();

