<?php

$classMap = require(__DIR__ . '/classes.php');
$dirList = ['controllers', 'models'];

spl_autoload_register(function ($class) use ($classMap, $dirList){
    if (!empty($classMap[$class])) {
        require($classMap[$class]);
    } else {
        list($alias, $dir, $class) = explode('\\', $class);
        if ($alias === 'app' && in_array($dir, $dirList)) {
            $controllerFile = '../' . $dir . '/'. $class . '.php';
            if (file_exists($controllerFile)) {
                require($controllerFile);
            } else {
                exit('控制器不存在!');
            }
        } else {
            exit('加载类文件失败!');
        }
    }
});
