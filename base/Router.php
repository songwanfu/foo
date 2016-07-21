<?php

namespace foo\base;

/**
* 
*/
class Router
{
    
    public function __construct()
    {
        # code...
    }

    public function getRouter($server)
    {
        //http://localhost/foo/web/test/show?id=1&name=tom
        $queryString = $server['QUERY_STRING'];
        $redirectUrl = $server['REDIRECT_URL'];

        if (strpos($redirectUrl, 'web/') === false) {
            list($controller, $function) = explode('/', substr($redirectUrl, strpos($redirectUrl, '/')));
        } else {
            $contro_func = substr($redirectUrl, strpos($redirectUrl, 'web/') + 4);
            if (strpos($contro_func, '/') !== false) {
                list($controller, $function) = explode('/', substr($redirectUrl, strpos($redirectUrl, 'web/') + 4));
            } else {
                throw new \Exception($contro_func . ': 不正确的路由!');
            }
        }
        
        return ['app\\controllers\\' . $controller, $function];
    }
}