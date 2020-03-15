<?php
require __DIR__ . '/autoload.php';
require __DIR__ . '/testFunction.php';


$ctrl = new \App\Controllers\Index();
$ctrl->action();

