<?php

namespace foo\base;
use foo\base\Object;
use foo\base\Container;

/**
* 
*/
class Application extends Object
{
    private $_controller;
    private $_function;

    public function __construct($controller, $function)
    {
        $this->_controller = $controller;
        $this->_function = $function;
    }

    public function run()
    {
        $di = Container::getInstance();
        $di[$this->_controller] = $this->_controller;
        $obj = $di[$this->_controller];
        if (method_exists($obj, $this->_function)) {
            call_user_func([$obj, $this->_function]);
        } else {
            throw new \Exception('方法' . $this->_function . '不存在!');
        }
    }

}