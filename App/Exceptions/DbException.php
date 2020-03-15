<?php


namespace App\Exceptions;


use Throwable;

class DbException extends \Exception
{
    protected $query;

    public function __construct($query,$message = "", $code = 0, Throwable $previous = null)
    {
        $this->query = $query;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }


}
