<?php

// define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
require('../base/autoload.php');
use foo\base\Router;
use foo\base\Application;

try {
    $router = new Router();
    list($controller, $function) = $router->getRouter($_SERVER);
    (new Application($controller, $function))->run();
} catch (\Exception $e) {
    echo $e->getMessage();
}
