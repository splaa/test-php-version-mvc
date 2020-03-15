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


}
