<?php
/**
 * @var $user User
 *
 */

use App\Models\User;
use App\View;

require __DIR__ . '/autoload.php';
require __DIR__ . '/testFunction.php';

$view = new View();

$view->users = User::findAll();

$view->display(__DIR__ . '/../templates/index.php');



