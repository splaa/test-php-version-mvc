<?php


namespace App\Controllers;


use App\Controller;

class Resume extends Controller
{


    protected function handle()
    {

        echo $this->view->render(__DIR__ . '/../../templates/resume.php');
    }

    private function rules($email, $password)
    {


        if (strlen($password) < 3) {

            throw new \Exception('Пароль слишком короткий ');
        }
        if ($password === 'test') {
            throw new \Exception('Пароль какойто нетакой ');
        }
//todo: Реализовать проверку
        return true;

    }
}
