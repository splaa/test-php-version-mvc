<?php


function __autoload($class)
{


//    echo __DIR__ . '/../' .  str_replace('\\', '/', $class . '.php');
//    die();
    require __DIR__ . '/../' .  str_replace('\\', '/', $class . '.php');
}

