<?php
namespace app\controllers;
use foo\base\Controller;
use foo\base\Event;

/**
* 
*/
class Agent extends Controller
{
    // public function
    public function show($params = 'agent show')
    {
        echo $params;
    }

    public function afterAction()
    {
        return true;
    }

}