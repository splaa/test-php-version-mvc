<?php


namespace App;
/**
 * Class View
 * @package App
 * @property $users
 */

class View
{
    protected $data = [];

    /**
     * @param $template
     *
     */
    public function display($template)
    {
        include $template;
    }

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function __set($name, $value)
    {
        return $this->data[$name] = $value;
    }

    public function __isset($name)
    {
     return isset($this->data[$name]);
    }


}
