<?php
namespace foo\base;
use foo\base\Object;

/**
* 
*/
class Controller extends Object
{
    public function __construct()
    {
        $this->run();
    }

    protected function beforeAction()
    {
        // echo 'beforeAction';
        return true;
    }

    protected function afterAction()
    {
        // echo 'afterAction';
        return true;
    }

    protected function run()
    {
        if ($this->beforeAction() && $this->afterAction()) {
            return;
        } else {
            throw new \Exception("Error Processing Request");
        }
        
    }

}