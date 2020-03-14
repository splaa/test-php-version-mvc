<?php

use App\Models\User;

require __DIR__ . '/autoload.php';
require __DIR__ . '/testFunction.php';


dump(User::findById(11));
