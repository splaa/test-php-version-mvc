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

    /**
     * @param $template
     * @deprecated
     *
     */
    public function display($template)
    {
        echo $this->render($template);
    }

    public function render($template)
    {
        ob_start();

        include $template;

        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }

}
