<?php


namespace App;


use App\Models\User;

abstract class Controller
{
    protected $view;

    /**
     * Controller constructor.
     * @param View $view
     */
    public function __construct(View $view = null)
    {
        $this->view = $view ?? new View();


    }

    public function __invoke()
    {
        if (true) {
            $this->handle();
        } else {

            $this->redirect('login');

        }
    }

    protected function access($mail = 'example@gmail.com'): bool
    {
        $user = new User();
        return $user->isMailExists($mail) ?? true;
        return true;
    }

    abstract protected function handle();

    private function redirect($page = 'login'): void
    {
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = $page;
        header("Location: http://$host$uri/$extra");
        exit;
    }

}
