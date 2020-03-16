<?php


namespace App;
/**
 * Class View
 * @package App
 */

class View implements \Countable, \ArrayAccess
{
    protected $data = [];

    public $layout = __DIR__ . '/../templates/layout/main.php';


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

    public function render($content)
    {
        ob_start();
        include $content;

        include $this->layout;


        $contents = ob_get_contents();
        ob_end_clean();

        echo $contents;
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->data[$offset] = $value;
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}
