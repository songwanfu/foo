<?php
namespace app\controllers;
use foo\base\Controller;
use foo\base\Event;

/**
* 
*/
class Test extends Controller
{
    public function beforeAction()
    {
        return true;
    }

    // public function
    public function show()
    {
        // var_dump($_GET);die;
        $event = new Event();
        $event::on('test', function ($data = 'hello') {
            echo $data;
        }, 'haha');

        $event::trigger('test');
    }



}