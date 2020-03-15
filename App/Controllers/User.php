<?php


namespace App\Controllers;


use App\Controller;
use App\Models\User as ModUser;

class User extends Controller
{
    public function action()
    {
        $this->view->user = ModUser::findById($_GET['id']);


        echo $this->view->render(__DIR__ . '/../../templates/user.php');
    }
}
