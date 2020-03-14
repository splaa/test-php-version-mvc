<?php

use App\Models\User;

require __DIR__ . '/autoload.php';
require __DIR__ . '/testFunction.php';


$user = new User();
$user->name = 'Alex21';
$user->email = 'alex21@gmail.com';
$user->territory = '{"area": "6823980301", "city_id": "6823900000", "region_id": "6800000000"}';
$user->territory_json = '{"area": "6823980301", "city_id": "6823900000", "region_id": "6800000000"}';

$user->insert();
dump($user);


