<?php


namespace App\Exceptions;


class Errors extends \Exception
{
    protected $errors = [];

    public function add(\Exception $e)
    {
        $this->errors[] = $e;
    }

    public function getAll()
    {
        return $this->errors;
    }

    public function isEmpty()
    {
        return empty($this->errors);
    }
}
