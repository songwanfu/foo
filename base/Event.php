<?php 

namespace foo\base;
use foo\base\Object;

/**
* 
*/
class Event extends Object
{
    protected static $events = [];
    
    public static function on($name, $callback, $data =  '')
    {
        if (is_callable($callback)) {
            self::$events[$name]['callback'] =  $callback;
            self::$events[$name]['data'] =  $data;
            return true;
        }

        return false;
    }

    public static function trigger($name)
    {
        foreach (self::$events as $k => $handler) {
            if ($k == $name) {
                $callback = $handler['callback'];
                $data = $handler['data'];
                if (!empty($data)) {
                    $callback($data);
                } else {
                    $callback();
                }
            }
        }
    }
}

