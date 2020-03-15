<?php


namespace App\Controllers;


use App\Controller;
use App\Models\User as ModUser;

class User extends Controller
{
    public function action()
    {
        $this->view->users = ModUser::findAll();

        $view['header'] = 'header';
        $view['footer'] = 'footer';


        echo $this->view->render(__DIR__ . '/../../../templates/index.php');
}
}
