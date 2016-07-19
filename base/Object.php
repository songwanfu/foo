<?php 

namespace foo\base;

/**
* 
*/
class Object implements \ArrayAccess
{
    public static function className()
    {
        return get_called_class();
    }

    public function offsetExists($offset) 
    {
        return array_key_exists($offset, get_object_vars($this));
    }

    public function offsetUnset($key) 
    {
        if (array_key_exists($key, get_object_vars($this)) ) {
            unset($this->{$key});
        }
    }

    public function offsetSet($offset, $value) 
    {
        $this->{$offset} = $value;
    }

    public function offsetGet($var) 
    {
        return $this->$var;
    }


}