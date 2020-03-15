<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();

$view->user = \App\Models\User::findById($_GET['id']);

echo $view->render(__DIR__ . '/../templates/user.php');
