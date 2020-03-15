<?php


namespace App;


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
        if ($this->access()) {
            $this->handle();
        } else {
            die('Нет доступа');
        }
    }

    protected function access(): bool
    {
        return 'Boss' == ($_GET['name'] ?? 'Boss');
    }

    abstract protected function handle();

}
