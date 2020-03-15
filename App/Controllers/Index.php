<?php


namespace App\Controllers;


use App\Controller;
use App\Models\User;

class Index extends Controller
{
    public function __invoke()
    {

        $this->view->users = User::findAll();

        echo $this->view->render(__DIR__ . '/../../templates/index.php');
    }
}
