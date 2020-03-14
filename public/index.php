<?php
/**
 * @var $user \App\Models\User
 *
 */
require __DIR__ . '/autoload.php';
require __DIR__ . '/testFunction.php';

$users = \App\Models\User::findAll();

include __DIR__ . '/../templates/index.php';




