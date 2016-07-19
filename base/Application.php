<?php

namespace foo\base;
use foo\base\Object;
use foo\base\Container;

/**
* 
*/
class Application extends Object
{
    public function __construct($controller, $function)
    {
        $di = new Container();
        $di[$controller] = $controller;
        $obj = $di[$controller];
        if (method_exists($obj, $function)) {
            call_user_func([$obj, $function]);
        } else {
            exit('方法不存在!');
        }
        
    }

}