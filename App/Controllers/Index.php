<?php


namespace App\Controllers;


use App\Controller;
use App\Models\User;

class Index extends Controller
{
    public function action()
    {

        $this->view->users = User::findAll();

        echo $this->view->render(__DIR__ . '/../../templates/index.php');
    }
}
