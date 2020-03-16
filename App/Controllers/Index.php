<?php


namespace App\Controllers;


use App\Controller;
use App\Models\User;

class Index extends Controller
{
    public function handle()
    {

        $this->view->users = User::findAll();


        return $this->view->render(__DIR__ . '/../../templates/index.php');
    }
}
