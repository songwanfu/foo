<?php
namespace foo\base;
use foo\base\Object;
use foo\base\Container;
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

    /**
     * [render 渲染模板文件]
     * @param  [type] $file           [待编译的文件]
     * @param  [type] $values         [键值对]
     * @param  array  $templateConfig [编译配置]
     * @return [type]                 [description]
     */
    protected function render($file, $values, $templateConfig = [])
    {
        $di = Container::getInstance();
        $di->compiler = 'foo\base\Compiler';
        $compiler = $di->compiler;
        $template = new \foo\base\Template($compiler, $templateConfig);
        $template->assign($values)->show($file);
    }

}